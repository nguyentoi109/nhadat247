<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta name="theme-color" content="#D70018" />
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
    <link rel="apple-touch-icon" sizes="57x57"
        href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60"
        href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72"
        href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76"
        href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
        href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="<?php echo get_template_directory_uri(); ?>/img/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon-16x16.png">

    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#D70018">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">

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

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-TCL71CWQZ1');
    </script>


    <?php wp_head(); ?>

    <link rel='stylesheet' id='main-css'  href="<?php echo get_template_directory_uri() ?>/css/pannellum.css" media='all' />


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
                    <a href="<?php echo home_url(); ?>"><img
                            src="<?php echo get_template_directory_uri() ?>/img/logo.jpg" alt="HAP-HOME"></a>
                </h1>
                <?php }else{ ?>
                <div class="logo">
                    <a href="<?php echo home_url(); ?>"><img
                            src="<?php echo get_template_directory_uri() ?>/img/logo.jpg" alt="HAP-HOME"></a>
                </div>
                <?php } ?>
                <!-- /logo -->
                
                <a href="<?php echo home_url('tinh-lai-suat-vay'); ?>" class="link link-featured"><span class="ti-bar-chart-alt"></span> <?php echo wp_is_mobile() ?  'Tính lãi' : 'Tính lãi suất' ?>  </a>
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