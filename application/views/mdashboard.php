<!DOCTYPE html>
<html>
 <?php include('includes/agents_header.php')?>
 <body>
<?php include('includes/msidenav.php')?>
<div class="main_one">
  <span class ="openNav" onclick="openNav()">&#9776;</span>
  <div class="main_two">
    <div class="main_three" id="main_three">
      <?php if($title == "notifications"):?>
        <div class="notifications">
          <?php include('includes/mnotifications.php')?>
        </div>
      <?php elseif($title == "agents"):?>
        <div class="agents">
          <?php include('includes/magents.php')?>
        </div>
      <?php elseif($title == "types"):?>
        <div class="types">
          <?php include('includes/mtypes.php')?>
        </div>
      <?php elseif($title == "owners"):?>
        <div class="owners">
          <?php include('includes/mowners.php')?>
        </div>
      <?php elseif($title == "orders"):?>
        <div class="orders">
          <?php include('includes/morders.php')?>
        </div>
      <?php elseif($title == "edit_agent"):?>
        <div class="orders">
          <?php include('includes/medit_agent.php')?>
        </div>
        <?php elseif($title == "truck_details"):?>
        <div class="orders">
          <?php include('includes/mtruck_details.php')?>
        </div>
        <?php elseif($title == "driver_details"):?>
        <div class="orders">
          <?php include('includes/mdriver_details.php')?>
        </div>
        <?php elseif($title == "owner_details"):?>
        <div class="orders">
          <?php include('includes/mowner_details.php')?>
        </div>
        <?php elseif($title == "create_agent"):?>
        <div class="orders">
          <?php include('includes/mregister_agent.php')?>
        </div>
        <?php elseif($title == "owner_trucks"):?>
        <div class="orders">
          <?php include('includes/mowner_trucks.php')?>
        </div>
        <?php elseif($title == "owner_drivers"):?>
        <div class="orders">
          <?php include('includes/mowner_drivers.php')?>
        </div>
        <?php elseif($title == "add_types"):?>
        <div class="orders">
          <?php include('includes/madd_category.php')?>
        </div>
        <?php elseif($title == "edit_owners"):?>
        <div class="orders">
          <?php include('includes/medit_owners.php')?>
        </div>
      <?php endif;?>  
    </div>
  </div>
</div>
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "300px";
      document.getElementById("main_three").style.width = "75%";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main_three").style.width = "100%";
    }
</script>
</div>
</body>
</html>