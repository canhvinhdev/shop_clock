
<?php 
$sql_shop = "select * from aboutshop where ID = 1";

$data_shop = select_one($sql_shop);

?>
<footer>
<div class="container">


	<div class"row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4  text-center">
			<img src="images/logo_footer.png" class="img-responsive" width="300px;"  alt="Image" style="margin: auto; padding: 10px 0px;">

			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  ">
				<strong><?php echo $data_shop['Name'] ?></strong><br>
				<br>
				Giấy phép trang tin điện tử tổng hợp số 17TTT/GP-TTĐT<br>
				<br>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  text-right">
				<strong>Địa chỉ giao dịch:</strong> <?php echo $data_shop['Address'] ?><br>
				Điện thoại: <?php echo $data_shop['Phone'] ?><br>
				Email: <?php echo $data_shop['Email'] ?><br>
			</div>

		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4  text-left">
			


			<ul class="pad_ul_footer">

				<li > <a href=""> Câu hỏi thường gặp </a></li>
				<li > <a href="">Chinh sach bảo hành</a></li>
				<li > <a href="">Thông tin cửa hàng</a></li>
				<li > <a href=""> Tuyển dụng</a></li>
				<li > <a href=""> Câu hỏi thường gặp </a></li>
				<li > <a href="">Chinh sach bảo hành</a></li>
				<li > <a href="">Thông tin cửa hàng</a></li>
				<li > <a href=""> Tuyển dụng</a></li>
			</ul>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4  text-left">



			<ul class="pad_ul_footer">

				<li > <a href=""> Câu hỏi thường gặp </a></li>
				<li > <a href="">Chinh sach bảo hành</a></li>
				<li > <a href="">Thông tin cửa hàng</a></li>
				<li > <a href=""> Tuyển dụng</a></li>
				<li > <a href=""> Câu hỏi thường gặp </a></li>
				<li > <a href="">Chinh sach bảo hành</a></li>
				<li > <a href="">Thông tin cửa hàng</a></li>
				<li > <a href=""> Tuyển dụng</a></li>
			</ul>
		</div>

	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="padding: 10px 0px;">
		Copyright © 2016 - 2017
	</div>

</footer>