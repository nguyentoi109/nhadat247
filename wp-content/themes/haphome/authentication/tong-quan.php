<style>
:root {
	--red: #E24B4A;
	--red-dk: #A32D2D;
}

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}

.db {
	font-family: inherit;
	color: var(--ql-text, #111);
  padding: 15px;
}

.stats-grid {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 10px;
	margin-bottom: 12px;
}

@media(max-width:600px) {
	.stats-grid {
		grid-template-columns: repeat(2, 1fr);
	}
}

.scard {
	background: #fff;
	border: 1px solid var(--ql-border, #e5e7eb);
	border-radius: 10px;
	padding: 14px 16px;
}

.scard-icon {
	width: 36px;
	height: 36px;
	border-radius: 50%;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 17px;
	margin-bottom: 10px;
}

.ic-red {
	background: #FCEBEB;
	color: #E24B4A;
}

.ic-amber {
	background: #FAEEDA;
	color: #854F0B;
}

.ic-blue {
	background: #E6F1FB;
	color: #185FA5;
}

.ic-purple {
	background: #EEEDFE;
	color: #534AB7;
}

.scard-val {
	font-size: 24px;
	font-weight: 600;
	line-height: 1;
	color: var(--ql-text, #111);
	margin-bottom: 3px;
}

.scard-lbl {
	font-size: 12px;
	color: #6b7280;
}

.scard-sub {
	font-size: 11px;
	color: #9ca3af;
	margin-top: 4px;
}

.bal-row {
	display: flex;
	align-items: center;
	justify-content: space-between;
	gap: 12px;
	flex-wrap: wrap;
	background: #fff;
	border: 1px solid var(--ql-border, #e5e7eb);
	border-radius: 10px;
	padding: 14px 18px;
	margin-bottom: 12px;
}

.bal-lbl {
	font-size: 12px;
	color: #6b7280;
	margin-bottom: 2px;
}

.bal-amt {
	font-size: 22px;
	font-weight: 600;
	color: var(--ql-text, #111);
}

.bal-sub {
	font-size: 11px;
	color: #9ca3af;
	margin-top: 2px;
}

.bal-btns {
	display: flex;
	gap: 8px;
}

.btn-red {
	display: inline-flex;
	align-items: center;
	gap: 5px;
	padding: 8px 18px;
	background: var(--red);
	color: #fff;
	border: none;
	border-radius: 7px;
	font-size: 13px;
	font-weight: 600;
	cursor: pointer;
	text-decoration: none;
}

.btn-bdr {
	display: inline-flex;
	align-items: center;
	gap: 5px;
	padding: 7px 14px;
	background: #fff;
	color: var(--ql-text, #111);
	border: 1px solid var(--ql-border, #e5e7eb);
	border-radius: 7px;
	font-size: 13px;
	font-weight: 500;
	cursor: pointer;
	text-decoration: none;
}

.row2 {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 12px;
	margin-bottom: 12px;
}

@media(max-width:580px) {
	.row2 {
		grid-template-columns: 1fr;
	}
}

.card {
	background: #fff;
	border: 1px solid var(--ql-border, #e5e7eb);
	border-radius: 10px;
	overflow: hidden;
}

.card-hd {
	padding: 11px 16px;
	border-bottom: 1px solid var(--ql-border, #e5e7eb);
	display: flex;
	align-items: center;
	justify-content: space-between;
}

.card-hd-t {
	font-size: 13px;
	font-weight: 600;
	display: flex;
	align-items: center;
	gap: 6px;
	color: var(--ql-text, #111);
}

.card-hd-t i {
	font-size: 14px;
	color: #9ca3af;
}

.lnk-red {
	font-size: 12px;
	color: var(--red-dk);
	text-decoration: none;
	display: flex;
	align-items: center;
	gap: 2px;
}

.bdg {
	display: inline-flex;
	align-items: center;
	gap: 3px;
	padding: 2px 7px;
	border-radius: 4px;
	font-size: 10px;
	font-weight: 600;
}

.bdg-gold {
	background: #FAEEDA;
	color: #633806;
}

.bdg-vip {
	background: #FCEBEB;
	color: #791F1F;
	border: 1px solid #f8d7d7;
}

.bdg-green {
	background: #DCFCE7;
	color: #166534;
}

.bdg-amber {
	background: #FEF9C3;
	color: #854D0E;
}

.bdg-red {
	background: #FCEBEB;
	color: #991B1B;
}

.bdg-blue {
	background: #DBEAFE;
	color: #1E40AF;
}

.bdg-gray {
	background: #F3F4F6;
	color: #6B7280;
}

.bdg-silver {
	background: #F1F5F9;
	color: #475569;
}

.pkg-body {
	padding: 14px 16px;
}

.pkg-top {
	display: flex;
	align-items: center;
	gap: 10px;
	margin-bottom: 12px;
}

.pkg-ic {
	width: 36px;
	height: 36px;
	border-radius: 50%;
	background: #FAEEDA;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 16px;
	color: #854F0B;
	flex-shrink: 0;
}

.pkg-name {
	font-size: 14px;
	font-weight: 600;
	color: var(--ql-text, #111);
	margin-bottom: 3px;
}

.prog-wrap {
	margin-bottom: 10px;
}

.prog-lbl {
	display: flex;
	justify-content: space-between;
	font-size: 11px;
	color: #6b7280;
	margin-bottom: 4px;
}

.prog-lbl span:last-child {
	font-weight: 600;
	color: var(--ql-text, #111);
}

.prog-bar {
	height: 5px;
	background: #f3f4f6;
	border-radius: 3px;
	overflow: hidden;
}

.prog-fill {
	height: 100%;
	border-radius: 3px;
}

.fill-gold {
	background: #BA7517;
}

.fill-blue {
	background: #378ADD;
}

.fill-red {
	background: #E24B4A;
}

.pkg-rows {
	display: flex;
	flex-direction: column;
}

.pkg-row {
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 6px 0;
	border-bottom: 1px solid #f3f4f6;
	font-size: 12px;
}

.pkg-row:last-child {
	border-bottom: none;
	padding-bottom: 0;
}

.pkg-row-lbl {
	color: #6b7280;
	display: flex;
	align-items: center;
	gap: 5px;
}

.pkg-row-val {
	font-weight: 600;
	color: var(--ql-text, #111);
}

.pkg-row-val.green {
	color: #166534;
}

.push-body {
	padding: 14px 16px;
}

.push-grid {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 10px;
	margin-bottom: 12px;
}

.push-item {
	background: #f9fafb;
	border-radius: 8px;
	padding: 12px;
}

.push-item-lbl {
	font-size: 11px;
	color: #6b7280;
	margin-bottom: 5px;
	display: flex;
	align-items: center;
	gap: 4px;
}

.push-item-val {
	font-size: 22px;
	font-weight: 600;
	color: var(--ql-text, #111);
	line-height: 1;
}

.push-item-sub {
	font-size: 11px;
	color: #9ca3af;
	margin-top: 2px;
}

.ph-item {
	display: flex;
	justify-content: space-between;
	align-items: center;
	font-size: 12px;
	padding: 5px 0;
	border-bottom: 1px solid #f3f4f6;
}

.ph-item:last-child {
	border-bottom: none;
}

.ph-title {
	color: var(--ql-text, #111);
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	max-width: 64%;
}

.tin-item {
	display: flex;
	align-items: center;
	gap: 10px;
	padding: 10px 14px;
	border-bottom: 1px solid #f3f4f6;
}

.tin-item:last-child {
	border-bottom: none;
}

.tin-thumb {
	width: 44px;
	height: 38px;
	border-radius: 6px;
	background: #f3f4f6;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 17px;
	flex-shrink: 0;
	border: 1px solid #e5e7eb;
	position: relative;
	overflow: hidden;
}

.vdot {
	position: absolute;
	top: -4px;
	right: -4px;
	width: 15px;
	height: 15px;
	border-radius: 50%;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 7px;
	font-weight: 700;
	border: 1.5px solid #fff;
}

.tin-thumb-badge {
	position: absolute;
	top: 4px;
	left: 4px;
	background: #FBBF24;
	color: #78350f;
	font-size: 9px;
	font-weight: 800;
	padding: 1px 6px;
	border-radius: 4px;
	line-height: 1.4;
}

.tin-info {
	flex: 1;
	min-width: 0;
}

.tin-ttl {
	font-size: 12px;
	font-weight: 600;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	color: var(--ql-text, #111);
}

.tin-meta {
	display: flex;
	align-items: center;
	gap: 5px;
	margin-top: 3px;
	flex-wrap: wrap;
}

.tin-gia {
	font-size: 11px;
	color: #6b7280;
}

.tin-rt {
	text-align: right;
	flex-shrink: 0;
}

.tin-views {
	font-size: 13px;
	font-weight: 600;
	color: var(--ql-text, #111);
}

.tin-vsub {
	font-size: 10px;
	color: #9ca3af;
}

.empty-state {
	padding: 24px 16px;
	text-align: center;
	color: #9ca3af;
	font-size: 12px;
}
</style>

<?php
if (!defined('ABSPATH')) exit;

$custom_user = function_exists('custom_get_user') ? custom_get_user() : null;

if (!$custom_user) {
    echo '<div class="db"><p>Vui lòng đăng nhập để xem tổng quan tài khoản.</p></div>';
    return;
}

$data = bds_get_dashboard_overview_data($custom_user->id);
$so_du            = $data['balance']['main']; 
$tin_hien_thi     = $data['listing_stats']['hien_thi'];
$tin_vip_count    = $data['listing_stats']['vip'];
$tin_thuong_count = $data['listing_stats']['thuong'];
$tin_het_han_count= $data['listing_stats']['het_han'];

$luot_xem_hom_nay = $data['views_stats']['hom_nay'];
$luot_xem_thang   = $data['views_stats']['thang'];
$luot_yeu_thich   = $data['favorites']['tong'];
$luot_yt_thang    = $data['favorites']['thang'];
$goi_ten          = $data['plan']['ten_hien_thi'];
$goi_loai         = $data['plan']['plan'] === 'vip' ? 'vip_gold' : ($data['plan']['plan'] === 'pro' ? 'vip_silver' : 'free');
$goi_het_han      = $data['plan']['expired_at'];
$ngay_con_lai     = $data['plan']['ngay_con_lai'];
$phan_tram_han    = $data['plan']['phan_tram_han'];
$luot_day_vip     = $data['push']['vip_con_lai'];
$luot_day_thuong  = $data['push']['thuong_con_lai'];
$push_history = $data['recent_pushes'];
$tin_gan_day  = $data['recent_listings'];

function ql_goi_badge($loai) {
    switch ($loai) {
        case 'vip_gold':   return ['bdg-gold',  'ti-crown', 'VIP Gold'];
        case 'vip_silver': return ['bdg-silver','ti-award', 'VIP Silver'];
        default:           return ['bdg-gray',  'ti-user',  'Miễn phí'];
    }
}
function ql_tin_status($s) {
    switch ($s) {
        case 'hien_thi':    return ['bdg-green','Đang hiển thị'];
        case 'sap_het_han': return ['bdg-amber','Sắp hết hạn'];
        case 'het_han':     return ['bdg-red',  'Hết hạn'];
        default:            return ['bdg-gray',  'Chờ duyệt'];
    }
}
[$goi_badge_class, $goi_icon, $goi_label] = ql_goi_badge($goi_loai);
?>

<div class="db">
<div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px;margin-bottom:16px;">
    <div>
        <div style="font-size:11px;color:#9ca3af;margin-bottom:3px;text-transform:uppercase;letter-spacing:.5px;font-weight:500;">Bảng điều khiển</div>
        <h1 style="font-size:20px;font-weight:700;color:var(--ql-text,#111);line-height:1.2;margin:0;">
            Tổng quan
        </h1>
    </div>
    <div style="display:flex;align-items:center;gap:6px;">
        <span style="font-size:11px;padding:4px 10px;background:#DCFCE7;color:#166534;border-radius:20px;font-weight:600;display:inline-flex;align-items:center;gap:4px;">
            <i class="ti ti-circle-check" style="font-size:12px"></i> Hoạt động
        </span>
    </div>
</div>

<div class="stats-grid">
    <div class="scard">
        <div class="scard-icon ic-red"><i class="ti ti-building" aria-hidden="true"></i></div>
        <div class="scard-val"><?php echo $tin_hien_thi; ?></div>
        <div class="scard-lbl">Tin đang hiển thị</div>
        <div class="scard-sub"><?php echo $tin_vip_count; ?> VIP · <?php echo $tin_thuong_count; ?> thường</div>
    </div>
    <div class="scard">
        <div class="scard-icon ic-amber"><i class="ti ti-clock-off" aria-hidden="true"></i></div>
        <div class="scard-val"><?php echo $tin_het_han_count; ?></div>
        <div class="scard-lbl">Tin hết hạn</div>
        <div class="scard-sub">Cần gia hạn</div>
    </div>
    <div class="scard">
        <div class="scard-icon ic-blue"><i class="ti ti-eye" aria-hidden="true"></i></div>
        <div class="scard-val"><?php echo number_format($luot_xem_hom_nay); ?></div>
        <div class="scard-lbl">Lượt xem hôm nay</div>
        <div class="scard-sub">Tháng này: <?php echo number_format($luot_xem_thang); ?></div>
    </div>
    <div class="scard">
        <div class="scard-icon ic-purple"><i class="ti ti-heart" aria-hidden="true"></i></div>
        <div class="scard-val"><?php echo number_format($luot_yeu_thich); ?></div>
        <div class="scard-lbl">Lượt yêu thích</div>
        <div class="scard-sub">Tháng này: <?php echo number_format($luot_yt_thang); ?></div>
    </div>
</div>

<div class="bal-row">
    <div>
        <div class="bal-lbl">Số dư tài khoản</div>
        <div class="bal-amt"><?php echo number_format($so_du); ?> ₫</div>
        <div class="bal-sub">Tài khoản tin đăng · Cập nhật vừa xong</div>
    </div>
    <div class="bal-btns">
        <a class="btn-red" href="<?php echo esc_url(add_query_arg(['tab'=>'nap-tien'], get_permalink())); ?>">
            <i class="ti ti-plus" style="font-size:13px"></i> Nạp tiền
        </a>
        <a class="btn-bdr" href="<?php echo esc_url(add_query_arg(['tab'=>'lich-su'], get_permalink())); ?>">
            <i class="ti ti-receipt" style="font-size:13px"></i> Lịch sử
        </a>
    </div>
</div>

<div class="row2">

    <div class="card">
        <div class="card-hd">
            <div class="card-hd-t"><i class="ti ti-crown" aria-hidden="true"></i> Gói đang sử dụng</div>
            <a class="lnk-red" href="#">Nâng cấp <i class="ti ti-chevron-right" style="font-size:11px"></i></a>
        </div>
        <div class="pkg-body">
            <div class="pkg-top">
                <div class="pkg-ic"><i class="ti <?php echo esc_attr($goi_icon); ?>" aria-hidden="true"></i></div>
                <div>
                    <div class="pkg-name"><?php echo esc_html($goi_ten); ?></div>
                    <span class="bdg <?php echo esc_attr($goi_badge_class); ?>">
                        <i class="ti <?php echo esc_attr($goi_icon); ?>" style="font-size:9px"></i>
                        <?php echo esc_html($goi_label); ?>
                    </span>
                </div>
            </div>
            <?php if ($goi_het_han): ?>
            <div class="prog-wrap">
                <div class="prog-lbl">
                    <span>Thời hạn còn lại</span>
                    <span><?php echo $ngay_con_lai; ?> ngày</span>
                </div>
                <div class="prog-bar">
                    <div class="prog-fill fill-gold" style="width:<?php echo $phan_tram_han; ?>%"></div>
                </div>
            </div>
            <div class="pkg-rows">
                <div class="pkg-row">
                    <span class="pkg-row-lbl"><i class="ti ti-calendar" style="font-size:13px"></i> Ngày hết hạn</span>
                    <span class="pkg-row-val"><?php echo date('d/m/Y', strtotime($goi_het_han)); ?></span>
                </div>
            </div>
            <?php else: ?>
            <div class="empty-state">Bạn đang dùng gói miễn phí. Nâng cấp để có thêm ưu đãi.</div>
            <?php endif; ?>
        </div>
    </div>

    <div class="card">
        <div class="card-hd">
            <div class="card-hd-t"><i class="ti ti-rocket" aria-hidden="true"></i> Lượt đẩy tin</div>
            <a class="lnk-red" href="#">Mua thêm <i class="ti ti-chevron-right" style="font-size:11px"></i></a>
        </div>
        <div class="push-body">
            <div class="push-grid">
                <div class="push-item">
                    <div class="push-item-lbl" style="color:#854F0B;">
                        <i class="ti ti-crown" style="font-size:12px;color:#BA7517"></i> Đẩy tin VIP
                    </div>
                    <div class="push-item-val"><?php echo $luot_day_vip; ?></div>
                    <div class="push-item-sub">lượt còn lại</div>
                </div>
                <div class="push-item">
                    <div class="push-item-lbl">
                        <i class="ti ti-speakerphone" style="font-size:12px;color:#378ADD"></i> Đẩy tin thường
                    </div>
                    <div class="push-item-val"><?php echo $luot_day_thuong; ?></div>
                    <div class="push-item-sub">lượt còn lại</div>
                </div>
            </div>
            <div style="border-top:1px solid #f3f4f6;padding-top:10px;">
                <div style="font-size:12px;color:#6b7280;margin-bottom:7px;">Lịch sử đẩy tin gần đây</div>
                <?php if (empty($push_history)): ?>
                    <div class="empty-state">Chưa có lượt đẩy tin nào.</div>
                <?php else: ?>
                    <?php foreach ($push_history as $ph): $iv = $ph['loai'] === 'vip'; ?>
                    <div class="ph-item">
                        <span class="ph-title"><?php echo esc_html($ph['title']); ?></span>
                        <span class="bdg <?php echo $iv ? 'bdg-gold' : 'bdg-blue'; ?>">
                            <i class="ti <?php echo $iv ? 'ti-crown' : 'ti-speakerphone'; ?>" style="font-size:9px"></i>
                            <?php echo $iv ? 'VIP' : 'Thường'; ?>
                        </span>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-hd">
        <div class="card-hd-t"><i class="ti ti-building" aria-hidden="true"></i> Tin đăng gần đây</div>
        <a class="lnk-red" href="http://localhost/nhadat247/quan-ly-tai-khoan/quan-ly-tin">Xem tất cả <i class="ti ti-chevron-right" style="font-size:11px"></i></a>
    </div>
    <?php if (empty($tin_gan_day)): ?>
        <div class="empty-state">Bạn chưa có tin đăng nào. <a href="<?php echo esc_url(home_url('/dang-tin')); ?>" style="color:var(--red-dk);">Đăng tin ngay</a></div>
    <?php else: ?>
        <?php foreach ($tin_gan_day as $tin):
            $is_vip = $tin['loai'] === 'vip';
            [$sc, $sl] = ql_tin_status($tin['status']);
        ?>
        <div class="tin-item">
            <div class="tin-thumb">
                <?php if (!empty($tin['thumb_url'])): ?>
                    <img src="<?php echo esc_url($tin['thumb_url']); ?>" alt="" style="width:100%;height:100%;object-fit:cover;border-radius:6px;">
                <?php else: ?>
                    <i class="ti ti-photo" style="color:#c1c5cb;font-size:18px"></i>
                <?php endif; ?>
                <?php if ($is_vip): ?><div class="tin-thumb-badge">VIP</div><?php endif; ?>
            </div>
            <div class="tin-info">
                <div class="tin-ttl"><?php echo esc_html($tin['title']); ?></div>
                <div class="tin-meta">
                    <span class="bdg <?php echo esc_attr($sc); ?>" style="font-size:10px;padding:1px 6px;">
                        <?php echo esc_html($sl); ?>
                    </span>
                    <?php if ($is_vip): ?>
                    <span class="bdg bdg-vip" style="font-size:10px;padding:1px 6px;">
                        <i class="ti ti-star" style="font-size:9px"></i> VIP
                    </span>
                    <?php endif; ?>
                    <span class="tin-gia">Giá: <strong style="color:#e84118;"><?php echo esc_html($tin['gia']); ?></strong></span>
                </div>
            </div>
            <div class="tin-rt">
                <div class="tin-views"><?php echo number_format($tin['views']); ?></div>
                <div class="tin-vsub">lượt xem</div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</div>