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

    $property_type_terms = get_terms(['taxonomy' => 'property_type', 'hide_empty' => false, 'parent' => 0]);
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

    $errors  = [];
    $success = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dang_tin_nonce'])
        && wp_verify_nonce($_POST['dang_tin_nonce'], 'dang_tin_action')) {

        $title   = sanitize_text_field($_POST['post_title'] ?? '');
        $content = wp_kses_post($_POST['post_content'] ?? '');
        $mode    = sanitize_text_field($_POST['dt_mode'] ?? 'bds');

        if (empty($title))                    $errors[] = 'Vui lòng nhập tiêu đề.';
        if (empty($_POST['prefix-price']))    $errors[] = 'Vui lòng nhập giá.';
        if (empty($_POST['prefix-area']))     $errors[] = 'Vui lòng nhập diện tích.';
        if (empty($_POST['prefix-address']))  $errors[] = 'Vui lòng nhập địa chỉ.';
        if (empty($_POST['image_ids']))       $errors[] = 'Vui lòng tải lên ít nhất 1 ảnh.';
        if ($mode === 'bds'   && empty($_POST['property_type_val']))      $errors[] = 'Vui lòng chọn loại bất động sản.';
        if ($mode === 'du_an' && empty($_POST['property_developer_val'])) $errors[] = 'Vui lòng chọn dự án.';

        if (empty($errors)) {
            $post_id = wp_insert_post([
                'post_title'   => $title,
                'post_content' => $content,
                'post_status'  => 'pending',
                'post_type'    => 'property',
                'post_author'  => 1,
            ]);

            if ($post_id && !is_wp_error($post_id)) {
                $meta_fields = [
                    'prefix-price','prefix-area','prefix-bedroom','prefix-bathroom',
                    'prefix-address','prefix-video','prefix-name-custom',
                    'prefix-phone-custom','prefix-email-custom','prefix-address-bds',
                    'prefix-phap-ly','prefix-noi-that',
                ];
                foreach ($meta_fields as $f) {
                    if (isset($_POST[$f])) update_post_meta($post_id, $f, sanitize_text_field($_POST[$f]));
                }
                update_post_meta($post_id, '_custom_user_id', $uid);
                update_post_meta($post_id, '_dt_mode', $mode);

                if ($mode === 'bds'   && !empty($_POST['property_type_val']))
                    wp_set_post_terms($post_id, [intval($_POST['property_type_val'])], 'property_type');
                if ($mode === 'du_an' && !empty($_POST['property_developer_val']))
                    wp_set_post_terms($post_id, [intval($_POST['property_developer_val'])], 'property_developer');
                if (!empty($_POST['property_location_val']))
                    wp_set_post_terms($post_id, [intval($_POST['property_location_val'])], 'property_location');
                if (!empty($_POST['huong']))
                    wp_set_post_terms($post_id, [intval($_POST['huong'])], 'property_direction');
                if (!empty($_POST['loai_tin']))
                    wp_set_post_terms($post_id, [sanitize_text_field($_POST['loai_tin'])], 'property_status', false);

                $image_ids = array_filter(array_map('intval', explode(',', $_POST['image_ids'] ?? '')));
                if (!empty($image_ids)) {
                    set_post_thumbnail($post_id, $image_ids[0]);
                    update_post_meta($post_id, 'prefix-photos', $image_ids);
                }
                $success = true;
            } else {
                $errors[] = 'Có lỗi khi đăng tin. Vui lòng thử lại.';
            }
        }
    }
?>

<?php if ( dang_tin_success() ) : ?>
<div style="max-width:860px;margin:40px auto;padding:0 16px;">
    <div class="dt-alert-ok">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:1px;">
            <polyline points="20 6 9 17 4 12" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <div>
            <div style="font-weight:700;font-size:15px;margin-bottom:4px;">Đăng tin thành công!</div>
            <div style="font-size:13px;color:#2e7d32;">Tin đang chờ kiểm duyệt. Chúng tôi sẽ phản hồi trong vòng 24 giờ.</div>
            <div class="success-links">
                <a href="<?php echo esc_url( home_url('/quan-ly-tai-khoan/quan-ly-tin/') ); ?>" class="link-green">Quản lý tin đăng</a>
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="link-outline">Đăng tin khác</a>
            </div>
        </div>
    </div>
