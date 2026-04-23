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
		<div class="item item-banner" style="position: relative; width: 100%; height: 0; padding-top: 141.4286%; padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16);  overflow: hidden;
			border-radius: 8px; will-change: transform;">
			<a title="Đất KCN bắc đồng phú bình phước Chỉ 300 triệu mua được ngay" target="_blank" href="https://haphome.vn/bat-dong-san/dat-kcn-bac-dong-phu-binh-phuoc-chi-300-trieu-mua-duoc-ngay" style="position: absolute;width: 100%;height: 100%;left:0; top:0;z-index: 2;"></a>
			<iframe loading="lazy" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0; z-index: 1;"
				src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFJr4QLNpU&#x2F;view?embed" allowfullscreen="allowfullscreen" allow="fullscreen">
			</iframe>
		</div>
	</div>
</section>