
<?php

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] :0;

$sqlpro = "select * from  product where Status = 1 and ID = $id";
$data_product = select_one($sqlpro);
$data_giamgiasp = $data_product['Discount'];

$motasp = $data_product['Description'];
$soluongsp = $data_product['Quantity'];
$giagocsp = $data_product['Product_Price'];

$sql_related= "select * from  product where Category_ID = {$data_product['Category_ID']} and ID != $id limit 5";
$data_sp_lienquan = select_list($sql_related);


$category_id = $data_product['Category_ID'];
$sql_breadcrumb = "select * from  category where ID = $category_id";


$data_dieuhuong = select_one($sql_breadcrumb);


$sql_promotion = "select * from discount inner join discountproduct on discount.ID = discountproduct.Discount_ID where discountproduct.Product_ID = $id ";
$data_ct_giamgia = select_list($sql_promotion);


?>




<div class="container" style="padding-top: 10px">
	<div class="row">
		<ol class="breadcrumb">
			<li>
				<a href="">Trang chủ</a>
			</li>

			<li >
				<a href="?page=category&amp;id=<?php echo $data_dieuhuong['ID'] ?>"><?php echo $data_dieuhuong['Category_name'] ?></a>
			</li>


			<li  class="active">
				<a href="#"><?php echo $data_product['Product_Name'] ?></a>
			</li>

		</ol>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<div class="img_pro">

				<a data-fancybox="gallery" href="/admin/<?php echo $data_product['Product_Images'] ?>">
					<img src="/admin/<?php echo $data_product['Product_Images'] ?>" alt="Avatar" style="width:100%">
				</a>

				<?php if($data_ct_giamgia){ ?>
					<div class="gift"><img src="images/gift.png" style="width: 100px" class="img-responsive" alt="Image"></div>
				<?php } ?>
			</div>
		</div>
		<div class="col-md-4">

			<h3 class="title_pro"><?php echo $data_product['Product_Name'] ?></h3>

			<div class="box_social clearfix" style=" ">
				<div class="fb">
					<div class="fb-like fb_iframe_widget" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=0&amp;href=http%3A%2F%2Fdungcusangtao.vn%2Fproducts%2Ftau-sac-dien-thoai-do-dien-ap-nhiet-do-dong-ho-tren-o-to&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small"><span style="vertical-align: bottom; width: 122px; height: 20px;"><iframe name="fdbe71d51a34f8" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.8/plugins/like.php?action=like&amp;app_id=&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FlY4eZXm_YWu.js%3Fversion%3D42%23cb%3Df273ccd7fd59d5c%26domain%3Ddungcusangtao.vn%26origin%3Dhttp%253A%252F%252Fdungcusangtao.vn%252Ffeee9a11900294%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fdungcusangtao.vn%2Fproducts%2Ftau-sac-dien-thoai-do-dien-ap-nhiet-do-dong-ho-tren-o-to&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small" style="border: none; visibility: visible; width: 122px; height: 20px;" class=""></iframe></span></div>
				</div>
				<div class="price detail-info-entry">

					<div class="des-short">
						<?php if(isset($motasp)) { 	?>
							<p>	<?php echo  substr($motasp, 0,200) ?></p>

						<?php } ?>
					</div>
					<?php




					$sp_giamgia = $giagocsp; 
					if($data_ct_giamgia){
						$giacuoicung = 0;
						foreach ($data_ct_giamgia as $data3){

							$number = $data3['Number_Discount'];
							$number_percent  =  ($sp_giamgia*$data3['Number_Discount'])/100;
							$giacuoicung+= $number_percent;
						}
						$giacuoicung =  number_format($sp_giamgia-$giacuoicung);
					}else
					{
						$giacuoicung = $sp_giamgia;

					}

					if($data_ct_giamgia){
						?>	
						<div class="current"><?php echo  $giacuoicung ?> ₫</div>
						<?php
					}else
					{
						?>
						<div class="current"><?php echo  number_format($sp_giamgia) ?> ₫</div>
					<?php } ?>

					<?php if(($data_giamgiasp > 0 || $data_ct_giamgia)){ ?>

						<div class="prev_product"><del> (<?php echo   number_format($giagocsp) ?> đ )</del></div>

					<?php } ?>
					<div class="type_content clearfix" style="padding-left: 10px 0px">
						<p class="col-md-12" style="padding-left: 0px"><strong>Tình trạng:
							<?php if ( $soluongsp > 0 )
							{
								?>
								<span class="label label-info">Còn hàng (<?php  echo $soluongsp   ?> sản phẩm)</span>

								<?php
							}else{

								?>
								<?php
								echo "Cháy Hàng";
							}
							?>
						</strong> </p> 
					</div>
					<!-- <div class="quantity-selector detail-info-entry">
						<div class="detail-info-entry-title">Số lượng</div>
						<div class="entry number-minus">&nbsp;</div>
						<input type="number" name=" " id="input "  value="1" required="required" pattern="" title="" >
					</div> -->
					<div class="entry number-plus">&nbsp;</div>
				</div>

				<?php  if ( $soluongsp > 0 )  { ?>
					<button type="submit" class="btn btn-danger addtocart" ><a href="page/cart/addtocart.php?id=<?php echo $id ?>">THÊM HÀNG VÀO GIỎ</a></button>

				<?php } ?>
				<button type="submit" class="btn btn-success addtocart" ><a href="tel:0123456">GỌI NGAY: 012345678</a></button>
				<hr>
				<?php if ($data_ct_giamgia) {foreach ($data_ct_giamgia as $datas) {
					?>	

					<div class="prod-promotion">
						<div class="promo-ribbon"><span>Quà tặng</span></div>
						<div class="promo-item row promo-camp promo-camp-2291" data-promo="2291">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


								<a target="_blank" href="" class="promo-apply" data-promo="2291">

									<span class="promo-item-name">

										<?php echo $datas['Attach_Discount'] ?>
									</span>
									<span class="promo-item-time">Áp dụng từ <b><?php echo date('h:i:s d-m-Y', strtotime($datas['Start_Time'])) ?></b> đến <b><?php echo date('h:i:s d-m-Y', strtotime($datas['End_Time'])) ?></b>
									</span>
								</a>
							</div>
						</div>
					</div>
				<?php }} ?>


			</div>
		</div>

		<div class="col-md-3">
			<div class="pdPolicyWrap">
				<ul class="listPolicy">
					<li class="item">
						<a href="">
							<div class="box">
								<div class="icon">
									<img src="//theme.hstatic.net/1000285571/1000368965/14/product_policy_1.png?v=450"  class="img-responsive" alt="Giao hàng">
								</div>
								<div class="detail">
									<h5>
										Giao hàng
									</h5>
									<span> phí giao hàng 20.000</span>
								</div>
							</div>
						</a>

					</li>
					<li class="item">
						<a href="">
							<div class="box">
								<div class="icon">
									<img src="//theme.hstatic.net/1000285571/1000368965/14/product_policy_2.png?v=450"  class="img-responsive" alt="Sản phẩm">
								</div>
								<div class="detail">
									<h5>
										Sản phẩm
									</h5>
									<span>Cam kết chính hãng 100% <br> </span>
								</div>
							</div>
						</a>

					</li>										
					<li class="item">
						<a href="">
							<div class="box">
								<div class="icon">
									<img src="//theme.hstatic.net/1000285571/1000368965/14/product_policy_3.png?v=450"  class="img-responsive" alt="Đổi trả">
								</div>
								<div class="detail">
									<h5>
										Đổi trả
									</h5>
									<span>Đổi mới trong vòng 30 ngày  lỗi do nhà sản xuất</span>
								</div>
							</div>
						</a>

					</li>											
					<li class="item">
						<a href="">
							<div class="box">
								<div class="icon">
									<img src="//theme.hstatic.net/1000285571/1000368965/14/product_policy_4.png?v=450"  class="img-responsive" alt="Hỗ trợ">
								</div>
								<div class="detail">
									<h5>
										Hỗ trợ
									</h5>
									<span>Hotline: 099 999 999 <br> Thứ 2 - 7: 08:00 - 19:00 <br> Chủ nhật: 09:00 - 17:00</span>
								</div>
							</div>
						</a>

					</li>


				</ul>
			</div>
		</div>


	</div>



	<hr>
	<div id="accordion">
		<div class="card">
			<div class="card-header" id="headingOne">
				<h5 class="mb-0">
					<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<i class="fa fa-plus"></i>	Thông tin chi tiết
					</button>
				</h5>
			</div>

			<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
				<div class="card-body">
					<?php if(isset($motasp)) { 	?>
						<p>	<?php echo $motasp ?></p>

						<?php } ?>      </div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingTwo">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								<i class="fa fa-plus"></i>		Chế độ bảo hành
							</button>
						</h5>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
						<div class="card-body">
							Tất cả các đồng hồ khi bán ra đều kèm theo 2 phiếu bảo hành:

							<br>
							1 Phiếu Bảo Hành (hoặc Thẻ Bảo Hành/Sổ Bảo Hành) của hãng có giá trị bảo hành Quốc tế (Thời gian bảo hành tùy theo quy định của từng hãng).
							1 Phiếu Bảo Hành của Hải Triều (Sử dụng để được thay pin miễn phí vĩnh viễn & Hưởng chế độ bảo hành tăng thêm của Hải Triều).
							<br>
							Ví dụ: Đồng Hồ Citizen có chế độ bảo hành chính hãng: máy = 12 tháng, Pin = 12 tháng.

							<br>
							Khi mua tại Hải Triều, Khách hàng sẽ được bảo hành thêm 48 tháng về máy. Pin = Vĩnh Viễn.
							Tổng cộng: Khi mua tại Hải Triều, đồng hồ Citizen sẽ được bảo hành máy = 05 năm, Pin = Vĩnh Viễn.
							<br>
							Lưu ý:

							<br>
							Đối với sản phẩm còn trong thời gian bảo hành Quốc Tế: Quý khách có thể đem tới Hải Triều hoặc bất kỳ nhà trung tâm bảo hành nào của hãng được ghi trên phiếu để yêu cầu được kiểm tra đồng hồ.<br>
							Đối với sản phẩm hết thời gian bảo hành Quốc Tế nhưng vẫn trong thời gian bảo hành tại Hải Triều: Quý khách đem đồng hồ kèm Phiếu Bảo Hành của Hải Triều tới bất kỳ chi nhánh nào của Hải Triều để được hướng dẫn và kiểm tra đồng hồ.

							<br>

						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingThree">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								<i class="fa fa-plus"></i>		Nhận xét của khách hàng 
							</button>
						</h5>
					</div>
					<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
						<div class="card-body">
							<h3>BÌNH LUẬN</h3>
							<p>
								<div class="container-fluid">
									<div id="fb-root"></div>					
									<div class="fb-comments" data-href="" data-numposts="5" width="100%" data-colorscheme="light"></div>
									<!-- script comment fb -->
									<script type="text/javascript">(function(d, s, id) {
										var js, fjs = d.getElementsByTagName(s)[0];
										if (d.getElementById(id)) return;
										js = d.createElement(s); js.id = id;
										js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
										fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));
								</script>
							</div>
						</div>
					</div>
				</div>
			</div>
			<h3>SẢN PHẨM CÙNG NHÓM</h3>
			<div class="row">


			<div class="related">
				<?php if ($data_sp_lienquan) {foreach ($data_sp_lienquan as $datas) {
					?>
					<div class="col-md-3 ">
						<div class="card ">
							<img src="/admin/<?php echo $datas['Product_Images'] ?>" alt="Avatar" style="width:100%">
							<div class="text-center" style="padding: 10px;">




								<?php 

								$id =  $datas['ID'];

								$giagocsp_rel = $datas['Product_Price'];




								$sql_promotion_rel = "select * from discount inner join discountproduct on discount.ID = discountproduct.Discount_ID where discountproduct.Product_ID = $id ";
								$data_ct_giamgia_rel = select_list($sql_promotion_rel);





								$sp_giamgia_rel = $giagocsp_rel; 


								if($data_ct_giamgia_rel){
									$giacuoicung_rel = 0;
									foreach ($data_ct_giamgia_rel as $data3){

										$number = $data3['Number_Discount'];
										$number_percent  =  ($sp_giamgia_rel*$data3['Number_Discount'])/100;
										$giacuoicung_rel+= $number_percent;


									}

									$giacuoicung_rel =  $sp_giamgia_rel-$giacuoicung_rel;


								}else
								{
									$giacuoicung_rel = $sp_giamgia_rel;

								}


								?>					
								<h4><b><?php echo $datas['Product_Name'] ?></b></h4> 						
								<div class="red current"><?php echo  number_format($giacuoicung_rel) ?> ₫</div>

								<?php if(($data_ct_giamgia_rel )){ ?>
									<div class="prev"><del>( <?php echo   number_format($giagocsp_rel) ?> ₫ )</del></div>
								<?php } ?>
								<?php if($data_ct_giamgia_rel){ ?>
									<div class="gift"><img src="images/gift.png" style="width: 50px" class="img-responsive" alt="Image"></div>
								<?php } ?>
							</div>
							<div  class="viewmore text-center">
										<button type="button" class="btn btn-success"><a href="?page=product&amp;id=<?php echo $datas['ID'] ?>">Xem chi tiết</a></button>
									</div>
									<div  class="viewmore text-center">
										<button type="button" class="btn btn-success"><a href="page/cart/addtocart.php?id=<?php echo $datas['ID'] ?>">THÊM VÀO GIỎ</a></button>
									</div>
						</div>	
					</div>
				<?php } } ?>
			</div>

			</div>
		</div>

		<script>
			function openCity(evt, cityName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " active";
			}
		</script>


	</div>
</div>
