<?php
if (!defined('ABSPATH')) exit;

function bds_vnpay_ipn_handler() {
    $cfg = bds_vnpay_config();
    $input = $_GET; 

    if (empty($input) || !isset($input['vnp_SecureHash'])) {
        bds_vnpay_ipn_respond('99', 'Invalid request');
    }

    $vnp_secure_hash = $input['vnp_SecureHash'];
    unset($input['vnp_SecureHash']);
    if (isset($input['vnp_SecureHashType'])) {
        unset($input['vnp_SecureHashType']);
    }

    ksort($input);
    $hashData = '';
    foreach ($input as $key => $value) {
        $hashData .= ($hashData === '' ? '' : '&') . urlencode($key) . '=' . urlencode($value);
    }
    $calculated_hash = hash_hmac('sha512', $hashData, $cfg['vnp_HashSecret']);

    if (!hash_equals($calculated_hash, $vnp_secure_hash)) {
        error_log('[VNPay][IPN] Sai chữ ký! order=' . ($input['vnp_TxnRef'] ?? '?'));
        bds_vnpay_ipn_respond('97', 'Invalid signature');
    }

    global $wpdb;
    $order_code = isset($input['vnp_TxnRef']) ? (int) $input['vnp_TxnRef'] : 0;
    $vnp_amount = isset($input['vnp_Amount']) ? ((int) $input['vnp_Amount']) / 100 : 0;
    $rsp_code   = $input['vnp_ResponseCode'] ?? '';
    $tx_status  = $input['vnp_TransactionStatus'] ?? '';

    $orders_table = $wpdb->prefix . 'bds_payment_orders';
    $order = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM $orders_table WHERE order_code = %d LIMIT 1",
        $order_code
    ));

    if (!$order) {
        bds_vnpay_ipn_respond('01', 'Order not found');
    }

    if ((int) $order->amount !== (int) $vnp_amount) {
        error_log('[VNPay][IPN] Sai số tiền! order_code=' . $order_code . ' expected=' . $order->amount . ' got=' . $vnp_amount);
        bds_vnpay_ipn_respond('04', 'Invalid amount');
    }

    if ($order->status !== 'pending') {
        bds_vnpay_ipn_respond('00', 'Confirm Success');
    }

    $is_success = ($rsp_code === '00' && $tx_status === '00');
    if ($is_success) {
        bds_finalize_deposit_success($order);
    } else {
        bds_finalize_deposit_failed($order);
    }

    bds_vnpay_ipn_respond('00', 'Confirm Success');
}

function bds_vnpay_ipn_respond($code, $message) {
    header('Content-Type: application/json');
    echo json_encode(['RspCode' => $code, 'Message' => $message]);
    exit;
}