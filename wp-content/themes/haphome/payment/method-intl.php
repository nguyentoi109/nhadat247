<?php
/**
 * ================================================================
 * VNPAY — Thẻ quốc tế & Ví số
 * Hỗ trợ: Visa, Mastercard, JCB, Apple Pay, Google Pay
 * Ví số  : VNPay QR, ZaloPay, MoMo (qua cổng VNPay)
 * ================================================================
 * Cấu hình trong wp-config.php:
 *   define('VNPAY_TMN_CODE',    'XXXXXXXX');
 *   define('VNPAY_HASH_SECRET', 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
 *   define('VNPAY_URL',         'https://pay.vnpay.vn/vpcpay.html');
 *   define('VNPAY_VERSION',     '2.1.0');
 * ================================================================
 */
if (!defined('ABSPATH')) exit;

/* ──────────────────────────────────────────────────────────────
   RENDER — Chọn loại thẻ / ví
────────────────────────────────────────────────────────────── */
function bds_render_intl_vnpay(int $amount, string $order_id, string $bank = ''): string {
    ob_start(); ?>

    <div style="padding:4px 0 16px;">

        <!-- Tabs: Thẻ quốc tế | Ví số -->
        <div style="display:flex;gap:0;border:1.5px solid #e5e7eb;border-radius:8px;overflow:hidden;margin-bottom:20px;">
            <button type="button" id="vnp-tab-card"
                    onclick="vnpSwitchTab('card')"
                    style="flex:1;padding:10px;font-size:13px;font-weight:700;border:none;
                           background:#111;color:#fff;cursor:pointer;font-family:inherit;
                           transition:all .2s;">
                💳 Thẻ quốc tế
            </button>
            <button type="button" id="vnp-tab-wallet"
                    onclick="vnpSwitchTab('wallet')"
                    style="flex:1;padding:10px;font-size:13px;font-weight:700;border:none;
                           background:#fff;color:#6b7280;cursor:pointer;font-family:inherit;
                           transition:all .2s;">
                📱 Ví số
            </button>
        </div>

        <!-- Tab: Thẻ quốc tế -->
        <div id="vnp-panel-card">
            <div style="font-size:12px;color:#6b7280;margin-bottom:10px;font-weight:600;">
                Chọn loại thẻ
            </div>
            <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:8px;margin-bottom:20px;">

                <?php
                $cards = [
                    ['id'=>'VISA',       'label'=>'Visa',
                     'logo'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/200px-Visa_Inc._logo.svg.png'],
                    ['id'=>'MASTERCARD', 'label'=>'Mastercard',
                     'logo'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/200px-Mastercard-logo.svg.png'],
                    ['id'=>'JCB',        'label'=>'JCB',
                     'logo'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/JCB_logo.svg/200px-JCB_logo.svg.png'],
                    ['id'=>'AMEX',       'label'=>'Amex',
                     'logo'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/American_Express_logo.svg/200px-American_Express_logo.svg.png'],
                ];
                foreach ($cards as $c):
                ?>
                <div class="vnp-card-item <?php echo ($bank === $c['id'] ? 'vnp-selected' : ''); ?>"
                     data-bank="<?php echo esc_attr($c['id']); ?>"
                     onclick="vnpPickCard(this)"
                     style="border:2px solid #e5e7eb;border-radius:8px;padding:10px 6px;
                            cursor:pointer;text-align:center;transition:all .15s;background:#fff;">
                    <img src="<?php echo esc_url($c['logo']); ?>"
                         alt="<?php echo esc_attr($c['label']); ?>"
                         style="height:24px;object-fit:contain;display:block;margin:0 auto 5px;"
                         onerror="this.style.display='none'">
                    <span style="font-size:10px;font-weight:600;color:#374151;">
                        <?php echo esc_html($c['label']); ?>
                    </span>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Apple Pay / Google Pay -->
            <div style="font-size:12px;color:#6b7280;margin-bottom:10px;font-weight:600;">
                Hoặc thanh toán nhanh
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-bottom:20px;">
                <div class="vnp-card-item" data-bank="APPLEPAY" onclick="vnpPickCard(this)"
                     style="border:2px solid #e5e7eb;border-radius:8px;padding:11px;
                            cursor:pointer;display:flex;align-items:center;justify-content:center;
                            gap:8px;background:#fff;transition:all .15s;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/100px-Apple_logo_black.svg.png"
                         alt="Apple Pay" style="height:20px;object-fit:contain;"
                         onerror="this.style.display='none'">
                    <span style="font-size:13px;font-weight:700;color:#111;">Apple Pay</span>
                </div>
                <div class="vnp-card-item" data-bank="GOOGLEPAY" onclick="vnpPickCard(this)"
                     style="border:2px solid #e5e7eb;border-radius:8px;padding:11px;
                            cursor:pointer;display:flex;align-items:center;justify-content:center;
                            gap:8px;background:#fff;transition:all .15s;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Google_Pay_Logo.svg/200px-Google_Pay_Logo.svg.png"
                         alt="Google Pay" style="height:20px;object-fit:contain;"
                         onerror="this.style.display='none'">
                    <span style="font-size:13px;font-weight:700;color:#374151;">Google Pay</span>
                </div>
            </div>
        </div>

        <!-- Tab: Ví số -->
        <div id="vnp-panel-wallet" style="display:none;">
            <div style="font-size:12px;color:#6b7280;margin-bottom:10px;font-weight:600;">
                Chọn ví điện tử
            </div>
            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:8px;margin-bottom:20px;">
                <?php
                $wallets = [
                    ['id'=>'VNPAYQR', 'label'=>'VNPay QR',
                     'logo'=>'https://stcd02.web.gravatar.com/avatars/?d=https://cdn.haitrieu.com/wp-content/uploads/2022/10/Logo-VNPAY-QR.png',
                     'color'=>'#003087'],
                    ['id'=>'ZALOPAY', 'label'=>'ZaloPay',
                     'logo'=>'https://cdn.haitrieu.com/wp-content/uploads/2022/01/Logo-ZaloPay-Square.png',
                     'color'=>'#0068ff'],
                    ['id'=>'MOMO',    'label'=>'MoMo',
                     'logo'=>'https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png',
                     'color'=>'#a50064'],
                    ['id'=>'VIETTELPAY','label'=>'Viettel Pay',
                     'logo'=>'https://cdn.haitrieu.com/wp-content/uploads/2022/10/Logo-ViettelPay.png',
                     'color'=>'#e3001b'],
                    ['id'=>'SHOPEEPAY','label'=>'ShopeePay',
                     'logo'=>'https://cdn.haitrieu.com/wp-content/uploads/2022/10/Logo-ShopeePay.png',
                     'color'=>'#ee4d2d'],
                    ['id'=>'VIVIET',  'label'=>'Ví VIViet',
                     'logo'=>'https://cdn.haitrieu.com/wp-content/uploads/2022/10/Logo-Vi-VIViet.png',
                     'color'=>'#1e88e5'],
                ];
                foreach ($wallets as $w):
                ?>
                <div class="vnp-card-item" data-bank="<?php echo esc_attr($w['id']); ?>"
                     onclick="vnpPickCard(this)"
                     style="border:2px solid #e5e7eb;border-radius:8px;padding:12px 8px;
                            cursor:pointer;text-align:center;transition:all .15s;background:#fff;">
                    <img src="<?php echo esc_url($w['logo']); ?>"
                         alt="<?php echo esc_attr($w['label']); ?>"
                         style="height:32px;width:32px;object-fit:contain;border-radius:6px;
                                display:block;margin:0 auto 6px;"
                         onerror="this.style.display='none'">
                    <span style="font-size:10px;font-weight:600;color:#374151;line-height:1.3;display:block;">
                        <?php echo esc_html($w['label']); ?>
                    </span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Thông tin giao dịch -->
        <div style="background:#f9fafb;border:1px solid #f0f0f0;border-radius:8px;
                    padding:12px 16px;font-size:13px;margin-bottom:16px;">
            <div style="display:flex;justify-content:space-between;padding:6px 0;
                        border-bottom:1px solid #f0f0f0;">
                <span style="color:#6b7280;">Số tiền</span>
                <strong style="color:#ee0033;font-size:15px;">
                    <?php echo number_format($amount, 0, ',', '.'); ?> ₫
                </strong>
            </div>
            <div style="display:flex;justify-content:space-between;padding:6px 0;
                        border-bottom:1px solid #f0f0f0;">
                <span style="color:#6b7280;">Phương thức</span>
                <strong id="vnp-method-label">—</strong>
            </div>
            <div style="display:flex;justify-content:space-between;padding:6px 0;">
                <span style="color:#6b7280;">Phí giao dịch</span>
                <strong style="color:#059669;">Miễn phí</strong>
            </div>
        </div>

        <div style="background:#fffbea;border:1px solid #fde68a;border-radius:8px;
                    padding:10px 14px;font-size:12px;color:#92400e;margin-bottom:20px;">
            🔒 Thanh toán bảo mật qua cổng VNPay — đạt chuẩn PCI DSS, không lưu thông tin thẻ.
        </div>

        <!-- Nút thanh toán -->
        <button type="button" id="vnp-pay-btn"
                onclick="vnpSubmit(<?php echo $amount; ?>, '<?php echo esc_js($order_id); ?>')"
                disabled
                style="width:100%;padding:13px;background:#ee0033;color:#fff;border:none;
                       border-radius:8px;font-size:15px;font-weight:700;cursor:pointer;
                       font-family:inherit;transition:background .2s;opacity:.5;">
            Thanh toán ngay →
        </button>

    </div>

    <style>
    .vnp-card-item:hover  { border-color:#ee0033!important; }
    .vnp-card-item.vnp-selected {
        border-color:#ee0033!important;
        background:#fff5f6!important;
        box-shadow:0 2px 8px rgba(238,0,51,.12);
    }
    #vnp-tab-card, #vnp-tab-wallet { transition:all .2s; }
    </style>

    <script>
    window._vnpBank = '';

    function vnpSwitchTab(tab) {
        document.getElementById('vnp-panel-card').style.display   = tab==='card'   ? '' : 'none';
        document.getElementById('vnp-panel-wallet').style.display = tab==='wallet' ? '' : 'none';
        document.getElementById('vnp-tab-card').style.background   = tab==='card'   ? '#111' : '#fff';
        document.getElementById('vnp-tab-card').style.color        = tab==='card'   ? '#fff' : '#6b7280';
        document.getElementById('vnp-tab-wallet').style.background = tab==='wallet' ? '#111' : '#fff';
        document.getElementById('vnp-tab-wallet').style.color      = tab==='wallet' ? '#fff' : '#6b7280';
        // Reset lựa chọn khi chuyển tab
        document.querySelectorAll('.vnp-card-item').forEach(function(el){
            el.classList.remove('vnp-selected');
        });
        window._vnpBank = '';
        document.getElementById('vnp-method-label').textContent = '—';
        vnpCheckReady();
    }

    function vnpPickCard(el) {
        document.querySelectorAll('.vnp-card-item').forEach(function(c){ c.classList.remove('vnp-selected'); });
        el.classList.add('vnp-selected');
        window._vnpBank = el.dataset.bank;
        var lbl = el.querySelector('span') ? el.querySelector('span').textContent.trim() : el.dataset.bank;
        document.getElementById('vnp-method-label').textContent = lbl;
        vnpCheckReady();
    }

    function vnpCheckReady() {
        var btn = document.getElementById('vnp-pay-btn');
        if (!btn) return;
        var ok = !!window._vnpBank;
        btn.disabled = !ok;
        btn.style.opacity = ok ? '1' : '.5';
        btn.style.cursor  = ok ? 'pointer' : 'not-allowed';
    }

    function vnpSubmit(amount, orderId) {
        if (!window._vnpBank) return;
        var btn = document.getElementById('vnp-pay-btn');
        if (btn) { btn.disabled = true; btn.textContent = 'Đang chuyển hướng...'; }

        fetch('<?php echo esc_js(admin_url("admin-ajax.php")); ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                action:  'bds_vnpay_create',
                _nonce:  '<?php echo wp_create_nonce("bds_vnpay_nonce"); ?>',
                amount:  amount,
                bank:    window._vnpBank,
                order_id: orderId,
            })
        })
        .then(function(r){ return r.json(); })
        .then(function(res){
            if (res.success && res.data.pay_url) {
                window.location.href = res.data.pay_url;
            } else {
                alert(res.data?.message || 'Có lỗi xảy ra, vui lòng thử lại.');
                if (btn) { btn.disabled = false; btn.textContent = 'Thanh toán ngay →'; }
            }
        })
        .catch(function(){
            alert('Lỗi kết nối, vui lòng thử lại.');
            if (btn) { btn.disabled = false; btn.textContent = 'Thanh toán ngay →'; }
        });
    }
    </script>
    <?php
    return ob_get_clean();
}


/* ──────────────────────────────────────────────────────────────
   AJAX — Tạo URL thanh toán VNPay
────────────────────────────────────────────────────────────── */
add_action('wp_ajax_bds_vnpay_create',        'bds_vnpay_create_cb');
add_action('wp_ajax_nopriv_bds_vnpay_create', 'bds_vnpay_create_cb');
function bds_vnpay_create_cb(): void {
    check_ajax_referer('bds_vnpay_nonce', '_nonce');

    $amount   = (int)($_POST['amount']   ?? 0);
    $bank     = sanitize_text_field($_POST['bank']     ?? '');
    $order_id = sanitize_text_field($_POST['order_id'] ?? '');

    if ($amount < 10000) {
        wp_send_json_error(['message' => 'Số tiền tối thiểu 10.000 ₫']);
    }

    // Tạo order_code số nguyên ≤ 9 chữ số (VNPay yêu cầu)
    $order_code = (int) substr(preg_replace('/[^0-9]/', '', $order_id . time()), 0, 9);
    if ($order_code < 1) $order_code = rand(100000000, 999999999);

    // Lưu đơn vào DB trước khi redirect
    $user_id = get_current_user_id();
    bds_vnpay_save_order($order_code, $amount, $user_id, 'intl', $bank);

    try {
        $pay_url = bds_vnpay_build_url($amount, $order_code, $bank);
        wp_send_json_success(['pay_url' => $pay_url, 'order_code' => $order_code]);
    } catch (Exception $e) {
        wp_send_json_error(['message' => $e->getMessage()]);
    }
}


/* ──────────────────────────────────────────────────────────────
   BUILD URL THANH TOÁN VNPAY
────────────────────────────────────────────────────────────── */
function bds_vnpay_build_url(int $amount, int $order_code, string $bank = ''): string {
    if (!defined('VNPAY_TMN_CODE') || !defined('VNPAY_HASH_SECRET')) {
        throw new Exception('Chưa cấu hình VNPay. Vui lòng liên hệ quản trị viên.');
    }

    $vnp_url        = defined('VNPAY_URL')     ? VNPAY_URL     : 'https://pay.vnpay.vn/vpcpay.html';
    $vnp_version    = defined('VNPAY_VERSION') ? VNPAY_VERSION : '2.1.0';
    $vnp_tmn_code   = VNPAY_TMN_CODE;
    $vnp_hash_secret = VNPAY_HASH_SECRET;

    $base_url    = strtok(home_url(add_query_arg(null, null)), '?');
    $return_url  = add_query_arg([
        'vnpay_return' => '1',
        'order_code'   => $order_code,
    ], $base_url);

    // Xác định bank_code theo loại thẻ / ví
    $bank_code = bds_vnpay_map_bank($bank);

    $params = [
        'vnp_Version'    => $vnp_version,
        'vnp_Command'    => 'pay',
        'vnp_TmnCode'    => $vnp_tmn_code,
        'vnp_Amount'     => $amount * 100,          // VNPay tính đơn vị x100
        'vnp_CurrCode'   => 'VND',
        'vnp_TxnRef'     => $order_code,
        'vnp_OrderInfo'  => 'NAP TIEN ' . $order_code,
        'vnp_OrderType'  => 'billpayment',
        'vnp_Locale'     => 'vn',
        'vnp_ReturnUrl'  => $return_url,
        'vnp_IpAddr'     => bds_get_client_ip(),
        'vnp_CreateDate' => date('YmdHis'),
        'vnp_ExpireDate' => date('YmdHis', strtotime('+15 minutes')),
    ];

    // Gắn bank_code nếu có (bỏ qua khi người dùng để VNPay tự chọn)
    if ($bank_code !== '') {
        $params['vnp_BankCode'] = $bank_code;
    }

    // Sắp xếp theo thứ tự alphabet — bắt buộc của VNPay
    ksort($params);

    $query_string = http_build_query($params, '', '&', PHP_QUERY_RFC3986);
    $hmac = hash_hmac('sha512', $query_string, $vnp_hash_secret);

    return $vnp_url . '?' . $query_string . '&vnp_SecureHash=' . $hmac;
}

/**
 * Map bank/wallet ID → vnp_BankCode
 * Tham khảo: https://sandbox.vnpayment.vn/apis/docs/thanh-toan-pay/pay.md
 */
function bds_vnpay_map_bank(string $bank): string {
    $map = [
        // Thẻ quốc tế — VNPay dùng chung INTCARD
        'VISA'       => 'INTCARD',
        'MASTERCARD' => 'INTCARD',
        'JCB'        => 'INTCARD',
        'AMEX'       => 'INTCARD',
        'APPLEPAY'   => 'INTCARD',
        'GOOGLEPAY'  => 'INTCARD',
        // Ví số
        'VNPAYQR'    => 'VNPAYQR',
        'ZALOPAY'    => 'ZALOPAY',
        'MOMO'       => 'MOMO',
        'VIETTELPAY' => 'VIETTELPAY',
        'SHOPEEPAY'  => 'SHOPEEPAY',
        'VIVIET'     => 'VIVIET',
    ];
    return $map[strtoupper($bank)] ?? '';
}


/* ──────────────────────────────────────────────────────────────
   XỬ LÝ RETURN URL SAU KHI THANH TOÁN
────────────────────────────────────────────────────────────── */
add_action('template_redirect', 'bds_vnpay_handle_return');
function bds_vnpay_handle_return(): void {
    if (empty($_GET['vnpay_return']) || empty($_GET['order_code'])) return;

    $order_code = (int) $_GET['order_code'];

    // Xác minh chữ ký từ VNPay
    if (!bds_vnpay_verify_signature($_GET)) {
        // Chữ ký sai — không xử lý, log lại
        error_log('[VNPay] Invalid signature for order ' . $order_code);
        return;
    }

    $response_code = sanitize_text_field($_GET['vnp_ResponseCode'] ?? '');
    $status        = ($response_code === '00') ? 'PAID' : 'CANCELLED';

    bds_vnpay_handle_status($order_code, $status);

    // Redirect về trang ví
    $redirect = home_url('/quan-ly-tai-khoan/vi-tien/');
    if ($status === 'PAID') {
        $redirect = add_query_arg('nap_thanh_cong', '1', $redirect);
    } else {
        $redirect = add_query_arg('nap_that_bai', $response_code, $redirect);
    }
    wp_safe_redirect($redirect);
    exit;
}

function bds_vnpay_verify_signature(array $params): bool {
    if (!defined('VNPAY_HASH_SECRET')) return false;

    $received_hash = $params['vnp_SecureHash'] ?? '';
    $clean = array_filter($params, function($k) {
        return strpos($k, 'vnp_') === 0 && $k !== 'vnp_SecureHash' && $k !== 'vnp_SecureHashType';
    }, ARRAY_FILTER_USE_KEY);

    ksort($clean);
    $query  = http_build_query($clean, '', '&', PHP_QUERY_RFC3986);
    $expected = hash_hmac('sha512', $query, VNPAY_HASH_SECRET);

    return hash_equals($expected, $received_hash);
}


/* ──────────────────────────────────────────────────────────────
   XỬ LÝ TRẠNG THÁI ĐƠN HÀNG
────────────────────────────────────────────────────────────── */
function bds_vnpay_handle_status(int $order_code, string $status): void {
    global $wpdb;
    $table = $wpdb->prefix . 'bds_payment_orders';

    $order = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM $table WHERE order_code = %d AND status = 'pending' AND gateway = 'vnpay'",
        $order_code
    ));
    if (!$order) return;

    if ($status === 'PAID') {
        // Cộng số dư chính
        global $wpdb;
        $users_table = $wpdb->prefix . 'custom_users';
        $user = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM $users_table WHERE id = %d", $order->user_id
        ));

        if ($user) {
            $new_main = (float)$user->balance_main + $order->amount;
            $wpdb->update($users_table, ['balance_main' => $new_main], ['id' => $order->user_id], ['%f'], ['%d']);

            // Tính bonus
            $bonus = 0;
            if ($order->amount >= 2000000)    $bonus = (int)round($order->amount * 0.12);
            elseif ($order->amount >= 500000) $bonus = (int)round($order->amount * 0.05);

            // Thưởng lần đầu nạp
            $meta_table = $wpdb->prefix . 'custom_user_meta'; // nếu có
            // Hoặc dùng transient / option theo user_id
            $first_key = 'vnp_first_deposit_' . $order->user_id;
            if (!get_option($first_key)) {
                $bonus += 50000;
                update_option($first_key, 1, false);
            }

            if ($bonus > 0) {
                $new_promo = (float)$user->balance_bonus + $bonus;
                $wpdb->update($users_table, ['balance_bonus' => $new_promo], ['id' => $order->user_id], ['%f'], ['%d']);
            }

            // Ghi transaction
            bds_vnpay_log_transaction($order, $bonus);
        }

        $wpdb->update($table, ['status' => 'paid'], ['order_code' => $order_code], ['%s'], ['%d']);

    } elseif (in_array($status, ['CANCELLED', 'FAILED'], true)) {
        $wpdb->update($table, ['status' => strtolower($status)], ['order_code' => $order_code], ['%s'], ['%d']);
    }
}

