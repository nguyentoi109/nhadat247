<?php
if (!defined('ABSPATH')) exit;
$user        = wp_get_current_user();
$page_url    = get_permalink(); // URL trang Quản lý tài khoản
$current_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'tong-quan';

$tab_map = [
	'tong-quan'          => 'authentication/tong-quan.php',
    'quan-ly-tin'        => 'authentication/quan-ly-tin.php',
    'tin-da-luu'         => 'authentication/tin-da-luu.php',
    'quan-ly-khach'      => 'authentication/quan-ly-khach.php',

    'so-du-tai-khoan'    => 'authentication/so-du-tai-khoan.php',
    'lich-su-giao-dich'  => 'authentication/lich-su-giao-dich.php',
    'voucher'            => 'authentication/voucher.php',
    'goi-thanh-vien'     => 'authentication/goi-thanh-vien.php',

    'goi-vip'            => 'authentication/goi-vip.php',
    'nap-tien'           => 'authentication/nap-tien.php',
    'cai-dat'            => 'authentication/cai-dat.php',
];

$current_tab = get_query_var('tab') ?: (isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'tong-quan');
if (!array_key_exists($current_tab, $tab_map)) {
    $current_tab = 'tong-quan';
}

function ql_tab_url($tab, $page_url) {
   return esc_url(home_url('/quan-ly-tai-khoan/' . $tab . '/'));
}

function ql_nav_active($tab, $current_tab) {
    return $tab === $current_tab ? 'active' : '';
}
?>

<style>
:root {
	--ql-red: #ee0033;
	--ql-red-dark: #cc0022;
	--ql-red-light: #fef2f2;
	--ql-border: #e8e8e8;
	--ql-text: #2c2c2c;
	--ql-muted: #6b7280;
	--ql-faint: #9ca3af;
	--ql-bg: #f7f8fa;
	--ql-white: #ffffff;
	--ql-radius: 10px;
	--ql-sidebar-w: 260px;
}

.ql-wrap {
	display: flex;
	gap: 20px;
	align-items: flex-start;
	padding: 24px 0;
	font-family: inherit;
}

.ql-sidebar {
	width: var(--ql-sidebar-w);
	flex-shrink: 0;
	background: var(--ql-white);
	border: 1px solid var(--ql-border);
	border-radius: var(--ql-radius);
	overflow: hidden;
	position: sticky;
	top: 80px;
}

.ql-acc-card {
	padding: 18px 16px 14px;
	border-bottom: 1px solid var(--ql-border);
}

.ql-acc-row {
	display: flex;
	align-items: center;
	gap: 10px;
	margin-bottom: 14px;
}

.ql-avatar-circle {
	width: 40px;
	height: 40px;
	border-radius: 50%;
	background: var(--ql-red);
	color: #fff;
	font-weight: 700;
	font-size: 17px;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-shrink: 0;
}

.ql-acc-name {
	font-size: 14px;
	font-weight: 600;
	color: var(--ql-text);
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
}

.ql-bal-section {
	margin-bottom: 4px;
}

.ql-bal-label {
	font-size: 11px;
	font-weight: 600;
	color: var(--ql-muted);
	margin-bottom: 7px;
}

.ql-bal-row {
	display: flex;
	justify-content: space-between;
	font-size: 12px;
	margin-bottom: 5px;
	color: var(--ql-muted);
}

.ql-bal-row span:last-child {
	font-weight: 600;
	color: var(--ql-text);
}

.ql-id-box {
	background: #f9f9f9;
	border: 1px solid var(--ql-border);
	border-radius: 6px;
	padding: 7px 10px;
	margin: 10px 0;
	display: flex;
	align-items: center;
	justify-content: space-between;
}

.ql-id-inner {
	display: flex;
	flex-direction: column;
	gap: 2px;
}

.ql-id-lbl {
	font-size: 10px;
	color: var(--ql-faint);
}

.ql-id-val {
	font-size: 12px;
	font-weight: 600;
	color: var(--ql-text);
}

.ql-copy-btn {
	background: none;
	border: none;
	cursor: pointer;
	color: var(--ql-faint);
	display: flex;
	padding: 2px;
	transition: color .2s;
}

.ql-copy-btn:hover {
	color: var(--ql-red);
}

.ql-topup-btn {
	display: flex;
	align-items: center;
	justify-content: center;
	gap: 6px;
	width: 100%;
	padding: 8px;
	border: 1.5px solid var(--ql-red);
	border-radius: 7px;
	background: var(--ql-white);
	color: var(--ql-red);
	font-size: 13px;
	font-weight: 600;
	text-decoration: none;
	cursor: pointer;
	transition: background .2s, color .2s;
}

.ql-topup-btn:hover {
	background: var(--ql-red);
	color: #fff;
}

