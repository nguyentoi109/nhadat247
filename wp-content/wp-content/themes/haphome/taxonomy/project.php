<?php
////////////////////////// PROJECT
function post_project() {

    $labels = array(
        'name'                  => _x( 'Dự án', 'Post Type General Name', 'html5blank' ),
        'singular_name'         => _x( 'Dự án', 'Post Type Singular Name', 'html5blank' ),
        'menu_name'             => __( 'Dự án', 'html5blank' ),
        'name_admin_bar'        => __( 'Dự án', 'html5blank' ),
        'archives'              => __( 'Danh sách dự án', 'html5blank' ),
        'attributes'            => __( 'Thuộc tính', 'html5blank' ),
        'parent_item_colon'     => __( 'Cha', 'html5blank' ),
        'all_items'             => __( 'Tất cả', 'html5blank' ),
        'add_new_item'          => __( 'Thêm dự án', 'html5blank' ),
        'add_new'               => __( 'Thêm dự án', 'html5blank' ),
        'new_item'              => __( 'Dự án mới', 'html5blank' ),
        'edit_item'             => __( 'Sửa', 'html5blank' ),
        'update_item'           => __( 'Cập nhật', 'html5blank' ),
        'view_item'             => __( 'Xem', 'html5blank' ),
        'view_items'            => __( 'Xem', 'html5blank' ),
        'search_items'          => __( 'Tìm', 'html5blank' ),
        'not_found'             => __( 'Không tìm thấy', 'html5blank' ),
        'not_found_in_trash'    => __( 'Không có trong thùng rác', 'html5blank' ),
        'featured_image'        => __( 'Hình dự án', 'html5blank' ),
        'set_featured_image'    => __( 'Chọn hình dự án', 'html5blank' ),
        'remove_featured_image' => __( 'Xóa', 'html5blank' ),
        'use_featured_image'    => __( 'Sử dụng', 'html5blank' ),
        'insert_into_item'      => __( 'Thêm', 'html5blank' ),
        'uploaded_to_this_item' => __( 'Cập nhật', 'html5blank' ),
        'items_list'            => __( 'Danh sách', 'html5blank' ),
        'items_list_navigation' => __( 'Danh sách trong menu', 'html5blank' ),
        'filter_items_list'     => __( 'Lọc danh sách', 'html5blank' ),
    );
    $rewrite = array(
        'slug'                  => 'du-an',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Dự án', 'html5blank' ),
        'description'           => __( 'Dự án công ty', 'html5blank' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'project_cat' ),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'project', $args );

}
add_action( 'init', 'post_project', 0 );

/////////////
// Register Custom Taxonomy
function project_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Danh mục dự án', 'Taxonomy General Name', 'html5blank' ),
        'singular_name'              => _x( 'Danh mục dự án', 'Taxonomy Singular Name', 'html5blank' ),
        'menu_name'                  => __( 'Danh mục dự án', 'html5blank' ),
        'all_items'                  => __( 'Tất cả', 'html5blank' ),
        'parent_item'                => __( 'Cha', 'html5blank' ),
        'parent_item_colon'          => __( 'Dự án cha', 'html5blank' ),
        'new_item_name'              => __( 'Thêm mới', 'html5blank' ),
        'add_new_item'               => __( 'Thêm mới', 'html5blank' ),
        'edit_item'                  => __( 'Sửa', 'html5blank' ),
        'update_item'                => __( 'Cập nhật', 'html5blank' ),
        'view_item'                  => __( 'Xem', 'html5blank' ),
        'separate_items_with_commas' => __( '', 'html5blank' ),
        'add_or_remove_items'        => __( '', 'html5blank' ),
        'choose_from_most_used'      => __( '', 'html5blank' ),
        'popular_items'              => __( '', 'html5blank' ),
        'search_items'               => __( '', 'html5blank' ),
        'not_found'                  => __( '', 'html5blank' ),
        'no_terms'                   => __( '', 'html5blank' ),
        'items_list'                 => __( '', 'html5blank' ),
        'items_list_navigation'      => __( '', 'html5blank' ),
    );
    $rewrite = array(
        'slug'                       => 'danh-muc-du-an',
        'with_front'                 => true,
        'hierarchical'               => true,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'project_cat', array( 'project' ), $args );

}
add_action( 'init', 'project_taxonomy', 0 );
////////////////////////// END PROJECT
?>