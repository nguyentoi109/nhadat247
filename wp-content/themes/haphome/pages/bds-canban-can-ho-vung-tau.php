<?php 
/* Template Name: Cần bán Căn hộ Vũng tàu*/ 
get_header();
?>
<!-- section -->

<section class="container wrap-content">
	<main role="main" class="full-page">
			<?php get_template_part('loop-property/vung-tau/loop-canban-canho'); ?>
	</main>
</section>
<?php get_template_part('popup-search-property'); ?>
<!-- /section -->

<?php get_footer(); ?>

