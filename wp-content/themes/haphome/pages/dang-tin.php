<?php
/*
Template Name: Đăng tin bds
*/
get_header();
?>

<style>
*,
*::before,
*::after {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}

.dt-wrap {
	max-width: 860px;
	margin: 0 auto;
	padding: 28px 16px 80px;
	font-family: var(--font);
	color: var(--c-text);
	font-size: 14px;
	line-height: 1.5;
}

.dt-header h1 {
	font-size: 24px;
	font-weight: 700;
	color: var(--c-text);
    margin-bottom: 32px;
}

.dt-header p {
	font-size: 13px;
	color: var(--c-muted);
	margin-top: 4px;
}

.dt-progress {
	display: flex;
	background: var(--c-white);
	border: 1px solid var(--c-border);
	border-radius: var(--radius-lg);
	overflow: hidden;
	margin-bottom: 20px;
}

.dt-prog-step {
	flex: 1;
	display: flex;
	align-items: center;
	gap: 8px;
	padding: 10px 14px;
	font-size: 12px;
	font-weight: 600;
	color: var(--c-muted);
	border-right: 1px solid var(--c-border);
	cursor: default;
	white-space: nowrap;
	overflow: hidden;
}

.dt-prog-step:last-child {
	border-right: none;
}

.dt-prog-step.s-active {
	color: var(--c-red);
	background: var(--c-red-lt);
}

.dt-prog-step.s-done {
	color: var(--c-success);
}

.dt-prog-num {
	width: 20px;
	height: 20px;
	border-radius: 50%;
	background: #eeeeee;
	color: var(--c-muted);
	font-size: 11px;
	font-weight: 700;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-shrink: 0;
}

.dt-prog-step.s-active .dt-prog-num {
	background: var(--c-red);
	color: #fff;
}

.dt-prog-step.s-done .dt-prog-num {
	background: var(--c-success);
	color: #fff;
}

.dt-card {
	background: var(--c-white);
	border: 1px solid var(--c-border);
	border-radius: var(--radius-lg);
	margin-bottom: 10px;
	overflow: hidden;
}

.dt-card.is-locked {
	opacity: .55;
	pointer-events: none;
}

.dt-card.is-active {
	border-color: #bdbdbd;
}

.dt-card-head {
	display: flex;
	align-items: center;
	gap: 10px;
	padding: 14px 18px;
	cursor: pointer;
	user-select: none;
	background: var(--c-white);
}

.dt-card-head:hover {
	background: #fafafa;
}

.dt-card-ico {
	width: 30px;
	height: 30px;
	flex-shrink: 0;
	display: flex;
	align-items: center;
	justify-content: center;
	color: var(--c-muted);
}

.dt-card-title {
	font-size: 14px;
	font-weight: 700;
	flex: 1;
}

.dt-card-badge {
	font-size: 11px;
	font-weight: 600;
	padding: 2px 8px;
	border-radius: 3px;
	flex-shrink: 0;
}

.dt-badge-req {
	background: #fce4e4;
	color: #c62828;
}

.dt-badge-opt {
	background: #f5f5f5;
	color: var(--c-muted);
}

.dt-card-summary {
	font-size: 12px;
	color: var(--c-muted);
	max-width: 180px;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
}

.dt-card-arrow {
	color: #9e9e9e;
	font-size: 12px;
	transition: transform .2s;
	flex-shrink: 0;
}

.dt-card-arrow.open {
	transform: rotate(180deg);
}

.dt-card-body {
	padding: 20px 18px;
	border-top: 1px solid #f0f0f0;
	display: none;
}

.dt-card-body.open {
	display: block;
}

/* Section label */
.dt-section-label {
	font-size: 11px;
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: .5px;
	color: var(--c-muted);
	margin: 18px 0 10px;
	display: flex;
	align-items: center;
	gap: 8px;
}

.dt-section-label::after {
	content: '';
	flex: 1;
	height: 1px;
	background: #eeeeee;
}

.dt-tab {
	height: 36px;
	padding: 8px 24px;
	font-size: 13px;
	font-weight: 600;
	cursor: pointer;
	border: none;
	background: var(--c-white);
	color: var(--c-muted);
	border: 1px solid var(--c-border);
	transition: all .15s;
	font-family: var(--font);
}

.dt-tab.active {
	background: var(--c-red);
	color: #fff;
	border: 1px solid #e0e0e0;
}

.dt-chips {
	display: flex;
	gap: 8px;
	flex-wrap: wrap;
}

.dt-chip {
	padding: 7px 14px;
	border: 1px solid var(--c-border);
	border-radius: var(--radius);
	font-size: 13px;
	font-weight: 500;
	cursor: pointer;
	background: var(--c-white);
	color: var(--c-text);
	transition: all .12s;
	user-select: none;
}

.dt-chip:hover {
	border-color: #2c2c2c;
}

.dt-chip.sel {
	border-color: var(--c-red);
	background: var(--c-red-lt);
	color: var(--c-red);
	font-weight: 600;
}

.dt-sublevel {
	margin-top: 12px;
	padding: 14px;
	background: #fafafa;
	border: 1px solid #eeeeee;
	border-radius: var(--radius);
}

.dt-sublevel-title {
	font-size: 11px;
	font-weight: 700;
	text-transform: uppercase;
	letter-spacing: .4px;
	color: var(--c-muted);
	margin-bottom: 10px;
}

.dt-grid {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 14px;
}

.dt-grid3 {
	display: grid;
	grid-template-columns: 1fr 1fr 1fr;
	gap: 14px;
}

.dt-full {
	grid-column: 1 / -1;
}

