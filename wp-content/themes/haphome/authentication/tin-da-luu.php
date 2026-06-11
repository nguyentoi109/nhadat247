<style>
.ql-srp-nav {
	display: flex;
	align-items: center;
	justify-content: space-between;
	flex-wrap: wrap;
	gap: 8px;
	margin-top: 20px;
}

.ql-srp-total {
	font-family: "Roboto-Regular";
    font-size: 14px;
    line-height: 20px;
    font-weight: normal;
    color: #2c2c2c;
}

.ql-srp-total strong {
	color: var(--ql-text);
	font-weight: 700;
}

.ql-srp-sort {
    width: 264px;
    height: 30px;
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

.ql-srp-sort:hover{
    border: 1px solid #2c2c2c;
}

.saved-item {
	display: flex;
	gap: 20px;
	background: #fff;
	border: 1px solid #e5e7eb;
	border-radius: 6px;
	padding: 16px;
	margin-top: 10px;
}

.saved-thumb {
	width: 230px;
	height: 160px;
	flex-shrink: 0;

	position: relative;
	overflow: hidden;
	border-radius: 4px;
}

.saved-thumb img {
	width: 100%;
	height: 100%;
	object-fit: cover;
}

.saved-photo-count {
	position: absolute;
	right: 8px;
	bottom: 8px;
	background: rgba(0, 0, 0, .6);
	color: #fff;
	padding: 3px 8px;
	border-radius: 4px;
	font-size: 13px;
}

.saved-content {
	flex: 1;
	display: flex;
	flex-direction: column;
}

.saved-title {
    font-family: "Lexend";
	margin: 0;
	font-size: 14px;
	font-weight: normal;
	line-height: 20px;
    color: #2c2c2c;
    letter-spacing: -0.2;
	display: -webkit-box;
	-webkit-line-clamp: 2;
	-webkit-box-orient: vertical;
	overflow: hidden;
}

.saved-meta {
    font-family: "Roboto";
    margin-top: 10px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 6px 10px;
    font-size: 16px;
    color: #4b5563;
}

.saved-price {
    color: #ffa600;
    font-size: 16px;
    font-weight: 500;
}

.saved-area {
    font-size: 14px;
    color: #ffa600;
    font-weight: 500;
}

.saved-ppm2 {
    font-size: 13px;
    color: #9ca3af;
}

.saved-spec {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 13px;
    color: #4b5563;
}

.saved-spec i {
    font-size: 15px;
    opacity: 0.7;
}

.saved-location {
    font-family: "Roboto-Regular";
    line-height: 20px;
	margin-top: 12px;
	color: #505050;
	font-size: 14px;
}

.saved-footer {
	margin-top: auto;
	display: flex;
	justify-content: space-between;
	align-items: center;
}

.saved-date {
    font-family: "Roboto-Regular";
	color: #999999;
	font-size: 12px;
    line-height: 16px;
    font-weight: normal;
}

.saved-favorite {
	width: 34px;
	height: 34px;
	border: 1px solid #d1d5db;
	border-radius: 6px;
	background: #fff;
	cursor: pointer;
	color: #e03;
	font-size: 18px;
    padding: 2px 2px 0px 0px;
}

.saved-favorite:hover {
	background: #fff5f5;
}

.ql-srp-empty {
	text-align: center;
	padding: 60px 20px;
	color: #d1d5db;
}

.ql-srp-empty svg {
	margin-bottom: 16px;
}

.ql-srp-empty-title {
	font-size: 15px;
	font-weight: 600;
	color: var(--ql-text);
	margin-bottom: 8px;
}

.ql-srp-empty-desc {
	font-size: 13px;
	color: var(--ql-muted);
	margin-bottom: 20px;
}

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

.ql-srp-empty-btn:hover {
	opacity: .88;
}

#saved-toast {
	position: fixed;
	bottom: 28px;
	left: 50%;
	transform: translateX(-50%) translateY(16px);
	background: #1e293b;
	color: #fff;
	font-size: 13px;
	font-weight: 500;
	padding: 10px 20px;
	border-radius: 8px;
	box-shadow: 0 4px 16px rgba(0, 0, 0, .18);
	z-index: 99999;
	white-space: nowrap;
	opacity: 0;
	pointer-events: none;
	transition: opacity .22s, transform .22s;
}

