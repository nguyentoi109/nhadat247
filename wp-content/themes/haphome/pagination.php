<?php
global $wp_query;

echo paginate_links(array(
    'total' => $wp_query->max_num_pages,
    'current' => max(1, get_query_var('paged')),
    'prev_text' => '« Trước',
    'next_text' => 'Sau »'
));
?>