.ql-nav {
	padding: 6px 0;
}

.ql-nav-group {
	padding: 4px 0;
}

.ql-nav-group-title {
	font-size: 10px;
	font-weight: 700;
	color: var(--ql-faint);
	text-transform: uppercase;
	letter-spacing: .6px;
	padding: 8px 16px 4px;
}

.ql-nav-link {
	display: flex;
	align-items: center;
	gap: 9px;
	padding: 9px 16px;
	font-size: 13px;
	color: #374151;
	text-decoration: none;
	cursor: pointer;
	transition: background .15s, color .15s;
	position: relative;
	border: none;
	background: none;
	width: 100%;
	text-align: left;
	font-family: inherit;
}

.ql-nav-link:hover {
	background: var(--ql-red-light);
	color: var(--ql-red);
}

.ql-nav-link.active {
	background: var(--ql-red-light);
	color: var(--ql-red);
	font-weight: 600;
}

.ql-nav-link.active::before {
	content: '';
	position: absolute;
	left: 0;
	top: 0;
	bottom: 0;
	width: 3px;
	background: var(--ql-red);
	border-radius: 0 2px 2px 0;
}

.ql-nav-link svg {
	flex-shrink: 0;
	width: 18px;
	height: 18px;
}

.ql-nav-badge {
	background: var(--ql-red);
	color: #fff;
	font-size: 9px;
	font-weight: 700;
	padding: 1px 5px;
	border-radius: 3px;
	margin-left: 3px;
}

.ql-nav-divider {
	height: 1px;
	background: #f3f4f6;
	margin: 4px 0;
}

.ql-content {
	flex: 1;
	min-width: 0;
}

.ql-content-inner {
	background: var(--ql-white);
	border: 1px solid var(--ql-border);
	border-radius: var(--ql-radius);
	overflow: hidden;
	padding: 10px;
}

.ql-panel-header {
	padding: 20px 0px 16px;
	border-bottom: 1px solid var(--ql-border);
}

.ql-panel-title {
	font-family: "Lexend";
	font-size: 24px;
	line-height: 32px;
	letter-spacing: -0.2;
	font-weight: normal;
	color: var(--ql-text);
	margin: 0;
}

.ql-panel-body {
	padding: 24px;
}

.ql-section {
	margin-bottom: 24px;
}

.ql-section-title {
	font-size: 14px;
	font-weight: 700;
	color: var(--ql-text);
	margin-bottom: 16px;
}

.ql-form-grid {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 14px;
}

.ql-form-group {
	display: flex;
	flex-direction: column;
	gap: 5px;
}

.ql-form-label {
	font-size: 12px;
	font-weight: 500;
	color: #374151;
}

.ql-form-input {
	padding: 8px 11px;
	border: 1.5px solid var(--ql-border);
	border-radius: 6px;
	font-family: inherit;
	font-size: 13px;
	color: var(--ql-text);
	background: #fff;
	transition: border-color .2s;
	outline: none;
	width: 100%;
	box-sizing: border-box;
}

.ql-form-input:focus {
	border-color: var(--ql-red);
}

.ql-form-input:disabled {
	background: #f9fafb;
	color: var(--ql-faint);
	cursor: not-allowed;
}

.ql-helper {
	font-size: 11px;
	color: var(--ql-faint);
	margin-top: 3px;
}

.ql-form-footer {
	display: flex;
	justify-content: flex-end;
	padding-top: 16px;
	margin-top: 8px;
	border-top: 1px solid #f3f4f6;
}

.ql-save-btn {
	padding: 9px 28px;
	background: var(--ql-red);
	color: #fff;
	border: none;
	border-radius: 6px;
	font-family: inherit;
	font-size: 13px;
	font-weight: 700;
	cursor: pointer;
	transition: background .2s;
}

.ql-save-btn:hover {
	background: var(--ql-red-dark);
}

.ql-stats-grid {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
	gap: 12px;
	margin-bottom: 24px;
}

.ql-stat-card {
	background: #f9fafb;
	border: 1px solid var(--ql-border);
	border-radius: 8px;
	padding: 16px;
}

.ql-stat-label {
	font-size: 11px;
	color: var(--ql-muted);
	margin-bottom: 8px;
}

.ql-stat-value {
	font-size: 24px;
	font-weight: 700;
	color: var(--ql-text);
}

.ql-stat-sub {
	font-size: 11px;
	color: var(--ql-faint);
	margin-top: 4px;
}

.ql-table {
	width: 100%;
	border-collapse: collapse;
	font-size: 13px;
}

.ql-table th {
	padding: 10px 12px;
	text-align: left;
	background: #f9fafb;
	border-bottom: 1px solid var(--ql-border);
	font-size: 11px;
	font-weight: 600;
	color: var(--ql-muted);
	text-transform: uppercase;
	letter-spacing: .4px;
}

