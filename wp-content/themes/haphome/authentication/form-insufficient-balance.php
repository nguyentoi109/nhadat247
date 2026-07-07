<section class="section-form-balance">
    <div class="balance-icon">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="1.5">
            <circle cx="12" cy="12" r="10"/>
            <line x1="12" y1="8" x2="12" y2="12"/>
            <line x1="12" y1="16" x2="12.01" y2="16"/>
        </svg>
    </div>

    <div class="balance-title">
        Số dư không đủ
    </div>

    <div class="balance-message" id="balance-popup-message">
        Số dư trong ví của bạn không đủ để thực hiện thao tác này. Vui lòng nạp thêm tiền để tiếp tục.
    </div>

    <div class="balance-actions">
        <button type="button" class="btn-balance-cancel close-balance-popup">Để sau</button>
        <a href="<?php echo esc_url(home_url('/quan-ly-tai-khoan/nap-tien/')); ?>" class="btn-balance-confirm">
            Nạp tiền ngay
        </a>
    </div>
</section>