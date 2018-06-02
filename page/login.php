

<?php


$user = getLoggedUser();


//print_r($_REQUEST);exit();
//nho sua lai ten db trong file lib_db.php dong 12
//1. get input
$email = isset($_REQUEST["email_index"]) ? $_REQUEST["email_index"] : "";
$password = isset($_REQUEST["password_index"]) ? $_REQUEST["password_index"] : "";

// var_dump(md5($password));
$error = '';
$checkLogin = 1;
$user = 0;
if (isset($_REQUEST["email_index"])){
	//da nhap thong tin
	//2. Kiem tra
	//2.1.1 tao sql

	$sql ="select * from users";
	$sql .=" where Email ='{$email}' and Permission = 0 and Status = 1";
	$user = select_one($sql);
	
	if (!$user){
		//thuc hien co user o day
		$checkLogin = 0;
		/*	$error = 'Khong ton tai username';*/
	}else{
		//kiem tra pass
		if (md5($password) != $user['Password']){
			$checkLogin = 0;
			/*		$error = 'Password khong dung';*/
		}
	}
	//dung

	if ($checkLogin){

		setLoggedUser($user);
	

echo"<div class='container' style='padding-top: 20px'> <div class='label-success'>";
	echo('Đăng nhập tài khoản thành công');
	echo('</div></div>');



?>

<script language="javascript">alert("Bạn đã đăng nhập thành công");window.location="../shopbanhoa/index.php?page=homeuser";
            </script>';

<?php

		//var_dump("ga");
		//header("Location:index.php");
		exit();
	}
	else
	{
		$error = 'Tài khoản hoặc password của bạn không đúng ! Mời nhập Lại';
	}
}



?>

<?php 
if ($user) {
	//var_dump($user);die();

?>
	  <script language="javascript">alert("Bạn đã đăng ký thành công");window.location="../shopbanhoa/index.php?page=homeuser";
            </script>';

       <?php   
}
else{
	// echo "Chưa đăng nhập";
}

 ?>

<div class="container" style="padding-top: 10px">
			<div class="row">
				<ol class="breadcrumb">
					<li>
						<a href="/shopbanhoa">Trang chủ</a>
					</li>

					

					<li  class="active">
						<a href="#">Đăng nhập tài khoản</a>
					</li>
					
				</ol>
			</div>
		</div>


<div class="container" style="padding-top: 10px">
	<div class="row">
		
		<div class="panel panel- text-center">
			 <form class="form-horizontal wrap" name="" method="POST">
			<div class="panel-body">
				<div class="form-group clearfix">
					<label for="input" class="col-sm-2 control-label"> TÀI KHOẢN :</label>
					<div class="col-sm-10">
						<input type="email" name="email_index" class="form-control" >
					</div>
				</div>
				<div class="form-group clearfix">
					<label for="input " class="col-sm-2 control-label"> MẬT KHẨU :</label>
					<div class="col-sm-10">
						<input type="password" name="password_index" class="form-control">
					</div>
				</div>
<?php  if ($error){ ?>
		Lỗi đăng nhập:
		<?php echo $error ;?>
		<?php } ?>
				<div class="form-group clearfix">
					<label for="input " class="col-sm-2 control-label"> </label>
					<div class="col-sm-6">
						<button  type="submit" class="btn btn-info">ĐĂNG NHẬP</button>
					</div>

				</div>
			</form>
			</div>

		</div>
	</div>
</div>


