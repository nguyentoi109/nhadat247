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

            $('.register .popup-wrapper').addClass('show');
            $('.register .mask-popup').addClass('show');
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