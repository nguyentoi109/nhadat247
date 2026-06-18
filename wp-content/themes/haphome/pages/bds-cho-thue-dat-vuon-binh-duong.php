<?php
/*
Template Name: Cho thuê đất vườn bình dương
*/
get_header();
?>
<!-- section -->

<section class="container wrap-content">
	<main role="main" class="full-page">
			<?php get_template_part('loop-property/binh-duong/loop-chothue-datvuon'); ?>
	</main>
</section>
<?php get_template_part('popup-search-property'); ?>

<?php get_footer(); ?>