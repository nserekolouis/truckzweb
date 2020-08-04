<!DOCTYPE html>
<html>
<head>
	<title><?php echo lang('new_index_heading');?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style>
	ul 
	{
	  list-style-type: none;
	  margin: 0;
	  padding: 0;
	  overflow: hidden;
	  background-color: #0071bc;
	}

	li
	 {
	  float: left;
	 }

	li a, .dropbtn 
	{
	  display: inline-block;
	  color: white;
	  text-align: center;
	  padding: 14px 16px;
	  text-decoration: none;
	  font-weight: bold;
	}

	li a:hover, .dropdown:hover .dropbtn 
	{
	  background-color: #6A98BC;
	  text-decoration: none;
	}

	li.dropdown
	 {
	  display: inline-block;
	}

	.dropdown-content
	 {
	  display: none;
	  position: absolute;
	  background-color: #f9f9f9;
	  min-width: 160px;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	 }

	.dropdown-content a
	 {
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	  text-align: left;
	 }

	.dropdown-content a:hover {background-color: #f1f1f1}

	.dropdown:hover .dropdown-content {
	  display: block;
	}

	table {
	  border-collapse: collapse;
	  width: 100%;
	}

	th, td {
	  text-align: left;
	  padding: 8px;
	}

	tr:nth-child(even){background-color: #f2f2f2}

	th {
	  background-color: #4CAF50;
	  color: white;
	}
	</style>
</head>
<body>
<ul>
  <li><a href="<?php echo base_url('auth')?>">Truckz Admin panel</a></li>
  <li style = "float: right;"><a href="<?php echo base_url('auth/logout');?>">Logout</a></li>
  <li style = "float: right;"><a href="<?php echo base_url('main/view_truck_categories');?>">View truck categories</a></li>
  <li style = "float: right;"><a href="<?php echo base_url('main/view_truck_owners');?>">View truck owners</a></li>
  <li style = "float: right;"><a href="<?php echo base_url('auth/create_agent');?>">Create Agent</a></li>
  <li style = "float: right;"><a href="<?php echo base_url('main/get_orders');?>">Orders</a></li>
  </ul>
</ul>
<div class="container" style="margin-top: 10px; ">
    <!-- <h1><?php echo lang('new_index_heading');?></h1> -->
    <div id="infoMessage" style="color: #0071bc;"><?php echo $message;?></div>
	<h2 style="color: #0071bc;"><?php echo lang('new_index_subheading');?></h2>
</div>

<div class=" container">
	<table cellpadding=0 cellspacing=10>
		<tr>
		    <th>Order NO.</th>
			<th>Client</th>
			<th>Service Provider</th>
			<th>Truck Type</th>
			<th>Pickup</th>
			<th>Destination</th>
			<th>Status</th>
			<th>Timestamp</th>
		</tr>
		<?php foreach ($orders as $order):?>
			<tr>
			    <!-- <td><?php echo htmlspecialchars($user['profile_picture'],ENT_QUOTES,'UTF-8');?></td> -->
	            <td><?php echo $order['id']; ?></td>
	            <td><?php echo $order['client_id']; ?></td>
	            <td><?php echo $order['service_provider']; ?></td>
	            <td><?php echo $order['truck_type']; ?></td>
	            <td><?php echo $order['pickup_address']; ?></td>
	            <td><?php echo $order['dest_address']; ?></td>
	            <td><?php echo $order['status']; ?></td>
	            <td><?php echo $order['time_stamp']; ?></td>
			</tr>
		<?php endforeach;?>
	</table>
</div>
<!-- <p>
<?php echo anchor('auth/create_agent', lang('index_create_agent_link'))?>| 
<?php echo anchor('auth', lang('index_view_list_agents'))?>| 
<?php echo anchor('main/view_truck_owners', lang('index_truck_owners'))?>|
<?php echo anchor('main/view_truck_categories', lang('index_view_truck_categories'))?>
</p> -->
</body>
</html>


