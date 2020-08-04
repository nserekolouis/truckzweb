<h3 class="title">Driver Details</h3>
<div id = "main">
    <div class="truck_image">
        <img src = "<?php echo base_url('/static/uploads/'.$driver['driver_image'])?>"/>
    </div>
    <div class="truck-item">
        <label>First Name:</label>
        <p style = "text-align: center;"><?php echo $driver['first_name'];?></p>
    </div>
    <div class="truck-item">
        <label>Second Name:</label>
        <p style = "text-align: center;"><?php echo $driver['second_name'];?></p>
    </div>
    <div class="truck-item">
        <label>Phonenumber:</label>
        <p style = "text-align: center;"><?php echo $driver['phonenumber'];?></p>
    </div>
    <div class="truck-item">
        <label>Email:</label>
        <p style = "text-align: center;"><?php echo $driver['driver_email'];?></p>
    </div>
    <div class="truck-item">
        <label>Email:</label>
        <p style = "text-align: center;"><?php echo $driver['driver_ssn'];?></p>
    </div>
    <?php if($driver['admin_verification'] == 0):?>
    <form>
        <button style = "width:250px;" formaction = "<?php echo base_url('main/approve_driver/').$driver['id'];?>" 
               type="submit">Approve Driver</button>
    </form>
    <?php elseif($driver['offline_status'] == 0):?>
    <p class="truck-status">Driver offline</p>
    <?php elseif($driver['job_status'] == 0):?>
    <p class="truck-status">Driver Available</p>
    <?php elseif($driver['job_status'] == 1):?>
    <p class="truck-status">Driver On Job</p>
    <?php endif;?>
    <p class="truck-status"><?php echo $driver['trucks'];?></p>
</div>