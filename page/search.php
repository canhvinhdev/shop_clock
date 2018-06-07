<?php

    // Nhận Từ khóa cần tìm
if(isset($_POST['q'])){
	$q = $_POST['q'];
}
else{
	$q = $_GET['q'];
}
    // Loại bỏ các khoảng trắng đầu và cuối chuỗi Từ khóa
$key = trim($q);

$arr_key = explode(' ', $key);
$key = implode('%', $arr_key);
$keyword = '%'.$key.'%';
if(isset($_SESSION['user'])){
	$user_login=$_SESSION['user'];
	$sql_login="SELECT * FROM users WHERE User_Name='$user_login'";
	$row=select_one($sql_login);
	$login =$row['ID'];
}
$sql_search = "SELECT * FROM product WHERE Product_Name LIKE ('$keyword')";							
$result = select_list($sql_search);

?>
<div class="categori-area">
	<div class="container">
	<div class="area-title" style="padding-top: 30px">
						<h3>Tìm thấy sản phẩm phù hợp với từ khóa: <span class="label-success"><?php echo $q ?></span></h3>
					</div>
					</br>
	<div class="row">

		<?php if ($result) {foreach ($result as $datas) {
			?>	


			<div class="col-md-3" style = "margin-bottom: 20px;" >
				<div class="card">
					<a href="?page=product&amp;id=<?php echo $datas['ID'] ?>">
						<img src="/admin/<?php echo $datas['Product_Images'] ?>" alt="Avatar" style="width:100%">
					</a>
					<div class="text-center" style="padding: 10px; height: 120px">
						<h4><b><?php echo $datas['Product_Name'] ?></b></h4> 					
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
						<div class="red current"><?php echo  number_format($giacuoicung_rel) ?> ₫</div>



						<?php if( $data_ct_giamgia_rel ){ ?>

						<div class="prev"><del> Giá GỐC:  <?php echo   number_format($giagocsp_rel) ?> ₫</del></div>

						<?php } ?>
					</div>
					<div  class="viewmore text-center">
										<button type="button" class="btn btn-success"><a href="?page=product&amp;id=<?php echo $datas['ID'] ?>">Xem chi tiết</a></button>
									</div>
									<div  class="viewmore text-center">
										<button type="button" class="btn btn-success"><a href="page/cart/addtocart.php?id=<?php echo $datas['ID'] ?>">THÊM VÀO GIỎ</a></button>
									</div>

					<?php if($data_ct_giamgia_rel){ ?>
					<div class="gift"><img src="images/gift.png" style="width: 50px" class="img-responsive" alt="Image"></div>
					<?php } ?>
				</div>	
			</div>
			
			<?php } 
				}
				

				?>
	</div>
</div>
</div>
