<style>
.ql-filter-tab2 {
	display: flex;
	align-items: center;
	gap: 5px;
	padding: 5px 13px;
	border-radius: 20px;
	font-size: 12px;
	font-weight: 600;
	text-decoration: none;
	color: var(--ql-muted);
	border: 1px solid var(--ql-border);
	background: #fff;
	transition: all .2s;
}

.ql-filter-tab2:hover,
.ql-filter-tab2.active {
	background: var(--ql-red);
	color: #fff;
	border-color: var(--ql-red);
}

.ql-vtab-count {
	background: rgba(0, 0, 0, .1);
	border-radius: 10px;
	padding: 0 5px;
	font-size: 10px;
}

.ql-filter-tab2.active .ql-vtab-count {
	background: rgba(255, 255, 255, .3);
}

.ql-voucher-input-box {
	background: #f9fafb;
	border: 1px solid var(--ql-border);
	border-radius: 8px;
	padding: 16px;
	margin-bottom: 20px;
}

.ql-voucher-input-title {
	font-size: 13px;
	font-weight: 600;
	color: var(--ql-text);
	margin-bottom: 10px;
}

.ql-voucher-input-row {
	display: flex;
	gap: 8px;
}

.ql-voucher-list {
	display: flex;
	flex-direction: column;
	gap: 12px;
}

.ql-voucher-card {
	position: relative;
	display: flex;
	align-items: stretch;
	border: 1.5px solid var(--vc-border);
	border-radius: 10px;
	overflow: hidden;
	background: #fff;
}

.ql-vc-left {
	width: 90px;
	flex-shrink: 0;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	gap: 4px;
	color: #fff;
	padding: 18px 10px;
}

.ql-vc-discount {
	font-size: 24px;
	font-weight: 800;
	line-height: 1;
}

.ql-vc-dtype {
	font-size: 9px;
	font-weight: 700;
	letter-spacing: .8px;
	opacity: .9;
}

.ql-vc-notch-top,
.ql-vc-notch-bot {
	position: absolute;
	left: 81px;
	width: 18px;
	height: 18px;
	border-radius: 50%;
	background: #f3f4f6;
	border: 1.5px solid var(--vc-border);
	z-index: 2;
}

.ql-vc-notch-top {
	top: -9px;
}

.ql-vc-notch-bot {
	bottom: -9px;
}

.ql-vc-mid {
	flex: 1;
	padding: 14px 16px;
	border-left: 1.5px dashed var(--vc-border);
	min-width: 0;
}

.ql-vc-cat {
	font-size: 10px;
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: .6px;
	margin-bottom: 3px;
}

.ql-vc-title {
	font-size: 13px;
	font-weight: 700;
	color: var(--ql-text);
	margin-bottom: 4px;
}

.ql-vc-desc {
	font-size: 11px;
	color: var(--ql-muted);
	margin-bottom: 8px;
	line-height: 1.5;
}

.ql-vc-meta {
	display: flex;
	gap: 12px;
	flex-wrap: wrap;
	font-size: 10px;
	color: var(--ql-faint);
}

.ql-vc-right {
	flex-shrink: 0;
	width: 140px;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	gap: 10px;
	padding: 14px 16px;
	border-left: 1.5px dashed var(--vc-border);
}

.ql-vc-code {
	display: flex;
	align-items: center;
	gap: 5px;
	font-size: 11px;
	font-weight: 700;
	font-family: monospace;
	background: var(--vc-bg);
	color: var(--vc-accent);
	padding: 4px 10px;
	border-radius: 4px;
	cursor: pointer;
	user-select: none;
	transition: opacity .2s;
	white-space: nowrap;
	border: 1px dashed var(--vc-border);
}

.ql-vc-code:hover {
	opacity: .75;
}

.ql-vc-use-btn {
	border: none;
	border-radius: 6px;
	color: #fff;
	font-size: 12px;
	font-weight: 600;
	padding: 6px 18px;
	cursor: pointer;
	font-family: inherit;
	transition: opacity .2s;
	width: 100%;
}

.ql-vc-use-btn:hover {
	opacity: .85;
}

