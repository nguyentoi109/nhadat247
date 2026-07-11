<style> 
	.area{
		color: #ffa600;
	}
	.meta-price{
		color: #ffa600;
	}
	strong{
		color: #ffa600;
	}
	.alt-icon{
		width: 20px; 
		height: 14px; 
		vertical-align: middle;
		margin-bottom: 5px;
	}
	.ti-location-pin{
		margin-bottom: 5px;
	}
	.bedroom .alt-icon{
		height: 20px;
		margin-left: 4px;
	}
	.user-name {
		color: #14b8a6;
		font-weight: 600;
		font-size: 15px;
	}
	.title-post{
		color: #2c2c2c !important;
		background: none !important;
		opacity: 1 !important;
		display: block !important;
		width: 100% !important;
		min-width: 100% !important;
		max-width: 100% !important;
		flex: none !important;
	}
	.title-post a{
		color: #2c2c2c !important;
		display: block !important;
		width: 100% !important;
	}
.bds-save-btn {
	position: absolute;
	top: 10px;
	right: 10px;
	z-index: 10;
	width: 34px;
	height: 34px;
	border-radius: 50%;
	background: #ffffff;
	border: none;
	cursor: pointer;
	display: flex;
	align-items: center;
	justify-content: center;
	box-shadow: 0 2px 8px rgba(0, 0, 0, .18);
	transition: background .2s, transform .15s;
	padding: 0;
	backdrop-filter: blur(4px);
}
.bds-save-btn:hover {
	transform: scale(1.1);
}
.bds-save-btn svg {
	width: 18px;
	height: 18px;
	transition: fill .2s, stroke .2s;
	pointer-events: none;
}
.bds-save-btn .icon-heart {
    fill: none;
    stroke: #000;
    stroke-width: 1.8;
}
.bds-save-btn.is-saved .icon-heart {
    fill: #ee0033;
    stroke: none;
}
@keyframes bds-heart-pop {
	0% {
		transform: scale(1);
	}
	40% {
		transform: scale(1.3);
	}

	70% {
		transform: scale(.9);
	}
	100% {
		transform: scale(1);
	}
}
.bds-save-btn.pop svg {
	animation: bds-heart-pop .35s ease;
}
.bds-toast {
	position: fixed;
	bottom: 28px;
	left: 50%;
	transform: translateX(-50%) translateY(20px);
	background: #0d1011;
	color: #fff;
	padding: 10px 20px;
	border-radius: 8px;
	font-size: 13px;
	font-weight: 600;
	z-index: 99999;
	opacity: 0;
	transition: opacity .25s, transform .25s;
	pointer-events: none;
	white-space: nowrap;
	box-shadow: 0 4px 16px rgba(0, 0, 0, .2);
}
.bds-toast.show {
	opacity: 1;
	transform: translateX(-50%) translateY(0);
}
.dot{
	margin: 0 6px;
	color: #adb5bd;
	font-weight: 400;
}
 
