<?php if (have_posts()) : while (have_posts()) : the_post(); 

  $price = rwmb_meta('prefix-price');
  $unit = rwmb_meta('prefix-unit');
  $area = rwmb_meta('prefix-area');
  $address = rwmb_meta('prefix-address');
  $post_link = rwmb_meta('prefix-post');
  $status_terms = get_the_terms(get_the_ID(), "property_status");
?>

<!-- article -->
<article id="post-<?php the_ID(); ?>" class="list-news swiper-slide wow fadeInUp">

    <div class="header-list-news">
        <span class="price">
            <strong>
                <span class="ti-tag"></span>Giá: 
                <span class="num"><?php echo $price ? number_format($price, 0, ",", ".") : 'Liên hệ'; ?></span>
                <span class="unit"><?php echo esc_html($unit); ?></span>
            </strong>
        </span>
    </div>

    <?php if (has_post_thumbnail()) : ?>
        <div class="thumb-list">
            <a class="thumb-4x3" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail('thumb4x3'); ?>
            </a>

            <span class="status">
                <?php
                if (!empty($status_terms) && !is_wp_error($status_terms)) {
                    $names = wp_list_pluck($status_terms, 'name');
                    echo implode(', ', $names);
                }
                ?>
            </span>
        </div>
    <?php endif; ?>

    <div class="content">
        <h3 class="title-post">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>

        <?php html5wp_excerpt('html5wp_index'); ?>

        <div class="meta">
            <span class="area">
                <strong><span class="ti-ruler"></span>:</strong> 
                <?php echo $area ? $area : '---'; ?> m<sup>2</sup>
            </span> |

            <span class="location">
                <strong><span class="ti-location-pin"></span>:</strong>
                <?php
                $location_terms = get_the_terms(get_the_ID(), "property_location");
                if (!empty($location_terms) && !is_wp_error($location_terms)) {
                    echo implode(', ', wp_list_pluck($location_terms, 'name'));
                } else {
                    echo '---';
                }
                ?>
            </span> | 

            <span class="direction">
                <strong><span class="ti-direction-alt"></span>:</strong>
                <?php
                $direction_terms = get_the_terms(get_the_ID(), "property_direction");
                if (!empty($direction_terms) && !is_wp_error($direction_terms)) {
                    echo implode(', ', wp_list_pluck($direction_terms, 'name'));
                } else {
                    echo '---';
                }
                ?>
            </span>
        </div>

        <div class="footer-content">
            <div class="author">
                <?php get_template_part("meta-user"); ?>
            </div>
            <div class="date">
                <span class="ti-calendar"></span> <?php the_time('d/m/Y'); ?>
            </div>
        </div>
    </div>

    <div class="side-content">
        <span class="price">
            <strong>
                <span class="ti-tag"></span>Giá: 
                <span class="num"><?php echo $price ? number_format($price, 0, ",", ".") : 'Liên hệ'; ?></span>
                <span class="unit"><?php echo esc_html($unit); ?></span>
            </strong>
        </span>

        <?php if (!empty($post_link) && is_array($post_link)) : ?>
            <div class="wrap-news">
                <div class="title">Tin tức liên quan</div>
                <a href="<?php echo esc_url($post_link[1]); ?>" target="_blank">
                    <?php echo esc_html($post_link[0]); ?>
                </a>
            </div>
        <?php endif; ?>

        <a href="<?php the_permalink(); ?>" class="btn">Xem chi tiết</a>
    </div>

</article>
<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

<article>
    <h2><?php _e('Không có nội dung.', 'html5blank'); ?></h2>
</article>

<?php endif; ?>                                                              