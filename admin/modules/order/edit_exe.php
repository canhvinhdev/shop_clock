<?php
 include("../lib_db.php");
  $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

  $status = isset($_REQUEST["status"]) ? $_REQUEST["status"] :0;

  $sql = "update `order`  set Order_Status = '$status' where ID = '$id'";
  $result = exec_update($sql);
		
  if($status == 1){

	$sql="select * from detail_order where Order_ID = '$id'";
	$query = select_list($sql);

	foreach($query as $item){
		$id = $item['Product_ID'];
		$quantity = $item['Quantity_DetailOrder'];
		$sqlsl="UPDATE product set Quantity= Quantity-'{$quantity}' where ID =$id";	
	    $resultsl2 = exec_update($sqlsl);
	}
  }else{
	$sql="select * from detail_order where Order_ID = '$id'";
	$query = select_list($sql);

	foreach($query as $item){
		$id = $item['Product_ID'];
		$quantity = $item['Quantity_DetailOrder'];
		$sqlsl="UPDATE product set Quantity= Quantity+'{$quantity}' where ID =$id";	
	    $resultsl2 = exec_update($sqlsl);
	}
  }


	// var_dump($sql);
	// 		die();

		
	// var_dump($sql);
	// die();	

	
	header('location:../../index.php?page=order&type=list')
?>