</div>
<?php return; endif; ?>

<div class="dt-wrap">

    <div class="dt-header">
        <h1>Đăng tin bất động sản</h1>
    </div>

    <div class="dt-progress">
        <?php
        $steps = [
            1 => 'Phân loại',
            2 => 'Vị trí',
            3 => 'Đặc điểm',
            4 => 'Hình ảnh',
            5 => 'Pháp lý & Nội thất',
            6 => 'Nội dung',
            7 => 'Liên hệ',
        ];
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
    if ( ! empty( $errors ) ) : ?>
    <div class="dt-alert-err">
        <strong>Vui lòng kiểm tra lại:</strong>
        <ul style="margin:6px 0 0 16px;">
            <?php foreach ( $errors as $e ) : ?>
            <li><?php echo esc_html( $e ); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <form method="post" id="dt-form" enctype="multipart/form-data">
        <?php wp_nonce_field('dang_tin_action', 'dang_tin_nonce'); ?>
        <input type="hidden" name="image_ids"              id="dt-image-ids"       value="">
        <input type="hidden" name="dt_mode"                id="dt-mode-val"        value="bds">
        <input type="hidden" name="property_type_val"      id="pt-val"             value="">
        <input type="hidden" name="property_developer_val" id="dev-val"            value="">
        <input type="hidden" name="property_location_val"  id="loc-val"            value="">

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
                        <button type="button" class="dt-tab active" id="tab-bds"   onclick="dtSetMode('bds')">Bất động sản</button>
                        <button type="button" class="dt-tab"        id="tab-duan"  onclick="dtSetMode('du_an')">Dự án</button>
                    </div>
                </div>

                <div class="dt-field" style="margin-bottom:16px;">
                    <div class="dt-label" style="margin-bottom:8px;">Hình thức <span class="dt-req">*</span></div>
                    <div class="dt-chips">
                        <div class="dt-chip sel" data-g="loai_tin" data-v="ban" onclick="dtChip(this,'loai_tin')">Bán</div>
                        <div class="dt-chip"     data-g="loai_tin" data-v="cho-thue" onclick="dtChip(this,'loai_tin')">Cho thuê</div>
                    </div>
                    <input type="hidden" name="loai_tin" id="loai_tin_val" value="ban">
                </div>

                <div id="sec-bds">
                    <div class="dt-field">
                        <div class="dt-label" style="margin-bottom:8px;">Loại bất động sản <span class="dt-req">*</span></div>
                        <div class="dt-chips" id="pt-chips">
                            <?php
                            $pt_icons = ['nha-o'=>'Nhà ở','can-ho-chung-cu'=>'Căn hộ / Chung cư','dat-nen'=>'Đất nền','biet-thu'=>'Biệt thự','nha-pho'=>'Nhà phố','dat-vuon'=>'Đất vườn','dat-xay-dung'=>'Đất xây dựng','van-phong'=>'Văn phòng / Mặt bằng'];
                            if (!is_wp_error($property_type_terms) && !empty($property_type_terms)):
                                foreach ($property_type_terms as $t):
                            ?>
                            <div class="dt-chip" data-g="property_type" data-v="<?php echo esc_attr($t->term_id); ?>"
                                 onclick="dtSelectType(this)"><?php echo esc_html($t->name); ?></div>
                            <?php
                                    if (!empty($property_type_children[$t->term_id])):
                                        $sd = array_map(fn($c) => ['id'=>$c->term_id,'name'=>$c->name], $property_type_children[$t->term_id]);
                                ?>
                            <script>dtST=dtST||{};dtST[<?php echo $t->term_id;?>]=<?php echo json_encode($sd);?>;</script>
                            <?php   endif; endforeach;
                            else:
                                foreach ([['Nhà ở',0],['Căn hộ',1],['Đất nền',2],['Biệt thự',3],['Nhà phố',4]] as [$l,$i]):
                            ?>
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
                            <?php if (!is_wp_error($property_location_terms)):
                                foreach ($property_location_terms as $l): ?>
                            <option value="<?php echo esc_attr($l->term_id);?>"><?php echo esc_html($l->name);?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class="dt-field">
                        <label class="dt-label">Quận / Huyện</label>
                        <select class="dt-select" id="sel-quan" onchange="dtLoadL3(this.value); dtUpdateLoc()">
                            <option value="">-- Chọn --</option>
                        </select>
                    </div>
                    <div class="dt-field">
                        <label class="dt-label">Phường / Xã</label>
                        <select class="dt-select" id="sel-phuong" onchange="dtUpdateLoc()">
                            <option value="">-- Chọn --</option>
                        </select>
                    </div>
                </div>

                <div class="dt-field dt-full" style="margin-bottom:14px;">
                    <label class="dt-label">Địa chỉ chi tiết <span class="dt-req">*</span></label>
                    <input class="dt-input" type="text" name="prefix-address"
                           placeholder="Số nhà, tên đường..."
                           value="<?php echo esc_attr($_POST['prefix-address'] ?? ''); ?>">
                </div>

                <div class="dt-section-label">Xác định trên bản đồ</div>

                <div class="dt-field" style="margin-bottom:8px; position:relative;">
                    <label class="dt-label">Tìm kiếm địa chỉ</label>
                    <div style="position:relative;">
                        <input class="dt-input" type="text" id="map-search"
                               placeholder="Nhập địa chỉ để tìm..." autocomplete="off">
                        <span id="map-spin" style="display:none;position:absolute;right:10px;top:50%;transform:translateY(-50%);font-size:13px;">⏳</span>
                        <div class="dt-map-suggest" id="map-suggest"></div>
                    </div>
                </div>

                <div id="dt-map"></div>
                <input type="hidden" name="prefix-address-bds" id="map-addr">
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
                    <div class="dt-price-row">
                        <input class="dt-input" type="text" inputmode="numeric" name="prefix-price" id="price-inp"
                               placeholder="Ví dụ: 3.500.000.000"
                               value="<?php echo esc_attr($_POST['prefix-price'] ?? ''); ?>"
                               oninput="fmtPrice(this)">
                    </div>
                    <div class="dt-hint" id="price-hint">Nhập giá → tự động hiển thị bằng chữ</div>
                </div>

                <div class="dt-grid" style="margin-bottom:14px;">
                    <div class="dt-field">
                        <label class="dt-label">Diện tích (m²) <span class="dt-req">*</span></label>
                        <input class="dt-input" type="number" name="prefix-area" min="1"
                               placeholder="75"
                               value="<?php echo esc_attr($_POST['prefix-area'] ?? ''); ?>">
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
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">≥ 5</option>
                        </select>
                    </div>
                    <div class="dt-field">
                        <label class="dt-label">Số nhà vệ sinh</label>
                        <select name="prefix-bathroom" class="dt-select">
                            <option value="">-- Chọn --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
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
                    <span>1 ảnh chính (bắt buộc) + tối đa 5 ảnh phụ. Định dạng JPG, PNG, WebP, tối đa 10MB/ảnh.</span>
                </div>
            
                <div class="dt-section-label">Ảnh chính <span class="dt-req">*</span></div>
                <div class="dt-field" style="margin-bottom:20px;">
                    <label class="dt-label" style="font-size:13px;color:var(--c-muted);">Ảnh đại diện — hiển thị trong kết quả tìm kiếm</label>
                    <input class="dt-input" type="file"
                        name="main_image"
                        id="main-file-input"
                        accept="image/jpeg,image/jpg,image/png,image/gif,image/webp"
                        required
                        onchange="dtPreviewMain(this)">
                    <div id="main-preview" style="margin-top:10px;display:none;">
                        <img id="main-preview-img" src="" alt="Ảnh chính"
                            style="max-width:100%;max-height:260px;border-radius:8px;border:1px solid var(--c-border);object-fit:cover;">
                    </div>
                </div>
            
                <div class="dt-section-label">Ảnh phụ (tối đa 5)</div>
                <div class="dt-field" style="margin-bottom:14px;">
                    <input class="dt-input" type="file"
                        name="sub_images[]"
                        id="sub-file-input"
                        accept="image/jpeg,image/jpg,image/png,image/gif,image/webp"
                        multiple
                        onchange="dtPreviewSubs(this)">
                    <div id="sub-previews" class="dt-img-grid" style="margin-top:10px;"></div>
                </div>
            
                <div class="dt-field" style="margin-top:18px;">
                    <label class="dt-label">Link video YouTube</label>
                    <input class="dt-input" type="url" name="prefix-video"
                        placeholder="https://youtube.com/..."
                        value="<?php echo old_form_value('prefix-video'); ?>">
                    <div class="dt-hint">Video giúp tăng lượt xem tin đăng</div>
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
                        <?php
                        $phap_ly_list = [
                            'so-do'         => 'Sổ đỏ (GCNQSD đất)',
                            'so-hong'       => 'Sổ hồng (GCNQSH)',
                            'hop-dong'      => 'Hợp đồng mua bán',
                            'giay-to-khac'  => 'Giấy tờ khác',
                            'chua-co'       => 'Chưa có',
                        ];
                        foreach ($phap_ly_list as $v => $l): ?>
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
                        <?php
                        $noi_that_list = [
                            'day-du'      => 'Đầy đủ',
                            'co-ban'      => 'Cơ bản',
                            'cao-cap'     => 'Cao cấp',
                            'khong-co'    => 'Không có',
                        ];
                        foreach ($noi_that_list as $v => $l): ?>
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
            <div class="dt-footer-note">
                Tin đăng sẽ được kiểm duyệt trong <strong>24 giờ</strong>.
            </div>
            <button type="submit" class="btn-primary" id="btn-submit">Đăng tin ngay</button>
        </div>

    </form>
