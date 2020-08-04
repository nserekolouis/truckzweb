    <h3 class="title">Notifications</h3>
    <div class="order_table">
      <table>
        <tr>
          <th>count</th>
          <th>type</th>
          <th>action</th>
        </tr>
        <?php foreach($notifications as $key => $notification){;?>
        <tr>
          <td>
            <?php echo $notification['id'] ?>
          </td>
          <td>
            <?php echo $notification['type']?>
          </td>
          <?php if(strcmp('driver_added',$notification['type']) == 0):?>
          <td><a href = "<?php echo base_url('main/show_driver_details/'.$notification['drivers'])?>" 
                 style = "color: #0f6f9c; cursor: pointer; text-decoration: underline;">View Driver Details</a></td>
          <?php elseif(strcmp('service_provider_added',$notification['type']) == 0):?>
          <td><a href = "<?php echo base_url('main/show_owner_details/'.$notification['truck_owners'])?>" 
                 style = "color: #0f6f9c; cursor: pointer; text-decoration: underline;" >View Service provider details</a></td>
          <?php elseif(strcmp('truck_added',$notification['type']) == 0):?>
          <td><a style = "color: #0f6f9c; cursor: pointer; text-decoration: underline;" 
                 href = "<?php echo base_url('main/show_truck_details/'.$notification['trucks'])?>" >View truck details</a></td>
          <?php endif;?>
        </tr>
        <?php };?>
      </table>
    </div>
    <?php if(!empty($links)):?>
    <div class="pagination">
      <p>
        <?php echo 'Pages '.$links; ?>
      </p>
    </div>
    <?php endif; ?>