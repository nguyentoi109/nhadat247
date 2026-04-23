<?php
/* Template Name: Sửa tin */
get_header();
?>

	<!-- section -->

	<section class="container detail-page">
		<main role="main">
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
		if (isset ($_POST['area'])) {
			$area = $_POST['area'];
		}
		if (isset ($_POST['address'])) {
			$address = $_POST['address'];
		}
		if (isset ($_POST['video'])) {
			$video = $_POST['video'];
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
		update_post_meta( $happost, 'prefix-area', $area);
		update_post_meta( $happost, 'prefix-address', $address);
		update_post_meta( $happost, 'prefix-video', $video);
		
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
		echo '<div class="alert alert-success"><strong>Sửa bài Thành Công!</strong> <a href="' . get_permalink( $idvnkings ) . '"> Xem Bài!</a></div>';
	}
	?>				
				<form id="new_post" class="form-post" method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label for="property_title">
						<span>Tiêu đề</span>
						<input maxlength="80" type="text" name="property_title" value="<?php echo get_the_title($idvnkings) ;?>" id="property_title" placeholder="Tiêu đề">
					</label>
					
					</div>
					<div class="form-group">
						<label for="description">
						<span>Mô tả</span>						
						<?php
							$post = get_post( $idvnkings, OBJECT, 'edit' );
                    		$content = $post->post_content;
                    		wp_editor( $content, 'userpostcontent', array( 'textarea_name' => 'post_content' ));
						?>
					</label>
					
					</div>
					<div class="form-group form50">
						<label for="price">
							<span>Giá</span>
							<?php
								$price = get_post_meta( $idvnkings, 'prefix-price', true);
							?>
							<input type="text" name="price" value="<?php echo $price; ?>" class="form-control" placeholder="Giá BĐS">
						</label>
					
					<label for="area">
						<?php
							$area = get_post_meta( $idvnkings, 'prefix-area', true);
						?>
						<span>Diện tích (m<sup>2</sup>)</span>
						<input type="text" name="area" value="<?php echo $area; ?>" class="form-control" placeholder="Nhập diện tích">
					</label>
					
					</div>
					<div class="form-group form50">
					<?php
						$terms = get_the_terms( $idvnkings, 'property_status' );
						foreach($terms as $term) {
							$selected = $term->term_id;
						}
					?>
						<label for="property_status">
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
					
					<?php
						$terms = get_the_terms( $idvnkings, 'property_type' );
						foreach($terms as $term) {
							$selected = $term->term_id;
						}
					?>
					<label for="property_type">
						<span>Loại BĐS</span>
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
					<div class="form-group">
						<?php
							$terms = get_the_terms( $idvnkings, 'property_direction' );
							foreach($terms as $term) {
								$selected = $term->term_id;
							}
						?>
						<label for="property_direction">
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
					
					</div>
					<div class="form-group form50">
						<?php echo do_shortcode("[ajax-dropdown]"); ?>
					</div>

					<div class="form-group">
						<label for="address">
							<span>Địa chỉ BĐS</span>
							<?php
								$address = get_post_meta( $idvnkings, 'prefix-address', true);
							?>
							<input type="text" name="address" value="<?php echo $address; ?>" class="form-control" placeholder="Địa chỉ bất động sản">
						</label>
					
					</div>

					<div class="form-group">
						<label for="address">
							<span>Video BĐS</span>
							<?php
								$video = get_post_meta( $idvnkings, 'prefix-video', true);
							?>
							<input type="text" name="video" value="<?php echo $video; ?>" class="form-control" placeholder="Nhập đường dẫn Youtube vào đây">
						</label>
					
					</div>

					<div class="form-group">
						<span>Hình ảnh BĐS</span>
						<?php
							$feat_image = wp_get_attachment_url( get_post_thumbnail_id($idvnkings) );
						?>
						<div class="wrap-img">
							<img style="max-width:300px; display:block;" id="output_avatar" src="<?php echo $feat_image;?>"/>
						</div>
						<script>
							var loadFile = function ( event ) {
								var output = document.getElementById( 'output_avatar' );
								output.src = URL.createObjectURL( event.target.files[ 0 ] );
								$( '#output_avatar' ).addClass( 'active-avatar' );
							};
						</script>
						<div class="input-file">
							<span class="mdi mdi-image"></span>
							<input class="" accept="image/*" name="file" type="file" class="file" onchange="loadFile(event)">
						</div>
					</div>
					<input type="hidden" name="add_new_post" value="post"/>
					<?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Lưu tin</button>
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
		<?php get_sidebar('user'); ?>
	</section>
	<!-- /section -->

	<?php get_footer(); ?>