<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta name="theme-color" content="#005387"/>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/img/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-16x16.png">

    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="DC.title" content="HAP HOME" />
    <meta name="geo.region" content="VN-SG" />
    <meta name="geo.placename" content="Viet Nam" />
    <meta name="geo.position" content="13.290403;108.426511" />
    <meta name="ICBM" content="13.290403, 108.426511" />
    <meta name="author" content="HAP HOME">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TCL71CWQZ1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-TCL71CWQZ1');
    </script>


		<?php wp_head(); ?>

		
	</head>
	<body id="container" <?php body_class(); ?>>
		<!-- wrapper -->
		<section class="wrapper">
		
		  <!--Banner Top-->
		  <?php 
        if( wp_is_mobile() ){
          get_template_part('banner/banner-top-mobile');
        }else{
          get_template_part('banner/banner-top');
        }
        ?>
		  <!--End Banner Top-->
		  
			<!-- header -->
			<header class="header clear" role="banner">
				<div class="container clear flexbox">
				  <div class="hotline flexbox">
				    <span class="num">0909.81.89.11</span>
				  </div>
					<!-- logo -->
					 <?php if( is_front_page() ){ ?>
           <h1 class="logo">
             <!--<a href="<?php// echo home_url(); ?>">HAP-HOME</a>-->
             <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/logo.jpg" alt="HAP-HOME"></a>
           </h1>
           <?php }else{ ?>
           <div class="logo">
             <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/logo.jpg" alt="HAP-HOME"></a>
           </div>
           <?php } ?>
					<!-- /logo -->
					<div class="user flexbox">
					  <?php if ( is_user_logged_in() ){
							$current_user = wp_get_current_user();
							$current_user->user_login;
							$userid = $current_user->ID;
						?>	
							<!--<a class="add-property" href="<?php// echo home_url('quy-dinh-dang-tin'); ?>">Quy định đăng tin</a> | -->
							<a class="add-property" href="<?php echo home_url('dang-tin'); ?>" style="font-weight: 400"><span class="icon-plus">+</span> Đăng tin &nbsp;|</a>
					  		<div class="info-user flexbox">
								<span class="avata"><?php echo get_avatar($userid, 50, $gavatar); ?></span> <!--<span class="username"><?php// echo get_the_author_meta('nickname', $userid); ?></span>-->
								<ul class="list-info-user">
								  <?php
                    if(wp_is_mobile()){ ?>
                      <li><a class="" href="<?php echo home_url('dang-tin'); ?>" ><span class="icon-plus" style="font-size: 2rem">+</span>&nbsp;&nbsp;Đăng tin </a></li>
                  <?php } ?>
									<li><a class="all-post" href="<?php echo home_url('quan-ly-tin'); ?>/"><span class="ti-menu-alt"></span> Quản lý tin</a></li>
									<li><a class="edit-user" href="<?php echo home_url(); ?>/chuyen-vien/<?php echo get_the_author_meta('user_login', $userid) ?>"><span class="ti-pencil-alt"></span> Sửa thông tin</a></li>
									<li><a  class="logout" href="<?php echo wp_logout_url( get_permalink() ); ?>"><span class="ti-unlock"></span> Đăng xuất</a></li>
								</ul> 
							</div>							
						<?php }else{ ?>
							<a href="#" class="login"><span class="ti-lock"></span> Đăng nhập</a>
							<?php get_template_part('popup-login'); ?>
						<?php } ?>
					</div>
				</div>
				<span class="mobile-menu"><span class="ti-menu"></span></span>
			</header>
			<!-- /header -->
			
     <!--Main menu-->
      <section class="wrap-nav">
        <span class="mobile-menu-close">&times;</span>
				<!-- nav -->
				<nav class="nav container" role="navigation">
					<?php html5blank_nav(); ?>
				</nav>
				<!-- /nav -->
			</section>
     <!--End Main menu-->