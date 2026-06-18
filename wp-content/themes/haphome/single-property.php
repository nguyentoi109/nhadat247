<style>

.description.block-detail img {
        text-align: center;
    }

    .description.block-detail p img,
    .description.block-detail figure img {
        display: block;
        margin: auto;

        background: #d9d9d9;
        padding: 2px;

        max-height: 350px;
        width: 100%;
        max-width: 100%;

        object-fit: contain;
        cursor: pointer;
        transition: 0.3s;
    }

    .description.block-detail p img:hover,
    .description.block-detail figure img:hover {
        opacity: 0.85;
    }

    .image-popup {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);

        justify-content: center;
        align-items: center;

        padding: 30px;
        box-sizing: border-box;
    }

    .popup-image-wrapper {
        width: 100%;
        height: 100%;

        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        overflow: hidden;
    }

    .image-popup img {
        max-width: 60%;
        max-height: 60%;

        width: auto;
        height: auto;

        object-fit: contain;
        display: block;
    }

    .close-popup {
        position: absolute;
        top: 15px;
        right: 30px;
        color: #fff;
        font-size: 42px;
        cursor: pointer;
        z-index: 2;
    }

    #gallerys .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .mySwiper {
        margin-top: 3px;
        height: 90px;
        margin-bottom: 10px;
    }
    .mySwiper .swiper-slide {
        opacity: 0.5;
        cursor: pointer;
        height: 90px;
    }
    #gallerys .mySwiper2 img{
        width:100%;
        height:100%;
    }

    .mySwiper .swiper-slide-thumb-active {
        opacity: 1;
    }
    .mySwiper .swiper-slide img {
        width: 100% !important;
        height: 80px !important;
        object-fit: cover !important;
        display: block;
        border-radius: 4px;
    }

    .mobile-floating-bar{
        display:none;
    }

    .white-icon{
        width:18px;
        height:18px;
        object-fit:contain;
        vertical-align:middle;
    }
    .texx-label{
        font-size: 17px;
        vertical-align: middle;
    }

.list-detail-real{
    width:100%;
    margin:20px 0 30px;
    padding:0;
    list-style:none;
    display:flex;
    flex-wrap:wrap;
    border:1px solid #10b981;
    border-right:none;
    border-bottom:1px solid #10b981;
}

.list-detail-real li{
    width:50%;
    box-sizing:border-box;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:10px 15px 10px 5px;
    border-right:1px solid #10b981;
    border-bottom:1px solid #10b981;
}

.list-detail-real li:nth-child(odd){
    padding-right:35px;
}

.list-detail-real li:nth-child(even){
    padding-left:5px;
}

.item-left{
    display:flex;
    align-items:center;
    gap:9px;
}

.item-right{
    text-align:right;
    font-weight:500;
    color:#2c2c2c;
}

.list-detail-real .label{
    font-size:16px;
    font-weight:normal;
    color:#2c2c2c;
    margin:0;
}

.list-detail-real .icon{
    width:20px;
    height:20px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:20px;
    color:#000;
    flex-shrink:0;
}

.all-location{
    margin-bottom: 15px;
    border-bottom: 1px solid #cccccc;
    padding-bottom: 20px;
    margin-top: 10px;
    font-size: 16px;
    font-family: 'Roboto';
    line-height: 20px;
    color: #2c2c2c;
    font-weight: normal;
}

.title-breadcrumb{
    font-size: 16px;
    color: #2c2c2c;
    font-style: italic;
}

.title-breadcrumb a{
    color: var(--title-post);
    font-weight: normal;
    text-decoration: underline;
}

.title-breadcrumb a:hover{
    color:var(--menu-text-selected);
}

