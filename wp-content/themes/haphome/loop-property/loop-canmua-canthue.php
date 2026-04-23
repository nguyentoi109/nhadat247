<?php
	$query = new WP_Query(array(
		'post_type'=>'property',
		'tax_query' => array(
			array (
				'taxonomy' => 'property_status',
				'field' => 'id',
				'terms' => array(4, 5),
				),
		),
		'post_status'=>'publish',
		'orderby' => 'ID',
		'order' => 'DESC',
		'paged' => get_query_var( 'paged' ),
		'posts_per_page'=> 20));

	if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();
	
	$price = rwmb_meta( 'prefix-price' );
	$area = rwmb_meta( 'prefix-area' );
?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" class="list-news wow fadeInUp"  >

		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<div class="thumb-list">
				<a class="thumb-5x3" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('thumb5x3'); ?>
				</a>
				<span class="status">
					<?php
						$status_terms = get_the_terms( $post->ID,"property_status" );
						if(!empty( $status_terms )){
							$status_count = 0;
							foreach( $status_terms as $term ){
								if( $status_count > 0 ){
									echo ', ';
								}
								echo $term->name;
							}
						}
					?>					 
				</span>
			</div>
		<?php endif; ?>
		<!-- /post thumbnail -->

		<div class="content">
			<!-- post title -->
			<h2 class="title-post">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h2>
			<!-- /post title -->

			<!-- post details -->
			
			<div class="date">
				<span class="price">
					<strong><span class="mdi mdi-tag-outline"></span>Giá: <span class="num"><?php echo number_format($price, 0,",","."); ?> đ</span></strong>
				</span>
				<span class="mdi mdi-clock-outline"></span> <?php the_time('d/m/Y'); ?>
			</div>
			<!-- /post details -->
			
				<div class="des">
					<?php html5wp_excerpt('html5wp_custom_post');?>
					<a class="view-article" href="<?php the_permalink(); ?>">Chi tiết</a>
				</div>
			
			<div class="meta">
				<span class="area">
					<strong><span class="mdi mdi-arrow-expand-horizontal"></span>:</strong> <?php echo $area; ?> m<sup>2<sup>
				</span> |
				<span class="location">
					<strong><span class="mdi mdi-map-marker-outline"></span>:</strong>
					<?php
						$direction_terms = get_the_terms( $post->ID,"property_location" );
						if(!empty( $direction_terms )){
							$direction_count = 0;
							foreach( $direction_terms as $term ){
								if( $direction_count > 0 ){
									echo ', ';
								}
								echo $term->name;
							}
						}else{
							echo '&nbsp;';
						}
					?>					 
				</span> | 
				<span class="direction">
					<strong><span class="mdi mdi-compass-outline"></span>:</strong>					
					<?php
						$direction_terms = get_the_terms( $post->ID,"property_direction" );
						if(!empty( $direction_terms )){
							$direction_count = 0;
							foreach( $direction_terms as $term ){
								if( $direction_count > 0 ){
									echo ', ';
								}
								echo $term->name;
							}
						}else{
							echo '&nbsp;';
						}
					?>	
				</span>
			</div>

		</div>

	</article>
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
