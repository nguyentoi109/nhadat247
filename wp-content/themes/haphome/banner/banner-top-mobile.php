<!--Top 1920x250--> 
<?php
	$query = new WP_Query(array(
		'post_type'=>'banner',
		'tax_query' => array(
			array (
				'taxonomy' => 'banner_position',
				'field' => 'slug',
				'terms' => 'banner-top-mobile',
				)
		),
		'post_status'=>'publish',
		'orderby' => 'rand',
		'order' => 'DESC',
		'posts_per_page'=> 1
  ));

	if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();
	$url = rwmb_meta( 'prefix-banner-url' );
?>

	<!-- article -->
	<article class="banner-top"  >
		<?php if ( has_post_thumbnail()) : ?>
			<div class="thumb-banner">
				<a href="<?php echo ($url ? $url : home_url() ); ?>" title="<?php the_title(); ?>" target="_blank"><?php the_post_thumbnail('thumb-banner'); ?></a>
			</div>
		<?php endif; ?>
		<!-- /post thumbnail -->
	</article>
	<!-- /article -->

<?php endwhile; wp_reset_query();?>
<?php else: ?>


<?php endif; ?>
<!--End Top-->

<div style="position: relative; width: 100%; height: 0; padding-top: 50.0000%;
 padding-bottom: 48px;  overflow: hidden;
 border-radius: 8px; will-change: transform;">
 <a title="[hot] siêu phẩm vị trí vàng ngay kcn đồng xoài 3 giá rẻ nhất thị trường" target="_blank" href="https://haphome.vn/bat-dong-san/hot-sieu-pham-vi-tri-vang-ngay-kcn-dong-xoai-3-gia-re-nhat-thi-truong" style="position: absolute;width: 100%;height: 100%;left:0; top:0;z-index: 2;"></a>
  <iframe loading="lazy" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
    src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAFKDnBIAic&#x2F;view?embed" allowfullscreen="allowfullscreen" allow="fullscreen">
  </iframe>
</div>
