<?php
 	include("../lib_db.php");



 	



 $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
  	$name = isset($_POST["name"]) ? $_POST["name"] : 0;

	$password = isset($_POST["password"]) ? $_POST["password"] : 0;
$password = md5($password);
$fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : 0;
$dob = isset($_POST["dob"]) ? $_POST["dob"] : 0;

$sex = isset($_POST["sex"]) ? $_POST["sex"] : 0;

$address = isset($_POST["address"]) ? $_POST["address"] : 0;

$email = isset($_POST["email"]) ? $_POST["email"] : 0;

$phone = isset($_POST["phone"]) ? $_POST["phone"] : 0;

$status = "1";


$created_date = date('Y-m-d H:i:s');
$permission = "0";
  	$sql = "insert into users(User_Name, Password, DOB, Sex,Address, Email, Moblie_Number, Status , Permission, Registed_Date) values ('$name', '$password','$dob', '$sex', '$address' ,'$email', '$phone', '$status','$permission', '$created_date')";
	$result = 0;

	if ($name){
		
		$result = exec_update($sql);
			// echo "thanh cong";
			// var_dump($result);
			// var_dump($sql);
	?>
		<script language="javascript">
					alert("Bạn đã cập nhật thành công!");
				
				</script>

			<?php
			header('location:../../index.php?page=customer&type=list');
	}


	


?>

