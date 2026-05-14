<?php
global $post;

if (!$post) return;

$status_terms = get_the_terms($post->ID, 'property_status');
$location_terms = get_the_terms($post->ID, 'property_location');

if (!empty($status_terms) && !is_wp_error($status_terms) &&
    !empty($location_terms) && !is_wp_error($location_terms)) :

    $status_ids = wp_list_pluck($status_terms, 'term_id');
    $location_ids = wp_list_pluck($location_terms, 'term_id');

    $query = new WP_Query(array(
        'post_type' => 'property',
        'post__not_in' => array($post->ID),
        'posts_per_page' => 4,
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
                'terms'    => $location_ids,
            ),
        ),
    ));

    if ($query->have_posts()) :
?>

<section class="related related-area">
  <h2 class="title-section"><span>TIN CÙNG KHU VỰC</span></h2>

  <div class="container list-style">

    <?php while ($query->have_posts()) : $query->the_post(); ?>

      <?php
        $price = rwmb_meta('prefix-price');
        $unit  = rwmb_meta('prefix-unit');
        $area  = rwmb_meta('prefix-area');

        $price_value = is_numeric($price) ? (float)$price : 0;
      ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class('list-news'); ?>>

        <div class="header-list-news">
          <span class="price">
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

                  echo number_format($price, 0, ',', '.');

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

                    echo ' triệu';

                  } elseif ($unit == 'ty') {

                    echo ' tỷ';

                  } else {

                    echo ' đ';

                  }

                }

              }
              ?>
					</span>
        </div>

        <?php if (has_post_thumbnail()) : ?>
          <div class="thumb-list">
            <a class="thumb-4x3" href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('thumb5x3'); ?>
            </a>

            <span class="status">
              <?php
              if (!empty($status_terms)) {
                  $i = 0;
                  foreach ($status_terms as $term) {
                      if ($i++ > 0) echo ', ';
                      echo $term->name;
                  }
              }
              ?>
            </span>
          </div>
        <?php endif; ?>

        <div class="content">

          <h3 class="title-post">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h3>

          <div class="des">
            <?php html5wp_excerpt('html5wp_index'); ?>
          </div>

          <div class="meta">
            <span class="area">
              <strong><span class="ti-ruler"></span>:</strong>
              <?php echo esc_html($area); ?> m²
            </span> |

            <span class="location">
              <strong><span class="ti-location-pin"></span>:</strong>
              <?php
              $loc = get_the_terms(get_the_ID(), "property_location");
              if (!empty($loc)) {
                  $i = 0;
                  foreach ($loc as $t) {
                      if ($i++ > 0) echo ', ';
                      echo $t->name;
                  }
              } else {
                  echo '&nbsp;';
              }
              ?>
            </span>
          </div>

          <div class="footer-content">
            <div class="author"><?php get_template_part("meta-user"); ?></div>
            <div class="date"><span class="ti-calendar"></span> <?php the_time('d/m/Y'); ?></div>
          </div>

        </div>

        <!-- SIDE -->
        <div class="side-content">

          <span class="price">
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

                  echo number_format($price, 0, ',', '.');

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

                    echo ' triệu';

                  } elseif ($unit == 'ty') {

                    echo ' tỷ';

                  } else {

                    echo ' đ';

                  }

                }

              }
              ?>
            </span>

          <a href="<?php the_permalink(); ?>" class="btn">Xem chi tiết</a>

        </div>

      </article>

    <?php endwhile; ?>

  </div>
</section>

<?php
    endif;
    wp_reset_postdata();
endif;
?>