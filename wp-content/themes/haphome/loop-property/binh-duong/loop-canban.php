<?php
	$query = new WP_Query(array(
		'post_type'=>'property',
		'tax_query' => array(
			array (
				'taxonomy' => 'property_status',
				'field' => 'id',
				'terms' => 6,
			),
			array (
				'taxonomy' => 'property_location',
				'field' => 'id',
				'terms' => 12,
				),
		),
		'post_status'=>'publish',
		'orderby' => 'ID',
		'order' => 'DESC',
		'paged' => get_query_var( 'paged' ),
		'posts_per_page'=> 20
  ));

	if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();
	
	/* $price = rwmb_meta( 'prefix-price' );
	$unit = rwmb_meta( 'prefix-unit' );
	$area = rwmb_meta( 'prefix-area' ); */
?>

	<!-- article -->
	<?php get_template_part('loop-property/item-property'); ?>
	<!-- /article -->

<?php endwhile; wp_reset_query();?>
<?php if (function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $query ) ); } ?>
<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Không có nội dung.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
