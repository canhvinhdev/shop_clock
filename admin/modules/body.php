<?php 

@$param=$_GET['page'];
switch(@$param){
		case 'product': include('product/home.php');
		break;
		case 'category': include('category/home.php');
		break;	
		case 'order': include('order/home.php');
		break;
		case 'customer': include('customer/home.php');
		break;
		case 'new': include('new/home.php');
		break;
		case 'slider': include('slider/home.php');
		break;
		case 'discount': include('discount/home.php');
		break;
		case 'about': include('about/home.php');
		break;
		case 'contact': include('contact/home.php');
		break;		
	}

 ?>