.dt-field {
	display: flex;
	flex-direction: column;
	gap: 4px;
}

.dt-label {
	font-size: 12px;
	font-weight: 600;
	color: #424242;
	display: flex;
	align-items: center;
	gap: 3px;
}

.dt-req {
	color: var(--c-red);
}

.dt-input,
.dt-select,
.dt-textarea {
	padding: 9px 11px;
	border: 1px solid var(--c-border);
	border-radius: var(--radius);
	font-family: var(--font);
	font-size: 13px;
	color: var(--c-text);
	background: var(--c-white);
	outline: none;
	width: 100%;
	transition: border-color .15s;
	-webkit-appearance: none;
}

.dt-input:focus,
.dt-select:focus,
.dt-textarea:focus {
	border-color: var(--c-red);
	box-shadow: 0 0 0 2px rgba(229, 57, 53, .1);
}

.dt-input::placeholder,
.dt-textarea::placeholder {
	color: #bdbdbd;
}

.dt-textarea {
	resize: vertical;
	min-height: 96px;
}

.dt-hint {
	font-size: 11px;
	color: var(--c-muted);
	margin-top: 2px;
}

.dt-price-row {
	display: flex;
	gap: 8px;
}

.dt-price-row .dt-input {
	flex: 1;
}

.dt-img-grid {
	display: grid;
	grid-template-columns: repeat(5, 1fr);
	gap: 8px;
	margin-bottom: 8px;
}

.dt-img-slot {
	aspect-ratio: 4/3;
	border: 1px dashed var(--c-border);
	border-radius: var(--radius);
	overflow: hidden;
	position: relative;
	background: #fafafa;
	cursor: pointer;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	gap: 4px;
	color: var(--c-muted);
	font-size: 11px;
	transition: border-color .15s, color .15s;
}

.dt-img-slot:hover {
	border-color: var(--c-red);
	color: var(--c-red);
}

.dt-img-slot.filled {
	border-style: solid;
	border-color: var(--c-border);
	cursor: default;
}

.dt-img-slot img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	display: block;
}

.dt-img-del {
	position: absolute;
	top: 4px;
	right: 4px;
	width: 18px;
	height: 18px;
	border-radius: 50%;
	background: rgba(0, 0, 0, .55);
	color: #fff;
	border: none;
	cursor: pointer;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 10px;
	font-weight: 700;
	line-height: 1;
}

.dt-img-del:hover {
	background: var(--c-red);
}

.dt-img-main {
	position: absolute;
	bottom: 4px;
	left: 4px;
	background: rgba(229, 57, 53, .85);
	color: #fff;
	font-size: 9px;
	font-weight: 700;
	padding: 1px 5px;
	border-radius: 2px;
}

.dt-info {
	background: #f3f8ff;
	border-left: 3px solid #1976d2;
	padding: 10px 14px;
	border-radius: 0 var(--radius) var(--radius) 0;
	font-size: 12px;
	color: #1565c0;
	margin-bottom: 14px;
	display: flex;
	align-items: flex-start;
	gap: 8px;
}

.dt-alert-err {
	background: #fce4e4;
	border: 1px solid #ef9a9a;
	border-radius: var(--radius-lg);
	padding: 12px 16px;
	font-size: 13px;
	color: #c62828;
	margin-bottom: 16px;
}

.dt-alert-ok {
	background: #e8f5e9;
	border: 1px solid #a5d6a7;
	border-radius: var(--radius-lg);
	padding: 18px 20px;
	font-size: 14px;
	color: #1b5e20;
	margin-bottom: 16px;
	display: flex;
	align-items: flex-start;
	gap: 14px;
}

.dt-footer {
	position: sticky;
	bottom: 0;
	z-index: 100;
	background: var(--c-white);
	border-top: 1px solid var(--c-border);
	padding: 12px 18px;
	display: flex;
	align-items: center;
	justify-content: space-between;
	gap: 10px;
	flex-wrap: wrap;
	box-shadow: 0 -2px 8px rgba(0, 0, 0, .06);
}

.dt-footer-note {
	font-size: 12px;
	color: var(--c-muted);
}

.btn-primary {
	padding: 10px 32px;
	background: var(--c-red);
	color: #fff;
	border: none;
	border-radius: var(--radius);
	font-family: var(--font);
	font-size: 14px;
	font-weight: 700;
	cursor: pointer;
	transition: background .15s;
}

.btn-primary:hover {
	background: #c62828;
}

.btn-primary:disabled {
	background: #bdbdbd;
	cursor: not-allowed;
}

.btn-secondary {
	padding: 10px 20px;
	background: var(--c-white);
	color: var(--c-text);
	border: 1px solid var(--c-border);
	border-radius: var(--radius);
	font-family: var(--font);
	font-size: 13px;
	font-weight: 600;
	cursor: pointer;
	transition: border-color .15s;
}

.btn-secondary:hover {
	border-color: #9e9e9e;
}

.btn-next {
	margin-top: 18px;
	display: flex;
	justify-content: flex-end;
}

.btn-next button {
	padding: 9px 24px;
	background: var(--c-red);
	color: #fff;
	border: none;
	border-radius: var(--radius);
	font-family: var(--font);
	font-size: 13px;
	font-weight: 600;
	cursor: pointer;
	transition: background .15s;
}

.btn-next button:hover {
	background: #c62828;
}

#dt-map {
	width: 100%;
	height: 240px;
	border-radius: var(--radius);
	border: 1px solid var(--c-border);
	overflow: hidden;
}

