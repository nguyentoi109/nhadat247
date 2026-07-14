<?php
if (!defined('ABSPATH')) exit;

function bds_vnpay_build_payment_url($order_id, $order_code, $amount, $method, $bank_code) {
    $cfg = bds_vnpay_config();

    if (empty($cfg['vnp_TmnCode']) || empty($cfg['vnp_HashSecret'])) {
        error_log('[VNPay][CREATE] Thiếu cấu hình TmnCode/HashSecret — không thể tạo giao dịch.');
        return new WP_Error('vnpay_config_missing', 'Cổng thanh toán đang bảo trì, vui lòng thử lại sau.');
    }

    $ip_addr = bds_get_client_ip();

    // Ép múi giờ Việt Nam (GMT+7), không phụ thuộc timezone mặc định của server
    $tz = new DateTimeZone('Asia/Ho_Chi_Minh');
    $now = new DateTime('now', $tz);
    $expire = clone $now;
    $expire->modify('+15 minutes');

    $inputData = [
        'vnp_Version'    => $cfg['vnp_Version'],
        'vnp_Command'    => $cfg['vnp_Command'],
        'vnp_TmnCode'    => $cfg['vnp_TmnCode'],
        'vnp_Amount'     => $amount * 100,
        'vnp_CurrCode'   => $cfg['vnp_CurrCode'],
        'vnp_TxnRef'     => (string) $order_code,
        'vnp_OrderInfo'  => 'Nap tien vao vi don hang ' . $order_code,
        'vnp_OrderType'  => 'other',
        'vnp_Locale'     => $cfg['vnp_Locale'],
        'vnp_ReturnUrl'  => $cfg['vnp_ReturnUrl'],
        'vnp_IpAddr'     => $ip_addr,
        'vnp_CreateDate' => $now->format('YmdHis'),
        'vnp_ExpireDate' => $expire->format('YmdHis'),
    ];

    if (!empty($bank_code)) {
        $inputData['vnp_BankCode'] = $bank_code;
    }

    ksort($inputData);

    $hashData = '';
    $query = '';
    foreach ($inputData as $key => $value) {
        if ($value === '' || $value === null) continue;
        $hashData .= ($hashData === '' ? '' : '&') . urlencode($key) . '=' . urlencode($value);
        $query    .= ($query === '' ? '' : '&') . urlencode($key) . '=' . urlencode($value);
    }

    $secure_hash = hash_hmac('sha512', $hashData, $cfg['vnp_HashSecret']);
    $payment_url = $cfg['vnp_Url'] . '?' . $query . '&vnp_SecureHash=' . $secure_hash;

    // Log ĐÚNG vị trí (sau khi $payment_url đã có giá trị) — bản cũ log biến này
    // TRƯỚC dòng gán phía trên, nên luôn ra "Undefined variable" và không log được gì.
    // Log method + bank_code để đối chiếu ngay khi 1 phương thức nào đó không thanh toán được.
    error_log(sprintf(
        '[VNPay][CREATE] method=%s bank_code=%s order_code=%s (len=%d) amount=%d url=%s',
        $method,
        $bank_code ?: '(rỗng)',
        $order_code,
        strlen((string) $order_code),
        $amount,
        $payment_url
    ));

    global $wpdb;
    $wpdb->update(
        $wpdb->prefix . 'bds_payment_orders',
        ['bank' => $bank_code ?: $method],
        ['id' => $order_id],
        ['%s'],
        ['%d']
    );

    return $payment_url;
}