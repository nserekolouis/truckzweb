<!DOCTYPE html>
<html>
<head>
	<title><?php echo lang('new_index_heading');?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="apple-touch-icon" sizes="57x57" href="<?=base_url('static/favi/apple-icon-57x57.png'); ?>">
	<link rel="apple-touch-icon" sizes="60x60" href="<?=base_url('static/favi/apple-icon-60x60.png'); ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('static/favi/apple-icon-72x72.png'); ?>">
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('static/favi/apple-icon-76x76.png"'); ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('static/favi/apple-icon-114x114.png'); ?>">
	<link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('static/favi/apple-icon-120x120.png'); ?>">
	<link rel="apple-touch-icon" sizes="144x144" href="<?=base_url('static/favi/apple-icon-144x144.png'); ?>">
	<link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('static/favi/apple-icon-152x152.png'); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('static/favi/apple-icon-180x180.png'); ?>">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url('static/favi/android-icon-192x192.png'); ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('static/favi/favicon-32x32.png'); ?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('static/favi/favicon-96x96.png'); ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('static/favi/favicon-16x16.png'); ?>">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
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
		    <th><?php echo lang('index_profile_picture');?></th>
			<th><?php echo lang('index_first_name');?></th>
			<th><?php echo lang('index_second_name');?></th>
			<th><?php echo lang('index_email');?></th>
			<th><?php echo lang('index_phone_number');?></th>
			<th><?php echo lang('index_identification_type');?></th>
			<th><?php echo lang('index_identification_number');?></th>
			<th><?php echo lang('index_activate');?></th>
		</tr>
		<?php foreach ($users as $user):?>
			<tr>
			    <!-- <td><?php echo htmlspecialchars($user['profile_picture'],ENT_QUOTES,'UTF-8');?></td> -->
			    <td><img src="<?php echo base_url('/static/uploads/'.$user['profile_picture'])?>" style="width:100px; height:100px;" /></td>
	            <td><?php echo htmlspecialchars($user['first_name'],ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo htmlspecialchars($user['second_name'],ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo htmlspecialchars($user['email'],ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo htmlspecialchars($user['phonenumber'],ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo htmlspecialchars($user['identification_type'],ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo htmlspecialchars($user['identification_number'],ENT_QUOTES,'UTF-8');?></td>
	            
	            <td style="color:#0071bc;"><?php echo ($user['active']) ? anchor("auth/deactivate_agent/".$user['id'], 
	            lang('index_active_link')) : anchor("auth/activate_agent/". $user['id'], lang('index_inactive_link'));?></td>
				<td style="color:#0071bc;"><?php echo anchor("auth/edit_agent/".$user['id'], 'Edit') ;?></td>
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


