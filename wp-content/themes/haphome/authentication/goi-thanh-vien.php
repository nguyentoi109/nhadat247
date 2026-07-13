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

.gtv-vpill-post-vip {
	background: #fef3c7;
	color: #92400e;
}

.gtv-vpill-boost-vip {
	background: #ede9fe;
	color: #5b21b6;
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

.gtv-cur-none {
	--gtv-c: #9ca3af;
}

.gtv-cur-none-desc {
	font-size: 12px;
	color: var(--ql-muted);
	margin-top: 2px;
}

.gtv-expiry-notice {
	display: flex;
	align-items: flex-start;
	gap: 14px;
	background: linear-gradient(135deg, #fff7ed, #fff);
	border: 1.5px solid #fed7aa;
	border-radius: 12px;
	padding: 18px 20px;
	margin-bottom: 24px;
}

.gtv-expiry-icon {
	width: 40px;
	height: 40px;
	border-radius: 10px;
	background: #ffedd5;
	color: #c2410c;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-shrink: 0;
}

.gtv-expiry-title {
	font-size: 13px;
	font-weight: 700;
	color: #9a3412;
	margin-bottom: 4px;
}

.gtv-expiry-desc {
	font-size: 12px;
	color: #7c2d12;
	line-height: 1.6;
}

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

	.gtv-expiry-notice {
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
    $current_plan_info = ql_get_current_member_plan($user_id);

    $current_plan = $current_plan_info->plan_key ?? '';
    $plan_expiry  = $current_plan_info->expired_at ?? '';
    $has_plan     = !empty($current_plan);

    $plans = [
        'goi1' => [
            'id'           => 'goi1',
            'name'         => 'Gói Khởi Đầu',
            'desc'         => 'Người mới bắt đầu',
            'color'        => '#6b7280',
            'price_m'      => 149000,
            'badge'        => '',
            'rank'         => 1,
            'voucher_post_vip'   => 0,
            'voucher_boost_vip'  => 0,
            'features'     => [
                [true,  '15 Voucher giảm giá đăng tin thường'],
                [true,  '15 Voucher giảm giá đẩy tin thường'],
                [false, 'Voucher giảm giá đăng tin VIP'],
                [false, 'Voucher giảm giá đẩy tin VIP'],
            ],
            'cur_tags' => ['Voucher đăng tin thường', 'Voucher đẩy tin thường'],
        ],
        'goi2' => [
            'id'           => 'goi2',
            'name'         => 'Gói Nâng Cao',
            'desc'         => 'Môi giới cá nhân',
            'color'        => '#2563eb',
            'price_m'      => 299000,
            'badge'        => 'Phổ biến nhất',
            'rank'         => 2,
            'voucher_post_vip'   => 1,
            'voucher_boost_vip'  => 0,
            'features'     => [
                [true,  '30 Voucher giảm giá đăng tin thường'],
                [true,  '30 Voucher giảm giá đẩy tin thường'],
                [true,  '1 voucher giảm giá đăng tin VIP', true],
                [false, 'Voucher giảm giá đẩy tin VIP'],
            ],
            'cur_tags' => ['Voucher đăng tin thường', 'Voucher đẩy tin thường', '1 voucher đăng tin VIP'],
        ],
        'goi3' => [
            'id'           => 'goi3',
            'name'         => 'Gói Toàn Diện',
            'desc'         => 'Đại lý & doanh nghiệp',
            'color'        => '#ee0033',
            'price_m'      => 599000,
            'badge'        => 'Tốt nhất',
            'rank'         => 3,
            'voucher_post_vip'   => 3,
            'voucher_boost_vip'  => 5,
            'features'     => [
                [true,  '50 Voucher giảm giá đăng tin thường'],
                [true,  '50 Voucher giảm giá đẩy tin thường'],
                [true,  '3 voucher giảm giá đăng tin VIP', true],
                [true,  '5 voucher giảm giá đẩy tin VIP', true],
            ],
            'cur_tags' => ['Voucher đăng tin thường', 'Voucher đẩy tin thường', '3 voucher đăng tin VIP', '5 voucher đẩy tin VIP'],
        ],
    ];

    $cp = $has_plan && isset($plans[$current_plan]) ? $plans[$current_plan] : null;
    $current_rank = $cp ? $cp['rank'] : 0;

    $faqs = [
        ['Voucher đăng tin và voucher đẩy tin khác nhau như thế nào?',
        'Voucher đăng tin dùng để tạo tin mới miễn phí hoặc giảm giá phí dịch vụ. Voucher đẩy tin dùng để tăng thứ hạng hiển thị cho tin đã đăng, đưa tin lên đầu kết quả tìm kiếm trong một khoảng thời gian nhất định.'],
        ['Voucher tin thường và voucher tin VIP khác nhau như thế nào?',
        'Voucher tin thường áp dụng cho tin đăng/đẩy ở gói tin thường. Voucher tin VIP áp dụng riêng cho tin đăng ở các gói VIP (Bạc, Vàng, Kim Cương), giúp bạn tiết kiệm chi phí khi nâng cấp tin lên VIP.'],
        ['Voucher có hiệu lực trong bao lâu?',
        'Mỗi voucher có hiệu lực 30 ngày kể từ ngày bạn đăng ký gói thành viên. Sau 30 ngày voucher chưa sử dụng sẽ tự động hết hạn và không được hoàn lại hoặc chuyển sang chu kỳ tiếp theo.'],
        ['Tôi có thể nâng cấp hoặc hạ cấp gói bất cứ lúc nào không?',
        'Có thể nâng cấp lên gói cao hơn bất cứ lúc nào. Không thể đăng ký gói thấp hơn gói bạn đang sử dụng — bạn cần chờ gói hiện tại hết hạn trước.'],
        ['Nếu huỷ gói, tin đăng của tôi có bị xoá không?',
        'Không. Tin giữ nguyên đến ngày hết hạn đã đăng ký. Sau đó tin vẫn xuất hiện bình thường nhưng không còn được ưu tiên hiển thị.'],
        ['Thanh toán bằng những hình thức nào?',
        'Số dư tài khoản (nạp trước), chuyển khoản ngân hàng, ví điện tử (MoMo, ZaloPay, VNPay) hoặc thẻ tín dụng/ghi nợ nội địa và quốc tế.'],
    ];

    function gtv_fmt($n) {
        return $n > 0 ? number_format($n, 0, ',', '.') . ' ₫' : 'Miễn phí';
    }
?>

<div class="ql-panel-header">
    <h2 class="ql-panel-title">Gói thành viên</h2>
</div>

<div class="ql-panel-body">

    <?php if ($cp): ?>
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
        </div>
    </div>
    <?php else: ?>
    <div class="gtv-cur gtv-cur-none">
        <div class="gtv-cur-left">
            <div class="gtv-cur-icon" style="background:#9ca3af;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5">
                    <circle cx="12" cy="12" r="9"/><path d="M12 8v4M12 16h.01" stroke-linecap="round"/>
                </svg>
            </div>
            <div>
                <div class="gtv-cur-lbl">Gói hiện tại của bạn</div>
                <div class="gtv-cur-name">Chưa đăng ký gói nào</div>
                <div class="gtv-cur-none-desc">Chọn 1 trong 3 gói bên dưới để bắt đầu nhận voucher ưu đãi.</div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="gtv-section-title">Quyền lợi voucher theo gói</div>
    <div class="gtv-v-box">
        <div class="gtv-v-card">
            <div class="gtv-v-icon" style="background:#fde8ec;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ee0033" stroke-width="1.8">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <div class="gtv-v-title">🎟 Voucher tin thường</div>
                <div class="gtv-v-desc">Giảm 10% khi đăng tin và đẩy tin thường.<br>Áp dụng cho cả 3 gói thành viên.</div>
            </div>
        </div>
        <div class="gtv-v-card">
            <div class="gtv-v-icon" style="background:#fef3c7;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#92400e" stroke-width="1.8">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <div class="gtv-v-title">👑 Voucher đăng tin VIP</div>
                <div class="gtv-v-desc">Giảm 10% khi đăng tin ở các gói VIP.<br>Gói Nâng Cao: <strong>1 voucher</strong> · Gói Toàn Diện: <strong>3 voucher</strong></div>
            </div>
        </div>
        <div class="gtv-v-card">
            <div class="gtv-v-icon" style="background:#ede9fe;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#5b21b6" stroke-width="1.8">
                    <path d="M5 15l7-7 7 7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <div class="gtv-v-title">🚀 Voucher đẩy tin VIP</div>
                <div class="gtv-v-desc">Giảm 10% khi đẩy tin ở các gói VIP.<br>Gói Toàn Diện: <strong>5 voucher</strong></div>
            </div>
        </div>
    </div>

    <div style="text-align:center;margin-bottom:20px;">
        <div style="font-size:16px;font-weight:700;color:var(--ql-text);">Chọn gói phù hợp với bạn</div>
        <div style="font-size:12px;color:var(--ql-muted);margin-top:4px;">Đăng ký theo tháng, sử dụng linh hoạt</div>
    </div>

    <div class="gtv-grid">
        <?php foreach ($plans as $plan):
            $is_cur      = $has_plan && $plan['id'] === $current_plan;
            $is_downgrade = $has_plan && !$is_cur && $plan['rank'] < $current_rank;
            $price_m     = gtv_fmt($plan['price_m']);
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
                <span class="gtv-price-num"><?php echo esc_html($price_m); ?></span>
                <span class="gtv-price-per">&nbsp;/ tháng</span>
            </div>

            <div class="gtv-vpills">
                <span class="gtv-vpill gtv-vpill-post">🎟 Đăng tin thường</span>
                <span class="gtv-vpill gtv-vpill-boost">🚀 Đẩy tin thường</span>
                <?php if ($plan['voucher_post_vip'] > 0): ?>
                    <span class="gtv-vpill gtv-vpill-post-vip">👑 <?php echo $plan['voucher_post_vip']; ?> đăng tin VIP</span>
                <?php endif; ?>
                <?php if ($plan['voucher_boost_vip'] > 0): ?>
                    <span class="gtv-vpill gtv-vpill-boost-vip">🚀 <?php echo $plan['voucher_boost_vip']; ?> đẩy tin VIP</span>
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
            <?php else:
                $item_labels = array_map(function($t){ return $t; }, $plan['cur_tags']);
            ?>
                <button type="button"
                   class="gtv-btn bds-purchase-btn"
                   data-ajax-action="bds_upgrade_member_plan"
                   data-title="<?php echo esc_attr($plan['name']); ?>"
                   data-subtitle="Đăng ký gói thành viên hàng tháng"
                   data-price="<?php echo esc_attr(gtv_fmt($plan['price_m'])); ?> / tháng"
                   data-items='<?php echo esc_attr(wp_json_encode($item_labels)); ?>'
                   data-payload='<?php echo esc_attr(wp_json_encode(['plan' => $plan['id']])); ?>'
                   data-success-title="Đăng ký gói thành công!"
                   data-success-redirect=""
                   data-is-downgrade="<?php echo $is_downgrade ? '1' : '0'; ?>"
                   data-current-plan-name="<?php echo $cp ? esc_attr($cp['name']) : ''; ?>"
                   style="background:<?php echo esc_attr($plan['color']); ?>;">
                    Đăng ký gói này
                </button>
            <?php endif; ?>

        </div>
        <?php endforeach; ?>
    </div>

    <div class="gtv-expiry-notice">
        <div>
            <div class="gtv-expiry-title">⏰ Voucher có hiệu lực 30 ngày</div>
            <div class="gtv-expiry-desc">
                Toàn bộ voucher trong gói thành viên (đăng tin, đẩy tin, tin thường và tin VIP)
                sẽ có hiệu lực sử dụng trong vòng <strong>30 ngày kể từ ngày đăng ký gói</strong>.
                Voucher chưa sử dụng sau 30 ngày sẽ tự động hết hạn và không được hoàn lại hoặc chuyển sang chu kỳ tiếp theo.
                Hãy sử dụng voucher trước khi hết hạn để không bỏ lỡ ưu đãi.
            </div>
        </div>
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

<div class="confirm-popup">
    <?php get_template_part('popup/popup-confirm-purchase'); ?>
</div>

<div class="balance-popup">
    <?php get_template_part('authentication/popup-insufficient-balance'); ?>
</div>

<div class="downgrade-popup">
    <?php get_template_part('popup/popup-downgrade-blocked'); ?>
</div>

<script>
    function gtvFaq(i) {
        var item = document.getElementById('gtv-faq-' + i);
        var wasOpen = item.classList.contains('open');
        document.querySelectorAll('.gtv-faq-item').forEach(function(el) { el.classList.remove('open'); });
        if (!wasOpen) item.classList.add('open');
    }
</script>