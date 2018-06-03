

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
<?php 
						$user_id =  $data_order['User_ID'];
				
						if(isset($user_id)){
						$sql_user = "select * from users where ID = $user_id ";

							$data_user = select_one($sql_user);
								?>

<hr>
Tên khách hàng: <strong>   <?php echo $data_user['User_Name'] ?> </strong>
<hr>

Địa chỉ: <strong>   <?php echo $data_user['Address'] ?> </strong>
<hr>
Email: <strong>   <?php echo $data_user['Email'] ?> </strong>
<hr>
Số điện thoại: <strong>   <?php echo $data_user['Moblie_Number'] ?> </strong>
<hr>




<?php }  ?>
</div>
<div class="col-md-6">

<h4>Danh sách các sản phẩm đã mua</h4>


<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Giá</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Sản phẩm A</td>
      <td>2.300.000vnđ</td>
     
	</tr>
	<tr>
      <th scope="row">2</th>
      <td>Sản phẩm A</td>
      <td>2.300.000vnđ</td>
     
	</tr>
	<tr>
      <th scope="row">3</th>
      <td>Sản phẩm A</td>
      <td>2.300.000vnđ</td>
     
	</tr>
	<tr>
      <th scope="row">4</th>
      <td>Sản phẩm A</td>
      <td>2.300.000vnđ</td>
     
    </tr>
	<tr>
      <th scope="row"></th>
      <td><strong>Tổng tiền</strong></td>
	  <td><strong>10.300.000vnđ</strong></td>
	  

     
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
