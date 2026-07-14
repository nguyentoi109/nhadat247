<?php
if (!defined('ABSPATH')) exit;

function bds_momo_return_handler() {
    $input = $_GET;
    $order_code = isset($input['orderId']) ? (int) $input['orderId'] : 0;
    global $wpdb;
    $order = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM {$wpdb->prefix}bds_payment_orders WHERE order_code = %d AND method = 'momo'",
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