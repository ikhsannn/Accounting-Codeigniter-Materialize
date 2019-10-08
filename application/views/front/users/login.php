<!DOCTYPE html>
<html lang="en">

<head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="msapplication-tap-highlight" content="no">
          <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
          <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
          <title>Login Page</title>

          <!-- Favicons-->
          <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
          <!-- Favicons-->
          <link rel="apple-touch-icon-precomposed" href="<?= base_url(); ?>assets/images/favicon/apple-touch-icon-152x152.png">
          <!-- For iPhone -->
          <meta name="msapplication-TileColor" content="#00bcd4">
          <meta name="msapplication-TileImage" content="<?= base_url(); ?>assets/images/favicon/mstile-144x144.png">
          <!-- For Windows Phone -->


          <!-- CORE CSS-->

          <link href="<?= base_url(); ?>assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
          <link href="<?= base_url(); ?>assets/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
          <!-- Custome CSS-->
          <link href="<?= base_url(); ?>assets/css/custom/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
          <link href="<?= base_url(); ?>assets/css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

          <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
          <link href="<?= base_url(); ?>assets/js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
          <link href="<?= base_url(); ?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

</head>

<body class="cyan">
          <!-- Start Page Loading -->
          <div id="loader-wrapper">
                    <div id="loader"></div>
                    <div class="loader-section section-left"></div>
                    <div class="loader-section section-right"></div>
          </div>
          <!-- End Page Loading -->



          <div id="login-page" class="row">
                    <div class="col s12 z-depth-4 card-panel">
                              <?php echo form_open("auth/login"); ?>
                              <div class="row">
                                        <div class="input-field col s12 center">
                                                  <img src="<?= base_url(); ?>assets/images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
                                                  <h5 class="center">Silahkan Masuk ke dalam akun !!!</h5>
                                        </div>
                              </div>
                              <div class="row margin">
                                        <div class="input-field col s12">
                                                  <i class="mdi-social-person-outline prefix"></i>
                                                  <?php echo form_input($identity); ?>
                                                  <label for="username" class="center-align">Username</label>
                                        </div>
                              </div>
                              <div class="row margin">
                                        <div class="input-field col s12">
                                                  <i class="mdi-action-lock-outline prefix"></i>
                                                  <?php echo form_input($password); ?>
                                                  <label for="password">Password</label>
                                        </div>
                              </div>
                              <div class="row">
                                        <div class="input-field col s12 m12 l12  login-text">
                                                  <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
                                                  <label for="remember-me">Remember me</label>
                                        </div>
                              </div>
                              <div class="row">
                                        <div class="input-field col s12">
                                                  <?php echo form_submit($login, 'Login'); ?>
                                        </div>
                              </div>
                              <div class="row">
                                        <div class="input-field col s6 m6 l6">
                                                  <p class="margin medium-small"><a href="page-register.html">Register Now!</a></p>
                                        </div>
                                        <div class="input-field col s6 m6 l6">
                                                  <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
                                        </div>
                              </div>

                              <?php echo form_close(); ?>
                    </div>
          </div>



          <!-- ================================================
    Scripts
    ================================================ -->

          <!-- jQuery Library -->
          <script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/jquery-1.11.2.min.js"></script>
          <!--materialize js-->
          <script type="text/javascript" src="<?= base_url(); ?>assets/js/materialize.min.js"></script>
          <!--prism-->
          <script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/prism/prism.js"></script>
          <!--scrollbar-->
          <script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

          <!--plugins.js - Some Specific JS codes for Plugin Settings-->
          <script type="text/javascript" src="<?= base_url(); ?>assets/js/plugins.min.js"></script>
          <!--custom-script.js - Add your own theme custom JS-->
          <script type="text/javascript" src="<?= base_url(); ?>assets/js/custom-script.js"></script>

</body>

</html>