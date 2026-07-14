<style>
.lsgd-summary {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 12px;
	margin-bottom: 22px;
}

.lsgd-sum-card {
	background: #f9fafb;
	border: 1px solid var(--ql-border);
	border-radius: 8px;
	padding: 14px 16px;
}

.lsgd-sum-label {
	font-size: 11px;
	color: #6b7280;
	margin-bottom: 6px;
}

.lsgd-sum-val {
	font-size: 20px;
	font-weight: 700;
	color: #0d1011;
}

.lsgd-sum-val.green {
	color: #059669;
}

.lsgd-sum-val.red {
	color: #dc2626;
}

.lsgd-filter {
	display: flex;
	gap: 8px;
	margin-bottom: 18px;
	flex-wrap: wrap;
	align-items: center;
}

.lsgd-filter select,
.lsgd-filter input[type=month] {
	padding: 7px 10px;
	border: 1.5px solid var(--ql-border);
	border-radius: 6px;
	font-family: inherit;
	font-size: 13px;
	color: #0d1011;
	background: #fff;
	outline: none;
	transition: border-color .2s;
	cursor: pointer;
}

.lsgd-filter select:focus,
.lsgd-filter input[type=month]:focus {
	border-color: var(--ql-red);
}

.lsgd-select-wrap {
	position: relative;
	display: inline-block;
}

.lsgd-select-wrap select {
	appearance: none;
	-webkit-appearance: none;
	-moz-appearance: none;
	padding-right: 32px;
}

.lsgd-select-arrow {
	position: absolute;
	top: 50%;
	right: 10px;
	transform: translateY(-50%);
	color: #6b7280;
	pointer-events: none;
}

.lsgd-filter-btn {
	padding: 7px 16px;
	background: var(--ql-red);
	color: #fff;
	border: none;
	border-radius: 6px;
	font-family: inherit;
	font-size: 13px;
	font-weight: 600;
	cursor: pointer;
	transition: background .2s;
}

