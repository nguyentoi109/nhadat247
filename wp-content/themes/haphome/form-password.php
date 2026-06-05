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

        <button type="button" class="btn-confirm" id="s-btn-confirm" disabled> Đăng ký </button>
    </form>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
         initPasswordForm({

            passwordId: "s-password-input",
            confirmId: "s-confirm-password-input",
            buttonId: "s-btn-confirm",
            errorId: "s-confirm-password-error",

            togglePasswordId: "s-toggle-password",
            toggleConfirmId: "s-toggle-confirm-password",

            eyePasswordId: "s-eye-icon-password",
            eyeConfirmId: "s-eye-icon-confirm",

            ruleLength: "rule-length",
            ruleUppercase: "rule-uppercase",
            ruleNumber: "rule-number",

            viewIcon: "<?php echo get_template_directory_uri(); ?>/img/view.png",
            hiddenIcon: "<?php echo get_template_directory_uri(); ?>/img/hidden.png"
        });
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", function(){
    const btnConfirm = document.getElementById("s-btn-confirm");

    btnConfirm.addEventListener("click", async function(){
        const phone = sessionStorage.getItem("register_phone");
        const password = document.getElementById("s-password-input").value;
        const errorBox = document.getElementById("s-confirm-password-error");
        btnConfirm.disabled = true;
        btnConfirm.innerHTML = "Đang tạo tài khoản...";

        try{
            const formData = new FormData();
            formData.append("action","register_user");
            formData.append("phone",phone);
            formData.append("password",password);

            const response = await fetch("<?php echo admin_url('admin-ajax.php'); ?>",
                {
                    method: "POST",
                    body: formData
                }
            );

            const result = await response.json();
            if(!result.success){
                errorBox.innerHTML = result.data.message;
                btnConfirm.disabled = false;
                btnConfirm.innerHTML = "Đăng ký";
                return;
            }

            sessionStorage.removeItem("register_phone");
            const successPopup = document.getElementById("success-popup");
            successPopup.classList.add("show");

            setTimeout(() => {
                window.location.href = result.data.redirect;
            }, 1200);
        }catch(error){
            errorBox.innerHTML ="Có lỗi xảy ra";
            btnConfirm.disabled = false;
            btnConfirm.innerHTML = "Tiếp tục";
        }
    });
});
</script>