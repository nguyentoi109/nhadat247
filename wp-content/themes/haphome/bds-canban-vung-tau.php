<?php
/*
Template Name: Trang cần bán Vũng Tàu
*/
get_header();
?>
<!-- section -->
<section class="container wrap-content">
	<main role="main" class="full-page">
			<?php get_template_part('loop-property/vung-tau/loop-canban'); ?>
	</main>
</section>
<!-- /section -->
<?php get_template_part('popup-search-property'); ?>

<?php get_footer(); ?>