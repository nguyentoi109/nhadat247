<?php 
/* Template Name: Quan tâm */ 
get_header();
?>

<section class="section section-home-search clear">
  <div class="container">
    <?php get_template_part('searchformproperty'); ?>
  </div>
</section>

<section class="section featured-real">
  <h2 class="title-section"><span>Quan tâm nhất</span></h2>
	<div class="list-style container">
		<?php get_template_part('popular-real'); ?>
	</div>
</section>


<script>
	(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
	});
	
})(jQuery, this);

</script>
<?php get_footer(); ?>
