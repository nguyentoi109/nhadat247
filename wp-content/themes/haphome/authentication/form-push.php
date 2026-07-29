<style>
.push-options {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 20px;
    text-align: left;
}

.push-option {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 14px;
    border: 1.5px solid #e8e8e8;
    border-radius: 10px;
    cursor: pointer;
    transition: border-color .15s, background .15s;
}

.push-option:has(input:checked) {
    border-color: #ee0033;
    background: #fef2f2;
}

.push-option input {
    accent-color: #ee0033;
    width: 16px;
    height: 16px;
    flex-shrink: 0;
}

.push-option-title {
    font-size: 13px;
    font-weight: 600;
    color: #0d1011;
}
</style>
<section class="section-form-push">
    <div class="push-icon">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ee0033" stroke-width="1.5">
            <path d="M5 15l7-7 7 7" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>

    <div class="push-title">
        Đẩy tin lên đầu
    </div>

    <div class="push-message" id="push-popup-message">
        Đẩy tin này lên đầu danh sách. Xác nhận để tiếp tục.
    </div>

    <div id="push-popup-vouchers"></div>

    <div class="push-error" id="push-popup-error"></div>

    <input type="hidden" id="push-popup-post-id" value="">

    <div class="push-actions">
        <button type="button" class="btn-push-cancel close-push-popup">Huỷ</button>
        <button type="button" class="btn-push-confirm" id="push-popup-confirm-btn">Xác nhận đẩy tin</button>
    </div>
</section>