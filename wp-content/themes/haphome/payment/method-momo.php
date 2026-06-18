<?php
if (!defined('ABSPATH')) exit;

define('MOMO_PHONE', '0343930613');
define('MOMO_NAME',  'NGUYỄN TỚI');
define('MOMO_PERSONAL_LINK', 'https://me.momo.vn/nguyentoi');

function bds_render_momo(int $amount, string $order_id): string {
    $order_code = (int) substr(preg_replace('/[^0-9]/', '', $order_id), 0, 9);
    $desc       = 'NAP' . $order_code;
    $qr_url = 'https://img.vietqr.io/image/MOMO-' . MOMO_PHONE . '-compact2.png'
            . '?amount='      . $amount
            . '&addInfo='     . urlencode($desc)
            . '&accountName=' . urlencode(MOMO_NAME);

    bds_payos_save_order($order_code, $amount, get_current_user_id(), 'momo', '');

    ob_start(); ?>
    <div style="text-align:center;padding:6px 0 4px;">
        <p style="font-size:13px;color:#6b7280;margin-bottom:14px;line-height:1.7;">
            Mở app <strong style="color:#111;">MoMo</strong> →
            chọn <strong style="color:#111;">Quét mã</strong> →
            quét QR bên dưới
        </p>

        <div style="display:inline-block;padding:14px;background:#fff; border:1px solid #2c2c2c;border-radius:14px;margin-bottom:10px;">
            <img src="<?php echo esc_url($qr_url); ?>"
                alt="QR MoMo"
                id="momo-qr-img"
                style="width:200px;height:200px;border-radius:8px;display:block;"
                onerror="document.getElementById('momo-qr-err').style.display='block';this.style.display='none';">
        </div>

        <div id="momo-qr-err"
            style="display:none;color:#a21caf;font-size:13px;
                    padding:16px;background:#fdf4ff;border-radius:8px;margin-bottom:10px;">
            Không tải được QR. Vui lòng dùng link bên dưới.
        </div>
        <div style="clear:both;"></div>
        <div style="font-size:13px;color:#6b7280;background:#f9fafb;
                    border-radius:8px;padding:7px 16px;
                    width:fit-content;margin:0 auto 18px;">
            Hết hạn sau <strong style="color:#a21caf;" id="pp-countdown">05:00</strong>
        </div>

        <div style="background:#f9fafb;border:1px solid #f0f0f0;border-radius:8px;
                    text-align:left;overflow:hidden;margin-bottom:14px;font-size:13px;">
            <div style="display:flex;justify-content:space-between;align-items:center;
                        padding:10px 14px;border-bottom:1px solid #f0f0f0;">
                <span style="color:#6b7280;">Số điện thoại</span>
                <strong><?php echo esc_html(MOMO_PHONE); ?>
                    <button class="pm-copy-btn"
                            onclick="pmCopy('<?php echo esc_js(MOMO_PHONE); ?>', this)">Sao chép</button>
                </strong>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;
                        padding:10px 14px;border-bottom:1px solid #f0f0f0;">
                <span style="color:#6b7280;">Tên tài khoản</span>
                <strong><?php echo esc_html(MOMO_NAME); ?></strong>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;
                        padding:10px 14px;border-bottom:1px solid #f0f0f0;">
                <span style="color:#6b7280;">Số tiền</span>
                <strong style="color:#a21caf;font-size:15px;">
                    <?php echo number_format($amount, 0, ',', '.'); ?> đ
                </strong>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;
                        padding:10px 14px;">
                <span style="color:#6b7280;">Nội dung</span>
                <strong><?php echo esc_html($desc); ?>
                    <button class="pm-copy-btn"
                            onclick="pmCopy('<?php echo esc_js($desc); ?>', this)">Sao chép</button>
                </strong>
            </div>
        </div>

        <div style="background:#fdf4ff;border:1px solid #e9d5ff;border-radius:8px;
                    padding:10px 14px;font-size:12px;color:#6b21a8;
                    text-align:left;margin-bottom:14px;">
            ⚠️ <strong>Quan trọng:</strong> Nhập đúng nội dung
            <strong><?php echo esc_html($desc); ?></strong>
            để hệ thống tự xác nhận. Sai nội dung vui lòng liên hệ hỗ trợ.
        </div>
    </div>
    <?php
    return ob_get_clean();
}