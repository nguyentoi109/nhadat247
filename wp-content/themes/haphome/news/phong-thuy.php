<section class="featured-post clear">
	<h2 class="title-section"><a href="<?php echo home_url('phong-thuy'); ?>"> Phong thủy </a></h2>
	<div class="list-post">
		<?php
			$query = new WP_Query(array(
				'post_type'=>'post',
				'category_name'=> 'phong-thuy',
				'orderby' => 'ID',
				'order' => 'DESC',
				'posts_per_page' => 5,
			));
			if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();

		?>
			<article class="item">
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
		<div class="item item-banner" style="position: relative; width: 100%; height: 0; padding-top: 141.4286%; padding-bottom: 48px; overflow: hidden; border-radius: 8px;">
    
			<a href="https://muadatgiacao.net/" 
			target="_blank" 
			rel="noopener noreferrer" 
			referrerpolicy="no-referrer"
			style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; z-index: 999; display: block;">
				
				<img src="<?php echo get_template_directory_uri(); ?>/img/ad_banner_top.webp" 
					alt="Banner" 
					style="width: 100%; height: 100%; object-fit: cover; image-rendering: -webkit-optimize-contrast;">
					
			</a>
		</div>
	</div>
</section>