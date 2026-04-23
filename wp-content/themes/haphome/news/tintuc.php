<!-- List cats  --> 
<?php
 /*
 * Loop through Categories and Display Posts within
 */
$args = array(
  'parent' => 0
);
$cats = get_categories($args);

    foreach( $cats as $cat ) : ?>
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 5,  //show all posts
            //'offset' => 1,
            'cat' => $cat->term_id,
            'child_of' => 1,
        );
        $posts = new WP_Query($args);

        if( $posts->have_posts() ): ?>
        <section class="featured-post clear">
          <h2 class="title-section"><a title="<?php echo $cat->name; ?>" href="<?php echo home_url().'/'.$cat->slug; ?>"><?php echo $cat->name; ?></a></h2>
          <div class="list-post">
            <?php while( $posts->have_posts() ) : $posts->the_post(); ?>

               <article class="item wow zoomIn" data-wow-delay="1.5">
                <div class="thumb-list">
                  <a title="<?php the_title();?>" href="<?php the_permalink();?>"><span class="thumb-4x3"><?php the_post_thumbnail('thumb4x3') ?></span></a>
                </div>
                <div class="content">
                  <h3 class="title-post"><a title="<?php the_title();?>" href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                  <?php html5wp_excerpt('html5wp_custom_post'); ?>
                  <p class="tag-name"><?php the_tags( __( '<span class="mdi mdi-tag-outline"></span> ', 'html5blank' ), ', ', '');?></p>
                </div>
                 <?php edit_post_link(); ?>
              </article>
            <?php endwhile; wp_reset_postdata(); endif; ?>
          </div>
        </section>
        <?php endforeach; ?>
  </section>