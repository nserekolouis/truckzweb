<h3 class="title">Orders</h3>
<div id="main">
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
  <?php if(!empty($links)){;?>
    <div class="pagination">
        <p><?php echo 'Pages '.$links;?></p>
    </div>
    <?php };?>
</div>