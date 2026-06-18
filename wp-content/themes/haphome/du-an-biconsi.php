<?php
/*
Template Name: Trang Biconsi
*/
get_header();
?>
<!-- section -->

<section class="container wrap-content">
	<main role="main" class="full-page">
			<?php get_template_part('loop-property/du-an/loop-duan-biconsi'); ?>
	</main>
</section>
<?php get_template_part('popup-search-property'); ?>

<?php get_footer(); ?>