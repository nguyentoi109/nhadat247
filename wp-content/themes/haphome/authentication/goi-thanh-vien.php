<?php
    if (!defined('ABSPATH')) exit;

    $user_id      = get_current_user_id();
    $current_plan = get_user_meta($user_id, 'member_plan',  true) ?: 'free';
    $plan_expiry  = get_user_meta($user_id, 'plan_expiry',  true) ?: '';

    $plans = [
        'free' => [
            'id'           => 'free',
            'name'         => 'Cơ bản',
            'desc'         => 'Người mới bắt đầu',
            'color'        => '#6b7280',
            'price_m'      => 0,
            'price_y'      => 0,
            'badge'        => '',
            'voucher_post' => 0,
            'voucher_boost'=> 0,
            'features'     => [
                [true,  '3 tin đăng / tháng'],
                [true,  'Hiển thị 30 ngày'],
                [true,  'Thông tin liên hệ cơ bản'],
                [false, 'Voucher đăng tin'],
                [false, 'Voucher đẩy tin'],
                [false, 'Ưu tiên hiển thị'],
                [false, 'Thống kê tin đăng'],
                [false, 'Nhãn "Chủ nhà uy tín"'],
            ],
            'cur_tags' => ['3 tin / tháng', 'Hiển thị 30 ngày'],
        ],
        'pro' => [
            'id'           => 'pro',
            'name'         => 'Chuyên nghiệp',
            'desc'         => 'Môi giới cá nhân',
            'color'        => '#2563eb',
            'price_m'      => 299000,
            'price_y'      => 239000,
            'badge'        => 'Phổ biến nhất',
            'voucher_post' => 5,
            'voucher_boost'=> 3,
            'features'     => [
                [true,  'Không giới hạn tin đăng'],
                [true,  'Hiển thị 90 ngày'],
                [true,  'Thông tin liên hệ đầy đủ'],
                [true,  '5 voucher đăng tin / tháng', true],
                [true,  '3 voucher đẩy tin / tháng', true],
                [true,  'Ưu tiên hiển thị ×2'],
                [true,  'Thống kê tin đăng'],
                [false, 'Nhãn "Chủ nhà uy tín"'],
            ],
            'cur_tags' => ['Không giới hạn', 'Hiển thị 90 ngày', '5 voucher đăng', '3 voucher đẩy'],
        ],
        'vip' => [
            'id'           => 'vip',
            'name'         => 'VIP',
            'desc'         => 'Đại lý & doanh nghiệp',
            'color'        => '#ee0033',
            'price_m'      => 599000,
            'price_y'      => 479000,
            'badge'        => 'Tốt nhất',
            'voucher_post' => 15,
            'voucher_boost'=> 10,
            'features'     => [
                [true,  'Không giới hạn tin đăng'],
                [true,  'Hiển thị 180 ngày'],
                [true,  'Thông tin liên hệ đầy đủ'],
                [true,  '15 voucher đăng tin / tháng', true],
                [true,  '10 voucher đẩy tin / tháng', true],
                [true,  'Ưu tiên hiển thị ×5'],
                [true,  'Thống kê nâng cao + hỗ trợ 24/7'],
                [true,  'Nhãn "Chủ nhà uy tín"', true],
            ],
            'cur_tags' => ['Không giới hạn', 'Hiển thị 180 ngày', '15 voucher đăng', '10 voucher đẩy', 'Nhãn uy tín'],
        ],
    ];

    $faqs = [
        ['Voucher đăng tin và voucher đẩy tin khác nhau như thế nào?',
        'Voucher đăng tin dùng để tạo tin mới miễn phí hoặc giảm giá phí dịch vụ. Voucher đẩy tin dùng để tăng thứ hạng hiển thị cho tin đã đăng, đưa tin lên đầu kết quả tìm kiếm trong một khoảng thời gian nhất định.'],
        ['Voucher hàng tháng có được cộng dồn không?',
        'Voucher được cấp đầu mỗi chu kỳ thanh toán, có hiệu lực 30 ngày và không chuyển sang tháng tiếp theo. Hãy sử dụng trước khi hết hạn.'],
        ['Tôi có thể nâng cấp hoặc hạ cấp gói bất cứ lúc nào không?',
        'Có. Nâng cấp áp dụng ngay — phần chênh lệch phí tính theo số ngày còn lại trong chu kỳ. Hạ cấp áp dụng từ chu kỳ tiếp theo, quyền lợi hiện tại vẫn giữ đến hết hạn.'],
        ['Nếu huỷ gói, tin đăng của tôi có bị xoá không?',
        'Không. Tin giữ nguyên đến ngày hết hạn đã đăng ký. Sau đó tin vẫn xuất hiện bình thường nhưng không còn được ưu tiên hiển thị.'],
        ['Thanh toán bằng những hình thức nào?',
        'Số dư tài khoản (nạp trước), chuyển khoản ngân hàng, ví điện tử (MoMo, ZaloPay, VNPay) hoặc thẻ tín dụng/ghi nợ nội địa và quốc tế.'],
        ['Nhãn "Chủ nhà uy tín" có ý nghĩa gì?',
        'Nhãn hiển thị trên tất cả tin đăng, giúp tăng độ tin cậy với người mua/thuê. Đây là xác nhận tài khoản đã được xác minh danh tính và có lịch sử giao dịch tốt trên nền tảng.'],
    ];

    $cp = $plans[$current_plan];

    function gtv_fmt($n) {
        return $n > 0 ? number_format($n, 0, ',', '.') . ' ₫' : 'Miễn phí';
    }
