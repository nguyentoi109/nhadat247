<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<style>
.link-login,
.link-register {
    background: transparent;
    border: none;
    color: #fff;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all .3s;
}

.link-login:hover,
.link-register:hover {
    background: rgba(255,255,255,.15);
}

.link-post {
    background: transparent;
    border: 1.5px solid #ccc;
    color: #fff;
    padding: 9px 16px;
    border-radius: 4px;
    font-weight: 600;
    text-decoration: none;
    transition: all .3s;
}

.link-post:hover {
    color: #2c2c2c;
    background: #fafafa;
    border: solid 1px #ccc;
}

.re-line {
    width: 1px;
    height: 16px;
    background: #e5e5e5;
}

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
        gap:10px;
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
        right: -2px;
        width: 60px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        font-weight: 700;
        cursor: pointer;
        color: #FFF;
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

    /* .header-right{
        display:none !important;
    } */

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

    /* .mobile-extra-link{
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
    } */
}

.hdr-icon-wrap {
    position: relative;
    display: flex; align-items: center;
}

.hdr-icon-btn {
    padding: 0 5px;
    position: relative;
    width: 38px; height: 38px;
    border-radius: 50%;
    border: none; background: transparent;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    color: #fff;
    transition: background .2s;
}
.hdr-icon-btn:hover   { background: rgba(255,255,255,.15); }
.hdr-icon-btn.active  { background: rgba(255,255,255,.2); }

.hdr-icon-badge {
    position: absolute;
    top: 0; right: 0;
    min-width: 17px; height: 17px;
    background: #ee0033; color: #fff;
    font-size: 10px; font-weight: 800;
    border-radius: 20px; padding: 0 4px;
    display: flex; align-items: center; justify-content: center;
    border: 2px solid transparent;
    line-height: 1;
    pointer-events: none;
}

