<!DOCTYPE html>
<html>
<head>
	<title>Add Truck Category</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('/static/design/w3.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/static/design/createagent.css')?>"/>
    <link rel="apple-touch-icon" sizes="57x57" href="/static/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/static/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/static/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/static/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/static/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/static/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/static/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/static/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/static/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/static/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/static/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/static/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/static/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
<?php include('includes/sidenav.php')?>
<div id="main">
<h3><?php echo lang('add_truck_category_heading');?></h3>
<div class="form">
  <div class="main">
    <div class="container-fluid" style="margin-top: 10px;">
        <div class="main2">
           <div id="infoMessage" style="color: red;"><?php echo $message;?></div>
        </div>
    </div>
 </div>
 <div class="main1">
   <?php echo form_open_multipart("main/add_truck_category");?>
    <div class="wrapper_parent">
       <div class="main2">
          <p><?php echo lang('add_truck_category_subheading');?></p>
       </div>
   </div>

   <div class="wrapper_parent">
      <div class="main2">
         <p>
           <?php echo lang('add_category_truck_name', 'category_name');?> <br />
           <?php echo form_input($name);?>
         </p>
      </div>
  </div>

  <div class="wrapper_parent">
    <div class="main2">
         <p>
           <?php echo lang('add_category_truck_image', 'category_image');?> <br />
           <?php echo form_upload($image);?>
         </p>
      </div> 
  </div>
   
   <div class="wrapper_parent">
    <div class="main2">
         <p>
           <?php echo lang('add_category_truck_image', 'category_image');?> <br />
           <?php echo form_upload($image2);?>
         </p>
      </div> 
  </div>
   
  <div class="wrapper_parent">
     <div class="main2">
       <p><?php echo form_submit('submit', lang('add_category_truck_submit'));?></p>
    </div>
  </div> 
  
  </div>

  
   <?php echo form_close();?>
   <p style="visibility: hidden;"><?php echo anchor('auth/logout', lang('create_agent_logout_btn'))?>  </p>
</div>
</body>
</html>


