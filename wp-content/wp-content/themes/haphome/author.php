<?php get_header(); 

	$user_id    = get_current_user_id();
	$author_vnkings = get_user_by( 'slug', get_query_var( 'author_name' ) );
	$author_id = $author_vnkings->ID;
if($user_id == $author_id) { ?>

<!-- section -->
<section class="container detail-page width-sidebar user-page sidebar-left">
	<main role="main">

<?php            
	if( isset( $_POST['user_profile_nonce_field'] ) && wp_verify_nonce( $_POST['user_profile_nonce_field'], 'user_profile_nonce' ) ) {
	if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
		if ( $_POST['pass1'] == $_POST['pass2'] )
			wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
		else
		 echo   $error[] = __('Mật khẩu chưa khớp', 'profile');
	}
	/* Update thông tin user. */
	if ( !empty( $_POST['user_url'] ) ){
		wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['user_url'] ) ) );
	}
	if ( !empty( $_POST['nickname'] ) ) {
	update_user_meta( $current_user->ID, 'nickname', esc_attr( $_POST['nickname'] ) ); }
	if ( !empty( $_POST['user_login'] ) ) {
	update_user_meta( $current_user->ID, 'user_login', esc_attr( $_POST['user_login'] ) ); }
	if ( !empty( $_POST['address'] ) ) {
	update_user_meta( $current_user->ID, 'address', esc_attr( $_POST['address'] ) ); }
	if ( !empty( $_POST['phone'] ) ) {
	update_user_meta( $current_user->ID, 'phone', esc_attr( $_POST['phone'] ) ); }
	if ( !empty( $_POST['facebook'] ) ) {
	update_user_meta( $current_user->ID, 'facebook', esc_attr( $_POST['facebook'] ) ); }
	if ( !empty( $_POST['zalo'] ) ) {
	update_user_meta( $current_user->ID, 'zalo', esc_attr( $_POST['zalo'] ) ); }
	if ( !empty( $_POST['viber'] ) ) {
	update_user_meta( $current_user->ID, 'viber', esc_attr( $_POST['viber'] ) ); }
	if ( !empty( $_POST['description'] ) ){
	update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) ); }
    $current_url = home_url('chuyen-vien/');
    $user_name = get_the_author_meta( 'user_login', wp_get_current_user()->ID );
	echo '<div class="alert alert-success" style="text-align:center;"><strong style="display:block;">Bạn đã sửa thông tin cá nhân thành công!</strong><a href="'.$current_url.''.$user_name.'">Tải lại trang</a></div>';
}
?>
<h2 class="title-block">Sửa thông tin </h2>
<?php if($user_id == $author_id) {?>
<a class="change-avatar" href="https://en.gravatar.com/gravatars/new/computer" target="_blank">
  <span>Đổi ảnh đại diện</span>
  <p class="hint">
    Click vào đây và đăng nhập/đăng ký theo email <strong><?php $vnkings_email = the_author_meta( 'user_email', $user_id ); ?></strong> này
  </p>
</a>
<?php } ?>
<form role="form" action="" id="user_profile" method="POST">
	<?php wp_nonce_field('user_profile_nonce', 'user_profile_nonce_field'); ?>
	<div class="form-group form50">
		<label for="nickname">
			<span>Họ Tên</span>
			<input type="text" class="form-control" id="nickname" name="nickname" placeholder="Họ Tên" value="<?php the_author_meta( 'nickname', $author_id ); ?>">
		</label>
		<label for="user_login">
			<span>Tên đăng nhập</span>
			<input type="text" disabled="disabled" class="form-control" id="user_login" name="user_login" placeholder="Tên đăng nhập của bạn" value="<?php the_author_meta( 'user_login', $author_id ); ?>">
		</label>
	</div>
	<div class="form-group form50">
		<label for="email">
			<span>Email</span>
			<input disabled="disabled" type="email" class="form-control" id="email" name="email" placeholder="Nhập email của bạn" value="<?php the_author_meta( 'user_email', $author_id ); ?>">
		</label>
		<label for="phone">
			<span>Di động</span>
			<input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn" value="<?php the_author_meta( 'phone', $author_id ); ?>">
		</label>
	</div>
	<div class="form-group form30">
		<label for="facebook">
			<span>Facebook</span>
			<input type="text" class="form-control" id="facebook" name="facebook" placeholder="Nhập facebook của bạn" value="<?php the_author_meta( 'facebook', $author_id ); ?>">
		</label>
		<label for="zalo">
			<span>Zalo</span>
			<input type="text" class="form-control" id="zalo" name="zalo" placeholder="Nhập số Zalo của bạn" value="<?php the_author_meta( 'zalo', $author_id ); ?>">
		</label>
		<label for="viber">
			<span>Viber</span>
			<input type="text" class="form-control" id="viber" name="viber" placeholder="Nhập số Viber của bạn" value="<?php the_author_meta( 'viber', $author_id ); ?>">
		</label>
	</div>
	<div class="form-group">
		<label for="address">
			<span>Địa chỉ</span>
			<input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ của bạn" value="<?php the_author_meta( 'address', $author_id ); ?>">
		</label>
	</div>
	<div class="form-group">
		<label for="description">
			<span>Mô tả về bạn</span>
			<textarea class="form-control" name="description" id="description" rows="3" cols="20"><?php the_author_meta( 'description', $author_id ); ?></textarea>
		</label>
	</div>
	<div class="form-group form50">
		<label for="pass1">
			<span>Mật khẩu mới</span>
			<input type="password" class="form-control" id="pass1" name="pass1" placeholder="Password">
		</label>
		<label for="pass2">
			<span>Nhập lại mật khẩu mới</span>
			<input type="password" class="form-control" id="pass2" name="pass2" placeholder="Password">
		</label>
	</div>
	<p><em>Mật khẩu để trống nếu không thay đổi</em></p>
	<div class="form-group"><button type="submit" class="btn btn-success">Cập nhật</button></div>
</form>

	</main>
	<?php get_sidebar('myuser'); ?>

</section>
<!-- /section -->

	<?php } else { ?>
  <section class="container">
    <main role="main" class="full-page">
      <h1 class="title-box-detail">Chuyên viên Tư vấn BĐS: <strong><span class="name"><?php echo get_the_author_meta('nickname', $author_id); ?></span></strong></h1>
			<div class="info-contact width-common flexbox">
			  <div class="avata-user">
          <?php $gavatar = get_the_author_meta('email', $author_id); ?>
			    <a href="" class="thumb thumb-1x1"><?php echo get_avatar($gavatar, 300); ?></a>
			  </div>
			  <div class="info-user">
          <p><strong><span class="ti-email"></span>:&nbsp;</strong> <a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo get_the_author_meta('email', $author_id); ?>" title="<?php echo get_the_author_meta('email', $author_id); ?>"><?php echo get_the_author_meta('email', $author_id); ?></a> </p>
          <p><strong><span class="ti-mobile"></span>:&nbsp;</strong> <?php echo get_the_author_meta('phone', $author_id); ?> </p>
          <p><strong><span class="ti-direction"></span>:&nbsp;</strong> <?php echo get_the_author_meta('address', $author_id); ?> </p>
			  </div>
			</div>
			<h2 class="title-box-detail">Tin của: <span class="name"><?php echo get_the_author_meta('nickname', $author_id); ?></span></h2>
			<div class="list-style list-all">
			  <?php get_template_part('user-property'); ?>
			</div>
    </main>
  </section>
  <?php } ?>

<?php get_footer(); ?>
