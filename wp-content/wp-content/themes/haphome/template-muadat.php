<?php
/* Template Name: Trang Form mua đất*/
get_header();

?>
	<!-- section -->
<style>
	.footer-banner-sticky {
		display: none;
	}
</style>
	<section class="container" style="max-width: 800px; background: #f6f4f4; padding: 30px; border-radius: 4px;">
		<strong>TÔI ĐANG CẦN MUA NHÀ ĐẤT</strong>
		<?php if ( wp_is_mobile() ) {echo '<strong>Gọi ngay: </strong><a href="tel:0909.81.89.11">0909818911</a> - Zalo: <a href="http://zalo.me/0909818911">0909818911</a>';}else{?>
		<p><strong>Gọi ngay: </strong>0909818911; Zalo: 0909818911</p>
		<?php }?>
		<p>Mua giá cao, thanh toán nhanh trong vòng 1 phút</p>
		<strong>Hoặc bạn điền thông tin bên dưới, tôi sẽ phone lại</strong>
		<p>&nbsp;</p>
		<?php echo do_shortcode('[contact-form-7 id="1038" title="Mua đất"]'); ?>
	</section>

	<!-- /section -->

	<?php get_footer(); ?>