</div>
<?php get_footer(); ?>

<script>
var dtST = {};
var dtDevTree = <?php echo json_encode(array_values($developer_tree));?> ;
var dtLocL2 = <?php echo json_encode($location_l2);?>;
var dtLocL3 = <?php echo json_encode($location_l3);?>;
var BLOCKS = 7;
var unlocked = [1];
var completed = [];

function isUnlocked(n) {
   return unlocked.indexOf(n) !== -1;
}

function dtToggle(n) {
   if (!isUnlocked(n)) return;
   var body = document.getElementById('body-' + n);
   var arr = document.getElementById('arr-' + n);
   var isOpen = body.classList.contains('open');

   for (var i = 1; i <= BLOCKS; i++) {
      var b = document.getElementById('body-' + i);
      var a = document.getElementById('arr-' + i);
      if (b) b.classList.remove('open');
      if (a) a.classList.remove('open');
   }
   if (!isOpen) {
      body.classList.add('open');
      arr.classList.add('open');
      setTimeout(function () {
         document.getElementById('block-' + n).scrollIntoView({
            behavior: 'smooth',
            block: 'start'
         });
      }, 50);
   }
}

function dtUnlock(n) {
   if (isUnlocked(n)) return;
   unlocked.push(n);
   var card = document.getElementById('block-' + n);
   var nav = document.getElementById('step-' + n + '-nav');
   if (card) {
      card.classList.remove('is-locked');
      card.classList.add('is-active');
   }
   if (nav) nav.classList.remove('locked');
}

