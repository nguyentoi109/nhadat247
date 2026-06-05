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

.btn-loading{
    pointer-events: none;
    opacity: .8;
    position: relative;
    background:#e03c31 !important;
}

.btn-loading::after{
    content: "";
    width: 16px;
    height: 16px;
    border: 2px solid #fff;
    border-top-color: transparent;
    border-radius: 50%;
    display: inline-block;
    margin-left: 10px;
    animation: spin .8s linear infinite;
    vertical-align: middle;
}

.popup-wrapper,
.otp-popup{
    transition: all .3s ease;
}

.popup-fade-out{
    opacity:0;
    transform:translateY(10px);
}

.popup-fade-in{
    opacity:1;
    transform:translateY(0);
}

@keyframes spin{
    to{
        transform: rotate(360deg);
    }
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
document.getElementById("register-form").addEventListener("submit", async function(e){
    e.preventDefault();
    const error = document.getElementById("r-login-error");
    const phone = document.querySelector('[name="phone"]').value.trim();
    const phoneRegex = /^(03|05|07|08|09)\d{8}$/;
    const button = document.getElementById("btn-register");

    if(phone === ''){
        error.innerHTML = 'Vui lòng nhập số điện thoại';
        return;
    }

    if(!phoneRegex.test(phone)){
        error.innerHTML = 'Số điện thoại không hợp lệ';
        return;
    }
    error.innerHTML = '';

    const originalText = button.innerHTML;
    button.disabled = true;
    button.classList.add("btn-loading");

    try{
        const formData = new FormData();
        formData.append("action","send_phone_otp");
        formData.append("phone",phone);
        formData.append("type","register");

        const response = await fetch(
            "<?php echo admin_url('admin-ajax.php'); ?>",
            {
                method:"POST",
                body:formData
            }
        );

        const result = await response.json();
        await new Promise(resolve => setTimeout(resolve,1200));

        if(!result.success){
            error.innerHTML = result.data?.message ||"Không thể gửi OTP";

            button.disabled = false;
            button.classList.remove("btn-loading");
            button.innerHTML = originalText;

            return;
        }
        
        sessionStorage.setItem("otp_type", "register");
        sessionStorage.setItem("register_phone",phone);
        document.getElementById("otp-phone").innerHTML = 'Chúng tôi đã gửi mã xác minh gồm 6 số tới số điện thoại <span class="phone-highlight">'+ phone + '</span> qua SMS';

        button.disabled = false;
        button.classList.remove("btn-loading");
        button.innerHTML = originalText;

        document.querySelector('.register .popup-wrapper').classList.remove('show');
        document.querySelector('.register .mask-popup').classList.remove('show');
        document.querySelector('.otp-popup').classList.add('show');
        document.querySelector('.otp-mask').classList.add('show');

        if(typeof startOtpCountdown === 'function'){
            startOtpCountdown();
        }

    }catch(err){
        console.log(err);
        error.innerHTML ="Có lỗi xảy ra, vui lòng thử lại";
        button.disabled = false;
        button.classList.remove("btn-loading");
        button.innerHTML = originalText;
    }
});
</script>