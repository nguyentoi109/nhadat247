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
                'type' => 'text',
                'name' => esc_html__( 'Giá', 'html5blank' ),
                'desc' => esc_html__( 'Giá Bất Động Sản', 'html5blank' ),
                'placeholder' => 'Ví dụ: 1.500.000.000',
            ),
		// 	array(
		// 		'id' => $prefix . 'unit',
		// 		'type' => 'select',
		// 		'name' => esc_html__( 'Đơn vị tiền', 'html5blank' ),
		// 		'desc' => esc_html__( 'Chọn đơn vị tiền (Triệu/Tỷ)', 'html5blank' ),
		// 		'options' => [
        //       '' => esc_html__( 'Chọn đơn vị tiền', 'html5blank' ),
        //       'trieu' => esc_html__( 'Triệu', 'html5blank' ),
        //       'ty' => esc_html__( 'Tỷ', 'html5blankr' ),
        //   ],
		// 	),
			array(
				'id' => $prefix . 'area',
				'type' => 'number',
				'name' => esc_html__( 'Diện tích', 'html5blank' ),
				'desc' => esc_html__( 'Diện tích Bất Động Sản', 'html5blank' ),
				'placeholder' => esc_html__( 'Diện tích Bất Động Sản', 'html5blank' ),
			),
            array(
                'id'=> $prefix . 'bedroom',
                'type'=> 'select',
                'name'=> esc_html__('Số phòng ngủ', 'html5blank'),
                'desc' => esc_html__( 'Loại phòng', 'html5blank' ),
                'placeholder'=> esc_html__('Số phòng ngủ', 'html5blank'),
                'options'=> array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '&ge;5',
                    '6' => 'Studio',
                    '7' => '1+',
                    '8' => '2+',
                ),
            ),
            array(
                'id'   => $prefix . 'bathroom',
                'type' => 'select',
                'name' => esc_html__('Số nhà vệ sinh, nhà tắm', 'html5blank'),
                'desc' => esc_html__('Số nhà vệ sinh', 'html5blank'),
                'placeholder' => esc_html__('Số nhà vệ sinh, nhà tắm', 'html5blank'),
                'options' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '&ge;5',
                ),
            ),
			// array(
			// 	'id' => $prefix . 'address',
			// 	'type' => 'text',
			// 	'name' => esc_html__( 'Địa chỉ', 'html5blank' ),
			// 	'desc' => esc_html__( 'Địa chỉ Bất Động Sản', 'html5blank' ),
			// 	'placeholder' => esc_html__( 'Địa chỉ Bất Động Sản', 'html5blank' ),
			// ),
            array(
                'id' => $prefix . 'phap-ly',
                'type' => 'text',
                'name' => esc_html__('Giấy tờ pháp lý', 'html5blank'),
                'desc' => esc_html__( 'Loại giấy tờ', 'html5blank' ),
                'placeholder' => esc_html__('Loại giấy tờ', 'html5blank'),
            ),
            array(
                'id' => $prefix . 'noi-that',
                'type' => 'text',
                'name' => esc_html__('Tình trạng nội thất', 'html5blank'),
                'desc' => esc_html__( 'Tình trạng nội thất', 'html5blank' ),
                'placeholder' => esc_html__('Tình trạng nội thất', 'html5blank'),
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
				'id' => $prefix . 'image_property',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Hình ảnh', 'html5blank' ),
				'desc' => esc_html__( 'Hình ảnh Bất Động Sản', 'html5blank' ),
				'max_file_uploads' => '9',
				'max_status' => 'true',
				'force_delete' => 'false',
			),
            array(
                'id' => 'image360',
                'name'  => 'Hình ảnh 360',
                'desc' => 'Tải hình ảnh chụp dưới dạng 360 độ',
                'type' => 'single_image',
            ),
            // array(
			// 	'id' => $prefix . 'map_property',
			// 	'type' => 'text',
			// 	'name' => esc_html__( 'Địa chỉ BĐS', 'html5blank' ),
			// 	'desc' => esc_html__( 'Bản đồ vị trí Bất Động Sản', 'html5blank' ),
			// ),
            // array(
            //     'id'            => $prefix . 'maps',
            //     'name'          => 'Vị trí bản đồ',
            //     'type'          => 'osm',
            //     'std'           => '11.522396680282077, 106.8283398815055',
            //     'address_field' => $prefix . 'map_property',
            // ),
            array(
                'id' => $prefix . 'address',
                'type' => 'text',
                'name' => esc_html__( 'Địa chỉ BĐS', 'html5blank' ),
                'desc' => esc_html__( 'Tự điền khi tìm/chọn vị trí trên bản đồ bên dưới, có thể sửa tay.', 'html5blank' ),
                'placeholder' => esc_html__( 'Địa chỉ trên bản đồ', 'html5blank' ),
            ),
            array(
                'id'   => $prefix . 'lat',
                'type' => 'text',
                'name' => esc_html__( 'Vĩ độ (lat)', 'html5blank' ),
                'desc' => esc_html__( 'Tự động điền khi chọn vị trí trên bản đồ', 'html5blank' ),
            ),
            array(
                'id'   => $prefix . 'lng',
                'type' => 'text',
                'name' => esc_html__( 'Kinh độ (lng)', 'html5blank' ),
                'desc' => esc_html__( 'Tự động điền khi chọn vị trí trên bản đồ', 'html5blank' ),
            ),
            array(
                'id'      => $prefix . 'here_map_block',
                'type'    => 'custom_html',
                'name'    => esc_html__( 'Vị trí bản đồ (HERE Maps)', 'html5blank' ),
                'std'     => '
                    <div style="position:relative;margin-bottom:10px;">
                        <input type="text" id="dt-admin-map-search" autocomplete="off"
                               placeholder="Nhập địa chỉ để tìm..."
                               style="width:100%;padding:8px 10px;border:1px solid #ddd;border-radius:4px;font-size:13px;">
                        <div id="dt-admin-map-suggest"
                             style="display:none;position:absolute;z-index:9999;top:100%;left:0;width:100%;max-width:480px;
                                    background:#fff;border:1px solid #ddd;border-top:none;border-radius:0 0 4px 4px;
                                    box-shadow:0 6px 14px rgba(0,0,0,.12);max-height:260px;overflow-y:auto;"></div>
                    </div>
                    <div id="dt-admin-map" style="width:100%;max-width:860px;height:360px;border-radius:6px;border:1px solid #ddd;overflow:hidden;background:#f5f5f5;"></div>
                    <p style="font-size:12px;color:#888;margin-top:6px;">Nhấp vào bản đồ hoặc kéo icon để điều chỉnh vị trí chính xác.</p>
                ',
            ),
            array(
                'id'            => $prefix . 'post',
                'name'          => 'Bài viết',
                'type'          => 'text_list',
                //'clone'         => true,
                'options'       => [
                        'Nhập tiêu đề bài viết ở đây'      => 'Tiêu đề bài viết',
                        'https://haphome.vn' => 'Đường dẫn bài viết',
                    ],
            ),
           /*  array(
				'id' => $prefix . 'gg_text_map',
				'type' => 'text',
				'name' => esc_html__( 'Địa chỉ BĐS', 'html5blank' ),
				'desc' => esc_html__( 'Bản đồ vị trí Bất Động Sản', 'html5blank' ),
			), */
            /* array(
                'id'            => $prefix . 'gg_map',
                'name'          => 'Vị trí bản đồ Google',
                'type'          => 'map',
                'std'           => '-6.233406,-35.049906,15',
                'address_field' => 'gg_text_map',
                'api_key'       => 'AIzaSyBNuiqPDbJILnV0czGKOcuDPnxOrsQspMk',
            ),*/
			array(
				'id' => $prefix . 'vip',
				'type' => 'checkbox',
				'name' => esc_html__( 'Tin VIP', 'html5blank' ),
				'desc' => esc_html__( 'Chọn tin VIP', 'html5blank' ),
				'placeholder' => esc_html__( 'Tin VIP', 'html5blank' ),
			), 
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'property_meta_box' );
add_filter('rwmb_prefix-price_value', function($new, $old, $post_id, $field){

    return str_replace('.', '', $new);

}, 10, 4);

