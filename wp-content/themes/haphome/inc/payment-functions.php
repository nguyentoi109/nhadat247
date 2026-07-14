<?php
if (!defined('ABSPATH')) exit;

require_once __DIR__ . '/payment-config.php';
require_once get_stylesheet_directory() . '/payment/vnpay-create.php';

require_once get_stylesheet_directory() . '/payment/method-qr.php';
require_once get_stylesheet_directory() . '/payment/method-atm.php';
require_once get_stylesheet_directory() . '/payment/method-credit.php';
require_once get_stylesheet_directory() . '/payment/method-momo.php';
require_once get_stylesheet_directory() . '/payment/vnpay-ipn.php';
require_once get_stylesheet_directory() . '/payment/vnpay-return.php';
require_once get_stylesheet_directory() . '/payment/momo-ipn.php';
require_once get_stylesheet_directory() . '/payment/momo-return.php';

add_action('init', 'bds_register_payment_rewrite_rules');
function bds_register_payment_rewrite_rules() {
    add_rewrite_rule('^vnpay-return/?$', 'index.php?bds_vnpay_return=1', 'top');
    add_rewrite_rule('^vnpay-ipn/?$', 'index.php?bds_vnpay_ipn=1', 'top');
    add_rewrite_rule('^momo-return/?$', 'index.php?bds_momo_return=1', 'top');
    add_rewrite_rule('^momo-ipn/?$', 'index.php?bds_momo_ipn=1', 'top');
}

add_filter('query_vars', 'bds_register_payment_query_vars');
function bds_register_payment_query_vars($vars) {
    $vars[] = 'bds_vnpay_return';
    $vars[] = 'bds_vnpay_ipn';
    $vars[] = 'bds_momo_return';
    $vars[] = 'bds_momo_ipn';
    return $vars;
}

add_action('template_redirect', 'bds_handle_payment_endpoints');
function bds_handle_payment_endpoints() {
    if (get_query_var('bds_vnpay_ipn')) {
        bds_vnpay_ipn_handler();
        exit;
    }
    if (get_query_var('bds_vnpay_return')) {
        bds_vnpay_return_handler();
        exit;
    }
    if (get_query_var('bds_momo_ipn')) {
        bds_momo_ipn_handler();
        exit;
    }
    if (get_query_var('bds_momo_return')) {
        bds_momo_return_handler();
        exit;
    }
}

add_action('wp_ajax_nopriv_bds_create_deposit_order', 'bds_create_deposit_order');
add_action('wp_ajax_bds_create_deposit_order', 'bds_create_deposit_order');

