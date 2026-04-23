<?php 
/* Template Name: Cho thuê Biệt thự Bình Phước*/ 
get_header();
?>
<!-- section -->

<section class="container wrap-content">
	<main role="main" class="full-page">
		<div class="list-style">
			<?php get_template_part('loop-property/binh-phuoc/loop-chothue-biethtu'); ?>
		</div>
	</main>
</section>
<?php get_template_part('popup-search-property'); ?>
<!-- /section -->

<?php get_footer(); ?>
