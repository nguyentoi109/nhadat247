<?php
if (!defined('ABSPATH')) exit;

$sub = isset($_GET['sub']) ? sanitize_text_field($_GET['sub']) : 'all';
$sub_tabs = [
    'all'     => 'Tất cả',
    'active'  => 'Đang hiển thị',
    'pending' => 'Chờ duyệt',
    'expired' => 'Hết hạn',
];

$user_id = get_current_user_id();
$status_map = [
    'all'     => ['publish', 'pending', 'draft'],
    'active'  => ['publish'],
    'pending' => ['pending'],
    'expired' => ['draft'],
];

$listings = get_posts([
    'post_type'      => 'post',
    'author'         => $user_id,
    'post_status'    => $status_map[$sub] ?? ['publish','pending','draft'],
    'posts_per_page' => 20,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

$count_all     = count(get_posts(['post_type'=>'post','author'=>$user_id,'post_status'=>['publish','pending','draft'],'posts_per_page'=>-1,'fields'=>'ids']));
$count_active  = count(get_posts(['post_type'=>'post','author'=>$user_id,'post_status'=>'publish','posts_per_page'=>-1,'fields'=>'ids']));
$count_pending = count(get_posts(['post_type'=>'post','author'=>$user_id,'post_status'=>'pending','posts_per_page'=>-1,'fields'=>'ids']));
$count_expired = count(get_posts(['post_type'=>'post','author'=>$user_id,'post_status'=>'draft','posts_per_page'=>-1,'fields'=>'ids']));
$count_map = ['all'=>$count_all,'active'=>$count_active,'pending'=>$count_pending,'expired'=>$count_expired];

if (empty($listings)) {
    $mock = true;
    $listings = [
        (object)[
            'ID'          => 1,
            'post_title'  => 'Đất Bình Dương cách Quận 1 Hồ Chí Minh chỉ 43km giá chỉ 2,3 triệu 1 m2',
            'post_status' => 'draft',
            'post_date'   => '2026-05-04',
            '_mock'       => true,
            '_price'      => 'Thoả thuận',
            '_area'       => '500',
            '_location'   => 'Bến Cát, Bình Dương',
            '_type'       => 'Bán đất',
            '_ma_tin'     => '45532306',
            '_date_post'  => '04/05/2026',
            '_date_exp'   => '19/05/2026',
            '_views'      => 20,
            '_khach'      => 0,
            '_vip'        => '',
        ],
        (object)[
            'ID'          => 2,
            'post_title'  => 'Căn hộ cao cấp Quận 7 view sông, full nội thất, giá tốt nhất khu vực',
            'post_status' => 'publish',
            'post_date'   => '2026-05-10',
            '_mock'       => true,
            '_price'      => '3,5 tỷ',
            '_area'       => '72',
            '_location'   => 'Quận 7, TP.HCM',
            '_type'       => 'Bán căn hộ',
            '_ma_tin'     => '45598712',
            '_date_post'  => '10/05/2026',
            '_date_exp'   => '25/05/2026',
            '_views'      => 145,
            '_khach'      => 8,
            '_vip'        => '1',
        ],
        (object)[
            'ID'          => 3,
            'post_title'  => 'Nhà phố 1 trệt 2 lầu mặt tiền đường Nguyễn Trãi, Quận 5',
            'post_status' => 'pending',
            'post_date'   => '2026-06-01',
            '_mock'       => true,
            '_price'      => '7,2 tỷ',
            '_area'       => '60',
            '_location'   => 'Quận 5, TP.HCM',
            '_type'       => 'Bán nhà phố',
            '_ma_tin'     => '45612340',
            '_date_post'  => '01/06/2026',
            '_date_exp'   => '16/06/2026',
            '_views'      => 0,
            '_khach'      => 0,
            '_vip'        => '',
        ],
    ];
} else {
    $mock = false;
}
?>

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
	background: #ee0033;
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
	background: #cc0022;
}

.qlt-card {
	border: 1px solid #e8e8e8;
	border-radius: 10px;
	margin-bottom: 12px;
	background: #fff;
	transition: box-shadow .2s;
}

.qlt-card:hover {
	box-shadow: 0 3px 12px rgba(0, 0, 0, .07);
}

.qlt-card-top {
	border-radius: 10px 10px 0 0;
	overflow: hidden;
}

.qlt-card-bottom {
	border-radius: 0 0 10px 10px;
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
	justify-content: space-between;
	padding: 10px 16px;
	border-top: 1px solid #f3f4f6;
	background: #fafafa;
	gap: 16px;
	flex-wrap: wrap;
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
	position: fixed;
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

<div class="ql-panel-header">
  <h2 class="ql-panel-title">Quản lý tin đăng</h2>
  <div class="qlt-tabs" style="margin-top:12px;">
    <?php foreach ($sub_tabs as $key => $label): ?>
      <a href="<?php echo esc_url(home_url('/quan-ly-tai-khoan/quan-ly-tin/?sub='.$key)); ?>"
         class="qlt-tab-btn <?php echo $sub===$key?'active':''; ?>">
        <?php echo esc_html($label); ?>
        <span class="qlt-count-badge"><?php echo esc_html($count_map[$key]??0); ?></span>
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
      <input type="text" placeholder="Tìm kiếm tin đăng...">
    </div>
    <a href="<?php echo esc_url(home_url('/dang-tin/')); ?>" class="qlt-new-btn">
      <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
      </svg>
      Đăng tin mới
    </a>
  </div>

  <?php

  $display_list = $mock ? $listings : $listings;

  if (empty($display_list)):
  ?>
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

    <?php foreach ($display_list as $post):

      if (!empty($post->_mock)) {
          $post_id    = $post->ID;
          $title      = $post->post_title;
          $status     = $post->post_status;
          $price      = $post->_price;
          $area       = $post->_area;
          $location   = $post->_location;
          $type       = $post->_type;
          $ma_tin     = $post->_ma_tin;
          $date_post  = $post->_date_post;
          $date_exp   = $post->_date_exp;
          $views      = $post->_views;
          $khach      = $post->_khach;
          $vip        = $post->_vip;
          $thumb_url  = '';
          $edit_url   = '#';
          $post_url   = '#';
      } else {
          $post_id    = $post->ID;
          $title      = get_the_title($post_id);
          $status     = $post->post_status;
          $price      = get_post_meta($post_id,'price',true);
          $area       = get_post_meta($post_id,'area',true);
          $location   = get_post_meta($post_id,'location',true);
          $type       = get_post_meta($post_id,'property_type',true);
          $ma_tin     = $post_id;
          $date_post  = get_the_date('d/m/Y',$post_id);
          $date_exp   = get_post_meta($post_id,'expiry_date',true);
          $views      = (int)get_post_meta($post_id,'post_views_count',true);
          $khach      = (int)get_post_meta($post_id,'contact_count',true);
          $vip        = get_post_meta($post_id,'vip_level',true);
          $thumb_url  = get_the_post_thumbnail_url($post_id,'medium');
          $edit_url   = home_url('/chinh-sua-tin/?id='.$post_id);
          $post_url   = get_permalink($post_id);
      }

      if ($status === 'publish') {
          $dot='green'; $status_lbl='Đang hiển thị';
          $has_stats = ($views > 0 || $khach > 0);
      } elseif ($status === 'pending') {
          $dot='yellow'; $status_lbl='Chờ duyệt';
          $has_stats = false;
      } else {
          $dot='red'; $status_lbl='Hết hạn';
          $has_stats = ($views > 0);
      }

      $is_expired = ($status === 'draft');
      $is_pending = ($status === 'pending');
      $is_active  = ($status === 'publish');
    ?>

    <div class="qlt-card" id="qlt-card-<?php echo esc_attr($post_id); ?>">

      <div class="qlt-card-top">

        <div class="qlt-card-left">
          <div class="qlt-thumb">
            <?php if ($thumb_url): ?>
              <img src="<?php echo esc_url($thumb_url); ?>" alt="">
            <?php else: ?>
              🏠
            <?php endif; ?>
            <?php if ($vip): ?>
              <span class="qlt-thumb-badge yellow">VIP <?php echo esc_html($vip); ?></span>
            <?php elseif ($is_expired): ?>
              <span class="qlt-thumb-badge">Hết hạn</span>
            <?php endif; ?>
          </div>

          <div class="qlt-info">
            <div class="qlt-status-row">
              <span class="qlt-status-dot <?php echo $dot; ?>"></span>
              <span class="qlt-status-text <?php echo $dot; ?>"><?php echo esc_html($status_lbl); ?></span>
              <?php if ($vip): ?>
                <span style="background:#fef3c7;color:#92400e;font-size:10px;font-weight:700;padding:1px 7px;border-radius:4px;">VIP <?php echo esc_html($vip); ?></span>
              <?php else: ?>
                <span style="background:#f3f4f6;color:#6b7280;font-size:10px;font-weight:600;padding:1px 7px;border-radius:4px;">Tin thường</span>
              <?php endif; ?>
            </div>

            <a href="<?php echo esc_url($post_url); ?>" class="qlt-title">
              <?php echo esc_html($title); ?>
            </a>

            <div class="qlt-meta">
              <?php if ($type): ?>
                <span><?php echo esc_html($type); ?></span>
                <span class="qlt-meta-sep">•</span>
              <?php endif; ?>
              <?php if ($location): ?>
                <span><?php echo esc_html($location); ?></span>
              <?php endif; ?>
              <?php if ($area): ?>
                <span class="qlt-meta-sep">•</span>
                <span><?php echo esc_html($area); ?> m²</span>
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
              <button class="qlt-btn-primary" onclick="qltRepost(<?php echo esc_attr($post_id); ?>)">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 4v6h6M23 20v-6h-6"/><path d="M20.49 9A9 9 0 005.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 013.51 15" stroke-linecap="round"/></svg>
                Đăng lại
              </button>
            <?php elseif ($is_active): ?>
              <a href="<?php echo esc_url($edit_url); ?>" class="qlt-btn-primary">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4z"/></svg>
                Chỉnh sửa
              </a>
              <button class="qlt-btn-primary" onclick="qltPush(<?php echo esc_attr($post_id); ?>)">
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
              data-post-id="<?php echo esc_attr($post_id); ?>"
              data-post-url="<?php echo esc_attr($post_url); ?>"
              data-post-title="<?php echo esc_attr($title); ?>"
              data-edit-url="<?php echo esc_attr($edit_url); ?>"
              data-status="<?php echo esc_attr($status); ?>"
              data-vip="<?php echo esc_attr($vip); ?>"
              data-history-url="<?php echo esc_attr(home_url('/quan-ly-tai-khoan/lich-su/?post='.$post_id)); ?>"
              data-vip-url="<?php echo esc_attr(home_url('/quan-ly-tai-khoan/goi-vip/?post='.$post_id)); ?>"
              onclick="qltOpenMenu(this, event)"
              title="Thêm tùy chọn">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><circle cx="5" cy="12" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="19" cy="12" r="1.5"/></svg>
            </button>
          </div><!-- /.qlt-actions-col -->

        </div><!-- /.qlt-card-right -->
      </div><!-- /.qlt-card-top -->

      <div class="qlt-card-bottom">
        <div class="qlt-meta-bottom">
          <span><strong>Mã tin</strong><?php echo esc_html($ma_tin); ?></span>
          <span><strong>Ngày đăng tin</strong><?php echo esc_html($date_post); ?></span>
          <span>
            <strong>Ngày hết hạn</strong>
            <span style="<?php echo $is_expired ? 'color:#dc2626;font-weight:600;' : ''; ?>">
              <?php echo $date_exp ? esc_html($date_exp) : '—'; ?>
            </span>
          </span>
        </div>
        <?php if ($is_active && !$vip): ?>
        <a href="<?php echo esc_url(home_url('/quan-ly-tai-khoan/goi-vip/?post='.$post_id)); ?>"
           style="font-size:12px;font-weight:600;color:#ee0033;text-decoration:none;display:flex;align-items:center;gap:4px;">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 21 12 17.77 5.82 21 7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          Nâng cấp VIP
        </a>
        <?php endif; ?>
      </div>

    </div><!-- /.qlt-card -->

    <?php endforeach; ?>

  <?php endif; ?>

</div><!-- /.ql-panel-body -->

<script>
(function(){
    const portal = document.createElement('div');
    portal.className = 'qlt-dropdown-portal';
    portal.id = 'qlt-portal';
    document.body.appendChild(portal);

    let _activeBtn = null;

    function close() {
        portal.classList.remove('open');
        _activeBtn = null;
    }

    window.qltOpenMenu = function(btn, e) {
        e.stopPropagation();

        if (_activeBtn === btn) { close(); return; }
        _activeBtn = btn;

        const d  = btn.dataset;
        const st = d.status;   
        const vp = d.vip;

        const svgHistory = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3" stroke-linecap="round" stroke-linejoin="round"/></svg>`;
        const svgShare   = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="M8.59 13.51l6.83 3.98M15.41 6.51l-6.82 3.98" stroke-linecap="round"/></svg>`;
        const svgEdit    = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4z"/></svg>`;
        const svgVip     = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" stroke-linecap="round"/></svg>`;
        const svgDelete  = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6M10 11v6M14 11v6"/><path d="M9 6V4h6v2"/></svg>`;
        const svgRepost  = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M1 4v6h6M23 20v-6h-6"/><path d="M20.49 9A9 9 0 005.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 013.51 15" stroke-linecap="round"/></svg>`;

        let html = '';

        html += `<a href="${d.historyUrl}">${svgHistory} Xem lịch sử</a>`;

        html += `<button onclick="qltShare('${d.postUrl}','${d.postTitle.replace(/'/g,"\\'")}');document.getElementById('qlt-portal').classList.remove('open')">${svgShare} Chia sẻ</button>`;

        if (st === 'publish' || st === 'pending') {
            html += `<a href="${d.editUrl}">${svgEdit} Chỉnh sửa</a>`;
        }

        if (st === 'draft') {
            html += `<button onclick="qltRepost('${d.postId}');close()">${svgRepost} Đăng lại</button>`;
        }

        if (!vp) {
            html += `<a href="${d.vipUrl}">${svgVip} Nâng cấp VIP</a>`;
        }

        html += `<button class="danger" onclick="qltDelete('${d.postId}');close()">${svgDelete} Xoá tin</button>`;

        portal.innerHTML = html;

        portal.classList.add('open');
        const rect = btn.getBoundingClientRect();
        const pw   = 190; // min-width
        let left   = rect.right - pw + window.scrollX;
        let top    = rect.bottom + 6 + window.scrollY;

        if (left + pw > window.innerWidth - 8) left = window.innerWidth - pw - 8;
        const ph = portal.offsetHeight || 200;
        if (rect.bottom + ph + 6 > window.innerHeight) {
            top = rect.top - ph - 6 + window.scrollY;
        }

        portal.style.left = left + 'px';
        portal.style.top  = top  + 'px';
        portal.style.minWidth = pw + 'px';
    };

    document.addEventListener('click', e => {
        if (!portal.contains(e.target)) close();
    });
    window.addEventListener('scroll', close, { passive:true });
})();

function qltDelete(postId) {
    if (!confirm('Bạn có chắc muốn xoá tin đăng này?')) return;
    document.getElementById('qlt-portal').classList.remove('open');
    fetch('<?php echo esc_js(admin_url("admin-ajax.php")); ?>', {
        method:'POST',
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        body:'action=ql_delete_listing&post_id='+postId+'&_nonce=<?php echo wp_create_nonce("ql_listing_nonce"); ?>'
    })
    .then(r=>r.json())
    .then(data=>{
        if (data.success) {
            const card = document.getElementById('qlt-card-'+postId);
            card.style.transition='opacity .3s,transform .3s';
            card.style.opacity='0'; card.style.transform='translateX(10px)';
            setTimeout(()=>card.remove(), 320);
        } else alert(data.data?.message||'Có lỗi xảy ra.');
    });
}
function qltRepost(id) { window.location.href='<?php echo esc_js(home_url("/quan-ly-tai-khoan/nap-tien/")); ?>?repost='+id; }
function qltPush(id)   { window.location.href='<?php echo esc_js(home_url("/quan-ly-tai-khoan/goi-vip/")); ?>?push='+id; }

async function qltShare(url, title) {
    if (navigator.share) {
        try { await navigator.share({ title, url }); return; } catch(e) {}
    }
    try {
        await navigator.clipboard.writeText(url);
        qltToast('✓ Đã sao chép đường dẫn!');
    } catch(e) { prompt('Sao chép đường dẫn:', url); }
}

function qltToast(msg) {
    let t = document.getElementById('qlt-toast');
    if (!t) {
        t = document.createElement('div');
        t.id = 'qlt-toast';
        t.style.cssText = 'position:fixed;bottom:28px;left:50%;transform:translateX(-50%) translateY(20px);background:#0d1011;color:#fff;padding:10px 20px;border-radius:8px;font-size:13px;font-weight:600;z-index:99999;opacity:0;transition:all .25s;pointer-events:none;white-space:nowrap;box-shadow:0 4px 12px rgba(0,0,0,.2);';
        document.body.appendChild(t);
    }
    t.textContent = msg;
    t.style.opacity='1'; t.style.transform='translateX(-50%) translateY(0)';
    clearTimeout(t._timer);
    t._timer = setTimeout(()=>{ t.style.opacity='0'; t.style.transform='translateX(-50%) translateY(20px)'; }, 2500);
}
</script>