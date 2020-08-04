<h3 class="title"><a href="<?php echo base_url('main/show_owner_trucks/').$owner_id;?>">Trucks</a> | 
   <a href="<?php echo base_url('main/show_owner_drivers/').$owner_id;?>">Drivers</a>
</h3>
<div class="grid-container">
   <?php foreach ($trucks as $truck):?>
    <div class="grid-item">
      <a href = "<?php echo base_url('main/show_truck_details/'.$truck['id']);?>"><img src="<?php echo base_url('/static/uploads/'.$truck['truck_image'])?>" class="center" /></a>
      <p><?php echo htmlspecialchars($truck['number_plate'],ENT_QUOTES,'UTF-8');?></p>
      <p><?php echo htmlspecialchars($truck['model'],ENT_QUOTES,'UTF-8');?></p>
      <p><?php echo htmlspecialchars($truck['description'],ENT_QUOTES,'UTF-8');?></p>
      <?php if ($truck['job_status']==0): ?>
        <p>Not on Job</p>
      <?php elseif ($truck['job_status']==1): ?>
        <p>on Job</p>
      <?php else: ?>
        <p>Empty</p>
      <?php endif; ?>
    </div> 
    <?php endforeach;?>
</div>