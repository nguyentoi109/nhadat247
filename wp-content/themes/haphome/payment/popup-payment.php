<style>
.pp-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.5);
    z-index: 99999;
    align-items: center;
    justify-content: center;
    padding: 16px;
    backdrop-filter: blur(2px);
    place-items: center;
}

.pp-overlay.is-open {
    display: flex;
}

.pp-modal {
    margin: auto; 
}

.pp-modal {
	background: #fff;
	border-radius: 12px;
	width: 100%;
	max-width: 520px;
	max-height: 92vh;
	overflow-y: auto;
	box-shadow: 0 20px 60px rgba(0, 0, 0, .2);
	animation: ppSlideIn .22s ease;
}

@keyframes ppSlideIn {
	from {
		opacity: 0;
		transform: translateY(14px) scale(.97);
	}

	to {
		opacity: 1;
		transform: none;
	}
}

.pp-header {
	display: flex;
	align-items: flex-start;
	justify-content: space-between;
	padding: 18px 20px 14px;
	border-bottom: 1px solid #f0f0f0;
	position: sticky;
	top: 0;
	background: #fff;
	z-index: 2;
}

.pp-method-label {
	font-size: 15px;
	font-weight: 700;
	color: #111;
	margin-bottom: 4px;
}

.pp-amount-display {
	font-size: 13px;
	color: #6b7280;
}

.pp-amount-display strong {
	color: #ee0033;
	font-size: 15px;
}

.pp-close {
	width: 32px;
	height: 32px;
	border: none;
	background: #f3f4f6;
	border-radius: 50%;
	font-size: 18px;
	cursor: pointer;
	display: flex;
	align-items: center;
	justify-content: center;
	color: #374151;
	flex-shrink: 0;
	transition: background .15s;
	line-height: 1;
}

.pp-close:hover {
	background: #e5e7eb;
}

.pp-body {
	padding: 20px;
}

.pp-loading {
	text-align: center;
	padding: 40px 20px;
	color: #9ca3af;
	font-size: 13px;
}

.pp-spinner {
	width: 32px;
	height: 32px;
	border: 3px solid #f0f0f0;
	border-top-color: #ee0033;
	border-radius: 50%;
	animation: ppSpin .7s linear infinite;
	margin: 0 auto 12px;
}

@keyframes ppSpin {
	to {
		transform: rotate(360deg);
	}
}

.pm-copy-btn {
	font-size: 11px;
	font-weight: 600;
	padding: 4px 10px;
	background: #f3f4f6;
	border: 1px solid #e5e7eb;
	border-radius: 4px;
	cursor: pointer;
	color: #374151;
	margin-left: 6px;
	transition: all .15s;
	font-family: inherit;
}

.pm-copy-btn:hover {
	background: #e5e7eb;
}

.pm-copy-btn.copied {
	background: #d1fae5;
	border-color: #6ee7b7;
	color: #065f46;
}

.pm-highlight {
	color: #ee0033;
	font-size: 16px;
	font-weight: 700;
}

.pm-qr-wrap {
	text-align: center;
}

.pm-qr-note {
	font-size: 13px;
	color: #6b7280;
	margin-bottom: 14px;
	line-height: 1.6;
}

.pm-qr-img-wrap {
	display: inline-block;
	margin-bottom: 8px;
}

.pm-qr-img {
	width: 210px;
	height: 210px;
	border-radius: 8px;
	border: 1px solid #f0f0f0;
	display: block;
}

.pm-qr-expire {
	font-size: 12px;
	color: #6b7280;
	background: #f9fafb;
	border-radius: 6px;
	padding: 5px 12px;
	margin-top: 8px;
	display: inline-block;
}

.pm-qr-expire strong {
	color: #ee0033;
}

.pm-bank-info,
.pm-bank-rows {
	background: #f9fafb;
	border-radius: 8px;
	border: 1px solid #f0f0f0;
	overflow: hidden;
	margin-top: 12px;
	text-align: left;
}