.ql-table td {
	padding: 12px;
	border-bottom: 1px solid #f3f4f6;
	color: var(--ql-text);
	vertical-align: middle;
}

.ql-table tr:last-child td {
	border-bottom: none;
}

.ql-table tr:hover td {
	background: #fafafa;
}

.ql-badge {
	display: inline-block;
	padding: 2px 8px;
	border-radius: 20px;
	font-size: 11px;
	font-weight: 600;
}

.ql-badge-green {
	background: #d1fae5;
	color: #065f46;
}

.ql-badge-red {
	background: #fee2e2;
	color: #991b1b;
}

.ql-badge-yellow {
	background: #fef3c7;
	color: #92400e;
}

.ql-badge-blue {
	background: #dbeafe;
	color: #1e40af;
}

.ql-badge-gray {
	background: #f3f4f6;
	color: #374151;
}

.ql-empty {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	padding: 60px 24px;
	text-align: center;
	gap: 12px;
}

.ql-empty-icon {
	color: #d1d5db;
}

.ql-empty-title {
	font-size: 15px;
	font-weight: 600;
	color: var(--ql-text);
}

.ql-empty-desc {
	font-size: 13px;
	color: var(--ql-muted);
	max-width: 280px;
}

.ql-empty-btn {
	margin-top: 4px;
	padding: 9px 20px;
	background: var(--ql-red);
	color: #fff;
	border: none;
	border-radius: 6px;
	font-family: inherit;
	font-size: 13px;
	font-weight: 600;
	cursor: pointer;
	text-decoration: none;
	display: inline-block;
	transition: background .2s;
}

.ql-empty-btn:hover {
	background: var(--ql-red-dark);
}

@media (max-width: 900px) {
	.ql-wrap {
		flex-direction: column;
	}

	.ql-sidebar {
		width: 100%;
		position: static;
	}

	.ql-form-grid {
		grid-template-columns: 1fr;
	}

	.ql-stats-grid {
		grid-template-columns: 1fr 1fr;
	}
}
</style>

<div class="ql-wrap">
  <aside class="ql-sidebar">

    <div class="ql-acc-card">
        <div class="ql-acc-row">
        <div class="ql-avatar-circle"><?php echo esc_html(mb_substr($user->display_name, 0, 1)); ?></div>
        <div class="ql-acc-name">Nguyễn Thị Bích Loan</div>
      </div>

      <div class="ql-bal-section">
        <div class="ql-bal-row"><span>Số dư</span><span>0 ₫</span></div>
        <div class="ql-bal-row"><span>Tài khoản tin đăng</span><span>0 ₫</span></div>
        <div class="ql-bal-row"><span>Tài khoản khuyến mãi</span><span>0 ₫</span></div>
      </div>

      <div class="ql-id-box">
        <div class="ql-id-inner">
          <span class="ql-id-lbl">Số tài khoản định danh</span>
          <span class="ql-id-val" id="ql-id-text">BDSVN0<?php echo esc_html(get_current_user_id()); ?></span>
        </div>
        <button class="ql-copy-btn"
          onclick="navigator.clipboard.writeText(document.getElementById('ql-id-text').textContent)"
          title="Sao chép">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M17.5 14H19A2 2 0 0021 12V5A2 2 0 0019 3h-7a2 2 0 00-2 2v1.5M5 21h7a2 2 0 002-2v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7a2 2 0 002 2z"/>
          </svg>
        </button>
      </div>

      <a href="<?php echo ql_tab_url('nap-tien', $page_url); ?>" class="ql-topup-btn">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9">
          <path d="M16 17H22M19 14v6M13 17H4a2 2 0 01-2-2V6a2 2 0 012-2h13a2 2 0 012 2v4.5" stroke-linecap="round"/>
          <path d="M2 8h17" stroke-linecap="round"/>
        </svg>
        Nạp tiền
      </a>
    </div>

    <nav class="ql-nav">

      <div class="ql-nav-group">
        <div class="ql-nav-group-title">Quản lý</div>

        <a href="<?php echo ql_tab_url('tong-quan', $page_url); ?>"
           class="ql-nav-link <?php echo ql_nav_active('tong-quan', $current_tab); ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Tổng quan
        </a>

        <a href="<?php echo ql_tab_url('quan-ly-tin', $page_url); ?>"
           class="ql-nav-link <?php echo ql_nav_active('quan-ly-tin', $current_tab); ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <circle cx="4.5" cy="4.5" r="1.5"/><circle cx="4.5" cy="11.5" r="1.5"/><circle cx="4.5" cy="18.5" r="1.5"/>
            <path d="M8.5 4.5h12M8.5 11.5h12M8.5 18.5h12" stroke-linecap="round"/>
          </svg>
          Quản lý tin đăng
        </a>

        <a href="<?php echo ql_tab_url('tin-da-luu', $page_url); ?>"
           class="ql-nav-link <?php echo ql_nav_active('tin-da-luu', $current_tab); ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Tin đã lưu
        </a>

        <a href="<?php echo ql_tab_url('quan-ly-khach', $page_url); ?>"
           class="ql-nav-link <?php echo ql_nav_active('quan-ly-khach', $current_tab); ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zM23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Quản lý khách hàng
        </a>
      </div>

      <div class="ql-nav-divider"></div>

