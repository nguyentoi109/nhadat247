<?php 
/* Template Name: Cần mua Cần thuê*/ 
get_header();
?>
<!-- section -->

<section class="container wrap-content">
	<main role="main">
		<div class="grid">
			<?php get_template_part('loop-property/loop-canmua-canthue'); ?>
		</div>
	</main>
</section>
<!-- /section -->
<?php get_template_part('popup-search-property'); ?>

<?php get_footer(); ?>
