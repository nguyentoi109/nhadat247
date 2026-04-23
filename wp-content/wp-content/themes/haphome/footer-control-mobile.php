<section class="control-mobile">
	<a href="javascript:;" class="mobile-menu"><span class="mdi mdi-menu"></span><span class="txt">Menu</span></a>
	<div href="javascript:;" class="account">
		<span class="btn-click">&nbsp;</span>
		<span class="mdi mdi-login-variant"></span><span class="txt">Đăng nhập</span>
		<?php wp_login_form(); ?> 
	</div>
	<a href="javascript:;" class="add-property search-property"><span class="mdi mdi-magnify"></span><span class="txt">Tìm kiếm</span></a>
	<a href="https://datnenbinhduong.net/tinh-lai-suat-vay-ngan-hang" class=""><span class="mdi mdi-finance"></span><span class="txt">Tính lãi</span></a>
	<div href="javascript:;" class="news">
		<span class="mdi mdi-card-text-outline"></span><span class="txt">Tin tức</span>
		<ul class="list-news-cat"> 
			<?php wp_list_categories('title_li='); ?> 
		</ul>
	</div>
</section>