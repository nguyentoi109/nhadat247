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
        if (customMessage) $('#balance-popup-message').text(customMessage);
        openPopup($('.balance-popup'));
    };

    const $form = $('#dt-form');

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

    $('#confirm-post-edit-confirm-btn').on('click', function () {
        const $btn = $(this);
        const $err = $('.confirm-post-popup .confirm-post-error');

        $btn.prop('disabled', true).text('Đang xử lý...');
        $err.removeClass('show').text('');
        const startedAt = Date.now();
        qltShowLoading();

        const formData = new FormData($form[0]);
        formData.append('action', 'dt_update_listing');
        formData.append('_nonce', qlt_ajax.nonce);

        $.ajax({
            url: qlt_ajax.ajax_url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
        }).done(function (data) {
            $btn.prop('disabled', false).text('Đồng ý, lưu thay đổi');

            if (data.success) {
                qltFinishLoading(startedAt, function () {
                    closePopup($('.confirm-post-popup'));
                    qltToast('Cập nhật tin thành công!');
                    window.location.href = data.data.redirect_url;
                });
            } else if (data.data && data.data.insufficient_balance) {
                qltHideLoading();
                closePopup($('.confirm-post-popup'));
                qltOpenBalancePopup(data.data.message || 'Số dư không đủ.');
            } else {
                qltHideLoading();
                const msg = (data.data && data.data.message) || 'Có lỗi xảy ra, vui lòng thử lại.';
                let $box = $err.length ? $err : $('<div class="confirm-post-error"></div>').appendTo('.confirm-post-popup .section-form-confirm-post');
                $box.addClass('show').text(msg);
                if (data.data && Array.isArray(data.data.errors) && data.data.errors.length) {
                    $box.addClass('show').html(data.data.errors.map(e => $('<div></div>').text(e).html()).join('<br>'));
                }
            }
        }).fail(function () {
            qltHideLoading();
            $btn.prop('disabled', false).text('Đồng ý, lưu thay đổi');
            $err.addClass('show').text('Không thể kết nối máy chủ, vui lòng thử lại.');
        });
    });
});