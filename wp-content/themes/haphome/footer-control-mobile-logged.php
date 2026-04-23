<section class="control-mobile">
	<a href="javascript:;" class="mobile-menu"><span class="mdi mdi-menu"></span><span class="txt">Menu</span></a>
	<div href="javascript:;" class="account">
		<span class="btn-click">&nbsp;</span>
		<span class="mdi mdi-account-outline"></span><span class="txt">Tài khoản</span>
		<ul class="list-info-user">
			<li><a class="all-post" href="<?php echo home_url('quan-ly-tin-dang'); ?>/"><span class="mdi mdi-format-list-bulleted"></span> Quản lý tin</a></li>
			<li><a class="edit-user" href="<?php echo home_url(); ?>/author/<?php echo get_the_author_meta('user_login', $userid) ?>"><span class="mdi mdi-square-edit-outline"></span> Sửa thông tin</a></li>
			<li><a  class="logout" href="<?php echo wp_logout_url( get_permalink() ); ?>"><span class="mdi mdi-login-variant"></span> Đăng xuất</a></li>
		</ul> 
	</div>
	<a href="<?php echo home_url('dang-tin'); ?>" class="add-property"><span class="mdi mdi-home-plus"></span><span class="txt">Đăng tin</span></a>
	<a href="https://datnenbinhduong.net/tinh-lai-suat-vay-ngan-hang" class=""><span class="mdi mdi-finance"></span><span class="txt">Tính lãi</span></a>
	<div href="javascript:;" class="news">
		<span class="mdi mdi-card-text-outline"></span><span class="txt">Tin tức</span>
		<ul class="list-news-cat"> 
			<?php wp_list_categories('title_li='); ?> 
		</ul>
	</div>
</section>