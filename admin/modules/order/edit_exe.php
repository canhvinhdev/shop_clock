<?php
 include("../lib_db.php");
  $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

  $status = isset($_REQUEST["status"]) ? $_REQUEST["status"] :0;

  $sql = "update `order`  set Order_Status = '$status' where ID = '$id'";


	// var_dump($sql);
	// 		die();

		$result = exec_update($sql);
		
	// var_dump($sql);
	// die();	

	
	header('location:../../index.php?page=order&type=list')
?>

