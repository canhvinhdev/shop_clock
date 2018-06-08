



<div class="container" style="padding-top: 10px">
	<div class="row">
		<ol class="breadcrumb">
			<li>
				<a href=" ">Home</a>
			</li>


			<li  class="active">
				<a href="#">GIỎ HÀNG</a>
			</li>

		</ol>
	</div>
</div>
<div class="container" style="padding-top: 10px">
	<div class="row">
		<?php
		$AllTotalPrice = 0;
		$ok=1;
		if(isset($_SESSION['cart']))
		{				



			if(isset($_POST['quantity'])){ //điền cập nhật số lượng
				foreach($_POST['quantity'] as $id=>$quantity){
					$sql="select * from product where id='$id'";
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
				echo "<form action=''  method='post'>";
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
							<th>Lựa chọn</th>

						</tr>
					</thead>
					<tbody>


						<?php
						$i= 1;
						foreach($query as $row){ 

							$id = $row['ID'];

							$sql_numberdiscount = "SELECT * FROM discountproduct where discountproduct.Product_ID = $id";
							

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
	//var_dump($totalPrice);
							$AllTotalPrice+=$totalPrice;							
							?>
							<tr>
								<td><?php echo $i++ ?></td>
								<td><a href="?page=product&id=<?php echo $row['ID']?>" ><?php echo $row['Product_Name'];?></a></td>
								<td><img src="admin/<?php echo $row['Product_Images'];?>" width="100px"></td>
								<td a>






									


									<div class="red current">	<?php echo number_format($giacuoicung,0,'','.')?> VNĐ </div>

									<?php if($data_ct_giamgia){ ?>

										<div class="prev"><del> <?php echo   number_format($giagocsp) ?> ₫</del></div>

									<?php } ?>


								</td>



								<td b >



									<input type="number" class="quantity" placeholder="1" min="1" name="quantity[<?php echo $row['ID']?>]" value="<?php echo $_SESSION['cart'][$row['ID']];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57">


								</td>
								<td >
									<div class="cart-price" aling="center">
										<?php echo number_format($totalPrice,0,'','.')?> đ
									</div>
								</td>
								<td>
									<button type="button" class="btn btn-danger"><a href="page/cart/deletecart.php?id=<?php echo $row['ID'];?>" > Xóa</a></button>
								</td>
							</tr>	

							<?php

						} ?>				
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
									<?php echo number_format($AllTotalPrice,0,'','.')?> đ
								</strong>
							</td>
							<td></td>
						</tr>
					</tbody>
				</table>
				<button type="button" class="btn btn-info"><a href="/">Tiếp tục mua hàng</a></button>

				<!-- <button type="button" class="btn btn-success"><a href="?page=login_order">Thanh toán ngay</a></button> -->

				<button type="button" class="btn btn-success"><a href="?page=order">Thanh toán ngay</a></button>
				<input type="submit" class="update-cart" style="    background: red; color: #fff; padding: 7px;border: navajowhite;border-radius: 5px;" name="capnhat" id="capnhat" value="Cập nhật giỏ hàng" />
				<?php
			}
			else
			{
				echo "<div class='pro'>";
				echo "<p   align='center label label-info'>Hiện tại giỏ hàng trống !<br /><a href='/'>Tiếp tục mua hàng</a></p>";
				echo "</div>";
			}
			?>



		</div>
	</div>


</div>



</div>
</div>
