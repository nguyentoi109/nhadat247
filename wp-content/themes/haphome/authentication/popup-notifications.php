<style>
.notif-popup-overlay {
	display: none;
	position: fixed;
	inset: 0;
	z-index: 9998;
}

.notif-popup-overlay.show {
	display: block;
}

.notif-popup {
	display: none;
	position: absolute;
	top: calc(100% + 10px);
	right: 0;
	width: 380px;
	background: #fff;
	border-radius: 14px;
	box-shadow: 0 8px 36px rgba(0, 0, 0, .15);
	z-index: 9999;
	overflow: hidden;
	animation: notifPopIn .2s ease;
}

.notif-popup.show {
	display: block;
}

@keyframes notifPopIn {
	from {
		opacity: 0;
		transform: translateY(-8px);
	}

	to {
		opacity: 1;
		transform: translateY(0);
	}
}

.notif-popup-header {
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 14px 16px 12px;
	border-bottom: 1px solid #f3f4f6;
}

.notif-popup-title {
	font-size: 15px;
	font-weight: 700;
	color: #0d1011;
}

.notif-popup-header-right {
	display: flex;
	align-items: center;
	gap: 8px;
}

.notif-unread-label {
	font-size: 12px;
	color: #6b7280;
}

.notif-unread-toggle {
	position: relative;
	cursor: pointer;
}

.notif-unread-toggle input {
	display: none;
}

.notif-toggle-track {
	display: block;
	width: 34px;
	height: 18px;
	background: #d1d5db;
	border-radius: 20px;
	transition: background .2s;
	position: relative;
}

.notif-toggle-track::after {
	content: '';
	position: absolute;
	top: 2px;
	left: 2px;
	width: 14px;
	height: 14px;
	border-radius: 50%;
	background: #fff;
	transition: left .2s;
	box-shadow: 0 1px 3px rgba(0, 0, 0, .2);
}

.notif-unread-toggle input:checked+.notif-toggle-track {
	background: #ee0033;
}

.notif-unread-toggle input:checked+.notif-toggle-track::after {
	left: 18px;
}

.notif-mark-all {
	width: 28px;
	height: 28px;
	border-radius: 50%;
	border: none;
	background: none;
	cursor: pointer;
	color: #9ca3af;
	display: flex;
	align-items: center;
	justify-content: center;
	transition: color .15s, background .15s;
}

.notif-mark-all:hover {
	color: #ee0033;
	background: #fef2f2;
}

.notif-tabs {
	display: flex;
	gap: 0;
	overflow-x: auto;
	border-bottom: 1px solid #f3f4f6;
	padding: 0 12px;
}

.notif-tabs::-webkit-scrollbar {
	height: 0;
}

.notif-tab {
	flex-shrink: 0;
	padding: 9px 14px;
	font-size: 13px;
	font-weight: 500;
	color: #6b7280;
	border: none;
	background: none;
	cursor: pointer;
	font-family: inherit;
	border-bottom: 2.5px solid transparent;
	margin-bottom: -1px;
	display: inline-flex;
	align-items: center;
	gap: 5px;
	transition: color .15s;
}

.notif-tab:hover {
	color: #0d1011;
}

.notif-tab.active {
	color: #ee0033;
	border-bottom-color: #ee0033;
	font-weight: 600;
}

.notif-tab-badge {
	background: #ee0033;
	color: #fff;
	font-size: 10px;
	font-weight: 700;
	padding: 1px 5px;
	border-radius: 20px;
}

.notif-popup-body {
	max-height: 400px;
	overflow-y: auto;
}

.notif-popup-body::-webkit-scrollbar {
	width: 4px;
}

.notif-popup-body::-webkit-scrollbar-thumb {
	background: #e5e7eb;
	border-radius: 4px;
}

.notif-empty {
	display: flex;
	flex-direction: column;
	align-items: center;
	padding: 36px 16px;
	gap: 8px;
}

.notif-empty p {
	font-size: 13px;
	font-weight: 600;
	color: #374151;
	margin: 0;
}

.notif-item {
	display: flex;
	align-items: flex-start;
	gap: 10px;
	padding: 12px 14px;
	border-bottom: 1px solid #f9fafb;
	cursor: pointer;
	transition: background .15s;
	position: relative;
}

.notif-item:hover {
	background: #fafafa;
}

.notif-item.unread {
	background: #fff9f9;
}

.notif-item:last-child {
	border-bottom: none;
}

.notif-item.hidden {
	display: none;
}

