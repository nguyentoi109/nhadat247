<style>
.description.block-detail img{
    text-align:center;
}

/* Chỉ style cho ảnh */
.description.block-detail p img,
.description.block-detail figure img{
    display:block;
    margin:auto;

    background:#d9d9d9;
    padding:2px;

    max-height:350px;
    width:100%;
    max-width:100%;

    object-fit:contain;
    cursor:pointer;
    transition:0.3s;
}

.description.block-detail p img:hover,
.description.block-detail figure img:hover{
    opacity:0.85;
}

/* Popup */
.image-popup{
    display:none;
    position:fixed;
    z-index:99999;
    left:0;
    top:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.9);

    justify-content:center;
    align-items:center;

    padding:30px;
    box-sizing:border-box;
}

.popup-image-wrapper{
    width:100%;
    height:100%;

    display:flex;
    justify-content:center;
    align-items:center;
    border-radius:10px;
    overflow:hidden;
}

.image-popup img{
    max-width:60%;
    max-height:60%;

    width:auto;
    height:auto;

    object-fit:contain;
    display:block;
}

.close-popup{
    position:absolute;
    top:15px;
    right:30px;
    color:#fff;
    font-size:42px;
    cursor:pointer;
    z-index:2;
}
#gallerys .swiper,
#gallerys .swiper-wrapper,
#gallerys .swiper-slide{
    height:auto !important;
}

#gallerys .swiper-slide{
    display:flex;
    justify-content:center;
    align-items:center;
}

#gallerys .swiper-slide img{
    width:100% !important;
    height:auto !important;
    max-height:none !important;
    object-fit:cover !important;
    display:block;
}

/* MOBILE */
@media screen and (max-width:768px){

    .info-contact-fixed{
        position:fixed !important;
        left:0 !important;
        bottom:0 !important;

        width:100% !important;

        display:flex !important;
        align-items:center !important;

        padding:12px !important;

        background:#fff !important;

        box-shadow:0 -2px 12px rgba(0,0,0,0.15) !important;

        z-index:999999999 !important;

        gap:12px !important;

        border-top-left-radius:14px;
        border-top-right-radius:14px;

        visibility:visible !important;
        opacity:1 !important;
    }

    .info-contact-fixed .avata-user{
        flex-shrink:0;
    }

    .info-contact-fixed .avata-user img{
        width:55px !important;
        height:55px !important;

        border-radius:50%;
        object-fit:cover;
    }

    .info-contact-fixed .info-user{
        flex:1;
        overflow:hidden;
    }

    .info-contact-fixed .info-user p{
        margin:2px 0;
        font-size:12px;
        line-height:1.4;

        white-space:nowrap;
        overflow:hidden;
        text-overflow:ellipsis;
    }

    body{
        padding-bottom:120px !important;
    }
}
</style>
<?php get_header(); ?>
<!--breadcrumbs-->

<!--End breadcrumbs-->
<!-- section container-->
<section id="breadcrumbs" class="breadcrumbs">
    <!-- <?php 
		//if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs" class="container">','</p>');} 
	 ?> -->
</section>

