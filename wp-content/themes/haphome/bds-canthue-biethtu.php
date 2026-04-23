<?php 
/* Template Name: Cần thuê Biệt thự*/ 
get_header();
?>
<!-- section -->

<section class="container wrap-content">
	<main role="main" class="full-page">
		<div class="list-style">
			<?php get_template_part('loop-property/loop-canthue-bietthu'); ?>
		</div>
	</main>
</section>
<!-- /section -->
<?php get_template_part('popup-search-property'); ?>

<?php get_footer(); ?>
