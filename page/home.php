


<?php 
$slider_1 = "select * from slider where id = 1";
$slider_1 = select_one($slider_1);
$slider_2 = "select * from slider where id = 2";
$slider_2 = select_one($slider_2);
$slider_3 = "select * from slider where id = 3";
$slider_3 = select_one($slider_3);
$slider_4 = "select * from slider where id = 4";
$slider_4 = select_one($slider_4);
?>
<div>
	<div class="container" style="padding-top: 10px; padding-bottom: 10px">
		<div class="row">
			<div class="col-md-12 ">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">

					<!-- Wrapper for slides -->

					<div class="carousel-inner">

						<div class="item active">
							<img src="admin/<?php echo $slider_1['Image']?>">
							<div class="carousel-caption">
								<h3>Headline</h3>
								<p> <a href="<?php echo $slider_1['Url']?>" target="_blank" class="label label-danger"><?php echo $slider_1['Content']?></a></p>
							</div>
						</div><!-- End Item -->

						<div class="item">
							<img src="admin/<?php echo $slider_2['Image']?>">
							<div class="carousel-caption">
								<h3>Headline</h3>
								<p> <a href="<?php echo $slider2['Url']?>" target="_blank" class="label label-danger"><?php echo $slider_2['Content']?></a></p>
							</div>
						</div><!-- End Item -->

						<div class="item">
							<img src="admin/<?php echo $slider_3['Image']?>">
							<div class="carousel-caption">
								<h3>Headline</h3>
								<p> <a href="<?php echo $slider_3['Url']?>" target="_blank" class="label label-danger"><?php echo $slider_3['Content']?></a></p>
							</div>
						</div><!-- End Item -->

						<div class="item">
							<img src="admin/<?php echo $slider_4['Image']?>">
							<div class="carousel-caption">
								<h3>Headline</h3>
								<p> <a href="<?php echo $slider_4['Url']?>" target="_blank" class="label label-danger"><?php echo $slider_4['Content']?></a></p>
							</div>
						</div><!-- End Item -->

					</div><!-- End Carousel Inner -->


					<ul class="nav nav-pills nav-justified">
						<li data-target="#myCarousel" data-slide-to="0" class="active"><a href="#"><small><?php echo $slider_1['Title']?></small></a></li>
						<li data-target="#myCarousel" data-slide-to="1"><a href="#"><small><?php echo $slider_2['Title']?></small></a></li>
						<li data-target="#myCarousel" data-slide-to="2"><a href="#"><small><?php echo $slider_3['Title']?></small></a></li>
						<li data-target="#myCarousel" data-slide-to="3"><a href="#"><small><?php echo $slider_4['Title']?></small></a></li>
					</ul>
				</div><!-- End Carousel -->
			</div>
			
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-info">					
					<div class="panel-heading " id="panel-heading-new">
						<h3 class="panel-title " style="border-left: none;"><span>Hỗ trợ online</span></h3>
					</div>
					<div class="panel-body">
						<div class="sidebar-support list-group">
							<span href="#" class="list-group-item active">

								<img src="//theme.hstatic.net/1000284923/1000368312/14/avatar-answ.png?v=154" class="img-responsive">

							</span>
							<div class="support">
								<hr>
								<div class="text-center">
									<p>
										<span class="supp-name">	<strong>Ms. Hằng </strong></span>
										<br>
										<span class="phone">0123 334 444</span>
									</p>



								</div>
								<div class="text-center">

									<span class="supp-name">
										<strong>Ms. Hương </strong>	</span>


									<br>
									<p>
									0123 334 444
									</p>

								</div>
								<div class="text-center">

									<span class="supp-name">Thời gian làm việc	</span>

									<p>
										Bất kể khi nào bạn cần, hỗ trợ 24/7
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>






				<?php 
				$sql_new = "SELECT * FROM news ORDER BY id asc";
				$sql_new =select_list($sql_new);
				?>
				<div class="panel panel-info">					
					<div class="panel-heading " id="panel-heading-new">
						<h3 class="panel-title " style="border-left: none;"><span>Tin mới nhất</span></h3>
					</div>
					<div class="panel-body">
						<ul class="list_news24h">
							<?php if($sql_new) { 
								foreach ($sql_new as $data) {								
									?>
									<li class="clearfix"><span class="time_list_news24h">
										<span class="label label-danger"><?php echo $data['Created_Date'] ?></span>
									</span>    <a href="?page=new&amp;id=<?php echo $data['ID'] ?>"" class="title_list_news24h"><?php echo $data['Title'] ?></a></li>
								<?php  } } ?>										
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-9">

					<div class="blockTitle">
						<h2>
							TOP ĐỒNG HỒ BÁN MỚI NHẤT HIỆN NAY
						</h2>
					</div>
					<?php 
					$sql_new = "SELECT * FROM product where Status = 1 ORDER BY id DESC LIMIT 10";
			    //echo $sqlMNs;exit();
					$sql_new =  select_list($sql_new);
					?>
					<div class="owl-carousel3  owl-carousel owl-theme">
						<?php if ($sql_new) {foreach ($sql_new as $datas) {
							?>
							<div class="item">
								<div class="card">
									<a href="?page=product&amp;id=<?php echo $datas['ID'] ?>">
										<img src="/admin/<?php echo $datas['Product_Images'] ?>" alt="Avatar" style="width:100%">
									</a>
									<div class="text-center "  style="padding: 10px; height: 120px">
										<h4 style="height: 25px;"><b><?php echo $datas['Product_Name'] ?></b></h4> 
										<?php 
										$id=  $datas['ID'];
										$giagocsp = $datas['Product_Price'];
										$sql_promotion = "select * from discount inner join discountproduct on discount.ID = discountproduct.Discount_ID where discountproduct.Product_ID = $id ";
										$data_ct_giamgia = select_list($sql_promotion);								
										$sp_giamgia = $giagocsp; 
										if($data_ct_giamgia){
											$giacuoicung = 0;
											foreach ($data_ct_giamgia as $data3){

												$number = $data3['Number_Discount'];
												$number_percent  =  ($sp_giamgia*$data3['Number_Discount'])/100;
												$giacuoicung+= $number_percent;
											}

											$giacuoicung =  $sp_giamgia-$giacuoicung;
										}else
										{
											$giacuoicung = $sp_giamgia;

										}
										?>

										<div class="red current"><?php echo  number_format($giacuoicung) ?> ₫</div>



										<?php if($data_ct_giamgia){ ?>

											<div class="prev"><del>  <?php echo   number_format($giagocsp) ?> ₫</del></div>

										<?php } ?>

									</div>
									<div  class="viewmore text-center">
										<button type="button" class="btn btn-success"><a href="?page=product&amp;id=<?php echo $datas['ID'] ?>">Xem chi tiết</a></button>
									</div>
									<div  class="viewmore text-center">
										<button type="button" class="btn btn-success"><a href="page/cart/addtocart.php?id=<?php echo $id ?>">THÊM VÀO GIỎ</a></button>
									</div>

									<?php if($data_ct_giamgia){ ?>
										<div class="gift"><img src="images/gift.png" style="width: 50px" class="img-responsive" alt="Image"></div>
									<?php } ?>
								</div>	

							</div>
						<?php } } ?>
					</div>

					<div class="blockTitle">
						<h2>
							TOP ĐỒNG HỒ ĐƯỢC ƯU CHUỘNG NHẤT
						</h2>
					</div>
					<?php 
					$sql_new = "SELECT pr.* FROM product pr , detail_order de, `order` ord where pr.ID =de.Product_ID and de.Order_ID = ord.ID and pr.Status = 1 and ord.Order_Status = 1 ORDER BY id DESC LIMIT 10";
			   		 //echo $sqlMNs;exit();
					$sql_new =  select_list($sql_new);
					?>
					<div class="owl-carousel4  owl-carousel owl-theme">
						<?php if ($sql_new) {foreach ($sql_new as $datas) {
							?>
							<div class="item">
								<div class="card">
									<a href="?page=product&amp;id=<?php echo $datas['ID'] ?>">
										<img src="/admin/<?php echo $datas['Product_Images'] ?>" alt="Avatar" style="width:100%">
									</a>
									<div class="text-center "  style="padding: 10px; height: 120px">
										<h4 style="height: 25px;"><b><?php echo $datas['Product_Name'] ?></b></h4> 
										<?php 
										$id=  $datas['ID'];
										$giagocsp = $datas['Product_Price'];
										$sql_promotion = "select * from discount inner join discountproduct on discount.ID = discountproduct.Discount_ID where discountproduct.Product_ID = $id ";
										$data_ct_giamgia = select_list($sql_promotion);								
										$sp_giamgia = $giagocsp; 
										if($data_ct_giamgia){
											$giacuoicung = 0;
											foreach ($data_ct_giamgia as $data3){

												$number = $data3['Number_Discount'];
												$number_percent  =  ($sp_giamgia*$data3['Number_Discount'])/100;
												$giacuoicung+= $number_percent;
											}

											$giacuoicung =  $sp_giamgia-$giacuoicung;
										}else
										{
											$giacuoicung = $sp_giamgia;

										}
										?>

										<div class="red current"><?php echo  number_format($giacuoicung) ?> ₫</div>



										<?php if($data_ct_giamgia){ ?>

											<div class="prev"><del>  <?php echo   number_format($giagocsp) ?> ₫</del></div>

										<?php } ?>

									</div>
									<div  class="viewmore text-center">
										<button type="button" class="btn btn-success"><a href="?page=product&amp;id=<?php echo $datas['ID'] ?>">Xem chi tiết</a></button>
									</div>
									<div  class="viewmore text-center">
										<button type="button" class="btn btn-success"><a href="?page/cart/addtocart.php?id=<?php echo $datas['ID'] ?>">THÊM VÀO GIỎ</a></button>
									</div>

									<?php if($data_ct_giamgia){ ?>
										<div class="gift"><img src="images/gift.png" style="width: 50px" class="img-responsive" alt="Image"></div>
									<?php } ?>
								</div>	

							</div>
						<?php } } ?>
					</div>


				</div>

			</div>
			<script type="text/javascript">

				var owl = $('.owl-carousel4');
				owl.owlCarousel({
					items:4,
					loop:true,
					margin:10,
					autoplay:true,
					autoplayTimeout:3000,
					autoplayHoverPause:true
				});

				var owl = $('.owl-carousel3');
				owl.owlCarousel({
					items:4,
					loop:true,
					margin:10,
					autoplay:true,
					autoplayTimeout:3000,
					autoplayHoverPause:true
				});

			</script>


		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-left" style="padding: 20px 0px;">
				<section>

					<div class="fanpage col-md-12">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6203967986676!2d105.82162411493228!3d21.007848386009744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac818ff3aa3f%3A0x2280b664f341f50f!2zMTc1IFTDonkgU8ahbiwgVHJ1bmcgTGnhu4d0LCDEkOG7kW5nIMSQYSwgSMOgIE7hu5lpLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1527775610794" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						
					</div>
				</div>
			</div>
		</div>
