<?php
$type=$_GET['type'];

if($type=="list"){
	include("modules/new/list.php");
}
if($type=="add"){
	include("modules/new/add.php");
}		
if($type=="edit"){
	include("modules/new/edit.php");
}		
if($type=="delete"){
	include("modules/new/delete.php");
}


?>
