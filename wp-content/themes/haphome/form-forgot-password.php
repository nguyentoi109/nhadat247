<style> 
.login-title-small{
    margin-bottom: 15px;
}

.btn-login:disabled{
    background: #f0b4af;
    cursor: not-allowed;
    opacity: 0.7;
}
</style>
<section class="section-form-login">
    <div class="otp-back-wrap">
        <a href="javascript:void(0)" class="forgot-back-btn">
           <img src="<?php echo get_template_directory_uri() ?>/img/arrow.png" width="20" class="icon-back">
        </a>
    </div>

    <div class="login-title-small">
        Khôi phục mật khẩu
    </div>

    <form id="forgot-password-form">
        <div class="form-field">
            <div class="icon">
                <img src="<?php echo get_template_directory_uri(); ?>/img/phone.png" width="20">
            </div>
            <input type="tel" name="forgot_phone"  placeholder="Nhập số điện thoại">
        </div>

        <div class="login-error" id="forgot-error"></div>

        <button type="submit" class="btn-login" id="btn-forgot" disabled>
            Gửi mã OTP
        </button>

        <div class="login-register">
            Bạn đã có tài khoản?

            <a href="javascript:void(0)" class="open-login-from-forgot">
                Đăng nhập
            </a>
            tại đây
        </div>

    </form>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const phoneRegex =/^(03|05|07|08|09)\d{8}$/;
        const forgotBtn =document.getElementById("btn-forgot");
        const forgotPhoneInput =document.querySelector('[name="forgot_phone"]');

    forgotPhoneInput.addEventListener("input", function(){
        const phone = this.value.trim();
        forgotBtn.disabled =!phoneRegex.test(phone);
    });

    document.getElementById("forgot-password-form").addEventListener("submit", async function(e){
        e.preventDefault();

        const phone =document.querySelector('[name="forgot_phone"]').value.trim();
        const error =document.getElementById("forgot-error");

        if(phone === ""){
            error.innerHTML = "Vui lòng nhập số điện thoại";
            return;
        }

        if(!phoneRegex.test(phone)){
            error.innerHTML = "Số điện thoại không hợp lệ";
            return;
        }

        error.innerHTML = "";

        const formData = new FormData();
        formData.append("action","send_phone_otp");
        formData.append("phone", phone);
        formData.append("type","forgot");

        const response = await fetch("<?php echo admin_url('admin-ajax.php'); ?>",
            {
                method:"POST",
                body:formData
            }
        );

        const result = await response.json();
        if(!result.success){
            error.innerHTML =result.data.message;
            return;
        }

        sessionStorage.setItem("otp_type", "forgot");
        sessionStorage.setItem("forgot_phone",phone);

        document.getElementById("otp-phone").innerHTML = 'Chúng tôi đã gửi mã xác minh gồm 6 số tới số điện thoại <span class="phone-highlight">'+ phone + '</span> qua SMS';
        document.querySelector(".forgot-popup").classList.remove("show");
        document.querySelector(".forgot-mask").classList.remove("show");
        document.querySelector(".otp-popup").classList.add("show");
        document.querySelector(".otp-mask").classList.add("show");
        startOtpCountdown();
    });                         

    document.querySelector(".forgot-back-btn").addEventListener("click", function(e){
        e.preventDefault();

        document.getElementById("forgot-password-form").reset();
        document.getElementById("forgot-error").innerHTML = "";
        document.querySelector(".forgot-popup").classList.remove("show");
        document.querySelector(".forgot-mask").classList.remove("show");
        document.querySelector(".user .popup-wrapper").classList.add("show");
        document.querySelector(".user .mask-popup").classList.add("show");
    });
});
</script>