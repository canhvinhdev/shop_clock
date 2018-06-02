<!-- <?php 
session_start();
?> -->

<?php 
$user = getLoggedUser();

$user_id = $user['ID'];
$sql2 = "select * from users where ID = $user_id";
$user_login = select_one($sql2);

?>
<header>
	<div class="container-fluid full-width">
		<div class="container">
			<div class="row flex" >
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<div id="logo">
						<a href="/"><img src="images/logo_footer.png" class="img-responsive" alt=""></a>
					</div>

				</div>
				<div class="col-xs-12 col-sm-4 col-md-34 col-lg-4">
					

					<form style="padding-top: 20px; float: right;" class="" action="index.php?page=search" method="post">
						<input type="text" name="q" class="search" placeholder="Bạn muốn tìm kiếm đồng hồ phù hợp">

						<p type="submit" class="" ></p>
					</form>
				</div>	
				
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-right" style="    padding-top: 10px;">


					<a href="?page=login"> <i class="fa fa-user-plus fa-3x" aria-hidden="true"></i></a>
					<a href="?page=register"> <i class="fa fa-user-circle fa-3x" aria-hidden="true"></i></a>

					<a href="?page=cart"> <i class="fa fa-shopping-cart fa-3x" aria-hidden="true"></i>
							(0) Sản phẩm
					</a>
				</div>
			</div>
		</div>
	</div>
</header>


<div class="container hidden-lg hidden-md">
	<div id="nav-mobile ">
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<nav class="nav-mobile-setting" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->


					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="">
						<ul class="nav navbar-nav">


							<?php 

							$sqlCate_moblie = "select * from category where Parent_id=0";

							$sqlCate_moblie = select_list($sqlCate_moblie);
							foreach ($sqlCate_moblie as $key ) { ?> 
								<li><a href="?page=category&id=<?php echo $key['ID'] ?>"><?php echo $key['Category_name'] ?></a>
									<?php 
									$sqlSub = "select * from category where Parent_id=".$key['ID'];

									$sqlSub = select_list($sqlSub);   

									if(!empty($sqlSub)){?>
										<ul class="dropdown-menu">
											<?php foreach($sqlSub as $sqlSub) { ?>
												<li>
													<a href="?page=category&id=<?php echo $sqlSub['ID'] ?>"><?php echo $sqlSub['Category_name'] ?></a>
												</li>	
											<?php } ?>
										</ul>
									<?php } ?>


								</li>


							<?php } ?>

							<li><a href="?page=about">Giới thiệu</a>
							</li>


							<li><a href="?page=contact">Liên hệ</a>
							</li>

						</ul>


					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
		</div>

		<div id="main">

			<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
		</div>
		<script>
			function openNav() {
				document.getElementById("mySidenav").style.width = "100%";

			}

			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
				document.getElementById("main-body").style.marginLeft= "0";
			}
		</script>
	</div>
</div>	
<div id="nav">
	<div class="container hidden-xs hidden-sm">
		<div class="row">
			<?php 
			if ($user) {			
				?>
				<div class="main-menu col-md-8">


				<?php }else{  ?>
					<div class="main-menu col-md-12">	
					<?php } ?>
					<nav>
						<ul class="ffff">								
							<?php 
							$sqlCate = "select * from category where Parent_id = 0 ";
							$sqlCategory = select_list($sqlCate);


							if($sqlCategory){
								foreach ($sqlCategory as $key ) { ?> 
									<li class="li_lv1">
										<a href="?page=category&id=<?php echo $key['ID'] ?>"><?php echo $key['Category_name'] ?></a>
										<?php 
										$sqlSubDes = "select * from category where Parent_id=".$key['ID'];
										$sqlSubDes = select_list($sqlSubDes);             
										?>

										<ul class="sup-menu">			
											<?php

											if($sqlSubDes){								
												foreach($sqlSubDes as $data) {
													?>
													<li>		
														<a href="?page=category&id=<?php echo $data['ID'] ?>">
															<?php echo $data['Category_name'] ?>											
														</a>
													</li>		
												<?php }

											}
											?>

										</ul>



									</li>
								<?php }
							}
							?>

							<li class="li_lv1"><a href="?page=about">Giới thiệu</a>
							</li>
							<li class="li_lv1"><a href="?page=contact">Liên hệ</a>
							</li>				
						</ul>
					</nav>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 main-menu text-right">
					<ul>


						<?php 
						if ($user) {			
							?>
							<li class="li_lv1"><a href="?page=homeuser">Xin chào <?php echo $user_login['User_Name'] ?></a></li>
							<li class="li_lv1"><a href="?page=logout">Đăng xuất</a></li>

						<?php }else { ?>
							

						<?php } ?>
					</ul>
				</div>
			</div>
		</div>

	</div>
