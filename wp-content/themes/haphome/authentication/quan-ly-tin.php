<style>
.qlt-tabs {
	display: flex;
	gap: 0;
	margin-bottom: -1px;
}

.qlt-tab-btn {
	padding: 10px 18px;
	font-size: 13px;
	font-weight: 500;
	color: #6b7280;
	cursor: pointer;
	border: none;
	background: none;
	font-family: inherit;
	display: inline-flex;
	align-items: center;
	gap: 6px;
	border-bottom: 2px solid transparent;
	transition: color .2s;
	text-decoration: none;
}

.qlt-tab-btn:hover {
	color: #ee0033;
}

.qlt-tab-btn.active {
	color: #ee0033;
	font-weight: 600;
	border-bottom-color: #ee0033;
}

.qlt-count-badge {
	background: #f3f4f6;
	color: #6b7280;
	font-size: 10px;
	font-weight: 700;
	padding: 1px 7px;
	border-radius: 20px;
}

.qlt-tab-btn.active .qlt-count-badge {
	background: #fde8ec;
	color: #ee0033;
}

.qlt-toolbar {
	display: flex;
	justify-content: space-between;
	align-items: center;
	gap: 10px;
	margin-bottom: 16px;
	flex-wrap: wrap;
}

.qlt-search {
	position: relative;
}

.qlt-search svg {
	position: absolute;
	left: 10px;
	top: 50%;
	transform: translateY(-50%);
	pointer-events: none;
}

.qlt-search input {
	padding: 8px 11px 8px 34px;
	border: 1.5px solid #e8e8e8;
	border-radius: 6px;
	font-family: inherit;
	font-size: 13px;
	color: #0d1011;
	background: #fff;
	outline: none;
	width: 220px;
	transition: border-color .2s;
}

.qlt-search input:focus {
	border-color: #ee0033;
}

.qlt-new-btn {
	display: inline-flex;
	align-items: center;
	gap: 6px;
	padding: 8px 18px;
	background: #00A86B;
	color: #fff;
	border-radius: 6px;
	font-size: 13px;
	font-weight: 600;
	text-decoration: none;
	border: none;
	cursor: pointer;
	transition: background .2s;
	white-space: nowrap;
}

.qlt-new-btn:hover {
	background: #008a5a;
    color: #fff;
}

.qlt-card {
	border: 1px solid #e8e8e8;
	border-radius: 10px;
	margin-bottom: 12px;
	background: #fff;
	transition: box-shadow .2s;
    overflow: hidden; 
}
.qlt-card {
	margin-bottom: 16px;   
}

.qlt-card:hover {
	box-shadow: 0 3px 12px rgba(0, 0, 0, .07);
}

.qlt-card-top {
	border-radius: 10px 10px 0 0;
	overflow: hidden;
}

.qlt-card-top {
	display: grid;
	grid-template-columns: 1fr 1px 1fr;
	min-height: 110px;
}

.qlt-card-left {
	display: flex;
	gap: 12px;
	padding: 16px;
	align-items: flex-start;
}

.qlt-thumb {
	width: 130px;
	height: 100px;
	border-radius: 7px;
	flex-shrink: 0;
	overflow: hidden;
	background: #f3f4f6;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 24px;
	position: relative;
}

.qlt-thumb img {
	width: 100%;
	height: 100%;
	object-fit: cover;
}

.qlt-thumb-badge {
	position: absolute;
	top: 5px;
	left: 5px;
	background: #ee0033;
	color: #fff;
	font-size: 10px;
	font-weight: 700;
	padding: 2px 7px;
	border-radius: 4px;
}

.qlt-thumb-badge.yellow {
	background: #f59e0b;
}

.qlt-info {
	flex: 1;
	min-width: 0;
}

.qlt-status-row {
	display: flex;
	align-items: center;
	gap: 6px;
	margin-bottom: 5px;
}

.qlt-status-dot {
	width: 8px;
	height: 8px;
	border-radius: 50%;
	flex-shrink: 0;
}

.qlt-status-dot.green {
	background: #16a34a;
}

.qlt-status-dot.yellow {
	background: #f59e0b;
}

.qlt-status-dot.red {
	background: #dc2626;
}

.qlt-status-text {
	font-size: 12px;
	font-weight: 600;
}

.qlt-status-text.green {
	color: #16a34a;
}

.qlt-status-text.yellow {
	color: #f59e0b;
}

.qlt-status-text.red {
	color: #dc2626;
}

