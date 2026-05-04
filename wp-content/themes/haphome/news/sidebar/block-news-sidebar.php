<?php
	$categories = get_the_category();
	$category_id = $categories[0]->cat_ID;
?>
<?php
	$query = new WP_Query(array(
		'post_type'=>'post',
		'category_name'=> 'tin-tuc-bat-dong-san',
		'category__not_in' => $category_id,
		'orderby' => 'ID',
		'order' => 'DESC',
		'posts_per_page' => 5,
	));
if ($query->have_posts()): 
?>
<section class="block">
	<h2 class="title-block">Tin tức Bất động sản</h2>
	<div class="list-news-block">
		<?php while ($query->have_posts()) : $query->the_post(); ?>
		<!-- <article id="post-<?php //the_ID(); ?>" class="item-news wow fadeInUp" > -->
		<article id="post-<?php the_ID(); ?>" class="item-news 
			<?php if ( has_post_thumbnail()) : ?>
				<div class="thumb-list">
					<a class="thumb-1x1" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail('thumb1x1'); ?>
					</a>
				</div>
			<?php endif; ?>
			<h4 class="title-post">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h4>
		</article>
	
	<?php endwhile; wp_reset_query();?>
	
	</div>
</section>
<?php endif; ?>

<?php
	$query = new WP_Query(array(
		'post_type'=>'post',
		'category_name'=> 'kien-thuc-bat-dong-san',
		'category__not_in' => $category_id,
		'orderby' => 'ID',
		'order' => 'DESC',
		'posts_per_page' => 5,
	));
if ($query->have_posts()): 
?>
<section class="block">
	<h2 class="title-block">Kiến thức Bất động sản</h2>
	<div class="list-news-block">
		<?php while ($query->have_posts()) : $query->the_post(); ?>
		<!-- <article id="post-<?php //the_ID(); ?>" class="item-news wow fadeInUp" > -->
		<article id="post-<?php the_ID(); ?>" class="item-news" >
			<?php if ( has_post_thumbnail()) : ?>
				<div class="thumb-list">
					<a class="thumb-1x1" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail('thumb1x1'); ?>
					</a>
				</div>
			<?php endif; ?>
			<h4 class="title-post">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h4>
		</article>
	
	<?php endwhile; wp_reset_query();?>
	
	</div>
</section>
<?php endif; ?>

<?php
	$query = new WP_Query(array(
		'post_type'=>'post',
		'category_name'=> 'phong-thuy',
		'category__not_in' => $category_id,
		'orderby' => 'ID',
		'order' => 'DESC',
		'posts_per_page' => 5,
	));
if ($query->have_posts()): 
?>
<section class="block">
	<h2 class="title-block">Phong thủy</h2>
	<div class="list-news-block">
		<?php while ($query->have_posts()) : $query->the_post(); ?>
		<!-- <article id="post-<?php //the_ID(); ?>" class="item-news wow fadeInUp" > -->
		<article id="post-<?php the_ID(); ?>" class="item-news" >
			<?php if ( has_post_thumbnail()) : ?>
				<div class="thumb-list">
					<a class="thumb-1x1" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail('thumb1x1'); ?>
					</a>
				</div>
			<?php endif; ?>
			<h4 class="title-post">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h4>
		</article>
	
	<?php endwhile; wp_reset_query();?>
	
	</div>
</section>
<?php endif; ?>
