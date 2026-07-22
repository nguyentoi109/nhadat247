// UPGRADE VIP POPUP, DELETE, PUSH
jQuery(function ($) {
    function openPopup($scope) {
        $scope.find('.qlp-box').addClass('show');
        $scope.find('.qlp-mask').addClass('show');
        $('body').addClass('qlp-open');
    }

    function closePopup($scope) {
        $scope.find('.qlp-box').removeClass('show');
        $scope.find('.qlp-mask').removeClass('show');
        $('body').removeClass('qlp-open');
    }

    window.qltToast = window.qltToast || function (msg) {
        let t = document.getElementById('qlt-toast');
        if (!t) {
            t = document.createElement('div');
            t.id = 'qlt-toast';
            t.style.cssText = 'position:fixed;bottom:28px;left:50%;transform:translateX(-50%) translateY(20px);background:#0d1011;color:#fff;padding:10px 20px;border-radius:8px;font-size:13px;font-weight:600;z-index:99999;opacity:0;transition:all .25s;pointer-events:none;white-space:nowrap;';
            document.body.appendChild(t);
        }
        t.textContent = msg;
        t.style.opacity = '1';
        t.style.transform = 'translateX(-50%) translateY(0)';
        clearTimeout(t._timer);
        t._timer = setTimeout(() => {
            t.style.opacity = '0';
            t.style.transform = 'translateX(-50%) translateY(20px)';
        }, 2500);
    };

    function qltEnsureLoadingOverlay() {
        let $ov = $('#qlt-loading-overlay');
        if ($ov.length) return $ov;

        $('<style id="qlt-loading-style">')
            .text(` 
                #qlt-loading-overlay {
                    position: fixed;
                    inset: 0;
                    z-index: 999999;
                    display: none;
                    align-items: center;
                    justify-content: center;
                    background: rgba(17,17,17,0.35);
                }
                #qlt-loading-overlay.show { display: flex; }
                #qlt-loading-overlay .qlt-dots-spinner {
                    position: relative;
                    width: 46px;
                    height: 46px;
                    animation: qlt-spin 1.1s linear infinite;
                }
                #qlt-loading-overlay .qlt-dots-spinner span {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    width: 7px;
                    height: 7px;
                    border-radius: 50%;
                    background: #6b7280;
                    transform-origin: 0 0;
                }
                @keyframes qlt-spin {
                    to { transform: rotate(360deg); }
                }
            `)
            .appendTo('head');

        const dotCount = 8;
        let dotsHtml = '';
        for (let i = 0; i < dotCount; i++) {
            const angle = (360 / dotCount) * i;
            const radius = 18;
            const opacity = 1 - (i / dotCount) * 0.85;
            const x = Math.cos((angle * Math.PI) / 180) * radius;
            const y = Math.sin((angle * Math.PI) / 180) * radius;
            dotsHtml += `<span style="transform:translate(${x}px,${y}px);opacity:${opacity.toFixed(2)}"></span>`;
        }

        $ov = $(`
            <div id="qlt-loading-overlay">
                <div class="qlt-dots-spinner">${dotsHtml}</div>
            </div>
        `).appendTo('body');

        return $ov;
    }

    window.qltEnsureLoadingOverlay = qltEnsureLoadingOverlay;

    window.qltShowLoading = function () {
        qltEnsureLoadingOverlay().addClass('show');
    };

    window.qltHideLoading = function () {
        qltEnsureLoadingOverlay().removeClass('show');
    };

    window.qltFinishLoading = function (startedAt, callback, minDelay) {
        const elapsed = Date.now() - startedAt;
        const remaining = Math.max((minDelay || 1000) - elapsed, 0);
        setTimeout(callback, remaining);
    };

    $('.vip-popup .qlp-mask, .close-vip-popup').on('click', function () {
        closePopup($('.vip-popup'));
    });
    $('.delete-popup .qlp-mask, .close-delete-popup').on('click', function () {
        closePopup($('.delete-popup'));
    });
    $('.push-popup .qlp-mask, .close-push-popup').on('click', function () {
        closePopup($('.push-popup'));
    });
    $('.repost-popup .qlp-mask, .close-repost-popup').on('click', function () {
        closePopup($('.repost-popup'));
    });
    $('.balance-popup .qlp-mask, .close-balance-popup').on('click', function () {
        closePopup($('.balance-popup'));
    });
    window.qltOpenBalancePopup = function (customMessage) {
        if (customMessage) {
            $('#balance-popup-message').text(customMessage);
        }
        openPopup($('.balance-popup'));
    };

    window.qltUpgradeVip = function (postId) {
        $('#vip-popup-post-id').val(postId);
        $('.vip-popup .vip-error').removeClass('show').text('');
        openPopup($('.vip-popup'));
    };

    $('#vip-popup-confirm-btn').on('click', function () {
        const postId = $('#vip-popup-post-id').val();
        const $btn = $(this);
        const $err = $('.vip-popup .vip-error');

        $btn.prop('disabled', true).text('Đang xử lý...');
        $err.removeClass('show').text('');
        const startedAt = Date.now();
        qltShowLoading(); 

        $.post(qlt_ajax.ajax_url, {
            action: 'ql_upgrade_vip',
            post_id: postId,
            _nonce: qlt_ajax.nonce
        }).done(function (data) {
            $btn.prop('disabled', false).text('Đồng ý nâng cấp');

            if (data.success) {
                qltFinishLoading(startedAt, function () {
                    closePopup($('.vip-popup'));
                    qltToast('Nâng cấp VIP thành công!');
                    window.location.reload();
                });
            } else if (data.data?.insufficient_balance) {
                qltHideLoading(); 
                closePopup($('.vip-popup'));
                qltOpenBalancePopup('Số dư không đủ để nâng cấp VIP (cần 150.000đ). Vui lòng nạp thêm tiền.');
            } else {
                qltHideLoading();
                $err.addClass('show').text(data.data?.message || 'Có lỗi xảy ra khi nâng cấp VIP.');
            }
        }).fail(function () {
            qltHideLoading(); 
            $btn.prop('disabled', false).text('Đồng ý nâng cấp');
            $err.addClass('show').text('Không thể kết nối máy chủ, vui lòng thử lại.');
        });
    });


    window.qltDelete = function (postId) {
        document.getElementById('qlt-portal')?.classList.remove('open');
        $('#delete-popup-post-id').val(postId);
        $('.delete-popup .delete-error').removeClass('show').text('');
        openPopup($('.delete-popup'));
    };

    $('#delete-popup-confirm-btn').on('click', function () {
        const postId = $('#delete-popup-post-id').val();
        const $btn = $(this);
        const $err = $('.delete-popup .delete-error');
        $btn.prop('disabled', true).text('Đang xoá...');
        $err.removeClass('show').text('');
        const startedAt = Date.now();
        qltShowLoading();

        $.post(qlt_ajax.ajax_url, {
            action: 'ql_delete_listing',
            post_id: postId,
            _nonce: qlt_ajax.nonce
        }).done(function (data) {
            $btn.prop('disabled', false).text('Xoá tin');

            if (data.success) {
                qltFinishLoading(startedAt, function () {
                    closePopup($('.delete-popup'));
                    qltToast('Đã xoá tin đăng thành công!');
                    window.location.reload();
                });
            } else {
                qltHideLoading();
                $err.addClass('show').text(data.data?.message || 'Có lỗi xảy ra.');
            }
        }).fail(function () {
            qltHideLoading();
            $btn.prop('disabled', false).text('Xoá tin');
            $err.addClass('show').text('Không thể kết nối máy chủ, vui lòng thử lại.');
        });
    });
    window.qltPush = function (postId) {
        const card = document.getElementById('qlt-card-' + postId);
        const moreBtn = card ? card.querySelector('.qlt-more-btn') : null;
        const isVip = moreBtn && moreBtn.dataset.vip && moreBtn.dataset.vip !== '';

        $('#push-popup-post-id').val(postId);
        $('.push-popup .push-error').removeClass('show').text('');
        $('#push-popup-message').text(
            isVip
                ? 'Đẩy tin VIP này lên đầu danh sách tin VIP. Xác nhận để tiếp tục.'
                : 'Đẩy tin thường này lên đầu danh sách tin thường. Xác nhận để tiếp tục.'
        );
        openPopup($('.push-popup'));
    };
    $('#push-popup-confirm-btn').on('click', function () {
        const postId = $('#push-popup-post-id').val();
        const $btn = $(this);
        const $err = $('.push-popup .push-error');
        $btn.prop('disabled', true).text('Đang xử lý...');
        $err.removeClass('show').text('');
        const startedAt = Date.now();
        qltShowLoading();

        $.post(qlt_ajax.ajax_url, {
            action: 'ql_push_listing',
            post_id: postId,
            _nonce: qlt_ajax.nonce
        }).done(function (data) {
            $btn.prop('disabled', false).text('Xác nhận đẩy tin');
            if (data.success) {
                qltFinishLoading(startedAt, function () {
                    closePopup($('.push-popup'));
                    qltToast('Đẩy tin thành công!');
                    window.location.reload();
                });
            } else if (data.data?.insufficient_balance) {
                qltHideLoading();
                closePopup($('.push-popup'));
                qltOpenBalancePopup('Số dư không đủ để đẩy tin. Vui lòng nạp thêm tiền.');
            } else {
                qltHideLoading();
                $err.addClass('show').text(data.data?.message || 'Có lỗi xảy ra khi đẩy tin.');
            }
        }).fail(function () {
            qltHideLoading();
            $btn.prop('disabled', false).text('Xác nhận đẩy tin');
            $err.addClass('show').text('Không thể kết nối máy chủ, vui lòng thử lại.');
        });
    });

    window.qltRepost = function (postId) {
        document.getElementById('qlt-portal')?.classList.remove('open');
        $('#repost-popup-post-id').val(postId);
        $('.repost-popup .repost-error').removeClass('show').text('');
        openPopup($('.repost-popup'));
    };

    $('#repost-popup-confirm-btn').on('click', function () {
        const postId = $('#repost-popup-post-id').val();
        const $btn = $(this);
        const $err = $('.repost-popup .repost-error');

        $btn.prop('disabled', true).text('Đang xử lý...');
        $err.removeClass('show').text('');
        const startedAt = Date.now();
        qltShowLoading();

        $.post(qlt_ajax.ajax_url, {
            action: 'ql_repost_listing',
            post_id: postId,
            _nonce: qlt_ajax.nonce
        }).done(function (data) {
            $btn.prop('disabled', false).text('Đồng ý, đăng lại');

            if (data.success) {
                qltFinishLoading(startedAt, function () {
                    closePopup($('.repost-popup'));
                    qltToast('Đăng lại tin thành công!');
                    window.location.reload();
                });
            } else if (data.data?.insufficient_balance) {
                qltHideLoading();
                closePopup($('.repost-popup'));
                qltOpenBalancePopup('Số dư không đủ để đăng lại tin (cần 150.000đ). Vui lòng nạp thêm tiền.');
            } else {
                qltHideLoading();
                $err.addClass('show').text(data.data?.message || 'Có lỗi xảy ra.');
            }
        }).fail(function () {
            qltHideLoading();
            $btn.prop('disabled', false).text('Đồng ý, đăng lại');
            $err.addClass('show').text('Không thể kết nối máy chủ, vui lòng thử lại.');
        });
    });

    $('.history-popup .qlp-mask, .close-history-popup').on('click', function () {
        closePopup($('.history-popup'));
    });
    window.qltViewHistory = function (postId) {
        document.getElementById('qlt-portal')?.classList.remove('open');
        $('#history-popup-post-id').val(postId);
        $('.history-popup .history-error').removeClass('show').text('');
        $('#history-popup-list').html('<div class="history-loading">Đang tải...</div>');
        openPopup($('.history-popup'));

        const icons = {
            created: '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>',
            vip:     '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" stroke-linecap="round"/></svg>',
            repost:  '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 4v6h6M23 20v-6h-6"/><path d="M20.49 9A9 9 0 005.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 013.51 15" stroke-linecap="round"/></svg>',
        };

        $.post(qlt_ajax.ajax_url, {
            action: 'ql_get_post_history',
            post_id: postId,
            _nonce: qlt_ajax.nonce
        }).done(function (data) {
            const $list = $('#history-popup-list');
            if (data.success && data.data.items.length) {
                let html = '';
                data.data.items.forEach(function (item) {
                    html += `<div class="history-item">
                        <div class="history-icon ${item.type}">${icons[item.type] || ''}</div>
                        <div class="history-info">
                            <div class="history-label">${item.label}</div>
                            <div class="history-date">${item.date}</div>
                        </div>
                        ${item.extra ? `<div class="history-extra">${item.extra}</div>` : ''}
                    </div>`;
                });
                $list.html(html);
            } else if (data.success) {
                $list.html('<div class="history-empty">Chưa có lịch sử.</div>');
            } else {
                $list.html('<div class="history-empty">' + (data.data?.message || 'Có lỗi xảy ra.') + '</div>');
            }
        }).fail(function () {
            $('#history-popup-list').html('<div class="history-empty">Không thể kết nối máy chủ.</div>');
        });
    };

    $('.share-popup .qlp-mask, .close-share-popup').on('click', function () {
        closePopup($('.share-popup'));
    });

    window.qltShare = function (url, title) {
        $('#share-popup-url').val(url);
        $('#share-popup-link-text').text(url);

        const encodedUrl   = encodeURIComponent(url);
        const encodedTitle = encodeURIComponent(title);

        $('#share-fb-btn').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=' + encodedUrl);
        $('#share-zalo-btn').attr('href', 'https://sp.zalo.me/share?u=' + encodedUrl + '&d=' + encodedTitle);

        openPopup($('.share-popup'));
    };
    $('#share-copy-btn').on('click', function () {
        const url = $('#share-popup-url').val();
        navigator.clipboard.writeText(url).then(function () {
            qltToast('Đã sao chép liên kết!');
        }).catch(function () {
            const $tmp = $('<input>').val(url).appendTo('body').select();
            document.execCommand('copy');
            $tmp.remove();
            qltToast('Đã sao chép liên kết!');
        });
    });
});

