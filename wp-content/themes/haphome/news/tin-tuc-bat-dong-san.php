<section class="featured-post clear">
<?php if(empty($args['hide_title'])) :?>
<h2 class="title-section"><a href="<?php echo home_url('tin-tuc-bat-dong-san'); ?>"> Tin tức bất động sản </a></h2>
<?php endif; ?>
	<div class="list-post">
		<?php
			$query = new WP_Query(array(
				'post_type'=>'post',
				'category_name'=> 'tin-tuc-bat-dong-san',
				'orderby' => 'ID',
				'order' => 'DESC',
				'posts_per_page' => 5,
			));
			if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();

		?>
			<!-- <article class="item wow zoomIn" data-wow-delay="1.5"> -->
			<article class="item" data-wow-delay="1.5">
				<div class="thumb-list">
					<a title="<?php the_title();?>" href="<?php the_permalink();?>"><span class="thumb-4x3"><?php the_post_thumbnail('thumb4x3') ?></span></a>
				</div>
				<div class="content">
					<h3 class="title-post"><a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php html5wp_excerpt('html5wp_custom_post'); ?>
					<p class="tag-name"><?php the_tags( __( '<span class="mdi mdi-tag-outline"></span> ', 'html5blank' ), ', ', '');?></p>
				</div>
				<?php edit_post_link(); ?>
			</article>
		
		<?php endwhile; wp_reset_query();?>
		<?php endif; ?>
		<?php include(locate_template('banner-sidebar.php')); ?>
	</div>
</section>