function bds_create_deposit_order() {
    global $wpdb;

    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'bds_deposit_nonce')) {
        wp_send_json_error(['message' => 'Phiên làm việc không hợp lệ, vui lòng tải lại trang.']);
    }
    $custom_user = custom_get_user();
    if (!$custom_user) {
        wp_send_json_error(['message' => 'Bạn cần đăng nhập để nạp tiền.']);
    }
    $amount = isset($_POST['amount']) ? (int) preg_replace('/[^0-9]/', '', wp_unslash($_POST['amount'])) : 0;
    $min_amount = 10000;
    $max_amount = 200000000;
    if ($amount < $min_amount) {
        wp_send_json_error(['message' => 'Số tiền nạp tối thiểu là ' . number_format($min_amount, 0, ',', '.') . ' ₫.']);
    }
    if ($amount > $max_amount) {
        wp_send_json_error(['message' => 'Số tiền nạp vượt quá giới hạn cho phép mỗi giao dịch.']);
    }
    $method = isset($_POST['method']) ? sanitize_key(wp_unslash($_POST['method'])) : '';
    $allowed_methods = ['qr', 'atm', 'credit', 'momo'];
    if (!in_array($method, $allowed_methods, true)) {
        wp_send_json_error(['message' => 'Phương thức thanh toán không hợp lệ.']);
    }
    $rl_key = 'bds_deposit_rl_' . $custom_user->id;
    $rl_count = (int) get_transient($rl_key);
    if ($rl_count >= 5) {
        wp_send_json_error(['message' => 'Bạn thao tác quá nhanh, vui lòng thử lại sau ít phút.']);
    }
    set_transient($rl_key, $rl_count + 1, MINUTE_IN_SECONDS);

    $order_code = bds_generate_order_code($custom_user->id);
    $orders_table = $wpdb->prefix . 'bds_payment_orders';
    $inserted = $wpdb->insert(
        $orders_table,
        [
            'order_code' => $order_code,
            'user_id'    => $custom_user->id,
            'amount'     => $amount,
            'method'     => $method,
            'bank'       => '',
            'status'     => 'pending',
        ],
        ['%d', '%d', '%d', '%s', '%s', '%s']
    );

    if ($inserted === false) {
        wp_send_json_error(['message' => 'Không thể tạo đơn nạp tiền, vui lòng thử lại.']);
    }

    $order_id = $wpdb->insert_id;
    $tx_table = $wpdb->prefix . 'custom_transactions';
    $wpdb->insert(
        $tx_table,
        [
            'user_id'          => $custom_user->id,
            'transaction_type' => 'deposit',
            'wallet_type'      => 'main',
            'amount'           => $amount,
            'balance_after'    => 0,
            'payment_method'   => bds_map_method_to_tx_payment_method($method),
            'reference_code'   => (string) $order_code,
            'related_table'    => $orders_table,
            'related_id'       => $order_id,
            'status'           => 'pending',
            'description'      => 'Nạp tiền vào ví qua ' . $method,
        ],
        ['%d', '%s', '%s', '%d', '%d', '%s', '%s', '%s', '%d', '%s', '%s']
    );
    switch ($method) {
        case 'qr':
            $result = bds_create_payment_qr($order_id, $order_code, $amount);
            break;
        case 'atm':
            $result = bds_create_payment_atm($order_id, $order_code, $amount);
            break;
        case 'credit':
            $result = bds_create_payment_credit($order_id, $order_code, $amount);
            break;
        case 'momo':
            $result = bds_create_payment_momo($order_id, $order_code, $amount);
            break;
        default:
            $result = new WP_Error('invalid_method', 'Phương thức không hợp lệ.');
    }

    if (is_wp_error($result)) {
        wp_send_json_error(['message' => $result->get_error_message()]);
    }

    wp_send_json_success([
        'redirect_url' => $result,
    ]);
}

function bds_generate_order_code($user_id) {
    $ts = time(); 
    $rand = random_int(100, 999); 
    $code = (string) $ts . (string) $rand; 
    return (int) $code;
}

function bds_map_method_to_tx_payment_method($method) {
    switch ($method) {
        case 'momo':
            return 'momo';
        case 'qr':
        case 'atm':
        case 'credit':
            return 'vnpay';
        default:
            return 'system';
    }
}

function bds_get_client_ip() {
    $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : '127.0.0.1';
}