.dt-map-suggest {
	display: none;
	position: absolute;
	z-index: 9999;
	background: var(--c-white);
	border: 1px solid var(--c-border);
	border-radius: var(--radius);
	box-shadow: 0 4px 12px rgba(0, 0, 0, .1);
	max-height: 200px;
	overflow-y: auto;
	width: 100%;
	top: calc(100% + 3px);
	left: 0;
}

.dt-suggest-item {
	padding: 9px 12px;
	font-size: 13px;
	border-bottom: 1px solid #f5f5f5;
	cursor: pointer;
	line-height: 1.4;
}

.dt-suggest-item:hover {
	background: #fafafa;
}

.dt-suggest-item:last-child {
	border-bottom: none;
}

.dt-char-row {
	display: flex;
	justify-content: space-between;
	align-items: center;
	margin-top: 3px;
}

.dt-char-count {
	font-size: 11px;
	color: var(--c-muted);
}

.success-links {
	margin-top: 12px;
	display: flex;
	gap: 8px;
	flex-wrap: wrap;
}

.success-links a {
	padding: 7px 16px;
	border-radius: var(--radius);
	font-size: 12px;
	font-weight: 700;
	text-decoration: none;
}

.link-green {
	background: var(--c-success);
	color: #fff;
}

.link-outline {
	background: var(--c-white);
	color: var(--c-text);
	border: 1px solid var(--c-border);
}

.dt-main-slot {
	display: flex;
	align-items: center;
	gap: 16px;
	padding: 16px 18px;
	border: 1.5px dashed var(--c-border);
	border-radius: var(--radius);
	background: #fafafa;
	cursor: pointer;
	transition: border-color .15s, background .15s;
	max-width: 480px;
}

.dt-main-slot:hover {
	border-color: var(--c-red);
	background: var(--c-red-lt);
}

.dt-main-slot:hover svg {
	stroke: var(--c-red);
}

.dt-main-slot-text {
	display: flex;
	flex-direction: column;
}

.dt-main-preview {
	display: flex;
	align-items: flex-start;
	gap: 14px;
	max-width: 480px;
}

.dt-main-preview img {
	width: 160px;
	height: 120px;
	object-fit: cover;
	border-radius: var(--radius);
	border: 1px solid var(--c-border);
	flex-shrink: 0;
}

.dt-main-preview-info {
	display: flex;
	flex-direction: column;
	gap: 8px;
	padding-top: 4px;
}

.dt-main-preview-name {
	font-size: 13px;
	color: var(--c-text);
	font-weight: 500;
	word-break: break-all;
}

.dt-main-preview-size {
	font-size: 11px;
	color: var(--c-muted);
}

.dt-main-del {
	height: 35px;
	padding: 6px 12px;
	background: #fff;
	color: #c62828;
	border: 1px solid #fca5a5;
	border-radius: var(--radius);
	font-size: 11px;
	font-weight: 600;
	cursor: pointer;
	font-family: var(--font);
	display: inline-flex;
	align-items: center;
	gap: 4px;
	transition: background .15s;
}

.dt-main-del:hover {
	background: #fce4e4;
}

.dt-img-grid {
	display: grid;
	grid-template-columns: repeat(5, 1fr);
	gap: 8px;
	min-height: 0;
}

.dt-sub-slot {
	aspect-ratio: 4/3;
	border: 1px solid var(--c-border);
	border-radius: var(--radius);
	overflow: hidden;
	position: relative;
	background: #fafafa;
}

.dt-sub-slot img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	display: block;
}

.dt-sub-del {
	position: absolute;
	top: 4px;
	right: 4px;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	background: rgba(0, 0, 0, .55);
	color: #fff;
	border: none;
	cursor: pointer;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 10px;
	font-weight: 700;
	line-height: 1;
	transition: background .15s;
}

.dt-sub-del:hover {
	background: var(--c-red);
}

@media (max-width: 640px) {
	.dt-progress {
		overflow-x: auto;
	}

	.dt-prog-step {
		flex-direction: column;
		padding: 8px 6px;
		font-size: 10px;
		text-align: center;
	}

	.dt-grid {
		grid-template-columns: 1fr;
	}

	.dt-grid3 {
		grid-template-columns: 1fr 1fr;
	}

	.dt-img-grid {
		grid-template-columns: repeat(3, 1fr);
	}

	.dt-tabs {
		width: 100%;
	}

	.dt-tab {
		flex: 1;
		text-align: center;
		padding: 8px 10px;
	}

	.dt-main-preview img {
		width: 100px;
		height: 75px;
	}

	.dt-img-grid {
		grid-template-columns: repeat(3, 1fr);
	}
}
</style>

<?php
if (!defined('ABSPATH')) exit;

$custom_user = get_current_custom_user();
if (!$custom_user) {
    wp_redirect(home_url('/dang-nhap/?redirect=' . urlencode(get_permalink())));
    exit;
}
$uid = (int) $custom_user->id;

$property_type_terms    = get_terms(['taxonomy' => 'property_type',    'hide_empty' => false, 'parent' => 0]);
$property_type_children = [];
if (!is_wp_error($property_type_terms)) {
    foreach ($property_type_terms as $pt) {
        $ch = get_terms(['taxonomy' => 'property_type', 'hide_empty' => false, 'parent' => $pt->term_id]);
        $property_type_children[$pt->term_id] = (!is_wp_error($ch) && !empty($ch)) ? $ch : [];
    }
}

