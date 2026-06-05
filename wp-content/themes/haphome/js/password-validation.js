function initPasswordForm(config){

    const passwordInput =
        document.getElementById(config.passwordId);

    const confirmPasswordInput =
        document.getElementById(config.confirmId);

    const btnConfirm =
        document.getElementById(config.buttonId);

    const errorBox =
        document.getElementById(config.errorId);

    const togglePassword =
        document.getElementById(config.togglePasswordId);

    const toggleConfirmPassword =
        document.getElementById(config.toggleConfirmId);

    const eyePassword =
        document.getElementById(config.eyePasswordId);

    const eyeConfirm =
        document.getElementById(config.eyeConfirmId);

    // show/hide password
    togglePassword.addEventListener("click", function(){

        if(passwordInput.type === "password"){
            passwordInput.type = "text";
            eyePassword.src = config.viewIcon;
        }else{
            passwordInput.type = "password";
            eyePassword.src = config.hiddenIcon;
        }
    });

    // show/hide confirm
    toggleConfirmPassword.addEventListener("click", function(){

        if(confirmPasswordInput.type === "password"){
            confirmPasswordInput.type = "text";
            eyeConfirm.src = config.viewIcon;
        }else{
            confirmPasswordInput.type = "password";
            eyeConfirm.src = config.hiddenIcon;
        }
    });

    function validatePassword(){

        const password =
            passwordInput.value.trim();

        const confirmPassword =
            confirmPasswordInput.value.trim();

        const hasLength =
            password.length >= 8;

        const hasUppercase =
            /[A-Z]/.test(password);

        const hasNumber =
            /[0-9]/.test(password);

        document.getElementById(config.ruleLength)
            .classList.toggle("valid", hasLength);

        document.getElementById(config.ruleUppercase)
            .classList.toggle("valid", hasUppercase);

        document.getElementById(config.ruleNumber)
            .classList.toggle("valid", hasNumber);

        const isMatch =
            password === confirmPassword &&
            confirmPassword !== "";

        if(confirmPassword !== "" && !isMatch){

            errorBox.style.display = "block";
            errorBox.innerHTML =
                "Mật khẩu nhập lại không khớp";

        }else{

            errorBox.style.display = "none";
        }

        btnConfirm.disabled = !(
            hasLength &&
            hasUppercase &&
            hasNumber &&
            isMatch
        );
    }

    passwordInput.addEventListener(
        "input",
        validatePassword
    );

    confirmPasswordInput.addEventListener(
        "input",
        validatePassword
    );
}