.pm-bank-row {
	display: flex;
	justify-content: space-between;
	align-items: center;
	flex-wrap: wrap;
	gap: 4px;
	padding: 10px 14px;
	font-size: 13px;
	color: #6b7280;
	border-bottom: 1px solid #f0f0f0;
}

.pm-bank-row:last-child {
	border-bottom: none;
}

.pm-bank-row strong {
	color: #111;
}

.pm-bank-wrap .pm-bank-note {
	font-size: 13px;
	color: #6b7280;
	margin-bottom: 14px;
	line-height: 1.6;
}

.pm-bank-card {
	border: 1px solid #e5e7eb;
	border-radius: 8px;
	overflow: hidden;
	margin-bottom: 12px;
}

.pm-bank-card-header {
	display: flex;
	align-items: center;
	gap: 10px;
	padding: 12px 14px;
	background: #f9fafb;
	border-bottom: 1px solid #f0f0f0;
}

.pm-bank-logo-sm {
	width: 28px;
	height: 28px;
	object-fit: contain;
	border-radius: 4px;
}

.pm-bank-name-lbl {
	font-size: 13px;
	font-weight: 700;
	color: #111;
}

.pm-bank-footer-note {
	font-size: 12px;
	color: #6b7280;
	margin-top: 12px;
	line-height: 1.6;
}

.pm-status-check {
	display: flex;
	align-items: center;
	gap: 8px;
	font-size: 12px;
	color: #6b7280;
	margin-top: 16px;
	justify-content: center;
}

.pm-status-dot {
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: #fbbf24;
	animation: pmPulse 1.4s ease infinite;
}

@keyframes pmPulse {

	0%,
	100% {
		opacity: 1;
		transform: scale(1);
	}

	50% {
		opacity: .5;
		transform: scale(1.3);
	}
}

.pm-atm-label {
	font-size: 13px;
	font-weight: 700;
	color: #111;
	margin-bottom: 6px;
	display: block;
}

.pm-atm-label span {
	color: #ee0033;
}

.pm-atm-input-wrap {
	position: relative;
	margin-bottom: 4px;
}

.pm-atm-input {
	width: 100%;
	box-sizing: border-box;
	padding: 12px 46px 12px 14px;
	border: 1.5px solid #e5e7eb;
	border-radius: 8px;
	font-size: 16px;
	font-weight: 600;
	color: #111;
	background: #fff;
	outline: none;
	transition: border-color .2s;
	font-family: inherit;
}

.pm-atm-input:focus {
	border-color: #ee0033;
}

.pm-atm-input-unit {
	position: absolute;
	right: 14px;
	top: 50%;
	transform: translateY(-50%);
	font-size: 13px;
	font-weight: 600;
	color: #9ca3af;
	pointer-events: none;
}

.pm-atm-hint {
	font-size: 12px;
	color: #9ca3af;
	margin-bottom: 14px;
	min-height: 16px;
}

.pm-atm-hint.has-bonus {
	color: #059669;
	font-weight: 600;
}

.pm-quick-label {
	font-size: 12px;
	color: #6b7280;
	margin-bottom: 8px;
}

.pm-quick-grid {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 8px;
	margin-bottom: 18px;
}

.pm-quick-btn {
	padding: 10px 6px;
	border: 1.5px solid #e5e7eb;
	border-radius: 8px;
	background: #fff;
	cursor: pointer;
	font-family: inherit;
	text-align: center;
	transition: all .15s;
}

.pm-quick-btn:hover {
	border-color: #ee0033;
}

.pm-quick-btn.active {
	border-color: #ee0033;
	background: #fff5f6;
}

.pm-quick-amount {
	font-size: 13px;
	font-weight: 700;
	color: #111;
	display: block;
}

.pm-quick-bonus {
	font-size: 11px;
	color: #ee0033;
	font-weight: 600;
	display: block;
	margin-top: 2px;
}

.pm-bank-section-title {
	font-size: 13px;
	font-weight: 700;
	color: #111;
	margin-bottom: 3px;
}

