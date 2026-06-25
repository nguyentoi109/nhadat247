<style>
.list-style.is-loading {
    position: relative;
    min-height: 200px; 
}

.list-style.is-loading::before {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(255, 255, 255, 0.6);
    z-index: 10;
}

.list-style.is-loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 48px;
    height: 48px;
    margin: -24px 0 0 -24px;
    border: 4px solid #ddd;
    border-top-color: #333; 
    border-radius: 50%;
    z-index: 11;
    animation: bds-spin 0.8s linear infinite;
}

@keyframes bds-spin {
    to {
        transform: rotate(360deg);
    }
}
</style>
<?php
/*
Template Name: Trang chủ
*/
get_header();
?>

<section class="section section-home-search clear">
    <div class="container">
        <?php
        if (!wp_is_mobile()) {
            get_template_part('searchformproperty');
        } else {
            echo '<span class="btn-search-mobile"><span class="ti-search"></span>Tìm kiếm Bất động sản</span>';
        }
        ?>
    </div>

    <?php get_template_part('news/news-home'); ?>

    <?php
    set_query_var('ngop_location_id', 0);
    set_query_var('ngop_status_id',   0);
    set_query_var('ngop_type_id',     0);
    get_template_part('bat-dong-san-ngop');
    ?>
</section>

<?php
$all_related = new WP_Query([
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 5,
    'meta_key'       => 'post_views_count',
    'orderby'        => 'meta_value_num',
    'order'          => 'DESC',
]);
set_query_var('related_posts', $all_related);
?>

<h2 class="title-section"><span>Bất động sản mới nhất</span></h2>

<section class="list-style-wrap container">
    <div class="list-style list-all" id="home-property-list" data-ajax-filter="1">
        <?php get_template_part('loop-property/all-property-list-style'); ?>
    </div>
    <?php get_template_part('sidebar-filter-property'); ?>
</section>

<p class="read-more">
    <a href="<?php echo home_url('tat-ca'); ?>">Xem tất cả</a>
</p>

<?php get_footer(); ?>