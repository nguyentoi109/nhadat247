<?php
if (!defined('ABSPATH')) exit;

function bds_momo_ipn_handler() {
    $cfg = bds_momo_config();

    $raw_body = file_get_contents('php://input');
    $input = json_decode($raw_body, true);

    if (empty($input) || !isset($input['signature'])) {
        bds_momo_ipn_respond(99, 'Invalid request');
    }

    $received_signature = $input['signature'];
    $raw_signature =
        'accessKey=' . $cfg['accessKey'] .
        '&amount=' . ($input['amount'] ?? '') .
        '&extraData=' . ($input['extraData'] ?? '') .
        '&message=' . ($input['message'] ?? '') .
        '&orderId=' . ($input['orderId'] ?? '') .
        '&orderInfo=' . ($input['orderInfo'] ?? '') .
        '&orderType=' . ($input['orderType'] ?? '') .
        '&partnerCode=' . ($input['partnerCode'] ?? '') .
        '&payType=' . ($input['payType'] ?? '') .
        '&requestId=' . ($input['requestId'] ?? '') .
        '&responseTime=' . ($input['responseTime'] ?? '') .
        '&resultCode=' . ($input['resultCode'] ?? '') .
        '&transId=' . ($input['transId'] ?? '');

    $calculated_signature = hash_hmac('sha256', $raw_signature, $cfg['secretKey']);

    if (!hash_equals($calculated_signature, $received_signature)) {
        error_log('[MoMo][IPN] Sai chữ ký! orderId=' . ($input['orderId'] ?? '?'));
        bds_momo_ipn_respond(97, 'Invalid signature');
    }

    global $wpdb;
    $order_code = isset($input['orderId']) ? (int) $input['orderId'] : 0;
    $momo_amount = isset($input['amount']) ? (int) $input['amount'] : 0;
    $result_code = (int) ($input['resultCode'] ?? -1);

    $orders_table = $wpdb->prefix . 'bds_payment_orders';
    $order = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM $orders_table WHERE order_code = %d AND method = 'momo' LIMIT 1",
        $order_code
    ));

    if (!$order) {
        bds_momo_ipn_respond(1, 'Order not found');
    }

    if ((int) $order->amount !== $momo_amount) {
        error_log('[MoMo][IPN] Sai số tiền! order_code=' . $order_code . ' expected=' . $order->amount . ' got=' . $momo_amount);
        bds_momo_ipn_respond(4, 'Invalid amount');
    }

    if ($order->status !== 'pending') {
        bds_momo_ipn_respond(0, 'Confirm Success');
    }
    $is_success = ($result_code === 0);

    if ($is_success) {
        bds_finalize_deposit_success($order); 
    } else {
        bds_finalize_deposit_failed($order);
    }
    bds_momo_ipn_respond(0, 'Confirm Success');
}

function bds_momo_ipn_respond($resultCode, $message) {
    header('Content-Type: application/json');
    http_response_code(204);
    echo json_encode(['resultCode' => $resultCode, 'message' => $message]);
    exit;
}