#saved-toast.show {
	opacity: 1;
	transform: translateX(-50%) translateY(0);
}

@media (max-width: 600px) {
	.ql-srp-card-img {
		width: 120px;
		height: 90px;
	}

	.ql-srp-card-title {
		font-size: 13px;
	}

	.ql-srp-price {
		font-size: 13px;
	}
}
</style>

<?php
    if (!defined('ABSPATH')) exit;
    
    $custom_user = get_current_custom_user();
    if (!$custom_user) {
        echo '<div class="ql-panel-body"><p>Vui lòng <a href="' . esc_url(home_url('/dang-nhap/')) . '">đăng nhập</a>.</p></div>';
        return;
    }
    
    $user_id  = (int) $custom_user->id;
    $per_page = 12;
    $page     = max(1, (int)($_GET['fav_page'] ?? 1));
    $sort     = sanitize_text_field($_GET['fav_sort'] ?? 'newest');
    $result      = get_favorites($user_id, '', $per_page, $page);
    $items       = $result['items'];
    $total       = $result['total'];
    $total_pages = $result['pages'];
    
    function fav_page_url($p) {
        return add_query_arg(array_merge($_GET, ['fav_page' => $p, 'tab' => 'tin-da-luu']), get_permalink());
    }
    
    function fmt_price($price) {
        if (!$price) return '';
        $n = (float) preg_replace('/[^0-9.]/', '', $price);
        if ($n >= 1_000_000_000) return rtrim(rtrim(number_format($n/1_000_000_000,1),'0'),'.') . ' tỷ';
        if ($n >= 1_000_000)     return rtrim(rtrim(number_format($n/1_000_000,1),'0'),'.') . ' triệu';
        return number_format($n,0,',','.') . ' ₫';
    }
?>

<div class="ql-panel-header">
    <h2 class="ql-panel-title">Tin đăng đã lưu</h2>
</div>
 <div class="ql-srp-nav">
    <span class="ql-srp-total">
        Tổng số <strong id="saved-total"><?php echo $total; ?></strong> tin đăng
    </span>
    <div class="ql-srp-sort-wrap">
        <select class="ql-srp-sort" onchange="savedSort(this.value)">
            <option value="newest"     <?php selected($sort,'newest');     ?>>Lưu mới nhất</option>
            <option value="oldest"     <?php selected($sort,'oldest');     ?>>Lưu cũ nhất</option>
            <option value="price_asc"  <?php selected($sort,'price_asc');  ?>>Giá thấp đến cao</option>
            <option value="price_desc" <?php selected($sort,'price_desc'); ?>>Giá cao đến thấp</option>
        </select>
    </div>
</div>
 
<div class="saved-list" id="saved-list">
<?php if (empty($items)): ?>
    <div class="saved-empty">
        <div class="saved-empty-icon">🏠</div>
        <div class="saved-empty-title">Chưa có tin nào được lưu</div>
        <div class="saved-empty-desc">Nhấn vào biểu tượng ❤ trên bất kỳ tin đăng nào để lưu vào đây.</div>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="saved-empty-btn">Khám phá tin đăng →</a>
    </div>
