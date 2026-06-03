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
            <a href="javascript:void(0)" class="open-register-from-login">
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