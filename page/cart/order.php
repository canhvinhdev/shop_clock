

<?php 


$user = getLoggedUser();
if($user){

	$user_id = $user['ID'];

	$sql_user_order= "select * from `order` where User_ID = $user_id";

	$data_user_order= select_list($sql_user_order);



	$sql_user = "select * from users where ID = $user_id";
	$user_login = select_one($sql_user);


	?>




	<div class="container" style="padding-top: 10px">
		<div class="row">
			<ol class="breadcrumb">
				<li>
					<a href=" ">Home</a>
				</li>
				<li  class="active">
					<a href="#">Thông tin giao hàng</a>
				</li>

			</ol>
		</div>
	</div>

	<?php if($user_login){ ?>



	<div class="container" style="padding-top: 10px">
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">


				<form method="post" id="order" >

					<div class="form-group">
						<label for="exampleInputPassword1">Người nhận</label>
						<input type="text" class="form-control" value="<?php echo $user_login['User_Name'] ?>" name="name" id="exampleInputPassword1" placeholder="Nhập tên người nhận">
					</div>


					<div class="form-group">
						<label for="exampleInputPassword1">Số điện thoại</label>
						<input type="number" class="form-control" name="phone" value="<?php echo $user_login['Moblie_Number'] ?>"  id="" placeholder="Số điện thoại">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Địa chỉ nhận hàng</label>
						<input type="text" class="form-control" name="address_ship"  value="<?php echo $user_login['Address'] ?>"  id="" placeholder="Địa chỉ nhận hàng">
					</div>	
					<div class="form-group">
						<label for="exampleInputPassword1">Ghi chú thêm</label>
						<input type="text" class="form-control" name="note" id="" placeholder="Ghi chú thêm">
					</div>
					<div class="form-group">
						<div class="panel-heading">
							<h3 class="panel-title"> <div class="radio">
								<label>
									<input type="radio" name="payment"  value="0" checked="checked">
									Thanh toán trực tiếp tại cửa hàng
								</label>
							</div></h3>
						</div>
						<div class="panel-body">
							VUi lòng quý khách đến 175 Tây Sơn, Đống Đa, Hà Nội để thanh toán trự tiếp
						</div>
					</div>
					<div class="form-group">
						<div class="panel-heading">

							<h3 class="panel-title"> <div class="radio">
								<label>
									<input type="radio" name="payment" value="1">
									Thanh toán qua chuyển khoản qua tài khoản ngân hàng
								</label>
							</div></h3>
						</div>
						<div class="panel-body">
							Ngân hàng Viettinbank: Anh Nguyễn Văn A<br>
							Chi nhánh: Tây Sơn , Đống Đa, Hà Nội<br>
							Số Tài khoản : 711A2322222<br>
							Ngày Đăng ký : 23/11/2017<br>
						</div>
					</div>
					<button type="submit" name="submit" id="submit" class="btn btn-primary">Gửi đơn hàng</button>
				</form>
			</div>
			<?php  }
		}


		else{ ?>
		<div class="container" style="padding-top: 10px">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

					<form method="post" id="order" >

						<div class="form-group">
							<label for="exampleInputPassword1">Người nhận</label>
							<input type="text" class="form-control"  name="name" id="exampleInputPassword1" placeholder="Nhập tên người nhận" required>
						</div>


						<div class="form-group">
							<label for="exampleInputPassword1">Số điện thoại</label>
							<input type="number" class="form-control" name="phone"  id="" placeholder="Số điện thoại" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Địa chỉ nhận hàng</label>
							<input type="text" class="form-control" name="address_ship"   id="" placeholder="Địa chỉ nhận hàng" required>
						</div>	
						<div class="form-group">
							<label for="exampleInputPassword1">Ghi chú thêm</label>
							<input type="text" class="form-control" name="note" id="" placeholder="Ghi chú thêm" required>
						</div>
						<div class="form-group">
							<div class="panel-heading">
								<h3 class="panel-title"> <div class="radio">
									<label>
										<input type="radio" name="payment"  value="0" checked="checked">
										Thanh toán trực tiếp tại cửa hàng
									</label>
								</div></h3>
							</div>
							<div class="panel-body">
								VUi lòng quý khách đến 175 Tây Sơn, Đống Đa, Hà Nội để thanh toán trự tiếp
							</div>
						</div>
						<div class="form-group">
							<div class="panel-heading">

								<h3 class="panel-title"> <div class="radio">
									<label>
										<input type="radio" name="payment" value="1">
										Thanh toán qua chuyển khoản qua tài khoản ngân hàng
									</label>
								</div></h3>
							</div>
							<div class="panel-body">
								Ngân hàng Viettinbank: Anh Nguyễn Văn A<br>
								Chi nhánh: Tây Sơn , Đống Đa, Hà Nội<br>
								Số Tài khoản : 711A2322222<br>
								Ngày Đăng ký : 23/11/2017<br>
							</div>
						</div>
						<button type="submit" name="submit" id="submit" class="btn btn-primary">Gửi đơn hàng</button>
					</form>
				</div>
				<?php } ?>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<?php
					$AllTotalPrice = 0;
					$ok=1;
					if(isset($_SESSION['cart']))
					{				
				if(isset($_POST['quantity'])){ //điền cập nhật số lượng
					foreach($_POST['quantity'] as $id=>$quantity){
						$sql="select * from product where ID='$id'";
						$data=select_one($sql);
						
						$_SESSION['cart'][$id] = $quantity;	



						} 		//xử lý cập nhật giỏ hàng
					}

					foreach($_SESSION['cart'] as $k => $v)
					{
						if(isset($k))
						{
							$ok=2;
						}
					}
				}
				if($ok == 2)
				{

					foreach($_SESSION['cart'] as $key=>$qty)
					{
						$item[]=$key;

					}
					$str=implode(",",$item);
					$sql="select * from product where ID in ($str)";

					$query = select_list($sql);

					?>
					<table class="table   table-bordered table-hover">
						<thead>
							<tr>
								<th>STT</th>
								<th>Sản phẩm</th>
								<th>Hình ảnh</th>
								<th>Giá</th>
								<th>Số lượng</th>

								<th>Tổng tiền</th>


							</tr>
						</thead>
						<tbody>


							<?php
							$i= 1;
							foreach($query as $row){ 
								$id = $row['ID'];
								$giagocsp = $row['Product_Price'];			

								

								$sql_promotion = "select * from discount inner join discountproduct on discount.ID = discountproduct.Discount_ID where discountproduct.Product_ID = $id ";
								$data_ct_giamgia = select_list($sql_promotion);





								$sp_giamgia = $giagocsp; 


								if($data_ct_giamgia){
									$giacuoicung = 0;
									foreach ($data_ct_giamgia as $data3){

										$number = $data3['Number_Discount'];
										$number_percent  =  ($sp_giamgia*$data3['Number_Discount'])/100;
										$giacuoicung+= $number_percent;


									}

									$giacuoicung =  $sp_giamgia-$giacuoicung;


								}else
								{
									$giacuoicung = $sp_giamgia;

								}


								$totalPrice = $giacuoicung*$_SESSION['cart'][$row['ID']];
								$AllTotalPrice+=$totalPrice;
								?>
								<tr>
									<td><?php echo $i++ ?></td>
									<td><a href="?page=product&id=<?php echo $row['ID']?>" ><?php echo $row['Product_Name'];?></a></td>
									<td><img src="admin/<?php echo $row['Product_Images'];?>" width="100px"></td>
									<td a>
										<div class=" current">	<?php echo number_format($giacuoicung,0,'','.')?> đ </div>

										<?php if($data_ct_giamgia ){ ?>

										<div class="prev"><del> <?php echo   number_format($giagocsp) ?> ₫</del></div>

										<?php } ?>
									</td>
									<td b >
									<div style="color: red">
									<?php echo $_SESSION['cart'][$row['ID']];?>
								</div>


									</td>
									<td >
										<div class="cart-price 	red current" style="font-size: 18px"  aling="center">
											<?php echo number_format($totalPrice,0,'','.')?> đ
										</div>
									</td>

								</tr>	
								<?php } ?>				


								<?php

								if(isset($_POST['submit'])){

									$address_ship = $_POST['address_ship'];
									$name  = $_POST['name'];
									$payment  = $_POST['payment'];
									$note  = $_POST['note'];




									$phone  = $_POST['phone'];



									$order_time  = date('Y/m/d H:i:s');

												// Xử lý mua hàng
									// var_dump($address_ship);
									// var_dump($phone);
									// var_dump($order_time);
									// var_dump($AllTotalPrice);


									if($AllTotalPrice>0){
										if(isset($_SESSION['cart'])){
											foreach($_SESSION['cart'] as $key=>$qty)
											{
												$item[]=$key;

											}
											$str=implode(",",$item);
											$sql="select * from product where ID in ($str)";

											$query = select_list($sql);




											if($AllTotalPrice>0){
												$status = "1";
												$order_status = "0";
												$msql= "INSERT INTO  `order`(`Name`,`Shipping_Address`, `Moblie_Number`, `Order_Time`,`Method_Payment`,`Subtotal`, `Note` , `Order_Status`,`Status`) VALUES('".$name."','".$address_ship."','".$phone."','".$order_time."', '$payment' ,'".$AllTotalPrice."','".$note."','$order_status','$status')";
												$result = 0;
												$result=exec_update($msql);
 											
											}

											if($result){
												foreach($query as $rs){
													$max = "select * from `order` order by ID desc";
												//echo $max; exit();
													$row1 = select_one($max);
													$Order_ID= $row1['ID'];
													$Product_ID=$rs['ID'];							
								$giagocsp1 = $rs['Product_Price'];		
							
								$sql_promotion1 = "select * from discount inner join discountproduct on discount.ID = discountproduct.Discount_ID where discountproduct.Product_ID = $id ";


								$data_ct_giamgia1 = select_list($sql_promotion1);





													$sp_giamgia1 = $giagocsp1; 


													if($data_ct_giamgia1){
														$giacuoicung1 = 0;
														foreach ($data_ct_giamgia1 as $data3){

															$number = $data3['Number_Discount'];
															$number_percent  =  ($sp_giamgia1*$data3['Number_Discount'])/100;
															$giacuoicung1+= $number_percent;



														}

														$giacuoicung1 =  $sp_giamgia1-$giacuoicung1;


													}else
													{
														$giacuoicung1 = $sp_giamgia1;

													}


												$price_discount = $giacuoicung1;




													$ProductName_DetailOrder = $rs['Product_Name'];
													$quantity=$_SESSION['cart'][$rs['ID']];
													$soluongsp = $rs['Quantity'];
													$soluongspconlai =$soluongsp-$quantity;
													// var_dump($quantity);
													$sql_detail="insert into detail_order(Order_ID, Product_ID, ProductName_DetailOrder, Quantity_DetailOrder, Price_DetailOrder)values('$Order_ID','$Product_ID','$ProductName_DetailOrder','$quantity','$price_discount')";
												//echo $s;



													$results = 0;
													$results=exec_update($sql_detail);


														$sqlsl="UPDATE product set Quantity='{$soluongspconlai}' where ID =$Product_ID";
			
														$resultsl2 = exec_update($sqlsl);


												}
												unset($_SESSION['cart']);


												?>
												<script language="javascript">window.location="../?page=success";
											</script>';

											<?php 


										}

									}
								}

							}

							?>

							<tr>
								<td>
								</td>
								<td>
								</td>
								<td>
								</td>
								<td>
								</td>

								<td>Tổng tiền
								</td>
								<td>
									<strong>





										<?php echo number_format($AllTotalPrice,0,'','.')?>
									</strong>
								</td>
								

							</tr>
						</tbody>
					</table>

					<?php
				}
				else
				{
					echo "<div class='pro'>";
					echo "<p align='center'>Bạn không có món hàng nào trong giỏ !<br /><a href='/shopbanhoa/'>Tiếp tục mua hàng</a></p>";
					echo "</div>";
				}
				?>
			</div>
		</div>
	</div>
</div>
</div>
</div>
