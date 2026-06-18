<?php if (!defined('ABSPATH')) exit; ?>

<style>
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
  transition: border-color 0.2s;
  font-family: inherit;
}
.pm-atm-input:focus {
  border-color: #ee0033;
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
  transition: all 0.15s;
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
  transition: all 0.15s;
  gap: 4px;
}
.pm-bank-item:hover {
  border-color: #0ea5e9;
  box-shadow: 0 2px 8px rgba(14, 165, 233, 0.12);
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
  transition: background 0.2s;
}
.pm-continue-btn:hover {
  background: #cc0022;
}
.pm-continue-btn:disabled {
  background: #f87171;
  cursor: not-allowed;
}

@media (max-width: 480px) {
  .pm-bank-grid {
    grid-template-columns: repeat(3, 1fr);
  }
  .pm-quick-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}
</style>

<script>
function ppRenderAmountPicker(options) {
    window._ppATMAmount = options.initAmount || 0;
    window._ppATMBank   = '';

    function calcBonus(amount) {
        if (amount >= 2000000) return Math.round(amount * 0.12);
        if (amount >= 500000)  return Math.round(amount * 0.05);
        return 0;
    }

    function hintHTML(amt) {
        var b = calcBonus(amt);
        return b > 0
            ? '<span class="pm-atm-hint has-bonus">🎁 Tặng thêm ' + b.toLocaleString('vi-VN') + ' ₫ vào tài khoản khuyến mãi</span>'
            : '<span class="pm-atm-hint">Nạp từ 2.000.000 ₫ để nhận thêm 12% khuyến mãi</span>';
    }

    var quickHTML = PP_QUICK.map(function (q) {
        var b = calcBonus(q.amount);
        var bonusStr = b > 0 ? '<span class="pm-quick-bonus">+' + b.toLocaleString('vi-VN') + ' ₫ KM</span>' : '';
        var active = q.amount === options.initAmount ? ' active' : '';
        return '<button type="button" class="pm-quick-btn' + active + '" onclick="ppQuickAmt(this,' + q.amount + ')">'
             + '<span class="pm-quick-amount">' + q.amount.toLocaleString('vi-VN') + ' ₫</span>'
             + bonusStr + '</button>';
    }).join('');

    var bankHTML = '';
    if (options.showBankGrid) {
        bankHTML =
            '<div class="pm-bank-section-title">Chọn ngân hàng</div>'
          + '<div class="pm-bank-section-sub">' + (options.bankSubtitle || '') + '</div>'
          + '<div class="pm-bank-grid">' + PP_BANKS.map(function (b) {
                return '<div class="pm-bank-item" data-bank="' + b.id + '" onclick="ppPickBank(this)">'
                     + '<img class="pm-bank-logo" src="' + b.logo + '" alt="' + b.name + '" onerror="this.style.display=\'none\'">'
                     + '<span class="pm-bank-lbl">' + b.name + '</span></div>';
            }).join('') + '</div>';
    }

    document.getElementById('pp-body').innerHTML =
        (options.headerHTML || '')
      + '<label class="pm-atm-label">Số tiền nạp <span>*</span></label>'
      + '<div class="pm-atm-input-wrap">'
      + '  <input class="pm-atm-input" type="text" id="pm-card-amount" placeholder="Nhập số tiền..."'
      + '    value="' + (options.initAmount ? options.initAmount.toLocaleString('vi-VN') : '') + '"'
      + '    oninput="ppCardAmtInput(this)">'
      + '</div>'
      + '<div id="pm-card-hint">' + hintHTML(options.initAmount) + '</div>'
      + '<div class="pm-quick-label">Chọn nhanh:</div>'
      + '<div class="pm-quick-grid">' + quickHTML + '</div>'
      + bankHTML
      + '<div class="pm-atm-footer">'
      + '  <div class="pm-atm-hotline">Hỗ trợ: <strong>1900 1881</strong></div>'
      + '  <button class="pm-continue-btn" id="' + options.submitId + '"'
      + '    onclick="' + options.onSubmit + '" disabled>'
      + (options.submitLabel || 'Tiếp tục') + '</button>'
      + '</div>';

    ppCheckCardReady(options.showBankGrid, options.submitId);
}

function ppCardAmtInput(inp) {
    var raw = inp.value.replace(/[^0-9]/g, '');
    var num = parseInt(raw) || 0;
    inp.value = num > 0 ? num.toLocaleString('vi-VN') : '';
    window._ppATMAmount = num;
    document.querySelectorAll('.pm-quick-btn').forEach(function (b) { b.classList.remove('active'); });

    var h = document.getElementById('pm-card-hint');
    var bonus = (num >= 2000000) ? Math.round(num * 0.12) : (num >= 500000 ? Math.round(num * 0.05) : 0);
    if (h) h.innerHTML = bonus > 0
        ? '<span class="pm-atm-hint has-bonus">🎁 Tặng thêm ' + bonus.toLocaleString('vi-VN') + ' ₫ vào tài khoản khuyến mãi</span>'
        : '<span class="pm-atm-hint">Nạp từ 2.000.000 ₫ để nhận thêm 12% khuyến mãi</span>';

    var submitBtn = document.querySelector('.pm-continue-btn');
    ppCheckCardReady(!!document.querySelector('.pm-bank-grid'), submitBtn ? submitBtn.id : '');
}

function ppQuickAmt(btn, amount) {
    document.querySelectorAll('.pm-quick-btn').forEach(function (b) { b.classList.remove('active'); });
    btn.classList.add('active');
    window._ppATMAmount = amount;

    var inp = document.getElementById('pm-card-amount');
    if (inp) inp.value = amount.toLocaleString('vi-VN');

    var h = document.getElementById('pm-card-hint');
    var bonus = (amount >= 2000000) ? Math.round(amount * 0.12) : (amount >= 500000 ? Math.round(amount * 0.05) : 0);
    if (h) h.innerHTML = bonus > 0
        ? '<span class="pm-atm-hint has-bonus">🎁 Tặng thêm ' + bonus.toLocaleString('vi-VN') + ' ₫ vào tài khoản khuyến mãi</span>'
        : '<span class="pm-atm-hint">Nạp từ 2.000.000 ₫ để nhận thêm 12% khuyến mãi</span>';

    var submitBtn = document.querySelector('.pm-continue-btn');
    ppCheckCardReady(!!document.querySelector('.pm-bank-grid'), submitBtn ? submitBtn.id : '');
}

function ppPickBank(el) {
    document.querySelectorAll('.pm-bank-item').forEach(function (b) { b.classList.remove('selected'); });
    el.classList.add('selected');
    window._ppATMBank = el.dataset.bank;

    var submitBtn = document.querySelector('.pm-continue-btn');
    ppCheckCardReady(true, submitBtn ? submitBtn.id : '');
}

function ppCheckCardReady(needsBank, submitId) {
    var btn = document.getElementById(submitId);
    if (!btn) return;
    var amountOk = window._ppATMAmount >= 50000;
    btn.disabled = needsBank ? !(amountOk && window._ppATMBank) : !amountOk;
}
</script>