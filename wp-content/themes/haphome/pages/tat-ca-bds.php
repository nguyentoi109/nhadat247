<?php
/*
Template Name: Tất cả BDS
*/
get_header();
?>
<section class="container wrap-content">
	<main role="main" class="full-page">

		<div class="list-style list-all">

			<?php
			$paged = max(1, get_query_var('paged'));

			$query = new WP_Query(array(
				'post_type'      => 'property',
                'post_status'    => 'publish',
                'orderby'        => 'ID',
                'order'          => 'DESC',
                'paged'          => $paged,
                'posts_per_page' => 20,
                )
			);
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