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
		height: 17px; 
		vertical-align: middle;
	}
	.bedroom .alt-icon{
		height: 20px;
	}
	.user-name{
		color: var(--name);
	}
	.title-post{
		color: #2c2c2c;
	}
</style>
<?php
global $post;

if (!$post) return;

$status_terms = get_the_terms($post->ID, 'property_status');
$location_terms = get_the_terms($post->ID, 'property_location');

if (!empty($status_terms) && !is_wp_error($status_terms) &&
    !empty($location_terms) && !is_wp_error($location_terms)) :

    $status_ids = wp_list_pluck($status_terms, 'term_id');
    $location_ids = wp_list_pluck($location_terms, 'term_id');

    $district_id = 0;
    $city_id = 0;

    foreach ($location_terms as $loc_term) {
        if ($loc_term->parent != 0) {
            $district_id = $loc_term->term_id;
            $city_id = $loc_term->parent;
            break;
        }
        else {
            $city_id = $loc_term->term_id;
        }
    }

    $district_posts = array();

    if ($district_id) {
        $district_query = new WP_Query(array(
            'post_type'     => 'property',
            'post__not_in'  => array($post->ID),
            'posts_per_page'=> 4,

            'tax_query' => array(
            'relation' => 'AND',
                array(
                    'taxonomy' => 'property_status',
                    'field'    => 'term_id',
                    'terms'    => $status_ids,
                ),

                array(
                    'taxonomy' => 'property_location',
                    'field'    => 'term_id',
                    'terms'    => array($district_id),
                    ),
                ),
            ));

        if ($district_query->have_posts()) {
            while ($district_query->have_posts()) {
                $district_query->the_post();
                $district_posts[] = get_post();
            }
        }

        wp_reset_postdata();
    }
    $need_more = 4 - count($district_posts);
    $exclude_ids = array($post->ID);

    foreach ($district_posts as $p) {
        $exclude_ids[] = $p->ID;
    }

    $city_posts = array();
    if ($need_more > 0 && $city_id) {
        $city_query = new WP_Query(array(
            'post_type'      => 'property',
            'post__not_in'   => $exclude_ids,
            'posts_per_page' => $need_more,
            'tax_query' => array(
                'relation' => 'AND',
                  array(
                      'taxonomy' => 'property_status',
                      'field'    => 'term_id',
                      'terms'    => $status_ids,
                  ),
                  array(
                      'taxonomy' => 'property_location',
                      'field'    => 'term_id',
                      'terms'    => array($city_id),
                  ),
              ),
          ));

        if ($city_query->have_posts()) {
            while ($city_query->have_posts()) {
                $city_query->the_post();
                $city_posts[] = get_post();
            }
        }
        wp_reset_postdata();
    }
    $related_posts = array_merge($district_posts, $city_posts);

   if (!empty($related_posts)) :
?>

<section class="related related-area">
  <h2 class="title-section"><span>TIN CÙNG KHU VỰC</span></h2>

  <div class="container list-style">

    <?php foreach ($related_posts as $post) : setup_postdata($post); ?>

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
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>

            <div class="des">
                <?php html5wp_excerpt('html5wp_index'); ?>
            </div>

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
                </span> |

                <span class="area">
                    <?php echo $area; ?> m²
                </span> |

                <span class="bedroom">
					<img src="<?php echo get_template_directory_uri(); ?>/img/bedroom.png"
						alt="Bedroom Icon"
						class="alt-icon">
					<?php
						$bedroom = get_post_meta($post->ID, 'prefix-bedroom', true);
						if(!empty($bedroom)){
							if($bedroom == 6){
								echo 'Studio';
							}elseif($bedroom == 7){
								echo '1 phòng ngủ +';
							}elseif($bedroom == 8){
								echo '2 phòng ngủ +';
							}else{
								echo $bedroom . ' phòng ngủ';
							}
						}else{
							echo '&nbsp;';
						}
					?>
				</span> |

                <span class="bathroom">
					<img src="<?php echo get_template_directory_uri(); ?>/img/bathroom.png"
						alt="Bathroom Icon"
						class="alt-icon">
					<?php
						$bathroom = get_post_meta($post->ID, 'prefix-bathroom', true);
						if(!empty($bathroom)){
							echo $bathroom  ." phòng";
						}else{
							echo '&nbsp;';
						}
					?>
				</span> |

               <span class="location">
					<!-- <strong><span class="ti-location-pin"></span>:</strong> -->
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
				</span> | 
                
                <span class="direction">
					<img src="<?php echo get_template_directory_uri(); ?>/img/icons/direction.png" 
							alt="Direction Icon" 
							style="width: 15px; height: 15px; vertical-align: middle;">
						<?php
						$direction_terms = get_the_terms( $post->ID,"property_direction" );
						if(!empty( $direction_terms )){
							$direction_count = 0;
							foreach( $direction_terms as $term ){
								if( $direction_count > 0 ){
									echo ', ';
								}
								echo $term->name;
							}
						}else{
							echo '&nbsp;';
						}
					?>	
				</span>

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

        <div class="side-content">
            <span class="price">
                <strong><span class="ti-tag"></span> Giá: </strong>
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
            </span>
            <a href="<?php the_permalink(); ?>" class="btn"> Xem chi tiết </a>
        </div>
      </article>
    <?php endforeach; wp_reset_postdata(); ?>
  </div>
</section>

<?php
    endif;
    wp_reset_postdata();
    endif;
?>