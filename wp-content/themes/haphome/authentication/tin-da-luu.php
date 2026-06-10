<style>
.ql-srp-nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 8px;
}
.ql-srp-total {
    font-size: 13px;
    color: var(--ql-muted);
}
.ql-srp-total strong { color: var(--ql-text); font-weight: 700; }

.ql-srp-sort {
    font-size: 12px;
    font-family: inherit;
    color: var(--ql-text);
    background: #fff;
    border: 1px solid var(--ql-border);
    border-radius: 4px;
    padding: 5px 28px 5px 10px;
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%23999'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 9px center;
}

.saved-item{
    display:flex;
    gap:20px;

    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:6px;

    padding:16px;
    margin-top: 15px;
}

.saved-thumb{
    width:230px;
    height:160px;
    flex-shrink:0;

    position:relative;
    overflow:hidden;
    border-radius:4px;
}

.saved-thumb img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.saved-photo-count{
    position:absolute;
    right:8px;
    bottom:8px;

    background:rgba(0,0,0,.6);
    color:#fff;

    padding:3px 8px;
    border-radius:4px;

    font-size:13px;
}

.saved-content{
    flex:1;
    display:flex;
    flex-direction:column;
}

.saved-title{
    margin:0;
    font-size:16px;
    font-weight:700;
    line-height:1.5;

    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
}

.saved-meta{
    margin-top:12px;

    display:flex;
    flex-wrap:wrap;
    gap:16px;

    font-size:15px;
    color:#4b5563;
}

.saved-price{
    color:#e03;
    font-size:28px;
    font-weight:700;
}

.saved-location{
    margin-top:12px;

    color:#4b5563;
    font-size:15px;
}

.saved-footer{
    margin-top:auto;

    display:flex;
    justify-content:space-between;
    align-items:center;
}

.saved-date{
    color:#9ca3af;
    font-size:14px;
}

.saved-favorite{
    width:34px;
    height:34px;

    border:1px solid #d1d5db;
    border-radius:6px;

    background:#fff;

    cursor:pointer;

    color:#e03;
    font-size:18px;
}

.saved-favorite:hover{
    background:#fff5f5;
}
.ql-srp-empty {
    text-align: center;
    padding: 60px 20px;
    color: #d1d5db;
}
.ql-srp-empty svg { margin-bottom: 16px; }
.ql-srp-empty-title { font-size: 15px; font-weight: 600; color: var(--ql-text); margin-bottom: 8px; }
.ql-srp-empty-desc  { font-size: 13px; color: var(--ql-muted); margin-bottom: 20px; }
.ql-srp-empty-btn {
    display: inline-block;
    background: #ee0033;
    color: #fff;
    font-size: 13px;
    font-weight: 600;
    padding: 9px 22px;
    border-radius: 4px;
    text-decoration: none;
    transition: opacity .15s;
}
.ql-srp-empty-btn:hover { opacity: .88; }

@media (max-width: 600px) {
    .ql-srp-card-img { width: 120px; height: 90px; }
    .ql-srp-card-title { font-size: 13px; }
    .ql-srp-price { font-size: 13px; }
}
</style>

<div class="ql-panel-header">
    <h2 class="ql-panel-title">Tin đăng đã lưu</h2>
</div>

<div class="ql-panel-body">

    <div class="ql-srp-nav">
        <span class="ql-srp-total">
            Tổng số <strong>3</strong> tin đăng
        </span>

        <div class="ql-srp-sort-wrap">
            <select class="ql-srp-sort">
                <option>Lưu mới nhất</option>
                <option>Giá thấp đến cao</option>
                <option>Giá cao đến thấp</option>
                <option>Diện tích bé đến lớn</option>
                <option>Diện tích lớn đến bé</option>
            </select>
        </div>
    </div>

      <div class="saved-item">
          <div class="saved-thumb">
              <img src="https://picsum.photos/400/300" alt="">

              <div class="saved-photo-count">
                  📷 4
              </div>
          </div>

          <div class="saved-content">

              <h3 class="saved-title">
                  HOT*11 tỷ* Nhà 3T x 54m² - KD hoặc mở VP đều tiện kề đường Phan Xích Long, Q. Phú Nhuận - HẺM 2 XE HƠI
              </h3>

              <div class="saved-meta">

                  <span class="saved-price">
                      11 tỷ
                  </span>

                  <span>54 m²</span>

                  <span>203,7 tr/m²</span>

                  <span>4 🛏</span>

                  <span>4 🛁</span>

              </div>

              <div class="saved-location">
                  📍 Hồ Chí Minh
              </div>

              <div class="saved-footer">

                  <span class="saved-date">
                      Đăng hôm nay
                  </span>

                  <button class="saved-favorite">
                      ❤
                  </button>

              </div>

          </div>
        </div>

        <div class="saved-item">
          <div class="saved-thumb">
              <img src="https://picsum.photos/400/300" alt="">

              <div class="saved-photo-count">
                  📷 4
              </div>
          </div>

          <div class="saved-content">

              <h3 class="saved-title">
                  HOT*11 tỷ* Nhà 3T x 54m² - KD hoặc mở VP đều tiện kề đường Phan Xích Long, Q. Phú Nhuận - HẺM 2 XE HƠI
              </h3>

              <div class="saved-meta">

                  <span class="saved-price">
                      11 tỷ
                  </span>

                  <span>54 m²</span>

                  <span>203,7 tr/m²</span>

                  <span>4 🛏</span>

                  <span>4 🛁</span>

              </div>

              <div class="saved-location">
                  📍 Hồ Chí Minh
              </div>

              <div class="saved-footer">

                  <span class="saved-date">
                      Đăng hôm nay
                  </span>

                  <button class="saved-favorite">
                      ❤
                  </button>

              </div>

          </div>
        </div>
</div>

<script>
function qlRemoveSaved(postId, btn) {
    if (!confirm('Bỏ lưu tin này?')) return;
    btn.disabled = true;
    btn.style.opacity = '.5';
    fetch('<?php echo esc_js(admin_url("admin-ajax.php")); ?>?action=ql_remove_saved&post_id=' + postId + '&_nonce=<?php echo wp_create_nonce("ql_saved_nonce"); ?>')
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                const card = document.getElementById('ql-card-' + postId);
                if (card) {
                    card.style.transition = 'opacity .25s, max-height .3s';
                    card.style.opacity = '0';
                    card.style.maxHeight = card.offsetHeight + 'px';
                    setTimeout(() => {
                        card.style.maxHeight = '0';
                        card.style.overflow = 'hidden';
                        setTimeout(() => {
                            card.remove();
                            const remaining = document.querySelectorAll('.ql-srp-card').length;
                            const totalEl = document.querySelector('.ql-srp-total strong');
                            if (totalEl) totalEl.textContent = remaining;
                            if (remaining === 0) {
                                document.getElementById('ql-srp-list').innerHTML =
                                    '<div style="padding:40px;text-align:center;color:var(--ql-muted);font-size:13px;">Bạn chưa lưu tin nào.</div>';
                            }
                        }, 300);
                    }, 250);
                }
            } else {
                btn.disabled = false;
                btn.style.opacity = '1';
            }
        })
        .catch(() => { btn.disabled = false; btn.style.opacity = '1'; });
}
</script>