.qlt-title {
	font-size: 14px;
	font-weight: 600;
	color: #0d1011;
	display: -webkit-box;
	-webkit-line-clamp: 2;
	-webkit-box-orient: vertical;
	overflow: hidden;
	margin-bottom: 5px;
	text-decoration: none;
	line-height: 1.45;
}

.qlt-title:hover {
	color: #ee0033;
}

.qlt-meta {
	font-size: 12px;
	color: #6b7280;
	margin-bottom: 0;
	display: flex;
	align-items: center;
	gap: 4px;
	flex-wrap: wrap;
}

.qlt-meta-sep {
	color: #d1d5db;
}

.qlt-vdivider {
	width: 1px;
	background: #f3f4f6;
}

.qlt-card-right {
	display: grid;
	grid-template-columns: 1fr 1px auto;
	align-items: stretch;
}

.qlt-stats-col {
	padding: 14px 16px;
	display: flex;
	flex-direction: column;
	justify-content: center;
	gap: 10px;
}

.qlt-stat-row {
	display: flex;
	align-items: center;
	gap: 8px;
}

.qlt-stat-icon {
	color: #9ca3af;
	flex-shrink: 0;
}

.qlt-stat-info {
	display: flex;
	flex-direction: column;
}

.qlt-stat-val {
	font-size: 16px;
	font-weight: 700;
	color: #0d1011;
	line-height: 1;
}

.qlt-stat-lbl {
	font-size: 11px;
	color: #9ca3af;
	margin-top: 1px;
}

.qlt-no-stat {
	display: flex;
	align-items: center;
	gap: 8px;
	font-size: 12px;
	color: #9ca3af;
}

.qlt-banner {
	display: flex;
	align-items: center;
	gap: 8px;
	padding: 8px 12px;
	border-radius: 6px;
	font-size: 12px;
	margin-bottom: 6px;
}

.qlt-banner:last-child {
	margin-bottom: 0;
}

.qlt-banner-verify {
	background: #f0fdf4;
}

.qlt-banner-verify .qlt-banner-icon {
	color: #16a34a;
}

.qlt-banner-promo {
	background: #fef2f2;
}

.qlt-banner-promo .qlt-banner-icon {
	color: #ee0033;
}

.qlt-banner-text {
	color: #374151;
	line-height: 1.4;
}

.qlt-banner-text a {
	color: #ee0033;
	font-weight: 600;
	text-decoration: underline;
	cursor: pointer;
}

.qlt-free-tag {
	background: #d1fae5;
	color: #065f46;
	font-size: 10px;
	font-weight: 700;
	padding: 1px 6px;
	border-radius: 4px;
	margin-left: 4px;
}

.qlt-actions-col {
	padding: 14px 16px;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	gap: 8px;
	min-width: 110px;
}

.qlt-btn-primary {
	width: 110px;
	height: 42px;
	display: inline-flex;
	align-items: center;
	gap: 5px;
	padding: 7px 16px;
	border: 1.5px solid #e8e8e8;
	border-radius: 20px;
	font-size: 12px;
	font-weight: 600;
	color: #374151;
	background: #fff;
	cursor: pointer;
	font-family: inherit;
	white-space: nowrap;
	transition: all .15s;
	text-decoration: none;
}

.qlt-btn-primary:hover {
	border-color: #ee0033;
	color: #ee0033;
	background: #fef2f2;
}

.qlt-btn-danger {
	display: inline-flex;
	align-items: center;
	gap: 5px;
	padding: 7px 16px;
	border: 1.5px solid #fca5a5;
	border-radius: 20px;
	font-size: 12px;
	font-weight: 600;
	color: #dc2626;
	background: #fff;
	cursor: pointer;
	font-family: inherit;
	white-space: nowrap;
	transition: all .15s;
}

.qlt-btn-danger:hover {
	background: #fef2f2;
}

.qlt-more-btn {
	width: 32px;
	height: 32px;
	border-radius: 50%;
	border: 1.5px solid #e8e8e8;
	background: #fff;
	cursor: pointer;
	display: flex;
	align-items: center;
	justify-content: center;
	color: #6b7280;
	transition: all .15s;
	flex-shrink: 0;
	position: relative;
}

.qlt-more-btn:hover {
	border-color: #d1d5db;
	background: #f9fafb;
}

.qlt-card-bottom {
	display: flex;
	align-items: center;
	padding: 10px 16px;
	border-top: 1px solid #f3f4f6;
	background: #fafafa;
}

.qlt-card-bottom-left {
	display: flex;
	flex-direction: column;
	gap: 8px;
	flex: 1;
	min-width: 220px;
}

