<style> 
    .btn-login:disabled{
    background: #f0b4af;
    cursor: not-allowed;
    opacity: 0.7;
}

.btn-login:disabled:hover{
    background: #f0b4af;
}

.phone-highlight{
    font-family: "Roboto";
    font-size: 16px;
    line-height: 20px;
    font-weight: 500;
    color: #2c2c2c;
}
</style>

<section class="section-form-login">
    <div class="login-title-small">
        Xin chào bạn
    </div>

    <div class="login-title">
        Đăng ký tài khoản mới
    </div>
    <form method="post" id="register-form" action="<?php echo home_url('/'); ?>">
        
        <div class="form-field">
            <div class="icon">
                <img src="<?php echo get_template_directory_uri(); ?>/img/phone.png" width="20">
            </div>
            <input type="tel" name="phone" placeholder="Nhập số điện thoại">
        </div>
        <div class="login-error" id="r-login-error"></div>

        <label class="register-policy">
            <input type="checkbox" name="agree" id="agree-policy">

            <div class="register-policy">
                Bằng việc tiếp tục, bạn đồng ý với
                <a href="#">Điều khoản sử dụng</a>,
                <a href="#">Chính sách bảo mật</a>,
                <a href="#">Quy chế</a>,
                <a href="#">Chính sách</a>
                của chúng tôi.
            </div>
        </label>

        <button type="submit" name="custom_login" class="btn-login" id="btn-register" disabled> Tiếp tục </button>
        <div class="divider">
            Hoặc
        </div>

        <button type="button" class="social-btn">
            <img src="<?php echo get_template_directory_uri() ?>/img/apple.png" width="20">
             Đăng nhập với Apple
        </button>

        <button type="button" class="social-btn">
            <img src="<?php echo get_template_directory_uri() ?>/img/google.png" width="20">
            Đăng nhập với Google
        </button>

       <div class="login-register">
            Bạn đã có tài khoản?
            <a href="javascript:void(0)" class="open-login-from-register">
                Đăng nhập
            </a>
            tại đây
        </div>
    </form>
</section>

<script>
document.addEventListener("DOMContentLoaded", function(){
    const checkbox = document.getElementById("agree-policy");
    const button = document.getElementById("btn-register");

    checkbox.addEventListener("change", function(){
        button.disabled = !this.checked;
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function(){
    const form = document.getElementById("register-form");
    const error = document.getElementById('r-login-error');

    form.addEventListener("submit", function(e){
        e.preventDefault();
        const phone = document.querySelector('[name="phone"]').value.trim();
        const phoneRegex = /^(03|05|07|08|09)\d{8}$/;
        const invalidPhones = ['0000000000','1111111111','2222222222','1234567890','0123456789'];
        if(phone === ''){
            error.innerHTML = 'Vui lòng nhập số điện thoại';
            return;
        }
        
        if (!phoneRegex.test(phone) || invalidPhones.includes(phone) || phone.length !== 10) {
            error.innerHTML = 'Số điện thoại không hợp lệ';
            return;
        }
        error.innerHTML = '';

        document.getElementById('login-error').innerHTML = '';
        document.getElementById('otp-phone').innerHTML =
           'Chúng tôi đã gửi mã xác minh gồm 6 số đã được gửi tới số điện thoại <span class="phone-highlight">' + phone + '</span> của bạn qua SMS';

        // CLOSE REGISTER
        document.querySelector('.register .popup-wrapper').classList.remove('show');
        document.querySelector('.register .mask-popup').classList.remove('show');
        // OPEN OTP 
        document.querySelector('.otp-popup').classList.add('show');
        document.querySelector('.otp-mask').classList.add('show');
    });
});
</script>