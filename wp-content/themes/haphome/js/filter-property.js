jQuery(function ($) {
    var $list = $('[data-ajax-filter="1"]');
    if ($list.length === 0) {
        return;
    }

    var MIN_LOADING_TIME = 1000; 

    function loadProperties(priceRange, areaRange, paged) {
        var startTime = Date.now();
        $list.addClass('is-loading');

        $.ajax({
            url: bdsFilterAjax.ajax_url,
            type: 'POST',
            data: {
                action: 'bds_filter_properties',
                nonce: bdsFilterAjax.nonce,
                price_range: priceRange,
                area_range: areaRange,
                paged: paged || 1
            },
            success: function (res) {
                var elapsed = Date.now() - startTime;
                var remaining = Math.max(0, MIN_LOADING_TIME - elapsed);

                setTimeout(function () {
                    if (res.success) {
                        $list.html(res.data.html);
                    } else {
                        $list.html('<p>Có lỗi xảy ra, vui lòng thử lại.</p>');
                    }
                    $list.removeClass('is-loading');
                }, remaining);
            },
            error: function () {
                var elapsed = Date.now() - startTime;
                var remaining = Math.max(0, MIN_LOADING_TIME - elapsed);

                setTimeout(function () {
                    $list.html('<p>Có lỗi xảy ra, vui lòng thử lại.</p>');
                    $list.removeClass('is-loading');
                }, remaining);
            }
        });
    }

    $(document).on('click', '.filter-box-price .filter-item a, .filter-box-area .filter-item a', function (e) {
        if ($('[data-ajax-filter="1"]').length === 0) {
            return;
        }
        e.preventDefault();

        var $link = $(this);
        var $item = $link.closest('.filter-item');
        var $box  = $item.closest('.filter-box');
        $box.find('.filter-item').removeClass('active');
        $item.addClass('active');
        var priceRange = $('.filter-box-price .filter-item.active a').data('value');
        var areaRange  = $('.filter-box-area .filter-item.active a').data('value');
        loadProperties(priceRange, areaRange, 1);
        var url = $link.attr('href');
        if (url && history.pushState) {
            history.pushState(null, '', url);
        }
    });
});