function dtMarkDone(n) {
   var nav = document.getElementById('step-' + n + '-nav');
   if (nav) {
      nav.classList.remove('s-active');
      nav.classList.add('s-done');
      var num = nav.querySelector('.dt-prog-num');
      if (num) num.innerHTML = '✓';
   }
   if (completed.indexOf(n) === -1) completed.push(n);
}

function dtNext(n) {
   dtMarkDone(n);
   dtUnlock(n + 1);

   var curB = document.getElementById('body-' + n);
   var curA = document.getElementById('arr-' + n);
   if (curB) curB.classList.remove('open');
   if (curA) curA.classList.remove('open');

   if (n + 1 <= BLOCKS) {
      var nb = document.getElementById('body-' + (n + 1));
      var na = document.getElementById('arr-' + (n + 1));
      var nn = document.getElementById('step-' + (n + 1) + '-nav');
      if (nb) nb.classList.add('open');
      if (na) na.classList.add('open');
      if (nn) {
         nn.classList.remove('locked');
         nn.classList.add('s-active');
      }
      var ncard = document.getElementById('block-' + (n + 1));
      if (ncard) setTimeout(function () {
         ncard.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
         });
      }, 100);
   }
   if (n === 1) setTimeout(dtInitMap, 300);
}

function dtSetMode(mode) {
   document.getElementById('dt-mode-val').value = mode;
   document.getElementById('tab-bds').classList.toggle('active', mode === 'bds');
   document.getElementById('tab-duan').classList.toggle('active', mode === 'du_an');
   document.getElementById('sec-bds').style.display = mode === 'bds' ? '' : 'none';
   document.getElementById('sec-duan').style.display = mode === 'du_an' ? '' : 'none';
   document.getElementById('pt-val').value = '';
   document.getElementById('dev-val').value = '';
   document.getElementById('sum-1').textContent = '';
}

