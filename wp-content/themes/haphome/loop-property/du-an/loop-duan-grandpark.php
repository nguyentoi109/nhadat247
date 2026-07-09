<?php
$paged = max(1, get_query_var('paged'));
$price_area_meta_query = bds_filter_price_area_meta_query();

$query_args = array(
    'post_type'   => 'property',
    'post_status' => 'publish',
    'tax_query'   => array(
        array(
            'taxonomy' => 'property_developer',
            'field'    => 'term_id',
            'terms'    => 113,
        ),
    ),
);

if (!empty($price_area_meta_query)) {
    $query_args['meta_query'] = $price_area_meta_query;
}

$result = bds_get_sorted_query($query_args, $paged, 20);
$query  = $result['query'];

if ($query->have_posts()) :
?>
    <div class="breadcrumb-container">
        <?php
            set_query_var('breadcrumb_developer', 113);
            get_template_part('custom-breadcrumb-developer');
        ?>
    </div>
    <div class="list-style list-all container">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php set_query_var('is_ngop', true);?>
            <?php get_template_part('loop-property/item-property'); ?>

        <?php endwhile; ?>

    </div>

    <div class="pagination">
        <?php
        if (function_exists('wp_pagenavi')) {
            wp_pagenavi(array('query' => $query));
        } else {
            echo paginate_links(array(
                'total'   => $result['max_num_pages'],
                'current' => $paged,
            ));
        }
        ?>
    </div>

<?php
else :
?>

    <article>
        <h2><?php _e('Không có nội dung.', 'html5blank'); ?></h2>
    </article>

<?php
endif;

wp_reset_postdata();
?>