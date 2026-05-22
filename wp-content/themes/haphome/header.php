<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<style>

@media (max-width: 1024px){

    .header .container{
        display:block !important;
    }

    .header-left{
        display:block !important;
    }

    .nav.mobile-nav{
        display:block !important;
    }
}


/* DESKTOP */
@media (min-width: 1025px) {

    .wrap-nav{
        display:none;
    }

    .header .container{
        max-width:100%;
        width:100%;
        display:flex;
        align-items:center;
        justify-content:space-between;
    }

    .header-left{
        display:flex;
        align-items:center;
        gap:30px;
        flex:1;
    }

    .logo{
        flex:0 0 auto;
    }

    .nav.mobile-nav{
        display:block;
        flex:1;
    }

    .header-right{
        display:flex;
        align-items:center;
        gap:15px;
    }

    .mobile-menu,
    .mobile-menu-close,
    .submenu-toggle{
        display:none !important;
    }

    .sub-menu{
        max-height:none !important;
        overflow:visible !important;
    }
}

@media (max-width: 1024px) {
    .mobile-nav .menu-item {
        position: relative;
        border-bottom: 1px solid #eee;
    }

    .mobile-nav .menu-item > a {
        display: block;
        padding: 14px 45px 14px 16px;
        color: var(--text);
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        text-align: left;
    }

        .main-menu > li:hover > a{
        color: var(--text);
        }

    #menu-item-1872 > a{
        color: #debe20;
        text-align: center;
        font-family: 'Lexend', Roboto, Arial !important;
        font-size: 18px;
        line-height: 20px;
        font-weight: normal;
    }

    .mobile-nav .submenu-toggle {
        position: absolute;
        top: 0;
        right: 0;
        width: 44px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        font-weight: 700;
        cursor: pointer;
        color: #333;
    }

    .mobile-nav .sub-menu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        background: #f8f8f8;
    }

    .mobile-nav .sub-menu li a {
        padding-left: 28px;
        font-size: 13px;
        font-weight: 500;
        text-align: left;
        background: var(--sub-menu-lv1-background);
    }

    .mobile-nav .sub-menu .sub-menu li a {
        padding-left: 42px;
        font-size: 14px;
        text-align: left;
        background: var(--sub-menu-lv2-background);
    }

    .mobile-nav .menu-item.active   > a {
        color: var(--menu-text-selected);
    }
}

/* MOBILE */
@media (min-width: 1025px) {
    .mobile-menu, .mobile-menu-close, .submenu-toggle {
        display: none !important;
    }
    .sub-menu {
        max-height: none !important;
        overflow: visible !important;
    }
    .submenu-toggle{
        position:absolute;
        top:0;
        right:0;
        width:44px;
        height:8px;
        display:flex;
        align-items:center;
        justify-content:center;
        cursor:pointer;
        font-size:14px;
        color:#555;
        transition:0.3s;
    }

    .menu-item.active > .submenu-toggle{
        transform:rotate(180deg);
    }
}

@media (max-width:1024px){  

    .header .container{
        display:flex !important;
        justify-content:center;
    }

    .header-right{
        display:none !important;
    }

    .desktop-nav{
        display:none !important;
    }

    .mobile-menu{
        position:absolute;
        top:20px;
        right:20px;
        z-index:10001;
        display:flex;
        align-items:center;
        justify-content:center;
        width:42px;
        height:42px;
        font-size:24px;
        cursor:pointer;
        color:#fff;
    }

    .wrap-nav{
        position:fixed;
        top:0;
        left:-100%;
        width:320px;
        height:100vh;
        background:#fff;
        z-index:10000;
        overflow-y:auto;
        transition:.35s ease;
        box-shadow:0 0 20px rgba(0,0,0,.2);
    }

    .wrap-nav.active{
        left:0;
    }

    .mobile-menu-close{
        position:absolute;
        top:10px;
        right:15px;
        font-size:34px;
        cursor:pointer;
        z-index:2;
        color:#111;
    }

    .mobile-nav .sub-menu{
        overflow: hidden;
        transition: max-height .3s ease;
    }

    .mobile-nav{
        padding-top:60px;
    }

    .mobile-extra-link{
        display:flex;
        align-items:center;
        gap:10px;
        padding:14px 16px;
        margin-bottom:1px;
        background:#f5f5f5;
        font-size:14px;
        color: #ffa600;
    }

    .mobile-extra-link span{
        font-size:18px;
    }
}
</style>

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


</head>
<script>
window.addEventListener("load", function(){

    document.getElementById("loading-page").style.opacity = "0";
    document.getElementById("loading-page").style.visibility = "hidden";

});
</script>

