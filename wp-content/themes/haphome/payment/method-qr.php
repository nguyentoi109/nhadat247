<?php
if (!defined('ABSPATH')) exit;

function bds_render_qr($amount, $order_id) {
    $bank_id      = 'bidv';
    $account      = '3144065637';
    $account_name = 'Nguyễn Tới';
    $template     = 'compact2';
    $desc         = 'NAP' . $order_id;
    $qr_url = "https://img.vietqr.io/image/{$bank_id}-{$account}-{$template}.png"
            . '?amount='      . urlencode($amount)
            . '&addInfo='     . urlencode($desc)
            . '&accountName=' . urlencode('CONG TY HAP HOME');

    ob_start(); ?>
    <div class="pm-qr-wrap">
        <p class="pm-qr-note"> Mở app ngân hàng hoặc ví điện tử, quét mã QR để thanh toán.<br></p>

        <div class="pm-qr-img-wrap">
            <img src="<?php echo esc_url($qr_url); ?>"
                 alt="QR thanh toán" class="pm-qr-img"
                 onerror="this.parentNode.innerHTML='<p style=\'color:#ee0033;font-size:13px;\'>Không tải được mã QR.<br>Vui lòng chuyển khoản thủ công theo thông tin bên dưới.</p>'">
            <div class="pm-qr-expire">
                Mã hết hạn sau <strong id="pp-countdown">05:00</strong>
            </div>
        </div>

        <div class="pm-bank-info">
            <div class="pm-bank-row">
                <span>Ngân hàng</span>
                <strong>BIDV SmartBanking</strong>
            </div>
            <div class="pm-bank-row">
                <span>Chủ tài khoản</span>
                <strong><?php echo esc_html($account_name); ?></strong>
            </div>
            <div class="pm-bank-row">
                <span>Số tài khoản</span>
                <strong>
                    <?php echo esc_html($account); ?>
                    <button class="pm-copy-btn"
                            onclick="pmCopy('<?php echo esc_js($account); ?>', this)">Sao chép</button>
                </strong>
            </div>
            <div class="pm-bank-row">
                <span>Nội dung CK</span>
                <strong>
                    <?php echo esc_html($desc); ?>
                    <button class="pm-copy-btn"
                            onclick="pmCopy('<?php echo esc_js($desc); ?>', this)">Sao chép</button>
                </strong>
            </div>
            <div class="pm-bank-row">
                <span>Số tiền</span>
                <strong class="pm-highlight"><?php echo number_format($amount, 0, ',', '.'); ?> ₫</strong>
            </div>
        </div>

        <div class="pm-status-check">
            <div class="pm-status-dot"></div>
            <span>Đang chờ xác nhận thanh toán...</span>
        </div>
    </div>
    <?php
    return ob_get_clean();
}