<?php get_header(); ?>

	<section class="container" style="margin-bottom: 100px">

		<!-- article -->
		<article id="post-404">

			<h1><span class="ti-alert"></span> <strong>Không tìm thấy</strong> đường dẫn này</h1>
			<h2>
				<a href="<?php echo home_url(); ?>"><?php _e( 'Về trang chủ?', 'html5blank' ); ?></a> hoặc tìm kiếm bên dưới
			</h2>
			<?php get_template_part('searchform'); ?>
		</article>
		<!-- /article -->

	</section>

<h2 class="title-section"><span>Có thể bạn quan tâm</span></h2>
<div class="popular clear">
  <div class="container list-style">
    <?php get_template_part('popular-real'); ?>
  </div>
</div>
<?php get_footer(); ?>
