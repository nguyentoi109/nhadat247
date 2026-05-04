<?php get_header(); ?>
<!--breadcrumbs-->
<section class="container">
	<?php 
		//if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">','</p>');} 
	 ?>
</section>
<!--End breadcrumbs-->

<!-- section container-->
<section class="container detail-page">
	<main role="main">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article <?php post_class(); ?> class="detail-content">

			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<div class="featured-image">
					<?php the_post_thumbnail('thumb5x3'); ?>
				</div>
			<?php endif; ?>
			<!-- /post thumbnail -->

			<!-- post title -->
			<h1>
				<?php the_title(); ?>
			</h1>
			<!-- /post title -->

			<!-- post details -->
			<span class="date"><?php the_time('d/m/Y'); ?> | <?php the_time('G:i'); ?></span>
			<!--<span class="author"><?php// _e( 'Bởi', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>-->

			<div class="content-detail">
				<?php the_content(); // Dynamic Content ?>
			</div>
			<?php $files = rwmb_meta( 'file_upload' ); ?>

			<?php foreach ( $files as $file ) : ?>
				<div class="wrap-iframe-pdf">
					<iframe src="<?= $file['url']; ?>" width="100%" height="500px"> </iframe>
				</div>
				
				<!-- <a class="link-download" title="<?= $file['name']; ?>" target="_blank"  href="<?= $file['url']; ?>">Tải file</a> -->
			<?php endforeach ?>

			<p class="cat-detail"><?php _e( 'Danh mục: ', 'html5blank' ); the_category(', ');?></p>	

			<!-- <p class="control-post"><?php //edit_post_link(); ?></p> -->


		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Chưa có nội dung.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>
	
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
            <!-- <article id="post-<?php //the_ID(); ?>" class="list-news  wow fadeInUp"> -->
			<article id="post-<?php the_ID(); ?>" class="list-news">
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
