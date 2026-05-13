<?php
/**
 * Xử lý truy vấn SQL / WP_Query
 */
$paged = max(1, get_query_var('paged'));

$main_args = array(
    'post_type'      => 'post',
    'category_name'  => 'noi-ngoai-that',
    'posts_per_page' => 10,
    'paged'          => $paged
);
$main_query = new WP_Query($main_args);
