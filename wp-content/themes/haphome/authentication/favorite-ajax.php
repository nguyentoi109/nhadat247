<?php
if (!defined('ABSPATH')) exit;

add_action('wp_ajax_bds_toggle_favorite',        'bds_ajax_toggle_favorite');
add_action('wp_ajax_nopriv_bds_toggle_favorite', 'bds_ajax_toggle_favorite');
function bds_ajax_toggle_favorite() {
    if (!check_ajax_referer('bds_fav_nonce', '_nonce', false)) {
        wp_send_json_error(['message' => 'Yêu cầu không hợp lệ.'], 403);
    }
    $custom_user = get_current_custom_user();
    if (!$custom_user) {
        wp_send_json_error([ 'message' => 'Bạn cần đăng nhập để lưu tin.','require_login'=> true,'login_url' => home_url('/'),], 401);
    }

    $user_id = (int) $custom_user->id;
    $post_id = (int) ($_POST['post_id'] ?? 0);
    $folder  = sanitize_text_field($_POST['folder'] ?? 'Mặc định');

    if (!$post_id || !get_post($post_id)) {
        wp_send_json_error(['message' => 'Tin đăng không tồn tại.']);
    }

    $result = toggle_favorite($user_id, $post_id, $folder);
    if (!$result['success']) {
        wp_send_json_error(['message' => $result['message']]);
    }
    wp_send_json_success(['action'  => $result['action'],'message' => $result['message'],'count'   => count_favorites($user_id),]);
}

add_action('wp_ajax_bds_get_favorites', 'bds_ajax_get_favorites');

function bds_ajax_get_favorites() {
    if (!check_ajax_referer('bds_fav_nonce', '_nonce', false)) {
        wp_send_json_error(['message' => 'Yêu cầu không hợp lệ.'], 403);
    }

    $custom_user = get_current_custom_user();
    if (!$custom_user) {
        wp_send_json_error(['message' => 'Chưa đăng nhập.'], 401);
    }

    $user_id  = (int) $custom_user->id;
    $folder   = sanitize_text_field($_POST['folder'] ?? '');
    $page     = max(1, (int) ($_POST['page'] ?? 1));
    $per_page = 12;

    $result = get_favorites($user_id, $folder, $per_page, $page);
    wp_send_json_success($result);
}

add_action('wp_ajax_bds_bulk_remove_favorites', 'bds_ajax_bulk_remove_favorites');
function bds_ajax_bulk_remove_favorites() {
    if (!check_ajax_referer('bds_fav_nonce', '_nonce', false)) {
        wp_send_json_error(['message' => 'Yêu cầu không hợp lệ.'], 403);
    }

    $custom_user = get_current_custom_user();
    if (!$custom_user) {
        wp_send_json_error(['message' => 'Chưa đăng nhập.'], 401);
    }

    $user_id  = (int) $custom_user->id;
    $post_ids = array_map('intval', (array) ($_POST['post_ids'] ?? []));
    $post_ids = array_filter($post_ids);

    if (empty($post_ids)) {
        wp_send_json_error(['message' => 'Không có tin nào được chọn.']);
    }

    global $wpdb;
    $placeholders = implode(',', array_fill(0, count($post_ids), '%d'));
    $args = array_merge([$user_id], $post_ids);
    $deleted = $wpdb->query($wpdb->prepare("DELETE FROM {$wpdb->prefix}custom_favorites WHERE user_id = %d AND post_id IN ($placeholders)",...$args));

    wp_send_json_success(['deleted' => (int) $deleted,'message' => "Đã bỏ lưu $deleted tin.",'count'   => count_favorites($user_id),]);
}

add_action('wp_footer', 'bds_inject_fav_nonce');
function bds_inject_fav_nonce() {
    $custom_user    = get_current_custom_user();
    $is_logged_in   = !empty($custom_user);
    ?>
    <script>
    window.BDS_FAV = {
        ajaxUrl  : '<?php echo esc_js(admin_url("admin-ajax.php")); ?>',
        nonce    : '<?php echo wp_create_nonce("bds_fav_nonce"); ?>',
        loggedIn : <?php echo $is_logged_in ? 'true' : 'false'; ?>,
        loginUrl : '<?php echo esc_js(home_url("/dang-nhap/")); ?>',
    };
    </script>
    <?php
}

add_action('wp_footer', 'bds_fav_js', 20);
function bds_fav_js() {
    ?>
    <script>
    function bdsToast(msg, duration) {
        duration = duration || 2200;
        var el = document.getElementById('bds-toast-global');
        if (!el) {
            el = document.createElement('div');
            el.id = 'bds-toast-global';
            el.className = 'bds-toast';
            document.body.appendChild(el);
        }
        el.textContent = msg;
        el.classList.add('show');
        clearTimeout(el._timer);
        el._timer = setTimeout(function () { el.classList.remove('show'); }, duration);
    }

    function favToggle(btn, event) {
        event.preventDefault();
        event.stopPropagation();

        if (!window.BDS_FAV || !window.BDS_FAV.loggedIn) {
            bdsToast('Vui lòng đăng nhập để lưu tin 💛');
            setTimeout(function () {
                window.location.href = window.BDS_FAV
                    ? window.BDS_FAV.loginUrl
                    : '/dang-nhap/';
            }, 1000);
            return;
        }

        var postId = btn.dataset.post;
        if (!postId) return;

        btn.classList.add('pop');
        btn.addEventListener('animationend', function () {
            btn.classList.remove('pop');
        }, { once: true });

        btn.disabled = true;

        fetch(window.BDS_FAV.ajaxUrl, {
            method : 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body   : 'action=bds_toggle_favorite'
                   + '&post_id=' + encodeURIComponent(postId)
                   + '&_nonce='  + encodeURIComponent(window.BDS_FAV.nonce),
        })
        .then(function (r) { return r.json(); })
        .then(function (data) {
            btn.disabled = false;

            if (!data.success) {
                if (data.data && data.data.require_login) {
                    bdsToast(data.data.message || 'Vui lòng đăng nhập.');
                    return;
                }
                bdsToast((data.data && data.data.message) || 'Có lỗi xảy ra.');
                return;
            }

            var action = data.data.action;
            if (action === 'added') {
                btn.classList.add('is-saved');
                bdsToast('❤️ Đã lưu tin vào danh sách yêu thích');
            } else {
                btn.classList.remove('is-saved');
                bdsToast('🤍 Đã bỏ lưu tin');
                var card = btn.closest('.fav-card, [data-fav-post]');
                if (card && document.body.classList.contains('page-tin-da-luu')) {
                    card.style.transition = 'opacity .3s, transform .3s';
                    card.style.opacity    = '0';
                    card.style.transform  = 'scale(.95)';
                    setTimeout(function () { card.remove(); }, 320);
                }
            }

            var badge = document.querySelector('.fav-count-badge');
            if (badge && data.data.count !== undefined) {
                badge.textContent = data.data.count;
                badge.style.display = data.data.count > 0 ? 'flex' : 'none';
            }
        })
        .catch(function () {
            btn.disabled = false;
            bdsToast('Lỗi kết nối. Vui lòng thử lại.');
        });
    }
    </script>
    <?php
}