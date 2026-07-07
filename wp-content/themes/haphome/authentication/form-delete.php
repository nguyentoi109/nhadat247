<section class="section-form-delete">
    <div class="delete-icon">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="1.5">
            <polyline points="3 6 5 6 21 6"/>
            <path d="M19 6l-1 14H6L5 6M10 11v6M14 11v6"/>
            <path d="M9 6V4h6v2"/>
        </svg>
    </div>

    <div class="delete-title">
        Xoá tin đăng
    </div>

    <div class="delete-message">
        Bạn có chắc muốn xoá tin đăng này? Hành động này <strong>không thể hoàn tác</strong>.
    </div>

    <div class="delete-error" id="delete-popup-error"></div>

    <input type="hidden" id="delete-popup-post-id" value="">

    <div class="delete-actions">
        <button type="button" class="btn-delete-cancel close-delete-popup">Huỷ</button>
        <button type="button" class="btn-delete-confirm" id="delete-popup-confirm-btn">Xoá tin</button>
    </div>
</section>