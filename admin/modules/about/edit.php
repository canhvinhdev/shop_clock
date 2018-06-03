

<?php 
$sql_shop = "select * from aboutshop where ID = 1";

$data_shop = select_one($sql_shop);

?>


	<div class="panel-heading">
					            <div class="panel-title">Cấu hình các nội dung của Hệ thống</div>
					          
					            <div class="panel-options">
					              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					            </div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal addpro" action="modules/about/edit_exe.php" method="POST"> 
									<fieldset>
										<div class=" col-md-6">
											<label>Tên hệ thống</label>
											<input class="form-control" placeholder="" name="name"  value="<?php echo $data_shop['Name'] ?>" type="text">
											
										</div>


									<div class=" col-md-6">
											<label>Địa chỉ</label>
											<input class="form-control" placeholder="" name="address" value="<?php echo $data_shop['Address'] ?>" type="text">

										</div>

										<div class=" col-md-6">
											<label>Email</label>
											<input class="form-control" placeholder="" name="email"   value="<?php echo $data_shop['Email'] ?>" type="text">

										</div>

							<div class=" col-md-6">
											<label>Số điện thoại</label>
											<input class="form-control" placeholder="" name="phone" value="<?php echo $data_shop['Phone'] ?>" type="text">

										</div>
										<div class=" col-md-6">
											<label>Fanpage</label>
											<input class="form-control" placeholder="" name="fanpage" value="<?php echo $data_shop['Fanpage'] ?>" type="text">

										</div>
									</fieldset>
									<div>

									<hr>
									<div class=" col-md-12 text-center">
											<i class="fa fa-save"></i>
										<button  type="submit" class="btn btn-primary">Cập nhật</button>	
										</div>
									</div>
								</form>
			  				</div>