jQuery(function ($) {
    function openPopup($scope) {
        $scope.find('.qlp-box').addClass('show');
        $scope.find('.qlp-mask').addClass('show');
        $('body').addClass('qlp-open');
    }
    function closePopup($scope) {
        $scope.find('.qlp-box').removeClass('show');
        $scope.find('.qlp-mask').removeClass('show');
        $('body').removeClass('qlp-open');
    }

    $('.confirm-post-popup .qlp-mask, .close-confirm-post-popup').on('click', function () {
        closePopup($('.confirm-post-popup'));
    });

    window.qltOpenBalancePopup = window.qltOpenBalancePopup || function (customMessage) {
        if (customMessage) {
            $('#balance-popup-message').text(customMessage);
        }
        openPopup($('.balance-popup'));
    };

    const $form = $('#dt-form');
    const $submitBtn = $('#btn-submit');

    $form.on('submit', function (e) {
        e.preventDefault();
        const errors = dtValidateForm();
        if (errors.length > 0) {
            dtShowClientErrors(errors);
            return false;
        }

        $('.confirm-post-popup .confirm-post-error').removeClass('show').text('');
        openPopup($('.confirm-post-popup'));
        return false;
    });

    function dtValidateForm() {
        const errors = [];
        if (!$('#title-inp').val() || $('#title-inp').val().trim() === '') {
            errors.push('Vui lòng nhập tiêu đề.');
        }
        if (!$('#price-inp').val() || $('#price-inp').val().trim() === '') {
            errors.push('Vui lòng nhập giá.');
        }
        if (!$('input[name="prefix-area"]').val()) {
            errors.push('Vui lòng nhập diện tích.');
        }
        if (!$('#addr-detail').val() || $('#addr-detail').val().trim() === '') {
            errors.push('Vui lòng nhập địa chỉ chi tiết.');
        }
        const mode = $('#dt-mode-val').val();
        if (mode === 'bds' && !$('#pt-val').val()) {
            errors.push('Vui lòng chọn loại bất động sản.');
        }
        if (mode === 'du_an' && !$('#dev-val').val()) {
            errors.push('Vui lòng chọn dự án.');
        }
        const mainFile = $('#main-file-input')[0];
        const hasNewMain = mainFile && mainFile.files && mainFile.files.length > 0;
        const hasOldMain = window.__dtHasExistingMainImage === true;
        if (!hasNewMain && !hasOldMain) {
            errors.push('Vui lòng tải lên ảnh chính.');
        }
        return errors;
    }

    function dtShowClientErrors(errors) {
        let $box = $('.dt-alert-err');
        if ($box.length === 0) {
            $box = $('<div class="dt-alert-err"><strong>Vui lòng kiểm tra lại:</strong><ul style="margin:6px 0 0 16px;"></ul></div>');
            $form.before($box);
        }
        const $ul = $box.find('ul');
        $ul.empty();
        errors.forEach(function (msg) {
            $ul.append($('<li></li>').text(msg));
        });
        $box[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    $('#confirm-post-confirm-btn').on('click', function () {
        const $btn = $(this);
        const $err = $('.confirm-post-popup .confirm-post-error');

        $btn.prop('disabled', true).text('Đang xử lý...');
        $err.removeClass('show').text('');
        $submitBtn.prop('disabled', true);
        const startedAt = Date.now();
        qltShowLoading();

        const formData = new FormData($form[0]);
        formData.append('action', 'dt_submit_listing');
        formData.append('_nonce', qlt_ajax.nonce);

        $.ajax({
            url: qlt_ajax.ajax_url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
        }).done(function (data) {
            $btn.prop('disabled', false).text('Đồng ý, đăng tin');
            $submitBtn.prop('disabled', false);

            if (data.success) {
                qltFinishLoading(startedAt, function () {
                    closePopup($('.confirm-post-popup'));
                    qltToast('Đăng tin thành công!');
                    window.location.href = data.data.redirect_url;
                });
            } else if (data.data && data.data.insufficient_balance) {
                qltHideLoading();
                closePopup($('.confirm-post-popup'));
                qltOpenBalancePopup('Số dư không đủ để đăng tin (cần 150.000đ). Vui lòng nạp thêm tiền.');
            } else {
                qltHideLoading();
                const msg = (data.data && data.data.message) || 'Có lỗi xảy ra, vui lòng thử lại.';
                $err.addClass('show').text(msg);
                if (data.data && Array.isArray(data.data.errors) && data.data.errors.length) {
                    $err.addClass('show').html(data.data.errors.map(e => $('<div></div>').text(e).html()).join('<br>'));
                }
            }
        }).fail(function () {
            qltHideLoading();
            $btn.prop('disabled', false).text('Đồng ý, đăng tin');
            $submitBtn.prop('disabled', false);
            $err.addClass('show').text('Không thể kết nối máy chủ, vui lòng thử lại.');
        });
    });
});