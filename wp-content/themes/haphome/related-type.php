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
	}
	.title-post{
		color: #2c2c2c;
	}

	.user-name {
		color: #14b8a6;
		font-weight: 600;
		font-size: 15px;
	}
</style>
<?php
global $post;

$backup_post = $post;

$tax_status = get_the_terms($post->ID, 'property_status');
$tax_type   = get_the_terms($post->ID, 'property_type');

if (!empty($tax_status) && !empty($tax_type)) :

$status_ids = wp_list_pluck($tax_status ?: [], 'term_id');
$type_ids   = wp_list_pluck($tax_type ?: [], 'term_id');

$args = array(
    'post_type'           => 'property',
    'post__not_in'        => array($post->ID),
    'posts_per_page'      => 4,
    'ignore_sticky_posts' => 1,
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'property_status',
            'field'    => 'term_id',
            'terms'    => $status_ids,
        ),
        array(
            'taxonomy' => 'property_type',
            'field'    => 'term_id',
            'terms'    => $type_ids,
        ),
    ),
);

$query = new WP_Query($args);

if ($query->have_posts()) :
?>

<section class="related related-type">
  <h2 class="title-section"><span>TIN CÙNG LOẠI</span></h2>

  <div class="container list-style">

    <?php while ($query->have_posts()) : $query->the_post(); ?>
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
        ?>

     <article id="post-<?php the_ID(); ?>" <?php post_class('list-news'); ?>>

        <?php if (has_post_thumbnail()) : ?>
        <div class="thumb-list">
            <a class="thumb-4x3" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('thumb5x3'); ?>
            </a>
            <span class="status">
                <?php
                    if (!empty($status_terms) && !is_wp_error($status_terms)) {
                        echo implode(', ', wp_list_pluck($status_terms, 'name'));
                    }
                ?>
            </span>
        </div>
        <?php endif; ?>

        <div class="content">
			<h3 class="title-post">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>
				<?php //html5wp_excerpt('html5wp_index');?>
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
								echo $bedroom ;
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
							echo $bathroom ;
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
						style="width: 15px; height: 15px; vertical-align: middle;">
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
                <span class="dot">•</span>
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
                    if (!empty($name_custom)) {
                        echo esc_html($name_custom);
                    }
                    ?>
                </div>

                <div class="author">
                    <?php
                    if ($phone_custom) {
                        echo '<a class="phone" href="tel:' . $phone_custom . '"> <span class="ti-mobile"></span> ' . $phone_custom . ' </a>';
                    }
                    ?>
                </div>

            </div>

        </div>

        <!-- <div class="side-content">
            <span class="price">
                <strong><span class="ti-tag"></span> Giá: </strong>
                    <span class="num">
                        <?php
                            // if ($price) {
                            //     if ($price >= 1000000000) {
                            //         $value = $price / 1000000000;
                            //         echo rtrim(rtrim(sprintf('%.10f', $value), '0'), '.');
                            //     } elseif ($price >= 1000000) {
                            //         $value = $price / 1000000;
                            //         echo rtrim(rtrim(sprintf('%.10f', $value), '0'), '.');
                            //     } else {
                            //         if ($unit == 'trieu' && $price > 1000) {
                            //             $value = $price / 1000;
                            //             echo rtrim(rtrim(sprintf('%.10f', $value), '0'), '.');
                            //         } else {
                            //             echo number_format($price, 0, ',', '.');
                            //         }
                            //     }
                            // }
                        ?>
                    </span>

                    <?php
                        // if ($price) {
                        //     if ($price >= 1000000000) {
                        //         echo ' tỷ';
                        //     } elseif ($price >= 1000000) {
                        //         echo ' triệu';
                        //     } else {
                        //         if ($unit == 'trieu') {
                        //             if ($price > 1000) {
                        //                 echo 'tỷ';
                        //             } else {
                        //                 echo ' triệu';
                        //             }
                        //         } elseif ($unit == 'ty') {
                        //             echo ' tỷ';
                        //         } else {
                        //             echo ' đ';
                        //         }
                        //     }
                        // }
                    ?>
                </span>
            </span>
          <a href="<?php the_permalink(); ?>" class="btn"> Xem chi tiết </a>
        </div>  -->
      </article>

    <?php endwhile; ?>

  </div>
</section>

<?php
endif;

wp_reset_postdata();
$post = $backup_post;

endif;
?>