

<?php

$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql = "select * from users ";
$sql_new = select_list($sql);
$sql2 = "select * from users where ID = $id";
$sql_user = select_one($sql2);
?>





<div class="panel-heading">
	<div class="panel-title">Cập nhật thông tin Khách hàng </div>

	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
	</div>
</div>
<div class="panel-body">
	<form class="form-horizontal addpro" action="modules/customer/edit_exe.php" method="POST"> 
			<input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
		<fieldset class="">
			<div class="  col-md-6" >
				<label>Tên</label>
				<input class="form-control" placeholder=""  value="<?php echo  $sql_user['User_Name'] ?>" name="name" type="text">
			</div>
			<div class="col-md-3" >
				<label>Ngày sinh</label>
				<input class="form-control" placeholder="" value="<?php echo  date('d/m/Y',strtotime($sql_user['DOB'])) ?>" name="dob" type="type">



			</div>

			<div class="col-md-3" >
				<label>Giới tính</label>
				<select name="sex" id="input" class="form-control" required="required">
				<option value="0" <?php if ($sql_user['Sex'] == 0) {  ?> selected <?php } ?> >Nữ</option>
					<option value="1" <?php if ($sql_user['Sex'] == 1) {  ?> selected <?php } ?> >Nam</option>
				</select>



			</div>


			<div class="col-md-6" >
				<label>Số điện thoại:</label>
				<input class="form-control" placeholder=""  value="<?php echo  $sql_user['Moblie_Number'] ?>" name="phone" type="number">



			</div>

			<div class="col-md-6" >
				<label>Địa chỉ chính:</label>
				<input class="form-control" placeholder=""  value="<?php echo  $sql_user['Address'] ?>" name="address" type="text">



			</div>


			<div class="col-md-6" >
				<label>Email</label>
				<input class="form-control" readonly= placeholder=""  value="<?php echo  $sql_user['Email'] ?>" name="email" type="text">



			</div>


			<div class="col-md-6" >
				<label>Ngày tạo </label>
				<input class="form-control" placeholder="" readonly="" value="<?php echo  date('d/m/Y',strtotime($sql_user['Registed_Date'])) ?>" name="title" type="type">



			</div>



			<div class="col-md-6" >
				<label>Mật khẩu</label>
				<input class="form-control" placeholder=""  value="<?php echo  $sql_user['Password'] ?>" name="title" type="password">



			</div>


		</fieldset>
		<div class="col-md-12" style="padding-top: 20px">
			<div>

				<i class="fa fa-save"></i>
				<button class="btn-info" type="submit">
					Cập nhật
				</button>

			</div>
		</div>
	</form>
</div>

