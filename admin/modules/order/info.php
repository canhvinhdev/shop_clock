

<?php

$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql_order = "select * from `order` where ID = $id";
$data_order = select_one($sql_order);



?>



<div class="text-center">
<div class="panel-title">Chi tiết đơn hàng</div>


</div>
<div class="col-md-12 text-center">


		<div class="form-group">
			<label classs="lable-success">Đơn hàng DONHANG-<?php echo $data_order['ID']  ?></label>
		
		</div>
</div>
	<div class="col-md-6">

<h4>Thông tin khách hàng</h4>
<hr>
Tên khách hàng: <strong>   <?php echo $data_order['Name'] ?> </strong>
<hr>
Địa chỉ: <strong>   <?php echo $data_order['Shipping_Address'] ?> </strong>
<hr>
Số điện thoại: <strong>   <?php echo $data_order['Moblie_Number'] ?> </strong>
<hr>
Gi chú: <strong>   <?php echo $data_order['Note'] ?> </strong>
<hr>
</div>
<div class="col-md-6">

<h4>Danh sách các sản phẩm đã mua</h4>


<table class="table">
<thead>
<tr>
  <th scope="col">STT</th>
  <th scope="col">Tên sản phẩm</th>
  <th scope="col">Số lượng</th>
  <th scope="col">Giá</th>
  
</tr>
</thead>
<tbody>

<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql_order = "select * from `detail_order` where Order_ID = $id";
$list = select_list($sql_order);
?>
<?php $stt =0;$total = 0;
 if ($list) {foreach ($list as $datas) {  $stt++;?>
<tr>
  <th scope="row"><?php echo $stt; ?></th>
  <td><?php echo $datas['ProductName_DetailOrder'];?></td>
  <td><?php echo $datas['Quantity_DetailOrder'];?></td>
  <td><?php echo $datas['Price_DetailOrder']; ?></td>
  <?php $total += $datas['Price_DetailOrder'];?>
</tr>
<?php } } ?>
<tr>
  <th scope="row"></th>
  <th></th>
  <td><strong>Tổng tiền</strong></td>
  <td><strong><?php echo $total;?></strong></td>
  

 
</tr>
</tbody>
</table>
</div>
	<div class="col-md-12"> 
	
			<i class="fa fa-save"></i>
			<button class=" btn btn-success" type="button">
			<a href="?page=order&type=bill&id=<?php echo $data_order['ID']?> ">In hóa đơn</a>
			</button>

				<i class="fa fa-save"></i>
				<button type="button" class="btn btn-success"><a href="?page=order&type=edit&id=<?php echo $data_order['ID']?> ">Cấp nhật trạng thái</a></button>
		
	</div>
</div>
