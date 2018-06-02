<?php
$type=$_GET['type'];

if($type=="list"){
	include("list.php");
}
if($type=="order"){
	include("order.php");
}
if($type=="add"){
	include("add.php");
}		
if($type=="edit"){
	include("edit.php");
}		
if($type=="delete"){
	include("delete.php");
}


?>
