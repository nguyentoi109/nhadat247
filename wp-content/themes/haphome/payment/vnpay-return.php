<?php
if (!defined('ABSPATH')) exit;

function bds_vnpay_return_handler() {
    $cfg = bds_vnpay_config();
    $input = $_GET;

    $order_code = isset($input['vnp_TxnRef']) ? (int) $input['vnp_TxnRef'] : 0;

    if (isset($input['vnp_SecureHash'])) {
        $vnp_secure_hash = $input['vnp_SecureHash'];
        unset($input['vnp_SecureHash'], $input['vnp_SecureHashType']);
        ksort($input);
        $hashData = '';
        foreach ($input as $key => $value) {
            $hashData .= ($hashData === '' ? '' : '&') . urlencode($key) . '=' . urlencode($value);
        }
        $calculated_hash = hash_hmac('sha512', $hashData, $cfg['vnp_HashSecret']);

        if (!hash_equals($calculated_hash, $vnp_secure_hash)) {
            error_log('[VNPay][RETURN] Sai chữ ký khi user quay lại, order=' . $order_code);
        }
    }
    global $wpdb;
    $order = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM {$wpdb->prefix}bds_payment_orders WHERE order_code = %d",
        $order_code
    ));
    $real_status = $order ? $order->status : 'unknown';

    $redirect = add_query_arg(
        [
            'nap_tien' => $real_status === 'completed' ? 'success' : ($real_status === 'pending' ? 'processing' : 'failed'),
            'order'    => $order_code,
        ],
        home_url('/quan-ly-tai-khoan/vi-tien/')
    );

    wp_safe_redirect($redirect);
    exit;
}