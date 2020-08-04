<div class="grid-item">
  <img src="<?php echo base_url('/static/uploads/'.$user['profile_picture'])?>"/>
  <div class="agent-details">
    <p class="agent-name">
      <?php echo htmlspecialchars('Name:',ENT_QUOTES,'UTF-8');?>
      <?php echo htmlspecialchars($user['first_name'],ENT_QUOTES,'UTF-8');?>
      <?php echo htmlspecialchars($user['second_name'],ENT_QUOTES,'UTF-8');?>
    </p>
    <?php if($user['active']):?>
    <p class="agent-status">Status:</p>
    <?php else:?>
    <p class="agent-status">Status:</p>
    <?php endif;?>
      <?php echo ($user['active']) ? anchor("auth/deactivate_agent/".$user['id'], 
              lang('index_active_link')) : anchor("auth/activate_agent/". $user['id'],
              lang('index_inactive_link'));?>
    <div class="phone">
      <img src="<?php echo base_url('/static/images/icons/ic_phonenumber.png');?>" width="23" height="23"/>
      <?php echo htmlspecialchars($user['phonenumber'],ENT_QUOTES,'UTF-8');?>
    </div>
    <div class="email">
      <img src="<?php echo base_url('/static/images/icons/ic_email.png');?>" width="23" height="23" />
      <p class="agent-email">
        <?php echo htmlspecialchars($user['email'],ENT_QUOTES,'UTF-8');?>
      </p>
    </div>
    <div class="grid-item-inner">
      <form class="form-agent" action="<?php echo base_url('auth/edit_agent/'.$user['id']);?>">
        <input type="submit" value="Edit" />
      </form>
      <label class="agent-id">
        <?php echo htmlspecialchars($user['id'],ENT_QUOTES,'UTF-8');?>
      </label>
    </div>
  </div>
</div>