.qlt-card-bottom-right {
	flex-shrink: 0;
	align-self: center;       
}

.qlt-legal-docs {
	width: 100%;
}

.qlt-meta-inline {
	display: flex;
	gap: 16px;
	font-size: 12px;
	color: #6b7280;
	flex-wrap: wrap;
	margin-top: 8px;
	padding-top: 8px;
	border-top: 1px dashed #f0f0f0;
}

.qlt-meta-inline span {
	display: flex;
	flex-direction: column;
	gap: 1px;
}

.qlt-meta-inline strong {
	font-size: 11px;
	font-weight: 700;
	color: #374151;
}

.qlt-meta-bottom {
	display: flex;
	gap: 20px;
	font-size: 12px;
	color: #6b7280;
	flex-wrap: wrap;
}

.qlt-meta-bottom span {
	display: flex;
	flex-direction: column;
	gap: 1px;
}

.qlt-meta-bottom strong {
	font-size: 11px;
	font-weight: 700;
	color: #374151;
}

.qlt-dropdown-portal {
	position: absolute;
	z-index: 99999;
	background: #fff;
	border: 1px solid #e8e8e8;
	border-radius: 10px;
	box-shadow: 0 8px 24px rgba(0, 0, 0, .12);
	min-width: 180px;
	display: none;
	flex-direction: column;
	overflow: hidden;
}

.qlt-dropdown-portal.open {
	display: flex;
}

.qlt-dropdown-portal a,
.qlt-dropdown-portal button {
	padding: 11px 16px;
	font-size: 13px;
	color: #374151;
	text-decoration: none;
	background: none;
	border: none;
	font-family: inherit;
	cursor: pointer;
	text-align: left;
	display: flex;
	align-items: center;
	gap: 10px;
	transition: background .15s;
	white-space: nowrap;
	border-bottom: 1px solid #f3f4f6;
}

.qlt-dropdown-portal a:last-child,
.qlt-dropdown-portal button:last-child {
	border-bottom: none;
}

.qlt-dropdown-portal a:hover,
.qlt-dropdown-portal button:hover {
	background: #f9fafb;
}

.qlt-dropdown-portal .danger {
	color: #dc2626;
}

.qlt-dropdown-portal .danger:hover {
	background: #fef2f2;
}

.qlt-empty {
	padding: 60px 24px;
	text-align: center;
}

.qlt-empty-icon {
	color: #d1d5db;
	margin: 0 auto 12px;
}

.qlt-empty-title {
	font-size: 15px;
	font-weight: 600;
	color: #0d1011;
	margin-bottom: 6px;
}

.qlt-empty-desc {
	font-size: 13px;
	color: #6b7280;
	max-width: 280px;
	margin: 0 auto 16px;
}

.qlt-empty-btn {
	padding: 9px 22px;
	background: #ee0033;
	color: #fff;
	border: none;
	border-radius: 6px;
	font-family: inherit;
	font-size: 13px;
	font-weight: 600;
	cursor: pointer;
	text-decoration: none;
	display: inline-block;
	transition: background .2s;
}

.qlt-empty-btn:hover {
	background: #cc0022;
}

.qlt-legal-toggle {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    font-weight: 600;
    color: #6b7280;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
}
.qlt-legal-toggle:hover {
    text-decoration: underline;
}
.qlt-legal-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(90px, 1fr));
    gap: 8px;
    margin-top: 10px;
}
.qlt-legal-grid img {
    width: 100%;
    aspect-ratio: 1;
    object-fit: cover;
    border-radius: 6px;
    border: 1px solid #e5e7eb;
}

