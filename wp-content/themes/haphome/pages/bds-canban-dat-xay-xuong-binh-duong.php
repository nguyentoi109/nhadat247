<?php
/*
Template Name: Cần bán đất xây xưởng bình dương
*/
get_header();
?>
<!-- section -->

<section class="container wrap-content">
	<main role="main" class="full-page">
		<div class="list-style">
			<?php get_template_part('loop-property/binh-duong/loop-canban-datxayxuong'); ?>
		</div>
	</main>
</section>
<?php get_template_part('popup-search-property'); ?>

<?php get_footer(); ?>