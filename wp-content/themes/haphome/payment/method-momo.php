<?php
if (!defined('ABSPATH')) exit;

function bds_create_payment_momo($order_id, $order_code, $amount) {
    $cfg = bds_momo_config();

    if (empty($cfg['partnerCode']) || empty($cfg['accessKey']) || empty($cfg['secretKey'])) {
        error_log('[MoMo][CREATE] Thiếu cấu hình partnerCode/accessKey/secretKey — không thể tạo giao dịch.');
        return new WP_Error('momo_config_missing', 'Phương thức MoMo đang bảo trì, vui lòng chọn phương thức khác.');
    }

    $request_id = uniqid('bds_', true);
    $order_id_momo = (string) $order_code; 
    $order_info = 'Nap tien vao vi don hang ' . $order_code;
    $extra_data = '';
    $raw_signature =
        'accessKey=' . $cfg['accessKey'] .
        '&amount=' . $amount .
        '&extraData=' . $extra_data .
        '&ipnUrl=' . $cfg['ipnUrl'] .
        '&orderId=' . $order_id_momo .
        '&orderInfo=' . $order_info .
        '&partnerCode=' . $cfg['partnerCode'] .
        '&redirectUrl=' . $cfg['redirectUrl'] .
        '&requestId=' . $request_id .
        '&requestType=' . $cfg['requestType'];

    $signature = hash_hmac('sha256', $raw_signature, $cfg['secretKey']);

    $body = [
        'partnerCode' => $cfg['partnerCode'],
        'partnerName' => get_bloginfo('name'),
        'storeId'     => get_bloginfo('name'),
        'requestId'   => $request_id,
        'amount'      => (string) $amount,
        'orderId'     => $order_id_momo,
        'orderInfo'   => $order_info,
        'redirectUrl' => $cfg['redirectUrl'],
        'ipnUrl'      => $cfg['ipnUrl'],
        'lang'        => $cfg['lang'],
        'extraData'   => $extra_data,
        'requestType' => $cfg['requestType'],
        'signature'   => $signature,
    ];

    $response = wp_remote_post($cfg['endpoint'], [
        'headers'   => ['Content-Type' => 'application/json'],
        'body'      => wp_json_encode($body),
        'timeout'   => 30,
        'sslverify' => true,
    ]);

    if (is_wp_error($response)) {
        error_log('[MoMo][CREATE] Lỗi kết nối: ' . $response->get_error_message());
        return new WP_Error('momo_request_failed', 'Không thể kết nối tới MoMo, vui lòng thử lại.');
    }

    $code = wp_remote_retrieve_response_code($response);
    $data = json_decode(wp_remote_retrieve_body($response), true);

    if ($code !== 200 && $code !== 201) {
        error_log('[MoMo][CREATE] HTTP ' . $code . ' — ' . wp_remote_retrieve_body($response));
        return new WP_Error('momo_http_error', 'Cổng MoMo trả về lỗi, vui lòng thử lại sau.');
    }

    if (empty($data['payUrl']) || (int) ($data['resultCode'] ?? -1) !== 0) {
        error_log('[MoMo][CREATE] resultCode=' . ($data['resultCode'] ?? '?') . ' message=' . ($data['message'] ?? '?'));
        return new WP_Error('momo_create_failed', $data['message'] ?? 'Không thể tạo giao dịch MoMo.');
    }

    global $wpdb;
    $wpdb->update(
        $wpdb->prefix . 'bds_payment_orders',
        ['bank' => 'momo:' . $request_id],
        ['id' => $order_id],
        ['%s'],
        ['%d']
    );

    return $data['payUrl'];
}