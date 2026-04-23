<!--Top 1920x250--> 
<?php
	$query = new WP_Query(array(
		'post_type'=>'banner',
		'tax_query' => array(
			array (
				'taxonomy' => 'banner_position',
				'field' => 'slug',
				'terms' => 'banner-top-mobile',
				)
		),
		'post_status'=>'publish',
		'orderby' => 'rand',
		'order' => 'DESC',
		'posts_per_page'=> 1
  ));

	if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();
	$url = rwmb_meta( 'prefix-banner-url' );
?>

	<!-- article -->
	<article class="banner-top"  >
		<?php if ( has_post_thumbnail()) : ?>
			<div class="thumb-banner">
				<a href="<?php echo ($url ? $url : home_url() ); ?>" title="<?php the_title(); ?>" target="_blank"><?php the_post_thumbnail('thumb-banner'); ?></a>
			</div>
		<?php endif; ?>
		<!-- /post thumbnail -->
	</article>
	<!-- /article -->

<?php endwhile; wp_reset_query();?>
<?php else: ?>


<?php endif; ?>
<!--End Top-->
