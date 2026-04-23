<?php get_header(); ?>
<!-- section -->
<section class="container">
	<main role="main">

		<h1><?php _e( 'Latest Posts', 'html5blank' ); ?></h1>

		<?php get_template_part('loop'); ?>

		<?php get_template_part('pagination'); ?>

	</main>

<?php get_sidebar(); ?>

</section>
<!-- /section -->
<?php get_footer(); ?>
