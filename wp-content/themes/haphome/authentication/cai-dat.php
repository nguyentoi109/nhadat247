<style>
.cs-wrap {
	font-family: inherit;
}

.cs-tabbar {
	display: flex;
	border-bottom: 1px solid var(--ql-border);
	padding: 0 24px;
	background: #fff;
	overflow-x: auto;
	gap: 0;
}

.cs-tab {
	display: flex;
	align-items: center;
	gap: 7px;
	padding: 13px 18px;
	font-size: 13px;
	font-weight: 600;
	color: var(--ql-muted);
	text-decoration: none;
	border-bottom: 2.5px solid transparent;
	margin-bottom: -1px;
	white-space: nowrap;
	transition: color .15s, border-color .15s;
}

.cs-tab:hover {
	color: var(--ql-text);
}

.cs-tab.active {
	color: var(--ql-red);
	border-bottom-color: var(--ql-red);
}

.cs-tab svg {
	flex-shrink: 0;
}

.cs-alert {
	display: flex;
	align-items: center;
	gap: 10px;
	padding: 12px 16px;
	border-radius: 8px;
	font-size: 13px;
	font-weight: 500;
	margin-bottom: 16px;
}

.cs-alert-success {
	background: #d1fae5;
	border: 1px solid #6ee7b7;
	color: #065f46;
}

.cs-alert-error {
	background: #fee2e2;
	border: 1px solid #fca5a5;
	color: #991b1b;
}

.cs-section {
	background: #fff;
	border: 1px solid var(--ql-border);
	border-radius: 12px;
	overflow: hidden;
	margin-bottom: 14px;
}

.cs-section-head {
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 13px 20px;
	border-bottom: 1px solid #f3f4f6;
	background: #fafafa;
}

.cs-section-title {
	display: flex;
	align-items: center;
	gap: 8px;
	font-size: 13px;
	font-weight: 700;
	color: var(--ql-text);
}

.cs-section-title svg {
	color: var(--ql-red);
	flex-shrink: 0;
}

.cs-section-body {
	padding: 20px;
}

.cs-avatar-wrap {
	display: flex;
	align-items: center;
	gap: 16px;
	padding: 18px 20px;
	border-bottom: 1px solid #f3f4f6;
	background: #fafafa;
}

.cs-avatar-circle {
	width: 68px;
	height: 68px;
	border-radius: 50%;
	background: var(--ql-red);
	color: #fff;
	font-weight: 700;
	font-size: 24px;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-shrink: 0;
	position: relative;
	box-shadow: 0 2px 8px rgba(238, 0, 51, .25);
	overflow: hidden; 
}

.cs-avatar-img {
	width: 100%;
	height: 100%;
	object-fit: cover;
	object-position: center;
	border-radius: 50%;
	display: block;
}

.cs-avatar-letter {
	width: 100%;
	height: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
}

.cs-avatar-name {
	font-size: 18px;
	font-weight: 700;
	color: var(--ql-text);
}

.cs-avatar-email {
	font-size: 12px;
	color: var(--ql-muted);
}

.cs-avatar-edit-btn {
    height: 22px;
	font-size: 12px;
	font-weight: 600;
	color: var(--ql-red);
	background: none;
	border: none;
	cursor: pointer;
	padding: 0;
	font-family: inherit;
	display: inline-flex;
	align-items: center;
	gap: 4px;
}

.cs-avatar-edit-btn:hover {
	text-decoration: underline;
}

.cs-form-grid {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 14px;
}

.cs-form-group {
	display: flex;
	flex-direction: column;
	gap: 5px;
}

.cs-form-label {
	font-size: 11px;
	font-weight: 600;
	color: var(--ql-muted);
	text-transform: uppercase;
	letter-spacing: .4px;
}

.cs-form-label .req {
	color: var(--ql-red);
	margin-left: 2px;
}

.cs-form-input {
	padding: 9px 12px;
	border: 1.5px solid var(--ql-border);
	border-radius: 8px;
	font-family: inherit;
	font-size: 13px;
	color: var(--ql-text);
	background: #fff;
	outline: none;
	transition: border-color .2s, box-shadow .2s;
	width: 100%;
	box-sizing: border-box;
}

.cs-form-input:focus {
	border: 1px solid #2c2c2c;
}

select.cs-form-input {
	cursor: pointer;
}

textarea.cs-form-input {
	resize: vertical;
}

.cs-helper {
	font-size: 11px;
	color: var(--ql-faint);
	line-height: 1.4;
}

.cs-phone-row {
	display: flex;
	gap: 8px;
}

.cs-phone-row .cs-form-input {
	flex: 1;
}

.cs-verify-btn {
	flex-shrink: 0;
	padding: 9px 14px;
	border: 1.5px solid var(--ql-border);
	border-radius: 8px;
	background: #fff;
	font-family: inherit;
	font-size: 12px;
	font-weight: 600;
	color: var(--ql-muted);
	cursor: pointer;
	white-space: nowrap;
	transition: all .2s;
}

.cs-verify-btn:hover {
	border-color: var(--ql-red);
	color: var(--ql-red);
}

.cs-pw-strength {
	display: flex;
	gap: 4px;
	margin-top: 8px;
}

.cs-pw-bar {
	height: 3px;
	flex: 1;
	border-radius: 2px;
	background: #e5e7eb;
	transition: background .3s;
}

.cs-pw-bar.weak {
	background: #ef4444;
}

.cs-pw-bar.medium {
	background: #f59e0b;
}

.cs-pw-bar.strong {
	background: #10b981;
}

.cs-pw-label {
	font-size: 11px;
	color: var(--ql-faint);
	margin-top: 5px;
}

.cs-pw-rules {
	margin-top: 8px;
	display: flex;
	flex-direction: column;
	gap: 4px;
}

.cs-pw-rule {
	display: flex;
	align-items: center;
	gap: 6px;
	font-size: 11px;
	color: var(--ql-faint);
	transition: color .2s;
}

.cs-pw-rule.ok {
	color: #16a34a;
}

.cs-pw-rule-dot {
	width: 6px;
	height: 6px;
	border-radius: 50%;
	background: #d1d5db;
	flex-shrink: 0;
	transition: background .2s;
}

