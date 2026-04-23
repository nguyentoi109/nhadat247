<?php
////////////////////////// BANNER
function banner_pc() {

    $labels = array(
        'name'                  => _x( 'Banner', 'Post Type General Name', 'html5blank' ),
        'singular_name'         => _x( 'Banner', 'Post Type Singular Name', 'html5blank' ),
        'menu_name'             => __( 'Banner', 'html5blank' ),
        'name_admin_bar'        => __( 'Banner', 'html5blank' ),
        'archives'              => __( 'Banner', 'html5blank' ),
        'attributes'            => __( 'Thuốc tính', 'html5blank' ),
        'parent_item_colon'     => __( 'Cha', 'html5blank' ),
        'all_items'             => __( 'Tất cả', 'html5blank' ),
        'add_new_item'          => __( 'Thêm mới', 'html5blank' ),
        'add_new'               => __( 'Thêm mới', 'html5blank' ),
        'new_item'              => __( 'Mới', 'html5blank' ),
        'edit_item'             => __( 'Sửa', 'html5blank' ),
        'update_item'           => __( 'Cập nhật', 'html5blank' ),
        'view_item'             => __( 'Xem', 'html5blank' ),
        'view_items'            => __( 'Xem', 'html5blank' ),
        'search_items'          => __( 'Tìm', 'html5blank' ),
        'not_found'             => __( 'Không tìm thấy', 'html5blank' ),
        'not_found_in_trash'    => __( 'Không có trong thùng rác', 'html5blank' ),
        'featured_image'        => __( 'Banner', 'html5blank' ),
        'set_featured_image'    => __( 'Chọn Banner', 'html5blank' ),
        'remove_featured_image' => __( 'Xóa Banner', 'html5blank' ),
        'use_featured_image'    => __( 'Sử dụng Banner', 'html5blank' ),
        'insert_into_item'      => __( 'Thêm', 'html5blank' ),
        'uploaded_to_this_item' => __( 'Tải lên', 'html5blank' ),
        'items_list'            => __( 'Danh sách', 'html5blank' ),
        'items_list_navigation' => __( 'Danh sách', 'html5blank' ),
        'filter_items_list'     => __( 'Lọc', 'html5blank' ),
    );
    $rewrite = array(
        'slug'                  => 'banner-pc',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Banner', 'html5blank' ),
        'description'           => __( 'Banner', 'html5blank' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'banner', $args );

}
add_action( 'init', 'banner_pc', 0 );
////////////////////////// END BANNER


// Register Position
function banner_position() {

    $labels = array(
        'name'                       => _x( 'Vị trí', 'Taxonomy General Name', 'html5blank' ),
        'singular_name'              => _x( 'Vị trí', 'Taxonomy Singular Name', 'html5blank' ),
        'menu_name'                  => __( 'Vị trí', 'html5blank' ),
        'all_items'                  => __( 'Tất cả', 'html5blank' ),
        'parent_item'                => __( 'Cha', 'html5blank' ),
        'parent_item_colon'          => __( 'Vị trí cha', 'html5blank' ),
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
        'slug'                       => 'vitri',
        'with_front'                 => true,
        'hierarchical'               => true,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'banner_position', array( 'banner' ), $args );

}
add_action( 'init', 'banner_position', 0 );
// End Position


// Detail 
function banner_meta_box( $meta_boxes ) {
	$prefix = 'prefix-';

	$meta_boxes[] = array(
		'id' => 'banner_meta_box',
		'title' => esc_html__( 'Thông tin Banner', 'html5blank' ),
		'post_types' => array('banner' ),
		'context' => 'normal',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'banner-url',
				'type' => 'text',
				'name' => esc_html__( 'Liên kết', 'html5blank' ),
				'desc' => esc_html__( '', 'html5blank' ),
				'placeholder' => esc_html__( 'https://haphome.vn', 'html5blank' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'banner_meta_box' );


////////////////////////////////
?>