<style>
.row-flex {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -15px;
}

.col-main {
    width: 66.66%;
    padding: 15px;
    box-sizing: border-box;
}

.col-sidebar {
    width: 33.33%;
    padding: 15px;
    box-sizing: border-box;
}

.list-news {
    display: flex;
    background: #fff;
    border: 1px solid #eee;
    border-radius: 10px;
    margin-bottom: 15px;
    padding: 10px;
    min-height: 200px;
    transition: all .3s ease;
}

.list-news:hover {
    border-color: #2c2c2c;
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(211,47,47,.12);
}

.thumb-list {
    flex: 0 0 260px;
    margin-right: 20px;
    overflow: hidden;
    border-radius: 8px;
}

.thumb-list a {
    display: block;
    line-height: 0;
}

.thumb-list img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    display: block;
    margin: 0;
    padding: 0;
    border: 0;
}

.content {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.list-news .title-post {
    margin-bottom: 10px;
}

.list-news .title-post a {
    font-size: 17px;
    font-weight: bold;
    color: #e03c31;
    text-decoration: none;
    line-height: 1.5;
}

.list-news .title-post a:hover {
    color: #111;
}

.list-news .des {
    font-size: 14px;
    color: #444;
    line-height: 1.7;
    margin-top: 8px;

    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.meta {
    margin-top: auto;
    font-size: 12px;
    color: #777;
    padding-top: 12px;
}

.sidebar-popular {
    background: #fff;
    border: 1px solid #f0f0f0;
    border-radius: 12px;
    padding: 20px;
}

.title-sidebar {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 15px;
    border-bottom: 2px solid #e03c31;
    padding-bottom: 5px;
    display: inline-block;
}

.popular-item {
    display: flex;
    align-items: flex-start;
    padding: 15px 0;
    border-bottom: 1px solid #f5f5f5;
}

.popular-item:last-child {
    border-bottom: none;
}

.rank-number {
    flex: 0 0 28px;
    width: 28px;
    height: 28px;
    background: #fff0f0;
    color: #e91e63;
    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 13px;
    font-weight: 600;
    margin-right: 15px;
}

.popular-item a {
    font-size: 14px;
    color: #333;
    text-decoration: none;
    font-weight: 500;
    line-height: 1.6;
    transition: .3s;
}

.popular-item a:hover {
    color: #e03c31 !important;
}

.no-post {
    text-align: center;
    padding: 40px 20px;
    color: grey;
    font-size: 18px;
}

/* =========================
   MOBILE
========================= */
@media (max-width:768px){

    .row-flex{
        display:flex;
        flex-direction:column;
    }

    .col-main,
    .col-sidebar{
        width:100%;
        padding:0 10px;
        box-sizing:border-box;
        display:block;
    }

    .list-news{
        display:flex;
        flex-direction:column;

        width:100%;
        margin-bottom:15px;

        padding:0;
        overflow:hidden;
        min-height:auto;

        box-sizing:border-box;
    }

    .thumb-list{
        width:100%;
        margin:0;
        padding:0;

        overflow:hidden;
        line-height:0;
    }

    .thumb-list a{
        display:block;
        line-height:0;
    }

    .thumb-list img{
        width:100%;
        height:auto;

        display:block;

        margin:0 !important;
        padding:0;
        border:0;
        border-radius:0 !important;
    }

    .content{
        width:100%;
        padding:14px;
        box-sizing:border-box;

        overflow:hidden;
    }

    .list-news .title-post a{
        font-size:18px;
        line-height:1.5;
    }

    .list-news .des{
        font-size:14px;
        line-height:1.6;
        -webkit-line-clamp:3;
    }

    .col-sidebar{
        margin-top:20px;
    }

    .sidebar-popular{
        display:block !important;
        width:100%;
    }
}
</style>
<?php

$popular_args = array(
    'post_type'      => 'post',
    'posts_per_page' => 5,
    'meta_key'       => 'post_views_count',
    'orderby'        => 'meta_value_num',
    'order'          => 'DESC'
);

$popular_query = new WP_Query($popular_args);

?>

<div class="row-flex">
    <div class="col-main">
        <?php if ($main_query && $main_query->have_posts()) : ?>
            <?php while ($main_query->have_posts()) : $main_query->the_post(); ?>
                <article class="list-news">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="thumb-list">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <h3 class="title-post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="des"><?php echo get_the_excerpt(); ?></div>
                        <div class="meta" style="margin-top:auto; font-size:12px; color:#777;">
                            <span class="ti-calendar"></span> <?php the_time('d/m/Y'); ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="no-post">Không tìm thấy bài viết nào.</p>
        <?php endif; ?>
    </div>

    <div class="col-sidebar">
        <aside class="sidebar-popular">
            <h2 class="title-sidebar">Xem nhiều nhất</h2>
            <?php if ($popular_query && $popular_query->have_posts()) : $rank = 1; ?>
                <?php while ($popular_query->have_posts()) : $popular_query->the_post(); ?>
                    <div class="popular-item">
                        <span class="rank-number"><?php echo $rank++; ?></span>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php endif; ?>
        </aside>
    </div>
</div>