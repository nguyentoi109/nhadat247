<section class="section-form-vip">
    <div class="vip-icon">
        <img src="<?php echo get_template_directory_uri() ?>/img/vip-crown.png" width="48" alt="VIP">
    </div>

    <div class="vip-title">
        Nâng cấp lên tin VIP
    </div>

    <div class="vip-message" id="vip-popup-message">
        Nâng cấp tin này lên VIP với giá <strong>150.000đ</strong> (hoặc dùng 1 lượt nâng cấp VIP nếu bạn có sẵn).<br>
        Thời hạn VIP: <strong>30 ngày</strong> kể từ hôm nay.
    </div>

    <div class="vip-error" id="vip-popup-error"></div>

    <input type="hidden" id="vip-popup-post-id" value="">

    <div class="vip-actions">
        <button type="button" class="btn-vip-cancel close-vip-popup">Huỷ</button>
        <button type="button" class="btn-vip-confirm" id="vip-popup-confirm-btn">Đồng ý nâng cấp</button>
    </div>
</section>