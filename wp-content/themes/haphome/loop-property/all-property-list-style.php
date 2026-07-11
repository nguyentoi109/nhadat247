<?php
    $paged = max(1, get_query_var('paged'));
    $result = bds_get_sorted_query(['post_type' => 'property',], $paged, 10);
    $query = $result['query'];
    if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();
?>
    <?php get_template_part('loop-property/item-property'); ?>

<?php endwhile; wp_reset_postdata();?>
<?php endif; ?>