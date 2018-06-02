

<?php 
$sql_shop = "select * from aboutshop where ID = 1";

$data_shop = select_one($sql_shop);

?>


	<div class="panel-heading">
					            <div class="panel-title">THông tin về shop</div>
					          
					            <div class="panel-options">
					              <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
					              <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
					            </div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal addpro" action="modules/about/edit_exe.php" method="POST"> 
									<fieldset>
										<div class="form-group">
											<label>Tên shop</label>
											<input class="form-control" placeholder="" name="name"  value="<?php echo $data_shop['Name'] ?>" type="text">
											
										</div>


										<div class="form-group">
											<label>Địa chỉ</label>
											<input class="form-control" placeholder="" name="address" value="<?php echo $data_shop['Address'] ?>" type="text">

										</div>

										<div class="form-group">
											<label>Email</label>
											<input class="form-control" placeholder="" name="email"   value="<?php echo $data_shop['Email'] ?>" type="text">

										</div>

										<div class="form-group">
											<label>Số điện thoại</label>
											<input class="form-control" placeholder="" name="phone" value="<?php echo $data_shop['Phone'] ?>" type="text">

										</div>
										<div class="form-group">
											<label>Fanpage</label>
											<input class="form-control" placeholder="" name="fanpage" value="<?php echo $data_shop['Fanpage'] ?>" type="text">

										</div>
									</fieldset>
									<div>
										<div class="btn btn-primary">
											<i class="fa fa-save"></i>
										<button  type="submit">Cập nhật</button>	
										</div>
									</div>
								</form>
			  				</div>
