<?php
	$query = new WP_Query(array(
		'post_type'=>'property',
		'orderby' => 'ID',
		'order' => 'DESC',
		//'orderby' => 'date',
		'orderby' => 'modified',
		'posts_per_page' => 10,
	));
	if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();

?>
	<?php get_template_part('loop-property/item-property'); ?>
	
<?php endwhile; wp_reset_query();?>
<?php endif; ?>