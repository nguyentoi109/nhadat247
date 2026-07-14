(function ($) {
    'use strict';
    function ntGetSelectedAmount() {
        var $hidden = $('#nt-selected-amount');
        if ($hidden.length && $hidden.val()) {
            return parseInt($hidden.val(), 10) || 0;
        }
        var $active = $('.nt-amount-option.selected, .nt-amount-option.active').first();
        if ($active.length && $active.data('amount')) {
            return parseInt($active.data('amount'), 10) || 0;
        }
        var $custom = $('#nt-custom-amount');
        if ($custom.length && $custom.val()) {
            return parseInt(String($custom.val()).replace(/[^0-9]/g, ''), 10) || 0;
        }
        return 0;
    }

    function ntSetLoading(isLoading) {
        var $btn = $('.nt-submit-btn');
        if (isLoading) {
            $btn.prop('disabled', true).data('original-text', $btn.text()).text('Đang xử lý...');
        } else {
            $btn.prop('disabled', false).text($btn.data('original-text') || 'Tiến hành nạp tiền');
        }
    }

    function ntShowError(message) {
        alert(message || 'Đã có lỗi xảy ra, vui lòng thử lại.');
    }

    window.ntSubmit = function () {
        var amount = ntGetSelectedAmount();
        var method = window.ntSelectedMethod || '';

        if (!amount || amount < 10000) {
            ntShowError('Vui lòng chọn hoặc nhập số tiền nạp tối thiểu 10.000 ₫.');
            return;
        }
        if (!method) {
            ntShowError('Vui lòng chọn phương thức thanh toán.');
            return;
        }

        ntSetLoading(true);

        $.ajax({
            url: qlt_nap_tien_ajax.ajax_url,
            method: 'POST',
            dataType: 'json',
            data: {
                action: 'bds_create_deposit_order',
                nonce: qlt_nap_tien_ajax.nonce,
                amount: amount,
                method: method
            }
        }).done(function (res) {
            if (res && res.success && res.data && res.data.redirect_url) {
                window.location.href = res.data.redirect_url;
            } else {
                ntSetLoading(false);
                ntShowError(res && res.data && res.data.message ? res.data.message : 'Không thể tạo đơn nạp tiền.');
            }
        }).fail(function () {
            ntSetLoading(false);
            ntShowError('Lỗi kết nối máy chủ, vui lòng thử lại.');
        });
    };
    $(function () {
        var params = new URLSearchParams(window.location.search);
        var result = params.get('nap_tien');
        if (!result) return;

        if (result === 'success') {
            alert('Nạp tiền thành công! Số dư của bạn đã được cập nhật.');
        } else if (result === 'processing') {
            alert('Giao dịch đang được xử lý. Số dư sẽ được cập nhật trong ít phút.');
        } else if (result === 'failed') {
            alert('Giao dịch không thành công hoặc đã bị hủy.');
        }
        if (window.history && window.history.replaceState) {
            var url = new URL(window.location.href);
            url.searchParams.delete('nap_tien');
            url.searchParams.delete('order');
            window.history.replaceState({}, document.title, url.toString());
        }
    });

})(jQuery);