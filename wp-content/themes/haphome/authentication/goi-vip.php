<?php
if (!defined('ABSPATH')) exit;

global $wpdb;
$user_id = get_current_user_id();

$wallet = $wpdb->get_row($wpdb->prepare(
    "SELECT balance_main, balance_bonus FROM {$wpdb->prefix}custom_wallets WHERE user_id = %d",
    $user_id
));
$balance_main  = $wallet ? (float)$wallet->balance_main  : 0;
$balance_bonus = $wallet ? (float)$wallet->balance_bonus : 0;
$balance_total = $balance_main + $balance_bonus;

$current_plan = $wpdb->get_row($wpdb->prepare(
    "SELECT * FROM {$wpdb->prefix}custom_member_plans
     WHERE user_id = %d AND status = 'active' AND expired_at >= CURDATE()
     ORDER BY expired_at DESC LIMIT 1",
    $user_id
));

$plans = [
    [
        'id'            => 'vip_silver',
        'db_level'      => 'vip1',
        'name'          => 'VIP Bạc',
        'icon'          => '🥈',
        'price_month'   => 600_000,
        'price_day'     => 20_000,
        'color'         => '#475569',
        'text'          => '#1E293B',
        'bg'            => '#F1F5F9',
        'border'        => '#CBD5E1',
        'gradient'      => 'linear-gradient(135deg,#64748B,#334155)',
        'badge'         => '',
        'reach'         => '~5.000 lượt/ngày',
        'push_daily'    => 3,
        'golden_slots'  => 1,
        'search_boost'  => 2,
        'perks'         => [
            ['ok'=>true,  'text'=>'3 lượt đẩy tin / ngày'],
            ['ok'=>true,  'text'=>'Chọn 1 khung giờ vàng / ngày'],
            ['ok'=>true,  'text'=>'Ưu tiên tìm kiếm ×2'],
            ['ok'=>true,  'text'=>'Huy hiệu VIP Bạc trên tin'],
            ['ok'=>true,  'text'=>'Thống kê lượt xem cơ bản'],
            ['ok'=>false, 'text'=>'Không hiện quảng cáo trang tin'],
            ['ok'=>false, 'text'=>'Đẩy tin tự động theo lịch'],
            ['ok'=>false, 'text'=>'Hỗ trợ chuyên viên riêng'],
        ],
    ],
    [
        'id'            => 'vip_gold',
        'db_level'      => 'vip2',
        'name'          => 'VIP Vàng',
        'icon'          => '🥇',
        'price_month'   => 1_500_000,
        'price_day'     => 50_000,
        'color'         => '#D97706',
        'text'          => '#78350F',
        'bg'            => '#FEF3C7',
        'border'        => '#FCD34D',
        'gradient'      => 'linear-gradient(135deg,#F59E0B,#B45309)',
        'badge'         => 'Phổ biến',
        'reach'         => '~20.000 lượt/ngày',
        'push_daily'    => 7,
        'golden_slots'  => 2,
        'search_boost'  => 5,
        'perks'         => [
            ['ok'=>true,  'text'=>'7 lượt đẩy tin / ngày'],
            ['ok'=>true,  'text'=>'Chọn 2 khung giờ vàng / ngày'],
            ['ok'=>true,  'text'=>'Ưu tiên tìm kiếm ×5 (top 5)'],
            ['ok'=>true,  'text'=>'Không hiện quảng cáo trang tin'],
            ['ok'=>true,  'text'=>'Thống kê lượt xem chi tiết'],
            ['ok'=>true,  'text'=>'Đẩy tin tự động theo lịch'],
            ['ok'=>false, 'text'=>'Nhân đôi hiển thị (×2)'],
            ['ok'=>false, 'text'=>'Hỗ trợ chuyên viên riêng'],
        ],
    ],
    [
        'id'            => 'vip_diamond',
        'db_level'      => 'vip3',
        'name'          => 'VIP Kim Cương',
        'icon'          => '💎',
        'price_month'   => 3_000_000,
        'price_day'     => 100_000,
        'color'         => '#7C3AED',
        'text'          => '#4C1D95',
        'bg'            => '#EDE9FE',
        'border'        => '#C4B5FD',
        'gradient'      => 'linear-gradient(135deg,#7C3AED,#4C1D95)',
        'badge'         => 'Hiệu quả nhất',
        'reach'         => '~50.000 lượt/ngày',
        'push_daily'    => 15,
        'golden_slots'  => 4,
        'search_boost'  => 10,
        'perks'         => [
            ['ok'=>true,  'text'=>'15 lượt đẩy tin / ngày'],
            ['ok'=>true,  'text'=>'Chọn 4 khung giờ vàng / ngày'],
            ['ok'=>true,  'text'=>'Ưu tiên tìm kiếm ×10 — vị trí số 1'],
            ['ok'=>true,  'text'=>'Nhân đôi hiển thị (×2) toàn trang'],
            ['ok'=>true,  'text'=>'Không hiện quảng cáo trang tin'],
            ['ok'=>true,  'text'=>'Đẩy tin tự động theo lịch'],
            ['ok'=>true,  'text'=>'Thống kê nâng cao + báo cáo tuần'],
            ['ok'=>true,  'text'=>'Hỗ trợ chuyên viên riêng 24/7'],
        ],
    ],
];

$golden_hours = [
    ['id'=>'gh1',  'label'=>'07:00 – 08:00', 'desc'=>'Sáng sớm',      'icon'=>'🌅', 'hot'=>false],
    ['id'=>'gh2',  'label'=>'08:00 – 09:00', 'desc'=>'Cao điểm sáng', 'icon'=>'🔥', 'hot'=>true],
    ['id'=>'gh3',  'label'=>'09:00 – 10:00', 'desc'=>'Buổi sáng',     'icon'=>'☀️', 'hot'=>false],
    ['id'=>'gh4',  'label'=>'11:30 – 12:30', 'desc'=>'Giờ nghỉ trưa', 'icon'=>'🍱', 'hot'=>true],
    ['id'=>'gh5',  'label'=>'17:00 – 18:00', 'desc'=>'Tan làm',       'icon'=>'🔥', 'hot'=>true],
    ['id'=>'gh6',  'label'=>'18:00 – 19:00', 'desc'=>'Cao điểm tối',  'icon'=>'🔥', 'hot'=>true],
    ['id'=>'gh7',  'label'=>'19:00 – 20:00', 'desc'=>'Buổi tối',      'icon'=>'🌙', 'hot'=>false],
    ['id'=>'gh8',  'label'=>'20:00 – 21:30', 'desc'=>'Tối muộn',      'icon'=>'⭐', 'hot'=>false],
];

$durations = [
    ['months'=>1,  'days'=>30,  'label'=>'1 tháng',  'discount'=>0,  'note'=>''],
    ['months'=>2,  'days'=>60,  'label'=>'2 tháng',  'discount'=>5,  'note'=>''],
    ['months'=>3,  'days'=>90,  'label'=>'3 tháng',  'discount'=>10, 'note'=>'Tiết kiệm 10%'],
    ['months'=>6,  'days'=>180, 'label'=>'6 tháng',  'discount'=>15, 'note'=>'Tiết kiệm 15%'],
    ['months'=>12, 'days'=>365, 'label'=>'12 tháng', 'discount'=>20, 'note'=>'Tiết kiệm 20%'],
];
?>

<style>
:root {
	--gv-radius: 12px;
	--gv-shadow: 0 2px 12px rgba(0, 0, 0, .07);
	--gv-shadow-hover: 0 6px 24px rgba(0, 0, 0, .12);
}

