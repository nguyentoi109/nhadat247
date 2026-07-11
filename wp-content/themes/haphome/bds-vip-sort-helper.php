<?php
if (!defined('ABSPATH')) exit;

function bds_get_sorted_listing_ids(int $location_term_id, array $extra_query_args = [], int $paged = 1, int $per_page = 20): array {
    global $wpdb;
    $base_args = array_merge([
        'post_type'      => 'property',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'orderby'        => 'ID',
        'order'          => 'DESC',
        'tax_query'      => [
            [
                'taxonomy' => 'property_location',
                'field'    => 'term_id',
                'terms'    => $location_term_id,
            ],
        ],
    ], $extra_query_args);
    if (!empty($extra_query_args['tax_query'])) {
        $base_args['tax_query'] = [
            'relation' => 'AND',
            [
                'taxonomy' => 'property_location',
                'field'    => 'term_id',
                'terms'    => $location_term_id,
            ],
            $extra_query_args['tax_query'],
        ];
    }
    $query    = new WP_Query($base_args);
    $post_ids = $query->posts; 
    wp_reset_postdata();

    $post_ids = bds_filter_valid_listings($post_ids);

    if (empty($post_ids)) {
        return ['post_ids' => [], 'total_found' => 0, 'max_num_pages' => 0];
    }

    $total_found = count($post_ids);
    $ids_csv     = implode(',', array_map('intval', $post_ids));
    $vip_rows = $wpdb->get_results(
        "SELECT post_id, expired_at
         FROM {$wpdb->prefix}custom_vip_posts
         WHERE post_id IN ($ids_csv)
           AND status = 'active'
           AND expired_at >= CURDATE()"
    );
    $vip_map = [];
    foreach ($vip_rows as $row) {
        $pid = (int) $row->post_id;
        if (!isset($vip_map[$pid]) || strtotime($row->expired_at) > strtotime($vip_map[$pid])) {
            $vip_map[$pid] = $row->expired_at;
        }
    }
    $push_rows = $wpdb->get_results(
        "SELECT post_id, push_type, started_at
         FROM {$wpdb->prefix}custom_post_pushes
         WHERE post_id IN ($ids_csv)
           AND status = 'active'
           AND expired_at > NOW()"
    );
    $push_map = [];
    foreach ($push_rows as $row) {
        $pid = (int) $row->post_id;
        if (!isset($push_map[$pid]) || strtotime($row->started_at) < strtotime($push_map[$pid]['started_at'])) {
            $push_map[$pid] = ['push_type' => $row->push_type, 'started_at' => $row->started_at];
        }
    }
    $post_date_map = []; 
    $date_rows = $wpdb->get_results(
        "SELECT ID, post_date FROM {$wpdb->prefix}posts WHERE ID IN ($ids_csv)"
    );
    foreach ($date_rows as $row) {
        $post_date_map[(int) $row->ID] = strtotime($row->post_date);
    }

    $group_vip_pushed    = []; 
    $group_vip_normal    = []; 
    $group_normal_pushed = []; 
    $group_normal_only   = []; 
    foreach ($post_ids as $pid) {
        $is_vip     = isset($vip_map[$pid]);
        $push_info  = $push_map[$pid] ?? null;
        $post_date  = $post_date_map[$pid] ?? 0;

        if ($is_vip) {
            if ($push_info && $push_info['push_type'] === 'vip') {
                $group_vip_pushed[$pid] = strtotime($push_info['started_at']);
            } else {
                $group_vip_normal[$pid] = $post_date;
            }
        } else {
            if ($push_info && $push_info['push_type'] === 'normal') {
                $group_normal_pushed[$pid] = strtotime($push_info['started_at']);
            } else {
                $group_normal_only[$pid] = $post_date;
            }
        }
    }

    asort($group_vip_pushed);
    asort($group_normal_pushed);

    arsort($group_vip_normal);
    arsort($group_normal_only);
    $sorted_ids = array_merge(
        array_keys($group_vip_pushed),
        array_keys($group_vip_normal),
        array_keys($group_normal_pushed),
        array_keys($group_normal_only)
    );
    $offset      = ($paged - 1) * $per_page;
    $page_ids    = array_slice($sorted_ids, $offset, $per_page);
    $max_pages   = (int) ceil($total_found / $per_page);

    return [
        'post_ids'      => $page_ids,
        'total_found'   => $total_found,
        'max_num_pages' => $max_pages,
    ];
}

