<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<!-- <article id="post-<?php //the_ID(); ?>" class="list-news wow fadeInUp" > -->
		<article id="post-<?php the_ID(); ?>" class="list-news" >


		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<div class="thumb-list">
				<a class="thumb-4x3" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('thumb4x3'); ?>
				</a>
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
			<span class="date"><?php the_time('d/m/Y'); ?> <?php the_time('G:i'); ?></span>
			<!-- /post details -->

			<div class="des">
				<?php html5wp_excerpt('html5wp_index');?>
			</div>

			<!-- <p class="control-post"><?php //edit_post_link(); ?></p> -->
		</div>

	</article>
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Không có nội dung.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