function dtSelectType(el) {
   document.querySelectorAll('[data-g="property_type"]').forEach(function (c) {
      c.classList.remove('sel');
   });
   el.classList.add('sel');
   var tid = el.dataset.v;
   document.getElementById('pt-val').value = tid;

   var wrap = document.getElementById('pt-sub');
   var chips = document.getElementById('pt-sub-chips');
   if (dtST[tid] && dtST[tid].length) {
      chips.innerHTML = '';
      dtST[tid].forEach(function (s) {
         var d = document.createElement('div');
         d.className = 'dt-chip';
         d.dataset.g = 'pt_sub';
         d.dataset.v = s.id;
         d.textContent = s.name;
         d.onclick = function () {
            document.querySelectorAll('[data-g="pt_sub"]').forEach(function (c) {
               c.classList.remove('sel');
            });
            d.classList.add('sel');
            document.getElementById('pt-val').value = s.id;
            document.getElementById('sum-1').textContent = s.name;
         };
         chips.appendChild(d);
      });
      wrap.style.display = '';
   } else {
      wrap.style.display = 'none';
   }
   document.getElementById('sum-1').textContent = el.textContent.trim();
}

function dtDev1(el) {
   document.querySelectorAll('[data-g="dev1"]').forEach(function (c) {
      c.classList.remove('sel');
   });
   document.getElementById('dev2-wrap').style.display = 'none';
   document.getElementById('dev2-chips').innerHTML = '';
   document.getElementById('dev-val').value = '';

   el.classList.add('sel');
   var devId = parseInt(el.dataset.v);
   var devName = el.dataset.name || el.textContent.trim();

   var found = null;
   for (var i = 0; i < dtDevTree.length; i++) {
      if (dtDevTree[i].id === devId) {
         found = dtDevTree[i];
         break;
      }
   }

   if (!found || !found.children || !found.children.length) {
      document.getElementById('dev-val').value = devId;
      document.getElementById('sum-1').textContent = devName;
      return;
   }

   document.getElementById('dev2-label').textContent = devName;
   var c2 = document.getElementById('dev2-chips');
   found.children.forEach(function (sub) {
      var d = document.createElement('div');
      d.className = 'dt-chip';
      d.dataset.g = 'dev2';
      d.dataset.v = sub.id;
      d.dataset.name = sub.name;
      d.textContent = sub.name;
      d.onclick = function () {
         document.querySelectorAll('[data-g="dev2"]').forEach(function (c) {
            c.classList.remove('sel');
         });
         d.classList.add('sel');
         document.getElementById('dev-val').value = sub.id;
         document.getElementById('sum-1').textContent = sub.name;
      };
      c2.appendChild(d);
   });
   document.getElementById('dev2-wrap').style.display = '';
   document.getElementById('sum-1').textContent = devName;
}

