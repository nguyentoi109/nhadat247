<?php
	$query = new WP_Query(array(
		'post_type'=>'property',
		'orderby' => 'ID',
		'order' => 'DESC',
		//'orderby' => 'date',
		'orderby' => 'modified',
		'posts_per_page' => 32,
	));
	if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();

?>
	<article id="post-<?php the_ID(); ?>" class="list-news wow fadeInUp"  >
		<?php if ( has_post_thumbnail()) : ?>
			<div class="thumb-list">
				<a class="thumb-4x3" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('thumb5x3'); ?>
				</a>
				<span class="status">
					<?php
						$price = rwmb_meta( 'prefix-price' );
						$unit = rwmb_meta( 'prefix-unit' );
						$area = rwmb_meta( 'prefix-area' );
						$address = rwmb_meta( 'prefix-address' );
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
			<h3 class="title-post">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>
			<div class="date">
				<span class="price">
        <strong><span class="ti-tag"></span>Giá: </strong>
          <span class="num">
          <?php echo number_format($price, 0,",","."); ?>
          </span>
          <?php
            if($unit){
              if($unit == 'trieu'){
                echo ' triệu';
              }
              if($unit == 'ty'){
                echo ' tỷ';
              }
            }else{
              echo ' đ';
            }
          ?>
      </span>
				<span class="mdi mdi-clock-outline"></span> <?php the_time('d/m/Y'); ?>
			</div>
			<!--<div class="des">
				<?php// html5wp_excerpt('html5wp_custom_post');?>
				<a class="view-article" href="<?php// the_permalink(); ?>">Chi tiết</a>
			</div>-->

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
	
<?php endwhile; wp_reset_query();?>
<?php endif; ?>