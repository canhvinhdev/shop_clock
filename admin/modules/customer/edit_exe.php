<?php
 include("../lib_db.php");

 $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
  	$name = isset($_POST["name"]) ? $_POST["name"] : 0;

	$password = isset($_POST["password"]) ? $_POST["password"] : 0;


$dob = isset($_POST["dob"]) ? $_POST["dob"] : 0;

$sex = isset($_POST["sex"]) ? $_POST["sex"] : 0;

$address = isset($_POST["address"]) ? $_POST["address"] : 0;

$email = isset($_POST["email"]) ? $_POST["email"] : 0;

$phone = isset($_POST["phone"]) ? $_POST["phone"] : 0;



  $sql = "update users set User_Name = '$name', Password = '$password' ,  DOB = '$dob',  Sex = '$sex',  Address = '$address',  Email = '$email',  Moblie_Number = '$phone' where ID ='$id'";
	
	
		$result = exec_update($sql);
		//echo "thanh cong";
		// var_dump($sql);
		// var_dump($result );

?>
				<script language="javascript">
					alert("Bạn đã sửa thành công!");
					window.location ="../../index.php?page=customer&type=list";
				</script>