.cs-pw-rule.ok .cs-pw-rule-dot {
	background: #16a34a;
}

.cs-vat-notice {
	background: #fffbea;
	border: 1px solid #fde68a;
	border-radius: 8px;
	padding: 12px 14px;
	margin-bottom: 16px;
}

.cs-vat-notice-title {
	font-size: 12px;
	font-weight: 700;
	color: #92400e;
	margin-bottom: 5px;
}

.cs-vat-notice ul {
	padding-left: 16px;
	margin: 0;
	list-style: disc;
}

.cs-vat-notice li {
	font-size: 12px;
	color: #6b7280;
	line-height: 1.7;
}

.cs-form-footer {
	display: flex;
	align-items: center;
	justify-content: flex-end;
	gap: 10px;
	padding-top: 16px;
	margin-top: 8px;
	border-top: 1px solid #f3f4f6;
}

.cs-save-btn {
	padding: 10px 28px;
	background: var(--ql-red);
	color: #fff;
	border: none;
	border-radius: 8px;
	font-family: inherit;
	font-size: 13px;
	font-weight: 700;
	cursor: pointer;
	transition: background .2s;
}

.cs-save-btn:hover {
	background: var(--ql-red-dark, #cc0022);
}

.cs-outline-btn {
	padding: 9px 18px;
	background: #fff;
	color: var(--ql-text);
	border: 1.5px solid var(--ql-border);
	border-radius: 8px;
	font-family: inherit;
	font-size: 13px;
	font-weight: 600;
	cursor: pointer;
	transition: all .2s;
	text-decoration: none;
	display: inline-flex;
	align-items: center;
	gap: 6px;
}

.cs-outline-btn:hover {
	border-color: #9ca3af;
}

.cs-danger-btn {
	padding: 9px 18px;
	background: #fff;
	color: #dc2626;
	border: 1.5px solid #fca5a5;
	border-radius: 8px;
	font-family: inherit;
	font-size: 13px;
	font-weight: 600;
	cursor: pointer;
	transition: all .2s;
	display: inline-flex;
	align-items: center;
	gap: 6px;
}

.cs-danger-btn:hover {
	background: #fee2e2;
	border-color: #dc2626;
}

.cs-device-card {
	display: flex;
	align-items: flex-start;
	gap: 14px;
	padding: 14px 0;
	border-bottom: 1px solid #f3f4f6;
}

.cs-device-card:last-child {
	border-bottom: none;
	padding-bottom: 0;
}

.cs-device-icon {
	width: 42px;
	height: 42px;
	border-radius: 10px;
	background: #f3f4f6;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-shrink: 0;
	color: var(--ql-muted);
}

.cs-device-icon.current {
	background: #fee2e2;
	color: var(--ql-red);
}

.cs-device-info {
	flex: 1;
	min-width: 0;
}

.cs-device-name {
	font-size: 13px;
	font-weight: 600;
	color: var(--ql-text);
	display: flex;
	align-items: center;
	gap: 7px;
	flex-wrap: wrap;
	margin-bottom: 4px;
}

.cs-device-cur-badge {
	font-size: 10px;
	font-weight: 700;
	background: #d1fae5;
	color: #065f46;
	padding: 2px 7px;
	border-radius: 4px;
}

.cs-device-meta {
	font-size: 11px;
	color: var(--ql-muted);
	display: flex;
	gap: 14px;
	flex-wrap: wrap;
}

.cs-device-meta span {
	display: flex;
	align-items: center;
	gap: 4px;
}

.cs-device-time {
	font-size: 11px;
	color: var(--ql-faint);
	white-space: nowrap;
}

.cs-device-revoke {
	font-size: 11px;
	font-weight: 600;
	color: var(--ql-muted);
	background: none;
	border: none;
	cursor: pointer;
	font-family: inherit;
	padding: 0;
	margin-top: 5px;
	display: block;
	transition: color .15s;
}

.cs-device-revoke:hover {
	color: #dc2626;
}

.cs-revoke-all-btn {
	display: inline-flex;
	align-items: center;
	gap: 6px;
	padding: 6px 14px;
	background: #fff;
	color: #dc2626;
	border: 1.5px solid #fca5a5;
	border-radius: 7px;
	font-family: inherit;
	font-size: 12px;
	font-weight: 600;
	cursor: pointer;
	transition: all .2s;
}

.cs-revoke-all-btn:hover {
	background: #fee2e2;
}

.cs-danger-zone {
	border: 1px solid #fca5a5;
	border-radius: 12px;
	overflow: hidden;
	margin-bottom: 14px;
}

.cs-danger-head {
	display: flex;
	align-items: center;
	gap: 8px;
	padding: 13px 20px;
	background: #fff5f5;
	border-bottom: 1px solid #fecaca;
	font-size: 13px;
	font-weight: 700;
	color: #dc2626;
}

.cs-danger-body {
	padding: 0 20px;
}

.cs-danger-item {
	display: flex;
	align-items: flex-start;
	justify-content: space-between;
	gap: 16px;
	padding: 16px 0;
	border-bottom: 1px solid #f3f4f6;
}

.cs-danger-item:last-child {
	border-bottom: none;
}

.cs-danger-item-info h4 {
	font-size: 13px;
	font-weight: 600;
	color: var(--ql-text);
	margin: 0 0 4px;
}

.cs-danger-item-info p {
	font-size: 12px;
	color: var(--ql-muted);
	margin: 0;
	line-height: 1.5;
}

.cs-modal-overlay {
	display: none;
	position: fixed;
	inset: 0;
	background: rgba(0, 0, 0, .5);
	z-index: 9999;
	align-items: center;
	justify-content: center;
}

.cs-modal-overlay.open {
	display: flex;
}

.cs-modal {
	background: #fff;
	border-radius: 14px;
	padding: 28px;
	max-width: 400px;
	width: 90%;
	box-shadow: 0 20px 60px rgba(0, 0, 0, .2);
}

.cs-modal-icon {
	width: 52px;
	height: 52px;
	border-radius: 50%;
	background: #fee2e2;
	color: #dc2626;
	display: flex;
	align-items: center;
	justify-content: center;
	margin: 0 auto 16px;
}

.cs-modal h3 {
	font-size: 16px;
	font-weight: 700;
	text-align: center;
	color: var(--ql-text);
	margin: 0 0 8px;
}

.cs-modal p {
	font-size: 13px;
	color: var(--ql-muted);
	text-align: center;
	line-height: 1.6;
	margin: 0 0 16px;
}

.cs-modal-input {
	width: 100%;
	padding: 10px 12px;
	box-sizing: border-box;
	border: 1.5px solid var(--ql-border);
	border-radius: 8px;
	font-family: inherit;
	font-size: 13px;
	outline: none;
	margin-bottom: 12px;
	transition: border-color .2s;
}

.cs-modal-input:focus {
	border-color: #dc2626;
}

.cs-modal-actions {
	gap: 8px;
	margin-top: 4px;
}

.cs-modal-cancel {
	flex: 1;
	padding: 10px;
	background: #f3f4f6;
	color: var(--ql-text);
	border: none;
	border-radius: 8px;
	font-family: inherit;
	font-size: 13px;
	font-weight: 600;
	cursor: pointer;
}

.cs-modal-confirm {
	flex: 1;
	padding: 10px;
	background: #dc2626;
	color: #fff;
	border: none;
	border-radius: 8px;
	font-family: inherit;
	font-size: 13px;
	font-weight: 700;
	cursor: pointer;
	opacity: .4;
	transition: opacity .2s;
}

.cs-modal-confirm.ready {
	opacity: 1;
}

@media (max-width:640px) {
	.cs-form-grid {
		grid-template-columns: 1fr;
	}

	.cs-tabbar {
		padding: 0 12px;
	}

	.cs-tab {
		padding: 11px 12px;
		font-size: 12px;
	}

	.cs-section-body {
		padding: 16px;
	}

	.cs-danger-item {
		flex-direction: column;
		gap: 10px;
	}
}
</style>

<?php
    $user = get_current_custom_user();
    if ( ! $user ) { wp_die( 'Bạn chưa đăng nhập.' ); }

    $user_id      = (int) $user->id;
    $default_addr = custom_get_default_address( $user_id );

    $subtab = isset( $_GET['subtab'] ) ? sanitize_key( $_GET['subtab'] ) : 'thong-tin';
    if ( ! in_array( $subtab, [ 'thong-tin', 'bao-mat' ], true ) ) {
        $subtab = 'thong-tin';
    }

    $saved_msg = '';
    $error_msg = '';

    //UPDATE PROFILE
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['ql_save_profile_nonce'] ) && wp_verify_nonce( $_POST['ql_save_profile_nonce'], 'ql_save_profile' ) ) {
        $result = custom_validate_profile_data( $_POST );

        if ( ! empty( $result['errors'] ) ) {
            $error_msg = implode( '<br>', $result['errors'] );
        } else {
            $new_avatar_id = null;
            if ( ! empty( $_FILES['avatar_file'] ) && $_FILES['avatar_file']['error'] !== UPLOAD_ERR_NO_FILE ) {
                $attach_id = dt_upload_image( $_FILES['avatar_file'], $user_id );
                if ( is_wp_error( $attach_id ) ) {
                    $error_msg = $attach_id->get_error_message();
                } else {
                    $new_avatar_id = $attach_id;
                    $result['data']['avatar'] = $attach_id; 
                }
            }
            if ( empty( $error_msg ) ) {
                $old_avatar = $user->avatar ?? 0;
                $save = custom_save_profile( $user_id, $result['data'], $result['address'] );
                if ( is_wp_error( $save ) ) {
                    $error_msg = $save->get_error_message();
                    if ( $new_avatar_id ) {
                        wp_delete_attachment( $new_avatar_id, true ); 
                    }
                } else {
                    if ( $new_avatar_id && ! empty( $old_avatar ) ) {
                        wp_delete_attachment( (int) $old_avatar, true );
                    }
                    $saved_msg = 'Cập nhật thông tin thành công.';
                    $user = custom_get_user( $user_id );
                    $default_addr = custom_get_default_address( $user_id );
                }
            }
        }
        $subtab = 'thong-tin';
    }

    //CHANGE PASS
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['ql_change_pw_nonce'] ) && wp_verify_nonce( $_POST['ql_change_pw_nonce'], 'ql_change_pw' )) {
        $pw_result = custom_handle_change_password( $user_id, $_POST );
        $pw_result['success'] ? ( $saved_msg = $pw_result['message'] ) : ( $error_msg = $pw_result['message'] );
        $subtab = 'bao-mat';
    }

    //LOCKED ACCOUNT
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['ql_lock_account_nonce'] ) && wp_verify_nonce( $_POST['ql_lock_account_nonce'], 'ql_lock_account' )) {
        $lock_result = custom_handle_lock_account( $user_id, $_POST );
        if ( $lock_result['success'] ) {
            session_destroy();
            wp_redirect( home_url( '/?notice=account_locked' ) );
            exit;
        }
        $error_msg = $lock_result['message'];
        $subtab    = 'bao-mat';
    }

    // DELETE ACCOUNT
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['ql_delete_account_nonce'] ) && wp_verify_nonce( $_POST['ql_delete_account_nonce'], 'ql_delete_account' )) {
        $delete_result = custom_handle_delete_account( $user_id, $_POST );
        if ( $delete_result['success'] ) {
            session_destroy();
            wp_redirect( home_url( '/?notice=account_deleted' ) );
            exit;
        }
        $error_msg = $delete_result['message'];
        $subtab    = 'bao-mat';
    }

    $user = custom_get_user( $user_id );
    $is_locked = (int) ( $user->status ?? 0 ) === 1;

    $login_history = [
        [ 'current' => true,  'icon' => 'desktop', 'device' => 'Chrome · Windows 11', 'ip' => '171.244.x.x', 'location' => 'TP. Hồ Chí Minh', 'time' => 'Vừa xong' ],
        [ 'current' => false, 'icon' => 'mobile',  'device' => 'Safari · iPhone 14',  'ip' => '113.22.x.x',  'location' => 'Hà Nội',           'time' => '2 ngày trước' ],
    ];

    function caidat_tab_url( $subtab ) {
        return esc_url( add_query_arg( [ 'tab' => 'cai-dat', 'subtab' => $subtab ], get_permalink() ) );
    }
