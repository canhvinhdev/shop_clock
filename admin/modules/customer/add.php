

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
			<div class="  col-md-6" >
				<label>Tên</label>
				<input class="form-control" placeholder="Nhập tên thường"   name="name" type="text">



			</div>



			<div class="col-md-3" >
				<label>Ngày sinh</label>
				<input class="form-control" placeholder="Chọn ngày sinh"  name="dob" type="date">



			</div>

			<div class="col-md-3" >
				<label>Giới tính</label>
				<select name="DOB" id="input" class="form-control" required="required">
					<option value="0"> Nam </option>
					<option value="1"> Nữ </option>
				</select>



			</div>


			<div class="col-md-6" >
				<label>Số điện thoại:</label>
				<input class="form-control" placeholder="Nhập số điện thoại"  name="phone" type="number">



			</div>

			<div class="col-md-6" >
				<label>Địa chỉ chính:</label>
				<input class="form-control" placeholder="Nhập địa chỉ"   name="address" type="text">



			</div>


			<div class="col-md-6" >
				<label>Email</label>
				<input class="form-control"  placeholder="Nhập email"   name="email" type="text">



			</div>

			<div class="col-md-6" >
				<label>Mật khẩu</label>
				<input class="form-control" placeholder="Nhập mật khẩu"  value="<?php echo  $sql_user['Password'] ?>" name="title" type="password">
			</div>


		</fieldset>
		<div class="col-md-12" style="padding-top: 20px">
			<div>

				<i class="fa fa-save"></i>
				<button class="btn-info" type="submit">
					Thêm khách hàng
				</button>

			</div>
		</div>
	</form>
</div>

