<?php
$location_id = (int) get_query_var('ngop_location_id', 0);
$status_id   = (int) get_query_var('ngop_status_id',   0);
$type_id     = (int) get_query_var('ngop_type_id',     0);
$tax_query = [
    'relation' => 'AND',
    [
        'taxonomy' => 'property_type',
        'field'    => 'term_id',
        'terms'    => 135,
    ],
];
if ($status_id) {
    $tax_query[] = [
        'taxonomy' => 'property_status',
        'field'    => 'term_id',
        'terms'    => $status_id,
    ];
}
if ($location_id) {
    $tax_query[] = [
        'taxonomy'         => 'property_location',
        'field'            => 'term_id',
        'terms'            => $location_id,
        'include_children' => true,
    ];
}
if ($type_id) {
    $tax_query[] = [
        'taxonomy' => 'property_type',
        'field'    => 'term_id',
        'terms'    => $type_id,
    ];
}

$result = bds_get_sorted_query([
    'post_type'   => 'property',
    'post_status' => 'publish',
    'tax_query'   => $tax_query,
], 1, 18);
$query = $result['query'];

if (!$query->have_posts()) {
    wp_reset_postdata();
    set_query_var('is_ngop', false);
    return;
}
?>

<div class="popular clear">
    <h2 class="title-section"><span>Bất động sản ngộp</span></h2>
    <div class="popular-real grid swiper-container">
       <div class="list-popular-real swiper-wrapper">
         <?php while ($query->have_posts()) : $query->the_post();
                set_query_var('is_ngop', true);
                get_template_part('loop-property/item-property');
            endwhile;
            wp_reset_postdata();
            set_query_var('is_ngop', false);
            ?>
       </div>
    </div>

    <span class="btn-prev">
        <span class="ti-arrow-left"></span>
    </span>
    <span class="btn-next">
      <span class="ti-arrow-right"></span>
    </span>
    
    <div class="swiper-pagination"></div>
  </div>