function dtLoadL2(tinhId) {
   var s2 = document.getElementById('sel-quan');
   var s3 = document.getElementById('sel-phuong');
   s2.innerHTML = '<option value="">-- Chọn --</option>';
   s3.innerHTML = '<option value="">-- Chọn --</option>';
   if (dtLocL2[tinhId]) {
      dtLocL2[tinhId].forEach(function (q) {
         var o = document.createElement('option');
         o.value = q.id;
         o.textContent = q.name;
         s2.appendChild(o);
      });
   }
   dtUpdateLoc();
}

function dtLoadL3(quanId) {
   var s3 = document.getElementById('sel-phuong');
   s3.innerHTML = '<option value="">-- Chọn --</option>';
   if (dtLocL3[quanId]) {
      dtLocL3[quanId].forEach(function (p) {
         var o = document.createElement('option');
         o.value = p.id;
         o.textContent = p.name;
         s3.appendChild(o);
      });
   }
   dtUpdateLoc();
}

function dtUpdateLoc() {
   var s1 = document.getElementById('sel-tinh');
   var s2 = document.getElementById('sel-quan');
   var s3 = document.getElementById('sel-phuong');
   var val = s3.value || s2.value || s1.value;
   document.getElementById('loc-val').value = val;

   var t1 = s1.selectedIndex > 0 ? s1.options[s1.selectedIndex].text : '';
   var t2 = s2.selectedIndex > 0 ? s2.options[s2.selectedIndex].text : '';
   var t3 = s3.selectedIndex > 0 ? s3.options[s3.selectedIndex].text : '';
   var parts = [t3, t2, t1].filter(Boolean);
   document.getElementById('sum-2').textContent = parts.join(', ');
}

function dtChip(el, group) {
   document.querySelectorAll('[data-g="' + group + '"]').forEach(function (c) {
      c.classList.remove('sel');
   });
   el.classList.add('sel');
   var hid = group + '_val';
   if (document.getElementById(hid)) document.getElementById(hid).value = el.dataset.v;
}

function dtChipSingle(el, group, hiddenId) {
   document.querySelectorAll('[data-g="' + group + '"]').forEach(function (c) {
      c.classList.remove('sel');
   });
   el.classList.add('sel');
   document.getElementById(hiddenId).value = el.dataset.v;
   var phl = document.getElementById('phap-ly-val') ? document.getElementById('phap-ly-val').value : '';
   var ntl = document.getElementById('noi-that-val') ? document.getElementById('noi-that-val').value : '';
   var parts = [phl, ntl].filter(Boolean);
   document.getElementById('sum-5').textContent = parts.length ? parts.join(' · ') : '';
}

function fmtPrice(inp) {
   var raw = inp.value.replace(/\./g, '').replace(/[^0-9]/g, '');
   if (!raw) {
      document.getElementById('price-hint').textContent = 'Nhập giá → tự động hiển thị bằng chữ';
      document.getElementById('sum-3').textContent = '';
      inp.value = '';
      return;
   }
   inp.value = raw.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
   var n = parseInt(raw),
      txt = '';
   if (n >= 1e9) txt = (+(n / 1e9).toFixed(2)) + ' tỷ đồng';
   else if (n >= 1e6) txt = (+(n / 1e6).toFixed(1)) + ' triệu đồng';
   else txt = n.toLocaleString('vi-VN') + ' đồng';
   document.getElementById('price-hint').textContent = '→ ' + txt;
   document.getElementById('sum-3').textContent = txt;
}