.gv-hero {
	position: relative;
	overflow: hidden;
	background: linear-gradient(135deg, #0d1b3e 0%, #1e3a6e 60%, #2563eb 100%);
	padding: 28px 28px 0;
}

.gv-hero-deco {
	position: absolute;
	border-radius: 50%;
	pointer-events: none;
	opacity: .06;
}

.gv-hero-deco-1 {
	width: 420px;
	height: 420px;
	background: #fff;
	top: -150px;
	right: -60px;
}

.gv-hero-deco-2 {
	width: 200px;
	height: 200px;
	background: #fff;
	bottom: -60px;
	left: 35%;
}

.gv-hero-inner {
	position: relative;
	z-index: 1;
	display: flex;
	align-items: flex-start;
	justify-content: space-between;
	gap: 24px;
	flex-wrap: wrap;
}

.gv-hero-left {
	flex: 1;
	min-width: 220px;
}

.gv-eyebrow {
	display: inline-flex;
	align-items: center;
	gap: 6px;
	background: rgba(255, 255, 255, .12);
	border: 1px solid rgba(255, 255, 255, .2);
	border-radius: 20px;
	padding: 4px 12px;
	font-size: 11px;
	font-weight: 700;
	color: #fbbf24;
	letter-spacing: .5px;
	text-transform: uppercase;
	margin-bottom: 10px;
}

.gv-hero-title {
	font-size: 26px;
	font-weight: 800;
	color: #fff;
	line-height: 1.25;
	margin-bottom: 8px;
}

.gv-hero-title span {
	background: linear-gradient(90deg, #fbbf24, #f97316);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	background-clip: text;
}

.gv-hero-sub {
	font-size: 13px;
	color: rgba(255, 255, 255, .72);
	line-height: 1.7;
	max-width: 440px;
	margin-bottom: 20px;
}

.gv-hero-stats {
	display: flex;
	align-items: center;
	gap: 0;
	flex-wrap: wrap;
}

.gv-hstat {
	padding: 0 20px 0 0;
}

.gv-hstat-val {
	font-size: 22px;
	font-weight: 800;
	color: #fff;
	line-height: 1;
}

.gv-hstat-lbl {
	font-size: 10px;
	color: rgba(255, 255, 255, .55);
	text-transform: uppercase;
	letter-spacing: .5px;
	margin-top: 2px;
}

.gv-hstat-sep {
	width: 1px;
	height: 34px;
	background: rgba(255, 255, 255, .15);
	margin: 0 20px 0 0;
	align-self: center;
}

.gv-bal-card {
	background: rgba(255, 255, 255, .1);
	border: 1px solid rgba(255, 255, 255, .2);
	backdrop-filter: blur(8px);
	border-radius: 12px;
	padding: 16px 20px;
	min-width: 220px;
	flex-shrink: 0;
	color: #fff;
}

.gv-bal-head {
	font-size: 10px;
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: .5px;
	color: rgba(255, 255, 255, .6);
	margin-bottom: 10px;
	display: flex;
	align-items: center;
	gap: 5px;
}

.gv-bal-row {
	display: flex;
	justify-content: space-between;
	font-size: 12px;
	margin-bottom: 5px;
}

.gv-bal-lbl {
	color: rgba(255, 255, 255, .65);
}

.gv-bal-val {
	font-weight: 700;
}

.gv-bal-div {
	height: 1px;
	background: rgba(255, 255, 255, .15);
	margin: 10px 0;
}

.gv-bal-total {
	display: flex;
	justify-content: space-between;
	align-items: baseline;
	margin-bottom: 12px;
}

.gv-bal-total-lbl {
	font-size: 12px;
	font-weight: 600;
	color: rgba(255, 255, 255, .85);
}

.gv-bal-total-val {
	font-size: 22px;
	font-weight: 800;
	color: #fbbf24;
}

.gv-topup-btn {
	display: flex;
	align-items: center;
	justify-content: center;
	gap: 6px;
	width: 100%;
	padding: 9px;
	background: #ee0033;
	border: none;
	border-radius: 7px;
	color: #fff;
	font-size: 12px;
	font-weight: 700;
	text-decoration: none;
	cursor: pointer;
	font-family: inherit;
	box-sizing: border-box;
	transition: background .2s;
}

.gv-topup-btn:hover {
	background: #cc0022;
}

.gv-wave {
	position: relative;
	z-index: 1;
	margin-top: 22px;
	line-height: 0;
}

.gv-wave svg {
	display: block;
	width: 100%;
}

.gv-subnav {
	display: flex;
	gap: 0;
	padding: 0 28px;
	background: #fff;
	border-bottom: 1px solid var(--ql-border);
	margin-top: -1px;
	overflow-x: auto;
}

.gv-snav-tab {
	display: flex;
	align-items: center;
	gap: 6px;
	padding: 12px 16px;
	font-size: 12px;
	font-weight: 600;
	color: var(--ql-muted);
	text-decoration: none;
	border-bottom: 2.5px solid transparent;
	margin-bottom: -1px;
	transition: all .15s;
	cursor: pointer;
	white-space: nowrap;
}

.gv-snav-tab:hover {
	color: var(--ql-text);
}

.gv-snav-tab.active {
	color: #2563eb;
	border-bottom-color: #2563eb;
}

.gv-cur-plan {
	background: linear-gradient(135deg, #f0fdf4, #dcfce7);
	border: 1.5px solid #86efac;
	border-radius: 12px;
	padding: 16px 20px;
	margin-bottom: 24px;
	display: flex;
	align-items: center;
	justify-content: space-between;
	gap: 16px;
	flex-wrap: wrap;
}

.gv-cur-plan-left {
	display: flex;
	align-items: center;
	gap: 14px;
}

.gv-cur-plan-icon {
	width: 46px;
	height: 46px;
	border-radius: 12px;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 24px;
	background: #fff;
	box-shadow: 0 2px 8px rgba(0, 0, 0, .06);
	flex-shrink: 0;
}

.gv-cur-plan-label {
	font-size: 11px;
	color: #166534;
	font-weight: 600;
	margin-bottom: 2px;
}

.gv-cur-plan-name {
	font-size: 17px;
	font-weight: 800;
	color: #14532d;
}

.gv-cur-plan-exp {
	font-size: 11px;
	color: #16a34a;
	margin-top: 2px;
}

.gv-cur-plan-tags {
	display: flex;
	gap: 7px;
	flex-wrap: wrap;
}

.gv-cur-tag {
	display: flex;
	align-items: center;
	gap: 4px;
	font-size: 11px;
	font-weight: 600;
	padding: 4px 10px;
	border-radius: 20px;
	background: #fff;
	border: 1px solid #86efac;
	color: #166534;
}

.gv-body {
	padding: 24px;
}

.gv-step-lbl {
	display: flex;
	align-items: center;
	gap: 10px;
	margin-bottom: 16px;
}

.gv-step-num {
	width: 26px;
	height: 26px;
	border-radius: 50%;
	background: var(--ql-red);
	color: #fff;
	font-size: 12px;
	font-weight: 800;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-shrink: 0;
}

.gv-step-title {
	font-size: 14px;
	font-weight: 700;
	color: var(--ql-text);
}

.gv-step-sub {
	font-size: 11px;
	color: var(--ql-muted);
	margin-top: 1px;
}

.gv-section-div {
	height: 1px;
	background: #f3f4f6;
	margin: 28px 0;
}

.gv-plans {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 14px;
	margin-bottom: 28px;
}

.gv-plan-card {
	position: relative;
	border: 2px solid var(--ql-border);
	border-radius: var(--gv-radius);
	overflow: hidden;
	cursor: pointer;
	background: #fff;
	transition: border-color .15s, box-shadow .15s, transform .15s;
}

.gv-plan-card:hover {
	border-color: var(--pc);
	box-shadow: var(--gv-shadow-hover);
	transform: translateY(-2px);
}

.gv-plan-card.selected {
	border-color: var(--pc);
	box-shadow: var(--gv-shadow-hover);
	transform: translateY(-2px);
}

.gv-plan-badge-top {
	position: absolute;
	top: -1px;
	left: 50%;
	transform: translateX(-50%);
	background: var(--pc);
	color: #fff;
	font-size: 10px;
	font-weight: 700;
	padding: 3px 14px;
	border-radius: 0 0 8px 8px;
	white-space: nowrap;
	letter-spacing: .3px;
	box-shadow: 0 2px 6px rgba(0, 0, 0, .15);
}

.gv-plan-band {
	height: 5px;
	background: var(--pg);
}

.gv-plan-head {
	padding: 20px 18px 14px;
	text-align: center;
}

.gv-plan-emoji {
	font-size: 32px;
	display: block;
	margin-bottom: 6px;
}

.gv-plan-name {
	font-size: 16px;
	font-weight: 800;
	margin-bottom: 8px;
}

.gv-plan-reach {
	display: inline-flex;
	align-items: center;
	gap: 4px;
	font-size: 11px;
	font-weight: 600;
	padding: 3px 10px;
	border-radius: 20px;
	margin-bottom: 14px;
}

.gv-push-badge {
	display: flex;
	align-items: center;
	justify-content: center;
	gap: 6px;
	background: var(--pbg);
	border-radius: 8px;
	padding: 10px;
	margin-bottom: 10px;
}

.gv-push-count {
	font-size: 30px;
	font-weight: 900;
	line-height: 1;
}

.gv-push-label {
	font-size: 11px;
	line-height: 1.4;
	text-align: left;
}

.gv-push-label strong {
	display: block;
	font-size: 13px;
}

.gv-plan-price-row {
	display: flex;
	align-items: baseline;
	justify-content: center;
	gap: 4px;
	margin-bottom: 3px;
}

.gv-plan-price {
	font-size: 26px;
	font-weight: 900;
}

.gv-plan-per {
	font-size: 11px;
	color: var(--ql-muted);
}

.gv-plan-radio {
	position: absolute;
	top: 14px;
	right: 14px;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	border: 2px solid var(--ql-border);
	background: #fff;
	display: flex;
	align-items: center;
	justify-content: center;
	transition: all .15s;
}

.gv-plan-card.selected .gv-plan-radio {
	background: var(--pc);
	border-color: var(--pc);
}

.gv-plan-feats {
	padding: 14px 18px;
	border-top: 1px solid #f3f4f6;
	display: flex;
	flex-direction: column;
	gap: 7px;
}

.gv-feat-row {
	display: flex;
	align-items: flex-start;
	gap: 7px;
	font-size: 12px;
	color: var(--ql-faint);
}

.gv-feat-row.ok {
	color: #1e293b;
}

.gv-feat-icon {
	flex-shrink: 0;
	font-size: 13px;
	line-height: 1.4;
}

.gv-gh-grid {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 8px;
	margin-bottom: 8px;
}

.gv-gh-btn {
	position: relative;
	border: 1.5px solid var(--ql-border);
	border-radius: 8px;
	padding: 10px 8px;
	cursor: pointer;
	background: #fff;
	text-align: center;
	transition: all .15s;
	user-select: none;
}

.gv-gh-btn:hover {
	border-color: #94a3b8;
	background: #f8fafc;
}

.gv-gh-btn.selected {
	border-color: var(--ghc, #ee0033);
	background: var(--ghbg, #fff8f8);
}

.gv-gh-btn.disabled {
	opacity: .4;
	cursor: not-allowed;
	pointer-events: none;
}

.gv-gh-emoji {
	font-size: 18px;
	display: block;
	margin-bottom: 4px;
}

.gv-gh-time {
	font-size: 11px;
	font-weight: 700;
	color: var(--ql-text);
}

.gv-gh-desc {
	font-size: 10px;
	color: var(--ql-muted);
	margin-top: 1px;
}

.gv-gh-hot {
	position: absolute;
	top: -7px;
	right: -4px;
	background: #ee0033;
	color: #fff;
	font-size: 8px;
	font-weight: 700;
	padding: 1px 5px;
	border-radius: 4px;
}

.gv-gh-check {
	position: absolute;
	top: 6px;
	left: 6px;
	width: 14px;
	height: 14px;
	border-radius: 50%;
	background: var(--ghc, #ee0033);
	display: none;
	align-items: center;
	justify-content: center;
}

.gv-gh-btn.selected .gv-gh-check {
	display: flex;
}

.gv-gh-slots-info {
	font-size: 12px;
	color: var(--ql-muted);
	margin-top: 8px;
	display: flex;
	align-items: center;
	gap: 6px;
}

.gv-gh-slots-pill {
	background: #fee2e2;
	color: #991b1b;
	font-size: 11px;
	font-weight: 700;
	padding: 2px 9px;
	border-radius: 20px;
}

.gv-gh-slots-pill.ok {
	background: #d1fae5;
	color: #065f46;
}

.gv-dur-tabs {
	display: flex;
	gap: 8px;
	flex-wrap: wrap;
	margin-bottom: 24px;
}

.gv-dur-tab {
	position: relative;
	padding: 10px 18px;
	border: 1.5px solid var(--ql-border);
	border-radius: 8px;
	font-size: 13px;
	font-weight: 600;
	cursor: pointer;
	background: #fff;
	color: var(--ql-text);
	font-family: inherit;
	transition: all .15s;
	min-width: 90px;
	text-align: center;
}

.gv-dur-tab:hover {
	border-color: #94a3b8;
}

.gv-dur-tab.active {
	border-color: var(--dc, #ee0033);
	background: var(--dbg, #fff8f8);
	color: var(--dt, #791F1F);
}

.gv-dur-sub {
	font-size: 10px;
	font-weight: 500;
	color: var(--ql-muted);
	display: block;
	margin-top: 2px;
}

.gv-dur-tab.active .gv-dur-sub {
	color: var(--dt, #791F1F);
	opacity: .7;
}

.gv-dur-save {
	position: absolute;
	top: -9px;
	right: -2px;
	background: #ee0033;
	color: #fff;
	font-size: 9px;
	font-weight: 700;
	padding: 1px 6px;
	border-radius: 4px;
}

.gv-summary {
	background: linear-gradient(135deg, #f9fafb, #fff);
	border: 1px solid var(--ql-border);
	border-radius: 12px;
	overflow: hidden;
	margin-bottom: 20px;
}

.gv-summary-head {
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 14px 20px;
	border-bottom: 1px solid var(--ql-border);
	background: #fafafa;
}

.gv-summary-title {
	font-size: 13px;
	font-weight: 700;
	color: var(--ql-text);
	display: flex;
	align-items: center;
	gap: 8px;
}

.gv-summary-body {
	padding: 20px;
	display: grid;
	grid-template-columns: 1fr auto;
	gap: 20px;
	align-items: center;
}

.gv-sum-tag {
	font-size: 11px;
	color: var(--ql-muted);
	margin-bottom: 5px;
}

.gv-sum-plan {
	font-size: 14px;
	font-weight: 700;
	color: var(--ql-text);
	margin-bottom: 4px;
}

.gv-sum-price {
	font-size: 36px;
	font-weight: 900;
	line-height: 1;
	margin-bottom: 4px;
}

.gv-sum-perday {
	font-size: 12px;
	color: var(--ql-muted);
}

.gv-sum-saving {
	display: inline-block;
	margin-top: 8px;
	font-size: 11px;
	font-weight: 700;
	padding: 3px 10px;
	border-radius: 5px;
	background: #d1fae5;
	color: #065f46;
}

.gv-sum-extras {
	display: flex;
	gap: 8px;
	margin-top: 12px;
	flex-wrap: wrap;
}

.gv-sum-extra-tag {
	display: flex;
	align-items: center;
	gap: 5px;
	padding: 5px 12px;
	border-radius: 20px;
	font-size: 11px;
	font-weight: 600;
	border: 1px solid;
}

.gv-buy-btn {
	display: flex;
	align-items: center;
	justify-content: center;
	gap: 8px;
	padding: 14px 28px;
	background: var(--ql-red);
	color: #fff;
	border: none;
	border-radius: 9px;
	font-family: inherit;
	font-size: 15px;
	font-weight: 800;
	cursor: pointer;
	white-space: nowrap;
	transition: all .2s;
	box-shadow: 0 4px 14px rgba(238, 0, 51, .3);
}

.gv-buy-btn:hover {
	background: #cc0022;
	transform: translateY(-1px);
}

.gv-buy-btn:disabled {
	opacity: .4;
	cursor: not-allowed;
	transform: none;
	box-shadow: none;
}

.gv-bal-warn {
	display: flex;
	align-items: center;
	gap: 8px;
	background: #fffbea;
	border: 1px solid #fde68a;
	border-radius: 8px;
	padding: 11px 14px;
	font-size: 12px;
	color: #92400e;
	margin-top: 12px;
}

.gv-notes {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 10px;
	margin-bottom: 20px;
}

.gv-note-card {
	background: #f9fafb;
	border: 1px solid var(--ql-border);
	border-radius: 8px;
	padding: 14px;
	display: flex;
	flex-direction: column;
	gap: 8px;
	align-items: flex-start;
}

.gv-note-icon {
	width: 34px;
	height: 34px;
	border-radius: 8px;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-shrink: 0;
}

.gv-note-title {
	font-size: 12px;
	font-weight: 700;
	color: var(--ql-text);
}

.gv-note-desc {
	font-size: 11px;
	color: var(--ql-muted);
	line-height: 1.5;
}

.gv-cmp-table {
	width: 100%;
	border-collapse: collapse;
	font-size: 12px;
}

.gv-cmp-table th {
	padding: 10px 14px;
	text-align: center;
	font-size: 11px;
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: .4px;
	border-bottom: 2px solid var(--ql-border);
	background: #fafafa;
}

.gv-cmp-table th:first-child {
	text-align: left;
}

.gv-cmp-table td {
	padding: 10px 14px;
	border-bottom: 1px solid #f3f4f6;
	text-align: center;
	color: var(--ql-muted);
	vertical-align: middle;
}

.gv-cmp-table td:first-child {
	text-align: left;
	font-weight: 500;
	color: var(--ql-text);
}

.gv-cmp-table tr:hover td {
	background: #fafafa;
}

.gv-cmp-table .ck {
	color: #10b981;
	font-weight: 700;
	font-size: 15px;
}

.gv-cmp-table .cx {
	color: #d1d5db;
}

.gv-how {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 12px;
}

.gv-how-card {
	border: 1px solid var(--ql-border);
	border-radius: 10px;
	padding: 18px;
	position: relative;
	overflow: hidden;
}

.gv-how-card::before {
	content: attr(data-num);
	position: absolute;
	bottom: -12px;
	right: 10px;
	font-size: 58px;
	font-weight: 900;
	color: rgba(0, 0, 0, .04);
	line-height: 1;
	user-select: none;
}

.gv-how-ico {
	width: 38px;
	height: 38px;
	border-radius: 10px;
	display: flex;
	align-items: center;
	justify-content: center;
	margin-bottom: 10px;
}

.gv-how-title {
	font-size: 13px;
	font-weight: 700;
	color: var(--ql-text);
	margin-bottom: 4px;
}

.gv-how-desc {
	font-size: 12px;
	color: var(--ql-muted);
	line-height: 1.6;
}

@media(max-width:900px) {
	.gv-plans {
		grid-template-columns: 1fr;
	}

	.gv-gh-grid {
		grid-template-columns: repeat(2, 1fr);
	}

	.gv-notes {
		grid-template-columns: repeat(2, 1fr);
	}

	.gv-how {
		grid-template-columns: repeat(2, 1fr);
	}
}

@media(max-width:600px) {
	.gv-summary-body {
		grid-template-columns: 1fr;
	}

	.gv-hero-inner {
		flex-direction: column;
	}

	.gv-bal-card {
		min-width: unset;
		width: 100%;
	}

	.gv-notes {
		grid-template-columns: 1fr;
	}

	.gv-how {
		grid-template-columns: 1fr;
	}
}
</style>

<div class="gv-hero">
    <div class="gv-hero-deco gv-hero-deco-1"></div>
    <div class="gv-hero-deco gv-hero-deco-2"></div>
    <div class="gv-hero-inner">
        <div class="gv-hero-left">
            <div class="gv-eyebrow">
                <svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
                Gói VIP đẩy tin
            </div>
            <h1 class="gv-hero-title">
                Đẩy tin đúng giờ,<br>đúng người — <span>tăng 10× hiệu quả</span>
            </h1>
            <p class="gv-hero-sub">
                Chọn khung giờ vàng cao điểm, hệ thống tự đẩy tin lên top tìm kiếm đúng lúc người mua đang online nhiều nhất.
            </p>
            <div class="gv-hero-stats">
                <div class="gv-hstat"><div class="gv-hstat-val">50K+</div><div class="gv-hstat-lbl">Lượt xem/ngày</div></div>
                <div class="gv-hstat-sep"></div>
                <div class="gv-hstat"><div class="gv-hstat-val">10×</div><div class="gv-hstat-lbl">Hiệu quả hơn</div></div>
                <div class="gv-hstat-sep"></div>
                <div class="gv-hstat"><div class="gv-hstat-val">15</div><div class="gv-hstat-lbl">Lượt đẩy/ngày</div></div>
                <div class="gv-hstat-sep"></div>
                <div class="gv-hstat"><div class="gv-hstat-val">4</div><div class="gv-hstat-lbl">Khung giờ vàng</div></div>
            </div>
        </div>

        <div class="gv-bal-card">
            <div class="gv-bal-head">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <rect x="2" y="6" width="20" height="12" rx="2"/>
                    <circle cx="17" cy="12" r="1.5" fill="currentColor" stroke="none"/>
                    <path d="M2 10h20" stroke-linecap="round"/>
                </svg>
                Số dư của bạn
            </div>
            <div class="gv-bal-row"><span class="gv-bal-lbl">Tài khoản chính</span><span class="gv-bal-val"><?php echo number_format($balance_main,0,',','.'); ?> ₫</span></div>
            <div class="gv-bal-row"><span class="gv-bal-lbl">Khuyến mãi</span><span class="gv-bal-val"><?php echo number_format($balance_bonus,0,',','.'); ?> ₫</span></div>
            <div class="gv-bal-div"></div>
            <div class="gv-bal-total">
                <span class="gv-bal-total-lbl">Khả dụng</span>
                <span class="gv-bal-total-val"><?php echo number_format($balance_total,0,',','.'); ?> ₫</span>
            </div>
            <a href="<?php echo esc_url(home_url('/quan-ly-tai-khoan/nap-tien/')); ?>" class="gv-topup-btn">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                    <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                </svg>
                Nạp tiền ngay
            </a>
        </div>
    </div>
    <div class="gv-wave"><svg viewBox="0 0 1200 40" preserveAspectRatio="none" height="34">
        <path d="M0,20 C200,40 400,0 600,20 C800,40 1000,0 1200,20 L1200,40 L0,40 Z" fill="#fff"/>
    </svg></div>
</div>

<div class="gv-subnav">
    <a href="#gv-s1" class="gv-snav-tab active">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l3 6 6 .8-4.5 4.3 1.1 6.1L12 16.8 6.4 19.2l1.1-6.1L3 8.8 9 8z"/></svg>
        1. Chọn gói
    </a>
    <a href="#gv-s2" class="gv-snav-tab">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2" stroke-linecap="round"/></svg>
        2. Khung giờ vàng
    </a>
    <a href="#gv-s3" class="gv-snav-tab">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18" stroke-linecap="round"/></svg>
        3. Thời hạn
    </a>
    <a href="#gv-s4" class="gv-snav-tab">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M2 10h20" stroke-linecap="round"/></svg>
        4. Thanh toán
    </a>
</div>

<div class="gv-body">

<?php if ($current_plan): 
    $plan_info = array_filter($plans, fn($p)=>$p['db_level']===$current_plan->plan);
    $plan_info = reset($plan_info);
?>
<div class="gv-cur-plan">
    <div class="gv-cur-plan-left">
        <div class="gv-cur-plan-icon"><?php echo $plan_info ? $plan_info['icon'] : '⭐'; ?></div>
        <div>
            <div class="gv-cur-plan-label">✦ Gói VIP đang hoạt động</div>
            <div class="gv-cur-plan-name"><?php echo $plan_info ? esc_html($plan_info['name']) : 'VIP'; ?></div>
            <div class="gv-cur-plan-exp">Hết hạn: <?php echo date('d/m/Y', strtotime($current_plan->expired_at)); ?></div>
        </div>
    </div>
    <div class="gv-cur-plan-tags">
        <?php if ($plan_info): ?>
        <span class="gv-cur-tag">⚡ <?php echo $plan_info['push_daily']; ?> lượt đẩy/ngày</span>
        <span class="gv-cur-tag">🕐 <?php echo $plan_info['golden_slots']; ?> khung giờ vàng</span>
        <span class="gv-cur-tag">🔍 Tìm kiếm ×<?php echo $plan_info['search_boost']; ?></span>
        <?php endif; ?>
        <a href="<?php echo esc_url(home_url('/quan-ly-tai-khoan/quan-ly-tin/')); ?>"
           style="display:inline-flex;align-items:center;gap:5px;padding:5px 14px;background:#16a34a;color:#fff;border-radius:20px;font-size:11px;font-weight:700;text-decoration:none;">
            Đẩy tin ngay →
        </a>
    </div>
</div>
<?php endif; ?>

    <div id="gv-s1">
        <div class="gv-step-lbl">
            <div class="gv-step-num">1</div>
            <div>
                <div class="gv-step-title">Chọn gói VIP</div>
                <div class="gv-step-sub">Mỗi gói có số lượt đẩy tin & khung giờ vàng khác nhau</div>
            </div>
        </div>

        <div class="gv-plans">
            <?php foreach ($plans as $pi => $plan): ?>
            <div class="gv-plan-card <?php echo $pi===1?'selected':''; ?>"
                 style="--pc:<?php echo $plan['color'];?>;--pg:<?php echo $plan['gradient'];?>;--pbg:<?php echo $plan['bg'];?>;"
                 id="gv-pcard-<?php echo $pi; ?>"
                 onclick="gvSelPlan(<?php echo $pi; ?>)">

                <?php if ($plan['badge']): ?>
                    <div class="gv-plan-badge-top"><?php echo esc_html($plan['badge']); ?></div>
                <?php endif; ?>

                <div class="gv-plan-radio" id="gv-prd-<?php echo $pi; ?>">
                    <?php if ($pi===1): ?>
                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3">
                        <path d="M20 6L9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <?php endif; ?>
                </div>

                <div class="gv-plan-band"></div>

                <div class="gv-plan-head">
                    <span class="gv-plan-emoji"><?php echo $plan['icon']; ?></span>
                    <div class="gv-plan-name" style="color:<?php echo $plan['text'];?>;"><?php echo esc_html($plan['name']); ?></div>
                    <div class="gv-plan-reach" style="background:<?php echo $plan['bg'];?>;color:<?php echo $plan['text'];?>;">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                        </svg>
                        <?php echo esc_html($plan['reach']); ?>
                    </div>

                    <!-- Push counter -->
                    <div class="gv-push-badge">
                        <div class="gv-push-count" style="color:<?php echo $plan['color'];?>;"><?php echo $plan['push_daily']; ?></div>
                        <div class="gv-push-label" style="color:<?php echo $plan['text'];?>;">
                            <strong>lượt đẩy tin</strong>
                            mỗi ngày
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="gv-plan-price-row">
                        <span class="gv-plan-price" style="color:<?php echo $plan['color'];?>;"
                              id="gv-pp-<?php echo $pi; ?>"><?php echo number_format($plan['price_month'],0,',','.'); ?></span>
                        <span style="font-size:13px;font-weight:700;color:<?php echo $plan['text'];?>;">₫</span>
                    </div>
                    <div class="gv-plan-per" id="gv-ppd-<?php echo $pi; ?>">/ tháng · ~<?php echo number_format($plan['price_day'],0,',','.'); ?> ₫/ngày</div>
                </div>

                <div class="gv-plan-feats">
                    <?php foreach ($plan['perks'] as $pk): ?>
                    <div class="gv-feat-row <?php echo $pk['ok']?'ok':''; ?>">
                        <span class="gv-feat-icon" style="color:<?php echo $pk['ok']?$plan['color']:'#d1d5db';?>;">
                            <?php echo $pk['ok']?'✓':'✗'; ?>
                        </span>
                        <?php echo esc_html($pk['text']); ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="gv-section-div"></div>

    <div id="gv-s2">
        <div class="gv-step-lbl">
            <div class="gv-step-num">2</div>
            <div>
                <div class="gv-step-title">Chọn khung giờ vàng</div>
                <div class="gv-step-sub" id="gv-gh-subtitle">
                    Gói VIP Vàng: được chọn tối đa <strong>2 khung giờ</strong> / ngày
                </div>
            </div>
        </div>

        <div class="gv-gh-grid">
            <?php foreach ($golden_hours as $ghi => $gh): ?>
            <div class="gv-gh-btn" id="gv-gh-<?php echo $ghi; ?>"
                 style="--ghc:#D97706;--ghbg:#FEF3C7;"
                 onclick="gvToggleGH(<?php echo $ghi; ?>)">
                <?php if ($gh['hot']): ?>
                    <span class="gv-gh-hot">HOT</span>
                <?php endif; ?>
                <div class="gv-gh-check">
                    <svg width="8" height="8" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3.5">
                        <path d="M20 6L9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="gv-gh-emoji"><?php echo $gh['icon']; ?></span>
                <div class="gv-gh-time"><?php echo esc_html($gh['label']); ?></div>
                <div class="gv-gh-desc"><?php echo esc_html($gh['desc']); ?></div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="gv-gh-slots-info">
            <span>Đã chọn:</span>
            <span class="gv-gh-slots-pill" id="gv-gh-count-pill">0 / 2</span>
            <span id="gv-gh-count-text" style="color:var(--ql-muted);">Chọn thêm 2 khung giờ</span>
        </div>

        <div style="background:#f0f9ff;border:1px solid #bae6fd;border-radius:8px;padding:12px 14px;margin-top:12px;font-size:12px;color:#0369a1;align-items:flex-start;gap:8px;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="flex-shrink:0;margin-top:1px;">
                <circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01" stroke-linecap="round"/>
            </svg>
            Khung giờ vàng áp dụng cho toàn bộ tin đang VIP. Bạn có thể thay đổi khung giờ bất cứ lúc nào từ trang <strong>Quản lý tin đăng</strong>. Khi nhấn "Đẩy tin" hệ thống sẽ tự đẩy vào khung giờ đã chọn — hoặc đẩy ngay nếu bạn muốn.
        </div>
    </div>

    <div class="gv-section-div"></div>

    <div id="gv-s3">
        <div class="gv-step-lbl">
            <div class="gv-step-num">3</div>
            <div>
                <div class="gv-step-title">Chọn thời hạn sử dụng</div>
                <div class="gv-step-sub">Đăng ký dài hạn — chiết khấu tới 20%</div>
            </div>
        </div>
        <div class="gv-dur-tabs">
            <?php foreach ($durations as $di => $dur): ?>
            <button class="gv-dur-tab <?php echo $di===0?'active':''; ?>"
                    id="gv-dtab-<?php echo $di; ?>"
                    style="<?php echo $di===0?'--dc:#D97706;--dbg:#FEF3C7;--dt:#78350F;':''; ?>"
                    onclick="gvSelDur(<?php echo $di; ?>,this)">
                <?php echo esc_html($dur['label']); ?>
                <span class="gv-dur-sub" id="gv-dsub-<?php echo $di; ?>">
                    <?php echo number_format($plans[1]['price_month']*$dur['months'],0,',','.'); ?> ₫
                </span>
                <?php if ($dur['discount']>0): ?>
                    <span class="gv-dur-save">–<?php echo $dur['discount']; ?>%</span>
                <?php endif; ?>
            </button>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="gv-section-div"></div>

    <div id="gv-s4">
        <div class="gv-step-lbl">
            <div class="gv-step-num">4</div>
            <div>
                <div class="gv-step-title">Xác nhận & Thanh toán</div>
                <div class="gv-step-sub">Kích hoạt ngay sau khi thanh toán thành công</div>
            </div>
        </div>

        <div class="gv-summary">
            <div class="gv-summary-head">
                <div class="gv-summary-title">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="2" y="6" width="20" height="12" rx="2"/><path d="M2 10h20" stroke-linecap="round"/>
                    </svg>
                    Chi tiết đơn hàng
                </div>
                <span style="font-size:11px;color:var(--ql-muted);">Số dư khả dụng: <strong><?php echo number_format($balance_total,0,',','.'); ?> ₫</strong></span>
            </div>
            <div class="gv-summary-body">
                <div>
                    <div class="gv-sum-tag">Gói đã chọn</div>
                    <div class="gv-sum-plan" id="gv-sum-plan">🥇 VIP Vàng · 1 tháng</div>
                    <div class="gv-sum-price" id="gv-sum-price" style="color:#D97706;">1.500.000 ₫</div>
                    <div class="gv-sum-perday" id="gv-sum-perday">~50.000 ₫/ngày · 30 ngày</div>
                    <div id="gv-sum-saving" class="gv-sum-saving" style="display:none;"></div>
                    <div class="gv-sum-extras">
                        <span class="gv-sum-extra-tag" id="gv-sum-push"
                              style="background:#FEF3C7;border-color:#FCD34D;color:#78350F;">
                            ⚡ 7 lượt đẩy/ngày
                        </span>
                        <span class="gv-sum-extra-tag" id="gv-sum-golden"
                              style="background:#FEF3C7;border-color:#FCD34D;color:#78350F;">
                            🕐 2 khung giờ vàng
                        </span>
                        <span class="gv-sum-extra-tag" id="gv-sum-boost"
                              style="background:#FEF3C7;border-color:#FCD34D;color:#78350F;">
                            🔍 Tìm kiếm ×5
                        </span>
                        <span class="gv-sum-extra-tag" id="gv-sum-gh-selected"
                              style="background:#f0f9ff;border-color:#bae6fd;color:#0369a1;display:none;">
                            ✓ Giờ đã chọn: <span id="gv-sum-gh-times"></span>
                        </span>
                    </div>

                    <?php if ($balance_total < $plans[0]['price_month']): ?>
                    <div class="gv-bal-warn">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 8v4M12 16h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" stroke-linecap="round"/>
                        </svg>
                        Số dư chưa đủ.
                        <a href="<?php echo esc_url(home_url('/quan-ly-tai-khoan/nap-tien/')); ?>"
                           style="color:var(--ql-red);font-weight:700;margin-left:4px;">Nạp tiền →</a>
                    </div>
                    <?php endif; ?>
                </div>

                <div style="display:flex;flex-direction:column;align-items:center;gap:10px;">
                    <button class="gv-buy-btn" id="gv-buy-btn" onclick="gvBuy()">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                            <path d="M20 6L9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Mua gói ngay
                    </button>
                    <div style="font-size:10px;color:var(--ql-faint);text-align:center;line-height:1.5;">
                        Kích hoạt tức thì<br>Đẩy tin qua Quản lý tin đăng
                    </div>
                </div>
            </div>
        </div>

        <div class="gv-notes">
            <div class="gv-note-card">
                <div class="gv-note-icon" style="background:#fee2e2;">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#ee0033" stroke-width="1.8">
                        <rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="17" cy="12" r="1.5" fill="#ee0033" stroke="none"/>
                    </svg>
                </div>
                <div class="gv-note-title">Trừ số dư tức thì</div>
                <div class="gv-note-desc">Phí trừ ngay từ ví, không cần xác nhận thêm</div>
            </div>
            <div class="gv-note-card">
                <div class="gv-note-icon" style="background:#fef3c7;">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#D97706" stroke-width="1.8">
                        <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="gv-note-title">Đẩy đúng giờ vàng</div>
                <div class="gv-note-desc">Lượt đẩy tự reset lúc 00:00 hàng ngày</div>
            </div>
            <div class="gv-note-card">
                <div class="gv-note-icon" style="background:#d1fae5;">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="1.8">
                        <circle cx="4.5" cy="6.5" r="1.5"/><circle cx="4.5" cy="12.5" r="1.5"/>
                        <path d="M8.5 6.5h12M8.5 12.5h12" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="gv-note-title">Đẩy qua Quản lý tin</div>
                <div class="gv-note-desc">Chọn tin → nhấn "Đẩy tin" — trừ 1 lượt trong ngày</div>
            </div>
            <div class="gv-note-card">
                <div class="gv-note-icon" style="background:#dbeafe;">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="1.8">
                        <path d="M1 4v6h6M23 20v-6h-6"/><path d="M20.49 9A9 9 0 005.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 013.51 15"/>
                    </svg>
                </div>
                <div class="gv-note-title">Nâng cấp linh hoạt</div>
                <div class="gv-note-desc">Nâng gói bất cứ lúc nào, tính chênh lệch ngày còn lại</div>
            </div>
        </div>
    </div>

    <div class="gv-section-div"></div>

    <div style="font-size:14px;font-weight:700;color:var(--ql-text);margin-bottom:14px;display:flex;align-items:center;gap:8px;">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="var(--ql-red)" stroke-width="1.8">
            <path d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18"/>
        </svg>
        So sánh chi tiết các gói
    </div>
    <div style="overflow-x:auto;">
        <table class="gv-cmp-table">
            <thead>
                <tr>
                    <th style="width:34%;">Tính năng</th>
                    <th style="color:#475569;">🥈 VIP Bạc</th>
                    <th style="color:#D97706;">🥇 VIP Vàng</th>
                    <th style="color:#7C3AED;">💎 Kim Cương</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cmp = [
                    ['Giá / tháng',               '600.000 ₫',       '1.500.000 ₫',     '3.000.000 ₫'],
                    ['Lượt đẩy tin / ngày',        '3 lượt',          '7 lượt',          '15 lượt'],
                    ['Khung giờ vàng / ngày',      '1 khung',         '2 khung',         '4 khung'],
                    ['Đẩy tin tự động theo lịch',  false,             true,              true],
                    ['Ưu tiên tìm kiếm',           '×2',              '×5 (top 5)',      '×10 (số 1)'],
                    ['Nhân đôi hiển thị',          false,             false,             true],
                    ['Lượt xem ước tính',          '~5.000/ngày',     '~20.000/ngày',    '~50.000/ngày'],
                    ['Không hiển thị quảng cáo',   false,             true,              true],
                    ['Thống kê lượt xem',          'Cơ bản',          'Chi tiết',        'Nâng cao + báo cáo'],
                    ['Hỗ trợ chuyên viên',         false,             false,             'Riêng 24/7'],
                    ['Huy hiệu VIP trên tin',      true,              true,              true],
                    ['Nâng/hạ cấp linh hoạt',      true,              true,              true],
                ];
                foreach ($cmp as $row):
                    $feat = array_shift($row);
                ?>
                <tr>
                    <td><?php echo esc_html($feat); ?></td>
                    <?php foreach ($row as $v): ?>
                    <td><?php
                        if ($v===true)  echo '<span class="ck">✓</span>';
                        elseif ($v===false) echo '<span class="cx">—</span>';
                        else echo esc_html($v);
                    ?></td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="gv-section-div"></div>

    <div style="font-size:14px;font-weight:700;color:var(--ql-text);margin-bottom:14px;">Quy trình sử dụng VIP</div>
    <div class="gv-how">
        <div class="gv-how-card" data-num="01">
            <div class="gv-how-ico" style="background:#dbeafe;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="1.8">
                    <path d="M12 2l3 6 6 .8-4.5 4.3 1.1 6.1L12 16.8 6.4 19.2l1.1-6.1L3 8.8 9 8z"/>
                </svg>
            </div>
            <div class="gv-how-title">Mua gói VIP</div>
            <div class="gv-how-desc">Chọn gói, khung giờ vàng, thời hạn → thanh toán từ số dư ví</div>
        </div>
        <div class="gv-how-card" data-num="02">
            <div class="gv-how-ico" style="background:#fef3c7;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#D97706" stroke-width="1.8">
                    <circle cx="4.5" cy="6.5" r="1.5"/><circle cx="4.5" cy="12.5" r="1.5"/>
                    <path d="M8.5 6.5h12M8.5 12.5h12" stroke-linecap="round"/>
                </svg>
            </div>
            <div class="gv-how-title">Vào Quản lý tin</div>
            <div class="gv-how-desc">Mở trang Quản lý tin đăng, chọn tin muốn đẩy lên top</div>
        </div>
        <div class="gv-how-card" data-num="03">
            <div class="gv-how-ico" style="background:#fee2e2;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ee0033" stroke-width="1.8">
                    <path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="gv-how-title">Nhấn "Đẩy tin"</div>
            <div class="gv-how-desc">Trừ 1 lượt đẩy trong ngày, tin lên đầu kết quả tìm kiếm ngay</div>
        </div>
        <div class="gv-how-card" data-num="04">
            <div class="gv-how-ico" style="background:#d1fae5;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="1.8">
                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"/>
                    <path d="M22 4L12 14.01l-3-3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="gv-how-title">Lượt reset mỗi ngày</div>
            <div class="gv-how-desc">Lúc 00:00 hàng ngày lượt đẩy được hoàn về mức gói, dùng tiếp không mất</div>
        </div>
    </div>

</div><!-- /.gv-body -->

<script>
var GV_PLANS = <?php echo json_encode(array_map(fn($p)=>[
    'id'          => $p['id'],
    'db_level'    => $p['db_level'],
    'name'        => $p['name'],
    'icon'        => $p['icon'],
    'price_month' => $p['price_month'],
    'price_day'   => $p['price_day'],
    'color'       => $p['color'],
    'text'        => $p['text'],
    'bg'          => $p['bg'],
    'push_daily'  => $p['push_daily'],
    'golden_slots'=> $p['golden_slots'],
    'search_boost'=> $p['search_boost'],
], $plans)); ?>;

var GV_DURS  = <?php echo json_encode($durations); ?>;
var GV_GH    = <?php echo json_encode(array_map(fn($g)=>['id'=>$g['id'],'label'=>$g['label']], $golden_hours)); ?>;
var GV_NONCE = '<?php echo wp_create_nonce("ql_vip_nonce"); ?>';
var GV_AJAX  = '<?php echo esc_js(admin_url("admin-ajax.php")); ?>';

var gvSelPlanIdx = 1;   
var gvSelDurIdx  = 0;
var gvSelGH      = [];  

function gvFmt(n){ return n.toLocaleString('vi-VN')+' ₫'; }

/* ── Update summary ── */
function gvUpdateSummary(){
    var p = GV_PLANS[gvSelPlanIdx];
    var d = GV_DURS[gvSelDurIdx];
    var base  = p.price_month * d.months;
    var disc  = d.discount;
    var total = Math.round(base*(1-disc/100));
    var saving = base - total;

    document.getElementById('gv-sum-plan').textContent  = p.icon+' '+p.name+' · '+d.label;
    document.getElementById('gv-sum-price').textContent = gvFmt(total);
    document.getElementById('gv-sum-price').style.color = p.color;
    document.getElementById('gv-sum-perday').textContent= '~'+gvFmt(Math.round(total/d.days))+'/ngày · '+d.days+' ngày';

    var sEl=document.getElementById('gv-sum-saving');
    if(saving>0){ sEl.style.display='inline-block'; sEl.textContent='Tiết kiệm '+gvFmt(saving)+' (–'+disc+'%)'; }
    else sEl.style.display='none';

    // Extras
    var style='background:'+p.bg+';border-color:'+p.border+';color:'+p.text+';' ;
    var eStyle='background:'+p.bg+';border-color:'+p.bg+';color:'+p.text+';';
    ['gv-sum-push','gv-sum-golden','gv-sum-boost'].forEach(function(id){
        var el=document.getElementById(id); if(!el) return;
        el.style.cssText='background:'+p.bg+';border-color:'+p.border+';color:'+p.text+';';
    });
    document.getElementById('gv-sum-push').innerHTML   = '⚡ '+p.push_daily+' lượt đẩy/ngày';
    document.getElementById('gv-sum-golden').innerHTML = '🕐 '+p.golden_slots+' khung giờ vàng';
    document.getElementById('gv-sum-boost').innerHTML  = '🔍 Tìm kiếm ×'+p.search_boost;

    // Golden summary
    if(gvSelGH.length>0){
        var times=gvSelGH.map(function(i){return GV_GH[i].label.split('–')[0].trim();}).join(', ');
        document.getElementById('gv-sum-gh-times').textContent=times;
        document.getElementById('gv-sum-gh-selected').style.display='inline-flex';
    } else {
        document.getElementById('gv-sum-gh-selected').style.display='none';
    }

    // Update dur sub prices
    GV_DURS.forEach(function(dd,i){
        var el=document.getElementById('gv-dsub-'+i); if(!el) return;
        var t=Math.round(p.price_month*dd.months*(1-dd.discount/100));
        el.textContent=gvFmt(t);
    });

    // Update plan prices
    GV_PLANS.forEach(function(pp,i){
        var pEl=document.getElementById('gv-pp-'+i);
        var pdEl=document.getElementById('gv-ppd-'+i);
        if(pEl){ pEl.textContent=Math.round(pp.price_month*(1-disc/100)).toLocaleString('vi-VN'); }
        if(pdEl){ pdEl.textContent='/ tháng · ~'+Math.round(pp.price_day*(1-disc/100)).toLocaleString('vi-VN')+' ₫/ngày'; }
    });

    // Buy btn color
    document.getElementById('gv-buy-btn').style.background=p.color;
    document.getElementById('gv-buy-btn').style.boxShadow='0 4px 14px '+p.color+'4d';
}

function gvSelPlan(idx){
    gvSelPlanIdx=idx;
    var p=GV_PLANS[idx];
    document.querySelectorAll('.gv-plan-card').forEach(function(c,i){
        c.classList.toggle('selected',i===idx);
        var r=document.getElementById('gv-prd-'+i); r.innerHTML='';
        if(i===idx) r.innerHTML='<svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3"><path d="M20 6L9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    });
    updateGHState();
    document.getElementById('gv-gh-subtitle').innerHTML='Gói <strong>'+p.name+'</strong>: được chọn tối đa <strong>'+p.golden_slots+' khung giờ</strong> / ngày';
    document.querySelectorAll('.gv-dur-tab.active').forEach(function(b){
        b.style.setProperty('--dc',p.color);
        b.style.setProperty('--dbg',p.bg);
        b.style.setProperty('--dt',p.text);
    });
    gvUpdateSummary();
}

function gvSelDur(idx,btn){
    gvSelDurIdx=idx;
    var p=GV_PLANS[gvSelPlanIdx];
    document.querySelectorAll('.gv-dur-tab').forEach(function(b){
        b.classList.remove('active');
        b.style.removeProperty('--dc'); b.style.removeProperty('--dbg'); b.style.removeProperty('--dt');
    });
    btn.classList.add('active');
    btn.style.setProperty('--dc',p.color);
    btn.style.setProperty('--dbg',p.bg);
    btn.style.setProperty('--dt',p.text);
    gvUpdateSummary();
}

function gvToggleGH(idx){
    var p=GV_PLANS[gvSelPlanIdx];
    var maxSlots=p.golden_slots;
    var btn=document.getElementById('gv-gh-'+idx);
    if(btn.classList.contains('selected')){
        gvSelGH=gvSelGH.filter(function(i){return i!==idx;});
        btn.classList.remove('selected');
    } else {
        if(gvSelGH.length>=maxSlots){
            // Deselect oldest
            var oldest=gvSelGH.shift();
            document.getElementById('gv-gh-'+oldest).classList.remove('selected');
        }
        gvSelGH.push(idx);
        btn.classList.add('selected');
    }
    updateGHState();
    gvUpdateSummary();
}

function updateGHState(){
    var p=GV_PLANS[gvSelPlanIdx];
    var maxSlots=p.golden_slots;
    var countEl=document.getElementById('gv-gh-count-pill');
    var textEl=document.getElementById('gv-gh-count-text');
    var count=gvSelGH.length;
    countEl.textContent=count+' / '+maxSlots;
    if(count>=maxSlots){
        countEl.className='gv-gh-slots-pill ok';
        textEl.textContent='Đã chọn đủ khung giờ ✓';
    } else {
        countEl.className='gv-gh-slots-pill';
        textEl.textContent='Chọn thêm '+(maxSlots-count)+' khung giờ';
    }
    document.querySelectorAll('.gv-gh-btn').forEach(function(b){
        b.style.setProperty('--ghc',p.color);
        b.style.setProperty('--ghbg',p.bg);
    });
}

function gvBuy(){
    var p   = GV_PLANS[gvSelPlanIdx];
    var d   = GV_DURS[gvSelDurIdx];
    var total = Math.round(p.price_month*d.months*(1-d.discount/100));
    var ghLabels = gvSelGH.map(function(i){return GV_GH[i].label;}).join(', ');

    var msg = '✅ Xác nhận mua:\n'
            + '• Gói: '+p.name+'\n'
            + '• Thời hạn: '+d.label+'\n'
            + '• Lượt đẩy: '+p.push_daily+' lần/ngày\n'
            + '• Khung giờ vàng: '+(ghLabels||'Chưa chọn')+'\n'
            + '• Tổng tiền: '+gvFmt(total)+'\n\n'
            + 'Số tiền sẽ trừ trực tiếp từ ví. Tiếp tục?';
    if(!confirm(msg)) return;

    var btn=document.getElementById('gv-buy-btn');
    btn.disabled=true;
    btn.innerHTML='<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" style="animation:spin .8s linear infinite;flex-shrink:0"><path d="M21 12a9 9 0 11-6.219-8.56"/></svg> Đang xử lý...';

    fetch(GV_AJAX,{
        method:'POST',
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        body:'action=ql_buy_vip'
            +'&plan='+encodeURIComponent(p.db_level)
            +'&months='+encodeURIComponent(d.months)
            +'&days='+encodeURIComponent(d.days)
            +'&total='+encodeURIComponent(total)
            +'&golden_hours='+encodeURIComponent(JSON.stringify(gvSelGH.map(function(i){return GV_GH[i].id;})))
            +'&_nonce='+encodeURIComponent(GV_NONCE),
    })
    .then(function(r){return r.json();})
    .then(function(data){
        if(data.success){
            alert('🎉 Mua gói thành công!\n'+p.name+' đã được kích hoạt.\nĐẩy tin ngay từ trang Quản lý tin đăng.');
            window.location.reload();
        } else {
            alert('❌ '+(data.data&&data.data.message?data.data.message:'Có lỗi xảy ra.'));
            btn.disabled=false;
            btn.innerHTML='Mua gói ngay';
        }
    })
    .catch(function(){ alert('Lỗi kết nối.'); btn.disabled=false; btn.innerHTML='Mua gói ngay'; });
}

function gvNavClick(el){
    document.querySelectorAll('.gv-snav-tab').forEach(function(t){t.classList.remove('active');});
    el.classList.add('active');
}
document.querySelectorAll('.gv-snav-tab').forEach(function(t){
    t.addEventListener('click',function(){gvNavClick(t);});
});

var s=document.createElement('style');
s.textContent='@keyframes spin{to{transform:rotate(360deg)}}';
document.head.appendChild(s);
updateGHState();
gvUpdateSummary();
</script>
