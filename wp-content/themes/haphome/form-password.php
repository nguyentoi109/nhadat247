<style>

.password-popup{
    opacity:0;
    visibility:hidden;
}

.password-popup.show{
    opacity:1;
    visibility:visible;
}

.login-title-pass{
    font-size:24px;
    font-weight:500;
    line-height: 32px;
    color:#2c2c2c;
    margin-bottom:30px;
    letter-spacing: -0.2px;
    font-family: "Lexend";
}

.password-field{
    position:relative;
    margin-bottom:16px;
}

.icon-eye{
    position:absolute;
    right:15px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
    z-index:10;
}

.password-field input{
    width:100%;
    height:58px;
    border:1px solid #ccc;
    border-radius:8px;
    padding:0 50px;
    font-size:16px;
}

.password-rule{
    list-style:none;
    padding:0;
    margin-top:15px;
}

.password-rule li{
    color:#999;
    margin-bottom:8px;
    position:relative;
    padding-right:30px;
    font-family:"Roboto";
    font-size:14px;
    line-height:20px;
}

.password-rule li.valid{
    color:#27ae60;
}

.password-rule li.valid::after{
    content:'';
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    width:16px;
    height:16px;
    background:url('<?php echo get_template_directory_uri(); ?>/img/check.png') no-repeat center center;
    background-size:contain;
    margin-left: 20px;
}
</style>

<section class="section-form-login">
    <div class="login-title-pass">
        Tạo mật khẩu
    </div>
    <form id="s-password-form">
        <div class="form-field password-field">
            <div class="icon">
                <img src="<?php echo get_template_directory_uri() ?>/img/locked.png" width="20">
            </div>
            <input type="password" id="s-password-input" name="password" placeholder="Nhập mật khẩu" required>
            <div class="icon-eye" id="s-toggle-password">
                <img id="s-eye-icon-password"src="<?php echo get_template_directory_uri() ?>/img/hidden.png" width="20">
            </div>
        </div>

        <div class="form-field confirm-password-field">
            <div class="icon">
                <img src="<?php echo get_template_directory_uri() ?>/img/locked.png" width="20">
            </div>
            <input type="password" id="s-confirm-password-input" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
            <div class="icon-eye" id="s-toggle-confirm-password">
                <img id="s-eye-icon-confirm" src="<?php echo get_template_directory_uri() ?>/img/hidden.png" width="20">
            </div>
        </div>

        <div class="login-error" id="s-confirm-password-error"></div>

        <ul class="password-rule">
            <li id="rule-length">Mật khẩu tối thiểu 8 ký tự</li>
            <li id="rule-uppercase">Chứa ít nhất 1 ký tự viết hoa</li>
            <li id="rule-number">Chứa ít nhất 1 ký tự số</li>
        </ul>

        <button type="button" class="btn-confirm" id="s-btn-confirm" disabled> Tiếp tục </button>
    </form>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const passwordInput = document.getElementById("s-password-input");
        const confirmPasswordInput = document.getElementById("s-confirm-password-input");
        const btnConfirm = document.getElementById("s-btn-confirm");
        const errorBox = document.getElementById("s-confirm-password-error");
        const togglePassword = document.getElementById("s-toggle-password");
        const toggleConfirmPassword = document.getElementById("s-toggle-confirm-password");
        const eyePassword = document.getElementById("s-eye-icon-password");
        const eyeConfirm =  document.getElementById("s-eye-icon-confirm");

        // VIEW / HIDDEN PASSWORD
        togglePassword.addEventListener("click", function () {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyePassword.src = "<?php echo get_template_directory_uri(); ?>/img/view.png";
            } else {
                passwordInput.type = "password";
                eyePassword.src = "<?php echo get_template_directory_uri(); ?>/img/hidden.png";
            }
        });

        // VIEW / HIDDEN CONFIRM PASSWORD
        toggleConfirmPassword.addEventListener("click", function () {
            if (confirmPasswordInput.type === "password") {
                confirmPasswordInput.type = "text";
                eyeConfirm.src = "<?php echo get_template_directory_uri(); ?>/img/view.png";
            } else {
                confirmPasswordInput.type = "password";
                eyeConfirm.src = "<?php echo get_template_directory_uri(); ?>/img/hidden.png";
            }
        });

        // VALIDATE
        function validatePassword() {
            const password = passwordInput.value.trim();
            const confirmPassword = confirmPasswordInput.value.trim();
            const hasLength = password.length >= 8;
            const hasUppercase = /[A-Z]/.test(password);
            const hasNumber = /[0-9]/.test(password);

            document.getElementById("rule-length").classList.toggle("valid", hasLength);
            document.getElementById("rule-uppercase").classList.toggle("valid", hasUppercase);
            document.getElementById("rule-number").classList.toggle("valid", hasNumber);

            const isMatch = password === confirmPassword && confirmPassword !== "";
            if (confirmPassword !== "" && !isMatch) {
                errorBox.style.display = "block";
                errorBox.innerHTML = "Mật khẩu nhập lại không khớp";
            } else {
                errorBox.style.display = "none";
            }
            btnConfirm.disabled = !( hasLength && hasUppercase && hasNumber && isMatch
            );
        }
        passwordInput.addEventListener("input", validatePassword);
        confirmPasswordInput.addEventListener("input",validatePassword);
    });
</script>