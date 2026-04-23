<?php /* Template Name: Tính lãi suất */  get_header(); ?>

<!-- section container-->
<section class="container detail-page">
	<main role="main">


		<!-- article -->
		<article>

			<?php get_template_part('tinh-lai-suat-ngan-hang'); ?>

		</article>
		<!-- /article -->

	
	</main>
<!-- /section container-->
<?php get_sidebar(); ?>
</section>

<section class="related">
	<h2 class="title-section"><span>TIN LIÊN QUAN</span></h2>
	<div class="flexbox">
<?php
$categories = get_the_category($post->ID);
if ($categories) 
{
    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

    $args=array(
    'category__in' => $category_ids,
    'post__not_in' => array($post->ID),
    'showposts'=>4, 
    'caller_get_posts'=>1
    );
    $my_query = new wp_query($args);
    if( $my_query->have_posts() ) 
    {
        while ($my_query->have_posts())
        {
            $my_query->the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" class="list-news  wow fadeInUp">
				<?php if ( has_post_thumbnail()) : ?>
					<div class="thumb-full">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="thumb-5x3">
							<?php the_post_thumbnail(thumb5x3);?>
						</a>
					</div>
				<?php endif; ?>
				<h2 class="title-post">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
			</article>
            <?php
        }
    }
}
?>
</div>
</section>
<?php get_footer(); ?>
