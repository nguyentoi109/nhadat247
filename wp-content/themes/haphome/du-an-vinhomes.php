<?php
/*
Template Name: Trang Vinhomes
*/

get_header();
?>
<section class="container wrap-content">
	<main role="main" class="full-page">
        <div class="breadcrumb-container">
            <?php
                set_query_var('breadcrumb_developer', 112);
                get_template_part('custom-breadcrumb-developer');
            ?>
        </div>
        <div class="list-style list-all container">
			<?php
			$paged = max(1, get_query_var('paged'));
			$price_area_meta_query = bds_filter_price_area_meta_query();

			$query_args = array(
				'post_type'   => 'property',
				'post_status' => 'publish',
				'tax_query'   => array(
					array(
						'taxonomy' => 'property_developer',
						'field'    => 'term_id',
						'terms'    => 112,
					),
				),
			);

			if (!empty($price_area_meta_query)) {
				$query_args['meta_query'] = $price_area_meta_query;
			}

			$result = bds_get_sorted_query($query_args, $paged, 20);
			$query  = $result['query'];
			?>

			<?php if ($query->have_posts()) : ?>
                
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php get_template_part('loop-property/item-property'); ?>

                <?php endwhile; ?>

                <!-- PAGINATION -->
                <div class="pagination">
                    <?php
                    if (function_exists('wp_pagenavi')) {
                        wp_pagenavi(array('query' => $query));
                    } else {
                        echo paginate_links(array(
                            'total'   => $query->max_num_pages,
                            'current' => $paged
                        ));
                    }
                    ?>
                </div>

            <?php else : ?>
                <h2>Không có bất động sản nào</h2>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

        </div>

    </main>
</section>
<?php get_footer(); ?>