?>

<div class="cs-wrap">
    `<div class="ql-panel-header" style="padding-bottom:0;border-bottom:none;">
        <h2 class="ql-panel-title" style="padding:20px 24px 0;">Cài đặt tài khoản</h2>
        <div class="cs-tabbar">
            <a href="<?php echo caidat_tab_url('thong-tin'); ?>"
            class="cs-tab <?php echo $subtab === 'thong-tin' ? 'active' : ''; ?>">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>
                </svg>
                Thông tin cá nhân
            </a>
            <a href="<?php echo caidat_tab_url('bao-mat'); ?>"
            class="cs-tab <?php echo $subtab === 'bao-mat' ? 'active' : ''; ?>">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <rect x="3" y="11" width="18" height="11" rx="2"/>
                    <path d="M7 11V7a5 5 0 0110 0v4" stroke-linecap="round"/>
                </svg>
                Bảo mật &amp; Đăng nhập
            </a>
        </div>
    </div>
    
    <div class="ql-panel-body" style="padding-top:20px;">
    
    <?php if ( $saved_msg ): ?>
    <div class="cs-alert cs-alert-success">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <path d="M20 6L9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <?php echo esc_html( $saved_msg ); ?>
    </div>
    <?php endif; ?>
    
    <?php if ( $error_msg ): ?>
    <div class="cs-alert cs-alert-error">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <circle cx="12" cy="12" r="10"/>
            <path d="M12 8v4M12 16h.01" stroke-linecap="round"/>
        </svg>
        <?php echo wp_kses( $error_msg, [ 'br' => [] ] ); ?>
    </div>
    <?php endif; ?>
    
    <?php if ( $subtab === 'thong-tin' ): ?>
    <form method="post" enctype="multipart/form-data" action="<?php echo esc_url( add_query_arg( [ 'tab' => 'cai-dat', 'subtab' => 'thong-tin' ], get_permalink() ) ); ?>">
        <?php wp_nonce_field( 'ql_save_profile', 'ql_save_profile_nonce' ); ?>
    
        <div class="cs-section">
            <div class="cs-avatar-wrap">
                <div class="cs-avatar-circle" id="cs-avatar-circle">
                    <?php echo custom_get_avatar_html( $user ); ?>
                </div>
                <div>
                    <div class="cs-avatar-name"><?php echo esc_html( $user->full_name ); ?></div>
                    <label for="cs-avatar-input" class="cs-avatar-edit-btn" style="cursor:pointer;">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                            <polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/>
                        </svg>
                        Đổi ảnh đại diện
                    </label>
                    <input type="file" name="avatar_file" id="cs-avatar-input"
                        accept="image/jpeg,image/jpg,image/png,image/gif,image/webp"
                        style="display:none;">
                </div>
            </div>
    
            <div class="cs-section-head">
                <div class="cs-section-title">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>
                    </svg>
                    Thông tin cơ bản
                </div>
            </div>
            <div class="cs-section-body">
                <div class="cs-form-grid">
                    <div class="cs-form-group">
                        <label class="cs-form-label">Tên hiển thị</label>
                        <input class="cs-form-input" type="text" name="display_name"
                            value="<?php echo esc_attr( $user->full_name ?? '' ); ?>">
                    </div>
                    <div class="cs-form-group">
                        <label class="cs-form-label">Email</label>
                        <input class="cs-form-input" type="email" name="email"
                            value="<?php echo esc_attr( $user->email ?? '' ); ?>">
                    </div>
                    <div class="cs-form-group">
                        <label class="cs-form-label">Số CCCD / CMND</label>
                        <input class="cs-form-input" type="text" name="id_card"
                            value="<?php echo esc_attr( $user->citizen_id ?? '' ); ?>"
                            placeholder="012345678901" maxlength="12">
                        <span class="cs-helper">CCCD 12 số hoặc CMND 9 số</span>
                    </div>
                    <div class="cs-form-group">
                        <label class="cs-form-label">Giới tính</label>
                        <select class="cs-form-input" name="gender">
                            <option value="">— Chọn giới tính —</option>
                            <option value="male"   <?php selected( $user->gender ?? '', 'male' );   ?>>Nam</option>
                            <option value="female" <?php selected( $user->gender ?? '', 'female' ); ?>>Nữ</option>
                            <option value="other"  <?php selected( $user->gender ?? '', 'other' );  ?>>Khác</option>
                        </select>
                    </div>
                    <div class="cs-form-group">
                        <label class="cs-form-label">Ngày sinh</label>
                        <input type="date" class="cs-form-input" name="birth_date"
                            value="<?php echo esc_attr( $user->birthday ?? '' ); ?>"
                            min="1930-01-01"
                            max="<?php echo date( 'Y-m-d', strtotime( '-10 years' ) ); ?>">
                    </div>
                </div>
            </div>
        </div><!-- /.cs-section thông tin cơ bản -->
    
        <div class="cs-section">
            <div class="cs-section-head">
                <div class="cs-section-title">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81 19.79 19.79 0 01.02 1.13 2 2 0 012 .94h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
                    </svg>
                    Thông tin liên hệ
                </div>
            </div>
            <div class="cs-section-body">
                <div class="cs-form-grid">
                    <div class="cs-form-group" style="grid-column:1/-1;">
                        <label class="cs-form-label">Số điện thoại <span class="req">*</span></label>
                        <div class="cs-phone-row">
                            <input class="cs-form-input" type="tel" name="phone"
                                value="<?php echo esc_attr( $user->phone ?? '' ); ?>"
                                placeholder="0901 234 567">
                            <button type="button" class="cs-verify-btn">Xác minh</button>
                        </div>
                    </div>
                    <div class="cs-form-group">
                        <label class="cs-form-label">Tỉnh / Thành phố <span class="req">*</span></label>
                        <select class="cs-form-input" name="province" id="cs-province"
                                onchange="csLoadDistricts(this.value, false)">
                            <option value="">— Chọn tỉnh / thành phố —</option>
                        </select>
                    </div>
                    <div class="cs-form-group">
                        <label class="cs-form-label">Quận / Huyện</label>
                        <select class="cs-form-input" name="district" id="cs-district"
                                onchange="csLoadWards(this.value, false)" disabled>
                            <option value="">— Chọn quận / huyện —</option>
                        </select>
                    </div>
                    <div class="cs-form-group">
                        <label class="cs-form-label">Phường / Xã</label>
                        <select class="cs-form-input" name="ward" id="cs-ward" disabled>
                            <option value="">— Chọn phường / xã —</option>
                        </select>
                    </div>
                    <div class="cs-form-group" style="grid-column:1/-1;">
                        <label class="cs-form-label">Địa chỉ chi tiết</label>
                        <input class="cs-form-input" type="text" name="address"
                            value="<?php echo esc_attr( $default_addr->address ?? '' ); ?>">
                    </div>
                </div>
            </div>
        </div><!-- /.cs-section liên hệ -->
    
        <div class="cs-section">
            <div class="cs-section-head">
                <div class="cs-section-title">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                        <path d="M14 2v6h6M16 13H8M16 17H8M10 9H8" stroke-linecap="round"/>
                    </svg>
                    Giới thiệu bản thân
                </div>
            </div>
            <div class="cs-section-body">
                <div class="cs-form-group">
                    <label class="cs-form-label">Mô tả ngắn</label>
                    <textarea class="cs-form-input" name="bio" rows="4"
                            placeholder="Mô tả ngắn về bạn, lĩnh vực hoạt động, khu vực chuyên..."
                            style="resize:vertical;"><?php echo esc_textarea( $user->bio ?? '' ); ?></textarea>
                    <span class="cs-helper">Hiển thị trên trang hồ sơ công khai của bạn</span>
                </div>
            </div>
        </div><!-- /.cs-section bio -->
    
        <div class="cs-section">
            <div class="cs-section-head">
                <div class="cs-section-title">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="2" y="3" width="20" height="14" rx="2"/>
                        <path d="M8 21h8M12 17v4" stroke-linecap="round"/>
                    </svg>
                    Thông tin xuất hóa đơn VAT
                </div>
            </div>
            <div class="cs-section-body">
                <div class="cs-vat-notice">
                    <div class="cs-vat-notice-title">⚠ Lưu ý khi xuất VAT:</div>
                    <ul>
                        <li>Chỉ xuất hóa đơn cho giao dịch trong tháng hiện tại.</li>
                        <li>Yêu cầu xuất VAT trước ngày cuối tháng.</li>
                        <li>Liên hệ hỗ trợ: <strong>support@bdsvietnam.com</strong></li>
                    </ul>
                </div>
                <div class="cs-form-grid">
                    <div class="cs-form-group">
                        <label class="cs-form-label">Tên công ty</label>
                        <input class="cs-form-input" type="text" name="company_name"
                            value="<?php echo esc_attr( $user->company_name ?? '' ); ?>"
                            placeholder="Công ty TNHH...">
                    </div>
                    <div class="cs-form-group">
                        <label class="cs-form-label">Mã số thuế</label>
                        <input class="cs-form-input" type="text" name="tax_code"
                            value="<?php echo esc_attr( $user->tax_code ?? '' ); ?>">
                    </div>
                    <div class="cs-form-group" style="grid-column:1/-1;">
                        <label class="cs-form-label">Địa chỉ công ty</label>
                        <input class="cs-form-input" type="text" name="company_address"
                            value="<?php echo esc_attr( $user->company_address ?? '' ); ?>"
                            placeholder="123 Nguyễn Trãi, Q.1...">
                    </div>
                </div>
            </div>
        </div><!-- /.cs-section vat -->
    
        <div class="cs-form-footer">
            <button type="submit" class="cs-save-btn">Lưu thay đổi</button>
        </div>
    </form>
    <?php endif; /* end thong-tin */ ?>
    
    <?php if ( $subtab === 'bao-mat' ): ?>
    
        <div class="cs-section">
            <div class="cs-section-head">
                <div class="cs-section-title">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="11" width="18" height="11" rx="2"/>
                        <path d="M7 11V7a5 5 0 0110 0v4" stroke-linecap="round"/>
                    </svg>
                    Đổi mật khẩu
                </div>
            </div>
            <div class="cs-section-body">
                <form method="post" action="<?php echo esc_url( add_query_arg( [ 'tab' => 'cai-dat', 'subtab' => 'bao-mat' ], get_permalink() ) ); ?>">
                    <?php wp_nonce_field( 'ql_change_pw', 'ql_change_pw_nonce' ); ?>
                    <div class="cs-form-grid">
                        <div class="cs-form-group" style="grid-column:1/-1;">
                            <label class="cs-form-label">Mật khẩu hiện tại</label>
                            <input class="cs-form-input" type="password" name="current_password"
                                autocomplete="current-password" style="max-width:360px;">
                        </div>
                        <div class="cs-form-group">
                            <label class="cs-form-label">Mật khẩu mới</label>
                            <input class="cs-form-input" type="password" name="new_password" id="cs-new-pw"
                                autocomplete="new-password" oninput="csPwStrength(this.value)">
                            <div class="cs-pw-strength">
                                <div class="cs-pw-bar" id="cs-bar-1"></div>
                                <div class="cs-pw-bar" id="cs-bar-2"></div>
                                <div class="cs-pw-bar" id="cs-bar-3"></div>
                                <div class="cs-pw-bar" id="cs-bar-4"></div>
                            </div>
                            <span class="cs-pw-label" id="cs-pw-label">Tối thiểu 8 ký tự</span>
                            <div class="cs-pw-rules">
                                <div class="cs-pw-rule" id="rule-len">
                                    <span class="cs-pw-rule-dot"></span>Tối thiểu 8 ký tự
                                </div>
                                <div class="cs-pw-rule" id="rule-upper">
                                    <span class="cs-pw-rule-dot"></span>Ít nhất 1 ký tự viết hoa
                                </div>
                                <div class="cs-pw-rule" id="rule-num">
                                    <span class="cs-pw-rule-dot"></span>Ít nhất 1 ký tự số
                                </div>
                            </div>
                        </div>
                        <div class="cs-form-group">
                            <label class="cs-form-label">Xác nhận mật khẩu mới</label>
                            <input class="cs-form-input" type="password" name="confirm_password"
                                autocomplete="new-password" id="cs-confirm-pw"
                                oninput="csCheckMatch()">
                            <span class="cs-helper" id="cs-match-hint"
                                style="display:none;color:#dc2626;">Mật khẩu không khớp</span>
                        </div>
                    </div>
                    <div class="cs-form-footer">
                        <button type="submit" class="cs-save-btn">Đổi mật khẩu</button>
                    </div>
                </form>
            </div>
        </div><!-- /.cs-section đổi mật khẩu -->
    
        <div class="cs-section">
            <div class="cs-section-head">
                <div class="cs-section-title">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="2" y="3" width="20" height="14" rx="2"/>
                        <path d="M8 21h8M12 17v4" stroke-linecap="round"/>
                    </svg>
                    Thiết bị đang đăng nhập
                </div>
                <span style="font-size:11px;color:var(--ql-muted);"><?php echo count( $login_history ); ?> thiết bị</span>
            </div>
            <div class="cs-section-body" style="padding-top:8px;padding-bottom:8px;">
                <?php foreach ( $login_history as $session ):
                    $is_cur    = $session['current'];
                    $icon_type = $session['icon'];
                ?>
                <div class="cs-device-card">
                    <div class="cs-device-icon <?php echo $is_cur ? 'current' : ''; ?>">
                        <?php if ( $icon_type === 'mobile' ): ?>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <rect x="5" y="2" width="14" height="20" rx="2"/>
                            <path d="M12 18h.01" stroke-linecap="round" stroke-width="2.5"/>
                        </svg>
                        <?php else: ?>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <rect x="2" y="3" width="20" height="14" rx="2"/>
                            <path d="M8 21h8M12 17v4" stroke-linecap="round"/>
                        </svg>
                        <?php endif; ?>
                    </div>
                    <div class="cs-device-info">
                        <div class="cs-device-name">
                            <?php echo esc_html( $session['device'] ); ?>
                            <?php if ( $is_cur ): ?>
                                <span class="cs-device-cur-badge">Thiết bị hiện tại</span>
                            <?php endif; ?>
                        </div>
                        <div class="cs-device-meta">
                            <span>
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <circle cx="12" cy="12" r="10"/>
                                    <path d="M12 8v4M12 16h.01" stroke-linecap="round"/>
                                </svg>
                                IP: <?php echo esc_html( $session['ip'] ); ?>
                            </span>
                            <span>
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0118 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                                <?php echo esc_html( $session['location'] ); ?>
                            </span>
                        </div>
                        <?php if ( ! $is_cur ): ?>
                        <button class="cs-device-revoke"
                                onclick="this.closest('.cs-device-card').style.cssText='opacity:.4;pointer-events:none;'">
                            Đăng xuất thiết bị này
                        </button>
                        <?php endif; ?>
                    </div>
                    <div class="cs-device-time"><?php echo esc_html( $session['time'] ); ?></div>
                </div>
                <?php endforeach; ?>
                <div style="padding-top:14px;border-top:1px solid #f3f4f6;margin-top:6px;">
                    <button class="cs-revoke-all-btn">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 4v6h6M23 20v-6h-6"/>
                            <path d="M20.49 9A9 9 0 005.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 013.51 15"/>
                        </svg>
                        Đăng xuất tất cả thiết bị khác
                    </button>
                </div>
            </div>
        </div><!-- /.cs-section thiết bị -->
    
        <div class="cs-section">
            <div class="cs-section-head">
                <div class="cs-section-title">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 7v5l3 3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Lịch sử đăng nhập
                </div>
            </div>
            <div class="cs-section-body" style="padding:0;overflow-x:auto;">
                <table style="width:100%;border-collapse:collapse;font-size:12px;">
                    <thead>
                        <tr style="background:#fafafa;border-bottom:1px solid var(--ql-border);">
                            <th style="padding:10px 16px;text-align:left;font-weight:600;color:var(--ql-muted);font-size:10px;text-transform:uppercase;letter-spacing:.5px;">Thiết bị</th>
                            <th style="padding:10px 16px;text-align:left;font-weight:600;color:var(--ql-muted);font-size:10px;text-transform:uppercase;letter-spacing:.5px;">Địa điểm</th>
                            <th style="padding:10px 16px;text-align:left;font-weight:600;color:var(--ql-muted);font-size:10px;text-transform:uppercase;letter-spacing:.5px;">Thời gian</th>
                            <th style="padding:10px 16px;text-align:center;font-weight:600;color:var(--ql-muted);font-size:10px;text-transform:uppercase;letter-spacing:.5px;">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( $login_history as $s ): ?>
                        <tr style="border-bottom:1px solid #f3f4f6;">
                            <td style="padding:11px 16px;color:var(--ql-text);font-weight:500;">
                                <?php echo esc_html( $s['device'] ); ?>
                                <div style="font-size:11px;color:var(--ql-faint);margin-top:2px;">IP: <?php echo esc_html( $s['ip'] ); ?></div>
                            </td>
                            <td style="padding:11px 16px;color:var(--ql-muted);"><?php echo esc_html( $s['location'] ); ?></td>
                            <td style="padding:11px 16px;color:var(--ql-muted);white-space:nowrap;"><?php echo esc_html( $s['time'] ); ?></td>
                            <td style="padding:11px 16px;text-align:center;">
                                <?php if ( $s['current'] ): ?>
                                    <span class="ql-badge ql-badge-green">Đang hoạt động</span>
                                <?php else: ?>
                                    <span class="ql-badge ql-badge-gray">Đã kết thúc</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.cs-section lịch sử -->
    
        <div class="cs-danger-zone">
            <div class="cs-danger-head">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                    <path d="M12 9v4M12 17h.01" stroke-linecap="round"/>
                </svg>
                Vùng nguy hiểm
            </div>
            <div class="cs-danger-body">
    
                <div class="cs-danger-item">
                    <div class="cs-danger-item-info">
                        <?php if ( $is_locked ): ?>
                        <h4>Mở khóa tài khoản</h4>
                        <p>Tài khoản đang bị khóa. Nhấn mở khóa để kích hoạt lại hồ sơ và tin đăng.</p>
                        <?php else: ?>
                        <h4>Khóa tài khoản</h4>
                        <p>Tạm ẩn hồ sơ và toàn bộ tin đăng. Tài khoản vẫn còn, bạn có thể mở khóa bất cứ lúc nào.</p>
                        <?php endif; ?>
                    </div>
                    <button type="button"
                            class="cs-outline-btn"
                            style="color:#d97706;border-color:#fde68a;flex-shrink:0;"
                            onclick="document.getElementById('cs-lock-modal').classList.add('open')">
                        <?php if ( $is_locked ): ?>
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <rect x="3" y="11" width="18" height="11" rx="2"/>
                            <path d="M7 11V7a5 5 0 0110 0" stroke-linecap="round"/>
                        </svg>
                        Mở khóa tài khoản
                        <?php else: ?>
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <rect x="3" y="11" width="18" height="11" rx="2"/>
                            <path d="M7 11V7a5 5 0 0110 0v4" stroke-linecap="round"/>
                        </svg>
                        Khóa tài khoản
                        <?php endif; ?>
                    </button>
                </div>
    
                <!-- Xóa tài khoản -->
                <div class="cs-danger-item">
                    <div class="cs-danger-item-info">
                        <h4>Xóa tài khoản vĩnh viễn</h4>
                        <p>Xóa toàn bộ dữ liệu, tin đăng, lịch sử giao dịch. Hành động này <strong>không thể hoàn tác</strong>.</p>
                    </div>
                    <button type="button"
                            class="cs-danger-btn"
                            onclick="document.getElementById('cs-delete-modal').classList.add('open')"
                            style="flex-shrink:0;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <polyline points="3 6 5 6 21 6"/>
                            <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                            <path d="M10 11v6M14 11v6M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2" stroke-linecap="round"/>
                        </svg>
                        Xóa tài khoản
                    </button>
                </div>
    
            </div>
        </div><!-- /.cs-danger-zone -->
    
        <div class="cs-modal-overlay" id="cs-lock-modal">
            <div class="cs-modal">
                <div class="cs-modal-icon" style="background:#fef9c3;color:#854d0e;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="11" width="18" height="11" rx="2"/>
                        <path d="M7 11V7a5 5 0 0110 0v4" stroke-linecap="round"/>
                    </svg>
                </div>
                <?php if ( $is_locked ): ?>
                <h3>Mở khóa tài khoản?</h3>
                <p>Hồ sơ và tin đăng sẽ hiển thị trở lại.<br>Nhập mật khẩu để xác nhận.</p>
                <?php else: ?>
                <h3>Khóa tài khoản?</h3>
                <p>Hồ sơ và toàn bộ tin đăng sẽ bị ẩn ngay lập tức.<br>Bạn có thể mở khóa bất cứ lúc nào. Nhập mật khẩu để xác nhận.</p>
                <?php endif; ?>
                <form method="post"
                    action="<?php echo esc_url( add_query_arg( [ 'tab' => 'cai-dat', 'subtab' => 'bao-mat' ], get_permalink() ) ); ?>">
                    <?php wp_nonce_field( 'ql_lock_account', 'ql_lock_account_nonce' ); ?>
                    <input type="hidden" name="lock_action"
                        value="<?php echo $is_locked ? 'unlock' : 'lock'; ?>">
                    <input type="password"
                        name="lock_password"
                        class="cs-modal-input"
                        placeholder="Nhập mật khẩu của bạn"
                        required
                        autocomplete="current-password">
                    <div class="cs-modal-actions">
                        <button type="button"
                                class="cs-modal-cancel"
                                onclick="document.getElementById('cs-lock-modal').classList.remove('open')">
                            Hủy
                        </button>
                        <button type="submit"
                                class="cs-modal-confirm ready"
                                style="background:#d97706;opacity:1;">
                            <?php echo $is_locked ? 'Mở khóa' : 'Khóa tài khoản'; ?>
                        </button>
                    </div>
                </form>
            </div>
        </div><!-- /#cs-lock-modal -->
    
        <div class="cs-modal-overlay" id="cs-delete-modal">
            <div class="cs-modal">
                <div class="cs-modal-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <polyline points="3 6 5 6 21 6"/>
                        <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                        <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3>Xóa tài khoản vĩnh viễn?</h3>
                <p>Toàn bộ dữ liệu, tin đăng và lịch sử giao dịch sẽ bị xóa và <strong>không thể khôi phục</strong>.<br>
                Nhập <strong>XOA TAI KHOAN</strong> để xác nhận.</p>
                <form method="post"
                    action="<?php echo esc_url( add_query_arg( [ 'tab' => 'cai-dat', 'subtab' => 'bao-mat' ], get_permalink() ) ); ?>">
                    <?php wp_nonce_field( 'ql_delete_account', 'ql_delete_account_nonce' ); ?>
                    <input type="text"
                        name="delete_confirm_text"
                        class="cs-modal-input"
                        id="cs-delete-confirm-input"
                        placeholder="XOA TAI KHOAN"
                        autocomplete="off"
                        oninput="document.getElementById('cs-delete-confirm-btn').classList.toggle('ready', this.value === 'XOA TAI KHOAN')">
                    <input type="password"
                        name="delete_password"
                        class="cs-modal-input"
                        placeholder="Nhập mật khẩu để xác nhận"
                        required
                        autocomplete="current-password">
                    <div class="cs-modal-actions">
                        <button type="button"
                                class="cs-modal-cancel"
                                onclick="document.getElementById('cs-delete-modal').classList.remove('open')">
                            Hủy
                        </button>
                        <button type="submit"
                                class="cs-modal-confirm"
                                id="cs-delete-confirm-btn">
                            Xóa tài khoản
                        </button>
                    </div>
                </form>
            </div>
        </div><!-- /#cs-delete-modal --> 
    <?php endif; /* end bao-mat */ ?>
    </div><!-- /.ql-panel-body -->`
