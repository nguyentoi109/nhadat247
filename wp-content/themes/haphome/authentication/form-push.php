<section class="section-form-push">
    <div class="push-icon">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ee0033" stroke-width="1.5">
            <path d="M5 15l7-7 7 7" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>

    <div class="push-title">
        Đẩy tin lên đầu
    </div>

    <div class="push-message">
        Chọn loại đẩy tin phù hợp với tin đăng của bạn.
    </div>

    <div class="push-options">
        <label class="push-option">
            <input type="radio" name="push_type" value="normal" checked>
            <div class="push-option-content">
                <div class="push-option-title">Đẩy tin thường</div>
                <div class="push-option-desc">Lên đầu danh sách tin thường</div>
            </div>
        </label>

        <label class="push-option push-option-vip">
            <input type="radio" name="push_type" value="vip">
            <div class="push-option-content">
                <div class="push-option-title">Đẩy tin VIP</div>
                <div class="push-option-desc">Lên đầu danh sách tin VIP</div>
            </div>
        </label>
    </div>

    <div class="push-error" id="push-popup-error"></div>

    <input type="hidden" id="push-popup-post-id" value="">

    <div class="push-actions">
        <button type="button" class="btn-push-cancel close-push-popup">Huỷ</button>
        <button type="button" class="btn-push-confirm" id="push-popup-confirm-btn">Xác nhận đẩy tin</button>
    </div>
</section>