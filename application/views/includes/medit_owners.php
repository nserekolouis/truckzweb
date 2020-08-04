<div id="main">
  <h3 class="title">Edit Profile</h3>
  <h3 class="title">Enter Agents Information:</h3>
  <div class="row">
    <div id="infoMessage"><?php echo $message;?></div>
  </div>
  <div class="form">
    <?php echo form_open_multipart("auth/update_agent_information");?>
    <div class="form-item">
      <?php echo lang('create_user_fname_label', 'first_name');?> 
      <?php echo form_input($first_name);?>
    </div>
    <div class="form-item">
      <?php echo lang('create_user_lname_label', 'last_name');?> 
      <?php echo form_input($last_name);?>
    </div>
    <div class="form-item">
      <?php echo lang('create_user_email_label', 'email');?> 
      <?php echo form_input($email);?>
    </div>
    <div class="form-item">
      <?php echo lang('create_user_phone_label', 'phone');?> 
      <?php echo form_input($phone);?>
    </div>
    <div class="form-item">
      <?php echo lang('create_agent_ssn', 'ssn');?> 
      <?php echo form_input($ssn);?>
    </div>
    <div class="form-item">
        <img src="<?php echo base_url('/static/uploads/'.$current_picture);?>" style="width: 100px; height: 100px; object-fit:cover;">
                <?php echo form_upload($profile_picture);?>
    </div>
    <div class="form-item">
         <?php echo form_submit('submit', lang('create_user_submit_btn'));?>
    </div>
    <?php echo form_close();?>
  </div>
</div>
</div>