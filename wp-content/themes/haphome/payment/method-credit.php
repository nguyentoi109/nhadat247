<?php
if (!defined('ABSPATH')) exit;

function bds_create_payment_credit($order_id, $order_code, $amount) {
    // Đồng bộ cách gọi với method-qr.php / method-atm.php: luôn lấy bank code
    // từ 1 nguồn duy nhất (bds_vnpay_bank_code_for_method) thay vì hardcode rải rác,
    // để sau này đổi mã ở vnpay-config.php là đủ, không cần sửa nhiều file.
    $bank_code = bds_vnpay_bank_code_for_method('credit');
    return bds_vnpay_build_payment_url($order_id, $order_code, $amount, 'credit', $bank_code);
}