@media(max-width:860px) {
	.qlt-card-top {
		grid-template-columns: 1fr;
	}

	.qlt-vdivider {
		display: none;
	}

	.qlt-card-right {
		grid-template-columns: 1fr auto;
	}

	.qlt-stats-col {
		border-top: 1px solid #f3f4f6;
		grid-column: 1/-1;
		flex-direction: row;
		flex-wrap: wrap;
	}

	.qlt-actions-col {
		border-top: 1px solid #f3f4f6;
		flex-direction: row;
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
$custom_uid = (int) $custom_user->id;
$sub        = isset($_GET['sub']) ? sanitize_key($_GET['sub']) : 'all';
$sub_tabs = [
    'all'     => 'Tất cả',
    'active'  => 'Đang hiển thị',
    'pending' => 'Chờ duyệt',
    'expired' => 'Hết hạn',
];
$status_map = [
    'all'     => ['publish', 'pending', 'draft'],
    'active'  => ['publish'],
    'pending' => ['pending'],
    'expired' => ['draft'],
];

$categorized   = ql_get_listings_categorized($custom_uid);
$listings      = array_slice($categorized[$sub] ?? $categorized['all'], 0, 20);
$count_all     = count($categorized['all']);
$count_active  = count($categorized['active']);
$count_pending = count($categorized['pending']);
$count_expired = count($categorized['expired']);
$count_map     = [
    'all'     => $count_all,
    'active'  => $count_active,
    'pending' => $count_pending,
    'expired' => $count_expired,
];

function ql_format_price($price): string {
    $price = (float) preg_replace('/[^0-9.]/', '', $price);
    if (!$price) return 'Thoả thuận';
    if ($price >= 1e9) return rtrim(rtrim(sprintf('%.3f', $price / 1e9), '0'), '.') . ' tỷ';
    if ($price >= 1e6) return rtrim(rtrim(sprintf('%.3f', $price / 1e6), '0'), '.') . ' triệu';
    return number_format($price, 0, ',', '.') . ' đ';
}
?>

<div class="ql-panel-header">
    <h2 class="ql-panel-title">Quản lý tin đăng</h2>
    <div class="qlt-tabs" style="margin-top:12px;">
        <?php foreach ($sub_tabs as $key => $label): ?>
        <a href="<?php echo esc_url(add_query_arg('sub', $key)); ?>"
           class="qlt-tab-btn <?php echo $sub === $key ? 'active' : ''; ?>">
            <?php echo esc_html($label); ?>
            <span class="qlt-count-badge"><?php echo (int)($count_map[$key] ?? 0); ?></span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<div class="ql-panel-body">
    <div class="qlt-toolbar">
        <div class="qlt-search">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2">
                <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35" stroke-linecap="round"/>
            </svg>
            <input type="text" id="qlt-search-inp"
                   placeholder="Tìm kiếm tin đăng..."
                   oninput="qltSearch(this.value)">
        </div>
        <a href="<?php echo esc_url(home_url('/dang-tin/')); ?>" class="qlt-new-btn">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Đăng tin mới
        </a>
    </div>

    <?php if (empty($listings)): ?>
    <div class="qlt-empty">
        <svg class="qlt-empty-icon" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
            <circle cx="4.5" cy="4.5" r="1.5"/><circle cx="4.5" cy="11.5" r="1.5"/><circle cx="4.5" cy="18.5" r="1.5"/>
            <path d="M8.5 4.5h12M8.5 11.5h12M8.5 18.5h12" stroke-linecap="round"/>
        </svg>
        <div class="qlt-empty-title">Không có tin đăng nào</div>
        <div class="qlt-empty-desc">Hãy đăng tin để tiếp cận hàng triệu khách hàng.</div>
        <a class="qlt-empty-btn" href="<?php echo esc_url(home_url('/dang-tin/')); ?>">Đăng tin ngay</a>
    </div>

    <?php else: ?>
    <?php foreach ($listings as $post):
        $post_id   = $post->ID;
        $status    = $post->post_status;
        $title     = get_the_title($post_id);
        $price_raw = get_post_meta($post_id, 'prefix-price', true);
        $area      = get_post_meta($post_id, 'prefix-area',  true);
        $vip       = get_post_meta($post_id, 'vip_level',    true);
        $views     = (int) get_post_meta($post_id, 'post_views_count', true);
        $khach     = (int) get_post_meta($post_id, 'contact_count',   true);
        $price     = ql_format_price($price_raw);
        $date_post = get_the_date('d/m/Y', $post_id);
        $expired_raw  = ql_get_expired_at($post_id);
        $exp          = ql_format_expired($expired_raw);
        $date_exp     = $exp['text'];
        $exp_warning  = $exp['warning'];
        $exp_overdue  = $exp['overdue'];   
        $exp_days     = $exp['days_left'] ?? null;
        $loc_terms  = get_the_terms($post_id, 'property_location');
        $location   = (!empty($loc_terms) && !is_wp_error($loc_terms)) ? implode(', ', array_slice(wp_list_pluck($loc_terms, 'name'), 0, 2)) : '';
        $type_terms = get_the_terms($post_id, 'property_type');
        $type       = (!empty($type_terms) && !is_wp_error($type_terms)) ? $type_terms[0]->name : '';
        $thumb_url  = get_the_post_thumbnail_url($post_id, 'medium') ?: '';
        $post_url   = get_permalink($post_id);
        $edit_url   = home_url('/chinh-sua-tin/?id=' . $post_id);

        if ($status === 'pending') {
            $dot = 'yellow'; $status_lbl = 'Chờ duyệt';
            $is_active = false; $is_pending = true; $is_expired = false;
            $has_stats = false;
        } elseif ($exp_overdue) {
            $dot = 'red'; $status_lbl = 'Hết hạn';
            $is_active = false; $is_pending = false; $is_expired = true;
            $has_stats = ($views > 0);
        } elseif ($status === 'publish') {
            $dot = 'green'; $status_lbl = 'Đang hiển thị';
            $is_active = true; $is_pending = false; $is_expired = false;
            $has_stats = ($views > 0 || $khach > 0);
        } else {
            $dot = 'red'; $status_lbl = 'Hết hạn';
            $is_active = false; $is_pending = false; $is_expired = true;
            $has_stats = ($views > 0);
        }
    ?>

    <div class="qlt-card" id="qlt-card-<?php echo $post_id; ?>"
         data-title="<?php echo esc_attr(strtolower($title)); ?>">

        <div class="qlt-card-top">
            <div class="qlt-card-left">
                <div class="qlt-thumb">
                    <?php if ($thumb_url): ?>
                    <img src="<?php echo esc_url($thumb_url); ?>" alt="">
                    <?php else: ?>
                    🏠
                    <?php endif; ?>
                    <?php if ($vip): ?>
                    <span class="qlt-thumb-badge yellow">VIP</span>
                    <?php elseif ($is_expired): ?>
                    <span class="qlt-thumb-badge">Hết hạn</span>
                    <?php endif; ?>
                </div>

                <div class="qlt-info">
                    <div class="qlt-status-row">
                        <span class="qlt-status-dot <?php echo $dot; ?>"></span>
                        <span class="qlt-status-text <?php echo $dot; ?>"><?php echo esc_html($status_lbl); ?></span>
                        <?php if ($vip): ?>
                        <span style="background:#fef3c7;color:#92400e;font-size:10px;font-weight:700;padding:1px 7px;border-radius:4px;">VIP</span>
                        <?php else: ?>
                        <span style="background:#f3f4f6;color:#6b7280;font-size:10px;font-weight:600;padding:1px 7px;border-radius:4px;">Tin thường</span>
                        <?php endif; ?>
                    </div>

                    <a href="<?php echo esc_url($post_url); ?>" class="qlt-title" target="_blank">
                        <?php echo esc_html($title); ?>
                    </a>

                    <div class="qlt-meta">
                        <?php if ($price): ?>
                        <span style="color:#e84118;font-weight:700;"><?php echo esc_html($price); ?></span>
                        <span class="qlt-meta-sep">•</span>
                        <?php endif; ?>
                        <?php if ($type): ?>
                        <span><?php echo esc_html($type); ?></span>
                        <span class="qlt-meta-sep">•</span>
                        <?php endif; ?>
                        <?php if ($area): ?>
                        <span><?php echo esc_html($area); ?> m²</span>
                        <?php endif; ?>
                        <?php if ($location): ?>
                        <span class="qlt-meta-sep">•</span>
                        <span><?php echo esc_html($location); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="qlt-meta-inline">
                        <span><strong>Mã tin</strong><?php echo $post_id; ?></span>
                        <span><strong>Ngày đăng</strong><?php echo esc_html($date_post); ?></span>
                        <?php if ($date_exp): ?>
                        <span>
                            <strong>Ngày hết hạn</strong>
                            <?php if ($exp_overdue): ?>
                                <span style="color:#dc2626;font-weight:700;">
                                    <?php echo esc_html($date_exp); ?>
                                </span>
                            <?php elseif ($exp_warning): ?>
                                <span style="color:#d97706;font-weight:700;"><?php echo esc_html($date_exp); ?></span>
                            <?php else: ?>
                                <span style="color:#374151;"><?php echo esc_html($date_exp); ?></span>
                            <?php endif; ?>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!-- /.qlt-card-left -->

            <div class="qlt-vdivider"></div>
            <div class="qlt-card-right">
                <div class="qlt-stats-col">
                    <?php if ($has_stats): ?>
                    <div class="qlt-stat-row">
                        <span class="qlt-stat-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </span>
                        <div class="qlt-stat-info">
                            <span class="qlt-stat-val"><?php echo number_format($views); ?></span>
                            <span class="qlt-stat-lbl">Xem tin</span>
                        </div>
                        <div style="width:1px;background:#f3f4f6;height:32px;margin:0 8px;"></div>
                        <span class="qlt-stat-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8z" stroke-linecap="round"/></svg>
                        </span>
                        <div class="qlt-stat-info">
                            <span class="qlt-stat-val"><?php echo $khach > 0 ? number_format($khach) : '--'; ?></span>
                            <span class="qlt-stat-lbl">Khách hàng</span>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="qlt-no-stat">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>
                        Không có số liệu thống kê
                    </div>
                    <?php endif; ?>

                    <?php if (!$vip && !$is_pending): ?>
                    <div class="qlt-banner qlt-banner-verify">
                        <span class="qlt-banner-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </span>
                        <span class="qlt-banner-text">
                            Xác thực tin <span class="qlt-free-tag">Miễn phí</span>
                            &nbsp;·&nbsp; Lên đầu loại tin thường ●
                        </span>
                    </div>
                    <?php endif; ?>

                    <?php if (!$is_pending): ?>
                    <div class="qlt-banner qlt-banner-promo">
                        <span class="qlt-banner-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 12V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2h7"/><path d="M16 19h6M19 16v6"/></svg>
                        </span>
                        <span class="qlt-banner-text">
                            🎁 Tặng voucher 1 lượt đẩy Tin Thường cho tin có Video.
                            <a href="#">Thêm Video</a>
                        </span>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="qlt-vdivider"></div>
                <div class="qlt-actions-col">
                    <?php if ($is_expired): ?>
                    <button class="qlt-btn-primary" onclick="qltRepost(<?php echo $post_id; ?>)">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 4v6h6M23 20v-6h-6"/><path d="M20.49 9A9 9 0 005.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 013.51 15" stroke-linecap="round"/></svg>
                        Đăng lại
                    </button>
                    <?php elseif ($is_active): ?>
                    <a href="<?php echo esc_url($edit_url); ?>" class="qlt-btn-primary">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4z"/></svg>
                        Chỉnh sửa
                    </a>
                    <button class="qlt-btn-primary" onclick="qltPush(<?php echo $post_id; ?>)">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 15l7-7 7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Đẩy tin
                    </button>
                    <?php else: ?>
                    <a href="<?php echo esc_url($edit_url); ?>" class="qlt-btn-primary">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4z"/></svg>
                        Chỉnh sửa
                    </a>
                    <?php endif; ?>

                    <button class="qlt-more-btn"
                        data-post-id="<?php echo $post_id; ?>"
                        data-post-url="<?php echo esc_attr($post_url); ?>"
                        data-post-title="<?php echo esc_attr($title); ?>"
                        data-edit-url="<?php echo esc_attr($edit_url); ?>"
                        data-status="<?php echo esc_attr($status); ?>"
                        data-vip="<?php echo esc_attr($vip); ?>"
                        data-history-url="<?php echo esc_attr(home_url('/quan-ly-tai-khoan/lich-su/?post='.$post_id)); ?>"
                        data-vip-url="<?php echo esc_attr(home_url('/quan-ly-tai-khoan/goi-vip/?post='.$post_id)); ?>"
                        onclick="qltOpenMenu(this, event)"
                        title="Thêm tùy chọn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <circle cx="5" cy="12" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="19" cy="12" r="1.5"/>
                        </svg>
                    </button>
                </div>
            </div><!-- /.qlt-card-right -->
        </div><!-- /.qlt-card-top -->

       <div class="qlt-card-bottom">
            <?php
                $legal_images = dt_get_legal_images($post_id);
                if (!empty($legal_images)):
            ?>
           <div class="qlt-legal-docs">
                <span class="qlt-legal-toggle" role="button" tabindex="0"
                    onclick="qltToggleLegal(<?php echo $post_id; ?>)"
                    onkeydown="if(event.key==='Enter'||event.key===' '){qltToggleLegal(<?php echo $post_id; ?>)}">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"/>
                        <path d="M19 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06A1.65 1.65 0 004.6 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06A1.65 1.65 0 009 4.6a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09A1.65 1.65 0 0015.4 4.6a1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06A1.65 1.65 0 0019.4 9c.36.14.66.38.86.7"/>
                    </svg>
                    Giấy tờ pháp lý (<?php echo count($legal_images); ?>) — chỉ mình bạn xem được
                </span>
                <div class="qlt-legal-grid" id="qlt-legal-<?php echo $post_id; ?>" style="display:none;">
                    <?php foreach ($legal_images as $img): ?>
                    <a href="<?php echo esc_url($img['url']); ?>" target="_blank" rel="noopener">
                        <img src="<?php echo esc_url($img['url']); ?>" alt="Giấy tờ pháp lý" loading="lazy">
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php else: ?>
            <div style="font-size:12px;color:#9ca3af;">Không có giấy tờ pháp lý đính kèm</div>
            <?php endif; ?>
        </div><!-- /.qlt-card-bottom -->
    </div><!-- /.qlt-card --> 
    <?php endforeach; ?>
    <?php endif; ?>
</div><!-- /.ql-panel-body -->

<div class="vip-popup">
    <?php get_template_part('authentication/popup-vip'); ?>
</div>
 
<div class="delete-popup">
    <?php get_template_part('authentication/popup-delete'); ?>
</div>
 
<div class="push-popup">
    <?php get_template_part('authentication/popup-push'); ?>
</div>
<script>
    var qlt_ajax = {
        ajax_url: '<?php echo esc_js(admin_url("admin-ajax.php")); ?>',
        nonce: '<?php echo wp_create_nonce("ql_listing_nonce"); ?>'
    };
</script>

<script>
function qltSearch(q) {
   q = q.toLowerCase().trim();
   document.querySelectorAll('.qlt-card').forEach(function (card) {
      card.style.display = (!q || card.dataset.title.includes(q)) ? '' : 'none';
   });
}

(function () {
   const portal = document.createElement('div');
   portal.className = 'qlt-dropdown-portal';
   portal.id = 'qlt-portal';
   document.body.appendChild(portal);
   let _activeBtn = null;

   function close() {
      portal.classList.remove('open');
      _activeBtn = null;
   }

   window.qltOpenMenu = function (btn, e) {
      e.stopPropagation();
      if (_activeBtn === btn) {
         close();
         return;
      }
      _activeBtn = btn;
      const d = btn.dataset,
         st = d.status,
         vp = d.vip;

      const ico = {
         history: `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3" stroke-linecap="round"/></svg>`,
         share: `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="M8.59 13.51l6.83 3.98M15.41 6.51l-6.82 3.98" stroke-linecap="round"/></svg>`,
         edit: `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4z"/></svg>`,
         vip: `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" stroke-linecap="round"/></svg>`,
         del: `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6M10 11v6M14 11v6"/><path d="M9 6V4h6v2"/></svg>`,
         repost: `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M1 4v6h6M23 20v-6h-6"/><path d="M20.49 9A9 9 0 005.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 013.51 15" stroke-linecap="round"/></svg>`,
      };

      let html = `<a href="${d.historyUrl}">${ico.history} Xem lịch sử</a>`;
      html += `<button onclick="qltShare('${d.postUrl}','${d.postTitle.replace(/'/g,"\\'")}');document.getElementById('qlt-portal').classList.remove('open')">${ico.share} Chia sẻ</button>`;
      if (st === 'publish' || st === 'pending') html += `<a href="${d.editUrl}">${ico.edit} Chỉnh sửa</a>`;
      if (st === 'draft') html += `<button onclick="qltRepost(${d.postId});close()">${ico.repost} Đăng lại</button>`;
      if (!vp) html += `<button onclick="qltUpgradeVip(${d.postId});document.getElementById('qlt-portal').classList.remove('open')">${ico.vip} Nâng cấp VIP</button>`;
      html += `<button class="danger" onclick="qltDelete(${d.postId})">${ico.del} Xoá tin</button>`;

      portal.innerHTML = html;
      portal.classList.add('open');
      const rect = btn.getBoundingClientRect();
      const pw = 190;
      let left = rect.right - pw + window.scrollX;
      let top = rect.bottom + 6 + window.scrollY;
      if (left + pw > window.innerWidth - 8) left = window.innerWidth - pw - 8;
      portal.style.cssText += `;left:${left}px;top:${top}px;min-width:${pw}px`;
   };

   document.addEventListener('click', e => {
      if (!portal.contains(e.target)) close();
   });
   window.addEventListener('scroll', close, {
      passive: true
   });
})();

function qltDelete(postId) {
    document.getElementById('qlt-portal').classList.remove('open');
    qltConfirm(
        'Xoá tin đăng',
        'Bạn có chắc muốn xoá tin đăng này? Hành động này không thể hoàn tác.',
        function () {
            fetch('<?php echo esc_js(admin_url("admin-ajax.php")); ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'action=ql_delete_listing&post_id=' + postId + '&_nonce=<?php echo wp_create_nonce("ql_listing_nonce"); ?>'
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    const card = document.getElementById('qlt-card-' + postId);
                    if (card) {
                        card.style.opacity = '0';
                        setTimeout(() => card.remove(), 300);
                    }
                } else {
                    qltAlert('Không thể xoá', data.data?.message || 'Có lỗi xảy ra.', 'error');
                }
            });
        }
    );
}

