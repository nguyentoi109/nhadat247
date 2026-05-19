<?php get_header(); ?>

<!--breadcrumbs-->
<section class=" breadcrumbs section">
	<!-- <?php 
		//if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="" class="container">','</p>');} 
	?> -->
</section>
<!--End breadcrumbs-->
<!-- section container-->
<section class="container detail-page">
<?php get_sidebar('1'); ?>
	<main role="main">		
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<?php 
				if (function_exists('set_post_views')) {
					set_post_views(get_the_ID()); 
				}
			?>
	
		<!-- article -->
		<article <?php post_class(); ?> class="detail-content">

			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<div class="featured-image">
					<?php the_post_thumbnail('thumb5x3'); ?>
				</div>
			<?php endif; ?>
			<!-- /post thumbnail -->

			<!-- post title -->
			<h1>
				<?php the_title(); ?>
			</h1>
			<!-- /post title -->

			<!-- post details -->
			<span class="date"><?php the_time('d/m/Y'); ?> | <?php the_time('G:i'); ?></span>
			<!--<span class="author"><?php// _e( 'Bởi', 'html5blank' ); ?> <?php //the_author_posts_link(); ?></span>-->

			<div class="content-detail">
				<?php
				$amp_content = get_post_meta(get_the_ID(),'ampforwp_custom_content_editor', true);

				if (!empty($amp_content)) {

					echo wp_kses_post(
						html_entity_decode($amp_content)
					);

				} else {

					echo apply_filters('the_content', get_the_content());

				}
				?>
			</div>
			<?php $files = rwmb_meta( 'file_upload' ); ?>

			<?php foreach ( $files as $file ) : ?>
				<div class="wrap-iframe-pdf">
					<iframe src="<?= $file['url']; ?>" width="100%" height="500px"> </iframe>
				</div>
				
				<!-- <a class="link-download" title="<?= $file['name']; ?>" target="_blank"  href="<?= $file['url']; ?>">Tải file</a> -->
			<?php endforeach ?>

			<?php get_template_part('news/related-news'); ?>	

			<!-- <p class="control-post"><?php //edit_post_link(); ?></p> -->


		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Chưa có nội dung.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>
	
	</main>
	<?php get_sidebar('2'); ?>
<!-- /section container-->
</section>

<?php get_footer(); ?>
