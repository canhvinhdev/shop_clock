<?php
include("lib_db.php");
include("checklogin.php");
$a = checkLoggedAdmin();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Quản trị viên shop Hoa online</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- styles -->
	<link href="css/styles.css" rel="stylesheet">

      <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/tables.js"></script>

    	<script type="text/javascript" language="javascript" src="js/ckeditor/ckeditor.js" ></script>


</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<!-- Logo -->
					<div class="logo">
						<h1><a href="">Quản trị website</a></h1>
					</div>
				</div>
			
			</div>
		</div>
	</div>







	<div class="page-content">
		<div class="row">
			<div class="col-md-3 show_bar">

				<div class="navbar navbar-inverse " role="banner">
						<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">

						
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Chào : Quản trị viên hệ thống<b class="caret"></b></a>
									<ul class="dropdown-menu animated fadeInUp">
										<!-- <li><a href="profile.html">Thông tin cá nhân</a></li> -->
										<li><a href="logout.php">Đăng xuất</a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				
				<div class="sidebar content-box" style="display: block;">
					<ul class="nav">
						<!-- Main menu -->
					
						<li><a href="?page=category&type=list"><i class="glyphicon glyphicon-plus"></i> Danh mục sản phẩm</a></li>
						<li><a href="?page=product&type=list"><i class="glyphicon glyphicon-plus"></i> Sản phẩm</a></li>
						<li><a href="?page=order&type=list"><i class="glyphicon glyphicon-plus"></i> Đơn hàng</a></li>
						<li><a href="?page=discount&type=list"><i class="glyphicon glyphicon-plus"></i> Chương trình khuyến mãi</a></li>
						<li><a href="?page=customer&type=list"><i class="glyphicon glyphicon-plus"></i> Danh mục khách hàng</a></li>
						<li><a href="?page=new&type=list"><i class="glyphicon glyphicon-plus"></i> Tin tức</a></li>
						<li><a href="?page=slider&type=list"><i class="glyphicon glyphicon-plus"></i> Danh mục slider</a></li>

						<li><a href="?page=contact&type=list"><i class="glyphicon glyphicon-plus"></i>Khách hàng liên hệ</a></li>

					 	<li><a href="?page=about&type=edit"><i class="glyphicon glyphicon-plus"></i> Cấu hình cho shop</a></li>



					</ul>
				</div>
			</div>


			<div class="col-md-9">
				<div class="row">
					

					<div class="col-md-12">

					<div class="content-box-large clearfix">

						<?php
					
			include("modules/body.php");
		?>
			</div>			
					</div>
				</div>

				
				
			</div>
		</div>
	</div>

	<footer>
		<div class="container">
			
			<div class="copy text-center">
				Copyright 2017 <a href='#'></a>
			</div>
			
		</div>
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->




  </body>
</html>