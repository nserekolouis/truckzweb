<h1><?php echo lang('edit_towner_heading');?></h1>
<p><?php echo lang('edit_towner_subheading');?></p>

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

      <!-- <p>
            <?php echo lang('create_select_identification_type', 'drop_down');?> <br />
            <?php echo form_dropdown($drop_down);?>
      </p> -->

       <p>
            <?php echo lang('create_agent_ssn', 'ssn');?> <br />
            <?php echo form_input($ssn);?>
      </p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>


<?php echo form_close();?>

<p><?php echo anchor('auth/logout', lang('create_agent_logout_btn'))?> 