<!DOCTYPE html>
<html>
<head>
  <title><?php echo lang('edit_agent_heading');?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
      ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #0071bc;
      }

      li {
        float: left;
      }

      li a, .dropbtn {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-weight: bold;
      }

      li a:hover, .dropdown:hover .dropbtn 
      {
        background-color: #6A98BC;
        text-decoration: none;
      }
        
      li.dropdown {
        display: inline-block;
      }

      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }

      .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
      }

      .dropdown-content a:hover {background-color: #f1f1f1}

      .dropdown:hover .dropdown-content {
        display: block;
      }

      .main
      {
       margin: auto;
       width: 50%;
       border: 0px solid green;
       padding: 10px;
       text-align: center;
      }

      .main2
      {
       display: inline-block;
       border: 0px solid green;
       text-align: left;
      }

      input[type=submit] 
      {
      padding: 5px 15px;
      background: #35a049;
      border: 0 none;
      cursor: pointer;
      -webkit-border-radius: 5px;
      border-radius: 5px;
      color: white;
      width: 200px;
      }

      input[type=text]
       {
          padding:5px; 
          border:2px solid #ccc; 
          -webkit-border-radius: 5px;
          border-radius: 5px;
          color: black;
      }
      
      

    </style>
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
    <ul>
      <li><a href="<?php echo base_url('auth')?>">Truckz Admin panel</a></li>
      <li style = "float: right;"><a href="<?php echo base_url('auth/logout');?>">Logout</a></li>
      <li style = "float: right;"><a href="<?php echo base_url('main/view_truck_categories');?>">View truck categories</a></li>
      <li style = "float: right;"><a href="<?php echo base_url('main/view_truck_owners');?>">View truck owners</a></li>
      <li style = "float: right;"><a href="<?php echo base_url('auth/create_agent');?>">Create Agent</a></li>
      <li style = "float: right;"><a href="<?php echo base_url('main/get_orders');?>">Orders</a></li>
    </ul>

<p><?php echo lang('edit_agent_subheading');?></p>

<div id="infoMessage" style="color:red"><?php echo $message;?></div>

<?php echo form_open_multipart("auth/update_agent_information");?>
     
     <p style="display: none;">
       <?php echo form_input($id)?>
     </p>

     <p>
       <img src="<?php echo base_url('/static/uploads/'.$current_picture);?>" style="width: 100px; height: 100px;">
       <p>
         <?php echo lang('upload_agent_photo', 'profile picture');?> <br />
         <?php echo form_upload($profile_picture);?>
       </p>
     </p> 

      <p>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>
      
      <!-- <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?> -->

      <!-- <p>
            <?php echo lang('create_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </p> -->

      <p>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>

      <!-- <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p> -->

      <!-- <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
      </p> -->

      <p>
            <?php echo lang('create_select_identification_type', 'drop_down');?> <br />
            <?php echo form_dropdown($drop_down);?>
      </p>

       <p>
            <?php echo lang('create_agent_ssn', 'ssn');?> <br />
            <?php echo form_input($ssn);?>
      </p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>


<?php echo form_close();?>

<p><?php echo anchor('auth/logout', lang('create_agent_logout_btn'))?> 
</body>
</html>
<!-- <h1><?php echo lang('edit_agent_heading');?></h1> -->
