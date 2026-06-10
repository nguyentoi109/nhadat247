<?php
if (!defined('ABSPATH')) exit;

$user_id      = get_current_user_id();
$balance_main = (float) get_user_meta($user_id, 'balance_main', true);   // tài khoản tin đăng
$balance_promo= (float) get_user_meta($user_id, 'balance_promo', true);  // tài khoản khuyến mãi
$balance_total= $balance_main + $balance_promo;

function fmt_vnd($n) {
    return number_format($n, 0, ',', '.') . ' ₫';
}
?>

<style>
.sdt-cards {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 14px;
	margin-bottom: 24px;
}

.sdt-card {
	border-radius: 10px;
	padding: 18px 20px;
	position: relative;
	overflow: hidden;
}

.sdt-card-main {
	background: linear-gradient(135deg, #ee0033 0%, #c8002b 100%);
	color: #fff;
}

.sdt-card-promo {
	background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
	color: #fff;
}

.sdt-card-total {
	background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
	color: #fff;
}

.sdt-card-label {
	font-size: 11px;
	font-weight: 600;
	opacity: .85;
	margin-bottom: 10px;
	letter-spacing: .3px;
	text-transform: uppercase;
}

.sdt-card-value {
	font-size: 22px;
	font-weight: 800;
	letter-spacing: -.3px;
	margin-bottom: 4px;
}

.sdt-card-sub {
	font-size: 11px;
	opacity: .75;
}

.sdt-card::after {
	content: '';
	position: absolute;
	right: -20px;
	top: -20px;
	width: 90px;
	height: 90px;
	border-radius: 50%;
	background: rgba(255, 255, 255, .1);
}

.sdt-actions {
	display: flex;
	gap: 10px;
	margin-bottom: 28px;
	flex-wrap: wrap;
}

.sdt-action-btn {
	display: inline-flex;
	align-items: center;
	gap: 7px;
	padding: 10px 20px;
	border-radius: 7px;
	font-family: inherit;
	font-size: 13px;
	font-weight: 600;
	cursor: pointer;
	text-decoration: none;
	transition: all .2s;
	border: none;
}

.sdt-action-btn.primary {
	background: var(--ql-red);
	color: #fff;
}

.sdt-action-btn.primary:hover {
	background: var(--ql-red-dark, #cc0022);
}

.sdt-action-btn.outline {
	background: #fff;
	color: var(--ql-red);
	border: 1.5px solid var(--ql-red);
}

.sdt-action-btn.outline:hover {
	background: var(--ql-red-light, #fef2f2);
}

.sdt-section-title {
	font-size: 14px;
	font-weight: 700;
	color: #0d1011;
	margin-bottom: 14px;
	display: flex;
	align-items: center;
	justify-content: space-between;
}

.sdt-view-all {
	font-size: 12px;
	font-weight: 500;
	color: var(--ql-red);
	text-decoration: none;
}

.sdt-view-all:hover {
	text-decoration: underline;
}

.sdt-table {
	width: 100%;
	border-collapse: collapse;
	font-size: 13px;
}

.sdt-table th {
	padding: 9px 12px;
	text-align: left;
	background: #f9fafb;
	border-bottom: 1px solid #e8e8e8;
	font-size: 11px;
	font-weight: 600;
	color: #6b7280;
	text-transform: uppercase;
	letter-spacing: .4px;
}

.sdt-table td {
	padding: 12px;
	border-bottom: 1px solid #f3f4f6;
	color: #0d1011;
	vertical-align: middle;
}

.sdt-table tr:last-child td {
	border-bottom: none;
}

.sdt-table tr:hover td {
	background: #fafafa;
}

.sdt-amount-plus {
	font-weight: 700;
	color: #059669;
}

.sdt-amount-minus {
	font-weight: 700;
	color: #dc2626;
}

.sdt-type-dot {
	display: inline-flex;
	align-items: center;
	gap: 6px;
}

.sdt-type-dot::before {
	content: '';
	display: inline-block;
	width: 7px;
	height: 7px;
	border-radius: 50%;
	flex-shrink: 0;
}

.sdt-type-nap::before {
	background: #059669;
}

.sdt-type-chi::before {
	background: #dc2626;
}

.sdt-type-hoan::before {
	background: #f59e0b;
}

/* ── Info boxes ── */
.sdt-info-grid {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 12px;
	margin-top: 24px;
}

.sdt-info-box {
	background: #f9fafb;
	border: 1px solid #e8e8e8;
	border-radius: 8px;
	padding: 14px 16px;
}

.sdt-info-box-title {
	font-size: 12px;
	font-weight: 700;
	color: #0d1011;
	margin-bottom: 8px;
}

.sdt-info-box ul {
	padding-left: 14px;
	list-style: disc;
}

.sdt-info-box li {
	font-size: 12px;
	color: #6b7280;
	margin-bottom: 5px;
	line-height: 1.5;
}

@media(max-width:700px) {
	.sdt-cards {
		grid-template-columns: 1fr;
	}

	.sdt-info-grid {
		grid-template-columns: 1fr;
	}
}
</style>

<div class="ql-panel-header">
    <h2 class="ql-panel-title">Số dư tài khoản</h2>
</div>

<div class="ql-panel-body">

    <div class="sdt-cards">
        <div class="sdt-card sdt-card-main">
            <div class="sdt-card-label">Tài khoản tin đăng</div>
            <div class="sdt-card-value"><?php echo fmt_vnd($balance_main); ?></div>
            <div class="sdt-card-sub">Dùng để đăng tin & mua gói VIP</div>
        </div>
        <div class="sdt-card sdt-card-promo">
            <div class="sdt-card-label">Tài khoản khuyến mãi</div>
            <div class="sdt-card-value"><?php echo fmt_vnd($balance_promo); ?></div>
            <div class="sdt-card-sub">Số dư từ chương trình ưu đãi</div>
        </div>
        <div class="sdt-card sdt-card-total">
            <div class="sdt-card-label">Tổng số dư</div>
            <div class="sdt-card-value"><?php echo fmt_vnd($balance_total); ?></div>
            <div class="sdt-card-sub">Tổng cả 2 tài khoản</div>
        </div>
    </div>

    <div class="sdt-actions">
        <a href="<?php echo esc_url(home_url('/quan-ly-tai-khoan/nap-tien/')); ?>" class="sdt-action-btn primary">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M16 17H22M19 14v6M13 17H4a2 2 0 01-2-2V6a2 2 0 012-2h13a2 2 0 012 2v4.5" stroke-linecap="round"/>
                <path d="M2 8h17" stroke-linecap="round"/>
            </svg>
            Nạp tiền ngay
        </a>
        <a href="<?php echo esc_url(home_url('/quan-ly-tai-khoan/lich-su-giao-dich/')); ?>" class="sdt-action-btn outline">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2" stroke-linecap="round"/>
            </svg>
            Lịch sử giao dịch
        </a>
        <a href="<?php echo esc_url(home_url('/quan-ly-tai-khoan/voucher/')); ?>" class="sdt-action-btn outline">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M20 12a2 2 0 00-2-2V6H6v4a2 2 0 000 4v4h12v-4a2 2 0 002-2z" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Dùng Voucher
        </a>
    </div>

    <div class="sdt-section-title">
        Giao dịch gần đây
        <a href="<?php echo esc_url(home_url('/quan-ly-tai-khoan/lich-su-giao-dich/')); ?>" class="sdt-view-all">
            Xem tất cả →
        </a>
    </div>

    <?php
    $transactions = get_posts([
        'post_type'      => 'giao-dich',  
        'author'         => $user_id,
        'posts_per_page' => 5,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
    ?>

    <?php if (empty($transactions)): ?>
    <div class="ql-empty" style="padding:40px 0;">
        <svg class="ql-empty-icon" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
            <circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2" stroke-linecap="round"/>
        </svg>
        <div class="ql-empty-title">Chưa có giao dịch nào</div>
        <div class="ql-empty-desc">Nạp tiền để bắt đầu sử dụng dịch vụ.</div>
    </div>

    <?php else: ?>
    <div style="overflow-x:auto;">
        <table class="sdt-table">
            <thead>
                <tr>
                    <th>Loại giao dịch</th>
                    <th>Mô tả</th>
                    <th>Số tiền</th>
                    <th>Số dư sau GD</th>
                    <th>Thời gian</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($transactions as $tx):
                $type    = get_post_meta($tx->ID, 'tx_type', true);   // nap | chi | hoan
                $amount  = (float) get_post_meta($tx->ID, 'tx_amount', true);
                $balance = (float) get_post_meta($tx->ID, 'tx_balance_after', true);
                $desc    = get_post_meta($tx->ID, 'tx_desc', true) ?: get_the_title($tx->ID);

                $type_labels = ['nap' => 'Nạp tiền', 'chi' => 'Chi tiêu', 'hoan' => 'Hoàn tiền'];
                $type_label  = $type_labels[$type] ?? ucfirst($type);
            ?>
                <tr>
                    <td>
                        <span class="sdt-type-dot sdt-type-<?php echo esc_attr($type); ?>">
                            <?php echo esc_html($type_label); ?>
                        </span>
                    </td>
                    <td style="color:#6b7280;max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                        <?php echo esc_html($desc); ?>
                    </td>
                    <td class="<?php echo $type === 'chi' ? 'sdt-amount-minus' : 'sdt-amount-plus'; ?>">
                        <?php echo ($type === 'chi' ? '−' : '+') . fmt_vnd($amount); ?>
                    </td>
                    <td><?php echo fmt_vnd($balance); ?></td>
                    <td style="color:#9ca3af;white-space:nowrap;">
                        <?php echo esc_html(get_the_date('d/m/Y H:i', $tx->ID)); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>

    <div class="sdt-info-grid">
        <div class="sdt-info-box">
            <div class="sdt-info-box-title">📌 Tài khoản tin đăng</div>
            <ul>
                <li>Dùng để mua gói đăng tin & gói VIP.</li>
                <li>Có giá trị vĩnh viễn, không hết hạn.</li>
                <li>Không thể chuyển khoản cho tài khoản khác.</li>
                <li>Có thể hoàn tiền theo chính sách.</li>
            </ul>
        </div>
        <div class="sdt-info-box">
            <div class="sdt-info-box-title">🎁 Tài khoản khuyến mãi</div>
            <ul>
                <li>Nhận từ chương trình ưu đãi, nạp tiền tặng thêm.</li>
                <li>Ưu tiên sử dụng trước tài khoản chính.</li>
                <li>Có thể có thời hạn sử dụng tùy đợt khuyến mãi.</li>
                <li>Không quy đổi thành tiền mặt.</li>
            </ul>
        </div>
    </div>

</div>