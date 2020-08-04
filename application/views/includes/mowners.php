<h3 class="title"><?php echo anchor('main/view_truck_owners', lang('towner_all'))?> | <?php echo anchor('main/view_individual_truck_owners', lang('towner_individuals'))?> | 
        <?php echo anchor('main/view_company_truck_owners', lang('towner_company'))?>
</h3>
<div id="main">
  <div class="search-bar">
    <form method="POST" action="<?php echo base_url('main/get_search_agents');?>">
      <input type="text" placeholder="Search by Agent Name" name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
  <div class="container-fluid">
    <div class="row row-no-gutters">
      <?php foreach ($owners as $owner):?>
        <div class="col-xs-6 col-sm-4 col-md-3">
          <?php include('layout_owner.php')?>
        </div>
      <?php endforeach;?>
    </div>
  </div>
  <div class="container-fluid">
    <?php if(!empty($links)){;?>
      <div class="pagination">
        <p><?php echo 'Pages '.$links;?></p>
      </div>
    <?php };?>
  </div>
