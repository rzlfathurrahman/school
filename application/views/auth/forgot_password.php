<!DOCTYPE html>
<html lang="en">
<head>
  <title>
    <?php if ($this->uri->segment(2) == 'login' ): ?>
      <?= lang('login_heading');?>
    <?php elseif($this->uri->segment(2) == 'forgot_password') : ?>
      <?=lang('forgot_password_heading');?>
    <?php elseif($this->uri->segment(2) == 'create_user'): ?>
      <?= lang('create_user_heading');?>
    <?php endif; ?>
      
  </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="<?= base_url('assets/frontend/login/') ?>images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/login/') ?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/login/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/login/') ?>fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/login/') ?>vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/login/') ?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/login/') ?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/login/') ?>vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/login/') ?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/login/') ?>css/util.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/login/') ?>css/main.css">
<!--===============================================================================================-->
</head>
<body>
<div class="limiter">
    <div class="container-login100"style="background-image: url('<?= base_url('assets/frontend/login/') ?>images/bg-01.jpg');">
      <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
        <form class="login100-form validate-form" action="<?= base_url('auth/forgot_password') ?>" method="post">
          <span class="login100-form-title p-b-49">
            <?=lang('forgot_password_heading');?>
          </span>
          
          <?php if (!empty($message)): ?>
            <div class="alert alert-secondary" role="alert">
              <strong><?= $message ?></strong>
            </div>                      
          <?php endif; ?>          

          <div class="alert alert-primary" role="alert">
            <strong><?= sprintf(lang('forgot_password_subheading'), $identity_label);?></strong>
          </div>

          <div class="wrap-input100 validate-input m-b-23" data-validate = "Username / Email wajib diisi !">
            <span class="label-input100"> Email</span>
            <input class="input100" type="email"  name="identity" autofocus="" placeholder="Masukan Username / Email">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
          </div>
          
          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button type="submit" class="login100-form-btn">
                Kirim
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
<!--===============================================================================================-->
  <script src="<?= base_url('assets/frontend/login/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?= base_url('assets/frontend/login/') ?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="<?= base_url('assets/frontend/login/') ?>vendor/bootstrap/js/popper.js"></script>
  <script src="<?= base_url('assets/frontend/login/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?= base_url('assets/frontend/login/') ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?= base_url('assets/frontend/login/') ?>vendor/daterangepicker/moment.min.js"></script>
  <script src="<?= base_url('assets/frontend/login/') ?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="<?= base_url('assets/frontend/login/') ?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="<?= base_url('assets/frontend/login/') ?>js/main.js"></script>

</body>
</html>