.pm-bank-section-sub {
	font-size: 12px;
	color: #9ca3af;
	margin-bottom: 10px;
}

.pm-bank-grid {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 8px;
	margin-bottom: 16px;
}

.pm-bank-item {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	padding: 10px 4px;
	border: 1.5px solid #e5e7eb;
	border-radius: 8px;
	cursor: pointer;
	background: #fff;
	transition: all .15s;
	gap: 4px;
}

.pm-bank-item:hover {
	border-color: #0ea5e9;
	box-shadow: 0 2px 8px rgba(14, 165, 233, .12);
}

.pm-bank-item.selected {
	border-color: #0ea5e9;
	background: #f0f9ff;
	border-width: 2px;
}

.pm-bank-logo {
	width: 46px;
	height: 26px;
	object-fit: contain;
}

.pm-bank-lbl {
	font-size: 10px;
	color: #374151;
	font-weight: 600;
	text-align: center;
	line-height: 1.3;
}

.pm-atm-footer {
	display: flex;
	align-items: center;
	justify-content: space-between;
	margin-top: 16px;
	padding-top: 16px;
	border-top: 1px solid #f0f0f0;
}

.pm-atm-hotline {
	font-size: 13px;
	color: #6b7280;
}

.pm-atm-hotline strong {
	color: #ee0033;
}

.pm-continue-btn {
	padding: 10px 28px;
	background: #ee0033;
	color: #fff;
	border: none;
	border-radius: 6px;
	font-size: 14px;
	font-weight: 700;
	cursor: pointer;
	font-family: inherit;
	transition: background .2s;
}

.pm-continue-btn:hover {
	background: #cc0022;
}

.pm-continue-btn:disabled {
	background: #f87171;
	cursor: not-allowed;
}

.pm-atm-redirect {
	text-align: center;
	padding: 28px 0;
}

.pm-atm-redirect p {
	font-size: 14px;
	color: #6b7280;
	margin: 10px 0;
}

.pm-atm-goto {
	display: inline-block;
	margin-top: 12px;
	background: #ee0033;
	color: #fff;
	padding: 10px 28px;
	border-radius: 6px;
	font-size: 14px;
	font-weight: 700;
	text-decoration: none;
}

.pm-momo-wrap {
	text-align: center;
}

.pm-momo-logo {
	width: 72px;
	height: 72px;
	border-radius: 16px;
	margin-bottom: 12px;
}

.pm-momo-note {
	font-size: 13px;
	color: #6b7280;
	margin-bottom: 16px;
	line-height: 1.6;
}

.pm-momo-qr {
	width: 200px;
	height: 200px;
	border-radius: 8px;
	border: 1px solid #f0f0f0;
}

.pm-momo-phone-row {
	display: flex;
	align-items: center;
	justify-content: center;
	gap: 8px;
	margin-top: 14px;
	font-size: 14px;
	color: #111;
	font-weight: 600;
}

body.pp-open {
    overflow: hidden;
}

@media(max-width:480px) {
	.pm-bank-grid {
		grid-template-columns: repeat(3, 1fr);
	}

	.pm-quick-grid {
		grid-template-columns: repeat(2, 1fr);
	}
}
</style>

<?php if (!defined('ABSPATH')) exit; ?>
<div id="payment-popup" class="pp-overlay">
  <div class="pp-modal">
    <div class="pp-header">
      <div class="pp-header-info">
        <div class="pp-method-label" id="pp-method-label">Thanh toán</div>
        <div class="pp-amount-display">
          <strong id="pp-amount-display"></strong>
        </div>
      </div>
      <button class="pp-close" id="pp-close-btn" aria-label="Đóng">×</button>
    </div>
    <div class="pp-body" id="pp-body">
      <div class="pp-loading">
        <div class="pp-spinner"></div>
        <p>Đang tải...</p>
      </div>
    </div>
  </div>
</div>

<?php get_template_part('payment/amount-picker'); ?>

