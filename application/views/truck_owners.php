<!DOCTYPE html>
<html>
<head>
	<title><?php echo lang('new_towner_heading');?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style type="text/css">
	  ul {
	    list-style-type: none;
	    margin: 0;
	    padding: 0;
	    overflow: hidden;
	    background-color: #0071bc;
	  }

	  li {
	    float: left;
	  }

	  li a, .dropbtn {
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

	  li.dropdown {
	    display: inline-block;
	  }

	  .dropdown-content {
	    display: none;
	    position: absolute;
	    background-color: #f9f9f9;
	    min-width: 160px;
	    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	    z-index: 1;
	  }

	  .dropdown-content a {
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

	  .main
	  {
	   margin: auto;
	   width: 50%;
	   border: 0px solid green;
	   padding: 10px;
	   text-align: center;
	  }

	  .main2
	  {
	   display: inline-block;
	   border: 0px solid green;
	   text-align: left;
	  }

	  input[type=submit] 
	  {
	  padding: 5px 15px;
	  background: #35a049;
	  border: 0 none;
	  cursor: pointer;
	  -webkit-border-radius: 5px;
	  border-radius: 5px;
	  color: white;
	  width: 200px;
	  }

	  input[type=text]
	   {
	      padding:5px; 
	      border:2px solid #ccc; 
	      -webkit-border-radius: 5px;
	      border-radius: 5px;
	      color: black;
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

   <div class="container-fluid" style="margin-top: 10px; ">
       <div class="main2">
          <div id="infoMessage" style="color: #0071bc;"><?php echo $message;?></div>
          <h2 style="color: #0071bc;"><?php echo lang('new_towner_subheading');?></h2>
       </div>
   </div>

   <div class="container-fluid" style="margin-top: 10px;">
        <div class="main2">
        	<p><?php echo anchor('main/view_individual_truck_owners', lang('towner_individuals'))?> | 
        	<?php echo anchor('main/view_company_truck_owners', lang('towner_company'))?></p>

        	<div id="infoMessage"><?php echo $message;?></div>
        </div> 
   </div>

<div class="container">
	<table cellpadding=0 cellspacing=10>
		<tr>
		    <th><?php echo lang('towner_index_profile_picture');?></th>
			<th><?php echo lang('towner_index_first_name');?></th>
			<th><?php echo lang('towner_index_second_name');?></th>
			<th><?php echo lang('towner_index_email');?></th>
			<th><?php echo lang('towner_index_phone_number');?></th>
			<!-- <th><?php echo lang('towner_index_identification_type');?></th> -->
			<th><?php echo lang('towner_index_identification_number');?></th>
			<th><?php echo lang('towner_index_company');?></th>
			<th><?php echo lang('towner_index_postion');?></th>
			<th><?php echo lang('towner_index_activate');?></th>
		</tr>
		<?php foreach ($owners as $owner):?>
			<tr>
			    <td><img src="<?php echo base_url('/static/uploads/'.$owner['profile_picture'])?>" style="width:100px; height:100px;" /></td>
	            <td><?php echo htmlspecialchars($owner['first_name'],ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo htmlspecialchars($owner['second_name'],ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo anchor('main/show_owner_trucks/'.$owner['id'],htmlspecialchars($owner['email'],ENT_QUOTES,'UTF-8')); ?></td>
	            <td><?php echo htmlspecialchars($owner['phonenumber'],ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo htmlspecialchars($owner['ssn'],ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo htmlspecialchars($owner['company'],ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo htmlspecialchars($owner['position'],ENT_QUOTES,'UTF-8');?></td>
	            <td><?php echo ($owner['active']) ? anchor("main/deactivate_truck_owner/".$owner['id'], 
	            lang('index_active_link')) : anchor("main/activate_truck_owner/". $owner['id'], lang('index_inactive_link'));?></td>
				<td><?php echo anchor("main/edit_truck_owner/".$owner['id'], 'Edit') ;?></td>
			</tr>
		<?php endforeach;?>
	</table>
</div>

</body>
</html>
<!-- <h1><?php echo lang('new_towner_heading');?></h1> -->
<!-- <p><?php echo lang('new_towner_subheading');?></p> -->

<!-- <p><?php echo anchor('main/view_individual_truck_owners', lang('towner_individuals'))?> | 
<?php echo anchor('main/view_company_truck_owners', lang('towner_company'))?></p>

<div id="infoMessage"><?php echo $message;?></div> -->



<!-- p>
<?php echo anchor('auth/create_agent', lang('index_create_agent_link'))?>| 
<?php echo anchor('auth', lang('index_view_list_agents'))?>| 
<?php echo anchor('main/view_truck_owners', lang('index_truck_owners'))?>|
<?php echo anchor('main/view_truck_categories', lang('index_view_truck_categories'))?>
</p> -->