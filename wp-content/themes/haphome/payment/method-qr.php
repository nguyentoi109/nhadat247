<?php
if (!defined('ABSPATH')) exit;

function bds_create_payment_qr($order_id, $order_code, $amount) {
    // Trước đây hardcode '' khiến VNPay hiện lại màn chọn phương thức.
    // Nay lấy đúng mã 'VNPAYQR' từ bds_vnpay_bank_code_for_method() để trỏ thẳng
    // vào màn quét mã QR (giống ảnh sandbox bạn gửi, mục "App Ngân hàng và Ví điện tử").
    //
    // LƯU Ý QUAN TRỌNG: nếu VNPay trả về trang lỗi "Ngân hàng thanh toán không
    // được hỗ trợ" (Payment/Error.html?code=76) ngay khi vừa redirect sang,
    // đây KHÔNG phải lỗi code — vnp_BankCode=VNPAYQR đã đúng chuẩn tài liệu.
    // Nguyên nhân là TmnCode sandbox (tự đăng ký qua devreg) có thể CHƯA được
    // cấp quyền test kênh VNPAYQR (khác với VNBANK/NCB vốn luôn bật sẵn cho
    // mọi TmnCode demo). Dùng script tools/check-bank-list.php để tự kiểm tra
    // TmnCode của bạn được phép dùng những bankCode nào, hoặc liên hệ
    // hotrovnpay@vnpay.vn để xin bật kênh QR cho tài khoản sandbox.
    $bank_code = bds_vnpay_bank_code_for_method('qr');
    return bds_vnpay_build_payment_url($order_id, $order_code, $amount, 'qr', $bank_code);
}