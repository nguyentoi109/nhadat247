<?php
$query = new WP_Query(array(
    'post_type' => 'property',
    'tax_query' => array(
        array(
            'taxonomy' => 'property_type',
            'field'    => 'term_id',
            'terms'    => 70,
        ),
    ),
    'orderby' => 'date',
    'order' => 'ASC',
    'posts_per_page' => 18,
));

if ($query->have_posts()):
    while ($query->have_posts()) : $query->the_post();

        get_template_part('loop-property/item-property');

    endwhile;

    wp_reset_postdata();
else:
    echo "Không có bài nào";
endif;
?>