


<?php 
$sql_pro = "select * from product where Status = 1 order by ID DESC";

$data_pro = select_list($sql_pro);

?>

<div class="panel-heading">
	<div class="panel-title">Thêm thông tin Khách hàng </div>

	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
	</div>
</div>
<div class="panel-body">
	<form class="form-horizontal addpro" action="modules/customer/add_exe.php" method="POST"> 
		<input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
		<fieldset class="">


			<div class="col-md-8" >
				<h4>Thông tin đơn hàng</h4>

				<div class="panel-body">
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr class="text-center">
								<th>Lựa chọn</th>
								<th>Tên sản phẩm</th>
								<th>Ảnh đại diện</th>							
								<th>Giá</th>										
							</tr>
						</thead>
						<tbody>

							<?php 
							$i= 1;
							if($data_pro){
								foreach ($data_pro as $datas){?>
									<tr class="odd gradeX">
										<td><input type="checkbox" name=""></td>
										<td><?php echo $datas['Product_Name'] ?></td>
										<td><img src="<?php echo $datas['Product_Images'] ?>" width="50"></td>
										<?php 
										$id = $datas['ID'];
										$giagocsp = $datas['Product_Price'];
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
										$Id_category = $datas['Category_ID'];
										$sql_cate = "select * from category where ID = $Id_category";
										$data_cate = select_one($sql_cate);
										?>
								

									
										<td class="center">




											<?php 
											$sql_hienthikieusp = "SELECT * FROM discountproduct where discountproduct.Product_ID = $id";
											$data_hienthikieusp = select_list($sql_hienthikieusp);

											if($data_hienthikieusp){

												foreach($data_hienthikieusp as $data2){
													$id_km =$data2['Discount_ID'];

													$sql_tenkm = "SELECT * FROM discount where ID = $id_km";
													$data_tenkm = select_list($sql_tenkm);

													foreach($data_tenkm as $data3){
														?>
														<span class="label label-success"><?php echo $data3['Discount']  ?></span>
														<?php
													}
												}
											}
											else{
												?>
												Không có chương trình
											<?php } ?>

										</td>
									
									</tr>

								<?php } }?>

							</tbody>
						</table>
					</div>
			</div>

				<div class="col-md-4">
					<div class="  col-md-12" >
						<label>Tên</label>
						<input class="form-control" placeholder="Nhập tên thường"   name="name" type="text">
					</div>
					<div class="col-md-12" >
						<label>Giới tính</label>
						<select name="DOB" id="input" class="form-control" required="required">
							<option value="0"> Nam </option>
							<option value="1"> Nữ </option>
						</select>
					</div>
					<div class="col-md-12" >
						<label>Số điện thoại:</label>
						<input class="form-control" placeholder="Nhập số điện thoại"  name="phone" type="number">
					</div>
					<div class="col-md-12" >
						<label>Địa chỉ chính:</label>
						<input class="form-control" placeholder="Nhập địa chỉ"   name="address" type="text">
					</div>
					<div class="col-md-12" >
						<label>Email</label>
						<input class="form-control"  placeholder="Nhập email"   name="email" type="text">
					</div>
				</div>
		</fieldset>
		<div class="col-md-12" style="padding-top: 20px">
		<div>
			<i class="fa fa-save"></i>
			<button class="btn-info" type="submit">
				Tạo đơn hàng
			</button>
		</div>
		</div>
		</form>
	</div>

