<?php
////////////////////////// PROPERTY
function post_property() {

    $labels = array(
        'name'                  => _x( 'Bất Động Sản', 'Post Type General Name', 'html5blank' ),
        'singular_name'         => _x( 'Bất Động Sản', 'Post Type Singular Name', 'html5blank' ),
        'menu_name'             => __( 'Bất Động Sản', 'html5blank' ),
        'name_admin_bar'        => __( 'Bất Động Sản', 'html5blank' ),
        'archives'              => __( 'Danh sách Bất Động Sản', 'html5blank' ),
        'attributes'            => __( 'Thuộc tính', 'html5blank' ),
        'parent_item_colon'     => __( 'Cha', 'html5blank' ),
        'all_items'             => __( 'Tất cả', 'html5blank' ),
        'add_new_item'          => __( 'Thêm Bất Động Sản', 'html5blank' ),
        'add_new'               => __( 'Thêm Bất Động Sản', 'html5blank' ),
        'new_item'              => __( 'Bất Động Sản mới', 'html5blank' ),
        'edit_item'             => __( 'Sửa', 'html5blank' ),
        'update_item'           => __( 'Cập nhật', 'html5blank' ),
        'view_item'             => __( 'Xem', 'html5blank' ),
        'view_items'            => __( 'Xem', 'html5blank' ),
        'search_items'          => __( 'Tìm', 'html5blank' ),
        'not_found'             => __( 'Không tìm thấy', 'html5blank' ),
        'not_found_in_trash'    => __( 'Không có trong thùng rác', 'html5blank' ),
        'featured_image'        => __( 'Hình Bất Động Sản', 'html5blank' ),
        'set_featured_image'    => __( 'Chọn hình Bất Động Sản', 'html5blank' ),
        'remove_featured_image' => __( 'Xóa', 'html5blank' ),
        'use_featured_image'    => __( 'Sử dụng', 'html5blank' ),
        'insert_into_item'      => __( 'Thêm', 'html5blank' ),
        'uploaded_to_this_item' => __( 'Cập nhật', 'html5blank' ),
        'items_list'            => __( 'Danh sách', 'html5blank' ),
        'items_list_navigation' => __( 'Danh sách trong menu', 'html5blank' ),
        'filter_items_list'     => __( 'Lọc danh sách', 'html5blank' ),
    );
    $rewrite = array(
        'slug'                  => 'bat-dong-san',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Bất Động Sản', 'html5blank' ),
        'description'           => __( 'Bất Động Sản', 'html5blank' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'property_status', 'property_type', 'property_location', 'property_diẻction'  ),
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
    register_post_type( 'property', $args );

}
add_action( 'init', 'post_property', 0 );

// Register Status
function property_status() {

    $labels = array(
        'name'                       => _x( 'Loại tin', 'Taxonomy General Name', 'html5blank' ),
        'singular_name'              => _x( 'Loại tin', 'Taxonomy Singular Name', 'html5blank' ),
        'menu_name'                  => __( 'Loại tin', 'html5blank' ),
        'all_items'                  => __( 'Tất cả', 'html5blank' ),
        'parent_item'                => __( 'Cha', 'html5blank' ),
        'parent_item_colon'          => __( 'Loại tin cha', 'html5blank' ),
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
        'slug'                       => 'loai-tin',
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
    register_taxonomy( 'property_status', array( 'property' ), $args );

}
add_action( 'init', 'property_status', 0 );
// End Status

// Register Type
function property_type() {

    $labels = array(
        'name'                       => _x( 'Loại BĐS', 'Taxonomy General Name', 'html5blank' ),
        'singular_name'              => _x( 'Loại BĐS', 'Taxonomy Singular Name', 'html5blank' ),
        'menu_name'                  => __( 'Loại BĐS', 'html5blank' ),
        'all_items'                  => __( 'Tất cả', 'html5blank' ),
        'parent_item'                => __( 'Cha', 'html5blank' ),
        'parent_item_colon'          => __( 'Loại BĐS cha', 'html5blank' ),
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
        'slug'                       => 'loai-bat-dong-san',
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
    register_taxonomy( 'property_type', array( 'property' ), $args );

}
add_action( 'init', 'property_type', 0 );
// End Status

// Register Location
function property_location() {

    $labels = array(
        'name'                       => _x( 'Tỉnh thành', 'Taxonomy General Name', 'html5blank' ),
        'singular_name'              => _x( 'Tỉnh thành', 'Taxonomy Singular Name', 'html5blank' ),
        'menu_name'                  => __( 'Tỉnh thành', 'html5blank' ),
        'all_items'                  => __( 'Tất cả', 'html5blank' ),
        'parent_item'                => __( 'Cha', 'html5blank' ),
        'parent_item_colon'          => __( 'Tỉnh thành cha', 'html5blank' ),
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
        'slug'                       => 'khu-vuc',
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
    register_taxonomy( 'property_location', array( 'property' ), $args );

}
add_action( 'init', 'property_location', 0 );
// End Status


// Register Direction
function property_direction() {

    $labels = array(
        'name'                       => _x( 'Hướng', 'Taxonomy General Name', 'html5blank' ),
        'singular_name'              => _x( 'Hướng', 'Taxonomy Singular Name', 'html5blank' ),
        'menu_name'                  => __( 'Hướng', 'html5blank' ),
        'all_items'                  => __( 'Tất cả', 'html5blank' ),
        'parent_item'                => __( 'Cha', 'html5blank' ),
        'parent_item_colon'          => __( 'Hướng cha', 'html5blank' ),
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
        'slug'                       => 'huong',
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
    register_taxonomy( 'property_direction', array( 'property' ), $args );

}
add_action( 'init', 'property_direction', 0 );
// End Status

// Detail 
function property_meta_box( $meta_boxes ) {
	$prefix = 'prefix-';

	$meta_boxes[] = array(
		'id' => 'propert_meta_box',
		'title' => esc_html__( 'Thông tin Bất Động Sản', 'html5blank' ),
		'post_types' => array('property' ),
		'context' => 'normal',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'price',
				'type' => 'number',
				'name' => esc_html__( 'Giá', 'html5blank' ),
				'desc' => esc_html__( 'Giá Bất Động Sản', 'html5blank' ),
				'placeholder' => esc_html__( 'Giá', 'html5blank' ),
			),
			array(
				'id' => $prefix . 'unit',
				'type' => 'select',
				'name' => esc_html__( 'Đơn vị tiền', 'html5blank' ),
				'desc' => esc_html__( 'Chọn đơn vị tiền (Triệu/Tỷ)', 'html5blank' ),
				'options' => [
              '' => esc_html__( 'Chọn đơn vị tiền', 'html5blank' ),
              'trieu' => esc_html__( 'Triệu', 'html5blank' ),
              'ty' => esc_html__( 'Tỷ', 'html5blankr' ),
          ],
			),
			array(
				'id' => $prefix . 'area',
				'type' => 'number',
				'name' => esc_html__( 'Diện tích', 'html5blank' ),
				'desc' => esc_html__( 'Diện tích Bất Động Sản', 'html5blank' ),
				'placeholder' => esc_html__( 'Diện tích Bất Động Sản', 'html5blank' ),
			),
			array(
				'id' => $prefix . 'address',
				'type' => 'text',
				'name' => esc_html__( 'Địa chỉ', 'html5blank' ),
				'desc' => esc_html__( 'Địa chỉ Bất Động Sản', 'html5blank' ),
				'placeholder' => esc_html__( 'Địa chỉ Bất Động Sản', 'html5blank' ),
			),
			array(
				'id' => $prefix . 'video',
				'type' => 'text',
				'name' => esc_html__( 'Video', 'html5blank' ),
				'desc' => esc_html__( 'Video Bất Động Sản', 'html5blank' ),
				'placeholder' => esc_html__( 'Video Bất Động Sản', 'html5blank' ),
			),
			array(
				'id' => $prefix . 'name-custom',
				'type' => 'text',
				'name' => esc_html__( 'Họ tên', 'html5blank' ),
				'desc' => esc_html__( 'Nhập Họ tên liên hệ', 'html5blank' ),
				'placeholder' => esc_html__( 'Nhập Họ tên', 'html5blank' ),
			),
			array(
				'id' => $prefix . 'phone-custom',
				'type' => 'text',
				'name' => esc_html__( 'Điện thoại', 'html5blank' ),
				'desc' => esc_html__( 'Nhập số điện thoại liên hệ', 'html5blank' ),
				'placeholder' => esc_html__( 'Số điện thoại', 'html5blank' ),
			),
			array(
				'id' => $prefix . 'email-custom',
				'type' => 'text',
				'name' => esc_html__( 'Email liên hệ', 'html5blank' ),
				'desc' => esc_html__( 'Nhập email liên hệ', 'html5blank' ),
				'placeholder' => esc_html__( 'Nhập email', 'html5blank' ),
			),
			array(
				'id' => $prefix . 'vip',
				'type' => 'checkbox',
				'name' => esc_html__( 'Tin VIP', 'html5blank' ),
				'desc' => esc_html__( 'Chọn tin VIP', 'html5blank' ),
				'placeholder' => esc_html__( 'Tin VIP', 'html5blank' ),
			),
			/*array(
				'id' => $prefix . 'map_property',
				'type' => 'map',
				'name' => esc_html__( 'Bản đồ', 'html5blank' ),
				'desc' => esc_html__( 'Bản đồ vị trí Bất Động Sản', 'html5blank' ),
			),*/
			/*array(
				'id' => $prefix . 'image_property',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Hình ảnh', 'html5blank' ),
				'desc' => esc_html__( 'Hình ảnh Bất Động Sản', 'html5blank' ),
				'max_file_uploads' => '5',
				'max_status' => 'true',
				'force_delete' => 'false',
			),*/
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'property_meta_box' );


////////////////////////////////



?>