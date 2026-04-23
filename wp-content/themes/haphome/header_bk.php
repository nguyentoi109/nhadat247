<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta name="theme-color" content="#16a085"/>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="DC.title" content="Đất Nền Bình Dương Giá Rẻ, Nhà Đất Bình Dương, Đất Thủ Dầu Một, Đất Thổ Cư" />
		<meta name="geo.region" content="VN-SG" />
		<meta name="geo.placename" content="Đất Nền Bình Dương Giá Rẻ, Nhà Đất Bình Dương, Đất Thủ Dầu Một, Đất Thổ Cư" />
		<meta name="geo.position" content="13.290403;108.426511" />
		<meta name="ICBM" content="13.290403, 108.426511" />
		<meta name="author" content="https://datnenbinhduong.net">
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-137994578-2"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-137994578-2');
		</script>

		<?php wp_head(); ?>
		
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MHJ9WKB');</script>
<!-- End Google Tag Manager -->

		
<!-- Histats.com  (div with counter) --><div id="histats_counter" style="position: absolute;z-index: -99;left: -1000px;bottom: -1000px;"></div>
<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4321647,4,4,130,70,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4321647&101" alt="" border="0"></a></noscript>
<!-- Histats.com  END  -->
		
	</head>
	<body id="container" <?php body_class(); ?>>
		<!-- wrapper -->
		<section class="wrapper">
			<!--Topbar-->
			<section class="topbar">
				<div class="container">
					<?php if ( wp_is_mobile() ){?>
						<a href="<?php echo home_url(); ?>" class="topbar-logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Đất Nền Bình Dương" class="logo-img"></a>
					<?php }?>
					<div class="left">						
						<?php if ( wp_is_mobile() ){?>
							<a class="hotline" href="tel:1900.1900"><span class="mdi mdi-cellphone-basic"></span></a> | 
							<a class="email" href="mailto:datnenbinhduong8@gmail.com"><span class="mdi mdi-email-outline"></span></a>
						<?php }else{ ?>
							<span class="hotline"><span class="mdi mdi-cellphone-basic"></span> 1900.1900</span> | 
							<a class="email" href="mailto:datnenbinhduong8@gmail.com"><span class="mdi mdi-email-outline"></span>  datnenbinhduong8@gmail.com</a>
						<?php }?>
					</div>
					<div class="right">
						<a href="<?php echo home_url('tinh-lai-suat-vay-ngan-hang'); ?>" style="color: #16a085;font-weight: bold"><span class="mdi mdi-finance"></span> Tính lãi suất vay</a> | 
						<?php if ( is_user_logged_in() ){
							$current_user = wp_get_current_user();
							$current_user->user_login;
							$userid = $current_user->ID;
						?>	
							<a class="add-property" href="<?php echo home_url('quy-dinh-dang-tin'); ?>">Quy định đăng tin</a> | 
							<a class="add-property" href="<?php echo home_url('dang-tin-hap-home'); ?>" style="font-weight: 400"><span style="font-size: 2rem; color: #666;position: relative;top:1px;" class="mdi mdi-home-plus"></span> Đăng tin</a> | 
					  		<div class="info-user">
								<span class="avata"><?php echo get_avatar($userid, 50, $gavatar); ?></span> <?php echo get_the_author_meta('nickname', $userid); ?>
								<ul class="list-info-user">
									<li><a class="all-post" href="<?php echo home_url('quan-ly-tin-dang'); ?>/"><span class="mdi mdi-format-list-bulleted"></span> Quản lý tin</a></li>
									<li><a class="edit-user" href="<?php echo home_url(); ?>/author/<?php echo get_the_author_meta('user_login', $userid) ?>"><span class="mdi mdi-square-edit-outline"></span> Sửa thông tin</a></li>
									<li><a  class="logout" href="<?php echo wp_logout_url( get_permalink() ); ?>"><span class="mdi mdi-login-variant"></span> Đăng xuất</a></li>
								</ul> 
							</div>							
						<?php }else{ ?>
							<a href="#" class="login"><span class="mdi mdi-login-variant"></span> Đăng nhập</a>
							<?php wp_login_form(); ?>
							 | <a href="<?php echo wp_lostpassword_url(); ?>" title="Lost Password">Quên mật khẩu</a>
						<?php } ?>
					</div>
					<a href="javascript:;" class="mobile-menu"><span class="mdi mdi-menu"></span></a>
				</div>
			</section>
			<!--End Topbar-->
			<section class="wrap-nav">
				<!-- nav -->
				<nav class="nav container" role="navigation">
					<?php html5blank_nav(); ?>
				</nav>
				<!-- /nav -->
				<a href="javascript:;" class="mobile-menu-close"><span class="mdi mdi-window-close"></span></a>
			</section>
			<!-- header -->
			<header class="header clear" role="banner">
				<div class="container clear">
					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->
					<?php 
						if ( !wp_is_mobile() ){
							$header_banner = rwmb_meta( 'prefix-header-banner' );
							if($header_banner){
					?>
					
					<div class="header-banner open-popup">
						<img src="<?php echo $header_banner; ?>" alt="Thu mua đất Bình Dương giá cao">
					</div>
					<?php } } ?>
				</div>
			</header>
			<!-- /header -->
			