.notif-item-dot {
	position: absolute;
	top: 14px;
	left: 6px;
	width: 7px;
	height: 7px;
	border-radius: 50%;
	background: transparent;
	flex-shrink: 0;
	transition: background .2s;
}

.notif-item-dot.active {
	background: #ee0033;
}

.notif-item-icon {
	font-size: 20px;
	flex-shrink: 0;
	width: 36px;
	height: 36px;
	background: #f9fafb;
	border-radius: 8px;
	display: flex;
	align-items: center;
	justify-content: center;
	margin-left: 6px;
}

.notif-item-body {
	flex: 1;
	min-width: 0;
}

.notif-item-title {
	font-size: 13px;
	font-weight: 600;
	color: #0d1011;
	margin-bottom: 3px;
	line-height: 1.4;
}

.notif-item.unread .notif-item-title {
	color: #0d1011;
}

.notif-item-desc {
	font-size: 12px;
	color: #6b7280;
	line-height: 1.5;
	display: -webkit-box;
	-webkit-line-clamp: 2;
	-webkit-box-orient: vertical;
	overflow: hidden;
	margin-bottom: 3px;
}

.notif-item-time {
	font-size: 11px;
	color: #9ca3af;
}
</style>

<?php
    if (!defined('ABSPATH')) exit;
    $custom_user    = get_current_custom_user();
    $custom_user_id = $custom_user ? (int) $custom_user->id : 0;

    function bds_get_notifications(int $user_id, string $type = '', int $limit = 20, int $offset = 0): array {
        global $wpdb;
        $table = $wpdb->prefix . 'bds_notifications';
        $type_sql = $type ? $wpdb->prepare("AND type = %s", $type) : '';
        $rows = $wpdb->get_results($wpdb->prepare("
            SELECT * FROM {$table}
            WHERE user_id = %d {$type_sql}
            ORDER BY created_at DESC
            LIMIT %d OFFSET %d",$user_id, $limit, $offset)) ?: [];
        return $rows;
    }

    function bds_count_unread(int $user_id): int {
        global $wpdb;
        return (int) $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->prefix}bds_notifications WHERE user_id = %d AND is_read = 0",$user_id));
    }

    function bds_seed_demo_notifications(int $user_id): void {
        global $wpdb;
        $table = $wpdb->prefix . 'bds_notifications';
        $count = (int) $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$table} WHERE user_id = %d", $user_id));

        if ($count > 0) return;
        $demo = [
            ['tin_dang',   '🏠',  'Tin đăng sắp hết hạn',    'Tin "Bán nhà HXH Quận 3" còn 2 ngày là hết hạn. Gia hạn ngay!', '/quan-ly-tai-khoan/quan-ly-tin/'],
            ['tai_chinh',  '💰',  'Nạp tiền thành công',      'Tài khoản được cộng 500.000 ₫ lúc 14:30.',                      '/quan-ly-tai-khoan/so-du/'],
            ['khuyen_mai', '🎟',  '[Tặng Bạn Mới] 10 Voucher Miễn Phí 🔥', 'Áp dụng với Tin thường 15/30 ngày — Cho tin đăng cho thuê Phòng trọ, Căn hộ mini dưới 10 Triệu tại TP Hồ Chí Minh (trước sáp nhập) . Sử dụng ngay...', '/quan-ly-tai-khoan/voucher/'],
            ['khuyen_mai', '🎟',  '[Tặng Bạn Mới] 10 Voucher Miễn Phí 🔥', 'Áp dụng với Tin thường 15/30 ngày — Cho tin đăng cho thuê Phòng trọ, Căn hộ mini dưới 10 Triệu tại Hà Nội (trước sáp nhập) . Sử dụng ngay...', '/quan-ly-tai-khoan/voucher/'],
            ['system',     '🔔',  'Chào mừng bạn đến với HAP HOME!', 'Khám phá hàng nghìn tin bất động sản chất lượng.', '/'],
        ];
        foreach ($demo as [$type, $icon, $title, $body, $link]) {
            $wpdb->insert($table, [
                'user_id' => $user_id, 'type' => $type, 'title' => $title,
                'body' => $body, 'icon' => $icon, 'link' => $link, 'is_read' => 0,
            ]);
        }
    }
    $all_notifs  = [];
    $unread_count = 0;
    $tab_counts  = ['all' => 0, 'tin_dang' => 0, 'tai_chinh' => 0, 'khuyen_mai' => 0, 'other' => 0];

    if ($custom_user_id) {
        if (defined('WP_DEBUG') && WP_DEBUG) bds_seed_demo_notifications($custom_user_id);
        $all_notifs   = bds_get_notifications($custom_user_id, '', 50);
        $unread_count = bds_count_unread($custom_user_id);

        foreach ($all_notifs as $n) {
            $tab_counts['all']++;
            if ($n->type === 'tin_dang')    $tab_counts['tin_dang']++;
            elseif ($n->type === 'tai_chinh')  $tab_counts['tai_chinh']++;
            elseif ($n->type === 'khuyen_mai') $tab_counts['khuyen_mai']++;
            else                              $tab_counts['other']++;
        }
    }

    $tabs = [
        'all'       => 'Tất cả',
        'tin_dang'  => 'Tin đăng',
        'tai_chinh' => 'Tài chính',
        'khuyen_mai'=> 'Khuyến mãi',
        'other'     => 'Thêm',
    ];
