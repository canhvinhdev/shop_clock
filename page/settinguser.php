
<?php


if(isset($_SESSION["member"])){

	$_SESSION["member"] = $user;
	


	$user_id = $user['ID'];
$sql2 = "select * from users where ID = $user_id";
$user_login = select_one($sql2);

}
if (isset($_POST['user_login'])) {


$id = $user_id;
$name = isset($_POST["name"]) ? $_POST["name"] : 0;

$password = isset($_POST["password"]) ? $_POST["password"] : 0;


$dob = isset($_POST["dob"]) ? $_POST["dob"] : 0;

$sex = isset($_POST["sex"]) ? $_POST["sex"] : 0;

$address = isset($_POST["address"]) ? $_POST["address"] : 0;

$email = isset($_POST["email"]) ? $_POST["email"] : 0;

$phone = isset($_POST["phone"]) ? $_POST["phone"] : 0;



$sql = "update users set User_Name = '$name', Password = '$password' ,  DOB = '$dob',  Sex = '$sex',  Address = '$address',  Email = '$email',  Moblie_Number = '$phone' where ID ='$id'";


$result = exec_update($sql);
	?>
				<script language="javascript">
					alert("Bạn đã cập nhật thành công!");
						window.location ="index.php?page=homeuser";
				</script>
				<?php



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
			





			<div class="panel-heading">
				<div class="panel-title">Cập nhật thông tin cá nhân</div>


			</div>
			<div class="panel-body">
				<form class="form-horizontal addpro" action="" method="POST"> 
					<input type="hidden" name="id" value="<?php echo $user_id?>" />
					<fieldset class="">
						<div class="  col-md-6" >
							<label>Tên</label>
							<input class="form-control" placeholder="" required=""  value="<?php echo  $user_login['User_Name'] ?>" name="name" type="text">



						</div>


						<div class="col-md-3" >
							<label>Ngày sinh</label>
							<input class="form-control" placeholder=""  required=""   value="<?php echo  $user_login['DOB'] ?>" name="dob" type="text">



						</div>

						<div class="col-md-3" >
							<label>Giới tính</label>
							<select name="sex" id="input" class="form-control"  required="required">
											<option value="0" <?php if ($user_login['Sex'] == 0) {  ?> selected <?php } ?> >Nữ</option>
					<option value="1" <?php if ($user_login['Sex'] == 1) {  ?> selected <?php } ?> >Nam</option>
							</select>



						</div>


						<div class="col-md-6" >
							<label>Số điện thoại:</label>
							<input class="form-control" placeholder=""  required=""  value="<?php echo  $user_login['Moblie_Number'] ?>" name="phone" type="number">



						</div>

						<div class="col-md-6" >
							<label>Địa chỉ chính:</label>
							<input class="form-control" placeholder=""  required=""   value="<?php echo  $user_login['Address'] ?>" name="address" type="text">



						</div>


						<div class="col-md-6" >
							<label>Email</label>
							<input class="form-control" readonly="" placeholder=""  value="<?php echo  $user_login['Email'] ?>" name="email" type="text">



						</div>


						<div class="col-md-6" >
							<label>Ngày tạo </label>
							<input class="form-control" placeholder="" readonly="" value="<?php echo  date('d/m/Y',strtotime($user_login['Registed_Date'])) ?>" name="title" type="type">



						</div>



						<div class="col-md-6" >
							<label>Mật khẩu</label>
							<input class="form-control" placeholder=""  value="<?php echo  $user_login['Password'] ?>" name="password" type="password">



						</div>


					</fieldset>
					<div class="col-md-12" style="padding-top: 20px">
						<div>

							
							<button class="btn-info " type="submit" name="user_login" >
								Cập nhật
							</button>

						</div>
					</div>
				</form>
			</div>



		</div>
	</div>
</div>

