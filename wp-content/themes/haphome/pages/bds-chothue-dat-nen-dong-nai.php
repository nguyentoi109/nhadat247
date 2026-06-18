<?php 
/* Template Name: Cho thuê đất nền Đồng Nai*/ 
get_header();
?>
<!-- section -->

<section class="container wrap-content">
	<main role="main" class="full-page">
			<?php get_template_part('loop-property/dong-nai/loop-chothue-datnen'); ?>
	</main>
</section>
<?php get_template_part('popup-search-property'); ?>
<!-- /section -->

<?php get_footer(); ?>
