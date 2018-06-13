

<?php
   
    if($_POST){
       	$name_register = isset($_REQUEST["name_register"]) ? $_REQUEST["name_register"] : '';
	$email_register = isset($_REQUEST["email_register"]) ? $_REQUEST["email_register"] : '';
	$password_register = isset($_REQUEST["password_register"]) ? $_REQUEST["password_register"] : "";

	$password_register = md5($password_register);
	$repassword_register = isset($_REQUEST["repassword_register"]) ? $_REQUEST["repassword_register"]: '';
	$repassword_register = md5($repassword_register);
	$created_date = date('Y/m/d H:i:s');


	$permisson = '0';
	$status="1";
        //Tạo sql
        
        	$sql = "insert into users(User_Name, Email, Password, Permission, Status, Registed_Date) values ('$name_register', '$email_register','$password_register','$permisson','$status', '$created_date')";

	$err=array();

	$name_register=trim($name_register);

	$email_register=trim($email_register);


	$password_register=trim($password_register);



$validate_email = '#^[a-z][a-z0-9\._]{2,31}@[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
	if(!preg_match($validate_email ,$email_register, $matchs)){
		echo  "Mail bạn vừa nhập không đúng định dạng ";
	}


	if($name_register!=''){
		$sql_check="select * from users where Permission= 0";
		$result=select_list($sql_check);
		foreach ($result as $key) {
			if($key['Email'] == $email_register)
			{
				$err['b']="Email này đã có người đăng ký.";

			}
		}



	}

	if($password_register!=$repassword_register)
	{
		$err['mk1']="Mật khẩu không trùng khớp. Mời bạn kiểm tra lại.";
	}
	if(strlen($password_register)<6)
	{
		$err['mk']="Mật khẩu phải từ 6 ký tự.";
	}







       /* if (!eregi("^\(?[\d]{3}\)?-\(?[\d]{2}\)?-[\d]{2}\.[\d]{3}-[\d]{3}$", $sodienthoai))
        {
            $err[]="Số điện thoại này không hợp lệ. Vui long nhập số điện thoại khác khác.";
        }*/
        //echo $checkmail;exit();
        
        if (count($err)==0) {
            
            $result_kh=exec_update($sql);
            ?>

            <script language="javascript">alert("Bạn đã đăng ký thành công");
           	window.location="/index.php?page=login";
            </script>';
            <?php
        }
        
}
?> 





<div class="container" style="padding-top: 10px">
	<div class="row">
		<ol class="breadcrumb">
			<li>
				<a href="/">Trang chủ</a>
			</li>



			<li  class="active">
				<a href="#">Đăng ký tài khoản</a>
			</li>

		</ol>
	</div>
</div>


<div class="container" style="padding-top: 10px">
	<div class="row">

		<div class="panel panel- text-center">
			<form method="post" class="register-custom" style="margin: 0 auto;padding-top: 20px;">
				<div class="panel-body">
					<div class="form-group clearfix col-md-6 col-md-offset-3">
						<label for="input " class="col-sm-4 control-label text-left">Tên :</label>
						<div class="col-sm-8">
							<input type="text" name="name_register"  class="form-control" required="">
						</div>
					</div>

					<div class="form-group clearfix col-md-6 col-md-offset-3">
						<label for="input " class="col-sm-4 control-label text-left">Email đăng nhập:</label>
						<div class="col-sm-8">
							<input type="email" name="email_register"  class="form-control"  required="" value="<?php if($_POST)  echo $email_register ?>">

							<?php
							if(isset($err['b'])){
								echo '<label style="margin-left: -85px;">'.$err['b'].'</label>'; 
							}
							?>
						</div>
					</div>
					<div class="form-group clearfix col-md-6 col-md-offset-3">
						<label for="input " class="col-sm-4 control-label text-left">Mật khẩu:</label>
						<div class="col-sm-8">
							<input type="password" name="password_register"  value="<?php if($_POST)  echo $password_register ?>" class="form-control" required="">
						</div>

						<?php
						if($_POST){
							if(strlen($password_register)<6)
								echo '<span style="color:red">'.$err['mk']."<br/> </span>";

						}   
						?>
					</div>

					<div class="form-group clearfix col-md-6 col-md-offset-3">
						<label for="input " class="col-sm-4 control-label text-left">Xác nhận mật khẩu:</label>
						<div class="col-sm-8">
							<input type="password" name="repassword_register"  class="form-control" required="" value="<?php if($_POST)  echo $repassword_register ?>">

							<?php
							if($_POST){
								if($password_register!=$repassword_register)
									echo '<span style="color:red">'.$err['mk1']."<br/> </span>";

							}   
							?>
						</div>
					</div>

					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-info" >ĐĂNG KÝ</button>
					</div>

				</div>
			</form>
		</div>
	</div>
</div>
</div>