.bds-vip-badge {
	position: absolute;
	top: 10px;
	left: 10px;
	z-index: 10;
	background: linear-gradient(135deg, #ffd166, #f5a623);
	color: #7a4a00;
	font-size: 11px;
	font-weight: 800;
	padding: 4px 10px;
	border-radius: 20px;
	box-shadow: 0 2px 8px rgba(0, 0, 0, .18);
	letter-spacing: .5px;
	display: inline-flex;
	align-items: center;
	gap: 3px;
	line-height: 1.4;
}
 
.bds-vip-badge svg {
	width: 11px;
	height: 11px;
}

/* ===== 3-column layout for non-ngop items ===== */
.list-news.has-author-col {
	display: flex;
	align-items: stretch;
	gap: 16px;
}
.list-news.has-author-col .thumb-list {
	flex: 0 0 240px;
	width: 240px;
}
.list-news.has-author-col .content {
	flex: 1 1 auto;
	min-width: 0;
}
.list-news.has-author-col .item-author-col {
	flex: 0 0 220px;
	width: 220px;
	border-left: 1px solid #eee;
	padding: 12px 16px 12px 20px;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-self: center;
}

.ia-author-row {
	display: flex;
	flex-direction: row;
	align-items: center;
	text-align: left;
	gap: 10px;
	margin-bottom: 14px;
}
.ia-avatar {
	width: 64px;
	height: 64px;
	border-radius: 50%;
	border: 2px solid #e5e7eb;
	background: #fff4f1;
	color: #b91c1c;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 26px;
	font-weight: 700;
	flex-shrink: 0;
	overflow: hidden;
}
.ia-avatar img {
	width: 100%;
	height: 100%;
	border-radius: 50%;
	object-fit: cover;
}
.ia-author-name {
	font-size: 16px;
	font-weight: 600;
	color: #1a1a1a;
	line-height: 1.3;
}
.ia-post-count {
	font-size: 13px;
	color: #08979c;
	text-decoration: underline;
	display: inline-block;
	margin-top: 2px;
}
.ia-post-count:hover {
	color: #0c7d8b;
}
.ia-btn {
	display: flex;
	align-items: center;
	justify-content: center;
	gap: 8px;
	width: 100%;
	height: 42px;
	border-radius: 4px;
	text-decoration: none;
	font-size: 14px;
	font-weight: 600;
	box-sizing: border-box;
	margin-bottom: 8px;
	color: #fff;
	transition: all .2s ease;
}
.ia-btn:last-of-type { margin-bottom: 0; }
.ia-btn img {
	width: 16px;
	height: 16px;
	object-fit: contain;
	flex-shrink: 0;
}
.ia-btn-zalo {
	background: #fff;
	border: 1px solid #d9d9d9;
	color: #222;
	font-weight: normal;
}
.ia-btn-zalo:hover { background: #fafafa; }
.ia-btn-call {
	background: var(--btn, #10b981);
	color: #fff;
	border: none;
	font-weight: normal;
}
.ia-btn-call:hover {
	color: #fff;
	background: var(--btn-hover, #0da271);
}
.ia-icon-call { filter: invert(1) brightness(100%); }

.footer-content .date {
	font-size: 13px;
	color: #8a8a8a;
	display: flex;
	align-items: center;
	gap: 5px;
}

/* Desktop: hiện ngày đăng, ẩn tên/sđt. Mobile: ngược lại */
.footer-content-contact-mobile {
	display: none;
}
@media (max-width: 992px) {
	.footer-content-date {
		display: none !important;
	}
	.footer-content-contact-mobile {
		display: block;
	}
}

@media (max-width: 992px) {
	.list-news.has-author-col {
		display: block;
	}
	.list-news.has-author-col .thumb-list {
		width: 100%;
		flex: none;
	}
	.list-news.has-author-col .content {
		width: 100%;
		flex: none;
	}
	.list-news.has-author-col .item-author-col {
		display: none;
	}
}
</style>
<article id="post-<?php the_ID(); ?>" class="list-news swiper-slide<?php echo (!get_query_var('is_ngop', false)) ? ' has-author-col' : ''; ?>">
 
<?php
$post_id = get_the_ID();
$price = rwmb_meta('prefix-price');
$unit = rwmb_meta('prefix-unit');
$area = rwmb_meta('prefix-area');
$address = rwmb_meta('prefix-address');
$bathroom = rwmb_meta('prefix-bathroom');
$bedroom = rwmb_meta('prefix-bedroom');
$post_link = rwmb_meta('prefix-post');
$phone_custom = rwmb_meta('prefix-phone-custom');
$name_custom = rwmb_meta('prefix-name-custom');
 
$status_terms = get_the_terms($post_id, "property_status");
$price = (float)$price;
$custom_user = get_current_custom_user();
$custom_user_id = $custom_user ? (int)$custom_user->id : 0;
$is_saved = $custom_user_id ? is_favorited($custom_user_id, $post_id) : false;
 
//check bds
$room_type_ids = array(8, 9, 11);
$property_type_terms = get_the_terms($post_id, "property_type");
$has_rooms = false;
if (!empty($property_type_terms) && !is_wp_error($property_type_terms)) {
    foreach ($property_type_terms as $term) {
        if (in_array($term->term_id, $room_type_ids)) {
            $has_rooms = true;
            break;
        }
    }
}
 
$vip_check = function_exists('bds_check_post_vip') ? bds_check_post_vip($post_id) : ['is_vip' => false];
$is_vip_active = $vip_check['is_vip'];
?>
 
<?php $is_ngop = get_query_var('is_ngop', false);?>
		<?php if (has_post_thumbnail()) : ?>
<div class="thumb-list">
	<?php if ($is_vip_active): ?>
	<span class="bds-vip-badge">
		<svg viewBox="0 0 24 24" fill="currentColor">
			<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
		</svg>
		VIP
	</span>
	<?php endif; ?>
 
	<button
		class="bds-save-btn <?php echo $is_saved ? 'is-saved' : ''; ?>"
		data-post="<?php echo esc_attr($post_id); ?>"
		onclick="favToggle(this, event)"
		title="Lưu tin">
		<svg class="icon-heart" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
			<path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
		</svg>
	</button>
 
    <a class="thumb-4x3" href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('thumb5x3'); ?>
    </a>
 
    <span class="status">
        <?php
        if (!empty($status_terms) && !is_wp_error($status_terms)) {
            $names = [];
            foreach ($status_terms as $term) {
                $names[] = $term->name;
            }
            echo implode(', ', $names);
        }
        ?>
    </span>
</div>
<?php endif; ?>
		<!-- /post thumbnail -->
		<div class="content">
			<h3 class="title-post">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>
			<div class="meta">
				<span class="meta-price">
						<strong>
							<?php
								if ($price) {
									if ($price >= 1000000000) {
										$value = $price / 1000000000;
										echo rtrim(rtrim(sprintf('%.10f', $value), '0'), '.');
									} elseif ($price >= 1000000) {
										$value = $price / 1000000;
										echo rtrim(rtrim(sprintf('%.10f', $value), '0'), '.');
									} else {
										if ($unit == 'trieu' && $price > 1000) {
											$value = $price / 1000;
											echo rtrim(rtrim(sprintf('%.10f', $value), '0'), '.');
										} else {
											echo number_format($price, 0, ',', '.');
										}
									}
								}
								?>
								</span>
								<?php
								if ($price) {
									if ($price >= 1000000000) {
										echo ' tỷ';
									} elseif ($price >= 1000000) {
										echo ' triệu';
									} else {
										if ($unit == 'trieu') {
											if ($price > 1000) {
												echo 'tỷ';
											} else {
												echo ' triệu';
											}
										} elseif ($unit == 'ty') {
											echo ' tỷ';
										} else {
											echo ' đ';
										}
									}
								}
							?>
						</strong>
					</span> 
				<span class="dot">•</span>
				<span class="area">
					<?php echo $area; ?> m<sup>2<sup>
				</span> 
				<span class="dot">•</span>
				<?php if ($has_rooms): ?>
				<span class="bedroom">
					<?php
						$bedroom = get_post_meta($post->ID, 'prefix-bedroom', true);
						if(!empty($bedroom)){
							if($bedroom == 6){
								echo 'Studio';
							}elseif($bedroom == 7){
								echo '1+ ';
							}elseif($bedroom == 8){
								echo '2+ ';
							}else{
								echo $bedroom . ' ';
							}
						}else{
							echo '&nbsp;';
						}
					?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/bedroom.png" alt="Bedroom Icon" class="alt-icon">
				</span> 
				<span class="dot">•</span>
				<span class="bathroom">
					<?php
						$bathroom = get_post_meta($post->ID, 'prefix-bathroom', true);
						if(!empty($bathroom)){
							echo $bathroom . ' ';
						}else{
							echo '&nbsp;';
						}
					?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/bathroom.png" alt="Bathroom Icon" class="alt-icon">
				</span>
				<span class="dot">•</span>
				<?php endif; ?> 
				<span class="direction">
					<img src="<?php echo get_template_directory_uri(); ?>/img/icons/direction.png"
						alt="Direction Icon"
						style="width: 15px; height: 15px; vertical-align: middle;" class="alt-icon">
					<?php
					$direction_terms = get_the_terms($post->ID, "property_direction");
					if (!empty($direction_terms)) {
						$direction_count = 0;
						foreach ($direction_terms as $term) {
							if ($direction_count > 0) {
								echo ', ';
							}
							echo $term->name;
						}
					} else {
						echo '&nbsp;';
					}
					?>
				</span>
				<div class="meta-location">
					<span class="ti-location-pin"></span>
					<span class="location">
						<?php
						$direction_terms = get_the_terms($post->ID, "property_location");
						if (!empty($direction_terms)) {
							$direction_count = 0;
							foreach ($direction_terms as $term) {
								if ($direction_count > 0) {
									echo ', ';
								}
								echo $term->name;
								$direction_count++;
							}
						} else {
							echo '&nbsp;';
						}
						?>
					</span>
				</div>
			</div>
			<?php if($is_ngop): ?>
			<div class="footer-content">
			  <div class="user-name">
					<?php
						if(!empty($name_custom)){
							echo esc_html($name_custom);
						}else{
							echo '';
						}
					?>
				</div>
				<div class="author">
            	<?php 
						if($phone_custom){
							echo '<a class="phone" href="tel:'.$phone_custom.'"><span class="ti-mobile"></span> '.$phone_custom .'</a>';
						}
				?>
			  </div>
			</div>
			<?php else: ?>
			<div class="footer-content footer-content-date">
				<div class="date">
					<span class="ti-calendar"></span>
					<?php
						$post_timestamp = get_the_time('U');
						$current_timestamp = current_time('timestamp');

						$post_date = date('Y-m-d', $post_timestamp);
						$today = date('Y-m-d', $current_timestamp);
						$yesterday = date('Y-m-d', strtotime('-1 day', $current_timestamp));
						$two_days_ago = date('Y-m-d', strtotime('-2 days', $current_timestamp));

						if ( $post_date == $today ) {
							echo 'Hôm nay';
						} elseif ( $post_date == $yesterday ) {
							echo '1 ngày trước';
						} elseif ( $post_date == $two_days_ago ) {
							echo '2 ngày trước';
						} else {
							the_time('d/m/Y');
						}
					?>
				</div>
			</div>
			<div class="footer-content footer-content-contact-mobile">
			  <div class="user-name">
					<?php
						if(!empty($name_custom)){
							echo esc_html($name_custom);
						}else{
							echo '';
						}
					?>
				</div>
				<div class="author">
            	<?php 
						if($phone_custom){
							echo '<a class="phone" href="tel:'.$phone_custom.'"><span class="ti-mobile"></span> '.$phone_custom .'</a>';
						}
				?>
			  </div>
			</div>
			<?php endif; ?>
		</div>
		<!-- /content -->

		<?php if (!$is_ngop): ?>
		<!-- cột 3: mini sidebar tác giả -->
		<div class="item-author-col">
			<?php
			$author_info = function_exists('bds_get_post_author_info') ? bds_get_post_author_info($post_id) : null;
			if ($author_info):
				$ia_phone_clean = preg_replace('/[^0-9+]/', '', $author_info['phone']);
				$ia_link_param  = ($author_info['link_type'] === 'custom') ? 'dt_author' : 'dt_wp_author';
				$ia_listing_url = add_query_arg($ia_link_param, $author_info['author_id_for_link'], home_url('/tin-dang-cua-nguoi-dung/'));
			?>
				<div class="ia-author-row">
					<div class="ia-avatar">
						<?php echo $author_info['avatar_html']; ?>
					</div>
					<div>
						<div class="ia-author-name"><?php echo esc_html($author_info['name']); ?></div>
						<?php if ($author_info['post_count'] > 0): ?>
							<a href="<?php echo esc_url($ia_listing_url); ?>" class="ia-post-count">
								<?php echo (int) $author_info['post_count']; ?> tin đăng
							</a>
						<?php endif; ?>
					</div>
				</div>

				<?php if ($author_info['phone']): ?>
					<a href="https://zalo.me/<?php echo esc_attr($ia_phone_clean); ?>" target="_blank" class="ia-btn ia-btn-zalo">
						<img src="<?php echo get_template_directory_uri(); ?>/img/zalo.jpg" alt="Zalo">
						<span>Chat Zalo</span>
					</a>
					<a href="tel:<?php echo esc_attr($ia_phone_clean); ?>" class="ia-btn ia-btn-call">
						<img src="<?php echo get_template_directory_uri(); ?>/img/phone.png" class="ia-icon-call" alt="Gọi điện">
						<span>Gọi điện</span>
					</a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</article>