$property_developer_terms = get_terms(['taxonomy' => 'property_developer', 'hide_empty' => false, 'parent' => 0]);
$developer_tree = [];
if (!is_wp_error($property_developer_terms)) {
    foreach ($property_developer_terms as $dev) {
        $lvl2 = get_terms(['taxonomy' => 'property_developer', 'hide_empty' => false, 'parent' => $dev->term_id]);
        $lvl2_data = [];
        if (!is_wp_error($lvl2) && !empty($lvl2)) {
            foreach ($lvl2 as $l2) {
                $lvl2_data[] = ['id' => $l2->term_id, 'name' => $l2->name];
            }
        }
        $developer_tree[] = ['id' => $dev->term_id, 'name' => $dev->name, 'children' => $lvl2_data];
    }
}

$property_location_terms = get_terms(['taxonomy' => 'property_location', 'hide_empty' => false, 'parent' => 0]);
$location_l2 = [];
$location_l3 = [];
if (!is_wp_error($property_location_terms)) {
    foreach ($property_location_terms as $loc) {
        $ch2 = get_terms(['taxonomy' => 'property_location', 'hide_empty' => false, 'parent' => $loc->term_id]);
        if (!is_wp_error($ch2) && !empty($ch2)) {
            $location_l2[$loc->term_id] = array_map(fn($c) => ['id' => $c->term_id, 'name' => $c->name], $ch2);
            foreach ($ch2 as $q) {
                $ch3 = get_terms(['taxonomy' => 'property_location', 'hide_empty' => false, 'parent' => $q->term_id]);
                if (!is_wp_error($ch3) && !empty($ch3)) {
                    $location_l3[$q->term_id] = array_map(fn($p) => ['id' => $p->term_id, 'name' => $p->name], $ch3);
                }
            }
        }
    }
}

$huong_terms = get_terms(['taxonomy' => 'property_direction', 'hide_empty' => false]);
$dt_location_icon_url = get_template_directory_uri() . '/img/location.png';
?>
<script>
window.dtHereKey = '<?php echo esc_js(HERE_API_KEY); ?>';
window.dtMapboxToken = '<?php echo esc_js(MAPBOX_ACCESS_TOKEN); ?>';
window.dtMapboxStyle = '<?php echo esc_js(MAPBOX_STYLE); ?>';
window.dtLocationIconUrl= '<?php echo esc_js(HERE_ICON_URL); ?>';
window.dtDevTree = <?php echo json_encode(array_values($developer_tree)); ?>;
window.dtST = {}; 
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/map-here-mapbox.js"></script>
<script>
    window.dtApivnJsonUrl = "<?php echo esc_js(get_template_directory_uri()); ?>/data/apivn.json";
</script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/dang-tin.js"></script>

<?php if (dang_tin_success()) : ?>
<div style="max-width:860px;margin:40px auto;padding:0 16px;">
    <div class="dt-alert-ok">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:1px;">
            <polyline points="20 6 9 17 4 12" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <div>
            <div style="font-weight:700;font-size:15px;margin-bottom:4px;">Đăng tin thành công!</div>
            <div style="font-size:13px;color:#2e7d32;">Tin đang chờ kiểm duyệt. Chúng tôi sẽ phản hồi trong vòng 24 giờ.</div>
            <div class="success-links">
                <a href="<?php echo esc_url(home_url('/quan-ly-tai-khoan/quan-ly-tin/')); ?>" class="link-green">Quản lý tin đăng</a>
                <a href="<?php echo esc_url(get_permalink()); ?>" class="link-outline">Đăng tin khác</a>
            </div>
        </div>
    </div>
</div>
<?php return; endif; ?>

