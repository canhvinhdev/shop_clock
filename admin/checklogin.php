<?php 
	session_start();
	function clearLoggerUser()
	{
		unset($_SESSION['member']);
	}
	function getLoggedUser(){
	$user = isset($_SESSION['member']) ? $_SESSION['member'] : 0;
	return $user;
}
function setLoggedUser($user){
	$_SESSION['member'] = $user;
}


	function clearLoggerAdmin()
	{
		unset($_SESSION['admin']);
	}
	function getLoggedAdmin(){
	$user = isset($_SESSION['admin']) ? $_SESSION['admin'] : 0;
	return $user;
}

function setLoggedAdmin($user){
	$_SESSION['admin'] = $user;
}

function checkLoggedUser(){
	$user = getLoggedUser();
	if (!$user) {
		echo "Thông báo: Bạn phải đăng nhập: <a href=\"login.php\">Login</a>";
		exit();
	}
	return $user;
}

function checkLoggedAdmin(){
	$user = getLoggedAdmin();
	if (!$user) {
			header("location:login.php");
		exit();
	}
	return $user;
}

?>