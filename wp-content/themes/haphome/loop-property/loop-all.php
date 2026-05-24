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
            $query = new WP_Query(array(
                'post_type'      => 'property',
                'post_status'    => 'publish',
                'orderby'        => 'ID',
                'order'          => 'DESC',
                'posts_per_page' => 20,
                'paged'          => $paged
            ));

            if ($query->have_posts()) :
                $temp_query = $wp_query;
                $wp_query = $query;
				
				set_query_var('is_ngop', true);
            ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php get_template_part('loop-property/item-property'); ?>
                <?php endwhile; ?>

                <div class="pagination">
                    <?php get_template_part('pagination'); ?>
                </div>

            <?php
                $wp_query = $temp_query;
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