</div><!-- /.cs-wrap -->

<script>
['cs-lock-modal', 'cs-delete-modal'].forEach(function(id) {
    var el = document.getElementById(id);
    if (el) el.addEventListener('click', function(e) {
        if (e.target === this) this.classList.remove('open');
    });
});
 
function csPwStrength(val) {
    var bars  = ['cs-bar-1','cs-bar-2','cs-bar-3','cs-bar-4'].map(function(id){ return document.getElementById(id); });
    var label = document.getElementById('cs-pw-label');
    bars.forEach(function(b) { b.className = 'cs-pw-bar'; });
    var rLen   = document.getElementById('rule-len');
    var rUpper = document.getElementById('rule-upper');
    var rNum   = document.getElementById('rule-num');
    if (rLen)   rLen.classList.toggle('ok',   val.length >= 8);
    if (rUpper) rUpper.classList.toggle('ok', /[A-Z]/.test(val));
    if (rNum)   rNum.classList.toggle('ok',   /[0-9]/.test(val));
    if (!val) { label.textContent = 'Tối thiểu 8 ký tự'; return; }
    var score = 0;
    if (val.length >= 8)  score++;
    if (val.length >= 12) score++;
    if (/[A-Z]/.test(val) && /[0-9]/.test(val)) score++;
    if (/[^A-Za-z0-9]/.test(val)) score++;
    var levels = [['weak','Yếu'],['weak','Yếu'],['medium','Trung bình'],['strong','Mạnh'],['strong','Rất mạnh']];
    var lv = levels[score];
    for (var i = 0; i < score; i++) bars[i].classList.add(lv[0]);
    label.textContent = 'Độ mạnh: ' + lv[1];
}
 
