<div class="grid-item">
  <img src="<?php echo base_url('/static/uploads/'.$owner['profile_picture'])?>"/>
  <div class="agent-details">
    <p  class="agent-name"><?php echo htmlspecialchars($owner['first_name'],ENT_QUOTES,'UTF-8');?> <?php echo htmlspecialchars($owner['second_name'],ENT_QUOTES,'UTF-8');?>
    </p>
    <?php if($owner['active']):?>
      <p class="agent-status">Status</p>
    <?php else:?>
      <p class="agent-status">Status</p>
    <?php endif;?>
    <?php echo ($owner['active']) ? anchor("main/deactivate_truck_owner/".$owner['id'], 
    lang('index_active_link')) : anchor("main/activate_truck_owner/". $owner['id'], lang('index_inactive_link'));?>
    <div class="phone">
      <img src="<?php echo base_url('/static/images/icons/ic_phonenumber.png');?>" width="23" height="23"/>
      <?php echo htmlspecialchars($owner['phonenumber'],ENT_QUOTES,'UTF-8');?>
    </div>
    <div class="email">
      <img src="<?php echo base_url('/static/images/icons/ic_email.png');?>" width="23" height="23" />
      <a href = "<?php echo base_url('main/show_owner_trucks/'.$owner['id']);?>"><?php echo htmlspecialchars($owner['email'],ENT_QUOTES,'UTF-8');?></a>
    </div>
    <p class="agent-name"><?php echo htmlspecialchars('SSN:'.$owner['ssn'],ENT_QUOTES,'UTF-8');?></p>
    <p class="agent-name"><?php echo htmlspecialchars('Company:'.$owner['company'],ENT_QUOTES,'UTF-8');?></p>
    <p class="agent-name"><?php echo htmlspecialchars('Position:'.$owner['position'],ENT_QUOTES,'UTF-8');?></p>
    <p class="agent-name"><?php echo htmlspecialchars('Wallet: '.$owner['amount'],ENT_QUOTES,'UTF-8');?></p>
    <div class="grid-item-inner">
      <form class="form-agent" action="<?php echo base_url('main/edit_truck_owner/'.$owner['id']);?>">
        <input type="submit" value="Edit" />
      </form>
      <label class="agent-id">
        <?php echo htmlspecialchars($owner['id'],ENT_QUOTES,'UTF-8');?>
      </label>
    </div>
  </div>
</div>
        
    