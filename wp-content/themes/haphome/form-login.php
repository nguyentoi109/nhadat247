<style> 
.section-form-login{
    width:100%;
    max-width:470px;
    margin:auto;
    padding:15px;
}

.login-title-small{
    font-size:18px;
    color:#333;
    margin-bottom:8px;
    font-weight:500;
}

.login-title{
    font-size:24px;
    font-weight:500;
    line-height: 32px;
    color:#2c2c2c;
    margin-bottom:30px;
    letter-spacing: -0.2px;
    font-family: "Lexend";
}

.form-field input{
    width:100%;
    height:60px;
    border: 1px solid rgb(204, 204, 204);
    caret-color: rgb(0, 0, 0);
    border-radius:8px;
    padding-left:50px;
    padding-right:15px;
    font-size:16px;
    font-family: "Roboto" !important;
    line-height: 20px;
}

.login-user-input{
    margin-bottom: 15px;
}

.form-field input:hover{
    border: 1px solid rgb(44, 44, 44);
    cursor: initial;
}

.btn-login{
    font-family: 'Lexend';
    display: inline-block;
    width:100%;
    height:60px;
    border:none;
    border-radius:8px;
    background: #e03c31;
    color:#ffffff;
    font-size:16px;
    font-weight:500;
    line-height: 20px;
    cursor:pointer;
    margin-top:10px;
}

.btn-login:hover{
    background:#ff837a;
}

.login-option{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin:20px 0;
}

.login-option a{
    font-family: "Roboto";
    color:#e03c31;
    font-size: 16px;
    line-height: 20px;
    font-weight: 400;
}

.remember-wrap{
    display:flex;
    align-items:center;
    gap:8px;
    cursor:pointer;
}

.remember-text{
    font-family: "Roboto";
    color:#2c2c2c;
    font-size:16px;
    font-weight:400;
    line-height: 20px;
}

.divider{
    font-family: "Roboto";
    display:flex;
    align-items:center;
    gap:10px;
    margin:25px 0;
    color: #999999;
    font-size: 14px;
    font-weight: 400;
    line-height: 20px;
}

.divider::before,
.divider::after{
    content:'';
    flex:1;
    height:1px;
    background:#ddd;
}

.social-btn{
    font-family: 'Lexend';
    width:100%;
    height:64px;
    border: 1px solid #cccccc;
    border-radius:8px;
    background:#ffffff;
    margin-bottom:16px;
    display:flex;
    justify-content:center;
    align-items:center;
    gap:10px;
    font-size:14px;
    font-weight:400;
    color: #2c2c2c;
}

.social-btn:hover{
    background-color: #f2f2f2;
    color: #2c2c2c;
    border: 1px solid #cccccc;
}

.login-policy{
    font-family: "Roboto";
    margin-top:30px;
    text-align:center;
    font-size:14.5px;
    color:#888;
    line-height:16px;
}

.login-policy a{
    color:#e03c31;
    text-decoration:none;
}

.login-register{
    font-family: "Roboto";
    text-align:center;
    margin-top:40px;
    font-size:16px;
    line-height: 20px;
}

.login-register a{
    color:#e03c31;
    font-weight:500;
    text-decoration:none;
}

.login-error{
    color:#e03c31;
    font-size:14px;
    margin-bottom:10px;
    margin-top: 8px;
    text-align:left;
    font-family: "Roboto";
    font-weight: 400;
    line-height: 16px;
}

.form-field{
    position: relative;
    display: flex;
}

.icon{
    pointer-events: none;
    position: absolute;
    left: 15px;
    top: 18px;
}

.icon-eye{
    position: absolute;
    right: 15px;
    top: 20px;
    cursor:pointer;
}
</style>
 <section class="section-form-login">
    <div class="login-title-small">
        Xin chào bạn
    </div>

    <div class="login-title">
        Đăng nhập để tiếp tục
    </div>
    <form method="post" id="login-form" action="<?php echo home_url('/'); ?>">
        <div class="form-field login-user-field">

            <div class="icon">
                <img src="<?php echo get_template_directory_uri() ?>/img/person.png" width="20">
            </div>  

            <input type="text" class="login-user-input" name="log" placeholder="Email hoặc tên đăng nhập"  value="<?php echo isset($_POST['log']) ? esc_attr($_POST['log']) : ''; ?>"required>
        </div>

        <div class="form-field password-field">
            <div class="icon">
                <img src="<?php echo get_template_directory_uri() ?>/img/locked.png" width="20">
            </div>

            <input type="password" id="password-input" name="pwd" placeholder="Mật khẩu" required>

            <div class="icon-eye" id="toggle-password">
                <img id="eye-icon" src="<?php echo get_template_directory_uri() ?>/img/hidden.png" width="20">
            </div>
        </div>

       <div class="login-error" id="login-error"></div>

        <button type="submit" name="custom_login" class="btn-login"> Đăng nhập </button>

        <div class="login-option">
            <label>
                <input type="checkbox" name="remember">
                <span class="remember-text">Nhớ tài khoản</span>
            </label>

            <a href="<?php echo wp_lostpassword_url(); ?>">
                Quên mật khẩu?
            </a>
        </div>

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

        <div class="login-policy">
            Bằng việc tiếp tục, bạn đồng ý với
            <a href="#">Điều khoản sử dụng</a>,
            <a href="#">Chính sách bảo mật</a>,
            <a href="#">Quy chế</a>,
            <a href="#">Chính sách</a>
            của chúng tôi.
        </div>

        <div class="login-register">
            Chưa là thành viên?
            <a href="<?php echo home_url('/dang-ky'); ?>">
                Đăng ký
            </a>
            tại đây
        </div>
    </form>
</section>

<script>
document.addEventListener("DOMContentLoaded", function(){
    const passwordInput = document.getElementById("password-input");
    const eyeIcon = document.getElementById("eye-icon");
    const hiddenIcon = "<?php echo get_template_directory_uri(); ?>/img/hidden.png";
    const viewIcon   = "<?php echo get_template_directory_uri(); ?>/img/view.png";

    document.getElementById("toggle-password").addEventListener("click", function(){
        const isHidden = passwordInput.type === "password";
        passwordInput.type = isHidden ? "text" : "password";
        eyeIcon.src = isHidden ? viewIcon : hiddenIcon;
    });
});
</script>

<script>
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>

<script>
document.addEventListener("DOMContentLoaded", function(){

    const form = document.getElementById("login-form");

    form.addEventListener("submit", function(e){

        e.preventDefault();

        let formData = new FormData();

        formData.append("action", "custom_ajax_login");
        formData.append(
            "username",
            form.querySelector('[name="log"]').value
        );

        formData.append(
            "password",
            form.querySelector('[name="pwd"]').value
        );

        fetch(ajaxurl,{
            method:"POST",
            body:formData
        })
        .then(response => response.json())
        .then(data => {

            if(data.success){

                window.location.href = data.redirect;

            }else{

                document.getElementById("login-error").innerHTML =
                    data.message;

            }

        });

    });

});
</script>