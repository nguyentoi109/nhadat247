<style>
.nt-bal-grid {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 12px;
	margin-bottom: 24px;
}

.nt-bal-card {
	background: #f9fafb;
	border: 1px solid var(--ql-border);
	border-radius: 8px;
	padding: 16px;
}

.nt-bal-label {
	font-size: 11px;
	color: var(--ql-muted);
	margin-bottom: 6px;
}

.nt-bal-value {
	font-size: 22px;
	font-weight: 700;
	color: var(--ql-text);
}

.nt-section-title {
	font-size: 13px;
	font-weight: 700;
	color: var(--ql-text);
	margin-bottom: 6px;
}

.nt-section-sub {
	font-size: 12px;
	color: var(--ql-muted);
	margin-bottom: 14px;
}

.nt-methods-grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 10px;
	margin-bottom: 24px;
}

.nt-method-card {
	display: flex;
	align-items: center;
	gap: 12px;
	padding: 14px 16px;
	border: 1.5px solid var(--ql-border);
	border-radius: 8px;
	cursor: pointer;
	background: #fff;
	transition: border-color .15s, box-shadow .15s;
	position: relative;
}

.nt-method-card:hover {
	border-color: var(--ntc, var(--ql-red));
	box-shadow: 0 2px 8px rgba(0, 0, 0, .06);
}

.nt-method-card.selected {
	border-color: var(--ntc, var(--ql-red));
	border-width: 2px;
}

.nt-method-icon {
	width: 40px;
	height: 40px;
	border-radius: 8px;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-shrink: 0;
}

.nt-method-icon svg {
	width: 20px;
	height: 20px;
}

.nt-method-texts {
	flex: 1;
	min-width: 0;
}

.nt-method-label {
	font-size: 12px;
	font-weight: 600;
	color: var(--ql-text);
	margin-bottom: 2px;
	line-height: 1.3;
}

.nt-method-desc {
	font-size: 11px;
	color: var(--ql-muted);
	line-height: 1.4;
}

.nt-check-dot {
	position: absolute;
	top: 8px;
	right: 8px;
	width: 16px;
	height: 16px;
	border-radius: 50%;
	border: 1.5px solid var(--ql-border);
	background: #fff;
	display: none;
	align-items: center;
	justify-content: center;
	flex-shrink: 0;
}

.nt-method-card.selected .nt-check-dot {
	display: flex;
	background: var(--ntc, var(--ql-red));
	border-color: var(--ntc, var(--ql-red));
}

.nt-chips {
	display: flex;
	gap: 8px;
	flex-wrap: wrap;
	margin-bottom: 14px;
}

.nt-chip {
	padding: 7px 14px;
	border: 1.5px solid var(--ql-border);
	border-radius: 20px;
	background: #fff;
	font-family: inherit;
	font-size: 12px;
	font-weight: 600;
	color: var(--ql-text);
	cursor: pointer;
	transition: all .2s;
}

.nt-chip:hover {
	border-color: var(--ql-red);
	color: var(--ql-red);
}

.nt-chip.active {
	border-color: var(--ql-red);
	background: var(--ql-red);
	color: #fff;
}

.nt-input-row {
	display: flex;
	gap: 10px;
	align-items: flex-end;
	flex-wrap: wrap;
}

.nt-input-group {
	display: flex;
	flex-direction: column;
	gap: 5px;
	flex: 1;
	min-width: 180px;
	max-width: 280px;
}

.nt-input-label {
	font-size: 12px;
	font-weight: 500;
	color: #374151;
}

.nt-input {
	padding: 8px 11px;
	border: 1.5px solid var(--ql-border);
	border-radius: 6px;
	font-family: inherit;
	font-size: 13px;
	color: var(--ql-text);
	background: #fff;
	outline: none;
	width: 100%;
	transition: border-color .2s;
	box-sizing: border-box;
}

.nt-input:focus {
	border-color: var(--ql-red);
}

.nt-amount-hint {
	font-size: 11px;
	color: var(--ql-muted);
	margin-top: 4px;
}

.nt-amount-hint.nt-error {
	color: #dc2626;
}

.nt-bonus-box {
	background: #fffbea;
	border: 1px solid #fde68a;
	border-radius: 8px;
	padding: 12px 14px;
	margin-bottom: 20px;
	font-size: 12px;
	color: #92400e;
}

.nt-bonus-box strong {
	color: #78350f;
}

.nt-bonus-list {
	margin: 6px 0 0;
	padding-left: 14px;
	list-style: disc;
}

.nt-bonus-list li {
	margin-bottom: 3px;
	line-height: 1.5;
}

.nt-submit-btn {
	padding: 10px 32px;
	background: var(--ql-red);
	color: #fff;
	border: none;
	border-radius: 6px;
	font-family: inherit;
	font-size: 14px;
	font-weight: 700;
	cursor: pointer;
	transition: background .2s;
}

