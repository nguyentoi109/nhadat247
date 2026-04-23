<?php get_header(); ?>

<!-- section -->
<section class="list container flexbox">

	<main role="main">

			<h1 class="topic"><?php single_cat_title(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

	</main>

	<?php get_sidebar('folder'); ?>

</section>
<!-- /section -->
<?php get_footer(); ?>