<?php else: ?>
    <?php foreach ($items as $item):
        $pid = (int) $item->post_id;
        $permalink = $item->permalink ?: get_permalink($pid);
        $title = $item->post_title ?: 'Tin #' . $pid;
        $price = fmt_price($item->price);
        $area = $item->area ? $item->area . ' m²' : '';
        $address = $item->address ?: '';
        $thumb = $item->thumbnail;
        $date = human_time_diff(strtotime($item->created_at), current_time('timestamp')) . ' trước';
        $photos  = get_post_meta($pid, 'prefix-photos', true);
        $photo_count = is_array($photos) ? count($photos) : 0;
        $bedroom = get_post_meta($pid, 'prefix-bedroom', true);
        $bathroom = get_post_meta($pid, 'prefix-bathroom', true);
    ?>
    <div class="saved-item" id="saved-item-<?php echo $pid; ?>">
         <div class="saved-thumb">
            <a href="<?php echo esc_url($permalink); ?>" target="_blank">
                <?php if ($thumb): ?>
                    <img src="<?php echo esc_url($thumb); ?>"
                         alt="<?php echo esc_attr($title); ?>"
                         loading="lazy">
                <?php else: ?>
                    <div class="saved-thumb-placeholder">
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                            <rect x="3" y="3" width="18" height="18" rx="2"/>
                            <circle cx="8.5" cy="8.5" r="1.5"/>
                            <path d="M21 15l-5-5L5 21"/>
                        </svg>
                    </div>
                <?php endif; ?>
            </a>
            <?php if ($photo_count > 0): ?>
            <div class="saved-photo-count">📷 <?php echo $photo_count; ?></div>
            <?php endif; ?>
        </div>
 
        <div class="saved-content">
            <a href="<?php echo esc_url($permalink); ?>" target="_blank"
               class="saved-title"><?php echo esc_html($title); ?>
            </a>
 
           <div class="saved-meta">
                <?php if ($price): ?>
                    <span class="saved-price"><?php echo esc_html($price); ?></span>
                <?php endif; ?>
                <?php if ($area): ?>
                    <span class="saved-area"><?php echo esc_html($area); ?></span>
                <?php endif; ?>
                <?php if ($bedroom): ?>
                    <span class="saved-spec">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/bedroom.png" width="20">
                        <?php
                            if ($bedroom == 6) echo 'Studio';
                            elseif ($bedroom == 7) echo '1+';
                            elseif ($bedroom == 8) echo '2+';
                            else echo $bedroom;
                        ?>
                    </span>
                <?php endif; ?>
                <?php if ($bathroom): ?>
                    <span class="saved-spec">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/bathroom.png" width="17">
                        <?php echo $bathroom; ?>
                    </span>
                <?php endif; ?>
            </div>
 
            <?php if ($address): ?>
            <div class="saved-location">
                <img src="<?php echo get_template_directory_uri(); ?>/img/location.png" width="13"> <?php echo esc_html($address); ?>
            </div>
            <?php endif; ?>
 
            <div class="saved-footer">
                <span class="saved-date">Đã lưu <?php echo esc_html($date); ?></span>
                <button class="saved-favorite"
                        title="Bỏ lưu tin này"
                        onclick="savedRemove(<?php echo $pid; ?>, this)">
                    <svg width="15" height="15" viewBox="0 0 24 24"
                         fill="#ee0033" stroke="#ee0033" stroke-width="1.5">
                        <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/>
                    </svg>
                </button>
            </div>
 
        </div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>
<?php if ($total_pages > 1): ?>
<div class="saved-pagination">
    <a href="<?php echo esc_url(fav_page_url($page-1)); ?>"
       class="saved-page-btn <?php echo $page<=1?'disabled':''; ?>">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <path d="M15 18l-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>
    <?php for ($i=1;$i<=$total_pages;$i++): ?>
    <a href="<?php echo esc_url(fav_page_url($i)); ?>"
       class="saved-page-btn <?php echo $i===$page?'active':''; ?>">
        <?php echo $i; ?>
    </a>
    <?php endfor; ?>
    <a href="<?php echo esc_url(fav_page_url($page+1)); ?>"
       class="saved-page-btn <?php echo $page>=$total_pages?'disabled':''; ?>">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <path d="M9 18l6-6-6-6" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>
