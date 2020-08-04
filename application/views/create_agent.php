<!DOCTYPE html>
<html>
<head>
  <title><?php echo lang('create_agent_heading');?></title>
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

    input[type=text]{
        padding:5px;
        border:2px solid #ccc; 
        -webkit-border-radius: 5px;
        border-radius: 5px;
        color: black;
    }
  </style>
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

<div class="main">
   <div class="container-fluid" style="margin-top: 10px; ">
       <div class="main2">
          <div id="infoMessage" style="color: #0071bc;"><?php echo $message;?></div>
          <h2 style="color: #0071bc;"><?php echo lang('create_agent_subheading');?></h2>
       </div>
   </div>
</div>
  <!-- <div id="infoMessage" style="color:red"><?php echo $message;?></div>

  <div class="container">
    <p><?php echo lang('create_agent_subheading');?></p>
  </div> -->

  <div class="main">
      <?php echo form_open_multipart("auth/create_agent");?>

      <div class="container-fluid">
          <div class="main2">
              <p>
                <?php echo lang('upload_agent_photo', 'profile picture');?> <br />
                <?php echo form_upload($profile_picture);?>
              </p> 
          </div>
      </div>

 <div class="container-fluid">
   <div class="main2">
       <p>
             <?php echo lang('create_user_fname_label', 'first_name');?> <br />
             <?php echo form_input($first_name);?>
       </p>
   </div>
 </div>

 <div class="container-fluid">
   <div class="main2">
      <p>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>
   </div>
 </div>

 <div class="container-fluid">
   <div class="main2">
      <?php
           if($identity_column!=='email') {
               echo '<p>';
               echo lang('create_user_identity_label', 'identity');
               echo '<br />';
               echo form_error('identity');
               echo form_input($identity);
               echo '</p>';
           }
      ?>
   </div>
 </div>


 <div class="container-fluid">
   <div class="main2">
      <p>
          <?php echo lang('create_user_email_label', 'email');?> <br />
          <?php echo form_input($email);?>
      </p>
   </div>
 </div>



 <div class="container-fluid">
   <div class="main2">
      <p>
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>
   </div>
 </div>

 <div class="container-fluid">
   <div class="main2">
      <p>
             <?php echo lang('create_select_identification_type', 'drop_down');?> <br />
             <?php echo form_dropdown($drop_down);?>
      </p>
   </div>
 </div>

 <div class="container-fluid">
   <div class="main2">
       <p>
            <?php echo lang('create_agent_ssn', 'ssn');?> <br />
            <?php echo form_input($ssn);?>
      </p>
   </div>
 </div>

<p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>
<?php echo form_close();?>

  </div>
</body>
</html>





