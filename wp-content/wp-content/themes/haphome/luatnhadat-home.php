<h2 class="title-block"><a href="<?php echo home_url('luat-nha-dat'); ?>" title="Luật nhà đất">Luật nhà đất</a></h2>
<div class="wrap-list">
<?php
	$query = new WP_Query(array(
		'post_type'=>'post',
		'category_name'=> 'luat-nha-dat',
		'orderby' => 'ID',
		'order' => 'DESC',
		'posts_per_page' => 10,
	));
	if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();

?>
	<article id="post-<?php the_ID(); ?>" class="list" >
		<?php if ( has_post_thumbnail()) : ?>
			<div class="thumb-list">
				<a class="thumb-5x3" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('thumb5x3'); ?>
				</a>
			</div>
		<?php endif; ?>
		<h4 class="title-post">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h4>
	</article>

<?php endwhile; wp_reset_query();?>
<?php endif; ?>
</div>