add_action('admin_footer', function () {
?>
<script>
jQuery(document).ready(function($){

    $('#prefix-price').on('input', function(){

        let value = $(this).val().replace(/\D/g,'');

        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

        $(this).val(value);
    });

});
</script>
<?php
});
add_action('admin_footer', function () {
    global $post, $pagenow;

    $is_property_edit = in_array($pagenow, ['post.php', 'post-new.php'], true)
        && (
            (isset($post) && $post instanceof WP_Post && $post->post_type === 'property')
            || (isset($_GET['post_type']) && $_GET['post_type'] === 'property')
        );

    if (!$is_property_edit) return;

    $here_key    = HERE_API_KEY;
    $mapbox_key  = MAPBOX_ACCESS_TOKEN;
    $mapbox_style= MAPBOX_STYLE;
    $icon_url    = HERE_ICON_URL;

    $existing_lat = 0;
    $existing_lng = 0;

    if (isset($post) && $post instanceof WP_Post && $post->ID) {
        $saved_lat = get_post_meta($post->ID, 'prefix-lat', true);
        $saved_lng = get_post_meta($post->ID, 'prefix-lng', true);
        if ($saved_lat !== '' && $saved_lng !== '') {
            $existing_lat = (float) $saved_lat;
            $existing_lng = (float) $saved_lng;
        }
    }
    ?>
    <script>
    (function () {
        var HERE_KEY        = <?php echo json_encode($here_key); ?>;
        var MAPBOX_TOKEN    = <?php echo json_encode($mapbox_key); ?>;
        var MAPBOX_STYLE    = <?php echo json_encode($mapbox_style); ?>;
        var ICON_URL        = <?php echo json_encode($icon_url); ?>;
        var EXISTING_LAT    = <?php echo json_encode($existing_lat); ?>;
        var EXISTING_LNG    = <?php echo json_encode($existing_lng); ?>;
        var HAS_EXISTING    = (EXISTING_LAT !== 0 || EXISTING_LNG !== 0);
        var DEFAULT_CENTER  = { lat: 10.7769, lng: 106.7009 };

        var _map = null, _marker = null;
        var _mapTimer = null;
        var _sdkLoading = false;

        function $id(id) { return document.getElementById(id); }

        // ---- Load Mapbox GL JS (chỉ dùng để VẼ bản đồ) ----
        function _loadMapboxSdk(cb) {
            if (typeof mapboxgl !== 'undefined') { cb(); return; }
            if (_sdkLoading) { setTimeout(function () { _loadMapboxSdk(cb); }, 300); return; }
            _sdkLoading = true;

            var link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = 'https://api.mapbox.com/mapbox-gl-js/v3.6.0/mapbox-gl.css';
            document.head.appendChild(link);

            var s = document.createElement('script');
            s.src = 'https://api.mapbox.com/mapbox-gl-js/v3.6.0/mapbox-gl.js';
            s.defer = false;
            s.onload = cb;
            s.onerror = function () { console.error('[Mapbox admin] Load SDK thất bại'); };
            document.head.appendChild(s);
        }

        function _savePos(lat, lng) {
            var latInp = $id('prefix-lat'), lngInp = $id('prefix-lng');
            if (latInp) latInp.value = parseFloat(lat).toFixed(7);
            if (lngInp) lngInp.value = parseFloat(lng).toFixed(7);
        }

        function _revGeo(lat, lng) {
            fetch(
                'https://revgeocode.search.hereapi.com/v1/revgeocode'
                + '?at=' + parseFloat(lat).toFixed(6) + ',' + parseFloat(lng).toFixed(6)
                + '&lang=vi&apikey=' + HERE_KEY
            )
            .then(function (r) { return r.json(); })
            .then(function (d) {
                if (!d.items || !d.items.length) return;
                var addr = d.items[0].address.label;
                var si  = $id('dt-admin-map-search');
                var det = $id('prefix-address');
                if (si)  si.value  = addr;
                if (det) det.value = addr;
            })
            .catch(function () {});
        }

        function _goTo(lat, lng, label) {
            if (!_map || !_marker) {
                setTimeout(function () { _goTo(lat, lng, label); }, 400);
                return;
            }
            var lngLat = [parseFloat(lng), parseFloat(lat)];
            _map.flyTo({ center: lngLat, zoom: 17 });
            _marker.setLngLat(lngLat);
            _savePos(lat, lng);

            var si  = $id('dt-admin-map-search');
            var det = $id('prefix-address');
            if (si)  si.value  = label;
            if (det) det.value = label;

            var sg = $id('dt-admin-map-suggest');
            if (sg) sg.style.display = 'none';
        }

        function _createMap() {
            var el = $id('dt-admin-map');
            if (!el || _map) return;
            if (typeof mapboxgl === 'undefined') { setTimeout(_createMap, 300); return; }

            mapboxgl.accessToken = MAPBOX_TOKEN;

            var center = HAS_EXISTING
                ? [EXISTING_LNG, EXISTING_LAT]
                : [DEFAULT_CENTER.lng, DEFAULT_CENTER.lat];

            _map = new mapboxgl.Map({
                container: el,
                style: MAPBOX_STYLE,
                center: center,
                zoom: HAS_EXISTING ? 17 : 13
            });

            _map.addControl(new mapboxgl.NavigationControl(), 'top-right');
            var markerEl = document.createElement('div');
            markerEl.style.width = '32px';
            markerEl.style.height = '32px';
            markerEl.style.backgroundImage = 'url(' + ICON_URL + ')';
            markerEl.style.backgroundSize = 'contain';
            markerEl.style.backgroundRepeat = 'no-repeat';
            markerEl.style.cursor = 'pointer';

            _marker = new mapboxgl.Marker({ element: markerEl, draggable: true, anchor: 'bottom' })
                .setLngLat(center)
                .addTo(_map);

            if (HAS_EXISTING) _savePos(EXISTING_LAT, EXISTING_LNG);

            _marker.on('dragend', function () {
                var pos = _marker.getLngLat();
                _savePos(pos.lat, pos.lng);
                _revGeo(pos.lat, pos.lng);
            });

            _map.on('click', function (e) {
                var coord = e.lngLat;
                _marker.setLngLat(coord);
                _savePos(coord.lat, coord.lng);
                _revGeo(coord.lat, coord.lng);
            });

            _map.resize();
        }

        function _initAutocomplete() {
            var si = $id('dt-admin-map-search');
            var sg = $id('dt-admin-map-suggest');
            if (!si || !sg) return;

            si.addEventListener('input', function () {
                clearTimeout(_mapTimer);
                var q = this.value.trim();
                if (q.length < 2) { sg.style.display = 'none'; return; }

                _mapTimer = setTimeout(function () {
                    fetch(
                        'https://autocomplete.search.hereapi.com/v1/autocomplete'
                        + '?q=' + encodeURIComponent(q)
                        + '&in=countryCode:VNM&lang=vi&limit=7'
                        + '&apikey=' + HERE_KEY
                    )
                    .then(function (r) { return r.json(); })
                    .then(function (res) {
                        sg.innerHTML = '';
                        if (!res.items || !res.items.length) { sg.style.display = 'none'; return; }

                        res.items.forEach(function (item) {
                            var d = document.createElement('div');
                            d.textContent = item.address.label;
                            d.style.cssText = 'padding:9px 12px;cursor:pointer;border-bottom:1px solid #f0f0f0;font-size:13px;line-height:1.4;';
                            d.addEventListener('mouseover', function () { d.style.background = '#f5f5f5'; });
                            d.addEventListener('mouseout',  function () { d.style.background = ''; });

                            d.addEventListener('mousedown', function (e) {
                                e.preventDefault();
                                si.value = item.address.label;
                                sg.style.display = 'none';

                                fetch(
                                    'https://lookup.search.hereapi.com/v1/lookup'
                                    + '?id=' + encodeURIComponent(item.id)
                                    + '&lang=vi&apikey=' + HERE_KEY
                                )
                                .then(function (r) { return r.json(); })
                                .then(function (detail) {
                                    var pos = detail.position || (item.position || null);
                                    if (pos) _goTo(pos.lat, pos.lng, item.address.label);
                                })
                                .catch(function () {
                                    if (item.position) _goTo(item.position.lat, item.position.lng, item.address.label);
                                });
                            });

                            sg.appendChild(d);
                        });
                        sg.style.display = 'block';
                    })
                    .catch(function () {});
                }, 350);
            });

            si.addEventListener('blur', function () {
                setTimeout(function () { sg.style.display = 'none'; }, 200);
            });

            si.addEventListener('keydown', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    var first = sg.querySelector('div');
                    if (first) first.dispatchEvent(new MouseEvent('mousedown', { bubbles: true }));
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            if (!$id('dt-admin-map')) return;
            _loadMapboxSdk(function () {
                _createMap();
                _initAutocomplete();
            });
        });
    })();
    </script>
    <?php
});

// Register du an
function property_developer() {

    $labels = array(
        'name'                       => _x( 'Dự án', 'Taxonomy General Name', 'html5blank' ),
        'singular_name'              => _x( 'Dự án', 'Taxonomy Singular Name', 'html5blank' ),
        'menu_name'                  => __( 'Dự án', 'html5blank' ),
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
        'slug'                       => 'du-an',
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
    register_taxonomy( 'property_developer', array( 'property' ), $args );

}
add_action( 'init', 'property_developer', 0 );
////////////////////////////////



?>