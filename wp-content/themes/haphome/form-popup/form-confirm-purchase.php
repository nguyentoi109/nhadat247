<style>
.section-form-confirm {
    background: #fff;
    border-radius: 14px;
    padding: 28px;
    max-width: 420px;
    width: 100%;
    text-align: center;
    box-sizing: border-box;
}

.confirm-icon {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: #dbeafe;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
}

.confirm-title {
    font-size: 17px;
    font-weight: 800;
    color: var(--ql-text, #1e293b);
    margin-bottom: 4px;
}

.confirm-subtitle {
    font-size: 12.5px;
    color: var(--ql-muted, #6b7280);
    margin-bottom: 18px;
    line-height: 1.5;
}

.confirm-summary {
    background: #f9fafb;
    border: 1px solid var(--ql-border, #e5e7eb);
    border-radius: 10px;
    padding: 14px 16px;
    margin-bottom: 14px;
    text-align: left;
}

.confirm-summary-name {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 14px;
    font-weight: 700;
    color: var(--ql-text, #1e293b);
    margin-bottom: 10px;
}

.confirm-summary-price {
    font-size: 17px;
    font-weight: 800;
    color: #2563eb;
}

.confirm-summary-items {
    display: flex;
    flex-direction: column;
    gap: 6px;
    padding-top: 10px;
    border-top: 1px solid #eef0f2;
}

.confirm-item-row {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 12.5px;
    color: var(--ql-muted, #6b7280);
}

.confirm-item-row svg {
    flex-shrink: 0;
}

.confirm-balance-note {
    font-size: 12px;
    color: var(--ql-muted, #6b7280);
    margin-bottom: 12px;
}

.confirm-balance-note strong {
    color: var(--ql-text, #1e293b);
}

.confirm-warning {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 11.5px;
    color: #92400e;
    background: #fffbea;
    border: 1px solid #fde68a;
    border-radius: 8px;
    padding: 9px 12px;
    margin-bottom: 18px;
    text-align: left;
    line-height: 1.5;
}

.confirm-warning svg {
    flex-shrink: 0;
}

.confirm-purchase-error {
    display: none;
    font-size: 12px;
    color: #dc2626;
    background: #fef2f2;
    border: 1px solid #fecaca;
    border-radius: 8px;
    padding: 9px 12px;
    margin-bottom: 14px;
    text-align: left;
}

.confirm-purchase-error.show {
    display: block;
}

.confirm-actions {
    display: flex;
    gap: 10px;
}

.btn-confirm-cancel {
    flex: 1;
    padding: 11px;
    background: #f3f4f6;
    color: var(--ql-text, #1e293b);
    border: none;
    border-radius: 8px;
    font-family: inherit;
    font-size: 13.5px;
    font-weight: 700;
    cursor: pointer;
    transition: background .15s;
}

.btn-confirm-cancel:hover {
    background: #e5e7eb;
}

.btn-confirm-submit {
    flex: 1.4;
    padding: 11px;
    background: #2563eb;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-family: inherit;
    font-size: 13.5px;
    font-weight: 700;
    cursor: pointer;
    transition: background .15s, opacity .15s;
}

.btn-confirm-submit:hover {
    background: #1d4ed8;
}

.btn-confirm-submit:disabled {
    opacity: .6;
    cursor: not-allowed;
}
</style>

<?php
if (!defined('ABSPATH')) exit;
?>
<section class="section-form-confirm">
    <div class="confirm-icon">
        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="1.5">
            <rect x="2" y="6" width="20" height="12" rx="2"/>
            <path d="M2 10h20" stroke-linecap="round"/>
        </svg>
    </div>

    <div class="confirm-title">Xác nhận thanh toán</div>
    <div class="confirm-subtitle confirm-subtitle-value">Vui lòng kiểm tra lại thông tin trước khi xác nhận</div>

    <div class="confirm-summary">
        <div class="confirm-summary-row confirm-summary-name">
            <span class="confirm-title-value"></span>
            <span class="confirm-summary-price confirm-price-value"></span>
        </div>

        <div class="confirm-summary-items"></div>
    </div>

    <div class="confirm-purchase-error"></div>

    <div class="confirm-warning">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01" stroke-linecap="round"/>
        </svg>
        Số tiền sẽ được trừ trực tiếp từ ví của bạn ngay khi xác nhận.
    </div>

    <div class="confirm-actions">
        <button type="button" class="btn-confirm-cancel close-confirm-popup">Huỷ</button>
        <button type="button"
                class="btn-confirm-submit"
                id="confirm-purchase-submit">
            Xác nhận thanh toán
        </button>
    </div>
</section>