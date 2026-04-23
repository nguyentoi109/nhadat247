<!-- sidebar -->
<?php	
	$user_id    = get_current_user_id();
	$author_vnkings = get_user_by( 'slug', get_query_var( 'author_name' ) );
	$author_id = $author_vnkings->ID;
?>
<aside class="sidebar" role="complementary">
	<?php
	$gavatar = get_the_author_meta('user_email');	 
	$hapcoin = get_the_author_meta('hapcoin');	 
	if ( !wp_is_mobile() ) { ?>
		<section class="info-user clear">
			<div class="thumb-full">
				<a href="" class="thumb thumb-1x1"><?php echo get_avatar($user_id, 300); ?></a>
			</div>
			
			<ul class="menu-user">
			  <li><a href="javascript:;" style="pointer-events: none;"><span class="ti-server"></span> HAPCoin: <?php if( !empty($hapcoin) ){echo '<strong>'.$hapcoin.'</strong>'; }else{ echo '0';} ?></a></li>
			  <li><a href="<?php echo home_url('quan-ly-tin'); ?>" title="Quản lý tin"><span class="ti-menu-alt"></span> Quản lý tin</a></li>
			  <li><a href="<?php echo home_url(); ?>/chuyen-vien/<?php echo get_the_author_meta('user_login', $userid) ?>" title="Sửa thông tin"><span class="ti-pencil-alt"></span> Sửa thông tin</a></li>
			  <li><a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Đăng xuất"><span class="ti-unlock"></span> Đăng xuất</a></li>
			</ul>
		</section>
	<?php } ?>

</aside>
<!-- /sidebar -->