.nt-submit-btn:hover {
	background: var(--ql-red-dark, #cc0022);
}

.nt-submit-btn:disabled {
	background: #d1d5db;
	cursor: not-allowed;
}

@media(max-width:700px) {
	.nt-methods-grid {
		grid-template-columns: 1fr;
	}

	.nt-bal-grid {
		grid-template-columns: 1fr;
	}

	.nt-input-row {
		flex-direction: column;
		align-items: stretch;
	}

	.nt-input-group {
		max-width: none;
	}
}
</style>

<?php
if (!defined('ABSPATH')) exit;

$custom_user = function_exists('custom_get_user') ? custom_get_user() : null;

if (!$custom_user) {
    echo '<div class="ql-panel-body"><p>Vui lòng đăng nhập để sử dụng chức năng nạp tiền.</p></div>';
    return;
}

global $wpdb;
$wallets_table = $wpdb->prefix . 'custom_wallets';
$wallet = $wpdb->get_row($wpdb->prepare(
    "SELECT balance_main, balance_bonus FROM $wallets_table WHERE user_id = %d",
    $custom_user->id
));

$balance_main  = $wallet ? (float) $wallet->balance_main  : 0;
$balance_bonus = $wallet ? (float) $wallet->balance_bonus : 0;
$amount_presets = [100000, 200000, 500000, 1000000, 2000000, 5000000];

$methods = [
    [
        'id'    => 'qr',
        'label' => 'Thanh toán bằng mã QR',
        'desc'  => 'Quét mã QR từ ứng dụng ngân hàng và ví điện tử',
        'color' => '#ee0033',
        'bg'    => '#fde8ec',
        'svg'   => '<rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="5" y="5" width="3" height="3"/><rect x="16" y="5" width="3" height="3"/><rect x="5" y="16" width="3" height="3"/><path d="M14 14h3v3M17 17h3v3M14 20h3" stroke-linecap="round"/>',
    ],
    [
        'id'    => 'atm',
        'label' => 'Chuyển khoản ngân hàng / Thẻ ATM nội địa',
        'desc'  => 'Tài khoản định danh hoặc thẻ ATM có đăng ký Internet Banking',
        'color' => '#0ea5e9',
        'bg'    => '#e0f2fe',
        'svg'   => '<path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><rect x="9" y="13" width="6" height="8"/>',
    ],
    [
        'id'    => 'credit',
        'label' => 'Thẻ quốc tế / Trả góp',
        'desc'  => 'Visa, Mastercard, JCB, Apple Pay, Google Pay',
        'color' => '#dc2626',
        'bg'    => '#fee2e2',
        'svg'   => '<rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20M6 15h2M10 15h4" stroke-linecap="round"/>',
    ],
    [
        'id'    => 'momo',
        'label' => 'Thanh toán bằng ví MoMo',
        'desc'  => 'Thanh toán nhanh qua ví MoMo',
        'color' => '#a21caf',
        'bg'    => '#fae8ff',
        'svg'   => '<circle cx="12" cy="12" r="9"/><path d="M8 12c0-2.2 1.8-4 4-4s4 1.8 4 4-1.8 4-4 4" stroke-linecap="round"/><circle cx="12" cy="12" r="1.5" fill="currentColor"/>',
    ],
];
?>

<div class="ql-panel-header">
    <h2 class="ql-panel-title">Nạp tiền</h2>
</div>

<div class="ql-panel-body">
    <div class="nt-bal-grid">
        <div class="nt-bal-card">
            <div class="nt-bal-label">Tài khoản tin đăng</div>
            <div class="nt-bal-value"><?php echo number_format($balance_main, 0, ',', '.'); ?> ₫</div>
        </div>
        <div class="nt-bal-card">
            <div class="nt-bal-label">Tài khoản khuyến mãi</div>
            <div class="nt-bal-value"><?php echo number_format($balance_bonus, 0, ',', '.'); ?> ₫</div>
        </div>
    </div>

    <div class="nt-section-title">Số tiền muốn nạp</div>
    <div class="nt-section-sub">Chọn nhanh một mức hoặc tự nhập số tiền (tối thiểu 10.000 ₫)</div>

    <div class="nt-chips">
        <?php foreach ($amount_presets as $i => $preset): ?>
        <button type="button"
                class="nt-chip <?php echo $i === 2 ? 'active' : ''; ?>"
                data-amount="<?php echo esc_attr($preset); ?>"
                onclick="ntSelectAmountChip(this)">
            <?php echo number_format($preset, 0, ',', '.'); ?> ₫
        </button>
        <?php endforeach; ?>
    </div>

    <div class="nt-input-row">
        <div class="nt-input-group">
            <label class="nt-input-label" for="nt-custom-amount">Hoặc nhập số tiền khác</label>
            <input type="text" inputmode="numeric" id="nt-custom-amount" class="nt-input"
                   placeholder="Ví dụ: 300.000" oninput="ntOnCustomAmountInput(this)">
            <div class="nt-amount-hint" id="nt-amount-hint">
                Số tiền đã chọn: <strong id="nt-amount-display"><?php echo number_format($amount_presets[2], 0, ',', '.'); ?> ₫</strong>
            </div>
        </div>
    </div>
    <!-- Input ẩn để nap-tien.js đọc giá trị số tiền cuối cùng đã chọn -->
    <input type="hidden" id="nt-selected-amount" value="<?php echo esc_attr($amount_presets[2]); ?>">

    <div class="nt-section-title" style="margin-top:24px;">Phương thức nạp tiền</div>
    <div class="nt-section-sub">Bạn hãy chọn một trong các hình thức thanh toán dưới đây</div>

    <div class="nt-methods-grid">
        <?php foreach ($methods as $i => $m): ?>
        <div class="nt-method-card <?php echo $i === 0 ? 'selected' : ''; ?>"
             style="--ntc:<?php echo esc_attr($m['color']); ?>;"
             onclick="ntSelectMethod(this)"
             data-method="<?php echo esc_attr($m['id']); ?>"
             data-label="<?php echo esc_attr($m['label']); ?>">

            <div class="nt-method-icon" style="background:<?php echo esc_attr($m['bg']); ?>;">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="<?php echo esc_attr($m['color']); ?>"
                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <?php echo $m['svg']; ?>
                </svg>
            </div>

            <div class="nt-method-texts">
                <div class="nt-method-label"><?php echo esc_html($m['label']); ?></div>
                <div class="nt-method-desc"><?php echo esc_html($m['desc']); ?></div>
            </div>

            <div class="nt-check-dot">
                <svg width="9" height="9" viewBox="0 0 24 24" fill="none"
                     stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 6L9 17l-5-5"/>
                </svg>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="nt-bonus-box">
        <strong>🎁 Ưu đãi khi nạp tiền:</strong>
        <ul class="nt-bonus-list">
            <li>Nạp từ <strong>500.000 ₫</strong> — tặng thêm <strong>5%</strong> vào tài khoản khuyến mãi.</li>
            <li>Nạp từ <strong>2.000.000 ₫</strong> — tặng thêm <strong>12%</strong> vào tài khoản khuyến mãi.</li>
            <li>Lần đầu nạp tiền — tặng thêm <strong>50.000 ₫</strong> vào tài khoản khuyến mãi.</li>
        </ul>
    </div>

    <div class="ql-form-footer" style="margin-top:20px;">
        <button class="nt-submit-btn" onclick="ntSubmit()">
            Tiến hành nạp tiền
        </button>
    </div>

</div><!-- /.ql-panel-body -->

<?php get_template_part('payment/popup-payment'); ?>

<script>
window.ntSelectedMethod = '<?php echo esc_js($methods[0]['id']); ?>';
window.ntSelectedLabel  = '<?php echo esc_js($methods[0]['label']); ?>';

function ntSelectMethod(card) {
    document.querySelectorAll('.nt-method-card').forEach(function(c) {
        c.classList.remove('selected');
    });
    card.classList.add('selected');
    window.ntSelectedMethod = card.dataset.method;
    window.ntSelectedLabel  = card.dataset.label;
}

function ntSelectAmountChip(chip) {
    document.querySelectorAll('.nt-chip').forEach(function (c) {
        c.classList.remove('active');
    });
    chip.classList.add('active');

    var amount = parseInt(chip.dataset.amount, 10) || 0;
    document.getElementById('nt-selected-amount').value = amount;
    document.getElementById('nt-custom-amount').value = '';
    ntUpdateAmountDisplay(amount);
}

function ntOnCustomAmountInput(input) {
    document.querySelectorAll('.nt-chip').forEach(function (c) {
        c.classList.remove('active');
    });

    var raw = input.value.replace(/[^0-9]/g, '');
    var amount = parseInt(raw, 10) || 0;

    input.value = amount ? amount.toLocaleString('vi-VN') : '';
    document.getElementById('nt-selected-amount').value = amount;
    ntUpdateAmountDisplay(amount);
}

function ntUpdateAmountDisplay(amount) {
    var $hint = document.getElementById('nt-amount-hint');
    var $display = document.getElementById('nt-amount-display');

    if (!amount || amount < 10000) {
        $display.textContent = '0 ₫';
        $hint.classList.add('nt-error');
        $hint.innerHTML = 'Số tiền nạp tối thiểu là <strong>10.000 ₫</strong>.';
    } else {
        $hint.classList.remove('nt-error');
        $display.textContent = amount.toLocaleString('vi-VN') + ' ₫';
        $hint.innerHTML = 'Số tiền đã chọn: <strong id="nt-amount-display">' + amount.toLocaleString('vi-VN') + ' ₫</strong>';
    }
}
</script>