.lsgd-filter-btn:hover {
	background: var(--ql-red-dark, #cc0022);
}

.lsgd-reset-btn {
	padding: 7px 12px;
	background: #fff;
	color: #6b7280;
	border: 1.5px solid var(--ql-border);
	border-radius: 6px;
	font-family: inherit;
	font-size: 13px;
	cursor: pointer;
	text-decoration: none;
	display: inline-flex;
	align-items: center;
	gap: 4px;
}

.lsgd-reset-btn:hover {
	border-color: #9ca3af;
}

.lsgd-table {
	width: 100%;
	border-collapse: collapse;
	font-size: 13px;
}

.lsgd-table th {
	padding: 9px 12px;
	text-align: left;
	background: #f9fafb;
	border-bottom: 1px solid var(--ql-border);
	font-size: 11px;
	font-weight: 600;
	color: #6b7280;
	text-transform: uppercase;
	letter-spacing: .4px;
	white-space: nowrap;
}

.lsgd-table td {
	padding: 11px 12px;
	border-bottom: 1px solid #f3f4f6;
	color: #0d1011;
	vertical-align: middle;
}

.lsgd-table tr:last-child td {
	border-bottom: none;
}

.lsgd-table tr:hover td {
	background: #fafafa;
}

.lsgd-type-pill {
	display: inline-flex;
	align-items: center;
	gap: 5px;
	padding: 2px 9px;
	border-radius: 20px;
	font-size: 11px;
	font-weight: 600;
}

.lsgd-type-nap {
	background: #d1fae5;
	color: #065f46;
}

.lsgd-type-chi {
	background: #fee2e2;
	color: #991b1b;
}

.lsgd-type-hoan {
	background: #fef3c7;
	color: #92400e;
}

.lsgd-status-pill {
	display: inline-flex;
	align-items: center;
	gap: 5px;
	padding: 2px 9px;
	border-radius: 20px;
	font-size: 11px;
	font-weight: 600;
	white-space: nowrap;
}

.lsgd-status-completed {
	background: #d1fae5;
	color: #065f46;
}

.lsgd-status-failed {
	background: #fee2e2;
	color: #991b1b;
}

.lsgd-status-cancelled {
	background: #f3f4f6;
	color: #4b5563;
}

.lsgd-status-other {
	background: #e0e7ff;
	color: #3730a3;
}

.lsgd-amount-plus {
	font-weight: 700;
	color: #059669;
}

.lsgd-amount-minus {
	font-weight: 700;
	color: #dc2626;
}

.lsgd-pagination {
	display: flex;
	justify-content: center;
	gap: 6px;
	margin-top: 20px;
	flex-wrap: wrap;
}

.lsgd-page-btn {
	min-width: 34px;
	height: 34px;
	padding: 0 8px;
	display: inline-flex;
	align-items: center;
	justify-content: center;
	border: 1.5px solid var(--ql-border);
	border-radius: 6px;
	font-family: inherit;
	font-size: 13px;
	font-weight: 500;
	color: #374151;
	background: #fff;
	cursor: pointer;
	text-decoration: none;
	transition: all .15s;
}

.lsgd-page-btn:hover {
	border-color: var(--ql-red);
	color: var(--ql-red);
}

.lsgd-page-btn.active {
	background: var(--ql-red);
	color: #fff;
	border-color: var(--ql-red);
}

.lsgd-page-btn:disabled {
	opacity: .4;
	cursor: not-allowed;
	pointer-events: none;
}

@media(max-width:640px) {
	.lsgd-summary {
		grid-template-columns: 1fr;
	}
}
</style>

<?php
if (!defined('ABSPATH')) exit;

$custom_user = function_exists('custom_get_user') ? custom_get_user() : null;
if (!$custom_user) {
    echo '<div class="ql-panel-body"><p>Vui lòng đăng nhập để xem lịch sử giao dịch.</p></div>';
    return;
}

$user_id = (int) $custom_user->id;
$filter_type_ui = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : '';
$filter_month   = isset($_GET['month']) ? sanitize_text_field($_GET['month']) : '';
$paged          = max(1, (int) ($_GET['paged'] ?? 1));
$result = lsgd_get_transactions($user_id, [
    'type'  => $filter_type_ui,
    'month' => $filter_month,
    'paged' => $paged,
]);
$transactions = $result['items'];
$total_items  = $result['total_items'];
$total_pages  = $result['total_pages'];
$paged        = $result['paged'];
$offset       = $result['offset'];
$month_summary   = lsgd_get_month_summary($user_id);
$this_month_nap  = $month_summary['nap'];
$this_month_chi  = $month_summary['chi'];
$wallet         = lsgd_get_wallet_balance($user_id);
$balance_total  = $wallet['total'];

$current_url = home_url('/quan-ly-tai-khoan/lich-su-giao-dich/');
?>

<div class="ql-panel-header">
    <h2 class="ql-panel-title">Lịch sử giao dịch</h2>
</div>

<div class="ql-panel-body">

    <div class="lsgd-summary">
        <div class="lsgd-sum-card">
            <div class="lsgd-sum-label">Tổng nạp tháng <?php echo date('n/Y'); ?></div>
            <div class="lsgd-sum-val green"><?php echo lsgd_fmt($this_month_nap); ?></div>
        </div>
        <div class="lsgd-sum-card">
            <div class="lsgd-sum-label">Tổng chi tháng <?php echo date('n/Y'); ?></div>
            <div class="lsgd-sum-val red"><?php echo lsgd_fmt($this_month_chi); ?></div>
        </div>
        <div class="lsgd-sum-card">
            <div class="lsgd-sum-label">Số dư hiện tại</div>
            <div class="lsgd-sum-val"><?php echo lsgd_fmt($balance_total); ?></div>
        </div>
    </div>

    <form method="get" action="<?php echo esc_url($current_url); ?>">
        <div class="lsgd-filter">
            <div class="lsgd-select-wrap">
                <select name="type" onchange="this.form.submit()">
                    <option value="" <?php selected($filter_type_ui, ''); ?>>Tất cả loại</option>
                    <option value="nap"  <?php selected($filter_type_ui, 'nap');  ?>>Nạp tiền</option>
                    <option value="chi"  <?php selected($filter_type_ui, 'chi');  ?>>Chi tiêu</option>
                    <option value="hoan" <?php selected($filter_type_ui, 'hoan'); ?>>Hoàn tiền</option>
                </select>
                <svg class="lsgd-select-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M6 9l6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </form>

    <?php if (empty($transactions)): ?>
        <div class="ql-empty" style="padding:40px 0;">
            <svg class="ql-empty-icon" width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
                <circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2" stroke-linecap="round"/>
            </svg>
            <div class="ql-empty-title">Không có giao dịch nào</div>
            <div class="ql-empty-desc">Thử thay đổi bộ lọc hoặc nạp tiền để bắt đầu.</div>
            <a class="ql-empty-btn" href="<?php echo esc_url(home_url('/quan-ly-tai-khoan/nap-tien/')); ?>">
                Nạp tiền ngay
            </a>
        </div>
    <?php else: ?>
        <div style="overflow-x:auto;">
            <table class="lsgd-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Loại</th>
                        <th>Mô tả</th>
                        <th>Số tiền</th>
                        <th>Số dư sau</th>
                        <th>Phương thức</th>
                        <th>Trạng thái</th>
                        <th>Thời gian</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $stt_start = $offset + 1;
                foreach ($transactions as $i => $tx):
                    $meta   = lsgd_type_meta($tx->transaction_type);
                    $amount = (float) $tx->amount;
                    $balance = (float) $tx->balance_after;
                    $method  = lsgd_method_label($tx->payment_method);
                    $desc    = $tx->description ?: $meta['label'];
                    $is_out  = $meta['sign'] === '-';
                    $status_meta = lsgd_status_meta($tx->status);
                ?>
                    <tr>
                        <td style="color:#9ca3af;font-size:12px;"><?php echo $stt_start + $i; ?></td>
                        <td>
                            <span class="lsgd-type-pill lsgd-type-<?php echo esc_attr($meta['ui']); ?>">
                                <?php echo esc_html($meta['label']); ?>
                            </span>
                        </td>
                        <td style="color:#6b7280;max-width:180px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="<?php echo esc_attr($desc); ?>">
                            <?php echo esc_html($desc); ?>
                        </td>
                        <td class="<?php echo $is_out ? 'lsgd-amount-minus' : 'lsgd-amount-plus'; ?>">
                            <?php echo $meta['sign'] . lsgd_fmt($amount); ?>
                        </td>
                        <td style="font-size:12px;"><?php echo lsgd_fmt($balance); ?></td>
                        <td style="font-size:12px;color:#6b7280;"><?php echo esc_html($method); ?></td>
                        <td>
                            <span class="lsgd-status-pill <?php echo esc_attr($status_meta['css']); ?>">
                                <?php echo esc_html($status_meta['label']); ?>
                            </span>
                        </td>
                        <td style="font-size:12px;color:#9ca3af;white-space:nowrap;">
                            <?php echo esc_html(mysql2date('d/m/Y H:i', $tx->created_at)); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?php if ($total_pages > 1): ?>
        <div class="lsgd-pagination">
            <?php if ($paged > 1): ?>
                <a href="<?php echo esc_url(add_query_arg(['paged' => $paged - 1, 'type' => $filter_type_ui, 'month' => $filter_month], $current_url)); ?>" class="lsgd-page-btn">←</a>
            <?php else: ?>
                <button class="lsgd-page-btn" disabled>←</button>
            <?php endif; ?>

            <?php for ($p = 1; $p <= $total_pages; $p++):
                if ($p === 1 || $p === $total_pages || abs($p - $paged) <= 1):
            ?>
                <a href="<?php echo esc_url(add_query_arg(['paged' => $p, 'type' => $filter_type_ui, 'month' => $filter_month], $current_url)); ?>"
                   class="lsgd-page-btn <?php echo $p === $paged ? 'active' : ''; ?>">
                    <?php echo $p; ?>
                </a>
            <?php elseif (abs($p - $paged) === 2): ?>
                <span class="lsgd-page-btn" style="border:none;background:none;cursor:default;">…</span>
            <?php endif; ?>
            <?php endfor; ?>

            <?php if ($paged < $total_pages): ?>
                <a href="<?php echo esc_url(add_query_arg(['paged' => $paged + 1, 'type' => $filter_type_ui, 'month' => $filter_month], $current_url)); ?>" class="lsgd-page-btn">→</a>
            <?php else: ?>
                <button class="lsgd-page-btn" disabled>→</button>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    <?php endif; ?>
</div>