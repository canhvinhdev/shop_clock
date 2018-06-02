<?php
$type=$_GET['type'];

if($type=="list"){
	include("modules/order/list.php");
}
if($type=="add"){
	include("modules/order/add.php");
}		
if($type=="edit"){
	include("modules/order/edit.php");
}		
if($type=="delete"){
	include("modules/order/delete.php");
}


?>
