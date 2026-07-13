<style>
.section-form-downgrade {
    background: #fff;
    border-radius: 14px;
    padding: 28px;
    max-width: 380px;
    width: 100%;
    text-align: center;
    box-sizing: border-box;
}

.downgrade-icon {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    background: #fef3c7;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
}

.downgrade-title {
    font-size: 16px;
    font-weight: 700;
    color: var(--ql-text, #1e293b);
    margin-bottom: 8px;
}

.downgrade-desc {
    font-size: 13px;
    color: var(--ql-muted, #6b7280);
    line-height: 1.6;
    margin-bottom: 20px;
}

.downgrade-desc strong {
    color: var(--ql-text, #1e293b);
}

.downgrade-actions {
    display: flex;
    gap: 10px;
}

.btn-downgrade-close {
    flex: 1;
    padding: 11px;
    background: #6b7280;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-family: inherit;
    font-size: 13.5px;
    font-weight: 700;
    cursor: pointer;
    transition: background .15s, opacity .15s;
}

.btn-downgrade-close:hover {
    background: #52525b;
}
</style>

<?php
if (!defined('ABSPATH')) exit;
?>
<section class="section-form-downgrade">
    <div class="downgrade-icon">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#92400e" stroke-width="2">
            <path d="M12 9v4M12 17h.01" stroke-linecap="round"/>
            <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L14.71 3.86a2 2 0 00-3.42 0z" stroke-linejoin="round"/>
        </svg>
    </div>

    <div class="downgrade-title">Không thể đăng ký gói này</div>
    <div class="downgrade-desc">
        Bạn đang sử dụng <strong id="downgrade-popup-plan-name">gói hiện tại</strong>.
        Không thể đăng ký gói thấp hơn khi gói hiện tại chưa hết hạn.
        Bạn vẫn có thể nâng cấp lên gói cao hơn bất cứ lúc nào.
    </div>

    <div class="downgrade-actions">
        <button type="button" class="btn-downgrade-close close-downgrade-popup">Đã hiểu</button>
    </div>
</section>