@media(max-width:768px){
    .mobile-floating-bar{
            position:fixed;
            left:0;
            right:0;
            bottom:0;
            width:100%;
            background:#fff;

            display:flex;
            align-items:center;
            gap:12px;
            z-index: 9;

            padding:10px 12px;
            box-shadow:0 -2px 10px rgba(0,0,0,0.15);
        }


    .mobile-floating-bar a{
        text-decoration:none;
        box-sizing:border-box;
    }

    .mobile-floating-bar .avatar-btn{
        width:64px;
        height:64px;
        min-width:64px;
        border-radius:50%;
        overflow:hidden;
        border:2px solid #0e9aa7;
        display:flex;
        align-items:center;
        justify-content:center;
        background:#fff;
    }

    .mobile-floating-bar .avatar-btn img{
        width:100%;
        height:100%;
        object-fit:cover;
        border-radius:50%;
    }

    .mobile-floating-bar .zalo-btn{
        height:64px;
        width: 25%;
        background:#fff;
        border:1px solid #d9d9d9;
        border-radius:14px;
        display:flex;
        align-items:center;
        justify-content:center;
        gap:10px;
        padding:0 18px;
        color:#111;
        font-size:16px;
        font-weight:700;
        white-space:nowrap;
    }

    .mobile-floating-bar .zalo-btn img{
        width:28px;
        height:28px;
        object-fit:contain;
        flex-shrink:0;
    }

    .mobile-floating-bar .call-btn{
        height:64px;
        background:linear-gradient(180deg,#11b4bd,#069aa3);
        border-radius:14px;
        display:flex;
        align-items:center;
        justify-content:center;
        gap:10px;
        padding:0 18px;
        color:#fff !important;
        font-size:16px;
        font-weight:700;
        white-space:nowrap;
        flex:1.4;
    }
    .infor-bds{
        display: none;
    }
    .infor-con{
        display: none;
    }

    .mobile-floating-bar .phone-icon{
        font-size:22px;
        line-height:1;
        filter:brightness(0) invert(1);
        flex-shrink:0;
    }
    .list-detail-real li{
        width:100%;
    }

    .list-detail-real li:nth-child(odd),
    .list-detail-real li:nth-child(even){
        padding-left:5px;
        padding-right:15px;
    }

    .item-left{
        min-width:140px;
        gap:10px;
    }

    .list-detail-real .label{
        font-size:15px;
    }

    .item-right{
        font-size:14px;
    }
}
</style>
<?php get_header(); ?>

<section class="container detail-page">
    <main role="main">
        <?php 
        if (have_posts()): while (have_posts()) : the_post(); 
        $price = rwmb_meta( 'prefix-price' );
        $unit = rwmb_meta( 'prefix-unit' );
        $area = rwmb_meta( 'prefix-area' );
        $address = rwmb_meta( 'prefix-address' );
        $bathroom = rwmb_meta('prefix-bathroom');
        $bedroom = rwmb_meta('prefix-bedroom');
        $phap_ly = rwmb_meta('prefix-phap-ly');
        $noi_that = rwmb_meta('prefix-noi-that');
        $video = rwmb_meta( 'prefix-video' );
        $id_video = explode('?v=', $video);
        $name_custom = rwmb_meta('prefix-name-custom');
        $phone_custom = rwmb_meta('prefix-phone-custom');
        $email_custom = rwmb_meta('prefix-email-custom');
        $image_360 = rwmb_meta( 'image360', ['size' => 'thumbnail'] );
        $gallerys = rwmb_meta( 'prefix-image_property', ['size' => 'thumbnail'] );
        $has_gallery = !empty($gallerys);
        $maps = rwmb_meta( 'prefix-maps');
    ?>

        <article <?php post_class(); ?> class="detail-content">
        <?php
            if ($has_gallery || has_post_thumbnail() || $video || $maps) :
        ?>
            <div class="header-wrap-tab">
                <?php if($has_gallery || has_post_thumbnail()) : ?>
                <button id="btn-gallerys" class="item-tab" onclick="openTab('gallerys')">Hình ảnh</button>
                <?php endif; ?>
                <?php if($image_360) : ?>
                <button class="item-tab" onclick="openTab('image_360')">Ảnh 360</button>
                <?php endif; ?>
                <?php if($video) : ?>
                <button class="item-tab" onclick="openTab('tab-video')">Video</button>
                <?php endif; ?>
                <?php if($maps) : ?>
                <button class="item-tab" onclick="openTab('tab-maps')">Bản đồ</button>
                <?php endif; ?>
            </div>
        <?php
            endif;
        ?>
            <?php if($image_360){ ?>
            <div id="image_360" class="content-tab" style="position: absolute;opacity: 0;visibility: hidden;">
                <div id="panorama" style="width: 100%; height: 500px;"></div>
            </div>
            <script type='text/javascript' src="<?php echo get_template_directory_uri() ?>/js/pannellum.js"
                id='html5blank-js'></script>
            <script>
            /* pannellum */
            pannellum.viewer('panorama', {
                "type": "equirectangular",
                "panorama": "<?php echo $image_360['full_url']; ?>",
                "autoLoad": true,
                "autoRotate": -2,
                "isOrientationActive": true,
                "startOrientation": true,
                "compass": true,
            });
            /* /pannellum */
            </script>
            <?php } ?>

                <!-- Gallery-- -->
            <div id="gallerys" class="content-tab" style="position: absolute; opacity: 0;">
                <div class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
                                    alt="<?php the_title_attribute(); ?>">
                            </div>
                        <?php endif; ?>

                        <?php if ($has_gallery) : ?>
                            <?php foreach ($gallerys as $gallery) : ?>
                                <div class="swiper-slide">
                                    <img src="<?= esc_url($gallery['full_url']); ?>" alt="">
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>

                <?php if ($has_gallery) : ?>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">

                            <?php if (has_post_thumbnail()) : ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')); ?>"
                                        alt="<?php the_title_attribute(); ?>">
                                </div>
                            <?php endif; ?>

                            <?php foreach ($gallerys as $gallery) : ?>
                                <div class="swiper-slide">
                                    <img src="<?= esc_url($gallery['url']); ?>" alt="">
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <!-- end Gallery-- -->

            <?php if ( $video ) : ?>
                <!-- Video -->
            <div id="tab-video" class="content-tab" style="display: none;">
                <div class="wrap-video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $id_video[1]; ?>"
                        frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
            <!-- end Video -->
            <?php endif; ?>
            
            <?php if ( $maps ) : ?>
                <!-- Maps -->
            <div id="tab-maps" class="content-tab" style="position: absolute;opacity: 0;visibility: hidden; margin-bottom: 10px;">
                <div class="wrap-maps">
                    <?php echo $maps; ?>
                </div>
            </div>
            <!-- end Maps -->
            <?php endif; ?>

            <?php if ($has_gallery) : ?>
                <script>
                var swiper = new Swiper(".mySwiper", {
                    spaceBetween: 10,
                    slidesPerView: 5,
                    freeMode: true,
                    watchSlidesProgress: true,
                });

                var swiper2 = new Swiper(".mySwiper2", {
                    spaceBetween: 10,
                    thumbs: {
                        swiper: swiper,
                    },
                });
                </script>

                <?php else : ?>

                <script>
                new Swiper(".mySwiper2", {
                    spaceBetween: 10,
                });
                </script>
            <?php endif; ?>

            <script>
            function openTab(tabName) {
                var i;
                var x = document.getElementsByClassName("content-tab");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                document.getElementById(tabName).style.display = "block";
                document.getElementById(tabName).style.position = "static";
                document.getElementById(tabName).style.visibility = "visible";
                document.getElementById(tabName).style.opacity = "1";

                const element = document.getElementById("breadcrumbs");
                element.scrollIntoView();
            }
            document.addEventListener("DOMContentLoaded", function () {
                <?php if ($has_gallery || has_post_thumbnail()) : ?>
                openTab('gallerys');
                <?php endif; ?>
            });
            </script>

            <?php
                $delete_post_link = get_delete_post_link( $post->ID, '' );
                if ( ! empty( $delete_post_link ) ) { ?>
            <a style="color: red;" class="master-del" href="<?php echo esc_url( $delete_post_link ); ?>"><i
                    class="ti-trash"></i></a> |
            <?php edit_post_link('<i class="ti-pencil"></i>'); }// Always handy to have Edit Post Links available ?>

            <h1 ><?php the_title(); ?></h1>
            
            <div class="all-location">
                <!-- <span class="icon">
                    <span class="ti-location-pin"></span>
                </span> -->

                <span class="address-inline">
                    <?php echo esc_html($address); ?>
                    <?php
                        $terms = get_the_terms(get_the_ID(), "property_location");
                        if (!empty($terms) && !is_wp_error($terms)) {
                            echo implode(', ', wp_list_pluck($terms, 'name'));
                        }
                    ?>
                </span>
            </div>

             <h2 class="title-box-detail">Thông tin Bất động sản</h2>
                <ul class="list-detail-real">
                    
                    <li>
                        <div class="item-left">
                            <span class="icon">
                                <span class="ti-tag"></span>
                            </span>

                            <span class="label">Giá</span>
                        </div>

                        <div class="item-right">
                            <div class="detail-price" style="color: var(--menu-text-selected);">
                                <span class="num">
                                    <?php
                                        if ($price) {
                                            if ($price >= 1000000000) {
                                                $value = $price / 1000000000;
                                                echo rtrim(rtrim(sprintf('%.10f', $value), '0'), '.');
                                            } elseif ($price >= 1000000) {
                                                $value = $price / 1000000;
                                                echo rtrim(rtrim(sprintf('%.10f', $value), '0'), '.');
                                            } else {
                                                if ($unit == 'trieu' && $price > 1000) {
                                                    $value = $price / 1000;
                                                    echo rtrim(rtrim(sprintf('%.10f', $value), '0'), '.');
                                                } else {
                                                    echo number_format($price, 0, ',', '.');
                                                }
                                            }
                                        }
                                        ?>
                                        </span>
                                        <?php
                                        if ($price) {
                                            if ($price >= 1000000000) {
                                                echo ' tỷ';
                                            } elseif ($price >= 1000000) {
                                                echo ' triệu';
                                            } else {
                                                if ($unit == 'trieu') {
                                                    if ($price > 1000) {
                                                        echo 'tỷ';
                                                    } else {
                                                        echo ' triệu';
                                                    }
                                                } elseif ($unit == 'ty') {
                                                    echo ' tỷ';
                                                } else {
                                                    echo ' đ';
                                                }
                                            }
                                        }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="item-left">
                            <span class="icon">
                                <span class="ti-ruler"></span>
                            </span>

                            <span class="label">Diện tích</span>
                        </div>
                            <div class="item-right">
                                <div class="detail-area" style="color: var(--menu-text-selected);">
                                <?php echo !empty($area) ? $area : '0'; ?> m<sup>2</sup>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="item-left">
                            <span class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/bedroom.png"
                                    alt="Bedroom Icon"
                                    class="white-icon">
                            </span>

                            <span class="label">Phòng ngủ</span>
                        </div>

                        <div class="item-right">
                            <?php
                            $bedroom = get_post_meta($post->ID, 'prefix-bedroom', true);
                            if (!empty($bedroom)) {
                                if ($bedroom == 6) {
                                    echo 'Studio';
                                } elseif ($bedroom == 7) {
                                    echo '1+';
                                } elseif ($bedroom == 8) {
                                    echo '2+';
                                } else {
                                    echo $bedroom ;
                                }
                            } else {
                                echo '---';
                            }
                            ?>
                        </div>
                    </li>

                    <li>
                        <div class="item-left">
                            <span class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/bathroom.png"
                                    alt="Bathroom Icon"
                                    class="white-icon">
                            </span>

                            <span class="label">Nhà vệ sinh, nhà tắm</span>
                        </div>

                        <div class="item-right">
                            <?php
                            $bathroom = get_post_meta($post->ID, 'prefix-bathroom', true);

                            if (!empty($bathroom)) {
                                echo $bathroom;
                            } else {
                                echo '---';
                            }
                            ?>
                        </div>
                    </li>

                    <li>
                        <div class="item-left">
                            <span class="icon">
                                <span class="ti-direction-alt"></span>
                            </span>
                            <span class="label">Hướng</span>
                        </div>
                        <div class="item-right">
                            <?php
                            $terms = get_the_terms(get_the_ID(), "property_direction");

                            echo (!empty($terms) && !is_wp_error($terms))
                                ? implode(', ', wp_list_pluck($terms, 'name'))
                                : '---';
                            ?>
                        </div>
                    </li>

                    <li>
                        <div class="item-left">
                            <span class="icon">
                                <span class="ti-layout-grid2"></span>
                            </span>
                            <span class="label">Loại BĐS</span>
                        </div>
                        <div class="item-right">
                            <?php
                            $terms = get_the_terms(get_the_ID(), "property_type");
                            echo (!empty($terms) && !is_wp_error($terms))
                                ? implode(', ', wp_list_pluck($terms, 'name'))
                                : '---';
                            ?>
                        </div>
                    </li>

                    <li>
                        <div class="item-left">
                            <span class="icon">
                                <span class="ti-files"></span>
                            </span>
                            <span class="label">Giấy tờ pháp lý</span>
                        </div>

                        <div class="item-right">
                            <?php echo !empty($phap_ly) ? esc_html($phap_ly) : '---'; ?>
                        </div>
                    </li>

                    <li>
                        <div class="item-left">
                            <span class="icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/interior-design.png"
                                    alt="Bedroom Icon"
                                    class="white-icon">
                            </span>
                            <span class="label">Nội thất</span>
                        </div>

                        <div class="item-right">
                            <?php echo !empty($noi_that) ? esc_html($noi_that) : '---'; ?>
                        </div>
                    </li>
                </ul>

            <h2 class="title-box-detail">Mô tả</h2>
            <div class="description block-detail">
                <?php the_content(); ?>
            </div>
            <div class="infor-bds">

            <?php if ( $video ) : ?>
            <h2 class="title-box-detail">Video</h2>
            <div class="list-detail-real box-media">
                <div class="wrap-video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $id_video[1]; ?>"
                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
            <?php endif; ?>
            <h2 class="title-breadcrumb">
                Mục:
                <!-- <div class="breadcrumb-all"> -->
                <?php
                $location = get_the_terms(get_the_ID(), 'property_location');
                $status   = get_the_terms(get_the_ID(), 'property_status');
                $type     = get_the_terms(get_the_ID(), 'property_type');
                $location_custom_links = array(
                    'tp-ho-chi-minh'  => 'tp-ho-chi-minh',
                    'binh-duong'      => 'binh-duong',
                    'dong-nai'        => 'dong-nai',
                    'ba-ria-vung-tau' => 'vung-tau',
                );
                $location_url = '';

                if (!empty($location) && !is_wp_error($location)) {
                    $location_slug = $location[0]->slug;
                    $location_url = $location_custom_links[$location_slug] ?? $location_slug;
                    echo '<a href="'.home_url('/'.$location_url).'">'.$location[0]->name.'</a>';
                }

                if (!empty($status) && !is_wp_error($status)) {
                    echo ' <a href="'.home_url('/'.$status[0]->slug.'-'.$location_url).'">'.
                            mb_strtolower($status[0]->name, 'UTF-8').
                        '</a>';
                }

                if (!empty($type) && !is_wp_error($type)) {
                    echo ' <a href="'.home_url('/'.$status[0]->slug.'-'.$type[0]->slug.'-'.$location_url).'">'.
                            mb_strtolower($type[0]->name, 'UTF-8').
                        '</a>';
                }
                ?>
                <!-- </div> -->
            </h2>

            <?php $gavatar = get_the_author_meta('user_email');?>
            <div class="infor-con">
            <h2 class="title-box-detail">Thông tin liên hệ</h2>
            <div class="info-contact width-common flexbox">
                <div class="avata-user">
                    <a href="" class="thumb thumb-1x1"><?php echo get_avatar($gavatar, 300); ?></a>
                </div>
                <div class="info-user">
                    <p><span class="name"><?php if($name_custom){echo $name_custom; }else{echo get_the_author_meta('nickname');} ?></span></p>
                    <p><span class="ti-email"></span>:&nbsp;<a target="_blank"
                            href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php if($email_custom){echo $email_custom;}else{echo get_the_author_meta('user_email');} ?>"
                            title="<?php if($email_custom){echo $email_custom;}else{echo get_the_author_meta('user_email');} ?>"><?php if($email_custom){echo $email_custom;}else{echo get_the_author_meta('user_email');} ?></a>
                    </p>
                    <p><span class="ti-mobile"></span>:&nbsp;
                        <?php if($phone_custom){echo $phone_custom;}else{echo get_the_author_meta('phone');} ?> </p>

                    <p><span class="ti-location-pin"></span>:&nbsp;
                        <?php echo get_the_author_meta('address'); ?> </p>
                </div>
            </div>
            </div>
            
             <!-- <div class="info-contact-fixed width-common flexbox">
                <div class="avata-user">
                    <a href="" class="thumb thumb-1x1"><?php echo get_avatar($gavatar, 300); ?></a>
                </div>
                <div class="info-user">
                    <p><strong>Họ tên: <span
                                class="name"><?php if ($name_custom) {
                                                    echo $name_custom;
                                                } else {
                                                    echo get_the_author_meta('nickname');
                                                } ?></span>
                        </strong></p>
                    <p><strong><span class="ti-email"></span>:&nbsp;</strong> <a target="_blank"
                            href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php if ($email_custom) {
                                                                                    echo $email_custom;
                                                                                } else {
                                                                                    echo get_the_author_meta('user_email');
                                                                                } ?>"
                            title="<?php if ($email_custom) {
                                        echo $email_custom;
                                    } else {
                                        echo get_the_author_meta('user_email');
                                    } ?>"><?php if ($email_custom) {
                                                                                                                                        echo $email_custom;
                                                                                                                                    } else {
                                                                                                                                        echo get_the_author_meta('user_email');
                        } ?></a>
                    </p>
                    <p><strong><span class="ti-mobile"></span>:&nbsp;</strong>
                        <?php if ($phone_custom) {
                            echo $phone_custom;
                        } else {
                            echo get_the_author_meta('phone');
                        } ?> </p>
                </div>        
            <p class="date">
                <span class="ti-calendar"></span> <?php the_time('d/m/Y'); ?> | <?php the_time('G:i'); ?>
                <span class="count-view"><span class="ti-eye"></span>
                    <?php echo count_post_views(get_the_ID()); ?></span>
            </p> -->
            <!--<span class="author"><?php// _e( 'Bởi', 'html5blank' ); ?> <?php// the_author_posts_link(); ?></span>-->
            <!--<button class="view-pic">Xem hình</button>-->
            <?php 
        $p = get_adjacent_post(false, '', true);
        if(!empty($p)) echo '<a class="btn-next-prev-detail prev" href="' . get_permalink($p->ID) . '" title="' . $p->post_title . '"><span class="title">' . $p->post_title . '<span></a>';

        $n = get_adjacent_post(false, '', false);
        if(!empty($n)) echo '<a class="btn-next-prev-detail next" href="' . get_permalink($n->ID) . '" title="' . $n->post_title . '"><span class="title">' . $n->post_title . '</span></a></div>'; 
    ?>
        </article>
        <!-- /article -->
        <?php
                //$delete_post_link = get_delete_post_link( $post->ID, '' );
                //if ( ! empty( $delete_post_link ) ) { ?>
        <!-- <a style="color: red;" class="master-del" href="<?php echo esc_url( $delete_post_link ); ?>"><i
                class="ti-trash"></i></a>  -->
        <?php //edit_post_link('<i class="ti-pencil"></i>'); }// Always handy to have Edit Post Links available ?>
        <?php endwhile; ?>

        <?php else: ?>

        <!-- article -->
        <article>

            <h1><?php _e( 'Chưa có nội dung.', 'html5blank' ); ?></h1>

        </article>
        <!-- /article -->

        <?php endif; ?>

    </main>
    <!-- /section container-->
</section>


<?php get_template_part('related-area'); ?>
<?php get_template_part('related-type'); ?>
<?php get_footer(); ?>
<?php
        $phone = get_the_author_meta('phone');
        $phone_clean = preg_replace('/[^0-9]/', '', $phone);
        ?>

        <div class="mobile-floating-bar">

        <a href="javascript:void(0)" class="avatar-btn">
            <?php echo get_avatar(get_the_author_meta('user_email'), 80); ?>
        </a>

        <a href="https://zalo.me/<?php echo $phone_clean; ?>"
            class="zalo-btn"
            target="_blank">

            <img src="<?php echo get_template_directory_uri(); ?>/img/zalo.jpg" alt="Zalo">

            <span>Zalo</span>
        </a>

        <a href="tel:<?php echo $phone_clean; ?>" class="call-btn">

            <span class="phone-icon">📞</span>

            <span><?php echo $phone; ?></span>

        </a>
</div>