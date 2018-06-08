<?php
 include("../lib_db.php");
  //$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
  $name = isset($_POST["name"]) ? $_POST["name"] : 0;
  $address = isset($_POST["address"]) ? $_POST["address"] : 0;
  $email = isset($_POST["email"]) ? $_POST["email"] : 0;
  $phone = isset($_POST["phone"]) ? $_POST["phone"] : 0;
  $fanpage = isset($_POST["fanpage"]) ? $_POST["fanpage"] : 0;

  $sql = "update aboutshop set Name = '$name', Address = '$address', Email = '$email', Phone = '$phone' , Fanpage = '$fanpage' where ID = 1";
//var_dump($sql);
	$result = 0;
	if ($name){
	//	echo "thanh cong";
		$result = exec_update($sql);
	}

	header('location:../../index.php?page=about&type=success');

?>


