<?php get_header(); ?>

<!-- section -->
<section class="container wrap-content">
	<main role="main" class="full-page">
	  <!--<div class="section section-home-search clear">
	    <?php // get_template_part('searchformproperty'); ?>
	  </div>-->
		
		<p class="notify"><?php echo sprintf( __( 'Hiện có %s bất động sản', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></p>
		<div class="list-style">
			<?php get_template_part('loop-property'); ?>
		</div>
		<?php get_template_part('pagination'); ?>
		
		<span class="btn-search-mobile" style="position: fixed;left: 0; bottom: 0;margin: 0; z-index: 2;background: #e0f3ff;"><span class="ti-search"></span>Tìm kiếm Bất động sản</span>
	</main>
</section>
<!-- /section -->
	
<?php// get_footer('search'); ?>
<?php get_footer(); ?>
