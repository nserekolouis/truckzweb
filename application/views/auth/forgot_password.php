<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/static/design/login.css')?>"/>
</head>
<body>
    <div class="main">
       <div class="wrapper_parent">
           <h1 style="color:white;"><?php echo lang('forgot_password_heading');?></h1>
           <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
           <div id="infoMessage"><?php echo $message;?></div>
            <?php echo form_open("auth/forgot_password");?>
          <div class="container-fluid">
          	   <div class="wrapper_parent">
          	        <div class="wrapper_child">
	        		        <p>
	        			      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label>
	        		         </p>
	        		          <p>
	        		         	<?php echo form_input($identity);?>
	        		         </p>
          	        </div>
          	   </div>
          </div>
          <div class="container-fluid">
          	   <div class="wrapper_parent">
          	        <div class="wrapper_child">
	        			     <p>
	        			       <?php echo form_submit('submit', lang('forgot_password_submit_btn'));?>
	        			     </p>
          	        </div>
          	   </div>
          </div>
           <?php echo form_close();?>
       </div> 
     </div>
</body>
</html>
