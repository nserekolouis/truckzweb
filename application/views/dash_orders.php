<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('/static/design/w3.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/static/design/orders.css')?>"/>
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
  </div>
  <h3>Orders</h3>
  <div class="order_table">
  <table cellpadding=0 cellspacing=10 style="border:1px solid #3f89aa;">
    <tr>
      <th>NO.</th>
      <th>Client</th>
      <th>Provider</th>
      <th>Truck</th>
      <th>Pickup</th>
      <th>Destination</th>
      <th>Costing</th>
      <th>Status</th>
      <th>Timestamp</th>
    </tr>
    <?php foreach ($orders as $order):?>
      <tr>
              <td><?php echo $order['id']; ?></td>
              <td><?php echo $order['client_name']; ?></td>
              <td><?php echo $order['service_provider']; ?></td>
              <td><?php echo $order['truck_type']; ?></td>
              <td><?php echo $order['pickup_address']; ?></td>
              <td><?php echo $order['dest_address']; ?></td>
              <td style="color:red"><?php echo $order['price']; ?></td>
              <td><?php echo $order['status']; ?></td>
              <td><?php echo $order['time_stamp']; ?></td>
      </tr>
    <?php endforeach;?>
  </table>
</div>
  <div class="wrapper_parent">
      <p style="float: left; margin-left: 120px;"><?php echo 'Page '.$links; ?></p>
  </div>
</div>
</body>
</html>