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

  
<!-- <section class="section featured-real">
  <h2 class="title-section"><span>Bất động sản nổi bật</span></h2>
	<div class="list-featured-real list-style container">
		<?php //get_template_part('featured-real'); ?>
	</div>
</section> -->

<?php get_template_part('news/news-home'); ?>
  
  <!-- <div class="popular clear">
    <h2 class="title-section"><span>Quan tâm nhiều</span></h2>
    <div class="popular-real grid swiper-container">
       <div class="list-popular-real swiper-wrapper">
         <?php //get_template_part('popular-real'); ?>
       </div>
    </div>

    <span class="btn-prev">
        <span class="ti-arrow-left"></span>
    </span>
    <span class="btn-next">
      <span class="ti-arrow-right"></span>
    </span>
    
    <div class="swiper-pagination"></div>
  </div> -->

  <div class="popular clear">
    <h2 class="title-section"><span>Bất động sản ngộp</span></h2>
    <div class="popular-real grid swiper-container">
       <div class="list-popular-real swiper-wrapper">
         <?php get_template_part('bat-dong-san-ngop'); ?>
       </div>
    </div>

    <span class="btn-prev">
        <span class="ti-arrow-left"></span>
    </span>
    <span class="btn-next">
      <span class="ti-arrow-right"></span>
    </span>
    
    <div class="swiper-pagination"></div>
  </div>
</section>


<!-- <?php //if(wp_is_mobile()){ ?>
    <div style="position: relative; width: 100%; height: 0; padding-top: 50.0000%;
 padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-bottom: 0.9em; overflow: hidden;  will-change: transform;">
 <a title="BÁN NHANH 5 NỀN NGAY KCN NAM ĐỒNG PHÚ SỔ SẴN GIÁ CHỈ RẺ NHẤT THỊ TRƯỜNG
" target="_blank" href="https://haphome.vn/bat-dong-san/ban-nhanh-5-nen-ngay-kcn-nam-dong-phu-san-gia-chi-re-nhat-thi-truong" style="position: absolute;width: 100%;height: 100%;left:0; top:0;z-index: 2;"></a>
  <iframe loading="lazy" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
    src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFKKPxFiGY&#x2F;view?embed" allowfullscreen="allowfullscreen" allow="fullscreen">
  </iframe>
</div>
<?php?> -->

<h2 class="title-section"><span>Bất động sản mới nhất</span></h2>
<section class="list-style list-all container">
	<?php get_template_part('loop-property/all-property-list-style'); ?>
</section>

<p class="read-more">
	<a href="<?php echo home_url('tat-ca'); ?>"> Xem tất cả </a>
</p>


</script>
<?php get_footer(); ?>
