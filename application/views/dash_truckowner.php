<!DOCTYPE html>
<html>
<head>
	<title>Owner Details</title>
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
  <div id = "main">
    <center style = "margin-top: 10px;">
    <img src = "<?php echo base_url('/static/uploads/'.$owner['profile_picture'])?>" height = "250" width = "250"/>
      <p style = "text-align: center;"><?php echo $owner['first_name'];?></p>
      <p style = "text-align: center;"><?php echo $owner['second_name'];?></p>
      <p style = "text-align: center;"><?php echo $owner['phonenumber'];?></p>
      <p style = "text-align: center;"><?php echo $owner['email'];?></p>
      <p style = "text-align: center;"><?php echo $owner['ssn'];?></p>
      <p style = "text-align: center;"><?php echo $owner['company'];?></p>
      <p style = "text-align: center;"><?php echo $owner['position'];?></p>
      <?php if(empty($owner['agents'])):?>
            <form>
               <button style = "width:250px;" formaction = "<?php echo base_url('main/assign_agent/'.$owner['id']);?>" type="submit">Assign Agent</button>
            </form>
      <?php else:?>
            <?php if($owner['admin_verification'] == '1'):?>
                  <p style = "text-align: center;">Service provider already Approved by Admin.</p>
            <?php elseif($owner['agent_verification'] == '0'):?>
                  <p style = "text-align: center; width:250px;">Waiting for agent <?php echo $agent_name ?> to complete verification.</p>
                  <form>
                    <button style = "width:250px;" formaction = "<?php echo base_url('main/approve_truckowner/'.$owner['id']);?>" type="submit">Approve anyway</button>
                  </form>
            <?php elseif($owner['agent_verification'] == '1'):?>
                   <form>
                    <button style = "width:250px;" formaction = "<?php echo base_url('main/approve_truckowner/'.$owner['id']);?>" type="submit">Approve Truck Owner</button>
                  </form>
            <?php endif;?>
      <?php endif;?>
     </center>
    </div>
  </body>
</html>