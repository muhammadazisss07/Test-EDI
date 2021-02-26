<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Online Test~EDI</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="register-box">
        <form id="formRegister" class="login-form" method="POST">
          <h3 class="login-head">
            Sign Up
          </h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Email" required autocomplete="off">
            <span id="errEmail"></span>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required autocomplete="off">
          </div>
          <div class="form-group">
            <label class="control-label">CONFRIM PASSWORD</label>
            <input class="form-control" type="password" name="password1" id="password1" placeholder="Re-type Password" required autocomplete="off">
            <span id="errConfirmPassword"></span>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"></i>SIGN UP</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="<?php echo base_url('Login'); ?>"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
      });

      $('#formRegister').on('submit', function(e) {
        var err_email = '';
        var err_pass = '';

        var email = $('#email').val();
        var pass = $('#password').val();
        var pass1 = $('#password1').val();
        
        $.ajax({
          method: 'POST',
          url: '<?= base_url("Login/cek_email"); ?>',
          data: {
              email: email
          },
          async: false
        }).done(function(res) {
          if (res == 'exist') {
            err_email = 'Email already exist';
          } else {
            err_email = '';
          }
        });

        if (err_email != '') {
          e.preventDefault();
          $('#errEmail').text(err_email).css({ 'color': 'red' });
        } else {
          $('#errEmail').empty();
          err_email = '';
        }

        if (pass != pass1) {
          err_pass = 'Confirm password doesn\'t match';
          $('#errConfirmPassword').text(err_pass).css({ 'color': 'red' });
        } else {
          err_pass = '';
          $('#errConfirmPassword').empty();
        }

        if (err_email == '' && err_pass == '') {
          $('#formRegister').attr('action', '<?php echo base_url('Login/doRegister'); ?>');
        }

      })

    </script>
  </body>
</html>