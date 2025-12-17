<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | <?= get_option('site_name'); ?></title>
  <link rel="stylesheet" href="<?= BASE_ASSET; ?>css/login/style.css">
</head>
<body>
  <div class="wrapper">
      
     <?= form_open('', [
        'name'    => 'form_login', 
        'id'      => 'form_login', 
        'method'  => 'POST'
      ]); ?>
      
      <h2>SIMONTORAN</h2>
      <h4>Sistem Informasi Monitoring Ajuan Keuangan<br>SETDA KABUPATEN MUARA ENIM</h4>
      <hr>
      <h3>LOGIN</h3>
      <h6>
          
           <?php if(isset($error) AND !empty($error)): ?>
         <div class="callout callout-error"  style="color:#C82626">
              <h4><?= cclang('error'); ?>!</h4>
              <p><?= $error; ?></p>
            </div>
    <?php endif; ?>
    <?php
    $message = $this->session->flashdata('f_message'); 
    $type = $this->session->flashdata('f_type'); 
    if ($message):
    ?>
     <p><?= $message; ?></p>
      <?php endif; ?>
          
      </h6>
        <div class="input-field">
        <input type="text" name="username" required>
        <label>Enter your username</label>
      </div>
      <div class="input-field">
        <input type="password" id="password" name="password" required>
        <label>Enter your password</label>
      </div>
      <!-- <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember">
          <p>Remember me</p>
        </label>
        <a href="#">Forgot password?</a>
      </div> -->
      <button type="submit">Log In</button>
      <!-- <div class="register">
        <p>Don't have an account? <a href="#">Register</a></p>
      </div> -->
     <?= form_close(); ?>
  </div>
</body>
</html>