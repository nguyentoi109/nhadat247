<?php
if (!defined('ABSPATH')) exit;

function bds_vnpay_config() {
    static $config = null;
    if ($config !== null) return $config;

    $is_live = defined('VNPAY_ENV') && VNPAY_ENV === 'live';

    if (!defined('VNPAY_TMN_CODE') || !defined('VNPAY_HASH_SECRET')) {
        error_log('[VNPay][CONFIG] Thiếu VNPAY_TMN_CODE / VNPAY_HASH_SECRET trong wp-config.php.');
    }

    $config = [
        'vnp_TmnCode'    => defined('VNPAY_TMN_CODE') ? VNPAY_TMN_CODE : '',
        'vnp_HashSecret' => defined('VNPAY_HASH_SECRET') ? VNPAY_HASH_SECRET : '',
        'vnp_Url'        => $is_live
            ? 'https://vnpayment.vn/paymentv2/vpcpay.html'
            : 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html',
        'vnp_ReturnUrl'  => home_url('/vnpay-return/'),
        'vnp_Version'    => '2.1.0',
        'vnp_Command'    => 'pay',
        'vnp_CurrCode'   => 'VND',
        'vnp_Locale'     => 'vn',
    ];

    return $config;
}

function bds_momo_config() {
    static $config = null;
    if ($config !== null) return $config;

    $is_live = defined('MOMO_ENV') && MOMO_ENV === 'live';

    if (!defined('MOMO_PARTNER_CODE') || !defined('MOMO_ACCESS_KEY') || !defined('MOMO_SECRET_KEY')) {
        error_log('[MoMo][CONFIG] Thiếu MOMO_PARTNER_CODE / MOMO_ACCESS_KEY / MOMO_SECRET_KEY trong wp-config.php.');
    }

    $config = [
        'partnerCode' => defined('MOMO_PARTNER_CODE') ? MOMO_PARTNER_CODE : '',
        'accessKey'   => defined('MOMO_ACCESS_KEY') ? MOMO_ACCESS_KEY : '',
        'secretKey'   => defined('MOMO_SECRET_KEY') ? MOMO_SECRET_KEY : '',
        'endpoint'    => $is_live
            ? 'https://payment.momo.vn/v2/gateway/api/create'
            : 'https://test-payment.momo.vn/v2/gateway/api/create',
        'redirectUrl' => home_url('/momo-return/'),
        'ipnUrl'      => home_url('/momo-ipn/'),
        'requestType' => 'captureWallet',
        'lang'        => 'vi',
    ];

    return $config;
}

/**
 * Map "method" phía UI -> vnp_BankCode, theo ĐÚNG tài liệu chính thức VNPay
 * (https://sandbox.vnpayment.vn/apis/docs/thanh-toan-pay/pay.html):
 *
 *   vnp_BankCode=VNPAYQR  -> Thanh toán quét mã QR (VNPAY-QR)
 *   vnp_BankCode=VNBANK   -> Thẻ ATM - Tài khoản ngân hàng nội địa
 *   vnp_BankCode=INTCARD  -> Thẻ thanh toán quốc tế (Visa/Master/JCB)
 *
 * QUAN TRỌNG: nếu để '' (rỗng), VNPay sẽ tự hiện LẠI màn hình cho user
 * chọn 1 trong 4 phương thức (giống ảnh "Chọn phương thức thanh toán (Test)"
 * trên sandbox) — đây là nguyên nhân "bấm ATM/QR vẫn phải chọn lại".
 * Để trỏ thẳng vào đúng màn, PHẢI set giá trị cụ thể, không được để trống.
 */
function bds_vnpay_bank_code_for_method($method) {
    $map = [
        'qr'     => 'VNPAYQR',
        'atm'    => 'VNBANK',
        'credit' => 'INTCARD',
    ];
    return $map[$method] ?? '';
}