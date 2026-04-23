<!-- sidebar -->
<aside class="sidebar" role="complementary">

	<?php get_template_part('searchform'); ?>
	
	<?php get_template_part('list-location'); ?>
	
	<section class="block">
		<h2 class="title-block">Tính lãi suất vay</h2>
		<a href="<?php echo home_url('tinh-lai-suat-vay-ngan-hang'); ?>" title="Tính lãi suất vay ngân hàng"><img class="arrow-down" src="<?php echo get_template_directory_uri(); ?>/img/tinh-lai-suat-vay.jpg" alt="Tính lãi suất vay ngân hàng"></a>
	</section>
	
	<?php get_template_part('tintuc-bds'); ?> 
	
	<?php get_template_part('luatnhadat'); ?> 
	
	<?php get_template_part('kienthuc-bds'); ?> 
	
	<?php get_template_part('phongthuy'); ?>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-sidebar')) ?>
	</div>
	
	<div class="block banner sticky">
		<img style="100%; float: left" src="https://datnenbinhduong.net/wp-content/uploads/2019/05/banner-mua-dat-binh-duong-gia-cao.gif" alt="">
	</div>
	
	

</aside>
<!-- /sidebar -->
