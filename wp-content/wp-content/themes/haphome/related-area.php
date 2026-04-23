<section class="related related-area">
  <h2 class="title-section wow fadeInUp"><span>TIN CÙNG KHU VỰC</span></h2>
	<div class="container list-style">
<?php
$postlocation = 'property';
$property_status2 = 'property_status';
$property_location = 'property_location';
		
$tax_property_status2 = get_the_terms(get_the_ID(), $property_status2);
$tax_property_location = get_the_terms(get_the_ID(), $property_location);
if ($tax_property_status2 && $tax_property_location) 
{
   $status2_ids = array();
   $location_ids = array();
   
	foreach($tax_property_status2 as $individual_categorys) $status2_ids[] = $individual_categorys->term_id;
	foreach($tax_property_location as $individual_categorys) $location_ids[] = $individual_categorys->term_id;

    $args=array(
    'post_type'	   =>	$postlocation,
    'post__not_in' => array($post->ID),
    'showposts'=>4, 
    'ignore_sticky_posts'=>1,
    'tax_query' => array(
         array(
            'taxonomy' => 'property_status',
            'field'    => 'term_id',
            'terms'    => $status2_ids,
         ),
         array(
            'taxonomy' => 'property_location',
            'field'    => 'term_id',
            'terms'    => $location_ids,
         ),
      )
    );
    $my_query = new wp_query($args);
    if( $my_query->have_posts() ) 
    {
        while ($my_query->have_posts())
        {
            $my_query->the_post();
            ?>
           <!-- article -->
			      <article id="post-<?php the_ID(); ?>" class="list-news wow fadeInUp"  >
              <?php
                $price = rwmb_meta( 'prefix-price' );
                $area = rwmb_meta( 'prefix-area' );
                $address = rwmb_meta( 'prefix-address' );
                $status_terms = get_the_terms( $post->ID,"property_status" );
              ?>
              <div class="header-list-news">
                <span class="price">
                  <strong><span class="ti-tag"></span>Giá: <span class="num"><?php echo number_format($price, 0,",","."); ?> đ</span></strong>
                </span>
              </div>
              <?php if ( has_post_thumbnail()) : ?>
                <div class="thumb-list">
                  <a class="thumb-4x3" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_post_thumbnail('thumb5x3'); ?>
                  </a>
                  <span class="status">
                    <?php
                      if(!empty( $status_terms )){
                        $status_count = 0;
                        foreach( $status_terms as $term ){
                          if( $status_count > 0 ){
                            echo ', ';
                          }
                          echo $term->name;
                        }
                      }
                    ?>					 
                  </span>
                </div>
              <?php endif; ?>
              <!-- /post thumbnail -->

              <div class="content">
                <h3 class="title-post">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </h3>
                <!--<div class="des">
                  <?php// html5wp_excerpt('html5wp_custom_post');?>
                  <a class="view-article" href="<?php// the_permalink(); ?>">Chi tiết</a>
                </div>-->

                <div class="meta">
                  <span class="area">
                    <strong><span class="ti-ruler"></span>:</strong> <?php echo $area; ?> m<sup>2<sup>
                  </span> |
                  <span class="location">
                    <strong><span class="ti-location-pin"></span>:</strong>
                    <?php
                      $direction_terms = get_the_terms( $post->ID,"property_location" );
                      if(!empty( $direction_terms )){
                        $direction_count = 0;
                        foreach( $direction_terms as $term ){
                          if( $direction_count > 0 ){
                            echo ', ';
                          }
                          echo $term->name;
                        }
                      }else{
                        echo '&nbsp;';
                      }
                    ?>					 
                  </span> | 
                  <span class="direction">
                    <strong><span class="ti-direction-alt"></span>:</strong>					
                    <?php
                      $direction_terms = get_the_terms( $post->ID,"property_direction" );
                      if(!empty( $direction_terms )){
                        $direction_count = 0;
                        foreach( $direction_terms as $term ){
                          if( $direction_count > 0 ){
                            echo ', ';
                          }
                          echo $term->name;
                        }
                      }else{
                        echo '&nbsp;';
                      }
                    ?>	
                  </span>
                </div>
                <div class="footer-content">
                  <div class="author"><?php get_template_part("meta-user")?></div>
                  <div class="date"><span class="ti-calendar"></span> <?php the_time('d/m/Y'); ?></div>
                </div>
              </div>
              <div class="side-content">
                <?php html5wp_excerpt('html5wp_index');?>
                <span class="price">
                  <strong><span class="ti-tag"></span>Giá: <span class="num"><?php echo number_format($price, 0,",","."); ?> đ</span></strong>
                </span>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn">Xem chi tiết</a>
              </div>
            </article>
			      <!-- /article -->
            <?php
        }		
    }
	wp_reset_query();
}
?>
</div>
</section>