<div class="dt-wrap">
    <div class="dt-header"><h1>Đăng tin bất động sản</h1></div>

    <div class="dt-progress">
        <?php
        $steps = [1=>'Phân loại',2=>'Vị trí',3=>'Đặc điểm',4=>'Hình ảnh',5=>'Pháp lý & Nội thất',6=>'Nội dung',7=>'Liên hệ'];
        foreach ($steps as $n => $label):
            $cls = $n === 1 ? 's-active' : '';
        ?>
        <div class="dt-prog-step <?php echo $cls; ?>" id="step-<?php echo $n; ?>-nav">
            <div class="dt-prog-num"><?php echo $n; ?></div>
            <span><?php echo $label; ?></span>
        </div>
        <?php endforeach; ?>
    </div>

    <?php
    $errors = get_dang_tin_errors();
    if (!empty($errors)) : ?>
    <div class="dt-alert-err">
        <strong>Vui lòng kiểm tra lại:</strong>
        <ul style="margin:6px 0 0 16px;">
            <?php foreach ($errors as $e) : ?>
            <li><?php echo esc_html($e); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <form method="post" id="dt-form" enctype="multipart/form-data">
        <?php wp_nonce_field('dang_tin_action', 'dang_tin_nonce'); ?>
        <input type="hidden" name="image_ids"              id="dt-image-ids" value="">
        <input type="hidden" name="dt_mode"                id="dt-mode-val"  value="bds">
        <input type="hidden" name="property_type_val"      id="pt-val"       value="">
        <input type="hidden" name="property_developer_val" id="dev-val"      value="">
        <input type="hidden" name="property_location_val"  id="loc-val"      value="">

        <div class="dt-card is-active" id="block-1">
            <div class="dt-card-head" onclick="dtToggle(1)">
                <div class="dt-card-ico">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" stroke-linecap="round" stroke-linejoin="round"/>
                        <polyline points="9 22 9 12 15 12 15 22" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="dt-card-title">Phân loại</div>
                <span class="dt-card-badge dt-badge-req">Bắt buộc</span>
                <div class="dt-card-summary" id="sum-1"></div>
                <span class="dt-card-arrow open" id="arr-1">▾</span>
            </div>
            <div class="dt-card-body open" id="body-1">
                <div class="dt-field" style="margin-bottom:16px;">
                    <div class="dt-label" style="margin-bottom:8px;">Loại tin <span class="dt-req">*</span></div>
                    <div class="dt-tabs">
                        <button type="button" class="dt-tab active" id="tab-bds"  onclick="dtSetMode('bds')">Bất động sản</button>
                        <button type="button" class="dt-tab"        id="tab-duan" onclick="dtSetMode('du_an')">Dự án</button>
                    </div>
                </div>
                <div class="dt-field" style="margin-bottom:16px;">
                    <div class="dt-label" style="margin-bottom:8px;">Hình thức <span class="dt-req">*</span></div>
                    <div class="dt-chips">
                        <div class="dt-chip sel" data-g="loai_tin" data-v="ban"       onclick="dtChip(this,'loai_tin')">Bán</div>
                        <div class="dt-chip"     data-g="loai_tin" data-v="cho-thue"  onclick="dtChip(this,'loai_tin')">Cho thuê</div>
                    </div>
                    <input type="hidden" name="loai_tin" id="loai_tin_val" value="ban">
                </div>

                <div id="sec-bds">
                    <div class="dt-field">
                        <div class="dt-label" style="margin-bottom:8px;">Loại bất động sản <span class="dt-req">*</span></div>
                        <div class="dt-chips" id="pt-chips">
                            <?php if (!is_wp_error($property_type_terms) && !empty($property_type_terms)):
                                foreach ($property_type_terms as $t): ?>
                            <div class="dt-chip" data-g="property_type" data-v="<?php echo esc_attr($t->term_id); ?>"
                                 onclick="dtSelectType(this)"><?php echo esc_html($t->name); ?></div>
                            <?php   if (!empty($property_type_children[$t->term_id])):
                                        $sd = array_map(fn($c) => ['id'=>$c->term_id,'name'=>$c->name], $property_type_children[$t->term_id]); ?>
                            <script>dtST=dtST||{};dtST[<?php echo $t->term_id;?>]=<?php echo json_encode($sd);?>;</script>
                            <?php   endif; endforeach;
                            else:
                                foreach ([['Nhà ở',0],['Căn hộ',1],['Đất nền',2],['Biệt thự',3],['Nhà phố',4]] as [$l,$i]): ?>
                            <div class="dt-chip" data-g="property_type" data-v="<?php echo $i;?>" onclick="dtSelectType(this)"><?php echo $l;?></div>
                            <?php endforeach; endif; ?>
                        </div>
                        <div id="pt-sub" class="dt-sublevel" style="display:none;">
                            <div class="dt-sublevel-title">Phân loại cụ thể</div>
                            <div class="dt-chips" id="pt-sub-chips"></div>
                        </div>
                    </div>
                </div>

                <div id="sec-duan" style="display:none;">
                    <div class="dt-field">
                        <div class="dt-label" style="margin-bottom:8px;">Chọn dự án <span class="dt-req">*</span></div>
                        <div class="dt-chips" id="dev-chips">
                            <?php if (!empty($developer_tree)): foreach ($developer_tree as $d): ?>
                            <div class="dt-chip" data-g="dev1" data-v="<?php echo esc_attr($d['id']);?>"
                                 data-name="<?php echo esc_attr($d['name']);?>"
                                 onclick="dtDev1(this)"><?php echo esc_html($d['name']);?></div>
                            <?php endforeach; else: ?>
                            <p style="color:#9e9e9e;font-size:13px;">Chưa có dự án nào.</p>
                            <?php endif; ?>
                        </div>
                        <div id="dev2-wrap" style="display:none;" class="dt-sublevel">
                            <div class="dt-sublevel-title" id="dev2-label">Chọn dự án cụ thể</div>
                            <div class="dt-chips" id="dev2-chips"></div>
                        </div>
                    </div>
                </div>

                <div class="btn-next"><button type="button" onclick="dtNext(1)">Tiếp tục →</button></div>
            </div>
        </div>

        <div class="dt-card is-locked" id="block-2">
            <div class="dt-card-head" onclick="dtToggle(2)">
                <div class="dt-card-ico">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                </div>
                <div class="dt-card-title">Vị trí</div>
                <span class="dt-card-badge dt-badge-req">Bắt buộc</span>
                <div class="dt-card-summary" id="sum-2"></div>
                <span class="dt-card-arrow" id="arr-2">▾</span>
            </div>
            <div class="dt-card-body" id="body-2">

                <div class="dt-grid3" style="margin-bottom:12px;">
					<div class="dt-field">
						<label class="dt-label">Tỉnh / Thành phố <span class="dt-req">*</span></label>
						<select class="dt-select" id="sel-tinh" onchange="dtLoadL2(this.value)">
							<option value="">-- Chọn --</option>
						</select>
					</div>
					<div class="dt-field">
						<label class="dt-label">Quận / Huyện</label>
						<select class="dt-select" id="sel-quan" onchange="dtLoadL3(this.value)" disabled>
							<option value="">-- Chọn --</option>
						</select>
					</div>
					<div class="dt-field">
						<label class="dt-label">Phường / Xã</label>
						<select class="dt-select" id="sel-phuong" onchange="dtUpdateLoc()" disabled>
							<option value="">-- Chọn --</option>
						</select>
					</div>
				</div>

				<div class="dt-field dt-full" style="margin-bottom:14px;">
					<label class="dt-label">Địa chỉ chi tiết <span class="dt-req">*</span></label>
					<input class="dt-input" type="text" name="prefix-address" id="addr-detail"
						placeholder="Số nhà, tên đường..."
						value="<?php echo esc_attr($_POST['prefix-address'] ?? ''); ?>">
				</div>

                <div class="dt-section-label">Xác định trên bản đồ</div>

                <div class="dt-field" style="margin-bottom:10px;position:relative;">
                    <label class="dt-label">Tìm kiếm địa chỉ</label>
                    <div style="position:relative;">
                        <input class="dt-input" type="text" id="map-search"
                               placeholder="Nhập địa chỉ để tìm..." autocomplete="off"
                               style="padding-right:36px;">
                        <span id="map-spin"
                              style="display:none;position:absolute;right:10px;top:50%;transform:translateY(-50%);font-size:14px;pointer-events:none;">⏳</span>
                        <div id="map-suggest"
                             style="display:none;position:absolute;top:100%;left:0;right:0;z-index:9999;
                                    background:#fff;border:1px solid #ddd;border-top:none;border-radius:0 0 8px 8px;
                                    box-shadow:0 6px 18px #0002;max-height:280px;overflow-y:auto;"></div>
                    </div>
                </div>

                <div id="dt-map"
                     style="width:100%;height:360px;border-radius:10px;border:1px solid #e0e0e0;
                            overflow:hidden;background:#f5f5f5;margin-bottom:10px;"></div>

                <div style="font-size:12px;color:#888;margin-bottom:14px;">
                    Nhấp vào bản đồ hoặc kéo iconđể điều chỉnh vị trí chính xác
                </div>

				<input type="hidden" id="loc-tinh-name">
				<input type="hidden" id="loc-quan-name">
				<input type="hidden" id="loc-phuong-name">
				<input type="hidden" name="dt-lat" id="map-lat">
				<input type="hidden" name="dt-lng" id="map-lng">

                <div class="btn-next"><button type="button" onclick="dtNext(2)">Tiếp tục →</button></div>
            </div>
        </div>

        <div class="dt-card is-locked" id="block-3">
            <div class="dt-card-head" onclick="dtToggle(3)">
                <div class="dt-card-ico">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
                    </svg>
                </div>
                <div class="dt-card-title">Đặc điểm</div>
                <span class="dt-card-badge dt-badge-req">Bắt buộc</span>
                <div class="dt-card-summary" id="sum-3"></div>
                <span class="dt-card-arrow" id="arr-3">▾</span>
            </div>
            <div class="dt-card-body" id="body-3">
                <div class="dt-field" style="margin-bottom:14px;">
                    <label class="dt-label">Giá <span class="dt-req">*</span></label>
                    <input class="dt-input" type="text" inputmode="numeric" name="prefix-price" id="price-inp"
                           placeholder="Ví dụ: 3.500.000.000"
                           value="<?php echo esc_attr($_POST['prefix-price'] ?? ''); ?>"
                           oninput="fmtPrice(this)">
                    <div class="dt-hint" id="price-hint">Nhập giá → tự động hiển thị bằng chữ</div>
                </div>
                <div class="dt-grid" style="margin-bottom:14px;">
                    <div class="dt-field">
                        <label class="dt-label">Diện tích (m²) <span class="dt-req">*</span></label>
                        <input class="dt-input" type="number" name="prefix-area" min="1"
                               placeholder="75" value="<?php echo esc_attr($_POST['prefix-area'] ?? ''); ?>">
                    </div>
                    <div class="dt-field">
                        <label class="dt-label">Hướng nhà</label>
                        <select name="huong" class="dt-select">
                            <option value="">-- Chọn --</option>
                            <?php
                            $dirs = ['dong'=>'Đông','tay'=>'Tây','nam'=>'Nam','bac'=>'Bắc','dong-bac'=>'Đông Bắc','dong-nam'=>'Đông Nam','tay-bac'=>'Tây Bắc','tay-nam'=>'Tây Nam'];
                            if (!is_wp_error($huong_terms) && !empty($huong_terms)):
                                foreach ($huong_terms as $t): ?>
                            <option value="<?php echo esc_attr($t->term_id);?>"><?php echo esc_html($t->name);?></option>
                            <?php endforeach; else: foreach ($dirs as $s=>$l): ?>
                            <option value="<?php echo esc_attr($s);?>"><?php echo esc_html($l);?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="dt-section-label">Thông tin phòng</div>
                <div class="dt-grid">
                    <div class="dt-field">
                        <label class="dt-label">Số phòng ngủ</label>
                        <select name="prefix-bedroom" class="dt-select">
                            <option value="">-- Chọn --</option>
                            <option value="0">Studio</option>
                            <option value="1">1</option><option value="2">2</option>
                            <option value="3">3</option><option value="4">4</option>
                            <option value="5">≥ 5</option>
                        </select>
                    </div>
                    <div class="dt-field">
                        <label class="dt-label">Số nhà vệ sinh</label>
                        <select name="prefix-bathroom" class="dt-select">
                            <option value="">-- Chọn --</option>
                            <option value="1">1</option><option value="2">2</option>
                            <option value="3">3</option><option value="4">4</option>
                            <option value="5">≥ 5</option>
                        </select>
                    </div>
                </div>
                <div class="btn-next"><button type="button" onclick="dtNext(3)">Tiếp tục →</button></div>
            </div>
        </div>
        <div class="dt-card is-locked" id="block-4">
            <div class="dt-card-head" onclick="dtToggle(4)">
                <div class="dt-card-ico">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <polyline points="21 15 16 10 5 21" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="dt-card-title">Hình ảnh</div>
                <span class="dt-card-badge dt-badge-req">Bắt buộc</span>
                <div class="dt-card-summary" id="sum-4"></div>
                <span class="dt-card-arrow" id="arr-4">▾</span>
            </div>
            <div class="dt-card-body" id="body-4">
                <div class="dt-info">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="flex-shrink:0;margin-top:1px;">
                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    <span>1 ảnh chính (bắt buộc) + tối đa 9 ảnh phụ. Định dạng JPG, PNG, WebP, tối đa 10MB/ảnh.</span>
                </div>
                <div class="dt-section-label">Ảnh chính <span class="dt-req">*</span></div>
                <div class="dt-field" style="margin-bottom:20px;">
                    <label class="dt-label" style="font-size:13px;color:var(--c-muted);">Ảnh đại diện — hiển thị trong kết quả tìm kiếm</label>
                    <input class="dt-input" type="file" name="main_image" id="main-file-input"
                           accept="image/jpeg,image/jpg,image/png,image/gif,image/webp"
                           onchange="dtPreviewMain(this)">
                    <div id="main-preview" style="margin-top:10px;display:none;">
                        <img id="main-preview-img" src="" alt="Ảnh chính"
                             style="max-width:100%;max-height:260px;border-radius:8px;border:1px solid var(--c-border);object-fit:cover;">
                    </div>
                </div>
                <div class="dt-section-label">Ảnh phụ (tối đa 9)</div>
                <div class="dt-field" style="margin-bottom:14px;">
                    <input class="dt-input" type="file" name="sub_images[]" id="sub-file-input"
                           accept="image/jpeg,image/jpg,image/png,image/gif,image/webp"
                           multiple onchange="dtPreviewSubs(this)">
                    <div id="sub-previews" class="dt-img-grid" style="margin-top:10px;"></div>
                </div>
				<div class="dt-section-label">Ảnh 360°</div>
				<div class="dt-field" style="margin-bottom:20px;">
					<label class="dt-label" style="font-size:13px;color:var(--c-muted);">Ảnh toàn cảnh dạng equirectangular (không bắt buộc)</label>
					<input class="dt-input" type="file" name="image_360" id="image360-file-input"
						accept="image/jpeg,image/jpg,image/png,image/webp"
						onchange="dtPreview360(this)">
					<div id="image360-preview" style="margin-top:10px;display:none;">
						<img id="image360-preview-img" src="" alt="Ảnh 360"
							style="max-width:100%;max-height:200px;border-radius:8px;border:1px solid var(--c-border);object-fit:cover;">
					</div>
				</div>

				<div class="dt-section-label">Ảnh giấy tờ pháp lý (riêng tư)</div>
				<div class="dt-field" style="margin-bottom:20px;">
					<div class="dt-info" style="margin-bottom:10px;">
						<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="flex-shrink:0;margin-top:1px;">
							<path d="M12 15a3 3 0 100-6 3 3 0 000 6z"/>
							<path d="M19 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06A1.65 1.65 0 004.6 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06A1.65 1.65 0 009 4.6a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09A1.65 1.65 0 0015.4 4.6a1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06A1.65 1.65 0 0019.4 9c.36.14.66.38.86.7"/>
						</svg>
						<span>Ảnh sổ đỏ/sổ hồng chỉ bạn xem được, không hiển thị công khai. Giúp xác minh tin nhanh hơn khi kiểm duyệt.</span>
					</div>
					<input class="dt-input" type="file" name="legal_images[]" id="legal-file-input"
						accept="image/jpeg,image/jpg,image/png,image/webp"
						multiple onchange="dtPreviewLegal(this)">
					<div id="legal-previews" class="dt-img-grid" style="margin-top:10px;"></div>
				</div>
                <div class="dt-field" style="margin-top:18px;">
                    <label class="dt-label">Link video YouTube</label>
                    <input class="dt-input" type="url" name="prefix-video"
                           placeholder="https://youtube.com/..."
                           value="<?php echo old_form_value('prefix-video'); ?>">
                </div>
                <div class="btn-next"><button type="button" onclick="dtNext(4)">Tiếp tục →</button></div>
            </div>
        </div>

        <div class="dt-card is-locked" id="block-5">
            <div class="dt-card-head" onclick="dtToggle(5)">
                <div class="dt-card-ico">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" stroke-linecap="round" stroke-linejoin="round"/>
                        <polyline points="14 2 14 8 20 8" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="16" y1="13" x2="8" y2="13" stroke-linecap="round"/>
                        <line x1="16" y1="17" x2="8" y2="17" stroke-linecap="round"/>
                        <line x1="10" y1="9"  x2="8" y2="9"  stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="dt-card-title">Pháp lý &amp; Nội thất</div>
                <span class="dt-card-badge dt-badge-opt">Không bắt buộc</span>
                <div class="dt-card-summary" id="sum-5"></div>
                <span class="dt-card-arrow" id="arr-5">▾</span>
            </div>
            <div class="dt-card-body" id="body-5">
                <div class="dt-section-label">Giấy tờ pháp lý</div>
                <div class="dt-field" style="margin-bottom:14px;">
                    <div class="dt-label" style="margin-bottom:8px;">Loại giấy tờ</div>
                    <div class="dt-chips" id="phap-ly-chips">
                        <?php foreach (['so-do'=>'Sổ đỏ (GCNQSD đất)','so-hong'=>'Sổ hồng (GCNQSH)','hop-dong'=>'Hợp đồng mua bán','giay-to-khac'=>'Giấy tờ khác','chua-co'=>'Chưa có'] as $v=>$l): ?>
                        <div class="dt-chip" data-g="phap_ly" data-v="<?php echo esc_attr($v);?>"
                             onclick="dtChipSingle(this,'phap_ly','phap-ly-val')"><?php echo esc_html($l);?></div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="prefix-phap-ly" id="phap-ly-val" value="">
                </div>
                <div class="dt-section-label">Tình trạng nội thất</div>
                <div class="dt-field">
                    <div class="dt-label" style="margin-bottom:8px;">Nội thất</div>
                    <div class="dt-chips" id="noi-that-chips">
                        <?php foreach (['day-du'=>'Đầy đủ','co-ban'=>'Cơ bản','cao-cap'=>'Cao cấp','khong-co'=>'Không có'] as $v=>$l): ?>
                        <div class="dt-chip" data-g="noi_that" data-v="<?php echo esc_attr($v);?>"
                             onclick="dtChipSingle(this,'noi_that','noi-that-val')"><?php echo esc_html($l);?></div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="prefix-noi-that" id="noi-that-val" value="">
                </div>
                <div class="btn-next"><button type="button" onclick="dtNext(5)">Tiếp tục →</button></div>
            </div>
        </div>

        <div class="dt-card is-locked" id="block-6">
            <div class="dt-card-head" onclick="dtToggle(6)">
                <div class="dt-card-ico">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="dt-card-title">Tiêu đề &amp; Mô tả</div>
                <span class="dt-card-badge dt-badge-req">Bắt buộc</span>
                <div class="dt-card-summary" id="sum-6"></div>
                <span class="dt-card-arrow" id="arr-6">▾</span>
            </div>
            <div class="dt-card-body" id="body-6">
                <div class="dt-field" style="margin-bottom:14px;">
                    <label class="dt-label">Tiêu đề <span class="dt-req">*</span></label>
                    <input class="dt-input" type="text" name="post_title" id="title-inp"
                           placeholder="Ví dụ: Bán nhà 3 tầng 75m², hẻm xe hơi, Quận 1, giá 8.5 tỷ"
                           maxlength="150"
                           value="<?php echo esc_attr($_POST['post_title'] ?? ''); ?>"
                           oninput="cntChars(this,'cnt-title',150)">
                    <div class="dt-char-row">
                        <span class="dt-hint">Tiêu đề rõ ràng giúp tăng khả năng tiếp cận</span>
                        <span class="dt-char-count"><span id="cnt-title">0</span>/150</span>
                    </div>
                </div>
                <div class="dt-field">
                    <label class="dt-label">Mô tả</label>
                    <textarea class="dt-textarea" name="post_content" rows="6" maxlength="3000"
                              placeholder="Mô tả về vị trí, tiện ích, tình trạng pháp lý, lý do bán/cho thuê..."
                              oninput="cntChars(this,'cnt-desc',3000)"><?php echo esc_textarea($_POST['post_content'] ?? ''); ?></textarea>
                    <div class="dt-char-row">
                        <span class="dt-hint">Tối thiểu 50 ký tự</span>
                        <span class="dt-char-count"><span id="cnt-desc">0</span>/3000</span>
                    </div>
                </div>
                <div class="btn-next"><button type="button" onclick="dtNext(6)">Tiếp tục →</button></div>
            </div>
        </div>

        <div class="dt-card is-locked" id="block-7">
            <div class="dt-card-head" onclick="dtToggle(7)">
                <div class="dt-card-ico">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
                <div class="dt-card-title">Thông tin liên hệ</div>
                <span class="dt-card-badge dt-badge-req">Bắt buộc</span>
                <div class="dt-card-summary" id="sum-7"></div>
                <span class="dt-card-arrow" id="arr-7">▾</span>
            </div>
            <div class="dt-card-body" id="body-7">
                <div class="dt-info">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="flex-shrink:0;margin-top:1px;">
                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    Thông tin được lấy từ hồ sơ tài khoản. Bạn có thể thay đổi riêng cho tin đăng này.
                </div>
                <div class="dt-grid">
                    <div class="dt-field">
                        <label class="dt-label">Họ và tên <span class="dt-req">*</span></label>
                        <input class="dt-input" type="text" name="prefix-name-custom"
                               value="<?php echo esc_attr($_POST['prefix-name-custom'] ?? $custom_user->full_name ?? ''); ?>"
                               placeholder="Nhập họ tên">
                    </div>
                    <div class="dt-field">
                        <label class="dt-label">Số điện thoại <span class="dt-req">*</span></label>
                        <input class="dt-input" type="tel" name="prefix-phone-custom"
                               value="<?php echo esc_attr($_POST['prefix-phone-custom'] ?? $custom_user->phone ?? ''); ?>"
                               placeholder="0901 234 567">
                    </div>
                    <div class="dt-field dt-full">
                        <label class="dt-label">Email</label>
                        <input class="dt-input" type="email" name="prefix-email-custom"
                               value="<?php echo esc_attr($_POST['prefix-email-custom'] ?? $custom_user->email ?? ''); ?>"
                               placeholder="email@example.com">
                    </div>
                </div>
            </div>
        </div>

        <div class="dt-footer">
            <div class="dt-footer-note">Tin đăng sẽ được kiểm duyệt trong <strong>24 giờ</strong>.</div>
            <button type="submit" class="btn-primary" id="btn-submit">Đăng tin ngay</button>
        </div>
    </form>
</div>

<div class="confirm-post-popup">
    <?php get_template_part('authentication/popup-confirm-post'); ?>
</div>
 
<div class="balance-popup">
    <?php get_template_part('authentication/popup-insufficient-balance'); ?>
</div>

<?php get_footer(); ?>