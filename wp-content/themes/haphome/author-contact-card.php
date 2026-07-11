<style>
.sd-contact-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 4px;
    padding: 20px;
    margin-bottom: 16px;
    box-shadow: 0px 4px 16px 0px rgba(44, 44, 44, .08);
}
.sd-author-row {
    display: flex;
    gap: 12px;
    align-items: center;
    margin-bottom: 14px;
}
.sd-avatar-letter{
    width:64px;
    height:64px;
    border-radius:50%;
    border:2px solid #e5e7eb;
    background:#fff4f1;
    color:#b91c1c;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:28px;
    font-weight:700;
    flex-shrink:0;
    overflow: hidden;
}
.sd-avatar-letter img.cs-avatar-img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
}
.sd-author-name {
    font-size: 17px;
    font-weight: 500;
    color: #1a1a1a;
}
.sd-post-count {
    font-size: 13px;
    color: #08979c;
    text-decoration: none;
    margin-top: 2px;
    display: inline-block;
}
.sd-post-count:hover { text-decoration: underline; }
.sd-join-row {
    font-size: 13px;
    color: #555;
    margin-bottom: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.sd-btn {
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    width:100%;
    height:48px;
    border-radius:4px;
    text-decoration:none;
    font-size:15px;
    font-weight:600;
    transition:all .25s ease;
    box-sizing:border-box;
    margin-bottom: 10px;
    color: #fff;
}
.sd-btn:last-of-type { margin-bottom: 0; }
.sd-btn img{
    width:20px;
    height:20px;
    object-fit:contain;
    flex-shrink:0;
}
.sd-btn-zalo{
    background:#fff;
    border:1px solid #d9d9d9;
    color:#222;
    font-weight:normal;
}
.sd-btn-zalo:hover{ background: #fafafa; }
.sd-btn-call{
    background:var(--btn);
    color:#fff;
    border:none;
    font-weight:normal;
}
.sd-btn-call:hover{
    color:#fff;
    background:var(--btn-hover);
}
.icon-call{
    filter: invert(1) brightness(100%);
}
</style>

<?php
$author_email        = get_query_var('author_email');
$author_name         = get_query_var('author_name');
$author_phone        = get_query_var('author_phone');
$author_post_ct      = get_query_var('author_post_ct');
$author_duration     = get_query_var('author_duration');
$author_avatar       = get_query_var('author_avatar');
$author_id_for_link  = get_query_var('author_id_for_link');
$author_link_type    = get_query_var('author_link_type');
$phone_clean = preg_replace('/[^0-9+]/', '', $author_phone);

$author_link_param  = ($author_link_type === 'custom') ? 'dt_author' : 'dt_wp_author';
$author_listing_url = add_query_arg($author_link_param, $author_id_for_link, home_url('/tin-dang-cua-nguoi-dung/'));
?>

<div class="sd-contact-card">
    <div class="sd-author-row">
        <div class="sd-avatar-letter">
            <?php echo $author_avatar; ?>
        </div>
        <div>
            <div class="sd-author-name"><?php echo esc_html($author_name); ?></div>
            <?php if ($author_post_ct > 0) : ?>
                <a href="<?php echo esc_url($author_listing_url); ?>" class="sd-post-count">
                    <?php echo (int) $author_post_ct; ?> tin đăng
                </a>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($author_duration) : ?>
    <div class="sd-join-row">
        <?php echo esc_html($author_duration); ?> <?php bloginfo('name'); ?>
    </div>
    <?php endif; ?>

   <?php if ($author_phone) : ?>
        <a href="https://zalo.me/<?php echo esc_attr($phone_clean); ?>" target="_blank" class="sd-btn sd-btn-zalo">
            <img src="<?php echo get_template_directory_uri(); ?>/img/zalo.jpg" alt="Zalo">
            <span>Chat Zalo</span>
        </a>
        <a href="tel:<?php echo esc_attr($phone_clean); ?>" class="sd-btn sd-btn-call">
            <img src="<?php echo get_template_directory_uri(); ?>/img/phone.png" class="icon-call" alt="Gọi điện">
            <span>Gọi điện</span>
        </a>
    <?php endif; ?>
</div>