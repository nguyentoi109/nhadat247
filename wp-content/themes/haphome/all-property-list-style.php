<?php
$paged = max(1, get_query_var('paged'));
$price_range_raw = isset($_GET['price_range']) ? sanitize_text_field($_GET['price_range']) : '';
$area_range_raw  = isset($_GET['area_range'])  ? sanitize_text_field($_GET['area_range'])  : '';

$price_area_meta_query = bds_filter_price_area_meta_query();

$query_args = [
    'post_type'      => 'property',
    'post_status'    => 'publish',
    'orderby'        => 'modified',
    'order'          => 'DESC',
    'paged'          => $paged,
    'posts_per_page' => 20,
];

if (!empty($price_area_meta_query)) {
    $query_args['meta_query'] = $price_area_meta_query;
}

$query = new WP_Query($query_args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        set_query_var('is_ngop', true);
        get_template_part('loop-property/item-property');
    endwhile;

else :
    echo '<p>Không có bất động sản nào.</p>';
endif;

wp_reset_postdata();
?>