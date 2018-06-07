<?php
include("lib_db.php");
include("checklogin.php");



@$param=$_GET['page'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shop bán đồng hồ</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<script src="js/jquery-3.2.0.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/script.js" ></script>



<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.css" >
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js" ></script>

	<script src="js/jquery.fancybox.min.js" ></script>
</head> 
<body id="main-body">
	
	<?php
	include("modules/header.php");

	switch(@$param){
		case 'product': include_once('page/product.php');
		break;
		case 'new': include_once('page/new.php');
		break;
		case 'category': include_once('page/category.php');
		break;
		case 'cart': include_once('page/cart/cart.php');
		break;
		case 'contact': include_once('page/contact.php');
		break;
		case 'about': include_once('page/about.php');
		break;
		case 'register': include_once('page/register.php');
		break;
		case 'login': include_once('page/login.php');
		break;

		case 'homeuser': include_once('page/homeuser.php');
		break;

case 'settinguser': include_once('page/settinguser.php');
		break;



		case 'logout': include_once('page/logout.php');
		break;
	case 'search': include_once('page/search.php');
		break;

		case 'loginorder': include_once('page/cart/loginorder.php');
		break;

		case 'order': include_once('page/cart/order.php');
		break;

		case 'success': include_once('page/cart/success.php');
		break;
		default: include_once('page/home.php');  
	}

	include("modules/footer.php");
	?>	


</body>
</html>