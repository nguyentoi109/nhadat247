<?php 
/* Template Name: Cần Thuê */ 
get_header();
?>
<!-- section -->

<section class="container wrap-content">
	<main role="main">
		<div class="grid">
			<?php get_template_part('loop-property/loop-canthue'); ?>
		</div>
	</main>
</section>
<!-- /section -->
<?php get_template_part('popup-search-property'); ?>

<?php get_footer(); ?>
