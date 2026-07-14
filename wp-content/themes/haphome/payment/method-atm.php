<?php
if (!defined('ABSPATH')) exit;

function bds_create_payment_atm($order_id, $order_code, $amount) {
    // Trước đây hardcode '' khiến VNPay hiện lại màn chọn phương thức.
    // Nay lấy đúng mã 'VNBANK' từ bds_vnpay_bank_code_for_method() để trỏ thẳng
    // vào màn "Thẻ nội địa và tài khoản ngân hàng".
    $bank_code = bds_vnpay_bank_code_for_method('atm');
    return bds_vnpay_build_payment_url($order_id, $order_code, $amount, 'atm', $bank_code);
}