<!DOCTYPE html>
<html>
<head>
  <title>Notifications</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url('/static/design/w3.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/static/design/orders.css')?>" />
  <link rel="apple-touch-icon" sizes="57x57" href="/static/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/static/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/static/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/static/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/static/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/static/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/static/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/static/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/static/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/static/favicon/android-icon-192x192.png">
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
    <h3>Notifications</h3>
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
<!--     <div class="wrapper_parent">
      <p style="float: left; margin-left: 120px;">
        <?php echo 'Page '.$links; ?>
      </p>
    </div> -->
  </div>
</body>
</html>