?>

<div class="notif-popup-overlay" id="notif-popup-overlay"></div>
<div class="notif-popup" id="notif-popup" role="dialog" aria-label="Thông báo">

    <div class="notif-popup-header">
        <span class="notif-popup-title">Thông báo</span>
        <div class="notif-popup-header-right">
            <label class="notif-unread-toggle" title="Chỉ chưa đọc">
                <input type="checkbox" id="notif-unread-only" onchange="notifFilterUnread(this.checked)">
                <span class="notif-toggle-track"></span>
            </label>
            <span class="notif-unread-label">Chưa đọc</span>
            <button class="notif-mark-all" onclick="notifMarkAll()" title="Đánh dấu tất cả đã đọc">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 6L9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M20 12L9 23l-5-5" stroke-linecap="round" stroke-linejoin="round" opacity=".4"/>
                </svg>
            </button>
        </div>
    </div>

    <div class="notif-tabs" id="notif-tabs">
        <?php foreach ($tabs as $key => $label):
            $cnt = $tab_counts[$key] ?? 0;
            $unread_in_tab = 0;
            if ($custom_user_id) {
                if ($key === 'all') {
                    $unread_in_tab = $unread_count;
                } elseif ($key === 'other') {
                    foreach ($all_notifs as $n) {
                        if (!in_array($n->type, ['tin_dang','tai_chinh','khuyen_mai']) && !$n->is_read) $unread_in_tab++;
                    }
                } else {
                    foreach ($all_notifs as $n) {
                        if ($n->type === $key && !$n->is_read) $unread_in_tab++;
                    }
                }
            }
        ?>
        <button class="notif-tab <?php echo $key === 'all' ? 'active' : ''; ?>"
                data-tab="<?php echo esc_attr($key); ?>"
                onclick="notifSwitchTab('<?php echo esc_js($key); ?>')">
            <?php echo esc_html($label); ?>
            <?php if ($unread_in_tab > 0): ?>
                <span class="notif-tab-badge"><?php echo esc_html($unread_in_tab); ?></span>
            <?php endif; ?>
        </button>
        <?php endforeach; ?>
    </div>

    <div class="notif-popup-body" id="notif-popup-body">
        <?php if (empty($all_notifs)): ?>
        <div class="notif-empty">
            <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#d1d5db" stroke-width="1.2">
                <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p>Chưa có thông báo nào</p>
        </div>
        <?php else: ?>
            <?php foreach ($all_notifs as $notif):
                $type_key = in_array($notif->type, ['tin_dang','tai_chinh','khuyen_mai']) ? $notif->type : 'other';
                $time_ago = human_time_diff(strtotime($notif->created_at), current_time('timestamp'));
                $date_fmt = date('d/m/Y', strtotime($notif->created_at));
            ?>
            <div class="notif-item <?php echo !$notif->is_read ? 'unread' : ''; ?>"
                 data-id="<?php echo esc_attr($notif->id); ?>"
                 data-tab-type="<?php echo esc_attr($type_key); ?>"
                 onclick="notifRead(this)"
                 <?php if ($notif->link): ?>
                    data-link="<?php echo esc_attr($notif->link); ?>"
                 <?php endif; ?>>

                <div class="notif-item-dot <?php echo !$notif->is_read ? 'active' : ''; ?>"></div>

                <div class="notif-item-icon">
                    <?php echo esc_html($notif->icon ?: '🔔'); ?>
                </div>

                <div class="notif-item-body">
                    <div class="notif-item-title"><?php echo esc_html($notif->title); ?></div>
                    <?php if ($notif->body): ?>
                        <div class="notif-item-desc"><?php echo esc_html($notif->body); ?></div>
                    <?php endif; ?>
                    <div class="notif-item-time"><?php echo esc_html($date_fmt); ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>