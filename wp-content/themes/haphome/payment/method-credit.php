<?php
if (!defined('ABSPATH')) exit;

function bds_render_credit(int $amount, string $order_id, string $bank = ''): string {
    $order_code = (int) substr(preg_replace('/[^0-9]/', '', $order_id), 0, 9);
    if ($order_code < 1) $order_code = rand(100000000, 999999999);

    $desc       = 'NAP' . $order_code;
    $base_url   = strtok(home_url(add_query_arg(null, null)), '?');
    $return_url = add_query_arg(['payos_status' => 'success', 'order_code' => $order_code], $base_url);
    $cancel_url = add_query_arg(['payos_status' => 'cancel',  'order_code' => $order_code], $base_url);

    bds_payos_save_order($order_code, $amount, get_current_user_id(), 'credit', $bank);

    try {
        $checkout_url = bds_payos_create_link($amount, $order_code, $desc, $return_url, $cancel_url);
    } catch (Exception $e) {
        return '<div style="text-align:center;padding:28px 0;">
            <p style="color:#ee0033;font-weight:700;">' . esc_html($e->getMessage()) . '</p>
            <button onclick="ppOpen(\'credit\',' . $amount . ')"
                style="padding:9px 24px;background:#ee0033;color:#fff;border:none;border-radius:6px;font-size:13px;font-weight:700;cursor:pointer;">
                ↩ Thử lại
            </button></div>';
    }

    ob_start(); ?>
    <div style="text-align:center;padding:10px 0 20px;">

        <!-- Badge trả góp 0% -->
        <div style="display:inline-flex;align-items:center;gap:8px;background:#fff5f6;
                    border:1.5px solid #fecdd3;border-radius:20px;
                    padding:6px 16px;margin-bottom:20px;">
            <span style="font-size:18px;">💳</span>
            <span style="font-size:13px;font-weight:700;color:#dc2626;">Trả góp 0% lãi suất</span>
        </div>

        <!-- Thông tin kỳ hạn -->
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:8px;margin-bottom:20px;">
            <?php foreach (['3 tháng', '6 tháng', '12 tháng'] as $ky): ?>
            <div style="border:1px solid #e5e7eb;border-radius:8px;padding:10px 6px;font-size:12px;">
                <div style="font-weight:700;font-size:14px;color:#111;"><?php echo $ky; ?></div>
                <div style="color:#059669;font-weight:600;margin-top:2px;">0% lãi</div>
                <div style="color:#9ca3af;font-size:11px;margin-top:2px;">
                    <?php echo number_format((int)($amount / (int)$ky), 0, ',', '.'); ?> ₫/tháng
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div style="background:#f9fafb;border:1px solid #f0f0f0;border-radius:8px;
                    padding:12px 16px;text-align:left;margin-bottom:20px;font-size:13px;">
            <div style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px solid #f0f0f0;">
                <span style="color:#6b7280;">Phương thức</span>
                <strong>Trả góp thẻ tín dụng</strong>
            </div>
            <?php if ($bank): ?>
            <div style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px solid #f0f0f0;">
                <span style="color:#6b7280;">Ngân hàng</span>
                <strong><?php echo esc_html(strtoupper($bank)); ?></strong>
            </div>
            <?php endif; ?>
            <div style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px solid #f0f0f0;">
                <span style="color:#6b7280;">Tổng tiền</span>
                <strong style="color:#ee0033;font-size:15px;">
                    <?php echo number_format($amount, 0, ',', '.'); ?> ₫
                </strong>
            </div>
            <div style="display:flex;justify-content:space-between;padding:6px 0;">
                <span style="color:#6b7280;">Mã giao dịch</span>
                <strong><?php echo esc_html($order_code); ?></strong>
            </div>
        </div>

        <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:8px;
                    padding:10px 14px;font-size:12px;color:#166534;text-align:left;margin-bottom:20px;">
            ✅ Kỳ hạn và lãi suất thực tế phụ thuộc vào ngân hàng phát hành thẻ của bạn.
        </div>

        <a href="<?php echo esc_url($checkout_url); ?>"
           target="_blank" rel="noopener noreferrer"
           style="display:inline-block;background:#dc2626;color:#fff;
                  padding:12px 36px;border-radius:6px;font-size:15px;
                  font-weight:700;text-decoration:none;letter-spacing:.3px;">
            Thanh toán trả góp →
        </a>

        <p style="font-size:12px;color:#9ca3af;margin-top:14px;line-height:1.7;">
            Sau khi hoàn tất, quay lại trang này — số dư sẽ được cộng tự động.
        </p>
    </div>
    <?php
    return ob_get_clean();
}