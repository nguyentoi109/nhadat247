<?php
/*
Template Name: Tin đăng của người dùng
*/
get_header();

$dt_author    = isset($_GET['dt_author']) ? (int) $_GET['dt_author'] : 0;
$dt_wp_author = isset($_GET['dt_wp_author']) ? (int) $_GET['dt_wp_author'] : 0;

if (!$dt_author && !$dt_wp_author) {
    get_footer();
    exit;
}

global $wpdb;

$paged = max(1, get_query_var('paged'));
$price_area_meta_query = bds_filter_price_area_meta_query();

if ($dt_author) {
    $valid_post_ids = $wpdb->get_col($wpdb->prepare(
        "SELECT post_id FROM {$wpdb->prefix}custom_post_listings
         WHERE custom_user_id = %d
           AND status = 'active'
           AND (expired_at IS NULL OR expired_at >= CURDATE())",
        $dt_author
    ));

    if (empty($valid_post_ids)) {
        $valid_post_ids = [0];
    }
    $query_args = [
        'post_type'   => 'property',
        'post_status' => 'publish',
        'post__in'    => $valid_post_ids,
        'orderby'     => 'post__in', 
        'meta_query'  => [
            [
                'key'   => '_custom_user_id',
                'value' => $dt_author,
                'type'  => 'NUMERIC',
            ],
        ],
    ];
} else {
    $query_args = [
        'post_type'   => 'property',
        'post_status' => 'publish',
        'author'      => $dt_wp_author,
    ];
}
if (!empty($price_area_meta_query)) {
    $query_args['meta_query'] = array_merge(
        $query_args['meta_query'] ?? [],
        $price_area_meta_query
    );
}
$result = bds_get_sorted_query($query_args, $paged, 20);
$query  = $result['query'];
$sample_post_id = $query->have_posts() ? $query->posts[0]->ID : 0;
$author_info    = $sample_post_id ? bds_get_post_author_info($sample_post_id) : null;
?>

<style>
.dt-author-listing-sidebar {
    width: 320px;
    flex-shrink: 0;
}
</style>

<section class="container wrap-content">
    <main role="main" class="full-page">
        <div class="list-style-wrap container" style="display:flex; gap:15px; align-items:flex-start;">
            <div class="list-style list-all" style="min-width:0; flex:1;">
                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php get_template_part('loop-property/item-property'); ?>
                    <?php endwhile; ?>

                    <div class="pagination">
                        <?php
                        if (function_exists('wp_pagenavi')) {
                            wp_pagenavi(['query' => $query]);
                        } else {
                            echo paginate_links([
                                'total'   => $result['max_num_pages'],
                                'current' => $paged,
                            ]);
                        }
                        ?>
                    </div>
                <?php else : ?>
                    <h2>Người dùng này chưa có tin đăng nào</h2>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>

            <aside class="dt-author-listing-sidebar">
                <?php if ($author_info) :
                    set_query_var('author_email',        $author_info['email']);
                    set_query_var('author_name',         $author_info['name']);
                    set_query_var('author_phone',        $author_info['phone']);
                    set_query_var('author_post_ct',      $author_info['post_count']);
                    set_query_var('author_duration',     $author_info['duration_text']);
                    set_query_var('author_avatar',       $author_info['avatar_html']);
                    set_query_var('author_id_for_link',  $author_info['author_id_for_link']);
                    set_query_var('author_link_type',    $author_info['link_type']);
                    get_template_part('detail-sidebar');
                endif; ?>
            </aside>
        </div>
    </main>
</section>

<?php get_footer(); ?>