<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/static/design/login.css')?>"/>
  <link rel="apple-touch-icon" sizes="57x57" href="/static/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/static/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/static/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/static/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/static/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/static/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/static/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/static/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/static/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/static/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/static/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/static/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/static/favicon/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
</head>
<body>
  <div class="position">
     <div class="main-heading">
      <img src="<?php echo base_url('/static/images/clientslogo2.png');?>" width="80" height="80"/>
    <div class="row">
      <p>ADMIN</p></div>
    <p><?php echo $message?></p>   
  </div>
  <div class="main-form" >
    <?php echo form_open("auth/login");?>
    <div class="wrapper_parent">
        <div class = "row">
<!--      <?php echo lang('login_identity_label', 'identity');?> -->
          <?php echo form_input($identity);?>
        </div>
        <div class = "row">
<!--      <?php echo lang('login_password_label', 'password');?> -->
          <?php echo form_input($password);?>
        </div>
    </div>
    
      <div class="wrapper_parent">
          <div class = "row">
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
            <?php echo lang('login_remember_label', 'remember');?>
            <?php echo form_submit($submit, lang('login_submit_btn'));?>
          </div>
      </div>
      <?php echo form_close();?>
    
    <div class="wrapper_parent">
        <p style="float: right;font-weight:normal;font-size:14px; margin-top:5px;">
          <a style="color:white;" href="forgot_password"><?php echo lang('login_forgot_password');?></a>
        </p>
    </div>
  </div>
  <div class="row">
<!--     <div class="column">
       <img src="<?php echo base_url('/static/images/truckimage4.png');?>" width="140" height="74"/>
    </div>
    <div class="column">
      <img src="<?php echo base_url('/static/images/truckone.PNG');?>" width="140" height="100"/>
    </div>
    <div class="column">
       <img src="<?php echo base_url('/static/images/trucktwo.PNG');?>" width="153" height="103"/>
    </div>
    <div class="column">
      <img src="<?php echo base_url('/static/images/truckimage3.png');?>" width="140" height="80"/>
    </div>
    <div class="column">
       <img src="<?php echo base_url('/static/images/truckimage4.png');?>" width="140" height="74"/>
    </div>
    <div class="column">
      <img src="<?php echo base_url('/static/images/truckone.PNG');?>" width="140" height="100"/>
    </div>
    <div class="column">
       <img src="<?php echo base_url('/static/images/trucktwo.PNG');?>" width="153" height="103"/>
    </div> -->
    <div class="column">
      <img src="<?php echo base_url('/static/images/trucksloginscreen.png');?>" width="480" height="120"/>
    </div>
  <div>
  </div>
</body>
</html>
