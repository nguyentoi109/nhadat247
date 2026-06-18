<?php
if (!defined('ABSPATH')) exit;

function bds_render_bank($amount, $order_id) {
    $desc  = 'NAP' . $order_id;
    $banks = [
        [
            'name'    => 'MB Bank',
            'account' => '0909818911',
            'holder'  => 'Nguyễn Tới',
            'branch'  => 'Chi nhánh TP.HCM',
            'logo'    => 'https://api.vietqr.io/img/MB.png',
        ],
        [
            'name'    => 'Vietcombank',
            'account' => '1234567890',
            'holder'  => 'Nguyễn Tới',
            'branch'  => 'Chi nhánh TP.HCM',
            'logo'    => 'https://api.vietqr.io/img/VCB.png',
        ],
    ];

    ob_start(); ?>
    <div class="pm-bank-wrap">
        <p class="pm-bank-note">
            Chuyển khoản đến <strong>một trong các tài khoản</strong> bên dưới.<br>
            Ghi <strong>đúng nội dung chuyển khoản</strong> để hệ thống tự động xác nhận.
        </p>

        <?php foreach ($banks as $b): ?>
        <div class="pm-bank-card">
            <div class="pm-bank-card-header">
                <img src="<?php echo esc_url($b['logo']); ?>"
                     alt="<?php echo esc_attr($b['name']); ?>"
                     class="pm-bank-logo-sm"
                     onerror="this.style.display='none'">
                <span class="pm-bank-name-lbl"><?php echo esc_html($b['name']); ?></span>
            </div>
            <div class="pm-bank-rows">
                <div class="pm-bank-row">
                    <span>Số tài khoản</span>
                    <strong>
                        <?php echo esc_html($b['account']); ?>
                        <button class="pm-copy-btn"
                                onclick="pmCopy('<?php echo esc_js($b['account']); ?>', this)">Sao chép</button>
                    </strong>
                </div>
                <div class="pm-bank-row">
                    <span>Chủ tài khoản</span>
                    <strong><?php echo esc_html($b['holder']); ?></strong>
                </div>
                <div class="pm-bank-row">
                    <span>Chi nhánh</span>
                    <strong><?php echo esc_html($b['branch']); ?></strong>
                </div>
                <div class="pm-bank-row">
                    <span>Số tiền</span>
                    <strong class="pm-highlight"><?php echo number_format($amount, 0, ',', '.'); ?> ₫</strong>
                </div>
                <div class="pm-bank-row">
                    <span>Nội dung CK</span>
                    <strong>
                        <?php echo esc_html($desc); ?>
                        <button class="pm-copy-btn"
                                onclick="pmCopy('<?php echo esc_js($desc); ?>', this)">Sao chép</button>
                    </strong>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <p class="pm-bank-footer-note">
             Tiền được cộng tự động trong <strong>5–15 phút</strong> sau khi chuyển thành công.<br>
        </p>

        <div class="pm-status-check">
            <div class="pm-status-dot"></div>
            <span>Đang chờ xác nhận thanh toán...</span>
        </div>
    </div>
    <?php
    return ob_get_clean();
}