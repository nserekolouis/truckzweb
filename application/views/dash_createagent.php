<!DOCTYPE html>
<html>
<head>
	<title>Create Agent</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('/static/design/w3.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/static/design/createagent.css')?>"/>
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
<?php include('includes/sidenav.php')?>
<div id="main">
  <h3>Register Agent</h3>
  <div class="topbar">
     <p style="color:white; margin:auto; padding:15px; font-size: 16px;">Enter Agents Information: </p>
  </div>
     <div class="form">
       <div class="main">
         <div class="container-fluid" style="margin-top: 10px;">
             <div class="main2">
                <div id="infoMessage" style="color: red;"><?php echo $message;?></div>
             </div>
         </div>
      </div>

  <div class="main1">
      <?php echo form_open_multipart("auth/create_agent");?>

      <div class="wrapper_parent">
        <div class="main2">
            <p>
                  <?php echo lang('create_user_fname_label', 'first_name');?> 
                  <?php echo form_input($first_name);?>
            </p>
        </div>
        <div class="main2">
           <p>
                 <?php echo lang('create_user_lname_label', 'last_name');?> 
                 <?php echo form_input($last_name);?>
           </p>
        </div>
      </div>

      <div class="wrapper_parent">
          <div class="main2">
             <p>
                 <?php echo lang('create_user_email_label', 'email');?> 
                 <?php echo form_input($email);?>
             </p>
          </div>
          <div class="main2">
            <p>
                  <?php echo lang('create_user_phone_label', 'phone');?> 
                  <?php echo form_input($phone);?>
            </p>
          </div>
      </div>

      <div class="wrapper_parent">
       
      </div>

 <!-- <div class="container-fluid">
   <div class="main2">
            <p>
                  <?php echo lang('create_user_fname_label', 'first_name');?> <br/>
                  <?php echo form_input($first_name);?>
            </p>
        </div>
 </div> -->

 <!-- <div class="container-fluid">
   <div class="main2">
      <p>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br/>
            <?php echo form_input($last_name);?>
      </p>
   </div>
 </div> -->

 <div class="container-fluid">
   <div class="main2">
         <p>
                <?php echo lang('create_select_identification_type', 'drop_down');?> 
                <?php echo form_dropdown($drop_down);?>
         </p>
      </div>
    <div class="main2">
       <p>
            <?php echo lang('create_agent_ssn', 'ssn');?> 
            <?php echo form_input($ssn);?>
      </p>
   </div>
 </div>


 <!-- <div class="container-fluid">
   <div class="main2">
      <p>
          <?php echo lang('create_user_email_label', 'email');?> <br/>
          <?php echo form_input($email);?>
      </p>
   </div>
 </div> -->



 <!-- <div class="container-fluid">
   <div class="main2">
      <p>
            <?php echo lang('create_user_phone_label', 'phone');?> <br/>
            <?php echo form_input($phone);?>
      </p>
   </div>
 </div> -->

 <!-- <div class="container-fluid">
   <div class="main2">
      <p>
             <?php echo lang('create_select_identification_type', 'drop_down');?> <br/>
             <?php echo form_dropdown($drop_down);?>
      </p>
   </div>
 </div> -->

 <!-- <div class="container-fluid">
   <div class="main2">
       <p>
            <?php echo lang('create_agent_ssn', 'ssn');?> <br/>
            <?php echo form_input($ssn);?>
      </p>
   </div>
 </div> -->

      <div class="container-fluid">
          <div class="main2">
              <p>
                <!-- <?php echo lang('upload_agent_photo', 'profile picture');?> <br/> -->
                <?php echo form_upload($profile_picture);?>
              </p> 
          </div>
          <div  class="main2">
               <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>
          </div>
      </div>

<?php echo form_close();?>

  </div>
  </div>
</div>
</body>
</html>