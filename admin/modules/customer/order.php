
<?php 


$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$sql_user = "select * from users where ID = $id";
$data_user = select_one($sql_user);



$sql_order = "select * from  `order` where User_ID = $id";
$data_order = select_list($sql_order);



?>
<div class="panel-heading">
	<div class="panel-title">Danh sách đơn hàng của Khách hàng <span class="label label-info"><?php echo $data_user['User_Name'] ?></span></div>

	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
	</div>
</div>
<div class="panel-body">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr>
				<th>STT</th>
				<th>Mã</th>
				<th>Ngày đặt</th>			
				<th>Khách hàng</th>
				<th>Kiểu thanh toán</th>
				<th>Tình trạng</th>
				<th>Tổng tiền</th>
				
			</tr>
		</thead>
		<tbody>


			<?php 

			$i= 0;
			if($data_order){
				foreach ($data_order as $datas){?>
				
				<tr class="odd gradeX">
					<td><?php echo $i++ ?></td>

					<td>
						CODE-<?php  echo  $datas['ID'];  ?>
					</td>
					<td><?php echo date("h:i:s m/d/Y", strtotime($datas['Order_Time'])); ?></td>
					<td>
						<?php 
						$user_id =  $datas['User_ID'];
						
						if(isset($user_id)){
							$sql_user = "select * from users where ID = $user_id ";

							$data_user = select_one($sql_user);
							?>

							<span class="label label-info"> <a href=""><?php echo $data_user['User_Name']?></a></span>
							<?php	
							
						}

						?>

					</td>
					<td>
						<?php 

						if($datas['Method_Payment'] == 0){
							echo "Thanh toán trực tiếp";
						}else{
							echo "Thanh toán qua chuyển khoản";
						}




						?>
					</td>
					<td>
						
						<?php 

						if($datas['Order_Status'] == 0){
							echo "<div class='alert alert-danger'>Chưa thanh toán</div>";
						}else if($datas['Order_Status'] == 1){
							echo "<div class='alert alert-success'>Đã thanh toán</div>";
						}

						?>

					</td>
					<td>
						<?php 
						echo number_format($datas['Subtotal']);

						?> 
						VNĐ
					</td>
					
				</tr>

				<?php } }?>

			</tbody>
		</table>
	</div>

