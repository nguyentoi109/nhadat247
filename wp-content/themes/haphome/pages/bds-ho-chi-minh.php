<?php
/*
Template Name: Trang thành phố Hồ Chí Minh
*/
get_header();
?>
<section class="container wrap-content">
	<main role="main" class="full-page">
        <div class="breadcrumb-container">
            <?php
            set_query_var('breadcrumb_location', 54);

            get_template_part('custom-breadcrumb');
            ?>
        </div>
    <section class="section section-home-search clear full-bleed">
    <?php 
        set_query_var('ngop_location_id', $location_id ?? 54);
        set_query_var('ngop_status_id', $status_id ?? 0);
        set_query_var('ngop_type_id', $type_id ?? 0);

        get_template_part('bat-dong-san-ngop'); 
    ?>
    </section>
        <div class="list-style list-all container">
			<?php
			$paged = max(1, get_query_var('paged'));

			$query = new WP_Query(array(
				'post_type'      => 'property',
                'post_status'    => 'publish',
                'orderby'        => 'ID',
                'order'          => 'DESC',
                'paged'          => $paged,
                'posts_per_page' => 20,

                'tax_query' => array(
                    array(
                        'taxonomy' => 'property_location',
                        'field'    => 'term_id',
                        'terms'    => 54 
                    )
                )
			));
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

    </main>
</section>

<?php get_footer(); ?>