
<section class="section-form-login">
    <div class="login-title-pass">
        Đặt lại mật khẩu
    </div>

    <form id="reset-password-form">

        <div class="form-field password-field">
            <div class="icon">
                <img src="<?php echo get_template_directory_uri() ?>/img/locked.png" width="20">
            </div>

            <input type="password"
                id="r-reset-password-input"
                placeholder="Nhập mật khẩu mới">

            <div class="icon-eye" id="r-toggle-reset-password">
                <img id="r-reset-eye-icon"
                    src="<?php echo get_template_directory_uri() ?>/img/hidden.png"
                    width="20">
            </div>
        </div>

        <div class="form-field password-field">
            <div class="icon">
                <img src="<?php echo get_template_directory_uri() ?>/img/locked.png" width="20">
            </div>

            <input type="password"
                id="r-reset-confirm-password-input"
                placeholder="Nhập lại mật khẩu">

            <div class="icon-eye" id="r-toggle-reset-confirm-password">
                <img id="r-reset-confirm-eye-icon"
                    src="<?php echo get_template_directory_uri() ?>/img/hidden.png"
                    width="20">
            </div>
        </div>

        <div class="login-error" id="r-reset-password-error"></div>

        <ul class="password-rule">
            <li id="reset-rule-length">
                Mật khẩu tối thiểu 8 ký tự
            </li>

            <li id="reset-rule-uppercase">
                Chứa ít nhất 1 ký tự viết hoa
            </li>

            <li id="reset-rule-number">
                Chứa ít nhất 1 ký tự số
            </li>
        </ul>

        <button type="button"
                class="btn-confirm"
                id="r-btn-reset-password"
                disabled>
            Cập nhật mật khẩu
        </button>

    </form>

</section>

<script>
document.addEventListener("DOMContentLoaded", function(){
    initPasswordForm({

        passwordId: "r-reset-password-input",
        confirmId: "r-reset-confirm-password-input",
        buttonId: "r-btn-reset-password",
        errorId: "r-reset-password-error",

        togglePasswordId: "r-toggle-reset-password",
        toggleConfirmId: "r-toggle-reset-confirm-password",

        eyePasswordId: "r-reset-eye-icon",
        eyeConfirmId: "r-reset-confirm-eye-icon",

        ruleLength: "reset-rule-length",
        ruleUppercase: "reset-rule-uppercase",
        ruleNumber: "reset-rule-number",

        viewIcon: "<?php echo get_template_directory_uri(); ?>/img/view.png",
        hiddenIcon: "<?php echo get_template_directory_uri(); ?>/img/hidden.png"
    });
});
</script>

<script>
document.getElementById("r-btn-reset-password").addEventListener("click", async function(){
    const phone = sessionStorage.getItem("forgot_phone");
    const password =document.getElementById("r-reset-password-input").value;
    const error =document.getElementById("r-reset-password-error");
    const btn =document.getElementById("r-btn-reset-password");

    btn.disabled = true;
    btn.innerHTML = "Đang cập nhật...";

    try{
        const formData = new FormData();
        formData.append("action","custom_reset_password");
        formData.append("phone",phone);
        formData.append("password",password);

        const response = await fetch("<?php echo admin_url('admin-ajax.php'); ?>",
            {
                method:"POST",
                body:formData
            }
        );

        const result = await response.json();
        if(!result.success){
            error.innerHTML = result.data.message;
            btn.disabled = false;
            btn.innerHTML = "Cập nhật mật khẩu";
            return;
        }

        sessionStorage.removeItem("forgot_phone");
        sessionStorage.removeItem("otp_type");
        const successPopup = document.getElementById("reset-success-popup");

        successPopup.classList.add("show");
        setTimeout(() => {
            window.location.href = result.data.redirect;
        }, 1200);
    }catch(err){
        error.innerHTML = "Có lỗi xảy ra";
        btn.disabled = false;
        btn.innerHTML = "Cập nhật mật khẩu";
    }
});
</script>