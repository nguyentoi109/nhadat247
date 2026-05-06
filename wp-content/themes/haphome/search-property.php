<?php get_header(); ?>

<section class="container wrap-content">
	<main role="main" class="full-page">


        <p class="notify">
            <?php echo sprintf(__('Hiện có %s bất động sản', 'html5blank'), $wp_query->found_posts); ?>
        </p>

        <div class="list-style">
            <?php get_template_part('loop-property'); ?>
        </div>

        <div class="pagination">
            <?php get_template_part('pagination'); ?>
        </div>

    </main>
</section>

<?php get_footer(); ?>