function bds_get_sorted_listing_query(int $location_term_id, array $extra_query_args = [], int $paged = 1, int $per_page = 20): array {
    $sorted = bds_get_sorted_listing_ids($location_term_id, $extra_query_args, $paged, $per_page);

    if (empty($sorted['post_ids'])) {
        $empty_query = new WP_Query(['post__in' => [0], 'post_type' => 'property']);
        return ['query' => $empty_query, 'max_num_pages' => 0];
    }
    $query = new WP_Query([
        'post_type'      => 'property',
        'post_status'    => 'publish',
        'post__in'       => $sorted['post_ids'],
        'orderby'        => 'post__in',
        'posts_per_page' => $per_page,
        'paged'          => $paged,
        'ignore_sticky_posts' => true,
    ]);
    return ['query' => $query, 'max_num_pages' => $sorted['max_num_pages']];
}

function bds_check_post_vip(int $post_id): array {
    global $wpdb;

    $row = $wpdb->get_row($wpdb->prepare(
        "SELECT expired_at FROM {$wpdb->prefix}custom_vip_posts
         WHERE post_id = %d AND status = 'active' AND expired_at >= CURDATE()
         ORDER BY expired_at DESC LIMIT 1",
        $post_id
    ));

    return [
        'is_vip'         => (bool) $row,
        'vip_expired_at' => $row ? $row->expired_at : null,
    ];
}

