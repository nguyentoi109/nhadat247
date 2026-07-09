<?php
/*
Template Name: Trang Vũng Tàu
*/
get_header();
?>
<section class="container wrap-content">
	<main role="main" class="full-page">
        <div class="breadcrumb-container">
            <?php
                set_query_var('breadcrumb_location', 14);
                set_query_var('related_posts',get_related_posts_by_location(14, 5));
                get_template_part('custom-breadcrumb');
            ?>
        </div>
        <section class="section section-home-search clear full-bleed">
        <?php 
            set_query_var('ngop_location_id', $location_id ?? 14);
            set_query_var('ngop_status_id', $status_id ?? 0);
            set_query_var('ngop_type_id', $type_id ?? 0);

            get_template_part('bat-dong-san-ngop'); 
        ?>
        </section>
        <div class="list-style-wrap container">
            <div class="list-style list-all">
			<?php
                $paged = max(1, get_query_var('paged'));
                $price_area_meta_query = bds_filter_price_area_meta_query();

                $extra_args = [];
                if (!empty($price_area_meta_query)) {
                    $extra_args['meta_query'] = $price_area_meta_query;
                }
                $result = bds_get_sorted_listing_query(14, $extra_args, $paged, 20);
                $query  = $result['query'];
            ?>

			<?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php set_query_var('is_ngop', true);?>
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
           <?php get_template_part('sidebar-filter-property') ?>
        </div>
    </main>
</section>

<?php get_footer(); ?>