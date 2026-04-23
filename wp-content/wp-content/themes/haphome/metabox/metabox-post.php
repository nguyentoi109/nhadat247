<?php
function post_meta_box( $meta_boxes ) {
	$prefix = 'prefix-';

	$meta_boxes[] = array(
		'id' => 'post_meta_box',
		'title' => esc_html__( 'Thuộc tính bài viết', 'html5blank' ),
		'post_types' => array('post' ),
		'context' => 'normal',
		'priority' => 'default',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'recommend',
				'type' => 'checkbox',
				'name' => esc_html__( 'Tin tức Hot', 'html5blank' ),
				'desc' => esc_html__( 'Chọn làm tin tức Hot', 'html5blank' ),
				'placeholder' => esc_html__( 'Tin Hot', 'html5blank' ),
			)
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'post_meta_box' );
