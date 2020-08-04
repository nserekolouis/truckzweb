<h3 class="title">Truck Categories | <?php echo anchor('main/add_truck_category', lang('add_category'))?></h3>
<div id="main">
  <div class="container-fluid">
    <div class="row row-no-gutters">
      <?php foreach ($categories as $category):?>
        <div class="col-xs-6 col-sm-4 col-md-3">
           <?php include('layout_category.php')?>
        </div>
      <?php endforeach;?> 
    </div>
  </div>
  
  <?php if(!empty($links)){;?>
  <div class="pagination">
      <p><?php echo 'Pages '.$links;?></p>
  </div>
  <?php };?>
</div>