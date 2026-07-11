<?php 
/* Template Name: Tất cả BĐS */ 
get_header();
?>

<section class="container wrap-content">
	<main role="main" class="full-page">
		<?php
			set_query_var('breadcrumb_all', 1);
			get_template_part('custom-breadcrumb');
		?>
		<div class="list-style list-all">
			<?php
            $paged = max(1, get_query_var('paged'));
            $price_area_meta_query = bds_filter_price_area_meta_query();

            $query_args = array(
                'post_type'   => 'property',
                'post_status' => 'publish',
            );

            if (!empty($price_area_meta_query)) {
                $query_args['meta_query'] = $price_area_meta_query;
            }

            $result = bds_get_sorted_query($query_args, $paged, 20);
            $query  = $result['query'];

            if ($query->have_posts()) :
                set_query_var('is_ngop', true);
            ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php get_template_part('loop-property/item-property'); ?>
                <?php endwhile; ?>

                <div class="pagination">
                    <?php
                    if (function_exists('wp_pagenavi')) {
                        wp_pagenavi(array('query' => $query));
                    } else {
                        echo paginate_links(array(
                            'total'   => $result['max_num_pages'],
                            'current' => $paged,
                        ));
                    }
                    ?>
                </div>

            <?php
            else :
            ?>
                <article>
                    <h2>Không có bất động sản nào</h2>
                </article>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </main>
</section>
<?php get_footer(); ?>