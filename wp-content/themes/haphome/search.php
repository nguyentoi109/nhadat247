<?php get_header(); ?>

<!-- section -->
<section class="container wrap-content">
	<main role="main" class="full-page page-template">
		<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

		<?php get_template_part('loop'); ?>

		<?php get_template_part('pagination'); ?>
	</main>

</section>
<!-- /section -->
	

<?php get_sidebar(); ?>

<?php get_footer(); ?>
