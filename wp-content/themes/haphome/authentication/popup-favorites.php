<style>
.fav-popup-overlay {
	display: none;
	position: fixed;
	inset: 0;
	z-index: 9998;
	background: transparent;
}

.fav-popup-overlay.show {
	display: block;
}

.fav-popup {
	display: none;
	position: absolute;
	top: calc(100% + 10px);
	right: 0;
	width: 320px;
	background: #fff;
	border-radius: 12px;
	box-shadow: 0 8px 32px rgba(0, 0, 0, .14);
	z-index: 9999;
	overflow: hidden;
	animation: favPopIn .2s ease;
}

.fav-popup.show {
	display: block;
}

@keyframes favPopIn {
	from {
		opacity: 0;
		transform: translateY(-8px);
	}

	to {
		opacity: 1;
		transform: translateY(0);
	}
}

.fav-popup-header {
	display: flex;
	align-items: center;
	gap: 8px;
	padding: 14px 16px 10px;
	border-bottom: 1px solid #f3f4f6;
}

.fav-popup-title {
    font-family: "Lexend";
	font-size: 16px;
    line-height: 24px;
	font-weight: normal;
	color: #2c2c2c;
	flex: 1;
    text-align: center;
}

.fav-popup-body {
	max-height: 320px;
	overflow-y: auto;
}

.fav-popup-body::-webkit-scrollbar {
	width: 4px;
}

.fav-popup-body::-webkit-scrollbar-thumb {
	background: #e5e7eb;
	border-radius: 4px;
}

.fav-popup-empty {
	display: flex;
	flex-direction: column;
	align-items: center;
	padding: 28px 16px;
	gap: 6px;
	text-align: center;
}

.fav-popup-empty p {
	font-size: 13px;
	font-weight: 600;
	color: #374151;
	margin: 0;
}

.fav-popup-empty span {
	font-size: 12px;
	color: #9ca3af;
}

.fav-popup-item {
	display: flex;
	align-items: center;
	gap: 10px;
	padding: 10px 14px;
	text-decoration: none;
	border-bottom: 1px solid #f9fafb;
	transition: background .15s;
	position: relative;
}

.fav-popup-item:hover {
	background: #fafafa;
}

.fav-popup-item:last-child {
	border-bottom: none;
}

.fav-popup-item-thumb {
	width: 52px;
	height: 42px;
	border-radius: 6px;
	overflow: hidden;
	flex-shrink: 0;
	background: #f3f4f6;
	display: flex;
	align-items: center;
	justify-content: center;
}

.fav-popup-item-thumb img {
	width: 100%;
	height: 100%;
	object-fit: cover;
}

.fav-popup-item-no-thumb {
	font-size: 18px;
}

.fav-popup-item-info {
	flex: 1;
	min-width: 0;
}

.fav-popup-item-title {
    font-size: 14px;
    font-weight: 500;
    color: #2c2c2c;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-bottom: 3px;
    font-family: 'Roboto';
    line-height: 20px;
}

.fav-popup-item-time {
    font-size: 13px;
    color: #505050;
    font-family: 'Roboto';
    font-weight: normal;
    line-height: 20px;
}

.fav-popup-item-remove {
	flex-shrink: 0;
	width: 26px;
	height: 26px;
	border-radius: 50%;
	border: none;
	background: none;
	cursor: pointer;
	color: #9ca3af;
	display: flex;
	align-items: center;
	justify-content: center;
	transition: color .15s, background .15s;
	z-index: 2;
}

.fav-popup-item-remove:hover {
	color: #ee0033;
	background: #fee2e2;
}

.fav-popup-footer {
	padding: 12px 16px;
	border-top: 1px solid #f3f4f6;
	text-align: center;
}

.fav-popup-see-all {
    font-family: "Roboto Regular", Roboto;
	font-size: 14px;
	font-weight: normal;
	color: #e03c31;
	text-decoration: none;
    line-height: 20px;
}

.fav-popup-see-all:hover {
    color: #ff837a;
}
</style>

<?php
    if (!defined('ABSPATH')) exit;
    $custom_user    = get_current_custom_user();
    $custom_user_id = $custom_user ? (int) $custom_user->id : 0;
    $preview_items = [];
    if ($custom_user_id) {
        $data          = get_favorites($custom_user_id, '', 5, 1);
        $preview_items = $data['items'] ?? [];
        $total_saved   = $data['total'] ?? 0;
    } else {
        $total_saved = 0;
    }
?>

<div class="fav-popup-overlay" id="fav-popup-overlay"></div>
<div class="fav-popup" id="fav-popup" role="dialog" aria-label="Tin đã lưu">

    <div class="fav-popup-header">
        <span class="fav-popup-title">Tin đăng đã lưu</span>
    </div>

    <div class="fav-popup-body" id="fav-popup-body">
        <?php if (empty($preview_items)): ?>
            <div class="fav-popup-empty">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#d1d5db" stroke-width="1.2">
                    <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p>Chưa có tin đã lưu</p>
                <span>Nhấn icon ❤ trên mỗi tin để lưu lại</span>
            </div>
        <?php else: ?>
            <?php foreach ($preview_items as $item):
                $pid      = (int) $item->post_id;
                $title    = $item->post_title ?? get_the_title($pid);
                $thumb    = $item->thumbnail  ?: get_the_post_thumbnail_url($pid, 'thumbnail');
                $link     = $item->permalink  ?: get_permalink($pid);
                $saved_at = $item->created_at ?? '';
                $diff = human_time_diff(strtotime($saved_at), current_time('timestamp'));
            ?>
            <a class="fav-popup-item" href="<?php echo esc_url($link); ?>">
                <div class="fav-popup-item-thumb">
                    <?php if ($thumb): ?>
                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>">
                    <?php else: ?>
                        <div class="fav-popup-item-no-thumb">🏠</div>
                    <?php endif; ?>
                </div>
                <div class="fav-popup-item-info">
                    <div class="fav-popup-item-title"><?php echo esc_html($title); ?></div>
                    <div class="fav-popup-item-time">Đã lưu <?php echo esc_html($diff); ?> trước</div>
                </div>
                <button class="fav-popup-item-remove"
                        data-post="<?php echo esc_attr($pid); ?>"
                        onclick="favRemoveFromPopup(this, event)"
                        title="Bỏ lưu">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6L6 18M6 6l12 12" stroke-linecap="round"/></svg>
                </button>
            </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php if ($total_saved > 0): ?>
    <div class="fav-popup-footer">
        <a href="<?php echo esc_url(home_url('/quan-ly-tai-khoan/tin-da-luu/')); ?>" class="fav-popup-see-all">
            Xem tất cả <span>→</span>
        </a>
    </div>
    <?php endif; ?>
</div>