<?php 
/* Template Name: Cần thuê Đất nền*/ 
get_header();
?>
<!-- section -->

<section class="container wrap-content">
	<main role="main">
		<div class="grid">
			<?php get_template_part('loop-property/loop-canthue-datnen'); ?>
		</div>
	</main>
</section>
<!-- /section -->
<?php get_template_part('popup-search-property'); ?>

<?php get_footer(); ?>
