jQuery(function ($) {
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
   window.qltEnsureLoadingOverlay = window.qltEnsureLoadingOverlay || qltEnsureLoadingOverlay;

   window.qltShowLoading = window.qltShowLoading || function () {
      qltEnsureLoadingOverlay().addClass('show');
   };

   window.qltHideLoading = window.qltHideLoading || function () {
      qltEnsureLoadingOverlay().removeClass('show');
   };

   window.qltFinishLoading = window.qltFinishLoading || function (startedAt, callback, minDelay) {
      const elapsed = Date.now() - startedAt;
      const remaining = Math.max((minDelay || 1000) - elapsed, 0);
      setTimeout(callback, remaining);
   };

   window.qltOpenPopup = window.qltOpenPopup || function ($scope) {
      $scope.find('.qlp-box').addClass('show');
      $scope.find('.qlp-mask').addClass('show');
      $('body').addClass('qlp-open');
   };

   window.qltClosePopup = window.qltClosePopup || function ($scope) {
      $scope.find('.qlp-box').removeClass('show');
      $scope.find('.qlp-mask').removeClass('show');
      $('body').removeClass('qlp-open');
   };

   function openPopup($scope) {
      qltOpenPopup($scope);
   }

   function closePopup($scope) {
      qltClosePopup($scope);
   }

   var $confirmPopup = $('.confirm-popup');
   var $successPopup = $('.success-popup');

   $confirmPopup.on('click', '.qlp-mask, .close-confirm-popup', function () {
      closePopup($confirmPopup);
   });
   $successPopup.on('click', '.qlp-mask, .close-success-popup', function () {
      closePopup($successPopup);
      window.location.reload();
   });

   window.qltOpenBalancePopup = window.qltOpenBalancePopup || function (customMessage) {
      if (customMessage) {
         $('#balance-popup-message').text(customMessage);
      }
      openPopup($('.balance-popup'));
   };

   function fillConfirmPopup($btn) {
      var title = $btn.data('title') || '';
      var subtitle = $btn.data('subtitle') || '';
      var price = $btn.data('price') || '';
      var items = $btn.data('items') || [];

      if (typeof items === 'string') {
         try {
            items = JSON.parse(items);
         } catch (e) {
            items = [];
         }
      }

      $confirmPopup.find('.confirm-title-value').text(title);
      $confirmPopup.find('.confirm-subtitle-value').text(subtitle);
      $confirmPopup.find('.confirm-price-value').text(price);

      var $itemsBox = $confirmPopup.find('.confirm-summary-items').empty();
      if (items && items.length) {
         items.forEach(function (label) {
            $itemsBox.append(
               '<div class="confirm-item-row">' +
               '<svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2.5">' +
               '<path d="M20 6L9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/>' +
               '</svg>' +
               '<span>' + $('<div>').text(label).html() + '</span>' +
               '</div>'
            );
         });
         $itemsBox.show();
      } else {
         $itemsBox.hide();
      }

      $confirmPopup.find('.confirm-purchase-error').removeClass('show').text('');
   }

   var $downgradePopup = $('.downgrade-popup');
   $downgradePopup.on('click', '.qlp-mask, .close-downgrade-popup', function () {
      closePopup($downgradePopup);
   });

   window.qltOpenDowngradePopup = function (planName) {
      $downgradePopup.find('#downgrade-popup-plan-name').text(planName || 'gói hiện tại');
      openPopup($downgradePopup);
   };

   $(document).on('click', '.bds-purchase-btn', function (e) {
      e.preventDefault();
      var $btn = $(this);
      if ($btn.data('is-downgrade') == '1' || $btn.data('is-downgrade') === 1) {
         qltOpenDowngradePopup($btn.data('current-plan-name'));
         return;
      }

      fillConfirmPopup($btn);

      var $submit = $confirmPopup.find('#confirm-purchase-submit');
      $submit.data('ajax-action', $btn.data('ajax-action'));
      $submit.data('payload', $btn.data('payload'));
      $submit.data('success-title', $btn.data('success-title') || 'Thành công!');
      $submit.data('success-redirect', $btn.data('success-redirect') || '');
      $submit.prop('disabled', false).text('Xác nhận thanh toán');

      openPopup($confirmPopup);
   });

   $confirmPopup.on('click', '#confirm-purchase-submit', function () {
      var $btn = $(this);
      var $err = $confirmPopup.find('.confirm-purchase-error');

      var ajaxAction = $btn.data('ajax-action');
      var payload = $btn.data('payload') || {};
      if (typeof payload === 'string') {
         try {
            payload = JSON.parse(payload);
         } catch (e) {
            payload = {};
         }
      }

      if (!ajaxAction) {
         $err.addClass('show').text('Thiếu thông tin hành động, vui lòng thử lại.');
         return;
      }

      if (typeof qlt_member_ajax === 'undefined') {
         $err.addClass('show').text('Thiếu cấu hình AJAX (qlt_member_ajax). Vui lòng kiểm tra script đã được enqueue đúng trang chưa.');
         return;
      }

      var successTitle = $btn.data('success-title') || 'Thành công!';

      $btn.prop('disabled', true).text('Đang xử lý...');
      $err.removeClass('show').text('');
      var startedAt = Date.now();
      qltShowLoading();

      var postData = $.extend({}, payload, {
         action: ajaxAction,
         _nonce: qlt_member_ajax.nonce
      });

      $.post(qlt_member_ajax.ajax_url, postData)
         .done(function (data) {
            $btn.prop('disabled', false).text('Xác nhận thanh toán');

            if (data.success) {
               qltFinishLoading(startedAt, function () {
                  closePopup($confirmPopup);
                  qltToast(successTitle);
                  window.location.reload();
               });
            } else if (data.data && data.data.insufficient_balance) {
               qltHideLoading();
               closePopup($confirmPopup);
               qltOpenBalancePopup(
                  data.data.message || 'Số dư không đủ để thực hiện giao dịch này. Vui lòng nạp thêm tiền.'
               );
            } else if (data.data && data.data.downgrade_blocked) {
               qltHideLoading();
               closePopup($confirmPopup);
               qltOpenDowngradePopup(data.data.current_plan_name);
            } else {
               qltHideLoading();
               $err.addClass('show').text((data.data && data.data.message) || 'Có lỗi xảy ra, vui lòng thử lại.');
            }
         })
         .fail(function (xhr) {
            qltHideLoading();
            $btn.prop('disabled', false).text('Xác nhận thanh toán');
            $err.addClass('show').text('Không thể kết nối máy chủ (mã lỗi ' + xhr.status + '), vui lòng thử lại.');
         });
   });

});