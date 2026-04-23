<?php 
/* Template Name: Tất cả BĐS */ 
get_header();
?>
<!-- section -->

<section class="container wrap-content">
	<main role="main" class="full-page">
		<div class="list-style list-all">
			<?php get_template_part('loop-property/loop-all'); ?>
		</div>
	</main>
</section>
<!-- /section -->
<?php //get_template_part('popup-search-property'); ?>

<?php get_footer(); ?>