?>

<style>
.gtv-cur {
	display: flex;
	align-items: center;
	justify-content: space-between;
	gap: 12px;
	flex-wrap: wrap;
	border: 1.5px solid var(--gtv-c, #6b7280);
	border-radius: 10px;
	padding: 16px 20px;
	margin-bottom: 20px;
	background: var(--ql-white);
}

.gtv-cur-left {
	display: flex;
	align-items: center;
	gap: 12px;
}

.gtv-cur-icon {
	width: 44px;
	height: 44px;
	border-radius: 8px;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-shrink: 0;
}

.gtv-cur-lbl {
	font-size: 11px;
	color: var(--ql-muted);
	margin-bottom: 2px;
}

.gtv-cur-name {
	font-size: 15px;
	font-weight: 700;
	color: var(--ql-text);
}

.gtv-cur-exp {
	font-size: 11px;
	color: var(--ql-faint);
	margin-top: 2px;
}

.gtv-cur-tags {
	display: flex;
	gap: 6px;
	flex-wrap: wrap;
}

.gtv-cur-tag {
	font-size: 11px;
	font-weight: 600;
	padding: 3px 10px;
	border-radius: 20px;
	background: var(--ql-white);
	border: 1px solid;
}

.gtv-v-box {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 10px;
	margin-bottom: 24px;
}

.gtv-v-card {
	display: flex;
	align-items: center;
	gap: 10px;
	background: #f9fafb;
	border: 1px solid var(--ql-border);
	border-radius: 8px;
	padding: 14px;
}

.gtv-v-icon {
	width: 38px;
	height: 38px;
	border-radius: 8px;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-shrink: 0;
}

.gtv-v-title {
	font-size: 13px;
	font-weight: 700;
	color: var(--ql-text);
	margin-bottom: 3px;
}

.gtv-v-desc {
	font-size: 11px;
	color: var(--ql-muted);
	line-height: 1.5;
}

.gtv-billing {
	display: flex;
	background: #f3f4f6;
	border-radius: 8px;
	padding: 3px;
	width: fit-content;
	margin: 12px auto 20px;
}

.gtv-billing-btn {
	padding: 7px 18px;
	border-radius: 6px;
	border: none;
	background: none;
	font-size: 13px;
	font-weight: 600;
	color: var(--ql-muted);
	cursor: pointer;
	font-family: inherit;
	transition: all .15s;
	display: flex;
	align-items: center;
	gap: 6px;
}

.gtv-billing-btn.active {
	background: #fff;
	color: var(--ql-text);
	box-shadow: 0 1px 4px rgba(0, 0, 0, .08);
}

.gtv-save-tag {
	background: #d1fae5;
	color: #065f46;
	font-size: 10px;
	font-weight: 700;
	padding: 1px 6px;
	border-radius: 4px;
}

.gtv-grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 12px;
	margin-bottom: 24px;
}

.gtv-card {
	background: #fff;
	border: 1.5px solid var(--ql-border);
	border-radius: 12px;
	padding: 20px 18px 18px;
	display: flex;
	flex-direction: column;
	position: relative;
	transition: box-shadow .2s, border-color .2s;
}

