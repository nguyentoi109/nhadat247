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
    border-bottom:none;
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
    font-family: 'Roboto-Regular';
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
            /* border-top: 1px solid #0e9aa7; */
            display:flex;
            align-items:center;
            gap:12px;
            z-index: 9;
            padding:10px 12px;
            box-shadow:0 -2px 10px rgba(0,0,0,0.35);
        }


    .mobile-floating-bar a{
        text-decoration:none;
        box-sizing:border-box;
    }

    .mobile-floating-bar .avatar-btn{
        width:60px;
        height:60px;
        border-radius:50%;
        border:2px solid #a6aab1;
        background:#fff4f1;
        color:#b91c1c;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:28px;
        font-weight:700;
    }

    .mobile-floating-bar .avatar-btn img{
        width:100%;
        height:100%;
        object-fit:cover;
        border-radius:50%;
    }

    .mobile-floating-bar .zalo-btn{
        height:54px;
        width: 25%;
        background:#fff;
        border:1px solid #d9d9d9;
        border-radius:7px;
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
        width:26px;
        height:26px;
        object-fit:contain;
        flex-shrink:0;
    }

    .mobile-floating-bar .call-btn{
        height:54px;
        background:linear-gradient(180deg,#11b4bd,#069aa3);
        border-radius:7px;
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
        font-size:20px;
        line-height:1;
        filter:brightness(0) invert(1);
        flex-shrink:0;
    }
    .list-detail-real li{
        width:100%;
    }

    .list-detail-real li:nth-child(odd),
    .list-detail-real li:nth-child(even){
        padding-left:10px;
        padding-right:20px;
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

.popular-mobile {
    display: none;
}

@media (max-width: 768px) {
    .popular-mobile {
        display: block;
        padding: 0 10px 10px;
    }
}
</style>
<?php get_header(); ?>

<section class="container detail-page">
<main role="main">
<?php
if (have_posts()) : while (have_posts()) : the_post();

    $price = rwmb_meta('prefix-price');
    $unit = rwmb_meta('prefix-unit');
    $area = rwmb_meta('prefix-area');
    $address = rwmb_meta('prefix-address');
    $phap_ly = rwmb_meta('prefix-phap-ly');
    $noi_that = rwmb_meta('prefix-noi-that');
    $video = rwmb_meta('prefix-video');
    $video_id = get_youtube_id_from_url($video);
    $name_custom = rwmb_meta('prefix-name-custom');
    $phone_custom= rwmb_meta('prefix-phone-custom');
    $image_360 = rwmb_meta('image360', ['size' => 'thumbnail']);
    $gallerys = rwmb_meta('prefix-image_property', ['size' => 'thumbnail']);
    $has_gallery = !empty($gallerys);

    $latlng_raw = get_post_meta(get_the_ID(), 'prefix-latlng', true);
    $dt_lat = '';
    $dt_lng = '';
    if ($latlng_raw !== '') {
        $parts = array_map('trim', explode(',', $latlng_raw));
        if (isset($parts[0], $parts[1]) && is_numeric($parts[0]) && is_numeric($parts[1])) {
            $dt_lat = $parts[0];
            $dt_lng = $parts[1];
        }
    }
    if ($dt_lat === '' || $dt_lng === '') {
        $dt_lat = get_post_meta(get_the_ID(), 'prefix-lat', true);
        $dt_lng = get_post_meta(get_the_ID(), 'prefix-lng', true);
    }
    if ($dt_lat === '' || $dt_lng === '') {
        $dt_lat = get_post_meta(get_the_ID(), '_dt_lat', true);
        $dt_lng = get_post_meta(get_the_ID(), '_dt_lng', true);
    }
    if ($dt_lat === '' || $dt_lng === '') {
        $old_osm = get_post_meta(get_the_ID(), 'prefix-maps', true);
        if (!empty($old_osm)) {
            $maybe_array = maybe_unserialize($old_osm);
            if (is_array($maybe_array) && isset($maybe_array['lat'], $maybe_array['lng'])) {
                $dt_lat = $maybe_array['lat'];
                $dt_lng = $maybe_array['lng'];
            } elseif (is_string($old_osm)) {
                $parts = array_map('trim', explode(',', $old_osm));
                if (isset($parts[0], $parts[1]) && is_numeric($parts[0]) && is_numeric($parts[1])) {
                    $dt_lat = $parts[0];
                    $dt_lng = $parts[1];
                }
            }
        }
    }

    $has_map = ($dt_lat !== '' && $dt_lng !== '' && is_numeric($dt_lat) && is_numeric($dt_lng));
    $author_email = get_the_author_meta('user_email');
    $author_name = $name_custom ?: get_the_author_meta('nickname');
    $author_phone = $phone_custom ?: get_the_author_meta('phone');
    $author_id  = get_the_author_meta('ID');
    $author_post_ct = count_user_posts($author_id, 'property');
    $phone_clean  = preg_replace('/[^0-9]/', '', $author_phone);
    $room_type_ids = array(8, 9, 11);
    $property_type_terms = get_the_terms(get_the_ID(), "property_type");
    $has_rooms = false;
    if (!empty($property_type_terms) && !is_wp_error($property_type_terms)) {
        foreach ($property_type_terms as $term) {
            if (in_array($term->term_id, $room_type_ids)) {
                $has_rooms = true;
                break;
            }
        }
    }
?>

<article <?php post_class(); ?> class="detail-content">
<div class="detail-layout">
<div class="detail-main">

    <?php if ($has_gallery || has_post_thumbnail() || $video || $has_map) : ?>
    <div class="header-wrap-tab">
        <?php if ($has_gallery || has_post_thumbnail()) : ?>
            <button class="item-tab" onclick="openTab('gallerys')">Hình ảnh</button>
        <?php endif; ?>
        <?php if ($image_360) : ?>
            <button class="item-tab" onclick="openTab('image_360')">Ảnh 360</button>
        <?php endif; ?>
        <?php if ($video) : ?>
            <button class="item-tab" onclick="openTab('tab-video')">Video</button>
        <?php endif; ?>
        <?php if ($has_map) : ?>
            <button class="item-tab" onclick="openTab('tab-maps')">Bản đồ</button>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <?php if ($image_360) : ?>
    <div id="image_360" class="content-tab" style="position:absolute;opacity:0;visibility:hidden;">
        <div id="panorama" style="width:100%;height:500px;"></div>
    </div>
    <script src="<?php echo get_template_directory_uri(); ?>/js/pannellum.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            window.__dtPano = null;
            window.__dtInitPanorama = function() {
                if (window.__dtPano) return;
                window.__dtPano = pannellum.viewer('panorama', {
                    type: "equirectangular",
                    panorama: "<?php echo esc_js($image_360['full_url'] ?? ''); ?>",
                    autoLoad: true,
                    autoRotate: -2,
                    compass: true,
                });
            };
        });
    </script>
    <?php endif; ?>

    <!-- Gallery -->
    <div id="gallerys" class="content-tab" style="position:absolute;opacity:0;">
        <div class="swiper mySwiper2">
            <div class="swiper-wrapper">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="swiper-slide">
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
                             alt="<?php the_title_attribute(); ?>">
                    </div>
                <?php endif; ?>
                <?php foreach ((array)$gallerys as $gallery) : ?>
                    <div class="swiper-slide">
                        <img src="<?php echo esc_url($gallery['full_url']); ?>" alt="">
                    </div>
                <?php endforeach; ?>
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
                <?php foreach ((array)$gallerys as $gallery) : ?>
                    <div class="swiper-slide">
                        <img src="<?php echo esc_url($gallery['url']); ?>" alt="">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <?php if ($video_id) : ?>
    <div id="tab-video" class="content-tab" style="display:none;">
        <div class="wrap-video">
            <iframe width="560" height="315"
                src="https://www.youtube.com/embed/<?php echo esc_attr($video_id); ?>"
                frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($has_map) : ?>
        <div id="tab-maps" class="content-tab" style="position:absolute;opacity:0;visibility:hidden;margin-bottom:10px;">
            <div class="wrap-maps">
                <div id="detail-map" style="width:100%;height:360px;border-radius:10px;border:1px solid #e0e0e0;overflow:hidden;background:#f5f5f5;"></div>
            </div>
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            window.HereMapbox.initView({
                mapEl: 'detail-map',
                lat: <?php echo json_encode((float) $dt_lat); ?>,
                lng: <?php echo json_encode((float) $dt_lng); ?>,
                iconUrl: <?php echo json_encode(HERE_ICON_URL); ?>,
                mapboxToken: <?php echo json_encode(MAPBOX_ACCESS_TOKEN); ?>,
                mapboxStyle: <?php echo json_encode(MAPBOX_STYLE); ?>,
            });
        });
        </script>
        <?php endif; ?>

    <script>
    <?php if ($has_gallery) : ?>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView: 5,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        spaceBetween: 10,
        thumbs: { swiper: swiper },
    });
    <?php else : ?>
    new Swiper(".mySwiper2", { spaceBetween: 10 });
    <?php endif; ?>

    function openTab(tabName) {
        document.querySelectorAll('.content-tab').forEach(function(el) {
            el.style.display = 'none';
        });
        var t = document.getElementById(tabName);
        t.style.display   = 'block';
        t.style.position  = 'static';
        t.style.visibility= 'visible';
        t.style.opacity   = '1';
        document.getElementById('breadcrumbs') &&
        document.getElementById('breadcrumbs').scrollIntoView();

        if (tabName === 'tab-maps' && typeof window.__dtTryInitMap === 'function') {
            window.__dtTryInitMap();
        }
        if (tabName === 'image_360' && typeof window.__dtInitPanorama === 'function') {
            window.__dtInitPanorama();
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        <?php if ($has_gallery || has_post_thumbnail()) : ?>
        openTab('gallerys');
        <?php endif; ?>
    });
    </script>


    <?php
    $delete_post_link = get_delete_post_link($post->ID);
    if (!empty($delete_post_link)) :
    ?>
        <a style="color:red;" class="master-del" href="<?php echo esc_url($delete_post_link); ?>">
            <i class="ti-trash"></i>
        </a> |
        <?php edit_post_link('<i class="ti-pencil"></i>');
    endif; ?>

    <h1><?php the_title(); ?></h1>

    <div class="all-location">
        <span class="ti-location-pin"></span>
        <?php echo esc_html($address); ?>
        <?php
        $loc_terms = get_the_terms(get_the_ID(), 'property_location');
        if (!empty($loc_terms) && !is_wp_error($loc_terms)) {
            echo ' ' . implode(', ', wp_list_pluck($loc_terms, 'name'));
        }
        ?>
    </div>

    <h2 class="title-box-detail">Thông tin Bất động sản</h2>
    <ul class="list-detail-real">

        <li>
            <div class="item-left">
                <span class="icon"><span class="ti-tag"></span></span>
                <span class="label">Giá</span>
            </div>
            <div class="item-right">
                <div class="detail-price" style="color:var(--menu-text-selected);">
                    <?php
                    if ($price) {
                        if ($price >= 1000000000) {
                            $v = $price / 1000000000;
                            echo rtrim(rtrim(sprintf('%.10f', $v), '0'), '.') . ' tỷ';
                        } elseif ($price >= 1000000) {
                            $v = $price / 1000000;
                            echo rtrim(rtrim(sprintf('%.10f', $v), '0'), '.') . ' triệu';
                        } else {
                            if ($unit === 'trieu' && $price > 1000) {
                                echo rtrim(rtrim(sprintf('%.10f', $price / 1000), '0'), '.') . ' tỷ';
                            } elseif ($unit === 'ty') {
                                echo number_format($price, 0, ',', '.') . ' tỷ';
                            } else {
                                echo number_format($price, 0, ',', '.') . ' đ';
                            }
                        }
                    } else {
                        echo 'Thỏa thuận';
                    }
                    ?>
                </div>
            </div>
        </li>

        <li>
            <div class="item-left">
                <span class="icon"><span class="ti-ruler"></span></span>
                <span class="label">Diện tích</span>
            </div>
            <div class="item-right">
                <div class="detail-area" style="color:var(--menu-text-selected);">
                    <?php echo !empty($area) ? esc_html($area) : '0'; ?> m<sup>2</sup>
                </div>
            </div>
        </li>

        <?php if ($has_rooms) : ?>
        <li>
            <div class="item-left">
                <span class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/bedroom.png"
                         alt="Phòng ngủ" class="white-icon">
                </span>
                <span class="label">Phòng ngủ</span>
            </div>
            <div class="item-right">
                <?php
                $bedroom = get_post_meta($post->ID, 'prefix-bedroom', true);
                if (!empty($bedroom)) {
                    $map = [6 => 'Studio', 7 => '1+', 8 => '2+'];
                    echo $map[$bedroom] ?? $bedroom;
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
                         alt="Nhà vệ sinh" class="white-icon">
                </span>
                <span class="label">Nhà vệ sinh, nhà tắm</span>
            </div>
            <div class="item-right">
                <?php
                $bathroom = get_post_meta($post->ID, 'prefix-bathroom', true);
                echo !empty($bathroom) ? esc_html($bathroom) : '---';
                ?>
            </div>
        </li>
        <?php endif; ?>

        <li>
            <div class="item-left">
                <span class="icon"><span class="ti-direction-alt"></span></span>
                <span class="label">Hướng</span>
            </div>
            <div class="item-right">
                <?php
                $dir = get_the_terms(get_the_ID(), 'property_direction');
                echo (!empty($dir) && !is_wp_error($dir))
                    ? implode(', ', wp_list_pluck($dir, 'name')) : '---';
                ?>
            </div>
        </li>

        <li>
            <div class="item-left">
                <span class="icon"><span class="ti-layout-grid2"></span></span>
                <span class="label">Loại BĐS</span>
            </div>
            <div class="item-right">
                <?php
                $type = get_the_terms(get_the_ID(), 'property_type');
                echo (!empty($type) && !is_wp_error($type))
                    ? implode(', ', wp_list_pluck($type, 'name')) : '---';
                ?>
            </div>
        </li>

        <li>
            <div class="item-left">
                <span class="icon"><span class="ti-files"></span></span>
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
                         alt="Nội thất" class="white-icon">
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

    <!-- <div class="infor-bds">
        <?php //if ($video) : ?>
        <h2 class="title-box-detail">Video</h2>
        <div class="wrap-video">
            <iframe width="560" height="315"
                src="https://www.youtube.com/embed/<?php //echo esc_attr($id_video[1] ?? ''); ?>"
                frameborder="0" allowfullscreen></iframe>
        </div>
        <?php //endif; ?>
    </div> -->

    <h2 class="title-breadcrumb">
        Mục:
        <?php
        $location = get_the_terms(get_the_ID(), 'property_location');
        $status   = get_the_terms(get_the_ID(), 'property_status');
        $type     = get_the_terms(get_the_ID(), 'property_type');

        $location_custom_links = [
            'tp-ho-chi-minh'  => 'tp-ho-chi-minh',
            'binh-duong'      => 'binh-duong',
            'dong-nai'        => 'dong-nai',
            'ba-ria-vung-tau' => 'vung-tau',
        ];
        $location_url = '';

        if (!empty($location) && !is_wp_error($location)) {
            $location_url = $location_custom_links[$location[0]->slug] ?? $location[0]->slug;
            echo '<a href="' . home_url('/' . $location_url) . '">' . esc_html($location[0]->name) . '</a>';
        }
        if (!empty($status) && !is_wp_error($status)) {
            echo ' <a href="' . home_url('/' . $status[0]->slug . '-' . $location_url) . '">'
               . mb_strtolower($status[0]->name, 'UTF-8') . '</a>';
        }
        if (!empty($type) && !is_wp_error($type) && !empty($status) && !is_wp_error($status)) {
            echo ' <a href="' . home_url('/' . $status[0]->slug . '-' . $type[0]->slug . '-' . $location_url) . '">'
               . mb_strtolower($type[0]->name, 'UTF-8') . '</a>';
        }
        ?>
    </h2>

    <?php
    $p = get_adjacent_post(false, '', true);
    if (!empty($p)) {
        echo '<a class="btn-next-prev-detail prev" href="' . get_permalink($p->ID) . '">'
           . '<span class="title">' . esc_html($p->post_title) . '</span></a>';
    }
    $n = get_adjacent_post(false, '', false);
    if (!empty($n)) {
        echo '<a class="btn-next-prev-detail next" href="' . get_permalink($n->ID) . '">'
           . '<span class="title">' . esc_html($n->post_title) . '</span></a>';
    }
    ?>

</div><!-- /.detail-main -->
</div><!-- /.detail-layout -->
</article>

<?php endwhile; ?>
<?php else : ?>
<article><h1><?php _e('Chưa có nội dung.', 'html5blank'); ?></h1></article>
<?php endif; ?>

</main>

<?php
set_query_var('author_email',   $author_email);
set_query_var('author_name',    $author_name);
set_query_var('author_phone',   $author_phone);
set_query_var('author_id',      $author_id);
set_query_var('author_post_ct', $author_post_ct);
get_template_part('detail-sidebar');
?>

</section>
<div class="popular-mobile">
    <?php get_template_part('popular-property'); ?>
</div>
<?php get_template_part('related-area'); ?>
<?php get_template_part('related-type'); ?>

<div class="mobile-floating-bar">
    <a href="javascript:void(0)" class="avatar-btn">
        <?php echo esc_html(get_author_name_avatar($author_name)); ?>
    </a>
    <a href="https://zalo.me/<?php echo esc_attr($phone_clean); ?>"
       class="zalo-btn" target="_blank">
        <img src="<?php echo get_template_directory_uri(); ?>/img/zalo.jpg" alt="Zalo">
        <span>Zalo</span>
    </a>
    <a href="tel:<?php echo esc_attr($phone_clean); ?>" class="call-btn">
        <img src="<?php echo get_template_directory_uri(); ?>/img/phone.png" class="icon-call" alt="Gọi điện" width="18" height="18">
        <span><?php echo esc_html($author_phone); ?></span>
    </a>
</div>
<?php get_footer(); ?>