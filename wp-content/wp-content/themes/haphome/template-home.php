<?php 
/* Template Name: Trang chủ */ 
get_header();
?>

<section class="section section-home-search clear">
  <div class="container">
    <?php
      if(!wp_is_mobile()){
        get_template_part('searchformproperty');
      }else{
        echo '<span class="btn-search-mobile"><span class="ti-search"></span>Tìm kiếm Bất động sản</span>';
      }
    ?>
  </div>
  
  <div class="popular clear">
    <h2 class="title-section"><span>Quan tâm nhiều</span></h2>
    <div class="popular-real grid swiper-container">
       <div class="list-popular-real swiper-wrapper">
         <?php get_template_part('popular-real'); ?>
       </div>
       
    </div>
    <div class="swiper-pagination"></div>
  </div>
</section>

<!--<section class="section featured-real">
  <h2 class="title-section"><span>Bất động sản nổi bật</span></h2>
	<div class="list-featured-real list-style container">
		<?php //get_template_part('featured-real'); ?>
	</div>
</section>-->

<h2 class="title-section"><span>Bất động sản mới nhất</span></h2>
<section class="list-style list-all container">
	<?php get_template_part('all-property-list-style'); ?>
</section>

<p class="read-more">
	<a href="<?php echo home_url('dat-binh-duong'); ?>"> Xem tất cả </a>
</p>


<script>
	(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
	});
	
})(jQuery, this);

</script>
<?php get_footer(); ?>
