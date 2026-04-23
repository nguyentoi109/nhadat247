<?php 
/* Template Name: Video */ 
get_header();
?>

<section class="section section-home-search clear">
  <div class="container">
    <?php get_template_part('searchformproperty'); ?>
  </div>
</section>

<section class="section featured-real">
  <h2 class="title-section"><span>Video</span></h2>
	<div class="list-featured-real list-style container">
		<?php get_template_part('video-real'); ?>
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