<div class="ql-nav-group">
    <div class="ql-nav-group-title">Ví & Ưu đãi</div>

    <a href="<?php echo ql_tab_url('so-du-tai-khoan', $page_url); ?>"
       class="ql-nav-link <?php echo ql_nav_active('so-du-tai-khoan', $current_tab); ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <rect x="2" y="6" width="20" height="12" rx="2"/>
            <circle cx="17" cy="12" r="1.5"/>
        </svg>
        Số dư tài khoản
    </a>

    <a href="<?php echo ql_tab_url('lich-su-giao-dich', $page_url); ?>"
       class="ql-nav-link <?php echo ql_nav_active('lich-su-giao-dich', $current_tab); ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M12 8v5l3 2"/>
            <circle cx="12" cy="12" r="9"/>
        </svg>
        Lịch sử giao dịch
    </a>

    <a href="<?php echo ql_tab_url('voucher', $page_url); ?>"
       class="ql-nav-link <?php echo ql_nav_active('voucher', $current_tab); ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M20 12a2 2 0 00-2-2V6H6v4a2 2 0 000 4v4h12v-4a2 2 0 002-2z"/>
        </svg>
        Voucher
        <span class="ql-nav-badge">HOT</span>
    </a>

    <a href="<?php echo ql_tab_url('goi-thanh-vien', $page_url); ?>"
       class="ql-nav-link <?php echo ql_nav_active('goi-thanh-vien', $current_tab); ?>">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M12 2l3 6 6 .8-4.5 4.3 1.1 6.1L12 16.8 6.4 19.2l1.1-6.1L3 8.8 9 8z"/>
        </svg>
        Gói thành viên
    </a>

	 <a href="<?php echo ql_tab_url('goi-vip', $page_url); ?>"
           class="ql-nav-link <?php echo ql_nav_active('goi-vip', $current_tab); ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Gói VIP
          <span class="ql-nav-badge">Mới</span>
    </a>

</div>

      <div class="ql-nav-divider"></div>

      <div class="ql-nav-group">
        <div class="ql-nav-group-title">Tài khoản &amp; hỗ trợ</div>

        <a href="<?php echo ql_tab_url('cai-dat', $page_url); ?>"
           class="ql-nav-link <?php echo ql_nav_active('cai-dat', $current_tab); ?>">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M10 4a2 2 0 00-2 2v.568a5.5 5.5 0 00-.318.186l-.492-.284a2 2 0 00-2.732.732l-1 1.732a2 2 0 00.732 2.732l.492.284a5.5 5.5 0 000 .636l-.492.284a2 2 0 00-.732 2.732l1 1.732a2 2 0 002.732.732l.492-.284A5.5 5.5 0 008 17.432V18a2 2 0 002 2h2a2 2 0 002-2v-.568a5.5 5.5 0 00.318-.186l.492.284a2 2 0 002.732-.732l1-1.732a2 2 0 00-.732-2.732l-.492-.284a5.5 5.5 0 000-.636l.492-.284a2 2 0 00.732-2.732l-1-1.732A2 2 0 0016.81 6.41l-.492.284A5.5 5.5 0 0016 6.568V6a2 2 0 00-2-2h-2z" stroke-linecap="round"/>
            <circle cx="12" cy="12" r="3"/>
          </svg>
          Cài đặt tài khoản
        </a>

        <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>" class="ql-nav-link" style="color:var(--ql-faint);">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M14 4h4a2 2 0 012 2v12a2 2 0 01-2 2h-4M3 12h12M3 12l4-4M3 12l4 4" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Đăng xuất
        </a>
      </div>

    </nav>
  </aside><!-- /.ql-sidebar -->

  <div class="ql-content">
    <div class="ql-content-inner">
      <?php
        $tab_file = get_template_directory() . '/' . $tab_map[$current_tab];
        if (file_exists($tab_file)) {
            include $tab_file;
        } else {
            echo '<div class="ql-panel-body"><p>Tab không tồn tại.</p></div>';
        }
      ?>
    </div>
  </div>
</div>