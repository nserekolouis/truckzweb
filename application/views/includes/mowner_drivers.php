<h3 class="title"><a href="<?php echo base_url('main/show_owner_trucks/').$owner_id;?>">Trucks</a> | 
   <a href="<?php echo base_url('main/show_owner_drivers/').$owner_id;?>">Drivers</a>
</h3>
<div class="grid-container">
  <?php foreach ($drivers as $driver):?>
    <div class="grid-item">
      <a href = "<?php echo base_url('main/show_driver_details/'.$driver['id']);?>">
        <img src="<?php echo base_url('/static/uploads/'.$driver['driver_image'])?>" class="center"/>
      </a>
      <p><?php echo htmlspecialchars($driver['first_name'],ENT_QUOTES,'UTF-8');?></p>
      <p><?php echo htmlspecialchars($driver['second_name'],ENT_QUOTES,'UTF-8');?></p>
      <p><?php echo htmlspecialchars($driver['phonenumber'],ENT_QUOTES,'UTF-8');?></p>
      <p><?php echo htmlspecialchars($driver['driver_email'],ENT_QUOTES,'UTF-8');?></p>
      <?php if ($driver['job_status']==0): ?>
        <p>Not on Job</p>
      <?php elseif ($driver['job_status']==1): ?>
        <p>on Job</p>
      <?php else: ?>
        <p>Empty</p>
      <?php endif; ?>
    </div> 
    <?php endforeach;?>
</div>