<?php get_header(); ?>

<!-- section -->
<section class="container wrap-content">
	<main role="main" class="full-page">
		<div class="list-style">
			<?php get_template_part('loop-property'); ?>
		</div>
			<?php get_template_part('pagination'); ?>
	</main>
</section>
<!-- /section -->

<?php get_footer(); ?>
