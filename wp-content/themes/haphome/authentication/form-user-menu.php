<style> 
.popup-user-menu{
    position:fixed;
    top:70px;
    left: auto !important;
    right:110px;
    width:300px;
    background:#fff;
    border-radius:8px;
    box-shadow:0 10px 30px rgba(0,0,0,.15);
    opacity:0;
    visibility:hidden;
    transform:translateY(10px);
    transition:.25s;
    z-index:999;
}

.popup-user-menu.show{
    opacity:1;
    visibility:visible;
    transform:translateY(0);
}

.section-user-menu{
    padding:0;

}

.user-header{
    display:flex;
    align-items:center;
    gap:12px;

    padding:20px;
    border-bottom:1px solid #eee;
}

.user-avatar-big{
    width:48px;
    height:48px;
    border-radius:50%;
    background:#e03c31;
    color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:22px;
    font-weight:600;
    flex-shrink:0;
}

.user-info{
    flex:1;
}

.user-name{
    font-family: "Lexend";
    font-size:16px;
    font-weight:500;
    color:#2c2c2c;
    letter-spacing: -0.2px;
    line-height:22px;
}

.user-phone{
    font-family: "Roboto";
    font-size:13px;
    color:#999;
    margin-top:2px;
}

.user-menu-list{
    margin:0;
    padding:8px 0;
    list-style:none;
}

.user-menu-item{
    margin:0;
}

.user-menu-link{
    display:flex;
    align-items:center;
    gap:14px;
    height:35px;
    padding:4px 16px;
    text-decoration:none;
    color:#2c2c2c;
    transition:.2s;
}

.user-menu-link:hover{
    background:#f5f5f5;
}

.user-menu-icon{
    width:20px;
    height:20px;
    object-fit:contain;
    flex-shrink:0;
}

.user-menu-text{
    font-family: "Roboto";
    color: #2c2c2c;
    display:flex;
    align-items:center;
    height:20px;
    font-size:14px;
    line-height:20px;
}

.menu-divider{
    border-bottom: 1px solid #f2f2f2;
    margin-top: 8px;
    margin-bottom: 8px;
    line-height: 0px;
}
</style>
<section class="section-user-menu">

    <?php $user = get_current_custom_user(); ?>
    <div class="user-header">
        <div class="user-avatar-big">
            <?php echo esc_html(get_current_custom_avatar()); ?>
        </div>
        <div class="user-info">
        <div class="user-name">
            <?php echo esc_html($user->full_name); ?>
        </div>

        <div class="user-phone">
            <?php echo esc_html($user->phone ?? ''); ?>
        </div>
    </div>
    </div>

    <ul class="user-menu-list">

        <li class="user-menu-item">
            <a href="#" class="user-menu-link">
                <img class="user-menu-icon" src="<?php echo get_template_directory_uri(); ?>/img/overview.png">
                <span class="user-menu-text">Tổng quan</span>
            </a>
        </li>

        <li class="user-menu-item">
            <a href="#" class="user-menu-link">
                <img class="user-menu-icon" src="<?php echo get_template_directory_uri(); ?>/img/list.png">
                <span class="user-menu-text">Quản lý tin đăng</span>
            </a>
        </li>

        <li class="user-menu-item">
            <a href="#" class="user-menu-link">
                <img class="user-menu-icon" src="<?php echo get_template_directory_uri(); ?>/img/heart.png">
                <span class="user-menu-text">Tin đã lưu</span>
            </a>
        </li>

        <li class="user-menu-item">
            <a href="#" class="user-menu-link">
                <img class="user-menu-icon" src="<?php echo get_template_directory_uri(); ?>/img/contact.png">
                <span class="user-menu-text">Quản lý khách hàng</span>
            </a>
        </li>

        <li class="user-menu-item">
            <a href="#" class="user-menu-link">
                <img class="user-menu-icon" src="<?php echo get_template_directory_uri(); ?>/img/premium.png">
                <span class="user-menu-text">Gói VIP</span>
            </a>
        </li>

        <li class="user-menu-item">
            <a href="#" class="user-menu-link">
                <img class="user-menu-icon" src="<?php echo get_template_directory_uri(); ?>/img/wallet.png">
                <span class="user-menu-text">Nạp tiền</span>
            </a>
        </li>

        <li class="menu-divider"></li>

        <li class="user-menu-item">
            <a href="#" class="user-menu-link">
                <img class="user-menu-icon" src="<?php echo get_template_directory_uri(); ?>/img/settings.png">
                <span class="user-menu-text">Cài đặt tài khoản</span>
            </a>
        </li>

        <li class="menu-divider"></li>

        <?php if (!empty($_SESSION['custom_user_id'])) : ?>
            <li class="user-menu-item">
                <a href="<?php echo home_url('/?custom_logout=1'); ?>" class="user-menu-link">
                    <img class="user-menu-icon"
                        src="<?php echo get_template_directory_uri(); ?>/img/logout.png"
                        alt="Đăng xuất">
                    <span class="user-menu-text">Đăng xuất</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</section>