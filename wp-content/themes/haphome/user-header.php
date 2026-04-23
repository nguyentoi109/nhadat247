<div class="user flexbox">
    <a href="<?php echo home_url('tinh-lai-suat-vay'); ?>" class="link"><span class="ti-bar-chart-alt"></span>Tính lãi
        suất &nbsp;| </a>
    <?php if ( is_user_logged_in() ){
                      $current_user = wp_get_current_user();
                      $current_user->user_login;
                      $userid = $current_user->ID;
                    ?>
    <!--<a class="add-property" href="<?php// echo home_url('quy-dinh-dang-tin'); ?>">Quy định đăng tin</a> | -->
    <a class="add-property" href="<?php echo home_url('dang-tin'); ?>" style="font-weight: 400"><span
            class="icon-plus">+</span> Đăng tin &nbsp;|</a>
    <div class="info-user flexbox">
        <span class="avata"><?php echo get_avatar($userid, 50, $gavatar); ?></span>
        <!--<span class="username"><?php// echo get_the_author_meta('nickname', $userid); ?></span>-->
        <ul class="list-info-user">
            <?php
                    if(wp_is_mobile()){ ?>
            <li><a class="" href="<?php echo home_url('dang-tin'); ?>"><span class="icon-plus"
                        style="font-size: 2rem">+</span>&nbsp;&nbsp;Đăng tin </a></li>
            <?php } ?>
            <li><a class="all-post" href="<?php echo home_url('quan-ly-tin'); ?>/"><span class="ti-menu-alt"></span>
                    Quản lý tin</a></li>
            <li><a class="edit-user"
                    href="<?php echo home_url(); ?>/chuyen-vien/<?php echo get_the_author_meta('user_login', $userid) ?>"><span
                        class="ti-pencil-alt"></span> Sửa thông tin</a></li>
            <li><a class="logout" href="<?php echo wp_logout_url( get_permalink() ); ?>"><span class="ti-unlock"></span>
                    Đăng xuất</a></li>
        </ul>
    </div>
    <?php }else{ ?>
    <a href="#" class="login"><span class="ti-lock"></span> Đăng nhập</a>
    <?php get_template_part('popup-login'); ?>
    <?php } ?>
</div>