function qltRepost(id) {
   window.location.href = '<?php echo esc_js(home_url("/dang-tin/")); ?>?repost=' + id;
}

function qltUpgradeVip(postId) {
    if (!confirm('Nâng cấp tin này lên VIP với giá 150.000đ (hoặc dùng 1 lượt nâng cấp VIP nếu có)?\nThời hạn VIP: 30 ngày kể từ hôm nay.\n\nBạn có đồng ý không?')) {
        return;
    }
 
    const card = document.getElementById('qlt-card-' + postId);
    const btn = card ? card.querySelector('.qlt-more-btn') : null;
    if (btn) btn.disabled = true;
    fetch('<?php echo esc_js(admin_url("admin-ajax.php")); ?>', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'action=ql_upgrade_vip&post_id=' + postId +
              '&_nonce=<?php echo wp_create_nonce("ql_listing_nonce"); ?>'
    })
    .then(r => r.json())
    .then(data => {
        if (btn) btn.disabled = false;
        if (data.success) {
            qltToast('✓ ' + data.data.message);
            qltApplyVipBadge(postId, data.data.vip_level, data.data.expired_at_formatted);
        } else {
            alert(data.data?.message || 'Có lỗi xảy ra khi nâng cấp VIP.');
        }
    })
    .catch(() => {
        if (btn) btn.disabled = false;
        alert('Không thể kết nối máy chủ, vui lòng thử lại.');
    });
}
 
