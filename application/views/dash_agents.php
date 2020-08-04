<!DOCTYPE html>
<html>
<head>
	<title>Agents</title>
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
</head>
 <body>
<?php include('includes/sidenav.php')?>
<div id="main">
    <div class="top-bar">
     <form method="POST" action="<?php echo base_url('main/get_search_agents');?>">
          <input type="text" placeholder="Search by Agent Name" name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
      </form> 
    </div>
  <h3 style="text-transform:uppercase;">Agents</h3>
  <div class="grid-container">
     <?php foreach ($users as $user):?>
     <?php include('includes/layout_agent.php')?>
     <?php endforeach;?>
  </div>
  <?php if(!empty($links)){;?>
  <div class="wrapper_parent">
      <p style="float: left; margin-left: 120px;"><?php echo 'Page '.$links;?></p>
  </div>
  <?php };?>
</div>
</body>
</html>