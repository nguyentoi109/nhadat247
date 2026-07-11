<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
	
        <?php get_template_part('loop-property/item-property'); ?>

    <?php endwhile; ?>

<?php else : ?>

    <article>
        <h2><?php _e('Không có nội dung.', 'html5blank'); ?></h2>
    </article>

<?php endif; ?>