function csCheckMatch() {
    var pw   = document.getElementById('cs-new-pw');
    var cpw  = document.getElementById('cs-confirm-pw');
    var hint = document.getElementById('cs-match-hint');
    if (!pw || !cpw || !hint) return;
    hint.style.display = (cpw.value && cpw.value !== pw.value) ? 'block' : 'none';
}
</script>

<script>
(function () {
    var JSON_URL = '<?php echo esc_js(get_template_directory_uri()); ?>/data/apivn.json';
    var SAVED = {
        province : '<?php echo esc_js($default_addr->province ?? ''); ?>',
        district : '<?php echo esc_js($default_addr->district ?? ''); ?>',
        ward     : '<?php echo esc_js($default_addr->ward     ?? ''); ?>',
    };

    var DATA = [];
    function getEl(id) { return document.getElementById(id); }

    function fillSelect(sel, items, valueProp, labelProp, placeholder) {
        sel.innerHTML = '<option value="">' + placeholder + '</option>';
        items.forEach(function (item) {
            var opt = document.createElement('option');
            opt.value       = item[valueProp];  
            opt.textContent = item[labelProp];
            sel.appendChild(opt);
        });
    }

    function buildProvinces() {
        var sel = getEl('cs-province');
        if (!sel) return;
        fillSelect(sel, DATA, 'code', 'name', '— Chọn tỉnh / thành phố —');

        if (SAVED.province) {
            sel.value = SAVED.province;
            csLoadDistricts(SAVED.province, true);
        }
    }

    window.csLoadDistricts = function (provinceCode, preselect) {
        var dSel = getEl('cs-district');
        var wSel = getEl('cs-ward');

        wSel.innerHTML = '<option value="">— Chọn phường / xã —</option>';
        wSel.disabled  = true;

        if (!provinceCode) {
            dSel.innerHTML = '<option value="">— Chọn quận / huyện —</option>';
            dSel.disabled  = true;
            return;
        }

        var province = DATA.find(function (p) {
            return String(p.code) === String(provinceCode);
        });

        if (!province || !province.districts.length) {
            dSel.innerHTML = '<option value="">— Không có dữ liệu —</option>';
            dSel.disabled  = true;
            return;
        }

        fillSelect(dSel, province.districts, 'code', 'name', '— Chọn quận / huyện —');
        dSel.disabled = false;

        if (preselect && SAVED.district) {
            dSel.value = SAVED.district;
            csLoadWards(SAVED.district, true);
        }
    };

    window.csLoadWards = function (districtCode, preselect) {
        var pSel = getEl('cs-province');
        var wSel = getEl('cs-ward');

        if (!districtCode) {
            wSel.innerHTML = '<option value="">— Chọn phường / xã —</option>';
            wSel.disabled  = true;
            return;
        }

        var province = DATA.find(function (p) {
            return String(p.code) === String(pSel.value);
        });
        if (!province) { wSel.disabled = true; return; }

        var district = province.districts.find(function (d) {
            return String(d.code) === String(districtCode);
        });

        if (!district || !district.wards || !district.wards.length) {
            wSel.innerHTML = '<option value="">— Không có phường/xã —</option>';
            wSel.disabled  = true;
            return;
        }

        fillSelect(wSel, district.wards, 'name', 'name', '— Chọn phường / xã —');
        wSel.disabled = false;

        if (preselect && SAVED.ward) {
            wSel.value = SAVED.ward;
        }
    };

    function setLoading(msg) {
        var sel = getEl('cs-province');
        if (sel) {
            sel.innerHTML = '<option>' + msg + '</option>';
            sel.disabled  = true;
        }
    }

    setLoading('Đang tải danh sách địa chỉ...');
    fetch(JSON_URL)
        .then(function (r) {
            if (!r.ok) throw new Error('HTTP ' + r.status);
            return r.json();
        })
        .then(function (json) {
            DATA = Array.isArray(json) ? json : [];
            getEl('cs-province').disabled = false;
            buildProvinces();
        })
        .catch(function (err) {
            console.error('Lỗi load địa chỉ:', err);
            setLoading('Lỗi tải địa chỉ — thử lại sau');
        });
})();
</script>
<script>
(function () {
    var input  = document.getElementById('cs-avatar-input');
    var circle = document.getElementById('cs-avatar-circle');
    if (!input || !circle) return;

    var ALLOWED  = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    var MAX_SIZE = 10 * 1024 * 1024;

    input.addEventListener('change', function () {
        var file = input.files && input.files[0];
        if (!file) return;

        if (ALLOWED.indexOf(file.type) === -1) {
            alert('Định dạng ảnh không hợp lệ. Chỉ chấp nhận JPG, PNG, GIF, WEBP.');
            input.value = '';
            return;
        }
        if (file.size > MAX_SIZE) {
            alert('Ảnh vượt quá 10MB.');
            input.value = '';
            return;
        }

        var reader = new FileReader();
        reader.onload = function (e) {
            var old = circle.querySelector('img, span');
            if (old) old.remove();
            var img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'cs-avatar-img';
            circle.insertBefore(img, circle.firstChild);
        };
        reader.readAsDataURL(file);
    });
})();
</script>