.gtv-card:hover {
	box-shadow: 0 4px 16px rgba(0, 0, 0, .07);
}

.gtv-card.featured {
	border-color: #2563eb;
	border-width: 2px;
}

.gtv-card.is-active {
	border-width: 2px;
	border-color: var(--gtvc, #6b7280);
}

.gtv-pop-badge {
	position: absolute;
	top: -12px;
	left: 50%;
	transform: translateX(-50%);
	background: #2563eb;
	color: #fff;
	font-size: 10px;
	font-weight: 700;
	padding: 3px 14px;
	border-radius: 20px;
	white-space: nowrap;
}

.gtv-best-badge {
	position: absolute;
	top: -12px;
	left: 50%;
	transform: translateX(-50%);
	background: #ee0033;
	color: #fff;
	font-size: 10px;
	font-weight: 700;
	padding: 3px 14px;
	border-radius: 20px;
	white-space: nowrap;
}

.gtv-card-name {
	font-size: 14px;
	font-weight: 700;
	margin-bottom: 2px;
}

.gtv-card-desc {
	font-size: 11px;
	color: var(--ql-muted);
	margin-bottom: 12px;
}

.gtv-price-row {
	display: flex;
	align-items: baseline;
	gap: 3px;
	margin-bottom: 14px;
}

.gtv-price-num {
	font-size: 26px;
	font-weight: 800;
	color: var(--ql-text);
}

.gtv-price-per {
	font-size: 12px;
	color: var(--ql-faint);
}

.gtv-vpills {
	display: flex;
	gap: 5px;
	flex-wrap: wrap;
	margin-bottom: 12px;
	min-height: 26px;
}

.gtv-vpill {
	font-size: 11px;
	font-weight: 600;
	padding: 3px 9px;
	border-radius: 20px;
	display: inline-flex;
	align-items: center;
	gap: 4px;
}

.gtv-vpill-post {
	background: #fde8ec;
	color: #ee0033;
}

.gtv-vpill-boost {
	background: #dbeafe;
	color: #1e40af;
}

.gtv-divider {
	height: 1px;
	background: #f3f4f6;
	margin: 0 0 14px;
}

.gtv-feats {
	list-style: none;
	padding: 0;
	margin: 0 0 16px;
	flex: 1;
	display: flex;
	flex-direction: column;
	gap: 7px;
}

.gtv-feats li {
	display: flex;
	align-items: flex-start;
	gap: 7px;
	font-size: 12px;
	color: var(--ql-muted);
}

.gtv-feats li.ok {
	color: var(--ql-text);
}

.gtv-feat-ico {
	flex-shrink: 0;
	font-size: 13px;
	margin-top: 1px;
	line-height: 1.5;
}

.gtv-feat-hi {
	font-weight: 700;
}

.gtv-btn {
	display: block;
	text-align: center;
	padding: 9px;
	border-radius: 6px;
	font-family: inherit;
	font-size: 13px;
	font-weight: 700;
	text-decoration: none;
	transition: all .2s;
	border: none;
	cursor: pointer;
	color: #fff;
}

.gtv-btn:hover {
	opacity: .88;
}

.gtv-btn-gray {
	background: #f3f4f6;
	color: var(--ql-faint);
	cursor: default;
}

.gtv-cmp {
	width: 100%;
	border-collapse: collapse;
	font-size: 12px;
	margin-bottom: 24px;
}

.gtv-cmp th {
	padding: 9px 10px;
	background: #f9fafb;
	border-bottom: 1px solid var(--ql-border);
	font-size: 11px;
	font-weight: 600;
	color: var(--ql-muted);
	text-align: center;
}

.gtv-cmp th:first-child {
	text-align: left;
}

.gtv-cmp td {
	padding: 9px 10px;
	border-bottom: 1px solid #f3f4f6;
	color: var(--ql-text);
	text-align: center;
}

.gtv-cmp td:first-child {
	text-align: left;
	font-size: 12px;
	color: var(--ql-muted);
}

.gtv-cmp tr:last-child td {
	border-bottom: none;
}

.gtv-cmp tr:hover td {
	background: #fafafa;
}

.gtv-cmp .hl {
	background: #fffbfb;
}

.gtv-ck {
	color: #059669;
	font-weight: 700;
}

.gtv-cr {
	color: #d1d5db;
}

/* ── FAQ ── */
.gtv-faq-item {
	border: 1px solid var(--ql-border);
	border-radius: 8px;
	margin-bottom: 6px;
	overflow: hidden;
}

.gtv-faq-q {
	display: flex;
	justify-content: space-between;
	align-items: center;
	gap: 12px;
	padding: 13px 15px;
	cursor: pointer;
	font-size: 13px;
	font-weight: 600;
	color: var(--ql-text);
	transition: background .15s;
	background: #fff;
}

.gtv-faq-q:hover {
	background: #f9fafb;
}

.gtv-faq-a {
	max-height: 0;
	overflow: hidden;
	transition: max-height .3s ease;
	font-size: 13px;
	color: var(--ql-muted);
	line-height: 1.7;
	background: #fafafa;
	padding: 0 15px;
}

.gtv-faq-item.open .gtv-faq-a {
	max-height: 200px;
	padding: 12px 15px 14px;
}

.gtv-faq-arrow {
	flex-shrink: 0;
	color: var(--ql-faint);
	transition: transform .25s;
}

.gtv-faq-item.open .gtv-faq-arrow {
	transform: rotate(180deg);
}

.gtv-note {
	display: flex;
	align-items: center;
	gap: 8px;
	font-size: 12px;
	color: var(--ql-muted);
	background: #f9fafb;
	border: 1px solid var(--ql-border);
	border-radius: 8px;
	padding: 11px 14px;
	margin-top: 20px;
}

.gtv-section-title {
	font-size: 14px;
	font-weight: 700;
	color: var(--ql-text);
	margin-bottom: 14px;
}

@media(max-width:700px) {
	.gtv-grid {
		grid-template-columns: 1fr;
	}

	.gtv-v-box {
		grid-template-columns: 1fr;
	}

	.gtv-cur {
		flex-direction: column;
		align-items: flex-start;
	}
}
</style>

<div class="ql-panel-header">
    <h2 class="ql-panel-title">Gói thành viên</h2>
</div>

<div class="ql-panel-body">

    <div class="gtv-cur" style="--gtv-c:<?php echo esc_attr($cp['color']); ?>;">
        <div class="gtv-cur-left">
            <div class="gtv-cur-icon" style="background:<?php echo esc_attr($cp['color']); ?>;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5">
                    <path d="M12 2l3 6 6 .8-4.5 4.3 1.1 6.1L12 16.8 6.4 19.2l1.1-6.1L3 8.8 9 8z" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <div class="gtv-cur-lbl">Gói hiện tại của bạn</div>
                <div class="gtv-cur-name"><?php echo esc_html($cp['name']); ?></div>
                <div class="gtv-cur-exp">
                    <?php if ($plan_expiry): ?>
                        Hết hạn: <?php echo esc_html($plan_expiry); ?>
                    <?php elseif ($current_plan === 'free'): ?>
                        Không giới hạn thời gian
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="gtv-cur-tags">
            <?php foreach ($cp['cur_tags'] as $tag): ?>
                <span class="gtv-cur-tag" style="border-color:<?php echo esc_attr($cp['color']); ?>;color:<?php echo esc_attr($cp['color']); ?>;">
                    ✓ <?php echo esc_html($tag); ?>
                </span>
            <?php endforeach; ?>
            <?php if ($current_plan !== 'free'): ?>
                <a href="<?php echo esc_url(add_query_arg('cancel_plan', '1', home_url('/quan-ly-tai-khoan/goi-thanh-vien/'))); ?>"
                   style="font-size:11px;font-weight:600;color:var(--ql-faint);text-decoration:underline;align-self:center;margin-left:4px;"
                   onclick="return confirm('Bạn có chắc muốn huỷ gia hạn không?')">
                   Huỷ gia hạn
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="gtv-section-title">Quyền lợi voucher theo gói</div>
    <div class="gtv-v-box">
        <div class="gtv-v-card">
            <div class="gtv-v-icon" style="background:#fde8ec;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ee0033" stroke-width="1.8">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <div class="gtv-v-title">🎟 Voucher đăng tin</div>
                <div class="gtv-v-desc">Miễn phí / giảm giá khi tạo tin mới.<br>Pro: <strong>5 voucher</strong> · VIP: <strong>15 voucher</strong> / tháng</div>
            </div>
        </div>
        <div class="gtv-v-card">
            <div class="gtv-v-icon" style="background:#dbeafe;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1e40af" stroke-width="1.8">
                    <path d="M5 15l7-7 7 7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <div class="gtv-v-title">🚀 Voucher đẩy tin</div>
                <div class="gtv-v-desc">Đưa tin lên đầu tìm kiếm miễn phí.<br>Pro: <strong>3 voucher</strong> · VIP: <strong>10 voucher</strong> / tháng</div>
            </div>
        </div>
    </div>

    <div style="text-align:center;margin-bottom:8px;">
        <div style="font-size:16px;font-weight:700;color:var(--ql-text);">Chọn gói phù hợp với bạn</div>
        <div style="font-size:12px;color:var(--ql-muted);margin-top:4px;">Thanh toán hàng năm tiết kiệm đến 20%</div>
    </div>
    <div class="gtv-billing">
        <button class="gtv-billing-btn active" data-billing="monthly">Hàng tháng</button>
        <button class="gtv-billing-btn" data-billing="yearly">
            Hàng năm <span class="gtv-save-tag">–20%</span>
        </button>
    </div>

    <div class="gtv-grid">
        <?php foreach ($plans as $plan):
            $is_cur    = $plan['id'] === $current_plan;
            $price_m   = gtv_fmt($plan['price_m']);
            $price_y   = gtv_fmt($plan['price_y']);
        ?>
        <div class="gtv-card <?php echo $is_cur ? 'is-active' : ''; ?> <?php echo $plan['badge'] === 'Phổ biến nhất' ? 'featured' : ''; ?>"
             style="--gtvc:<?php echo esc_attr($plan['color']); ?>;">

            <?php if ($plan['badge'] === 'Phổ biến nhất'): ?>
                <div class="gtv-pop-badge">Phổ biến nhất</div>
            <?php elseif ($plan['badge'] === 'Tốt nhất'): ?>
                <div class="gtv-best-badge">Tốt nhất</div>
            <?php endif; ?>

            <div class="gtv-card-name" style="color:<?php echo esc_attr($plan['color']); ?>;">
                <?php echo esc_html($plan['name']); ?>
            </div>
            <div class="gtv-card-desc"><?php echo esc_html($plan['desc']); ?></div>

            <div class="gtv-price-row">
                <span class="gtv-price-num"
                      data-monthly="<?php echo esc_attr($price_m); ?>"
                      data-yearly="<?php echo esc_attr($price_y); ?>">
                    <?php echo esc_html($price_m); ?>
                </span>
                <?php if ($plan['price_m'] > 0): ?>
                    <span class="gtv-price-per"
                          data-monthly="/ tháng"
                          data-yearly="/ tháng (tính năm)">
                        &nbsp;/ tháng
                    </span>
                <?php endif; ?>
            </div>

            <div class="gtv-vpills">
                <?php if ($plan['voucher_post'] > 0): ?>
                    <span class="gtv-vpill gtv-vpill-post">🎟 <?php echo $plan['voucher_post']; ?> đăng tin</span>
                    <span class="gtv-vpill gtv-vpill-boost">🚀 <?php echo $plan['voucher_boost']; ?> đẩy tin</span>
                <?php endif; ?>
            </div>

            <div class="gtv-divider"></div>

            <ul class="gtv-feats">
                <?php foreach ($plan['features'] as $feat):
                    [$ok, $txt] = $feat;
                    $hi = $feat[2] ?? false;
                ?>
                    <li class="<?php echo $ok ? 'ok' : ''; ?>">
                        <span class="gtv-feat-ico" style="color:<?php echo $ok ? esc_attr($plan['color']) : '#d1d5db'; ?>;">
                            <?php echo $ok ? '✓' : '✗'; ?>
                        </span>
                        <span class="<?php echo $hi ? 'gtv-feat-hi' : ''; ?>"><?php echo esc_html($txt); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>

            <?php if ($is_cur): ?>
                <button class="gtv-btn gtv-btn-gray" disabled>Đang sử dụng</button>
            <?php elseif ($plan['id'] === 'free'): ?>
                <a href="<?php echo esc_url(add_query_arg('downgrade', 'free', home_url('/quan-ly-tai-khoan/goi-thanh-vien/'))); ?>"
                   class="gtv-btn"
                   style="background:#fff;color:var(--ql-muted);border:1.5px solid var(--ql-border);">
                   Hạ xuống miễn phí
                </a>
            <?php else: ?>
                <a href="<?php echo esc_url(add_query_arg('upgrade', $plan['id'], home_url('/quan-ly-tai-khoan/nap-tien/'))); ?>"
                   class="gtv-btn"
                   style="background:<?php echo esc_attr($plan['color']); ?>;">
                    <?php echo $current_plan === 'free' ? 'Nâng cấp ngay' : 'Chuyển sang gói này'; ?>
                </a>
            <?php endif; ?>

        </div>
        <?php endforeach; ?>
    </div>

    <div class="gtv-section-title">So sánh chi tiết các gói</div>
    <div style="overflow-x:auto;margin-bottom:24px;">
        <table class="gtv-cmp">
            <thead>
                <tr>
                    <th style="width:38%;">Tính năng</th>
                    <th>Cơ bản</th>
                    <th class="hl">Chuyên nghiệp</th>
                    <th>VIP</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rows = [
                    ['Tin đăng / tháng',        '3 tin',          'Không giới hạn',     'Không giới hạn'],
                    ['Thời hạn hiển thị',        '30 ngày',        '90 ngày',            '180 ngày'],
                    ['Voucher đăng tin / tháng', '—',              '5 voucher',          '15 voucher'],
                    ['Voucher đẩy tin / tháng',  '—',              '3 voucher',          '10 voucher'],
                    ['Ưu tiên hiển thị',         false,            '×2',                 '×5'],
                    ['Thông tin liên hệ',         'Cơ bản',         'Đầy đủ',             'Đầy đủ'],
                    ['Thống kê tin đăng',         false,            true,                 'Nâng cao'],
                    ['Hỗ trợ ưu tiên 24/7',      false,            false,                true],
                    ['Nhãn "Chủ nhà uy tín"',    false,            false,                true],
                    ['Tự động gia hạn tin',       false,            false,                true],
                ];
                foreach ($rows as [$feat,$f,$p,$v]):
                    $cell = fn($val) => match(true) {
                        $val === true  => '<span class="gtv-ck">✓</span>',
                        $val === false => '<span class="gtv-cr">—</span>',
                        default        => esc_html($val),
                    };
                ?>
                <tr>
                    <td><?php echo esc_html($feat); ?></td>
                    <td><?php echo $cell($f); ?></td>
                    <td class="hl"><?php echo $cell($p); ?></td>
                    <td><?php echo $cell($v); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="gtv-section-title">❓ Câu hỏi thường gặp</div>
    <?php foreach ($faqs as $i => [$q, $a]): ?>
    <div class="gtv-faq-item" id="gtv-faq-<?php echo $i; ?>">
        <div class="gtv-faq-q" onclick="gtvFaq(<?php echo $i; ?>)">
            <span><?php echo esc_html($q); ?></span>
            <svg class="gtv-faq-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M6 9l6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="gtv-faq-a"><?php echo esc_html($a); ?></div>
    </div>
    <?php endforeach; ?>

    <div class="gtv-note">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="flex-shrink:0;">
            <circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01" stroke-linecap="round"/>
        </svg>
        Giá chưa bao gồm VAT 10%. Thanh toán qua số dư, chuyển khoản, MoMo, ZaloPay, VNPay hoặc thẻ tín dụng.
        <a href="<?php echo esc_url(home_url('/quan-ly-tai-khoan/nap-tien/')); ?>"
           style="color:var(--ql-red);font-weight:600;margin-left:4px;white-space:nowrap;">
           Nạp tiền →
        </a>
    </div>

</div>

<script>
    document.querySelectorAll('.gtv-billing-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.gtv-billing-btn').forEach(function(b) { b.classList.remove('active'); });
            btn.classList.add('active');
            var type = btn.dataset.billing;
            document.querySelectorAll('.gtv-price-num[data-monthly]').forEach(function(el) {
                el.textContent = type === 'yearly' ? el.dataset.yearly : el.dataset.monthly;
            });
            document.querySelectorAll('.gtv-price-per[data-monthly]').forEach(function(el) {
                el.textContent = '\u00a0' + (type === 'yearly' ? el.dataset.yearly : el.dataset.monthly);
            });
        });
    });

    function gtvFaq(i) {
        var item = document.getElementById('gtv-faq-' + i);
        var wasOpen = item.classList.contains('open');
        document.querySelectorAll('.gtv-faq-item').forEach(function(el) { el.classList.remove('open'); });
        if (!wasOpen) item.classList.add('open');
    }
</script>