@media (max-width: 600px) {
	.ql-vc-right {
		width: 120px;
		padding: 12px 10px;
	}

	.ql-vc-left {
		width: 72px;
	}

	.ql-vc-notch-top,
	.ql-vc-notch-bot {
		left: 63px;
	}

	.ql-voucher-input-row {
		flex-direction: column;
	}
}
</style>

<?php
if (!defined('ABSPATH')) exit;

$custom_user = get_current_custom_user();
if (!$custom_user) {
    wp_redirect(home_url('/dang-nhap/?redirect=' . urlencode(get_permalink())));
    exit;
}
$user_id = (int) $custom_user->id;

$vtab = isset($_GET['vtab']) ? sanitize_key($_GET['vtab']) : 'available';
if (!in_array($vtab, ['available', 'used', 'expired'], true)) {
    $vtab = 'available';
}

// Toàn bộ SQL/logic nằm trong functions.php — ở đây chỉ gọi và nhận kết quả
$page_data        = ql_get_voucher_page_data($user_id, $vtab);
$current_vouchers = $page_data['vouchers'];
$vouchers_count   = $page_data['counts'];

$color_map = [
    'red'   => ['bg' => '#fee2e2', 'text' => '#991b1b', 'border' => '#fca5a5', 'accent' => '#ee0033'],
    'blue'  => ['bg' => '#dbeafe', 'text' => '#1e40af', 'border' => '#93c5fd', 'accent' => '#2563eb'],
    'green' => ['bg' => '#d1fae5', 'text' => '#065f46', 'border' => '#6ee7b7', 'accent' => '#10b981'],
    'gray'  => ['bg' => '#f3f4f6', 'text' => '#6b7280', 'border' => '#d1d5db', 'accent' => '#9ca3af'],
];
?>

