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
		color: #2c2c2c;
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
</style>
<article id="post-<?php the_ID(); ?>" class="list-news swiper-slide">
 
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
<?php if(!$is_ngop): ?>
<div class="header-list-news">
    <span class="price">
		<strong>
			<strong><span class="ti-tag"></span> Giá:</strong>
				<span class="num">
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
				</span>
		</strong>
	</span>
</div>
<?php endif; ?>
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
      		<?php if(!$is_ngop): ?>
				<?php html5wp_excerpt('html5wp_index');?>
			<?php endif; ?>
			<div class="meta">
				<?php if($is_ngop): ?>
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
					<?php endif; ?>
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
				//get_template_part("meta-user")
						if($phone_custom){
							echo '<a class="phone" href="tel:'.$phone_custom.'"><span class="ti-mobile"></span> '.$phone_custom .'</a>';
						}
				?>
			  </div>
				<!-- <div class="date">
					<span class="ti-calendar"></span> 
					<?php 
						// $post_timestamp = get_the_time('U');
						// $current_timestamp = current_time('timestamp');

						// $post_date = date('Y-m-d', $post_timestamp);
						// $today = date('Y-m-d', $current_timestamp);
						// $yesterday = date('Y-m-d', strtotime('-1 day', $current_timestamp));
						// $two_days_ago = date('Y-m-d', strtotime('-2 days', $current_timestamp));

						// if ( $post_date == $today ) {
						// 	echo 'Hôm nay';
						// } elseif ( $post_date == $yesterday ) {
						// 	echo '1 ngày trước';
						// } elseif ( $post_date == $two_days_ago ) {
						// 	echo '2 ngày trước';
						// } else {
						// 	the_time('d/m/Y');
						// }
					?>
				</div> -->
			</div>
		</div>
		<!-- <?php if($post_link): ?>
		<div class="wrap-news">
			<div class="title">Tin tức liên quan</div>
			<a href="<?php echo $post_link[1]?>" target="_blank" title="<?php echo $post_link[0]?>"><?php echo $post_link[0]?></a>
		</div>
		<?php endif; ?> -->
      <!-- <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn">Xem chi tiết</a> -->
		<!-- </div> -->
	</article>