//new post
function bds_get_sorted_query(array $wp_query_args, int $paged = 1, int $per_page = 10): array {
    global $wpdb;
 
    $base_args = array_merge($wp_query_args, [
        'posts_per_page' => -1,
        'fields'         => 'ids',
    ]);
    if (!isset($base_args['post_status'])) {
        $base_args['post_status'] = 'publish';
    }
    $query    = new WP_Query($base_args);
    $post_ids = $query->posts;
    wp_reset_postdata();

    $post_ids = bds_filter_valid_listings($post_ids);
 
     if (empty($post_ids)) {
        $empty_query = new WP_Query(['post__in' => [0], 'post_type' => $wp_query_args['post_type'] ?? 'property']);
        return ['query' => $empty_query, 'max_num_pages' => 0];
    }
 
    $total_found = count($post_ids);
    $ids_csv     = implode(',', array_map('intval', $post_ids));
 
    $vip_rows = $wpdb->get_results(
        "SELECT post_id, expired_at
         FROM {$wpdb->prefix}custom_vip_posts
         WHERE post_id IN ($ids_csv)
           AND status = 'active'
           AND expired_at >= CURDATE()"
    );
    $vip_map = [];
    foreach ($vip_rows as $row) {
        $pid = (int) $row->post_id;
        if (!isset($vip_map[$pid]) || strtotime($row->expired_at) > strtotime($vip_map[$pid])) {
            $vip_map[$pid] = $row->expired_at;
        }
    }
 
    $push_rows = $wpdb->get_results(
        "SELECT post_id, push_type, started_at
         FROM {$wpdb->prefix}custom_post_pushes
         WHERE post_id IN ($ids_csv)
           AND status = 'active'
           AND expired_at > NOW()"
    );
    $push_map = [];
    foreach ($push_rows as $row) {
        $pid = (int) $row->post_id;
        if (!isset($push_map[$pid]) || strtotime($row->started_at) < strtotime($push_map[$pid]['started_at'])) {
            $push_map[$pid] = ['push_type' => $row->push_type, 'started_at' => $row->started_at];
        }
    }
 
    $post_date_map = [];
    $date_rows = $wpdb->get_results(
        "SELECT ID, post_modified FROM {$wpdb->prefix}posts WHERE ID IN ($ids_csv)"
    );
    foreach ($date_rows as $row) {
        $post_date_map[(int) $row->ID] = strtotime($row->post_modified);
    }
    $group_vip_pushed    = [];
    $group_vip_normal    = [];
    $group_normal_pushed = [];
    $group_normal_only   = [];
    foreach ($post_ids as $pid) {
        $is_vip    = isset($vip_map[$pid]);
        $push_info = $push_map[$pid] ?? null;
        $post_date = $post_date_map[$pid] ?? 0;
 
        if ($is_vip) {
            if ($push_info && $push_info['push_type'] === 'vip') {
                $group_vip_pushed[$pid] = strtotime($push_info['started_at']);
            } else {
                $group_vip_normal[$pid] = $post_date;
            }
        } else {
            if ($push_info && $push_info['push_type'] === 'normal') {
                $group_normal_pushed[$pid] = strtotime($push_info['started_at']);
            } else {
                $group_normal_only[$pid] = $post_date;
            }
        }
    }
 
    asort($group_vip_pushed);
    asort($group_normal_pushed);
    arsort($group_vip_normal);
    arsort($group_normal_only);
    $sorted_ids = array_merge(
        array_keys($group_vip_pushed),
        array_keys($group_vip_normal),
        array_keys($group_normal_pushed),
        array_keys($group_normal_only)
    );
    $offset    = ($paged - 1) * $per_page;
    $page_ids  = array_slice($sorted_ids, $offset, $per_page);
    $max_pages = (int) ceil($total_found / $per_page);
 
    if (empty($page_ids)) {
        $empty_query = new WP_Query(['post__in' => [0], 'post_type' => $wp_query_args['post_type'] ?? 'property']);
        return ['query' => $empty_query, 'max_num_pages' => $max_pages];
    }
 
    $final_query = new WP_Query([
        'post_type'           => $wp_query_args['post_type'] ?? 'property',
        'post_status'         => $base_args['post_status'],
        'post__in'            => $page_ids,
        'orderby'             => 'post__in',
        'posts_per_page'      => $per_page,
        'paged'               => $paged,
        'ignore_sticky_posts' => true,
    ]);
    return ['query' => $final_query, 'max_num_pages' => $max_pages];
}

function bds_filter_valid_listings(array $post_ids): array {
    global $wpdb;
    if (empty($post_ids)) {
        return [];
    }
    $ids_csv = implode(',', array_map('intval', $post_ids));
    $user_posted_rows = $wpdb->get_col(
        "SELECT post_id FROM {$wpdb->prefix}postmeta
         WHERE meta_key = '_custom_user_id'
           AND post_id IN ($ids_csv)
           AND meta_value != ''"
    );
    $user_posted_ids = array_map('intval', $user_posted_rows);
    if (empty($user_posted_ids)) {
        return $post_ids;
    }

    $user_ids_csv = implode(',', $user_posted_ids);
    $valid_rows = $wpdb->get_col(
        "SELECT post_id FROM {$wpdb->prefix}custom_post_listings
         WHERE post_id IN ($user_ids_csv)
           AND status = 'active'
           AND (expired_at IS NULL OR expired_at >= CURDATE())"
    );
    $valid_user_ids = array_flip(array_map('intval', $valid_rows));
    $user_posted_lookup = array_flip($user_posted_ids);
    $result = [];
    foreach ($post_ids as $pid) {
        $pid = (int) $pid;
        $is_user_posted = isset($user_posted_lookup[$pid]);

        if (!$is_user_posted) {
            $result[] = $pid;
        } elseif (isset($valid_user_ids[$pid])) {
            $result[] = $pid;
        }
    }

    return $result;
}