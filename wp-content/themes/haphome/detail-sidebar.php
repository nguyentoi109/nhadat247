<style>
.detail-layout {
    display: flex;
    gap: 15px;
    align-items: flex-start;
}
.detail-main {
    /* flex: 1; */
    min-width: 0;
}
.detail-sidebar {
    width: 320px;
    flex-shrink: 0;
    position: sticky;
    top: 20px;
    padding-left: 10px;
}

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
}
.sd-author-name {
    font-size: 17px;
    font-weight: 500;
    color: #1a1a1a;
}
.sd-author-badge {
    display: inline-block;
    margin-top: 4px;
    padding: 3px 8px;
    background: #e6fffb;
    color: #08979c;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 500;
}
.sd-btn {
    display: block;
    text-align: center;
    padding: 11px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 10px;
    color: #fff;
}
.sd-btn:last-of-type { margin-bottom: 0; }
.sd-btn-call { background: #00a859; }
.sd-btn-zalo { background: #0068ff; }

.sd-post-meta {
    border-top: 1px solid #eee;
    margin-top: 14px;
    padding-top: 14px;
}
.sd-meta-row {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
    margin-bottom: 7px;
    color: #555;
}
.sd-meta-row strong { color: #1a1a1a; }

.sd-popular-card {
    background: #f2f2f2;
    border: 1px solid #f0f0f0;
    border-radius: 4px;
    padding: 16px;
}
.sd-popular-title {
    font-size: 16px;
    font-weight: 700;
    margin: 0 0 4px;
    padding-bottom: 10px;
    border-bottom: 2px solid #10b981;
    color: #1a1a1a;
}

.popular-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 11px 0;
    border-bottom: 1px solid #f5f5f5;
}
.popular-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}
.rank-number {
    flex-shrink: 0;
    width: 26px;
    height: 26px;
    background: #fff0f0;
    color: #e91e63;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 700;
}
.popular-item a {
    font-size: 13.5px;
    color: #1a1a1a;
    text-decoration: none;
    font-weight: 500;
    line-height: 1.55;
}
.popular-item a:hover { color: var(--menu-text-selected); }
.sd-btn{
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
}

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

.sd-btn-zalo:hover{
    background: #fafafa;
}
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

@media (max-width: 768px) {
    .detail-sidebar {
        display: none;
    }
}
</style>

<?php
global $post;

$author_email   = get_query_var('author_email');
$author_name    = get_query_var('author_name');
$author_phone   = get_query_var('author_phone');
$phone_clean    = preg_replace('/[^0-9+]/', '', $author_phone);
?>

<aside class="detail-sidebar">
    <div class="sd-contact-card">
        <div class="sd-author-row">
            <div class="sd-avatar-letter">
                <?php echo esc_html(get_author_name_avatar($author_name)); ?>
            </div>
            <div>
                <div class="sd-author-name"><?php echo esc_html($author_name); ?></div>
                <div class="sd-author-badge">Môi giới</div>
            </div>
        </div>

       <?php if ($author_phone) : ?>
            <a href="https://zalo.me/<?php echo esc_attr($phone_clean); ?>" target="_blank" class="sd-btn sd-btn-zalo">
                <img src="<?php echo get_template_directory_uri(); ?>/img/zalo.jpg"
                    alt="Zalo">
                <span>Chat Zalo</span>
            </a>

            <a href="tel:<?php echo esc_attr($phone_clean); ?>" class="sd-btn sd-btn-call">
                <img src="<?php echo get_template_directory_uri(); ?>/img/phone.png" class="icon-call" alt="Gọi điện">
                <span>Gọi điện</span>
            </a>
        <?php endif; ?>

        <div class="sd-post-meta">
            <div class="sd-meta-row">
                <span class="sd-date-label">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/calendar.png"
                        alt="Ngày đăng" style="width:16px;height:16px;margin-right:4px;vertical-align:middle;">
                    Ngày đăng:
                </span>
                <strong><?php echo get_the_date('d/m/Y'); ?></strong>
            </div>
        </div>
    </div>
    <?php get_template_part('popular-property'); ?>
</aside>