(function($, root, undefined) {

    $(function() {

        'use strict';

        /*scrollTop*/
        var position = $(window).scrollTop();

        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('#totop').fadeIn();

                var scroll = $(window).scrollTop();
                if (scroll > position) {
                    //console.log('scrollDown');
                    $(".header").removeClass("pin");
                    $(".contact-mobile").removeClass("pin");
                } else {
                    //console.log('scrollUp');
                    $(".header").addClass("pin");
                    $(".contact-mobile").addClass("pin");
                }
                position = scroll;
            } else {
                $('#totop').fadeOut();

            }
        });

        $('#totop').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
        /*End scrollTop*/

        /*Show slide banner*/
        /* var elementTop1 = $('.info-contact').offset().top - $(window).height() + $('.info-contact').height();
        $(window).scroll(function() {
            if ($(this).scrollTop() > elementTop1) {
                $('.info-contact-fixed').slideUp();
            } else {
                $('.info-contact-fixed').slideDown();
            }
        }); */

        /*End Show slide banner*/

        /*WOW JS*/
        new WOW().init();
        /*End WOW JS*/

        /*OPEN & CLOSE USER MENU*/
        $(".info-user .avata").click(function() {
            $('.list-info-user').toggleClass("show");
        });
        /*End OPEN & CLOSE USER MENU*/

        /*OPEN & CLOSE USER MENU FOOTER*/
        $(".account .btn-click").click(function() {
            $('.info-user .list-info-user').toggleClass("show");
            $('.info-user #loginform').toggleClass("show");
        });
        /*End OPEN & CLOSE USER MENU FOOTER*/

        /*OPEN & CLOSE USER MENU*/
        $(".block .show-more").click(function() {
            $('.block .list-location').toggleClass("show");
            $('.block .show-more').toggleClass("show");
        });
        /*End OPEN & CLOSE USER MENU*/

        /*OPEN & CLOSE FORM LOGIN*/
        $(".topbar .login").click(function() {
            $('.topbar .login').toggleClass("show");
        });
        /*End OPEN & CLOSE FORM LOGIN*/

        /*OPEN & CLOSE POPUP*/
        $(".login, .user .mask-popup").click(function() {
            $('.user .popup-wrapper').toggleClass("show");
            $('.user .mask-popup').toggleClass("show");

            $('body').addClass('popup-open');
        });

        $(".user .mask-popup").click(function() {
            $('.user .popup-wrapper').removeClass("show");
            $('.user .mask-popup').removeClass("show");

            $('body').removeClass('popup-open');
        });

        // REGISTER
        $(".open-register-popup").click(function() {
            $('.register .popup-wrapper').addClass("show");
            $('.register .mask-popup').addClass("show");

            $('body').addClass('popup-open');
        });

        $(".register .mask-popup").click(function() {
            $('.register .popup-wrapper').removeClass("show");
            $('.register .mask-popup').removeClass("show");

            $('body').removeClass('popup-open');
        });

        $(document).on("click", ".open-register-from-login", function(e){
            e.preventDefault();
            $('.user .popup-wrapper').removeClass("show");
            $('.user .mask-popup').removeClass("show");
            $('.register .popup-wrapper').addClass("show");
            $('.register .mask-popup').addClass("show");
        });

        $(document).on("click", ".open-login-from-register", function(e){
            e.preventDefault();
            $('.register .popup-wrapper').removeClass("show");
            $('.register .mask-popup').removeClass("show");
            $('.user .popup-wrapper').addClass("show");
            $('.user .mask-popup').addClass("show");
        });

        // OTP
        document.addEventListener("DOMContentLoaded", function(){
            const mask = document.querySelector('.otp-mask');
            mask.addEventListener('click', function(){
                document.querySelector('.otp-popup').classList.remove('show');
                document.querySelector('.otp-mask').classList.remove('show');
            });
        });

        $(document).on("click", ".register-otp .mask-popup", function(){
            $('.register-otp .popup-wrapper').removeClass('show');
            $('.register-otp .mask-popup').removeClass('show');
        });

        $(document).on('click', '.otp-back-btn', function(e){
            e.preventDefault();
            $('.otp-popup').removeClass('show');
            $('.otp-mask').removeClass('show');
            const otpType = sessionStorage.getItem("otp_type");
            if(otpType === "register"){
                $('.register .popup-wrapper').addClass('show');
                $('.register .mask-popup').addClass('show');
            }
            else if(otpType === "forgot"){
                $('.forgot-popup').addClass('show');
                $('.forgot-mask').addClass('show');
            }
        });

        // PASSWORD POP-UP
        $(document).on("click", ".password-mask", function(){
            $('.password-popup').removeClass('show');
            $('.password-mask').removeClass('show');
            $('body').removeClass('popup-open');
        });

        $(".mask-popup").click(function() {
           if($('#filterPopup').hasClass('active')){
                $('#filterPopup').removeClass('active');
                e.stopPropagation();
                return;
            }

            $('.popup-search-property').removeClass("show");
            $('.mask-popup').removeClass("show");
            $('body').removeClass('popup-open');
        });

        // FORGOT PASSWORD 
        $(document).on("click", ".open-forgot-password", function(e){
            e.preventDefault();

            $('.user .popup-wrapper').removeClass("show");
            $('.user .mask-popup').removeClass("show");
            $('.forgot-password .popup-wrapper').addClass("show");
            $('.forgot-password .mask-popup').addClass("show");
        });

        $(document).on("click", ".open-login-from-forgot", function(e){
            e.preventDefault();

            $('.forgot-password .popup-wrapper').removeClass("show");
            $('.forgot-password .mask-popup').removeClass("show");
            $('.user .popup-wrapper').addClass("show");
            $('.user .mask-popup').addClass("show");
        });

        $(".forgot-password .mask-popup").click(function() {
            $('.forgot-password .popup-wrapper').removeClass("show");
            $('.forgot-password .mask-popup').removeClass("show");
            $('body').removeClass('popup-open');
        });

        //RESET PASSWORD
        document.querySelector(".reset-password-mask").addEventListener("click", function(){
            document.getElementById("reset-password-form").reset();
            document.querySelector(".reset-password-popup").classList.remove("show");
            document.querySelector(".reset-password-mask").classList.remove("show");
        });

        // MENU USER 
        $(".user-avatar-btn").click(function(){
            $(".popup-user-menu").toggleClass("show");
        });

        $(".search-property, .btn-search-mobile").click(function() {
            $('.popup-search-property').addClass("show");
            $('.mask-popup').addClass("show");
            $('body').addClass('popup-open');
            });

        $(".mask-popup").click(function() {
            if(window.innerWidth <= 768){
                return;
            }
            $('.popup-search-property').removeClass("show");
            $('.mask-popup').removeClass("show");
            $('body').removeClass('popup-open');
        });

        $(".wrap-master .search").click(function() {
            $('.popup-search-property').addClass("show");
            $('.mask-popup').addClass("show");
            $('body').addClass('popup-open');
        });

        $(".close-popup").click(function(){
            $('.popup-search-property').removeClass("show");
            $('.mask-popup').removeClass("show");
            $('body').removeClass('popup-open');
        });

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
        
                $.post(qlt_ajax.ajax_url, {
                    action: 'ql_upgrade_vip',
                    post_id: postId,
                    _nonce: qlt_ajax.nonce
                }).done(function (data) {
                    $btn.prop('disabled', false).text('Đồng ý nâng cấp');
        
                    if (data.success) {
                        closePopup($('.vip-popup'));
                        qltApplyVipBadge(postId, data.data.vip_level, data.data.expired_at_formatted);
                        qltToast('✓ ' + data.data.message);
                    } else if (data.data?.insufficient_balance) {
                        closePopup($('.vip-popup'));
                        qltOpenBalancePopup('Số dư không đủ để nâng cấp VIP (cần 150.000đ). Vui lòng nạp thêm tiền.');
                    } else {
                        $err.addClass('show').text(data.data?.message || 'Có lỗi xảy ra khi nâng cấp VIP.');
                    }
                }).fail(function () {
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
                $.post(qlt_ajax.ajax_url, {
                    action: 'ql_delete_listing',
                    post_id: postId,
                    _nonce: qlt_ajax.nonce
                }).done(function (data) {
                    $btn.prop('disabled', false).text('Xoá tin');
        
                    if (data.success) {
                        closePopup($('.delete-popup'));
                        const card = document.getElementById('qlt-card-' + postId);
                        if (card) {
                            card.style.opacity = '0';
                            setTimeout(() => card.remove(), 300);
                        }
                    } else {
                        $err.addClass('show').text(data.data?.message || 'Có lỗi xảy ra.');
                    }
                }).fail(function () {
                    $btn.prop('disabled', false).text('Xoá tin');
                    $err.addClass('show').text('Không thể kết nối máy chủ, vui lòng thử lại.');
                });
            });
            window.qltPush = function (postId) {
                $('#push-popup-post-id').val(postId);
                $('.push-popup .push-error').removeClass('show').text('');
                $('.push-popup input[name="push_type"][value="normal"]').prop('checked', true);
                openPopup($('.push-popup'));
            };
        
            $('#push-popup-confirm-btn').on('click', function () {
                const postId = $('#push-popup-post-id').val();
                const pushType = $('.push-popup input[name="push_type"]:checked').val();
                const $btn = $(this);
                const $err = $('.push-popup .push-error');
        
                $btn.prop('disabled', true).text('Đang xử lý...');
                $err.removeClass('show').text('');
        
                $.post(qlt_ajax.ajax_url, {
                    action: 'ql_push_listing',
                    post_id: postId,
                    push_type: pushType,
                    _nonce: qlt_ajax.nonce
                }).done(function (data) {
                    $btn.prop('disabled', false).text('Xác nhận đẩy tin');
        
                    if (data.success) {
                        closePopup($('.push-popup'));
                        qltToast('✓ ' + data.data.message);
                    } else if (data.data?.insufficient_balance) {
                        closePopup($('.push-popup'));
                        qltOpenBalancePopup('Số dư không đủ để đẩy tin. Vui lòng nạp thêm tiền.');
                    } else {
                        $err.addClass('show').text(data.data?.message || 'Có lỗi xảy ra khi đẩy tin.');
                    }
                }).fail(function () {
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
        
                $.post(qlt_ajax.ajax_url, {
                    action: 'ql_repost_listing',
                    post_id: postId,
                    _nonce: qlt_ajax.nonce
                }).done(function (data) {
                    $btn.prop('disabled', false).text('Đồng ý, đăng lại');
        
                    if (data.success) {
                        closePopup($('.repost-popup'));
                        qltToast('✓ ' + data.data.message);
                        if (data.data.expired_at_formatted) {
                            qltApplyRepostUI(postId, data.data.expired_at_formatted);
                        } else {
                            setTimeout(() => window.location.reload(), 800);
                        }
                    } else if (data.data?.insufficient_balance) {
                        closePopup($('.repost-popup'));
                        qltOpenBalancePopup('Số dư không đủ để đăng lại tin (cần 150.000đ). Vui lòng nạp thêm tiền.');
                    } else {
                        $err.addClass('show').text(data.data?.message || 'Có lỗi xảy ra.');
                    }
                }).fail(function () {
                    $btn.prop('disabled', false).text('Đồng ý, đăng lại');
                    $err.addClass('show').text('Không thể kết nối máy chủ, vui lòng thử lại.');
                });
            });
        
            window.qltApplyRepostUI = function (postId, expiredAtFormatted) {
                const card = document.getElementById('qlt-card-' + postId);
                if (!card) return;
                const statusText = card.querySelector('.qlt-status-text');
                const statusDot = card.querySelector('.qlt-status-dot');
                if (statusText) {
                    statusText.textContent = 'Chờ duyệt';
                    statusText.className = 'qlt-status-text yellow';
                }
                if (statusDot) {
                    statusDot.className = 'qlt-status-dot yellow';
                }
        
                const expEls = card.querySelectorAll('.qlt-meta-inline span');
                expEls.forEach(function (el) {
                    if (el.querySelector('strong') && el.querySelector('strong').textContent.includes('hết hạn')) {
                        el.innerHTML = '<strong>Ngày hết hạn</strong><span style="color:#374151;">' + expiredAtFormatted + '</span>';
                    }
                });
            };
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
                if (!mainFile || !mainFile.files || mainFile.files.length === 0) {
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
                        closePopup($('.confirm-post-popup'));
                        window.location.href = data.data.redirect_url;
                    } else if (data.data && data.data.insufficient_balance) {
                        closePopup($('.confirm-post-popup'));
                        qltOpenBalancePopup('Số dư không đủ để đăng tin (cần 150.000đ). Vui lòng nạp thêm tiền.');
                    } else {
                        const msg = (data.data && data.data.message) || 'Có lỗi xảy ra, vui lòng thử lại.';
                        $err.addClass('show').text(msg);
                        if (data.data && Array.isArray(data.data.errors) && data.data.errors.length) {
                            $err.addClass('show').html(data.data.errors.map(e => $('<div></div>').text(e).html()).join('<br>'));
                        }
                    }
                }).fail(function () {
                    $btn.prop('disabled', false).text('Đồng ý, đăng tin');
                    $submitBtn.prop('disabled', false);
                    $err.addClass('show').text('Không thể kết nối máy chủ, vui lòng thử lại.');
                });
            });

        });
        /*End OPEN & CLOSE POPUP*/

        /*OPEN & CLOSE MOBILE MENU*/
        $(".mobile-menu").click(function() {
            $('body').toggleClass("show-menu");
            $("body").css("overflow", "hidden");
        });
        $(".wrap-master .cat").click(function() {
            $('body').toggleClass("show-menu");
            $("body").css("overflow", "hidden");
        });
        $(".mobile-menu-close").click(function() {
            $('body').toggleClass("show-menu");
            $("body").css("overflow", "");
        });
        /*End OPEN & CLOSE MOBILE MENU*/

        /*SHOW HIDDE CONTACT*/
        $(".contact-mobile").click(function() {
            $(this).toggleClass("show");
        });
        /*END SHOW HIDDE CONTACT*/



        /*MASTER CONTROL*/
        $('.master_control .menu').click(function() {
            $('.mask-overlay').toggleClass('active');
        });
        $('.master_control .menu a').click(function() {
            $('.mask-overlay').toggleClass('active');
        });
        /*function uncheck() {
          document.getElementById("mc_bnt").checked = false;
        }*/
        $(".master_control .main-menu").click(function() {
            $('body').toggleClass("show-menu");
            $("body").css("overflow", "hidden");
        });
        $(".master_control .search").click(function() {
            $('.popup-search-property').toggleClass("show");
            $('.mask-popup').toggleClass("show");
        });
        /*END MASTER CONTROL*/



        /*popular_real*/
        var popular_real = new Swiper('.popular-real.swiper-container', {
            spaceBetween: 10,
            //loop:true,
            slidesPerView: 4,
            autoplay: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: ".popular .btn-next",
                prevEl: ".popular .btn-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1280: {
                    slidesPerView: 3,
                },
                1360: {
                    slidesPerView: 4,
                },
            }
        });
        /*popular_real*/

    });



})(jQuery, this);