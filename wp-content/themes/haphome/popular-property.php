<?php
$popular = new WP_Query([
    'post_type'      => 'property',
    'posts_per_page' => 5,
    'post_status'    => 'publish',
    'post__not_in'   => [get_the_ID()],
    'meta_key'       => 'post_views_count',
    'orderby'        => 'meta_value_num',
    'order'          => 'DESC',
]);

if ($popular->have_posts()) :
?>
<div class="sd-popular-card">
    <h2 class="sd-popular-title">Bài viết quan tâm nhiều</h2>

    <?php $rank = 1; while ($popular->have_posts()) : $popular->the_post(); ?>
        <div class="popular-item">
            <span class="rank-number"><?php echo $rank++; ?></span>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </div>
    <?php endwhile; wp_reset_postdata(); ?>
</div>
<?php endif; ?>