<section class="container detail-page">
    <main role="main">
        <?php 
		if (have_posts()): while (have_posts()) : the_post(); 
		$price = rwmb_meta( 'prefix-price' );
		$unit = rwmb_meta( 'prefix-unit' );
		$area = rwmb_meta( 'prefix-area' );
		$address = rwmb_meta( 'prefix-address' );
		$video = rwmb_meta( 'prefix-video' );
		$id_video = explode('?v=', $video);
		$name_custom = rwmb_meta('prefix-name-custom');
		$phone_custom = rwmb_meta('prefix-phone-custom');
		$email_custom = rwmb_meta('prefix-email-custom');
		$image_360 = rwmb_meta( 'image360', ['size' => 'thumbnail'] );
		$gallerys = rwmb_meta( 'prefix-image_property', ['size' => 'thumbnail'] );
		$maps = rwmb_meta( 'prefix-maps');
	?>

        <article <?php post_class(); ?> class="detail-content">
        <?php
            if( $image_360 || $gallerys || $video || $maps || has_post_thumbnail() ) :
        ?>
            <div class="header-wrap-tab">
                <?php if( has_post_thumbnail() ) : ?>
                <button id="btn-image" class="item-tab" onclick="openTab('tab-image')">Hình ảnh</button>
                <?php endif; ?>
                <?php if($gallerys) : ?>
                <button id="btn-gallerys" class="item-tab" onclick="openTab('gallerys')">Thư viện ảnh</button>
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

            <?php if( has_post_thumbnail() ) :?>
                <div id="tab-image" class="featured-image content-tab" >
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <?php if($gallerys): ?>
                <!-- Gallery-- -->
            <div id="gallerys" class="content-tab" style="position: absolute;opacity: 0;visibility: hidden;">
                <div class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        <?php foreach ( $gallerys as $gallery ) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $gallery['full_url']; ?>" />
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php foreach ( $gallerys as $gallery ) : ?>
                        <div class="swiper-slide">
                            <img src="<?= $gallery['url']; ?>" />
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <!-- end Gallery-- -->
            <?php endif;?>

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
            <div id="tab-maps" class="content-tab" style="position: absolute;opacity: 0;visibility: hidden;">
                <div class="wrap-maps">
                    <?php echo $maps; ?>
                </div>
            </div>
            <!-- end Maps -->
            <?php endif; ?>

            <?php if( $gallerys ): ?>
            <script>
            var swiper = new Swiper(".mySwiper", {
                spaceBetween: 1,
                slidesPerView: 5,
                freeMode: true,
                watchSlidesProgress: true,
                breakpoints: {
                    600: {
                        slidesPerView: 3,
                    },
                    820: {
                        slidesPerView: 4,
                    },
                },
            });
            var swiper2 = new Swiper(".mySwiper2", {
                spaceBetween: 10,
                thumbs: {
                    swiper: swiper,
                },
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
            </script>

            <?php
				$delete_post_link = get_delete_post_link( $post->ID, '' );
				if ( ! empty( $delete_post_link ) ) { ?>
            <a style="color: red;" class="master-del" href="<?php echo esc_url( $delete_post_link ); ?>"><i
                    class="ti-trash"></i></a> |
            <?php edit_post_link('<i class="ti-pencil"></i>'); }// Always handy to have Edit Post Links available ?>

            <h1><?php the_title(); ?></h1>

            <p class="price">
                <strong><span class="ti-tag"></span> Giá:</strong>
                <span>
                    <?php 
                    if (!empty($price)) {
                        echo number_format((float)$price, 0, '', '.');
                        if ($unit == 'trieu') echo ' Triệu';
                        elseif ($unit == 'ty') echo ' Tỷ';
                        else echo ' đ';
                    } else {
                        echo 'Liên hệ';
                    }
                    ?>
                </span>
            </p>
            </p>
            <?php //echo $unit == 'ty' ? ' selected' : ''?>

            <h2 class="title-box-detail">Mô tả</h2>
            <div class="description block-detail">
                <?php the_content(); ?>
            </div>
            <div id="imagePopup" class="image-popup">
                <span class="close-popup">&times;</span>

                <div class="popup-image-wrapper">
                    <img id="popupImage" src="" alt="">
                </div>
            </div>

            <h2 class="title-box-detail">Thông tin Bất động sản</h2>
            <ul class="list-detail-real">
                <li>
                    <span class="label">
                        <span class="ti-location-pin"></span> Khu vực:
                    </span>
                    <?php
                    $terms = get_the_terms(get_the_ID(), "property_location");
                    echo (!empty($terms) && !is_wp_error($terms))
                        ? implode(', ', wp_list_pluck($terms, 'name'))
                        : '---';
                    ?>
                </li>
                 <li>
                    <span class="label">
                        <span class="ti-map-alt"></span> Địa chỉ:
                    </span>
                    <?php echo !empty($address) ? esc_html($address) : '---'; ?>
                </li>
                <li>
                    <span class="label">
                        <span class="ti-direction-alt"></span> Hướng:
                    </span>
                    <?php
                    $terms = get_the_terms(get_the_ID(), "property_direction");
                    echo (!empty($terms) && !is_wp_error($terms))
                        ? implode(', ', wp_list_pluck($terms, 'name'))
                        : '---';
                    ?>
                </li>
                <li>
                    <span class="label"><span class="ti-menu-alt"></span> Loại tin:</span>
                    <?php
						$status_terms = get_the_terms( $post->ID,"property_status" );
						if(!empty( $status_terms )){
							$status_count = 0;
							foreach( $status_terms as $term ){
								if( $status_count > 0 ){
									echo ', ';
								}
								echo $term->name;
							}
						}
					?>
                </li>
                 <li>
                    <span class="label">
                        <span class="ti-menu-alt"></span> Loại BĐS:
                    </span>
                    <?php
                    $terms = get_the_terms(get_the_ID(), "property_type");
                    echo (!empty($terms) && !is_wp_error($terms))
                        ? implode(', ', wp_list_pluck($terms, 'name'))
                        : '---';
                    ?>
                </li>
                <li><span class="label"><span class="ti-ruler"></span> Diện tích:</span><?php echo $area; ?> m
                    <sup>2</sup>
                </li>
            </ul>

            <?php if ( $video ) : ?>
            <h2 class="title-box-detail">Video</h2>
            <div class="list-detail-real box-media">
                <div class="wrap-video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $id_video[1]; ?>"
                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
            <?php endif; ?>

            <?php
        $gavatar = get_the_author_meta('user_email');
      ?>
            <h2 class="title-box-detail">Thông tin liên hệ</h2>
            <div class="info-contact width-common flexbox">
                <div class="avata-user">
                    <a href="" class="thumb thumb-1x1"><?php echo get_avatar($gavatar, 300); ?></a>
                </div>
                <div class="info-user">
                    <p><strong>Họ tên: <span
                                class="name"><?php if($name_custom){echo $name_custom; }else{echo get_the_author_meta('nickname');} ?></span>
                        </strong></p>
                    <p><strong><span class="ti-email"></span>:&nbsp;</strong> <a target="_blank"
                            href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php if($email_custom){echo $email_custom;}else{echo get_the_author_meta('user_email');} ?>"
                            title="<?php if($email_custom){echo $email_custom;}else{echo get_the_author_meta('user_email');} ?>"><?php if($email_custom){echo $email_custom;}else{echo get_the_author_meta('user_email');} ?></a>
                    </p>
                    <p><strong><span class="ti-mobile"></span>:&nbsp;</strong>
                        <?php if($phone_custom){echo $phone_custom;}else{echo get_the_author_meta('phone');} ?> </p>
                    <p><strong><span class="ti-direction"></span>:&nbsp;</strong>
                        <?php echo get_the_author_meta('address'); ?> </p>
                </div>
            </div>
            <div class="info-contact-fixed width-common flexbox">
                <div class="avata-user">
                    <a href="" class="thumb thumb-1x1"><?php echo get_avatar($gavatar, 300); ?></a>
                </div>
                <div class="info-user">
                    <p><strong>Họ tên: <span
                                class="name"><?php if($name_custom){echo $name_custom; }else{echo get_the_author_meta('nickname');} ?></span>
                        </strong></p>
                    <p><strong><span class="ti-email"></span>:&nbsp;</strong> <a target="_blank"
                            href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php if($email_custom){echo $email_custom;}else{echo get_the_author_meta('user_email');} ?>"
                            title="<?php if($email_custom){echo $email_custom;}else{echo get_the_author_meta('user_email');} ?>"><?php if($email_custom){echo $email_custom;}else{echo get_the_author_meta('user_email');} ?></a>
                    </p>
                    <p><strong><span class="ti-mobile"></span>:&nbsp;</strong>
                        <?php if($phone_custom){echo $phone_custom;}else{echo get_the_author_meta('phone');} ?> </p>
                    <p><strong><span class="ti-direction"></span>:&nbsp;</strong>
                        <?php echo get_the_author_meta('address'); ?> </p>
                </div>
            </div>

            <p class="date">
                <span class="ti-calendar"></span> <?php the_time('d/m/Y'); ?> | <?php the_time('G:i'); ?>
                <span class="count-view"><span class="ti-eye"></span>
                    <?php echo count_post_views(get_the_ID()); ?></span>
            </p>
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

<?php 
	//get_template_part('footer-contact-mobile-detail');	
	//get_footer('single-property'); 
?>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const images = document.querySelectorAll(
        ".description.block-detail > p img, .description.block-detail > figure img"
    );

    const popup = document.getElementById("imagePopup");
    const popupImg = document.getElementById("popupImage");
    const closeBtn = document.querySelector(".close-popup");

    images.forEach(img => {

        // wrapper ngoài ảnh
        let wrapper = document.createElement("div");
        wrapper.style.position = "relative";
        wrapper.style.display = "inline-block";
        wrapper.style.width = "100%";

        // bọc ảnh
        img.parentNode.insertBefore(wrapper, img);
        wrapper.appendChild(img);

        // icon zoom
        let zoomIcon = document.createElement("div");
        zoomIcon.innerHTML = "⛶";

        zoomIcon.style.position = "absolute";
        zoomIcon.style.top = "10px";
        zoomIcon.style.right = "10px";

        zoomIcon.style.width = "36px";
        zoomIcon.style.height = "36px";

        zoomIcon.style.background = "rgba(0,0,0,0.6)";
        zoomIcon.style.color = "#fff";

        zoomIcon.style.display = "flex";
        zoomIcon.style.alignItems = "center";
        zoomIcon.style.justifyContent = "center";

        zoomIcon.style.borderRadius = "50%";
        zoomIcon.style.cursor = "pointer";
        zoomIcon.style.fontSize = "18px";
        zoomIcon.style.zIndex = "5";

        wrapper.appendChild(zoomIcon);

        // hàm mở popup
        function openPopup() {
            popup.style.display = "flex";
            popupImg.src = img.src;
        }

        // click icon
        zoomIcon.addEventListener("click", openPopup);

        // click ảnh
        img.addEventListener("click", openPopup);

    });

    // đóng popup
    closeBtn.addEventListener("click", function () {
        popup.style.display = "none";
    });

    // click nền đen để đóng
    popup.addEventListener("click", function (e) {
        if (e.target === popup) {
            popup.style.display = "none";
        }
    });

});
</script>