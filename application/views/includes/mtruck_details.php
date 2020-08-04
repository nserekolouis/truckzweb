  <h3 class="title">Truck Details</h3>
  <div id = "main">
    <div class="truck_image">
      <img src = "<?php echo base_url('/static/uploads/'.$truck['truck_image'])?>"/>
    </div>
    <div class="truck_details">
      <div class="truck-item">
        <label>Category:</label>
        <p><?php echo $truck['truck_categories']?></p>
      </div>
      <div class="truck-item">
        <label>Model:</label>
        <p><?php echo $truck['model']?></p>
      </div>
       <div class="truck-item">
        <label>Description:</label>
        <p><?php echo $truck['description']?></p>
      </div>
      <div class="truck-item">
        <label>Truck Size:</label>
        <p><?php echo $truck['truck_size']?></p>
      </div>
      <div class="truck-item">
        <label>Service point:</label>
        <p><?php echo $truck['truck_size']?></p>
      </div>
      <div class="truck-item">
        <label>Service point:</label>
        <p><?php echo $truck['service_point']?></p>
      </div>
      <div class="truck-item">
        <label>Driver:</label>
        <p><?php echo $truck['drivers']?></p>
      </div>
      <div class="truck-item">
        <label>Fuel Consumption:</label>
        <p><?php echo $truck['comsumption']?></p>
      </div>
      <div class="truck-item">
        <label>Agent:</label>
        <p><?php echo $truck['agents']?></p>
      </div>
      <div class="truck-item">
        <label>Agent:</label>
        <p><?php echo $truck['number_plate']?></p>
      </div>
      <?php if(empty($truck['agents'])):?>
            <form>
               <button style = "width:250px;" formaction = "<?php echo base_url('main/assign_agent_to_truck/'.$truck['id']);?>" type="submit">Assign Agent</button>
            </form>
      <?php else:?>
            <?php if($truck['admin_verification'] == '1'):?>
                  <p class="truck-status">Truck already Approved by Admin.</p>
            <?php elseif($truck['agent_verification'] == '0'):?>
                  <p class="truck-status">Waiting for agent <?php echo $agent_name ?> to complete verification.</p>
                  <form>
                    <button style = "width:250px;" 
                            formaction = "<?php echo base_url('main/approve_truck/'.$truck['id']);?>" type="submit">Approve anyway</button>
                  </form>
            <?php elseif($truck['agent_verification'] == '1'):?>
                   <form>
                    <button style = "width:250px;" 
                            formaction = "<?php echo base_url('main/approve_truck/'.$truck['id']);?>" type="submit">Approve Truck</button>
                  </form>
            <?php endif;?>
      <?php endif;?>
    </div>
  </div>