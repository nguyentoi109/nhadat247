<?php
	$query = new WP_Query(array(
		'post_type'=>'property',
		'meta_key' => 'post_views_count',
		'orderby' => 'post_views_count',
		'order' => 'ASC',
		'posts_per_page' => 18,
	));
	if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();

?>
	<?php get_template_part('loop-property/item-property'); ?>

<?php endwhile; wp_reset_query();?>
<?php endif; ?>