<body id="container" <?php body_class(); ?>>
    <!-- <div id="loading-page">
        <div class="loader"></div>
    </div> -->
    <!-- wrapper -->
    <section class="wrapper">

        <!--Banner Top-->
        <?php 
        // if( wp_is_mobile() ){
        //   get_template_part('banner/banner-top-mobile');
        // }else{
        //   get_template_part('banner/banner-top');
        // }
        ?>
        <!--End Banner Top-->
        <!-- header -->
        <header class="header clear" role="banner">
            <div class="container clear flexbox">
                <div class="hotline flexbox">
                    <span class="num">0909.81.89.11</span>
                </div>
             
                <div class="header-left">
                    <!-- logo -->
                    <?php if( is_front_page() ){ ?>
                    <h1 class="logo">
                        <!--<a href="<?php// echo home_url(); ?>">HAP-HOME</a>-->
                        <a href="<?php echo home_url(); ?>"><img
                                src="<?php echo get_template_directory_uri() ?>/img/logo_23.png" alt="HAP-HOME"></a>
                    </h1>
                    <?php }else{ ?>
                    <div class="logo">
                        <a href="<?php echo home_url(); ?>"><img
                                src="<?php echo get_template_directory_uri() ?>/img/logo_23.png" alt="HAP-HOME"></a>
                    </div>
                    <?php } ?>
                    <!-- /logo -->
                        
                    <nav class="nav  desktop-nav" role="navigation">
                        <?php html5blank_nav(); ?>
                    </nav>
                </div>
                
               <div class="header-right">
                    <a href="<?php echo home_url('tinh-lai-suat-vay'); ?>" class="link link-featured">
                        <span class="ti-bar-chart-alt"></span> <?php echo wp_is_mobile() ? 'Tính lãi' : 'Tính lãi suất' ?>
                    </a>
                    
                    <a href="<?php echo home_url('chuyen-doi-dia-chi'); ?>" class="link link-featured">
                        <span class="ti-location-pin"></span> <?php echo wp_is_mobile() ? 'Đổi địa chỉ' : 'Chuyển đổi địa chỉ' ?>
                    </a>
                </div>
            </div>
            <span class="mobile-menu"><span class="ti-menu"></span></span>
        </header>
        <!-- /header -->

        <!--Main menu-->
        <section class="wrap-nav">
            <span class="mobile-menu-close">&times;</span>
            <!-- nav -->
            <nav class="nav container mobile-nav" role="navigation">
                    <?php html5blank_nav(); ?>

                    <div class="mobile-extra">
                    <a href="<?php echo home_url('tinh-lai-suat-vay'); ?>" class="mobile-extra-link">
                        <span class="ti-bar-chart-alt"></span>
                        Tính lãi suất
                    </a>
                    <a href="<?php echo home_url('chuyen-doi-dia-chi'); ?>" class="mobile-extra-link">
                        <span class="ti-location-pin"></span>
                        Chuyển đổi địa chỉ
                    </a>
                </div>
            </nav>
            <!-- /nav -->
         </section> 
        <!--End Main menu-->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const mobileMenuBtn = document.querySelector('.mobile-menu');
    const mobileMenu = document.querySelector('.wrap-nav');
    const mobileClose = document.querySelector('.mobile-menu-close');

    mobileMenuBtn.addEventListener('click', function(){
        mobileMenu.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    function closeMenu(){
        mobileMenu.classList.remove('active');
        document.body.style.overflow = '';
    }

    mobileClose.addEventListener('click', closeMenu);

    document.querySelectorAll('.mobile-nav .menu-item-has-children').forEach(function(item){

        if (!item.querySelector('.submenu-toggle')) {
            let toggle = document.createElement('span');
            toggle.className = 'submenu-toggle';
            toggle.innerHTML = '<span class="ti-angle-down"></span>';
            item.appendChild(toggle);
        }
    });

    function updateParentHeight(element, isOpening){
        let parentSubmenu = element.parentElement.closest('.sub-menu');

        if(parentSubmenu){
            if(isOpening){
                parentSubmenu.style.maxHeight = "2000px";

            }else{
                parentSubmenu.style.maxHeight =
                    parentSubmenu.scrollHeight + "px";
            }
            updateParentHeight(parentSubmenu, isOpening);
        }
    }

    document.querySelectorAll('.mobile-nav .submenu-toggle').forEach(function(toggle){
        toggle.addEventListener('click', function(e){
            e.preventDefault();
            e.stopPropagation();

            let parentLi = this.parentElement;
            let submenu = parentLi.querySelector(':scope > .sub-menu');

            if(parentLi.classList.contains('active')){
                parentLi.classList.remove('active');
                submenu.style.maxHeight = null;
                this.innerHTML = '<span class="ti-angle-down"></span>';
                updateParentHeight(submenu, false);

            }else{
                parentLi.classList.add('active');
                submenu.style.maxHeight =
                    submenu.scrollHeight + "px";
                this.innerHTML =
                    '<span class="ti-angle-up"></span>';
                updateParentHeight(submenu, true);
            }
        });
    });
});
</script>