<h3 class="title">Agents | <?php echo anchor('auth/create_agent', 'Register Agent')?></h3>
<div class="search-bar">
 <form method="POST" action="<?php echo base_url('main/get_search_agents');?>">
      <input type="text" placeholder="Search by Agent Name" name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
  </form> 
</div>
<div class="container-fluid">
	<div class="row row-no-gutters">
			<?php foreach ($users as $user):?>
				<div class="col-xs-6 col-sm-4 col-md-3">
					<?php include('layout_agent.php')?>
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

