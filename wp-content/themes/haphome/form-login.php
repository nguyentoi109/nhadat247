<style> 
.login-error{
    margin:10px 0;
    padding:10px;
    color:#d63638;
    background:#fff2f2;
    border:1px solid #ffcaca;
    border-radius:6px;
    font-size:14px;
}

body.popup-open{
    overflow:hidden !important;
    height:100vh;
}
</style>

<?php
$error_message = '';
$open_login_popup = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['custom_login'])) {

    $creds = array(
        'user_login'    => sanitize_text_field($_POST['log']),
        'user_password' => $_POST['pwd'],
        'remember'      => true
    );

    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {

        $error_message = 'Tên hoặc mật khẩu của bạn không đúng';
        $open_login_popup = true;

    } else {

        wp_redirect(home_url());
        exit;
    }
}
?>
<section class="section-form-login">
  <form method="post" action="<?php echo home_url('/'); ?>">

    <div class="">
        <label>Tên đăng nhập</label>
        <input type="text" name="log" value="<?php echo isset($_POST['log']) ? esc_attr($_POST['log']) : ''; ?>" required>
    </div>

    <div class="">
        <label>Mật khẩu</label>
        <input type="password" name="pwd" required>
    </div>

    <?php if (!empty($error_message)) : ?>
        <div class="login-error">
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>

    <div class="">
        <button type="submit" name="custom_login">
            Đăng nhập
        </button>
    </div>

</form>
  <a href="<?php echo wp_lostpassword_url(); ?>">
      Lấy lại mật khẩu
  </a>
</section>
<?php if($open_login_popup): ?>

<script>
document.addEventListener("DOMContentLoaded", function(){

    document.querySelector('.user .popup-wrapper')
        .classList.add('show');

    document.querySelector('.user .mask-popup')
        .classList.add('show');

});
</script>
<?php endif; ?>