function bds_finalize_deposit_success($order) {
    global $wpdb;
    $orders_table  = $wpdb->prefix . 'bds_payment_orders';
    $wallets_table = $wpdb->prefix . 'custom_wallets';
    $tx_table      = $wpdb->prefix . 'custom_transactions';
    $notif_table   = $wpdb->prefix . 'bds_notifications';
    $updated_rows = $wpdb->query($wpdb->prepare(
        "UPDATE $orders_table SET status = 'completed', updated_at = NOW() WHERE id = %d AND status = 'pending'",
        $order->id
    ));

    if (!$updated_rows) {
        return; 
    }

    $amount = (int) $order->amount;
    $bonus  = bds_calculate_deposit_bonus($amount, $order->user_id);
    $wallet = $wpdb->get_row($wpdb->prepare("SELECT * FROM $wallets_table WHERE user_id = %d", $order->user_id));
    if (!$wallet) {
        $wpdb->insert($wallets_table, ['user_id' => $order->user_id, 'balance_main' => 0, 'balance_bonus' => 0], ['%d', '%d', '%d']);
    }

    $wpdb->query($wpdb->prepare(
        "UPDATE $wallets_table SET balance_main = balance_main + %d WHERE user_id = %d",
        $amount, $order->user_id
    ));
    if ($bonus > 0) {
        $wpdb->query($wpdb->prepare(
            "UPDATE $wallets_table SET balance_bonus = balance_bonus + %d WHERE user_id = %d",
            $bonus, $order->user_id
        ));
    }

    $new_wallet = $wpdb->get_row($wpdb->prepare("SELECT * FROM $wallets_table WHERE user_id = %d", $order->user_id));
    $balance_after = $new_wallet ? ((float) $new_wallet->balance_main + (float) $new_wallet->balance_bonus) : $amount;
    $wpdb->update(
        $tx_table,
        ['status' => 'completed', 'balance_after' => $balance_after],
        ['reference_code' => (string) $order->order_code, 'status' => 'pending'],
        ['%s', '%d'],
        ['%s', '%s']
    );

    if ($bonus > 0) {
        $wpdb->insert(
            $tx_table,
            [
                'user_id'          => $order->user_id,
                'transaction_type' => 'bonus',
                'wallet_type'      => 'bonus',
                'amount'           => $bonus,
                'balance_after'    => $balance_after,
                'payment_method'   => 'system',
                'reference_code'   => (string) $order->order_code,
                'related_table'    => $orders_table,
                'related_id'       => $order->id,
                'status'           => 'completed',
                'description'      => 'Thưởng khuyến mãi nạp tiền',
            ],
            ['%d', '%s', '%s', '%d', '%d', '%s', '%s', '%s', '%d', '%s', '%s']
        );
    }

    $body = 'Bạn đã nạp thành công ' . number_format($amount, 0, ',', '.') . ' ₫ vào tài khoản.';
    if ($bonus > 0) {
        $body .= ' Tặng thêm ' . number_format($bonus, 0, ',', '.') . ' ₫ vào tài khoản khuyến mãi.';
    }
    $wpdb->insert(
        $notif_table,
        [
            'user_id' => $order->user_id,
            'type'    => 'tai_chinh',
            'title'   => 'Nạp tiền thành công',
            'body'    => $body,
            'icon'    => '💰',
            'link'    => home_url('/quan-ly-tai-khoan/vi-tien/'),
            'is_read' => 0,
        ],
        ['%d', '%s', '%s', '%s', '%s', '%s', '%d']
    );
}

function bds_finalize_deposit_failed($order) {
    global $wpdb;
    $orders_table = $wpdb->prefix . 'bds_payment_orders';
    $tx_table     = $wpdb->prefix . 'custom_transactions';

    $wpdb->query($wpdb->prepare(
        "UPDATE $orders_table SET status = 'failed', updated_at = NOW() WHERE id = %d AND status = 'pending'",
        $order->id
    ));

    $wpdb->update(
        $tx_table,
        ['status' => 'failed'],
        ['reference_code' => (string) $order->order_code, 'status' => 'pending'],
        ['%s'],
        ['%s', '%s']
    );
}

function bds_calculate_deposit_bonus($amount, $user_id) {
    global $wpdb;
    $bonus = 0;

    if ($amount >= 2000000) {
        $bonus += (int) round($amount * 0.12);
    } elseif ($amount >= 500000) {
        $bonus += (int) round($amount * 0.05);
    }

    $tx_table = $wpdb->prefix . 'custom_transactions';
    $prior_deposits = (int) $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM $tx_table WHERE user_id = %d AND transaction_type = 'deposit' AND status = 'completed'",
        $user_id
    ));
    if ($prior_deposits === 0) {
        $bonus += 50000;
    }
    return $bonus;
}