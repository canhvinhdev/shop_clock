<?php
$type=$_GET['type'];

if($type=="list"){
	include("modules/product/list.php");
}
if($type=="add"){
	include("modules/product/add.php");
}		
if($type=="edit"){
	include("modules/product/edit.php");
}		
if($type=="delete"){
	include("modules/product/delete.php");
}


?>