<script>
var PP_AJAX  = '<?php echo esc_js(admin_url("admin-ajax.php")); ?>';
var PP_NONCE = '<?php echo wp_create_nonce("bds_payment_nonce"); ?>';
var ppMethodLabels = {
   qr: 'Thanh toán QR VietQR',
   bank: 'Chuyển khoản ngân hàng',
   atm: 'Thẻ ATM nội địa',
   intl: 'Thẻ quốc tế / Apple Pay / Google Pay',
   momo: 'Ví MoMo',
   credit: 'Trả góp thẻ tín dụng',
};

var PP_BANK_SUBTITLES = {
   atm:    'Thẻ ATM nội địa — yêu cầu kích hoạt Internet Banking',
   intl:   'Visa / Mastercard / JCB / Apple Pay / Google Pay',
   credit: 'Visa / Mastercard / JCB — trả góp 0% lãi suất (tuỳ ngân hàng)',
};

var PP_QUICK = [
   { amount: 500000,    bonus: 0  },
   { amount: 1000000,   bonus: 0  },
   { amount: 2000000,   bonus: 12 },
   { amount: 3000000,   bonus: 12 },
   { amount: 5000000,   bonus: 12 },
   { amount: 10000000,  bonus: 12 },
];

var PP_BANKS = [
   { id: 'vietcombank', name: 'Vietcombank', logo: 'https://api.vietqr.io/img/VCB.png'  },
   { id: 'techcombank', name: 'Techcombank', logo: 'https://api.vietqr.io/img/TCB.png'  },
   { id: 'acb',         name: 'ACB',         logo: 'https://api.vietqr.io/img/ACB.png'  },
   { id: 'bidv',        name: 'BIDV',        logo: 'https://api.vietqr.io/img/BIDV.png' },
   { id: 'vietinbank',  name: 'VietinBank',  logo: 'https://api.vietqr.io/img/ICB.png'  },
   { id: 'vpbank',      name: 'VPBank',      logo: 'https://api.vietqr.io/img/VPB.png'  },
   { id: 'sacombank',   name: 'Sacombank',   logo: 'https://api.vietqr.io/img/STB.png'  },
   { id: 'agribank',    name: 'Agribank',    logo: 'https://api.vietqr.io/img/AGR.png'  },
   { id: 'tpbank',      name: 'TPBank',      logo: 'https://api.vietqr.io/img/TPB.png'  },
   { id: 'mbbank',      name: 'MB Bank',     logo: 'https://api.vietqr.io/img/MB.png'   },
   { id: 'hdbank',      name: 'HDBank',      logo: 'https://api.vietqr.io/img/HDB.png'  },
   { id: 'shb',         name: 'SHB',         logo: 'https://api.vietqr.io/img/SHB.png'  },
   { id: 'vib',         name: 'VIB',         logo: 'https://api.vietqr.io/img/VIB.png'  },
   { id: 'eximbank',    name: 'Eximbank',    logo: 'https://api.vietqr.io/img/EIB.png'  },
   { id: 'abbank',      name: 'ABBank',      logo: 'https://api.vietqr.io/img/ABB.png'  },
];

function ppOpen(method) {
    document.getElementById('pp-method-label').textContent = ppMethodLabels[method] || method;
    document.getElementById('pp-body').innerHTML = '<div class="pp-loading"><div class="pp-spinner"></div><p>Đang tải...</p></div>';
    document.getElementById('payment-popup').classList.add('is-open');
    window._ppCurrentMethod = method;
    document.body.classList.add('pp-open');
    document.body.style.overflow = 'hidden';
    var needsBank = (method === 'atm' || method === 'intl' || method === 'credit');
    var momoHeader = '';

    setTimeout(function () {
        ppRenderAmountPicker({
            initAmount:   0,
            headerHTML:   momoHeader,
            showBankGrid: needsBank,
            bankSubtitle: PP_BANK_SUBTITLES[method] || '',
            submitId:     'pm-goto-payment',
            submitLabel:  'Tiến hành thanh toán',
            onSubmit:     'ppGoToPayment()',
        });
    }, 100);
}

