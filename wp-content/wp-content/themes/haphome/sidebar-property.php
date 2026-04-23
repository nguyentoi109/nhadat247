<!-- sidebar -->
<aside class="sidebar" role="complementary">
	<?php
	$gavatar = get_the_author_meta('user_email');
	if ( wp_is_mobile() ) {
		
	}else{ ?>
		<section class="info-user">
			<div class="thumb-full">
				<a href="" class="thumb thumb-1x1"><?php echo get_avatar($gavatar, 300); ?></a>
			</div>
			<div class="content-inf">
				<p><strong>Họ tên: <?php echo get_the_author_meta('nickname'); ?> </strong></p>
				<p><strong><span class="mdi mdi-email-outline"></span>:</strong> <a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo get_the_author_meta('user_email'); ?>" title="<?php echo get_the_author_meta('user_email'); ?>"><?php echo get_the_author_meta('user_email'); ?></a> </p>
				<p><strong><span class="mdi mdi-cellphone-basic"></span>:</strong> <?php echo get_the_author_meta('phone'); ?> </p>
				<p><strong><span class="mdi mdi-map-marker-outline"></span>:</strong> <?php echo get_the_author_meta('address'); ?> </p>
			</div>
		</section>
	<?php } ?>

	<!--<section class="related">
		  <h2 class="title-section">TIN CÙNG NGƯỜI ĐĂNG</h2>
		  <div class="flex-box">
		<?php
		/*$postType = 'property';

			$args=array(
			'post_type'    => $postType,
			'post__not_in' => array($post->ID),
			'showposts'=>1, 
			'caller_get_posts'=>1,
			);
			$my_query = new wp_query($args);
			if( $my_query->have_posts() ) 
			{
				while ($my_query->have_posts())
				{
					$my_query->the_post();
					?>
					<article id="post-<?php the_ID(); ?>" class="list-news  wow zoomIn">
				<?php if ( has_post_thumbnail()) : ?>
				  <div class="thumb-list">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="thumb-5x3">
					  <?php the_post_thumbnail(thumb5x3);?>
					</a>
				  </div>
				<?php endif; ?>
				<h2>
				  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?>           
				  </a>
				</h2>
			  </article>
					<?php
				}
			}
		  wp_reset_query();
		  */
		?>
		</div>
	</section>-->

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-sidebar')) ?>
	</div>

</aside>
<!-- /sidebar -->
