<?php
$type=$_GET['type'];

if($type=="list"){
	include("list.php");
}
if($type=="success"){
	include("success.php");
}		
if($type=="edit"){
	include("edit.php");
}		

?>