function bds_vnpay_log_transaction(object $order, int $bonus): void {
    global $wpdb;
    $table = $wpdb->prefix . 'custom_transactions';

    $wpdb->insert($table, [
        'user_id'          => $order->user_id,
        'transaction_type' => 'deposit',
        'wallet_type'      => 'main',
        'amount'           => $order->amount,
        'payment_method'   => 'vnpay',
        'reference_code'   => (string) $order->order_code,
        'related_table'    => 'bds_payment_orders',
        'related_id'       => $order->id,
        'status'           => 'completed',
        'description'      => 'Nạp tiền qua VNPay' . ($bonus > 0 ? ' (thưởng +' . number_format($bonus) . ' ₫)' : ''),
    ], ['%d','%s','%s','%d','%s','%s','%s','%d','%s','%s']);
}


/* ──────────────────────────────────────────────────────────────
   LƯU ĐƠN HÀNG VÀO DB
────────────────────────────────────────────────────────────── */
function bds_vnpay_save_order(int $order_code, int $amount, int $user_id, string $type, string $bank): void {
    global $wpdb;
    $wpdb->insert(
        $wpdb->prefix . 'bds_payment_orders',
        [
            'order_code' => $order_code,
            'user_id'    => $user_id,
            'amount'     => $amount,
            'method'     => $type,
            'bank'       => $bank,
            'gateway'    => 'vnpay',
            'status'     => 'pending',
        ],
        ['%d','%d','%d','%s','%s','%s','%s']
    );
}


/* ──────────────────────────────────────────────────────────────
   HELPER — Lấy IP client
────────────────────────────────────────────────────────────── */
function bds_get_client_ip(): string {
    $keys = ['HTTP_CF_CONNECTING_IP','HTTP_X_FORWARDED_FOR','HTTP_CLIENT_IP','REMOTE_ADDR'];
    foreach ($keys as $k) {
        if (!empty($_SERVER[$k])) {
            $ip = trim(explode(',', $_SERVER[$k])[0]);
            if (filter_var($ip, FILTER_VALIDATE_IP)) return $ip;
        }
    }
    return '127.0.0.1';
}