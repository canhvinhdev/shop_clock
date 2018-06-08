<?php
	include("lib_db.php");
	include("checklogin.php");
	clearLoggerAdmin();
	header("Location:login.php");
?>