<h3 class="title">Owner Details</h3>
<div id = "main">
  <div class="truck_image">
     <img src = "<?php echo base_url('/static/uploads/'.$owner['profile_picture'])?>"/>
  </div>
  <div class="truck-item">
    <label>First Name:</label>
    <p><?php echo $owner['first_name'];?></p>
  </div>
  <div class="truck-item">
    <label>Second Name:</label>
    <p><?php echo $owner['second_name'];?></p>
  </div>
  <div class="truck-item">
    <label>Owner:</label>
    <p style = "text-align: center;"><?php echo $owner['phonenumber'];?></p>
  </div>
  <div class="truck-item">
    <label>Email:</label>
    <p style = "text-align: center;"><?php echo $owner['email'];?></p>
  </div>
  <div class="truck-item">
    <label>SSN:</label>
    <p style = "text-align: center;"><?php echo $owner['ssn'];?></p>
  </div>
  <div class="truck-item">
    <label>Company:</label>
    <p style = "text-align: center;"><?php echo $owner['company'];?></p>
  </div>
  <div class="truck-item">
    <label>Position:</label>
    <p style = "text-align: center;"><?php echo $owner['position'];?></p>
  </div>
    <?php if(empty($owner['agents'])):?>
          <form>
             <button style = "width:250px;" formaction = "<?php echo base_url('main/assign_agent/'.$owner['id']);?>" type="submit">Assign Agent</button>
          </form>
    <?php else:?>
          <?php if($owner['admin_verification'] == '1'):?>
                <p class="truck-status">Service provider already Approved by Admin.</p>
          <?php elseif($owner['agent_verification'] == '0'):?>
                <p class="truck-status">Waiting for agent <?php echo $agent_name ?> to complete verification.</p>
                <form>
                  <button style = "width:250px;" formaction = "<?php echo base_url('main/approve_truckowner/'.$owner['id']);?>" type="submit">Approve anyway</button>
                </form>
          <?php elseif($owner['agent_verification'] == '1'):?>
                 <form>
                  <button style = "width:250px;" formaction = "<?php echo base_url('main/approve_truckowner/'.$owner['id']);?>" type="submit">Approve Truck Owner</button>
                </form>
          <?php endif;?>
    <?php endif;?>
</div>