<style> 
.icon-back{
    filter: grayscale(100%);
    opacity: 0.4;
    margin-bottom: 24px;
}

.login-title-small{
    font-family: "Lexend";
    font-size: 18px;
    line-height: 24px;
    font-weight: 500;
    letter-spacing: -0.2px;
    color: #2c2c2c;
}

.title-otp{
    font-family: "Roboto";
    font-size: 16px;
    line-height: 20px;
    font-weight: 400;
    color: #2c2c2c;
    margin-bottom: 20px;
}

.otp-wrapper{
    display:flex;
    justify-content:center;
    gap:16px;
}

.otp-input{
    width: 50px;
    text-align: center;
    height: 58px;
    border: 1px solid rgb(204, 204, 204);
    background: rgb(255, 255, 255);
    border-radius: 4px;
    color: rgb(44, 44, 44);
    font-family: "Roboto";
    font-weight: 500;
    font-size: 18px;
}

.otp-expire-title{
    font-family: "Roboto";
    font-size: 13px;
    line-height: 16px;
    font-weight: 400;
    color: #999999;
    text-align: center;
    margin-top: 10px;
}

.otp-resend-wrap{
    text-align:center;
    margin-top:10px;
    font-size:14px;
    font-family: "Roboto";
    line-height: 16px;
    font-weight: 400;
    color: #2c2c2c;
}

#otp-resend-time{
    color:#e03c31;
    font-weight:400;
    font-size: 14px;
    line-height: 16px;
}

.resend-otp{
    color:#e03c31;
    font-weight:400;
    font-size: 14px;
    line-height: 16px;
}

.btn-confirm{
    font-family: 'Lexend';
    display: inline-block;
    width: 100%;
    height: 60px;
    border: none;
    border-radius: 8px;
    background: #e03c31;
    color: #ffffff;
    font-size: 16px;
    font-weight: 500;
    line-height: 20px;
    cursor: pointer;
    margin-top: 24px;
}
.btn-confirm:hover{
    background: #f0b4af;
}

.btn-confirm:disabled{
    background: #f0b4af;
    cursor: not-allowed;
    opacity: .7;
}
</style>

<section class="section-form-login">
    <div class="otp-back-wrap">
        <a href="javascript:void(0)" class="otp-back-btn">
           <img src="<?php echo get_template_directory_uri() ?>/img/arrow.png" width="20" class="icon-back">
        </a>
    </div>

    <div class="login-title-small">
        Nhập mã xác minh
    </div>
    <div id="otp-phone" class="title-otp" style="margin-top:8px;">
        Mã OTP đã được gửi tới số điện thoại của bạn
    </div>

    <form id="otp-form">
       <div class="otp-wrapper">
            <input type="text" class="otp-input" maxlength="1" inputmode="numeric">
            <input type="text" class="otp-input" maxlength="1" inputmode="numeric">
            <input type="text" class="otp-input" maxlength="1" inputmode="numeric">
            <input type="text" class="otp-input" maxlength="1" inputmode="numeric">
            <input type="text" class="otp-input" maxlength="1" inputmode="numeric">
            <input type="text" class="otp-input" maxlength="1" inputmode="numeric">
        </div>

        <div class="otp-expire-title" id="otp-message"> Mã có hiệu lực trong 3 phút </div>

        <div class="otp-resend-wrap" id="otp-countdown"> 
            <span>Gửi lại mã sau </span>
            <span id="otp-resend-time">01:00</span>
        </div>

        <button type="submit" class="btn-confirm" id="btn-con">
            Xác nhận
        </button>
    </form>
</section>

<script>
document.addEventListener("DOMContentLoaded", function(){

    const inputs = document.querySelectorAll(".otp-input");
    const btnConfirm = document.getElementById("btn-con");

    function checkOtpComplete(){

        let otp = '';

        inputs.forEach(input => {
            otp += input.value;
        });

        btnConfirm.disabled = otp.length !== 6;
    }

    inputs.forEach((input, index) => {

        input.addEventListener("input", function(){

            this.value = this.value.replace(/[^0-9]/g,'');

            if(this.value.length === 1 && index < inputs.length - 1){
                inputs[index + 1].focus();
            }

            checkOtpComplete();
        });

        input.addEventListener("keydown", function(e){

            if(e.key === "Backspace"){

                if(this.value === '' && index > 0){
                    inputs[index - 1].focus();
                }

                setTimeout(checkOtpComplete, 0);
            }

        });

    });

    inputs[0].addEventListener("paste", function(e){

        e.preventDefault();

        const data = e.clipboardData.getData("text").trim();

        if(/^\d{6}$/.test(data)){

            data.split('').forEach((num, index) => {
                inputs[index].value = num;
            });

            checkOtpComplete();
            inputs[5].focus();
        }

    });

    btnConfirm.disabled = true;

});
</script>

<script>
document.addEventListener("DOMContentLoaded", function(){
    function startOtpCountdown(){
        let time = 60;
        const countdownWrap = document.getElementById("otp-countdown");
        const countdownTime = document.getElementById("otp-resend-time");
        countdownWrap.innerHTML = ` <span>Gửi lại mã sau </span> <span id="otp-resend-time"> 01:00 </span>`;

        const timer = setInterval(function(){
            time--;
            let minutes = Math.floor(time / 60);
            let seconds = time % 60;
            let display = String(minutes).padStart(2,'0') + ':' + String(seconds).padStart(2,'0');

            document.getElementById('otp-resend-time').innerText = display;
            if(time <= 0){
                clearInterval(timer);
                countdownWrap.innerHTML = `Không nhận được mã? <a href="javascript:void(0)" id="resend-otp" class="resend-otp"> Gửi lại mã </a> `;
            }
        },1000);
    }
    startOtpCountdown();

    // Click gửi lại mã
    document.addEventListener("click", function(e){

        if(e.target.id === "resend-otp"){

            e.preventDefault();

            // TODO: AJAX gửi OTP tại đây

            startOtpCountdown();
        }
    });
});
</script>

<script>
    document.getElementById('otp-form').addEventListener('submit', function(e){
        e.preventDefault();
        let otp = '';
        document.querySelectorAll('.otp-input').forEach(input => {
                otp += input.value;
            });
        const msg = document.getElementById('otp-message');

        if(otp !== '123456'){
            msg.innerHTML ='Mã xác minh không hợp lệ';
            msg.style.color ='#e03c31';
            return;
        }
        document.querySelector('.otp-popup').classList.remove('show');
        document.querySelector('.otp-mask').classList.remove('show');
        document.querySelector('.password-popup').classList.add('show');
        document.querySelector('.password-mask').classList.add('show');
    });
</script>