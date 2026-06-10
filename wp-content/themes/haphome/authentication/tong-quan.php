<?php
if (!defined('ABSPATH')) exit;
$user = wp_get_current_user();

$so_du            = 1250000;
$luot_day_vip     = 8;
$luot_vip_tong    = 15;
$luot_day_thuong  = 24;
$luot_thuong_tong = 30;
$goi_ten          = 'Gói Chuyên Nghiệp';
$goi_loai         = 'vip_gold';
$goi_het_han      = '2026-07-02';
$goi_gioi_han     = 50;

$tin_hien_thi     = 12;
$tin_vip_count    = 8;
$tin_thuong_count = 4;
$tin_het_han_count= 3;

$luot_xem_hom_nay = 248;
$luot_xem_thang   = 4120;
$luot_yeu_thich   = 37;
$luot_yt_thang    = 312;

$xem_vip          = 1240;
$xem_thuong       = 496;
$xem_tong         = $xem_vip + $xem_thuong;
$pct_xem_vip      = round($xem_vip / $xem_tong * 100);
$pct_xem_thuong   = 100 - $pct_xem_vip;

$chart_data = [30, 44, 26, 56, 38, 48, 60];
$chart_days = ['T2','T3','T4','T5','T6','T7','CN'];
$chart_tong = array_sum($chart_data);
$chart_max  = max($chart_data);

$ngay_con_lai  = (new DateTime())->diff(new DateTime($goi_het_han))->days;
$phan_tram_han = min(100, round($ngay_con_lai / 30 * 100));

$luot_vip_da_dung    = $luot_vip_tong    - $luot_day_vip;
$luot_thuong_da_dung = $luot_thuong_tong - $luot_day_thuong;
$pct_vip    = round($luot_vip_da_dung    / $luot_vip_tong    * 100);
$pct_thuong = round($luot_thuong_da_dung / $luot_thuong_tong * 100);

$tin_gan_day = [
    ['title'=>'Căn hộ 2PN Quận 7, 68m²',   'loai'=>'vip3',  'gia'=>'3,5 tỷ',       'views'=>128, 'status'=>'hien_thi'],
    ['title'=>'Nhà phố Bình Thạnh, 4 tầng', 'loai'=>'vip1',  'gia'=>'6,2 tỷ',       'views'=>74,  'status'=>'hien_thi'],
    ['title'=>'Biệt thự Thảo Điền 320m²',   'loai'=>'vip3',  'gia'=>'28 tỷ',        'views'=>61,  'status'=>'hien_thi'],
    ['title'=>'Đất nền Nhà Bè 120m²',       'loai'=>'thuong','gia'=>'1,8 tỷ',       'views'=>52,  'status'=>'sap_het_han'],
    ['title'=>'Văn phòng cho thuê Q1',       'loai'=>'thuong','gia'=>'25 tr/tháng',  'views'=>31,  'status'=>'het_han'],
];

$push_history = [
    ['title'=>'Căn hộ 2PN Quận 7',   'loai'=>'vip'],
    ['title'=>'Biệt thự Thảo Điền',  'loai'=>'vip'],
    ['title'=>'Đất nền Nhà Bè',      'loai'=>'thuong'],
];

