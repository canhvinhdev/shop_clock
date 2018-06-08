

<?php
include("lib_db.php");
include("checklogin.php");
$user = getLoggedAdmin();

if ($user) {
	

	
	header("Location:index.php");
	exit();
}
//print_r($_REQUEST);exit();
//nho sua lai ten db trong file lib_db.php dong 12
//1. get input
$email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : "";
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";


$error = '';
$checkLogin = 1;
$user = 0;
if (isset($_REQUEST["email"])){
	//da nhap thong tin
	//2. Kiem tra
	//2.1.1 tao sql
	$sql ="select * from users";
$sql .=" where Email ='{$email}' and Permission = 1";
	$user = select_one($sql);
	
	if (!$user){
		//thuc hien co user o day
		$checkLogin = 0;
	/*	$error = 'Khong ton tai username';*/
	}else{
		//kiem tra pass
		if (md5($password) != $user['Password']){
			$checkLogin = 0;
	/*		$error = 'Password khong dung';*/
		}
	}
	//dung
	if ($checkLogin){
		setLoggedAdmin($user);
		var_dump("ga");
		header("Location:index.php");
		exit();
	}
	else
		{
			$error = 'Tài khoản hoặc password của bạn không đúng ! Mời nhập Lại';
		}
}

?>




<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg" style="background: #000">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo text-center">
	                 <h1><a href="/">Hệ thống admin</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Login Admin</h6>
			               

			               <form class="form-horizontal wrap" name="login" action="login.php"  method="POST">

			              <strong> <p class="text-left">Tên đăng nhập</p></strong>
			        
			                <input class="form-control" name="email" type="email" required="" placeholder="Nhập email">
			                <hr>

    <strong><p  class="text-left">Mật khẩu</p></strong>

			                <input class="form-control" name="password" required=""  type="password" placeholder="Password">
			                	<?php  if ($error){ ?>
							Lỗi đăng nhập:
							<?php echo $error ;?>
					<?php } ?>
			                <div class="action">
			                    <button type="submit" class="btn btn-primary signup" >TIẾN HÀNH ĐĂNG NHẬP</button> 
<hr>
			                         <a href="/">Quay ra giao diện người dùng</a>
			                </div> 

			                </form>   

			            </div>
			        </div>

			     
			        </div>
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>