var dtMap = null,
   dtMarker = null,
   mapTimer = null;

function dtInitMap() {
   if (dtMap) return;
   if (!document.getElementById('leaflet-css')) {
      var lc = document.createElement('link');
      lc.id = 'leaflet-css';
      lc.rel = 'stylesheet';
      lc.href = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css';
      document.head.appendChild(lc);
   }
   if (typeof L === 'undefined') {
      var ls = document.createElement('script');
      ls.src = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js';
      ls.onload = dtCreateMap;
      document.head.appendChild(ls);
   } else {
      dtCreateMap();
   }
}

function dtCreateMap() {
   var el = document.getElementById('dt-map');
   if (!el || dtMap) return;
   dtMap = L.map('dt-map').setView([10.7769, 106.7009], 13);
   L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap',
      maxZoom: 19
   }).addTo(dtMap);
   dtMarker = L.marker([10.7769, 106.7009], {
      draggable: true
   }).addTo(dtMap);
   dtMarker.on('dragend', function (e) {
      var p = e.target.getLatLng();
      setMapPos(p.lat, p.lng);
      dtRevGeo(p.lat, p.lng);
   });
   dtMap.on('click', function (e) {
      dtMarker.setLatLng(e.latlng);
      setMapPos(e.latlng.lat, e.latlng.lng);
      dtRevGeo(e.latlng.lat, e.latlng.lng);
   });
}

function setMapPos(lat, lng) {
   document.getElementById('map-lat').value = lat.toFixed(7);
   document.getElementById('map-lng').value = lng.toFixed(7);
}

function dtRevGeo(lat, lng) {
   fetch('https://nominatim.openstreetmap.org/reverse?lat=' + lat + '&lon=' + lng + '&format=json&accept-language=vi')
      .then(function (r) {
         return r.json();
      })
      .then(function (d) {
         if (d && d.display_name) {
            document.getElementById('map-search').value = d.display_name;
            document.getElementById('map-addr').value = d.display_name;
         }
      }).catch(function () {});
}

function dtMapGoTo(lat, lng, label) {
   if (!dtMap) {
      dtInitMap();
      setTimeout(function () {
         dtMapGoTo(lat, lng, label);
      }, 800);
      return;
   }
   dtMap.setView([lat, lng], 16);
   dtMarker.setLatLng([lat, lng]);
   setMapPos(lat, lng);
   document.getElementById('map-search').value = label;
   document.getElementById('map-addr').value = label;
   document.getElementById('map-suggest').style.display = 'none';
}

var dtMainImg = null;
var dtSubImgs = [];
var SUB_MAX = 5;

