<?php 
/* Template Name: Đăng tin */ 
get_header();

?>
<!-- section -->

<section class="container post-page">
	<main role="main" class="clear">
		<!-- article -->
		<article>
<?php if(is_user_logged_in()) { 
	
$idvnkings = addslashes( $_GET[ 'id' ] );
$post_tags = wp_get_post_tags( $idvnkings );

$current_user = wp_get_current_user();
$userid = $current_user->ID;
$curpost = get_post( $idvnkings );
$userlevel = $current_user->user_level;
$vnstatus2 = get_post_status( $idvnkings );
//if($vnkings <= 2) { $vnstatus = "pending"; } else { $vnstatus = "publish"; }

//has permission?
$lovenduser = $curpost->post_author;
if ( $userid == $lovenduser || $userlevel > 2 ) {
	?>
	<?php
	if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && !empty( $_POST[ 'add_new_post' ] ) && current_user_can( 'level_0' ) && isset( $_POST[ 'post_nonce_field' ] ) && wp_verify_nonce( $_POST[ 'post_nonce_field' ], 'post_nonce' ) ) {
		if ( isset( $_POST[ 'property_title' ] ) ) {
			$property_title = $_POST[ 'property_title' ];
		}
		if ( isset( $_POST[ 'post_content' ] ) ) {
			$post_content = $_POST[ 'post_content' ];
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
			$parent_location = get_term($_POST['parent_location']);
		}
		if (isset($_POST['child_location'])) {
			$child_location = get_term($_POST['child_location']);
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
			'ID' => $idvnkings,
			'post_title'    => wp_strip_all_tags($property_title),
			'post_content'  => $post_content,
			'post_status'   => 'publish',
			'post_type' => 'property',
		);
		$lovendpost_id_edit = wp_insert_post( $post );
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
		wp_set_object_terms( $happost, $parent_location->name, 'property_location', false );
		wp_set_object_terms( $happost, $child_location->name, 'property_location', false );			

		if ( $_FILES[ 'file' ][ 'name' ] == "" ) {
			
		} else {
			foreach ( $_FILES as $file => $array ) {
				$newupload = insert_attachment( $file, $lovendpost_id_edit );
			}
		}
		echo '<div class="alert alert-success"><strong>Sửa bài Thành Công!</strong> <a href="' . get_permalink( $idvnkings ) . '"> Xem tin!</a></div>';
	}
	?>	
			<form id="new_post" class="form-post" method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label for="property_title">
						<span class="text">Tiêu đề Bất động sản</span>
						<input maxlength="80" type="text" name="property_title" id="property_title" placeholder="Tiêu đề" value="<?php echo get_the_title($idvnkings) ;?>">
					</label>
				</div>
				<div class="form-group form-4">
					<label for="price" class="input-price">
            <?php
              $price = get_post_meta( $idvnkings, 'prefix-price', true);
              $unit = get_post_meta( $idvnkings, 'prefix-unit', true);
            ?>
						<span class="text">Giá (VNĐ)</span>
						<input type="text" name="price" class="form-control" placeholder="Giá BĐS" value="<?php echo $price; ?>">
						<div class="select-style wrap-unit">
						  <select name="unit" id="unit">
						    <option <?php echo $unit == '' ? ' selected' : ''?> value="">Đơn vị</option>
						    <option <?php echo $unit == 'trieu' ? ' selected' : ''?> value="trieu">Triệu</option>
						    <option <?php echo $unit == 'ty' ? ' selected' : ''?> value="ty">Tỷ</option>
						  </select>
						</div>
					</label>
					<label for="area">
					  <?php
							$area = get_post_meta( $idvnkings, 'prefix-area', true);
						?>
						<span class="text">Diện tích (m<sup>2</sup>)</span>
						<input type="text" name="area" class="form-control" placeholder="Nhập diện tích" value="<?php echo $area; ?>">
					</label>
					<label for="property_status">
					  <?php
              $terms = get_the_terms( $idvnkings, 'property_status' );
              foreach($terms as $term) {
                $selected = $term->term_id;
              }
            ?>
						<span>Loại tin</span>
						<?php
								wp_dropdown_categories( array(
								'taxonomy' => 'property_status',
								'hide_empty' => false,
								'id'         => 'property_status',
								'class'      => 'form-control',
								'name' =>      'property_status',
								'selected'   => $selected
									) );
							?>
					</label>
					<label for="property_type">
					  <?php
              $terms = get_the_terms( $idvnkings, 'property_type' );
              foreach($terms as $term) {
                $selected = $term->term_id;
              }
            ?>
						<span class="text">Loại BĐS</span>
						<?php
						  wp_dropdown_categories( array(
								'taxonomy' => 'property_type',
								'hide_empty' => false,
								'id'         => 'property_type',
								'class'      => 'form-control',
								'name' =>      'property_type',
								'selected'   => $selected
									) );
						?>
					</label>
				</div>
				<div class="form-group form-3 mb0">
					<label for="property_direction">
					  <?php
							$terms = get_the_terms( $idvnkings, 'property_direction' );
							foreach($terms as $term) {
								$selected = $term->term_id;
							}
						?>
						<span>Hướng</span>
						<?php
							  wp_dropdown_categories( array(
									'taxonomy' => 'property_direction',
									'hide_empty' => false,
									'id'         => 'property_direction',
									'class'      => 'form-control',
									'name' =>      'property_direction',
									'selected'   => $selected
										) );
							?>
					</label>
					<?php
            echo do_shortcode("[ajax-dropdown]");
            //get_template_part('location/location_2');
          ?>
				</div>
				
				
				<div class="form-group">
					<label for="address">
					  <?php
              $address = get_post_meta( $idvnkings, 'prefix-address', true);
            ?>
						<span class="text">Địa chỉ BĐS</span>
						<input type="text" name="address" class="form-control" placeholder="Địa chỉ bất động sản" value="<?php echo $address; ?>">
					</label>
				</div>
				
				<div class="form-group">
					<label for="video">
					  <?php
              $video = get_post_meta( $idvnkings, 'prefix-video', true);
            ?>
						<span class="text">Video BĐS</span>
						<input type="text" name="video" class="form-control" placeholder="Nhập đường dẫn Youtube vào đây" value="<?php echo $video; ?>">
					</label>
				</div>
				
				<div class="form-group">
					<label for="description">
					  <?php
              $post = get_post( $idvnkings, OBJECT, 'edit' );
              $content = $post->post_content;
            ?>
						<span class="text">Mô tả Bất động sản</span>
						<textarea name="post_content" id="post_content" cols="30" rows="10"><?php echo $content; ?></textarea>
					</label>
				</div>
				
				<div class="form-group">
					<span class="text">Hình ảnh BĐS</span>
					<?php
            $feat_image = wp_get_attachment_url( get_post_thumbnail_id($idvnkings) );
          ?>
					<div class="wrap-img">
							<img style="max-width:300px; display:block;" id="output_avatar" src="<?php echo $feat_image;?>"/>
						</div>
						<script>
							var loadFile = function (event) {
								var output = document.getElementById( 'output_avatar' );
								output.src = URL.createObjectURL( event.target.files[ 0 ] );
								$( '#output_avatar' ).addClass( 'active-avatar' );
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
            <?php
              $name_custom = get_post_meta( $idvnkings, 'prefix-name-custom', true);
              $phone_custom = get_post_meta( $idvnkings, 'prefix-phone-custom', true);
              $email_custom = get_post_meta( $idvnkings, 'prefix-email-custom', true);
            ?>
            <label for="name_custom">
              <span class="text">Họ tên</span>
              <input type="text" name="name_custom" class="form-control" placeholder="Nhập Họ tên" value="<?php echo $name_custom; ?>">
            </label>
            <label for="phone_custom">
              <span class="text">Điện thoại</span>
              <input type="text" name="phone_custom" class="form-control" placeholder="Nhập Số điện thoại" value="<?php echo $phone_custom; ?>">
            </label>
            <label for="email_custom">
              <span class="text">Email</span>
              <input type="text" name="email_custom" class="form-control" placeholder="Nhập địa chỉ Email" value="<?php echo $email_custom; ?>">
            </label>
          </div>
				</fieldset>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Cập nhật</button>
				</div>
			</form>
			<?php } }else { ?>
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
