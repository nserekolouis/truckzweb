<!DOCTYPE html>
<html>
<head>
	<title>Drivers</title>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('/static/design/w3.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/static/design/agents.css')?>"/>
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
    <style>
      p {
        color: black;
        margin: 1px;
        border: 1px solid black;
        font-size: 13px;
        display: block;
        text-align: left;
        font-style: normal;
      }
  </style>
</head>
 <body>
<?php include('includes/sidenav.php')?>
<div id="main">
   <div class="top-bar">
  </div>
  <h3><a href="<?php echo base_url('main/show_owner_trucks/').$owner_id;?>">Trucks</a> | 
     <a href="<?php echo base_url('main/show_owner_drivers/').$owner_id;?>">Drivers</a></h3>
  <div class="grid-container">
     <?php foreach ($drivers as $driver):?>
      <div class="grid-item">
        <a href = "<?php echo base_url('main/show_driver_details/'.$driver['id']);?>">
          <img src="<?php echo base_url('/static/uploads/'.$driver['driver_image'])?>" class="center"/>
        </a>
        <p><?php echo htmlspecialchars($driver['first_name'],ENT_QUOTES,'UTF-8');?></p>
        <p><?php echo htmlspecialchars($driver['second_name'],ENT_QUOTES,'UTF-8');?></p>
        <p><?php echo htmlspecialchars($driver['phonenumber'],ENT_QUOTES,'UTF-8');?></p>
        <p><?php echo htmlspecialchars($driver['driver_email'],ENT_QUOTES,'UTF-8');?></p>
        <?php if ($driver['job_status']==0): ?>
          <p>Not on Job</p>
        <?php elseif ($driver['job_status']==1): ?>
          <p>on Job</p>
        <?php else: ?>
          <p>Empty</p>
        <?php endif; ?>
      </div> 
      <?php endforeach;?>
  </div>
  <div class="wrapper_parent">
      <!-- <p style="float: left; margin-left: 120px;"><?php echo 'Page '.$links; ?></p> -->
  </div>
</div>

</body>
</html>