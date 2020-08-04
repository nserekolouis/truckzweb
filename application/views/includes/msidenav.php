
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="toplogo">
    <img src="<?php echo base_url('/static/images/clientslogo2.png');?>" width="80" height="80"/>
  </div>
  <ul>
    <li>
        <a href="<?php echo base_url('main/view_notifications')?>">
          <div class="item_sidebar">
            <p>Notifications</p>
            <img src="<?php echo base_url('/static/images/ic_next.png');?>" width="40" height="40"/>
          </div>
        </a>
    </li>
    <li>
        <a href="<?php echo base_url('main/get_agents')?>">
          <div class="item_sidebar">
            <p>Agents</p>
            <img src="<?php echo base_url('/static/images/ic_next.png');?>" width="40" height="40"/>
          </div>
        </a>
    </li>
    <li>
        <a href="<?php echo base_url('main/view_truck_categories');?>">
          <div class="item_sidebar">
            <p>Truck Types</p>
            <img src="<?php echo base_url('/static/images/ic_next.png');?>" width="40" height="40"/>
          </div>
        </a>
    </li>
    <li>
        <a href="<?php echo base_url('main/view_truck_owners');?>">
          <div class="item_sidebar">
            <p>Owners</p>
            <img src="<?php echo base_url('/static/images/ic_next.png');?>" width="40" height="40"/>
          </div>
        </a>
    </li>
    <li>
        <a href="<?php echo base_url('main/get_orders');?>">
          <div class="item_sidebar">
            <p>Orders</p>
            <img src="<?php echo base_url('/static/images/ic_next.png');?>" width="40" height="40"/>
          </div>
        </a>
    </li>
    <li>
        <a href="<?php echo base_url('auth/logout');?>">
          <div class="item_sidebar">
            <p>Logout</p>
            <img src="<?php echo base_url('/static/images/ic_next.png');?>" width="40" height="40"/>
          </div>
        </a>
    </li>
  </ul>  
</div>