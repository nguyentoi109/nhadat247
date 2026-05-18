<style>
	.item-banner{
    position: relative;
    z-index: 1;
}

/* tránh đè lên header khi scroll */
.item-banner a{
    z-index: 1 !important;
}

/* nếu img hoặc parent bị fixed */
.item-banner img{
    position: relative;
    z-index: 1;
}
	@media(max-width:768px){

    .item-banner{
        display:none !important;
    }
}
</style>


<section class="featured-post clear">
<?php if(empty($args['hide_title'])) : ?>
	<h2 class="title-section"><a href="<?php echo home_url('phong-thuy'); ?>"> Phong thủy </a></h2>
<?php endif; ?>
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
		<?php include(locate_template('banner-sidebar.php')); ?>
	</div>
</section>