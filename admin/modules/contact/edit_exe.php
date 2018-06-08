<?php
 include("../lib_db.php");
  $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

  $status = isset($_REQUEST["status"]) ? $_REQUEST["status"] :0;

  $sql = "update contact set Status = '$status' where ID = '$id'";


	// var_dump($sql);
	// 		die();

		$result = exec_update($sql);
			
	
			header('location:../../index.php?page=contact&type=list')
?>