.header .hdr-icon-btn svg { stroke: #fff; }
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
<!-- <script>
window.addEventListener("load", function(){

    document.getElementById("loading-page").style.opacity = "0";
    document.getElementById("loading-page").style.visibility = "hidden";

});
</script> -->

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
                    <?php 
                        $custom_user    = get_current_custom_user();
                        $custom_user_id = $custom_user ? (int) $custom_user->id : 0;
                        $fav_count      = $custom_user_id ? count_favorites($custom_user_id) : 0;
                    ?>

                    <div class="hdr-icon-wrap" id="fav-icon-wrap">
                        <button class="hdr-icon-btn" id="fav-icon-btn"
                                onclick="hdToggle('fav')" aria-label="Tin đã lưu">
                            <img src="<?php echo get_template_directory_uri() ?>/img/heart.png" width="20">
                            <?php if ($fav_count > 0): ?>
                            <span class="hdr-icon-badge fav-count-badge"><?php echo esc_html($fav_count); ?></span>
                            <?php endif; ?>
                        </button>
                        <?php get_template_part('authentication/popup-favorites'); ?>
                    </div>

                    <div class="hdr-icon-wrap" id="notif-icon-wrap">
                        <button class="hdr-icon-btn" id="notif-icon-btn"
                                onclick="hdToggle('notif')" aria-label="Thông báo">
                            <img src="<?php echo get_template_directory_uri() ?>/img/notification.png" width="20">
                        </button>
                        <?php get_template_part('authentication/popup-notifications'); ?>
                    </div>
                    
                    <?php if (!empty($_SESSION['custom_user_id'])): ?>
                    <div class="custom-user-box">
                        <div class="custom-avatar user-avatar-btn">
                            <?php echo custom_get_avatar_html( $custom_user ); ?>
                        </div>
                    </div>

                    <?php else: ?>
                    <a href="javascript:void(0)" class="link link-login login">Đăng nhập</a>
                    <span class="re-line"></span>
                    <a href="javascript:void(0)" class="link link-register open-register-popup">Đăng ký</a>
                    <?php endif; ?>

                    <a href="<?php echo esc_url(home_url('/dang-tin/')); ?>" class="link link-post">Đăng tin</a>
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
                    <!-- <a href="<?php echo home_url('tinh-lai-suat-vay'); ?>" class="mobile-extra-link">
                        <span class="ti-bar-chart-alt"></span>
                        Tính lãi suất
                    </a>
                    <a href="<?php echo home_url('chuyen-doi-dia-chi'); ?>" class="mobile-extra-link">
                        <span class="ti-location-pin"></span>
                        Chuyển đổi địa chỉ
                    </a>
                </div> -->
            </nav>
            <!-- /nav -->
         </section> 
        <!--End Main menu-->

<div class="user">
    <?php get_template_part('authentication/popup-login'); ?>
</div>

<div class="register">
    <?php get_template_part('authentication/popup-register'); ?>
</div>

<div class="register-otp">
    <?php get_template_part('authentication/popup-register-otp'); ?>
</div>

<div class="register-password">
    <?php get_template_part('authentication/popup-password'); ?>
</div>

<div class="forgot-password">
    <?php get_template_part('authentication/popup-forgot-password'); ?>
</div>

<div class="reset-password">
    <?php get_template_part('authentication/popup-reset-password'); ?>
</div>

<div class="user-menu">
    <?php get_template_part('authentication/popup-user-menu'); ?>
</div>

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

<script>
(function () {
    var panels = {
        fav   : { btn: 'fav-icon-btn',    popup: 'fav-popup',    overlay: 'fav-popup-overlay' },
        notif : { btn: 'notif-icon-btn',  popup: 'notif-popup',  overlay: 'notif-popup-overlay' },
    };

    function closeAll() {
        Object.values(panels).forEach(function (p) {
            var btn     = document.getElementById(p.btn);
            var popup   = document.getElementById(p.popup);
            var overlay = document.getElementById(p.overlay);
            if (btn)     btn.classList.remove('active');
            if (popup)   popup.classList.remove('show');
            if (overlay) overlay.classList.remove('show');
        });
    }

    window.hdToggle = function (key) {
        var p       = panels[key];
        var popup   = document.getElementById(p.popup);
        var overlay = document.getElementById(p.overlay);
        var btn     = document.getElementById(p.btn);
        if (!popup) return;
        var isOpen = popup.classList.contains('show');
        closeAll();

        if (!isOpen) {
            popup.classList.add('show');
            if (overlay) overlay.classList.add('show');
            if (btn) btn.classList.add('active');
        }
    };

    document.addEventListener('click', function (e) {
        ['fav-popup-overlay','notif-popup-overlay'].forEach(function (id) {
            if (e.target && e.target.id === id) closeAll();
        });
    });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeAll();
    });

    window.favRemoveFromPopup = function (btn, e) {
        e.preventDefault(); e.stopPropagation();
        var postId = parseInt(btn.dataset.post, 10);
        if (!window.BDS_FAV && !window.FAV) return;
        var cfg = window.BDS_FAV || window.FAV;

        var fd = new FormData();
        fd.append('action',  'bds_toggle_favorite');
        fd.append('post_id', postId);
        fd.append('_nonce',  cfg.nonce || cfg.nonce);

        fetch(cfg.ajaxUrl || cfg.ajax_url, { method: 'POST', body: fd })
            .then(function (r) { return r.json(); })
            .then(function (res) {
                if (res.success) {
                    var item = btn.closest('.fav-popup-item');
                    if (item) {
                        item.style.transition = 'opacity .25s';
                        item.style.opacity = '0';
                        setTimeout(function () { item.remove(); }, 270);
                    }
                    var badge = document.querySelector('.fav-count-badge');
                    if (badge && res.data.count !== undefined) {
                        badge.textContent = res.data.count;
                        badge.style.display = res.data.count > 0 ? 'flex' : 'none';
                    }
                    document.querySelectorAll('.bds-save-btn[data-post="' + postId + '"]')
                        .forEach(function (b) {
                            b.classList.remove('is-saved');
                            b.dataset.saved = '0';
                        });
                }
            });
    };

    window.notifSwitchTab = function (key) {
        document.querySelectorAll('.notif-tab').forEach(function (t) {
            t.classList.toggle('active', t.dataset.tab === key);
        });
        document.querySelectorAll('.notif-item').forEach(function (item) {
            var t = item.dataset.tabType;
            if (key === 'all') {
                item.classList.remove('hidden');
            } else if (key === 'other') {
                var known = ['tin_dang','tai_chinh','khuyen_mai'];
                item.classList.toggle('hidden', known.indexOf(t) !== -1);
            } else {
                item.classList.toggle('hidden', t !== key);
            }
        });
    };

    window.notifFilterUnread = function (onlyUnread) {
        document.querySelectorAll('.notif-item').forEach(function (item) {
            if (onlyUnread && !item.classList.contains('unread')) {
                item.classList.add('hidden');
            } else {
                var activeTab = document.querySelector('.notif-tab.active');
                var key = activeTab ? activeTab.dataset.tab : 'all';
                notifSwitchTab(key);
            }
        });
    };
    window.notifRead = function (item) {
        var notifId = item.dataset.id;
        var link    = item.dataset.link;

        if (item.classList.contains('unread')) {
            item.classList.remove('unread');
            item.querySelector('.notif-item-dot')?.classList.remove('active');
            var badge = document.querySelector('.notif-unread-badge');

            if (badge) {
                var cur = parseInt(badge.textContent, 10) - 1;
                badge.textContent = cur;
                if (cur <= 0) badge.style.display = 'none';
            }
            if (notifId) {
                var fd = new FormData();
                fd.append('action',    'bds_mark_notif_read');
                fd.append('notif_id',  notifId);
                fd.append('_nonce',    '<?php echo wp_create_nonce("notif_nonce"); ?>');
                fetch('<?php echo esc_js(admin_url("admin-ajax.php")); ?>', { method:'POST', body:fd });
            }
        }

        if (link) window.location.href = link;
    };

    window.notifMarkAll = function () {
        document.querySelectorAll('.notif-item.unread').forEach(function (item) {
            item.classList.remove('unread');
            item.querySelector('.notif-item-dot')?.classList.remove('active');
        });
        var badge = document.querySelector('.notif-unread-badge');
        if (badge) badge.style.display = 'none';

        var fd = new FormData();
        fd.append('action', 'bds_mark_all_notif_read');
        fd.append('_nonce', '<?php echo wp_create_nonce("notif_nonce"); ?>');
        fetch('<?php echo esc_js(admin_url("admin-ajax.php")); ?>', { method:'POST', body:fd });
    };
})();
</script>