function escHtml(str) {
   return String(str)
      .replace(/&/g, '&').replace(/</g, '<')
      .replace(/>/g, '>').replace(/"/g, '"');
}

function cntChars(el, cid, max) {
   var n = el.value.length;
   document.getElementById(cid).textContent = n;
   document.getElementById(cid).style.color = n > max * .9 ? 'var(--c-red)' : '';
   if (cid === 'cnt-title' && el.value.trim()) {
      document.getElementById('sum-6').textContent = el.value.trim().substring(0, 35) + (el.value.length > 35 ? '...' : '');
   }
}

document.getElementById('dt-form').addEventListener('submit', function (e) {
   var mode = document.getElementById('dt-mode-val').value;
   if (mode === 'bds' && !document.getElementById('pt-val').value) {
      e.preventDefault();
      alert('Vui lòng chọn loại bất động sản');
      return;
   }
   if (mode === 'du_an' && !document.getElementById('dev-val').value) {
      e.preventDefault();
      alert('Vui lòng chọn dự án');
      return;
   }
   if (!document.getElementById('title-inp').value.trim()) {
      e.preventDefault();
      document.getElementById('title-inp').focus();
      alert('Vui lòng nhập tiêu đề');
      return;
   }
   var mainFileInp = document.getElementById('main-file-input');
   if (!dtMainImg && (!mainFileInp || !mainFileInp.files || !mainFileInp.files.length)) {
      e.preventDefault();
      alert('Vui lòng chọn ảnh chính');
      return;
   }
   var btn = document.getElementById('btn-submit');
   btn.disabled = true;
   btn.textContent = 'Đang gửi...';
});

document.addEventListener('DOMContentLoaded', function () {
   var si = document.getElementById('map-search');
   var sg = document.getElementById('map-suggest');
   if (si) {
      si.addEventListener('input', function () {
         clearTimeout(mapTimer);
         var q = this.value.trim();
         if (q.length < 3) {
            sg.style.display = 'none';
            return;
         }
         document.getElementById('map-spin').style.display = 'inline';
         mapTimer = setTimeout(function () {
            fetch('https://nominatim.openstreetmap.org/search?q=' +
                  encodeURIComponent(q + ', Việt Nam') +
                  '&format=json&limit=6&accept-language=vi&countrycodes=vn')
               .then(function (r) {
                  return r.json();
               })
               .then(function (res) {
                  document.getElementById('map-spin').style.display = 'none';
                  sg.innerHTML = '';
                  if (!res.length) {
                     sg.style.display = 'none';
                     return;
                  }
                  res.forEach(function (item) {
                     var d = document.createElement('div');
                     d.className = 'dt-suggest-item';
                     d.textContent = item.display_name;
                     d.onclick = function () {
                        dtMapGoTo(item.lat, item.lon, item.display_name);
                        var a = document.querySelector('[name="prefix-address"]');
                        if (a && !a.value.trim()) a.value = item.display_name.split(',')[0];
                     };
                     sg.appendChild(d);
                  });
                  sg.style.display = 'block';
               })
               .catch(function () {
                  document.getElementById('map-spin').style.display = 'none';
               });
         }, 400);
      });
      document.addEventListener('click', function (e) {
         if (!si.contains(e.target) && !sg.contains(e.target)) sg.style.display = 'none';
      });
   }
});
</script>
<script>
function dtPreviewMain(inp) {
    if (!inp.files || !inp.files[0]) return;
    var file = inp.files[0];
    if (file.size > 10 * 1024 * 1024) {
        alert('Ảnh quá 10MB. Vui lòng chọn ảnh nhỏ hơn.');
        inp.value = '';
        dtMainImg = null; 
        return;
    }
    dtMainImg = file; 
    var reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('main-preview-img').src = e.target.result;
        document.getElementById('main-preview').style.display = 'block';
        document.getElementById('sum-4').textContent = '1 ảnh chính';
    };
    reader.readAsDataURL(file);
}
 
function dtPreviewSubs(inp) {
    if (!inp.files || !inp.files.length) return;
    var files = Array.from(inp.files);
    if (files.length > 5) {
        alert('Chỉ được chọn tối đa 5 ảnh phụ. ' + (files.length - 5) + ' ảnh cuối bị bỏ qua.');
    }
    var grid = document.getElementById('sub-previews');
    grid.innerHTML = '';
    files.slice(0, 5).forEach(function(file, i) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var slot = document.createElement('div');
            slot.className = 'dt-sub-slot';
            slot.innerHTML = '<img src="' + e.target.result + '" alt="Ảnh phụ ' + (i+1) + '">';
            grid.appendChild(slot);
        };
        reader.readAsDataURL(file);
    });
    var mainTxt = document.getElementById('main-preview').style.display !== 'none' ? '1 ảnh chính, ' : '';
    document.getElementById('sum-4').textContent = mainTxt + Math.min(files.length, 5) + ' ảnh phụ';
}
</script>