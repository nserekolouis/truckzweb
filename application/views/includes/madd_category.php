<div id="main">
<h3 class="title"><?php echo lang('add_truck_category_heading');?></h3>
<div class="form">
  <div class="main">
    <div class="form">
        <div class="row">
           <div id="infoMessage" style="color: red;"><?php echo $message;?></div>
        </div>
    </div>
 </div>
 <div class="form">
   <?php echo form_open_multipart("main/add_truck_category");?>
       <div class="form-item">
        <?php echo lang('add_truck_category_subheading');?>
       </div>
       <div class="form-item">
          <?php echo lang('add_category_truck_name', 'category_name');?>
          <?php echo form_input($name);?>
      </div>
      <div class="form-item">
           <?php echo lang('add_category_truck_real_image', 'category_image');?>
           <?php echo form_upload($image);?>
         </p>
      </div>
       <div class="form-item">
          <?php echo lang('add_category_truck_animated_image', 'category_image');?>
          <?php echo form_upload($image2);?>
      </div>
      <div class="form-item">
           <?php echo form_submit('submit', lang('add_category_truck_submit')); ?>
      </div> 
      <?php echo form_close();?>
  </div>
</div>