function ql_goi_badge($loai) {
    switch ($loai) {
        case 'vip_gold':   return ['bdg-gold',  'ti-crown', 'VIP Gold'];
        case 'vip_silver': return ['bdg-silver','ti-award', 'VIP Silver'];
        default:           return ['bdg-gray',  'ti-user',  'Miễn phí'];
    }
}
function ql_tin_loai($loai) {
    switch ($loai) {
        case 'vip3': return ['bdg-vip3','ti-crown',       'VIP 3','vip3-dot','V3'];
        case 'vip1': return ['bdg-vip1','ti-crown',       'VIP 1','vip1-dot','V1'];
        default:     return ['bdg-gray','ti-speakerphone','Thường','',       ''];
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

.qbar {
	display: flex;
	gap: 8px;
	flex-wrap: wrap;
	margin-bottom: 14px;
}

.qbar-btn {
	display: inline-flex;
	align-items: center;
	gap: 5px;
	padding: 8px 16px;
	border-radius: 8px;
	font-size: 13px;
	font-weight: 600;
	cursor: pointer;
	text-decoration: none;
	border: none;
}

.qbar-primary {
	background: var(--red);
	color: #fff;
}

.qbar-outline {
	background: #fff;
	color: var(--ql-text, #111);
	border: 1px solid var(--ql-border, #e5e7eb);
}

.qbar-outline:hover {
	background: #f9fafb;
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

.bdg-vip3 {
	background: #FCEBEB;
	color: #791F1F;
}

.bdg-vip1 {
	background: #FAEEDA;
	color: #633806;
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

.vdot-v3 {
	background: #E24B4A;
	color: #fff;
}

.vdot-v1 {
	background: #BA7517;
	color: #fff;
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

.chart-wrap {
	padding: 12px 16px 0;
}

.chart-sub {
	font-size: 11px;
	color: #6b7280;
	margin-bottom: 10px;
}

.chart-bars {
	display: flex;
	align-items: flex-end;
	gap: 5px;
	height: 64px;
}

.bar-col {
	display: flex;
	flex-direction: column;
	align-items: center;
	gap: 3px;
	flex: 1;
}

.cbar {
	width: 100%;
	border-radius: 3px 3px 0 0;
	background: #f3f4f6;
}

.cbar.act {
	background: var(--red);
}

.bday {
	font-size: 10px;
	color: #9ca3af;
}

.bday.act {
	color: var(--red-dk);
	font-weight: 600;
}

.chart-seg {
	padding: 12px 16px;
}

.seg-row {
	margin-bottom: 7px;
}

.seg-lbl-row {
	display: flex;
	justify-content: space-between;
	font-size: 11px;
	color: #6b7280;
	margin-bottom: 3px;
}

.seg-lbl-row span:last-child {
	font-weight: 600;
	color: var(--ql-text, #111);
}
</style>

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

<div class="qbar">
    <a class="qbar-btn qbar-primary" href="<?php echo esc_url(home_url('/dang-tin')); ?>">
        <i class="ti ti-plus" style="font-size:14px"></i> Đăng tin mới
    </a>
    <a class="qbar-btn qbar-outline" href="<?php echo esc_url(add_query_arg(['tab'=>'tin-dang'], get_permalink())); ?>">
        <i class="ti ti-list" style="font-size:14px"></i> Quản lý tin
    </a>
    <a class="qbar-btn qbar-outline" href="<?php echo esc_url(add_query_arg(['tab'=>'day-tin'], get_permalink())); ?>">
        <i class="ti ti-rocket" style="font-size:14px"></i> Đẩy tin ngay
    </a>
    <a class="qbar-btn qbar-outline" href="<?php echo esc_url(add_query_arg(['tab'=>'thong-ke'], get_permalink())); ?>">
        <i class="ti ti-chart-bar" style="font-size:14px"></i> Thống kê
    </a>
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
                <div class="pkg-row">
                    <span class="pkg-row-lbl"><i class="ti ti-building" style="font-size:13px"></i> Giới hạn tin</span>
                    <span class="pkg-row-val"><?php echo $goi_gioi_han; ?> tin / tháng</span>
                </div>
                <div class="pkg-row">
                    <span class="pkg-row-lbl"><i class="ti ti-photo" style="font-size:13px"></i> Ảnh mỗi tin</span>
                    <span class="pkg-row-val">Tối đa 20 ảnh</span>
                </div>
                <div class="pkg-row">
                    <span class="pkg-row-lbl"><i class="ti ti-refresh" style="font-size:13px"></i> Tự động đẩy tin</span>
                    <span class="pkg-row-val green">Có hỗ trợ</span>
                </div>
            </div>
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
                    <div style="margin-top:8px;">
                        <div class="prog-lbl" style="font-size:10px;margin-bottom:3px;">
                            <span>Đã dùng <?php echo $luot_vip_da_dung; ?>/<?php echo $luot_vip_tong; ?></span>
                        </div>
                        <div class="prog-bar"><div class="prog-fill fill-gold" style="width:<?php echo $pct_vip; ?>%"></div></div>
                    </div>
                </div>
                <div class="push-item">
                    <div class="push-item-lbl">
                        <i class="ti ti-speakerphone" style="font-size:12px;color:#378ADD"></i> Đẩy tin thường
                    </div>
                    <div class="push-item-val"><?php echo $luot_day_thuong; ?></div>
                    <div class="push-item-sub">lượt còn lại</div>
                    <div style="margin-top:8px;">
                        <div class="prog-lbl" style="font-size:10px;margin-bottom:3px;">
                            <span>Đã dùng <?php echo $luot_thuong_da_dung; ?>/<?php echo $luot_thuong_tong; ?></span>
                        </div>
                        <div class="prog-bar"><div class="prog-fill fill-blue" style="width:<?php echo $pct_thuong; ?>%"></div></div>
                    </div>
                </div>
            </div>
            <div style="border-top:1px solid #f3f4f6;padding-top:10px;">
                <div style="font-size:12px;color:#6b7280;margin-bottom:7px;">Lịch sử đẩy tin gần đây</div>
                <?php foreach ($push_history as $ph): $iv = $ph['loai'] === 'vip'; ?>
                <div class="ph-item">
                    <span class="ph-title"><?php echo esc_html($ph['title']); ?></span>
                    <span class="bdg <?php echo $iv ? 'bdg-gold' : 'bdg-blue'; ?>">
                        <i class="ti <?php echo $iv ? 'ti-crown' : 'ti-speakerphone'; ?>" style="font-size:9px"></i>
                        <?php echo $iv ? 'VIP' : 'Thường'; ?>
                    </span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="row2">

    <div class="card">
        <div class="card-hd">
            <div class="card-hd-t"><i class="ti ti-building" aria-hidden="true"></i> Tin đăng gần đây</div>
            <a class="lnk-red" href="#">Xem tất cả <i class="ti ti-chevron-right" style="font-size:11px"></i></a>
        </div>
        <?php foreach ($tin_gan_day as $tin):
            [$lc, $li, $ll, $dc, $dt] = ql_tin_loai($tin['loai']);
            [$sc, $sl] = ql_tin_status($tin['status']);
            $dot_cls = $dc === 'vip3-dot' ? 'vdot vdot-v3' : ($dc === 'vip1-dot' ? 'vdot vdot-v1' : '');
        ?>
        <div class="tin-item">
            <div class="tin-thumb">
                <i class="ti ti-building" style="color:#9ca3af"></i>
                <?php if ($dot_cls): ?><div class="<?php echo $dot_cls; ?>"><?php echo $dt; ?></div><?php endif; ?>
            </div>
            <div class="tin-info">
                <div class="tin-ttl"><?php echo esc_html($tin['title']); ?></div>
                <div class="tin-meta">
                    <span class="bdg <?php echo esc_attr($lc); ?>" style="font-size:10px;padding:1px 6px;">
                        <i class="ti <?php echo esc_attr($li); ?>" style="font-size:9px"></i> <?php echo esc_html($ll); ?>
                    </span>
                    <span class="bdg <?php echo esc_attr($sc); ?>" style="font-size:10px;padding:1px 6px;">
                        <?php echo esc_html($sl); ?>
                    </span>
                    <span class="tin-gia"><?php echo esc_html($tin['gia']); ?></span>
                </div>
            </div>
            <div class="tin-rt">
                <div class="tin-views"><?php echo number_format($tin['views']); ?></div>
                <div class="tin-vsub">lượt xem</div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="card">
        <div class="card-hd">
            <div class="card-hd-t"><i class="ti ti-chart-bar" aria-hidden="true"></i> Lượt xem 7 ngày</div>
        </div>
        <div class="chart-wrap">
            <div class="chart-sub">Tổng: <strong style="color:var(--ql-text,#111);font-weight:600;"><?php echo number_format($chart_tong); ?> lượt</strong></div>
            <div class="chart-bars">
                <?php foreach ($chart_data as $i => $val):
                    $h    = round($val / $chart_max * 60);
                    $last = ($i === count($chart_data) - 1);
                ?>
                <div class="bar-col">
                    <div class="cbar <?php echo $last ? 'act' : ''; ?>" style="height:<?php echo $h; ?>px;"></div>
                    <div class="bday <?php echo $last ? 'act' : ''; ?>"><?php echo $chart_days[$i]; ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="chart-seg">
            <div style="font-size:12px;color:#6b7280;margin-bottom:8px;">Phân loại lượt xem</div>
            <div class="seg-row">
                <div class="seg-lbl-row">
                    <span>Tin VIP</span>
                    <span><?php echo number_format($xem_vip); ?> lượt (<?php echo $pct_xem_vip; ?>%)</span>
                </div>
                <div class="prog-bar"><div class="prog-fill fill-gold" style="width:<?php echo $pct_xem_vip; ?>%"></div></div>
            </div>
            <div class="seg-row" style="margin-bottom:0;">
                <div class="seg-lbl-row">
                    <span>Tin thường</span>
                    <span><?php echo number_format($xem_thuong); ?> lượt (<?php echo $pct_xem_thuong; ?>%)</span>
                </div>
                <div class="prog-bar"><div class="prog-fill fill-blue" style="width:<?php echo $pct_xem_thuong; ?>%"></div></div>
            </div>
        </div>
    </div>
</div>

</div>