
<?php 


if(isset($_SESSION["member"])){

	$_SESSION["member"] = $user;
	
	$user_id = $user['ID'];
	$sql2 = "select * from users where ID = $user_id";
	$user_login = select_one($sql2);




	$sql_user_order= "select * from `order` where User_ID = $user_id";

	$data_user_order= select_list($sql_user_order);
}
?>


<div class="container" style="padding: 20px 0px">
	
	<div class="row">

		
		<div class="col-md-12">


			<ol class="breadcrumb">
				<li>
					<a href="/">Trang chủ</a>
				</li>

				<li class="active">Lịch sử đơn hàng</li>
			</ol>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="panel panel- ">
						<div class="panel-heading">
							<h3 class="panel-title">Cấu hình thông tin tài khoản</h3>
						</div>
						<div class="panel-body" style="padding: 15px">
							Xin chào: <?php echo $user_login['User_Name'] ?>
							<br>
							<span class="label label-info"><a href="index.php?page=settinguser"> Sửa thông tin tài khoản</a></span>
						</div>

					</div>
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<div class="panel-heading">


				<div class="panel-title ">Hóa đơn</div>


			</div>
			<div class="panel-body">
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Mã</th>
							<th>Ngày đặt</th>			

							<th>Kiểu thanh toán</th>
							<th>Tình trạng</th>
							<th>Tổng tiền</th>

						</tr>
					</thead>
					<tbody>


						<?php 

						$i= 0;
						if($data_user_order){
							foreach ($data_user_order as $datas){?>

							<tr class="odd gradeX">
								<td><?php echo $i++ ?></td>

								<td>
									CODE-<?php  echo  $datas['ID'];  ?>
								</td>
								<td><?php echo date("h:i:s m/d/Y", strtotime($datas['Order_Time'])); ?></td>

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
									đ
								</td>

							</tr>
							<?php }


						}
						else{



							?>
							<h3>Chưa có hóa đơn nào</h3>


							<?php
						}
						?>

					</tbody>
				</table>
			</div>
			</div>

		</div>
	</div>
</div>

