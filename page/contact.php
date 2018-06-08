<?php
$user = getLoggedUser();
if($_POST){
	if(isset($_SESSION['member'])){
		$user_login=$_SESSION['member'];
		$login =$user_login['ID'];
		$name_contact = isset($_REQUEST["name_contact"]) ? $_REQUEST["name_contact"] : '';
		$email_contact = isset($_REQUEST["email_contact"]) ? $_REQUEST["email_contact"] : '';
		$phone_contact = isset($_REQUEST["phone_contact"]) ? $_REQUEST["phone_contact"] : "";
		$content_contact = isset($_REQUEST["content_contact"]) ? $_REQUEST["content_contact"]: '';
		$created_date = date('Y/m/d H:i:s');
		$status="0";
		$sql = "insert into contact(User_ID, Status, Name, Phone, Email, Content, Created_Date) values ('$login', '$status', '$name_contact', '$email_contact','$phone_contact','$content_contact','$created_date')";
		$result = 0;
		if ($name_contact){
		//echo "thanh cong";
			$result = exec_update($sql);
			

			?>

			<script language="javascript">
				alert("Gửi liên hệ thành công! Chúng tôi sẽ sơm trả lời bạn");
				window.location ="index.php?page=slider&type=list";
			</script>

			<?php
		}


	}
    // }else
    // {
    // 	 $login = '';
    // }


}
?> 

<div class="container" style="padding-top: 10px">
	<div class="row">
		<ol class="breadcrumb">
			<li>
				<a href="/shopbanhoa">Trang chủ</a>
			</li>



			<li  class="active">
				<a href="#">Liên hệ</a>
			</li>

		</ol>
	</div>
</div>



<div class="container">
	<div class="row">

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">



			<?php   if($user){

				?>


				<h3 class="">LIÊN HỆ</h3>

				<div class="panel-body">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="panel">

							<div class="panel-body">
								<form class="fo addpro" method="POST" style="padding: 20px 0px"> 



									<div class="form-group clearfix">
										<label for="input " class="col-sm-4 control-label text-left">Tên:</label>
										<div class="col-sm-8">
											<input type="text" name="name_contact"  class="form-control"  value="<?php  echo $user['User_Name'] ?>" required="">
										</div>
									</div>

									<div class="form-group clearfix ">
										<label for="input " class="col-sm-4 control-label text-left">Email:</label>
										<div class="col-sm-8">
											<input type="email" name="email_contact"  class="form-control"  value="<?php  echo $user['Email'] ?>" required="">
										</div>
									</div>


									<div class="form-group clearfix ">
										<label for="input " class="col-sm-4 control-label text-left">SĐT:</label>
										<div class="col-sm-8">
											<input type="number" name="phone_contact"  class="form-control"  value="<?php  echo $user['Moblie_Number'] ?>" required="">
										</div>
									</div>

									<div class="form-group clearfix ">
										<label for="input " class="col-sm-4 control-label text-left">Nội dung:</label>
										<div class="col-sm-8">
											<textarea  class="form-control" placeholder="" name="content_contact" type="text" ></textarea>
										</div>
									</div>







									<div>


										<button class="btn-info" type="submit">
											<i class="fa fa-save"></i>	Gửi liên hệ
										</button>

									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
				<?php }else{ ?>
				<h3>Bạn phải thực đăng nhập để gửi được liên hệ
				</h3>	
				<br>
				<a href="?page=login">Thực hiện đăng nhập</a>
				<?php } ?>


			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="panel">

					<div class="panel-body">
						<h3 style="color: red; font-weight: bold">Shop ĐỒNG HỒ ONLINE</h3>
						<p><span class="glyphicon glyphicon-home" aria-hidden="true"></span><span> 
						Trụ sở chính: 175 Tây Sơn Đống Đa Hà Nội</span> </p>
						<p>
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>  
							Hotline: 01234567 - 0123456789
						</p>
						<p><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> 
							Email: donghodemo@gmail.com
						</p>
						<p><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span>  
							
						</p>
					</div>
				</div>
			</div>		
			<div class="col-md-12 col-xs-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6153640283483!2d105.82163931450437!3d21.008049986009596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac818e3a3139%3A0xff579bc1345f034e!2zMTc1IFTDonkgU8ahbiwgVHJ1bmcgTGnhu4d0LCDEkOG7kW5nIMSQYSwgSMOgIE7hu5lpLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1511519389510" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>

		</div>
	</div>