function qltApplyVipBadge(postId, vipLevel, expiredAtText) {
    const card = document.getElementById('qlt-card-' + postId);
    if (!card) return;
     const thumb = card.querySelector('.qlt-thumb');
    if (thumb) {
        let badge = thumb.querySelector('.qlt-thumb-badge');
        if (!badge) {
            badge = document.createElement('span');
            thumb.appendChild(badge);
        }
        badge.className = 'qlt-thumb-badge yellow';
        badge.textContent = 'VIP ' + vipLevel.replace('vip', '');
    }
     const statusRow = card.querySelector('.qlt-status-row');
    if (statusRow) {
        const oldTag = statusRow.querySelector('span:last-child');
        if (oldTag) {
            oldTag.outerHTML = '<span style="background:#fef3c7;color:#92400e;font-size:10px;font-weight:700;padding:1px 7px;border-radius:4px;">VIP ' + vipLevel.replace('vip', '') + '</span>';
        }
    }
 
    const verifyBanner = card.querySelector('.qlt-banner-verify');
    if (verifyBanner) verifyBanner.remove();
     const moreBtn = card.querySelector('.qlt-more-btn');
    if (moreBtn) moreBtn.dataset.vip = vipLevel;
}

async function qltShare(url, title) {
   if (navigator.share) {
      try {
         await navigator.share({
            title,
            url
         });
         return;
      } catch (e) {}
   }
   try {
      await navigator.clipboard.writeText(url);
      qltToast('✓ Đã sao chép đường dẫn!');
   } catch (e) {
      prompt('Sao chép đường dẫn:', url);
   }
}

function qltToast(msg) {
   let t = document.getElementById('qlt-toast');
   if (!t) {
      t = document.createElement('div');
      t.id = 'qlt-toast';
      t.style.cssText = 'position:fixed;bottom:28px;left:50%;transform:translateX(-50%) translateY(20px);background:#0d1011;color:#fff;padding:10px 20px;border-radius:8px;font-size:13px;font-weight:600;z-index:99999;opacity:0;transition:all .25s;pointer-events:none;white-space:nowrap;';
      document.body.appendChild(t);
   }
   t.textContent = msg;
   t.style.opacity = '1';
   t.style.transform = 'translateX(-50%) translateY(0)';
   clearTimeout(t._timer);
   t._timer = setTimeout(() => {
      t.style.opacity = '0';
      t.style.transform = 'translateX(-50%) translateY(20px)';
   }, 2500);
}
</script>
<script>
function qltToggleLegal(postId) {
    var el = document.getElementById('qlt-legal-' + postId);
    if (!el) return;
    el.style.display = el.style.display === 'none' ? 'grid' : 'none';
}
</script>