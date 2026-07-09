<?php
$paged = max(1, get_query_var('paged'));
$price_area_meta_query = bds_filter_price_area_meta_query();

$query_args = array(
    'post_type' => 'property',
    'post_status' => 'publish',
    'orderby' => 'ID',
    'order' => 'DESC',
    'paged' => $paged,
    'posts_per_page' => 20,
    'tax_query' => array(
        array(
            'taxonomy' => 'property_status',
            'field' => 'term_id',
            'terms' => 6,
        ),
        array(
            'taxonomy' => 'property_type',
            'field' => 'term_id',
            'terms' => 9,
        ),
        array(
            'taxonomy' => 'property_location',
            'field' => 'term_id',
            'terms' => 54,
            'include_children' => true,
        ),
    ),
);

if (!empty($price_area_meta_query)) {
    $query_args['meta_query'] = $price_area_meta_query;
}

$result = bds_get_sorted_query($query_args, $paged, 20);
$query  = $result['query'];
set_query_var('related_posts', get_related_posts_by_location(54, 5));
?>
<div class="breadcrumb-container">
<?php
    set_query_var('breadcrumb_location', 54);
    set_query_var('breadcrumb_status', 6);
    set_query_var('breadcrumb_type', 9);

    get_template_part('custom-breadcrumb');
?>
</div>
<section class="section section-home-search clear full-bleed">
<?php 
    set_query_var('ngop_location_id', $location_id ?? 54);
    set_query_var('ngop_status_id', $status_id ?? 6);
    set_query_var('ngop_type_id', $type_id ?? 8);

    get_template_part('bat-dong-san-ngop'); 
?>
</section>
<div class="list-style-wrap container">
    <div class="list-style list-all">
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php set_query_var('is_ngop', true); ?>
                <?php get_template_part('loop-property/item-property'); ?>
            <?php endwhile; ?>

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

            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <h2>Không có bất động sản nào</h2>
        <?php endif; ?>
    </div>

    <?php get_template_part('sidebar-filter-property') ?>
</div>