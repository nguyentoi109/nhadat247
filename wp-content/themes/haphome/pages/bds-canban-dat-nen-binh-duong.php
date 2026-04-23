<?php 
/* Template Name: Cần bán Đất nền Bình Dương*/ 
get_header();
?>
<!-- section -->

<section class="container wrap-content">
	<main role="main" class="full-page">
		<div class="list-style">
			<?php get_template_part('loop-property/binh-duong/loop-canban-datnen'); ?>
		</div>
	</main>
</section>
<?php get_template_part('popup-search-property'); ?>
<!-- /section -->

<?php get_footer(); ?>