<div class="ql-panel-header" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;">
    <h2 class="ql-panel-title">Voucher của tôi</h2>
    <div style="display:flex;gap:6px;">
        <?php
        $vtabs = ['available' => 'Khả dụng', 'used' => 'Đã dùng', 'expired' => 'Hết hạn'];
        foreach ($vtabs as $key => $label):
            $count = $vouchers_count[$key] ?? 0;
        ?>
            <a href="?tab=voucher&vtab=<?php echo esc_attr($key); ?>"
               class="ql-filter-tab2 <?php echo $vtab === $key ? 'active' : ''; ?>">
                <?php echo esc_html($label); ?>
                <?php if ($count > 0): ?>
                    <span class="ql-vtab-count"><?php echo (int) $count; ?></span>
                <?php endif; ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<div class="ql-panel-body">

    <div class="ql-voucher-input-box">
        <div class="ql-voucher-input-title">Nhập mã voucher</div>
        <div class="ql-voucher-input-row">
            <input type="text" class="ql-form-input" placeholder="Nhập mã khuyến mãi (VD: DTT-XXXXXXXX)" id="ql-voucher-code"
                   style="flex:1;" maxlength="50">
            <button class="ql-save-btn" style="white-space:nowrap;" onclick="applyVoucher()">Áp dụng</button>
        </div>
        <div id="ql-voucher-msg" style="font-size:12px;margin-top:6px;display:none;"></div>
    </div>

    <?php if (empty($current_vouchers)): ?>
        <div class="ql-empty">
            <div class="ql-empty-icon">
                <svg width="52" height="52" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                    <path d="M20 12a2 2 0 00-2-2V6H6v4a2 2 0 000 4v4h12v-4a2 2 0 002-2z"/>
                </svg>
            </div>
            <div class="ql-empty-title">Không có voucher nào</div>
            <div class="ql-empty-desc">Các voucher của bạn sẽ hiển thị tại đây.</div>
        </div>
    <?php else: ?>
        <div class="ql-voucher-list">
            <?php foreach ($current_vouchers as $vc):
                $c = $color_map[$vc['color']] ?? $color_map['gray'];
            ?>
            <div class="ql-voucher-card" style="--vc-border:<?php echo esc_attr($c['border']); ?>;--vc-bg:<?php echo esc_attr($c['bg']); ?>;--vc-accent:<?php echo esc_attr($c['accent']); ?>;">

                <div class="ql-vc-left" style="background:<?php echo esc_attr($c['accent']); ?>;">
                    <div class="ql-vc-discount"><?php echo esc_html($vc['discount']); ?></div>
                    <div class="ql-vc-dtype"><?php echo $vc['discount_type'] === 'percent' ? 'GIẢM' : 'TIỀN MẶT'; ?></div>
                </div>

                <div class="ql-vc-notch-top"></div>
                <div class="ql-vc-notch-bot"></div>

                <div class="ql-vc-mid">
                    <div class="ql-vc-cat" style="color:<?php echo esc_attr($c['accent']); ?>;"><?php echo esc_html($vc['category']); ?></div>
                    <div class="ql-vc-title"><?php echo esc_html($vc['title']); ?></div>
                    <div class="ql-vc-desc"><?php echo esc_html($vc['desc']); ?></div>
                    <div class="ql-vc-meta">
                        <?php if (!empty($vc['min_order'])): ?>
                            <span>Đơn tối thiểu: <?php echo esc_html($vc['min_order']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($vc['expires'])): ?>
                            <span>HSD: <?php echo esc_html($vc['expires']); ?></span>
                        <?php elseif (!empty($vc['used_date'])): ?>
                            <span>Đã dùng: <?php echo esc_html($vc['used_date']); ?></span>
                        <?php endif; ?>
                        <?php if ($vc['quantity'] > 0): ?>
                            <span>Còn lại: <strong><?php echo (int) $vc['quantity']; ?></strong> lượt</span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="ql-vc-right">
                    <div class="ql-vc-code" onclick="copyCode(this)" data-code="<?php echo esc_attr($vc['code']); ?>">
                        <span class="ql-vc-code-text"><?php echo esc_html($vc['code']); ?></span>
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M17.5 14H19A2 2 0 0021 12V5A2 2 0 0019 3h-7a2 2 0 00-2 2v1.5M5 21h7a2 2 0 002-2v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <?php if ($vtab === 'available'): ?>
                        <button class="ql-vc-use-btn" style="background:<?php echo esc_attr($c['accent']); ?>;">Dùng ngay</button>
                    <?php elseif ($vtab === 'used'): ?>
                        <span class="ql-badge ql-badge-blue">Đã sử dụng</span>
                    <?php else: ?>
                        <span class="ql-badge ql-badge-gray">Hết hạn</span>
                    <?php endif; ?>
                </div>

            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<script>
function copyCode(el) {
    const code = el.dataset.code;
    navigator.clipboard.writeText(code).then(() => {
        const txt = el.querySelector('.ql-vc-code-text');
        if (txt) { const orig = txt.textContent; txt.textContent = '✓ Đã sao chép'; setTimeout(() => { txt.textContent = orig; }, 1500); }
    });
}

function applyVoucher() {
    const code = document.getElementById('ql-voucher-code').value.trim();
    const msg  = document.getElementById('ql-voucher-msg');

    if (!code) {
        msg.style.display = 'block'; msg.style.color = '#991b1b';
        msg.textContent = 'Vui lòng nhập mã voucher.';
        return;
    }

    if (typeof qlt_voucher_ajax === 'undefined') {
        msg.style.display = 'block'; msg.style.color = '#991b1b';
        msg.textContent = 'Thiếu cấu hình AJAX, vui lòng tải lại trang.';
        return;
    }

    msg.style.display = 'block'; msg.style.color = '#065f46';
    msg.textContent = 'Đang kiểm tra mã...';

    fetch(qlt_voucher_ajax.ajax_url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'action=ql_check_voucher_code&code=' + encodeURIComponent(code) + '&_nonce=' + encodeURIComponent(qlt_voucher_ajax.nonce)
    })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                msg.style.color = '#065f46';
                msg.textContent = data.data.message;
            } else {
                msg.style.color = '#991b1b';
                msg.textContent = data.data.message;
            }
        })
        .catch(() => {
            msg.style.color = '#991b1b';
            msg.textContent = 'Không thể kết nối máy chủ, vui lòng thử lại.';
        });
}
</script>