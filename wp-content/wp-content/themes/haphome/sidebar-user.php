<!-- sidebar -->
<?php	
	$user_id    = get_current_user_id();
	$author_vnkings = get_user_by( 'slug', get_query_var( 'author_name' ) );
	$author_id = $author_vnkings->ID;
?>
<aside class="sidebar" role="complementary">
	<?php
	$gavatar = get_the_author_meta('user_email');	 
	if ( wp_is_mobile() ) {
		
	}else{ ?>
		<section class="info-user">
			<div class="thumb-full">
				<a href="" class="thumb thumb-1x1"><?php echo get_avatar($user_id, 300); ?></a>
			</div>
			<?php if($user_id == $author_id) {?>
			<a class="change-avatar" href="https://en.gravatar.com/gravatars/new/computer">
				<span>Đổi ảnh</span>
				<p class="hint">
					Click vào đây và đăng nhập/đăng ký theo email <strong><?php $vnkings_email = the_author_meta( 'user_email', $user_id ); ?></strong> này
				</p>
			</a>
			<?php } ?>
			<div class="content-inf">
				<p><strong>Họ tên: <?php $vnkings_name = the_author_meta( 'nickname', $user_id ); if(isset($vnkings_name)){echo $vnkings_name;} ?> </strong></p>
				<p><strong><span class="mdi mdi-email-outline"></span>:</strong> <a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php $vnkings_email = the_author_meta( 'user_email', $user_id ); ?>" title="<?php $vnkings_email = the_author_meta( 'user_email', $user_id ); ?>"><?php $vnkings_email = the_author_meta( 'user_email', $user_id ); ?></a> </p>
				<p><strong><span class="mdi mdi-cellphone-basic"></span>:</strong> <?php $vnkings_phone= the_author_meta( 'phone', $user_id ); ?> </p>
				<p><strong><span class="mdi mdi-map-marker-outline"></span>:</strong> <?php $vnkings_address= the_author_meta( 'address', $user_id ); ?> </p>
				<?php if($user_id == $author_id) {?>
				<p><a class="edit-user" href="<?php echo home_url(); ?>/chuyen-vien/<?php echo get_the_author_meta('user_login', $user_id) ?>"><span class="mdi mdi-square-edit-outline"></span> Sửa thông tin</a></p>
				<?php } ?>
			</div>
		</section>
	<?php } ?>

	<div class="sidebar-widget">
		<?php //if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-sidebar')) ?>
	</div>

</aside>
<!-- /sidebar -->

