<?php 
/* Template Name: Đăng tin */ 
get_header();

?>
<!-- section -->

<section class="container post-page">
	<main role="main" class="clear">
		<!-- article -->
		<article>
<?php
if(is_user_logged_in()) {
$user_id = get_current_user_id();
$current_user = wp_get_current_user();
$user_level =  $current_user->user_level;
if($user_level <= 2) { $hapstatus = "pending"; } else { $hapstatus = "publish"; }
$hapcoin = get_the_author_meta('hapcoin');	
if(!empty($hapcoin) && $hapcoin > 0){
?>
			<form id="new_post" class="form-post" method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label for="property_title">
						<span class="text">Tiêu đề Bất động sản</span>
						<input maxlength="80" type="text" name="property_title" id="property_title" placeholder="Tiêu đề">
						<p class="error"><?php// echo $message; ?></p>
					</label>
				</div>
				<div class="form-group form-4">
					<label for="price" class="input-price">
						<span class="text">Giá (VNĐ)</span>
						<input type="text" name="price" class="form-control" placeholder="Giá BĐS">
						<div class="select-style wrap-unit">
						  <select name="unit" id="unit">
						    <option value="">Đơn vị</option>
						    <option value="trieu">Triệu</option>
						    <option value="ty">Tỷ</option>
						  </select>
						</div>
					</label>
					<label for="area">
						<span class="text">Diện tích (m<sup>2</sup>)</span>
						<input type="text" name="area" class="form-control" placeholder="Nhập diện tích">
					</label>
					<label for="property_status">
						<span>Loại tin</span>
						<?php
						  wp_dropdown_categories( 'name=property_status&selected=-1&hierarchical=3&depth=1&hide_empty=0&taxonomy=property_status&show_option_none=---Chọn loại tin---');
						?>
					</label>
					<label for="property_type">
						<span class="text">Loại BĐS</span>
						<?php
						  wp_dropdown_categories( 'name=property_type&selected=-1&hierarchical=3&depth=1&hide_empty=0&taxonomy=property_type&show_option_none=---Chọn loại BĐS---');
						?>
					</label>
				</div>
				<div class="form-group form-3 mb0">
					<label for="property_direction">
						<span>Hướng</span>
						<?php
						  wp_dropdown_categories( 'name=property_direction&selected=-1&hierarchical=3&depth=1&hide_empty=0&taxonomy=property_direction&show_option_none=---Chọn hướng---');
						?>
					</label>
					<?php
            echo do_shortcode("[ajax-dropdown]");
            //get_template_part('location/location_2');
          ?>
					
				</div>
				
				
				<div class="form-group">
					<label for="address">
						<span class="text">Địa chỉ BĐS</span>
						<input type="text" name="address" class="form-control" placeholder="Địa chỉ bất động sản">
					</label>
				</div>
				
				<div class="form-group">
					<label for="video">
						<span class="text">Video BĐS</span>
						<input type="text" name="video" class="form-control" placeholder="Nhập đường dẫn Youtube vào đây">
					</label>
				</div>
				
				<div class="form-group">
					<label for="description">
						<span class="text">Mô tả Bất động sản</span>
						<textarea name="post_content" id="post_content" cols="30" rows="10"></textarea>
					</label>
				</div>
				<div class="form-group">
					<span class="text">Hình ảnh BĐS</span>
					<div class="wrap-img"><img id="output_avatar"/></div>
					<script>
					  var loadFile = function(event) {
						var output = document.getElementById('output_avatar');
						output.src = URL.createObjectURL(event.target.files[0]);
						 $('#output_avatar').addClass('active-avatar');
					  };
					</script>
					
					<div class="input-file">
						<span class="ti-image"></span>						
						<input class="" accept="image/*" name="file" type="file" class="file" onchange="loadFile(event)">
					</div>
					
				</div>
				<input type="hidden" name="add_new_post" value="post" />
				<?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
				
				<fieldset>
          <legend>Thông tin liên hệ:</legend>
				  <div class="form-group form-3">
            <label for="name_custom">
              <span class="text">Họ tên</span>
              <input type="text" name="name_custom" class="form-control" placeholder="Nhập Họ tên">
            </label>
            <label for="phone_custom">
              <span class="text">Điện thoại</span>
              <input type="text" name="phone_custom" class="form-control" placeholder="Nhập Số điện thoại">
            </label>
            <label for="email_custom">
              <span class="text">Email</span>
              <input type="text" name="email_custom" class="form-control" placeholder="Nhập địa chỉ Email">
            </label>
          </div>
				</fieldset>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Đăng Bài</button>
				</div>
			</form>
			
<?php 
	if( $_SERVER['REQUEST_METHOD'] == 'POST' && !empty( $_POST['add_new_post'] ) && current_user_can('level_0') && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' )) {
		
		if (isset($_POST['property_title'])) {
			$property_title = $_POST['property_title'];
		}
		if (isset($_POST['post_content'])) {
			$post_content = $_POST['post_content'];
			$search = ['<h1', '</h1>'];
			$replace   = ['<h2', '</h2>'];
			$post_content_after = str_replace($search, $replace, $post_content);

		}
		if (isset ($_POST['price'])) {
			$price = $_POST['price'];
		}
		if (isset ($_POST['unit'])) {
			$unit = $_POST['unit'];
		}
		if (isset ($_POST['area'])) {
			$area = $_POST['area'];
		}
		if (isset ($_POST['address'])) {
			$address = $_POST['address'];
		}
		if (isset ($_POST['video'])) {
			$video = $_POST['video'];
		}
		if (isset ($_POST['name_custom'])) {
			$name_custom = $_POST['name_custom'];
		}
		if (isset ($_POST['phone_custom'])) {
			$phone_custom = $_POST['phone_custom'];
		}
		if (isset ($_POST['email_custom'])) {
			$email_custom = $_POST['email_custom'];
		}
		if (isset($_POST['parent_location'])) {
			$property_location = get_term($_POST['parent_location']);
		}
		if (isset($_POST['child_location'])) {
			$property_location = get_term($_POST['child_location']);
		}
		if (isset($_POST['property_status'])) {
			$property_status = get_term($_POST['property_status']); 
		}
		if (isset($_POST['property_type'])) {
			$property_type = get_term($_POST['property_type']); 
		}
		if (isset($_POST['property_direction'])) {
			$property_direction = get_term($_POST['property_direction']); 
		}
		$post = array(
			'post_title'    => wp_strip_all_tags($property_title),
			'post_content'  => $post_content_after,
			'post_status'   => $hapstatus,
			'post_type' => 'property',
		);
		$happost = wp_insert_post($post);
		update_post_meta( $happost, 'prefix-price', $price);
		update_post_meta( $happost, 'prefix-unit', $unit);
		update_post_meta( $happost, 'prefix-area', $area);
		update_post_meta( $happost, 'prefix-address', $address);
		update_post_meta( $happost, 'prefix-video', $video);
		update_post_meta( $happost, 'prefix-name-custom', $name_custom);
		update_post_meta( $happost, 'prefix-phone-custom', $phone_custom);
		update_post_meta( $happost, 'prefix-email-custom', $email_custom);
		
		wp_set_object_terms( $happost, $property_status->name, 'property_status', false );
		wp_set_object_terms( $happost, $property_type->name, 'property_type', false );
		wp_set_object_terms( $happost, $property_direction->name, 'property_direction', false );
		//wp_set_object_terms( $happost, $parent_location->name, 'property_location', false );
		wp_set_object_terms( $happost, $property_location->name, 'property_location', false );
    
    update_user_meta( $current_user->ID, 'hapcoin', $hapcoin-1 );

		if ($_FILES) {
			foreach ($_FILES as $file => $array) {
			$newupload = insert_attachment($file,$happost);
			}
		}?>
			<?php if($user_level <= 2){?>
		<div class="alert alert-success">
			<strong>Bạn đã đăng bài thành công!</strong>
			<p style="color: #fff;text-align: center;">Tin của bạn sẽ được ban quản lý duyệt trong vòng 24h</p>
			<a href="<?php echo home_url('quan-ly-tin'); ?>">Trở về danh sách tin đăng</a>
		</div>
		<?php }else{ ?>
			<div class="alert alert-success">
				<strong>Bạn đã đăng bài thành công!</strong>
				<a href="<?php echo home_url('quan-ly-tin'); ?>">Trở về danh sách tin đăng</a>
			</div>
		<?php 
       } } }else{
    ?>
    <p>Bạn đã hết <strong>HAPCoin</strong>, vui lòng nạp <strong>HAPCoin</strong> để có thể đăng tin</p>
    <?php
    }
    ?>
  
			<?php } else { ?>
			<div class="formdangnhap clear">
				<?php wp_login_form(); ?>         
			</div>
			<?php } ?>
			
		</article>
		
		<!-- /article -->
	</main>
</section>
<!-- /section -->

<?php get_footer(); ?>
