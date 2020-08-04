<h3 class="title">Register Agent</h3>
<h4 class="title">Enter Agents Information:</h4>
<div id="main">
  <div class="form">
    <div class="main">
      <?php if(!empty($message)):?>
        <div class="form-item">
          <p id="infoMessage"><?php echo $message;?></p>
        </div>
      <?php endif;?>  

      <div class="form">
        <?php echo form_open_multipart("auth/create_agent");?>
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
          <?php echo lang('create_select_identification_type', 'drop_down');?> 
          <?php echo form_dropdown($drop_down);?>
        </div>
        <div class="form-item">
          <?php echo lang('create_agent_ssn', 'ssn');?> 
          <?php echo form_input($ssn);?>
        </div>
        <div class="form-item">
          <img src="<?php echo base_url('/static/uploads/'.$current_picture);?>">
          <?php echo form_upload($profile_picture);?>
        </div>
        <div  class="form-item">
          <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>
        </div>
    </div>
    <?php echo form_close();?>
  </div>
</div>
</div>