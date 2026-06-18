<?php
if (!defined('ABSPATH')) exit;

require_once get_template_directory() . '/payment/method-qr.php';
require_once get_template_directory() . '/payment/method-bank.php';
require_once get_template_directory() . '/payment/method-atm.php';
require_once get_template_directory() . '/payment/method-momo.php';
require_once get_template_directory() . '/payment/method-intl.php'; 
require_once get_template_directory() . '/payment/method-credit.php'; 

add_action('wp_ajax_bds_load_payment_method',        'bds_load_payment_method_cb');
add_action('wp_ajax_nopriv_bds_load_payment_method', 'bds_load_payment_method_cb');

function bds_load_payment_method_cb(): void {
    check_ajax_referer('bds_payment_nonce', '_nonce');

    $method = sanitize_text_field($_POST['method'] ?? '');
    $amount = (int)($_POST['amount'] ?? 0);
    $bank   = sanitize_text_field($_POST['bank']   ?? '');

    $order_id = date('ymdHi') . rand(10, 99);

    switch ($method) {
        case 'qr':
            wp_send_json_success(['html' => bds_render_qr($amount, $order_id), 'qr_url' => true]);
            break;
        case 'bank':
            wp_send_json_success(['html' => bds_render_bank($amount, $order_id)]);
            break;
        case 'atm':
            $url=bds_render_atm($amount,$order_id,$bank);
            wp_send_json_success(["redirect"=>$url]);
            break;
        case 'intl':
            // wp_send_json_success(['html' => bds_render_intl($amount, $order_id, $bank)]);
            break;
        case 'momo':
            wp_send_json_success(['html' => bds_render_momo($amount, $order_id), 'qr_url' => true]);
            break;
        case 'credit':
            wp_send_json_success(['html' => bds_render_credit($amount, $order_id, $bank)]);
            break;

        default:
            wp_send_json_error(['message' => 'Phương thức không hợp lệ.']);
    }
}

add_action('wp_ajax_nopriv_bds_payos_webhook', 'bds_payos_webhook_cb');
add_action('wp_ajax_bds_payos_webhook',        'bds_payos_webhook_cb');
function bds_payos_webhook_cb(): void {
    $raw  = file_get_contents('php://input');
    $data = json_decode($raw, true);

    if (empty($data['data']) || empty($data['signature'])) {
        wp_send_json(['success' => false, 'message' => 'Invalid payload'], 400);
        return;
    }

    $sig_fields = ['amount', 'cancelUrl', 'description', 'orderCode', 'returnUrl'];
    $parts = [];
    foreach ($sig_fields as $k) {
        if (isset($data['data'][$k])) {
            $parts[] = $k . '=' . $data['data'][$k];
        }
    }
    $expected = hash_hmac('sha256', implode('&', $parts), PAYOS_CHECKSUM_KEY);

    if (!hash_equals($expected, $data['signature'])) {
        wp_send_json(['success' => false, 'message' => 'Invalid signature'], 403);
        return;
    }

    $order_code = (int)($data['data']['orderCode'] ?? 0);
    $status_raw = $data['data']['status'] ?? '';  // PAID | CANCELLED | EXPIRED

    bds_payos_handle_status($order_code, $status_raw);

    wp_send_json(['success' => true]);
}

add_action('template_redirect', 'bds_payos_handle_return');
function bds_payos_handle_return(): void {
    if (empty($_GET['payos_status']) || empty($_GET['order_code'])) return;

    $status     = sanitize_text_field($_GET['payos_status']); // success | cancel
    $order_code = (int)$_GET['order_code'];

    if ($status === 'success') {
        bds_payos_verify_and_complete($order_code);
    }
}

function bds_payos_verify_and_complete(int $order_code): void {
    $response = wp_remote_get("https://api-merchant.payos.vn/v2/payment-requests/{$order_code}", [
        'timeout' => 10,
        'headers' => [
            'x-client-id' => PAYOS_CLIENT_ID,
            'x-api-key'   => PAYOS_API_KEY,
        ],
    ]);

    if (is_wp_error($response)) return;

    $result = json_decode(wp_remote_retrieve_body($response), true);
    $status = $result['data']['status'] ?? '';

    if ($status === 'PAID') {
        bds_payos_handle_status($order_code, 'PAID');
    }
}

function bds_payos_handle_status(int $order_code, string $status): void {
    global $wpdb;
    $table = $wpdb->prefix . 'bds_payment_orders';

    $order = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM $table WHERE order_code = %d AND status = 'pending'",
        $order_code
    ));

    if (!$order) return;

    if ($status === 'PAID') {
        $current = (int)get_user_meta($order->user_id, 'balance_main', true);
        update_user_meta($order->user_id, 'balance_main', $current + $order->amount);

        $bonus = 0;
        if ($order->amount >= 2000000)     $bonus = (int)round($order->amount * 0.12);
        elseif ($order->amount >= 500000)  $bonus = (int)round($order->amount * 0.05);

        $has_deposited = get_user_meta($order->user_id, 'bds_first_deposit_done', true);
        if (!$has_deposited) {
            $bonus += 50000;
            update_user_meta($order->user_id, 'bds_first_deposit_done', 1);
        }

        if ($bonus > 0) {
            $current_promo = (int)get_user_meta($order->user_id, 'balance_promo', true);
            update_user_meta($order->user_id, 'balance_promo', $current_promo + $bonus);
        }
        $wpdb->update($table, ['status' => 'paid'], ['order_code' => $order_code], ['%s'], ['%d']);

    } elseif (in_array($status, ['CANCELLED', 'EXPIRED'], true)) {
        $wpdb->update($table, ['status' => strtolower($status)], ['order_code' => $order_code], ['%s'], ['%d']);
    }
}