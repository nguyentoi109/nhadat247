<?php
	$query = new WP_Query(array(
		'post_type'=>'property',
		/*'tax_query' => array(
			array (
				'taxonomy' => 'property_status',
				'field' => 'id',
				'terms' => 3,
				),
		),*/
		//'meta_key' => 'post_views_count',
		'meta_key' => 'prefix-vip',
		'meta_value' => 1,
		//'orderby' => 'date',
		'orderby' => 'modified',
		'order' => 'DESC',
		'posts_per_page' => 20,
	));
	if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();

?>
	<?php get_template_part('loop-property/item-property'); ?>

<?php endwhile; wp_reset_query();?>
<?php endif; ?>