<?php
add_action( 'wp_ajax_loadpost', 'loadpost_init' );
add_action( 'wp_ajax_nopriv_loadpost', 'loadpost_init' );
function loadpost_init() {
 
    ob_start(); //bắt đầu bộ nhớ đệm
 
	$current_time = current_time('mysql');
	wp_update_post(
		array (
			'ID'            => $_POST['post_id'],
			'post_date'     => $current_time,
			//'post_date_gmt' => get_gmt_from_date($current_time)
		)
	);
	wp_reset_postdata();
    $result = ob_get_clean(); //cho hết bộ nhớ đệm vào biến $result
 
    wp_send_json_success($result); // trả về giá trị dạng json
 
    die();//bắt buộc phải có khi kết thúc
}
?>
