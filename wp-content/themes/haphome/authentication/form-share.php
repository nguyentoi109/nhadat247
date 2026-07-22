<section class="section-form-share">
    <div class="vip-icon share-icon-wrap">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/>
            <path d="M8.59 13.51l6.83 3.98M15.41 6.51l-6.82 3.98" stroke-linecap="round"/>
        </svg>
    </div>

    <div class="vip-title">Chia sẻ tin đăng</div>

    <div class="share-channels">
        <a href="#" id="share-fb-btn" target="_blank" rel="noopener" class="share-channel-btn share-fb">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15h-2.4v-3H10V9.8c0-2.37 1.41-3.68 3.58-3.68 1.04 0 2.12.19 2.12.19v2.32h-1.19c-1.18 0-1.55.73-1.55 1.48V12H15.6l-.42 3H12.96v6.8C17.56 20.87 22 16.84 22 12z"/></svg>
            Facebook
        </a>
        <a href="#" id="share-zalo-btn" target="_blank" rel="noopener" class="share-channel-btn share-zalo">
            <img src="<?php echo get_template_directory_uri(); ?>/img/zalo.jpg" alt="Zalo" width = 20>
            <span class="share-zalo-icon">Zalo</span>
        </a>
        <button type="button" id="share-copy-btn" class="share-channel-btn share-copy">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/>
            </svg>
            Sao chép link
        </button>
    </div>

    <div class="share-link-box">
        <span id="share-popup-link-text"></span>
    </div>

    <input type="hidden" id="share-popup-url" value="">

    <div class="vip-actions">
        <button type="button" class="btn-vip-cancel close-share-popup">Đóng</button>
    </div>
</section>