</div>
<?php endif; ?>
 
<div id="saved-toast"></div>
 
<script>
var SAVED_AJAX  = '<?php echo esc_js(admin_url("admin-ajax.php")); ?>';
var SAVED_NONCE = '<?php echo wp_create_nonce("bds_fav_nonce"); ?>';
 
function savedToast(msg, duration) {
    duration = duration || 2200;
    var el = document.getElementById('saved-toast');
    if (!el) return;
    el.textContent = msg;
    el.classList.add('show');
    clearTimeout(el._t);
    el._t = setTimeout(function(){ el.classList.remove('show'); }, duration);
}
 
function savedRemove(postId, btn) {
    btn.classList.add('loading');
    fetch(SAVED_AJAX, {
        method : 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body   : 'action=bds_toggle_favorite'
               + '&post_id=' + encodeURIComponent(postId)
               + '&_nonce='  + encodeURIComponent(SAVED_NONCE),
    })
    .then(function(r){ return r.json(); })
    .then(function(data){
        if (data.success && data.data.action === 'removed') {
            var item = document.getElementById('saved-item-' + postId);
            if (item) {
                item.classList.add('removing');
                setTimeout(function(){
                    var h = item.offsetHeight;
                    item.style.maxHeight  = h + 'px';
                    item.style.overflow   = 'hidden';
                    item.style.transition = 'max-height .28s ease, margin .28s, padding .28s';
                    requestAnimationFrame(function(){ 
                        item.style.maxHeight   = '0';
                        item.style.marginBottom = '0';
                    });
                    setTimeout(function(){
                        item.remove();
                        var el = document.getElementById('saved-total');
                        if (el) el.textContent = Math.max(0, parseInt(el.textContent) - 1);
                        var list = document.getElementById('saved-list');
                        if (list && !list.querySelector('.saved-item')) {
                            list.innerHTML =
                                '<div class="saved-empty">'
                              + '<div class="saved-empty-icon">🏠</div>'
                              + '<div class="saved-empty-title">Chưa có tin nào được lưu</div>'
                              + '<div class="saved-empty-desc">Nhấn vào biểu tượng ❤ trên bất kỳ tin đăng nào để lưu vào đây.</div>'
                              + '<a href="/" class="saved-empty-btn">Khám phá tin đăng →</a>'
                              + '</div>';
                        }
                    }, 290);
                }, 230);
            }
            if (window.BDS_FAV) {
                var badge = document.querySelector('.fav-count-badge');
                if (badge && data.data.count !== undefined) {
                    badge.textContent  = data.data.count;
                    badge.style.display = data.data.count > 0 ? 'flex' : 'none';
                }
            }
            savedToast('🤍 Đã bỏ lưu tin');
        } else {
            btn.classList.remove('loading');
            savedToast((data.data && data.data.message) || 'Có lỗi xảy ra.');
        }
    })
    .catch(function(){
        btn.classList.remove('loading');
        savedToast('Lỗi kết nối. Vui lòng thử lại.');
    });
}
 
function savedSort(val) {
    var url = new URL(window.location.href);
    url.searchParams.set('fav_sort', val);
    url.searchParams.set('fav_page', '1');
 
    if (val === 'price_asc' || val === 'price_desc') {
        var items = Array.from(document.querySelectorAll('.saved-item'));
        items.sort(function(a, b){
            var pa = parseFloat((a.querySelector('.saved-price')?.textContent || '0').replace(/[^0-9.,]/g,'').replace(',','.')) || 0;
            var pb = parseFloat((b.querySelector('.saved-price')?.textContent || '0').replace(/[^0-9.,]/g,'').replace(',','.')) || 0;
            return val === 'price_asc' ? pa - pb : pb - pa;
        });
        var list = document.getElementById('saved-list');
        items.forEach(function(i){ list.appendChild(i); });
    } else {
        window.location.href = url.toString();
    }
}
</script>