function ppGoToPayment() {
    var method = window._ppCurrentMethod;
    var amount = window._ppATMAmount;
    var bank   = window._ppATMBank || '';

    if (!amount || amount < 50000) { alert('Số tiền tối thiểu là 50.000 ₫'); return; }
    var needsBank = (method === 'atm' || method === 'intl' || method === 'credit');
    if (needsBank && !bank) { alert('Vui lòng chọn ngân hàng'); return; }

    var btn = document.getElementById('pm-goto-payment');
    if (btn) { btn.disabled = true; btn.textContent = 'Đang xử lý...'; }

    document.getElementById('pp-amount-display').textContent = amount.toLocaleString('vi-VN') + ' ₫';
    window._ppCurrentAmount = amount;

    document.getElementById('pp-body').innerHTML =
        '<div class="pp-loading"><div class="pp-spinner"></div><p>Đang kết nối cổng thanh toán...</p></div>';

    ppAjaxLoad(method, amount, bank);
}

function ppAjaxLoad(method, amount, bank) {
    fetch(PP_AJAX, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },

        body:
            'action=bds_load_payment_method' +
            '&method=' + encodeURIComponent(method) +
            '&amount=' + encodeURIComponent(amount) +
            '&bank=' + encodeURIComponent(bank) +
            '&_nonce=' + encodeURIComponent(PP_NONCE)
    })
    .then(function (r) {
        return r.json();
    })
    .then(function (d) {
        if (!d.success) {
            document.getElementById('pp-body').innerHTML =
                '<p style="color:red;text-align:center">Có lỗi xảy ra</p>';
            return;
        }

        if (d.data.redirect) {
            window.location.href = d.data.redirect;
            return;
        }
    })
    .catch(function () {
        document.getElementById('pp-body').innerHTML =
            '<p style="color:red;text-align:center">Lỗi kết nối.</p>';
    });
}

function ppDoClose() {
    document.getElementById('payment-popup').classList.remove('is-open');
    clearInterval(window._ppCountdown);
    document.body.classList.remove('pp-open');
    document.body.style.overflow = '';
}

function ppClose(e) {
    if (e === true) { ppDoClose(); return; }
    if (e && e.target === document.getElementById('payment-popup')) { ppDoClose(); }
}

document.addEventListener('DOMContentLoaded', function () {
    var btnClose = document.getElementById('pp-close-btn');
    if (btnClose) {
        btnClose.addEventListener('click', function (e) {
            e.stopPropagation();
            ppDoClose();
        });
    }
    var overlay = document.getElementById('payment-popup');
    if (overlay) {
        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) ppDoClose();
        });
    }
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            var popup = document.getElementById('payment-popup');
            if (popup && popup.classList.contains('is-open')) ppDoClose();
        }
    });
});

function ppStartCountdown(seconds) {
   clearInterval(window._ppCountdown);
   var left = seconds;
   window._ppCountdown = setInterval(function () {
      left--;
      var el = document.getElementById('pp-countdown');
      if (!el) { clearInterval(window._ppCountdown); return; }
      var m = String(Math.floor(left / 60)).padStart(2, '0');
      var s = String(left % 60).padStart(2, '0');
      el.textContent = m + ':' + s;
      if (left <= 0) {
         clearInterval(window._ppCountdown);
         ppAjaxLoad(window._ppCurrentMethod, window._ppCurrentAmount, '');
      }
   }, 1000);
}

function pmCopy(text, btn) {
   navigator.clipboard.writeText(text)
      .then(function () {
         btn.textContent = 'Đã sao chép!';
         btn.classList.add('copied');
         setTimeout(function () {
            btn.textContent = 'Sao chép';
            btn.classList.remove('copied');
         }, 1800);
      })
      .catch(function () { alert('Không thể sao chép.'); });
}

function ntSubmit() {
   if (!window.ntSelectedMethod) { alert('Vui lòng chọn phương thức thanh toán.'); return; }
   ppOpen(window.ntSelectedMethod);
}
</script>