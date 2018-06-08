<?php 
$id = isset($_GET["id"]) ? $_GET["id"] : 0;

$current_page=isset($_GET['pagination'])?$_GET['pagination']:1;
	$limit= 4;
	$sqlnum="select count(*) as number from product where Category_ID=".$id;

	$num = select_one($sqlnum);

	$total_record=$num['number'];

	$total_page=ceil($total_record/$limit);
	$start=($current_page-1)*$limit;



if(empty($id)) {
	require_once("error.php");
} else {

	$sqlCate = "select * from product where Status = 1 and Category_ID = $id limit {$start}, {$limit}";
	$sqlCate = select_list($sqlCate);
}







$sql_breadcrumb = "select * from  category where ID = $id";
$data_breadcrumb = select_one($sql_breadcrumb);


?>
<div class="container" style="padding-top: 10px">
	<div class="row">
		<ol class="breadcrumb">
			<li>
				<a href="/">Trang chủ</a>
			</li>
			<li  class="active">
				<a href="#"><?php echo $data_breadcrumb['Category_name'] ?></a>
			</li>

		</ol>
	</div>
</div>





<div class="container">
	<div class="row">

		<?php if ($sqlCate) {foreach ($sqlCate as $datas) {
			?>	


			<div class="col-md-3">
				<div class="card">
					<a href="?page=product&amp;id=<?php echo $datas['ID'] ?>">
						<img src="/admin/<?php echo $datas['Product_Images'] ?>" alt="Avatar" style="width:100%">
					</a>
					<div class="text-center" style="padding: 10px; height: 120px">
						<h4><b><?php echo $datas['Product_Name'] ?></b></h4> 					
						<?php 
						$id_ =  $datas['ID'];
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



						<?php if( $data_ct_giamgia ){ ?>

						<div class="prev"><del> Giá GỐC:  <?php echo   number_format($giagocsp) ?> ₫</del></div>

						<?php } ?>
					</div>
					<div  class="viewmore text-center">
										<button type="button" class="btn btn-success"><a href="?page=product&amp;id=<?php echo $datas['ID'] ?>">Xem chi tiết</a></button>
									</div>
									<div  class="viewmore text-center">
										<button type="button" class="btn btn-success"><a href="page/cart/addtocart.php?id=<?php echo $datas['ID'] ?>">THÊM VÀO GIỎ</a></button>
									</div>

					<?php if($data_ct_giamgia){ ?>
					<div class="gift"><img src="images/gift.png" style="width: 50px" class="img-responsive" alt="Image"></div>
					<?php } ?>
				</div>	
			</div>
			<?php } 




		}
		else{

			echo '<p>Hiện tại chưa có sản phẩm nào trong danh mục</p>';
		}

		?>
	</div>
</div>








<?php if ($start != 0){  ?>
 
<div class="container">	



	<div class="row">	
   <div style="display: block; clear: both;text-align: center;">
										<ul  class="pagination">
											<li>
												<a href="index.php?page=category&pagination=<?php if($current_page>1){ echo ($current_page-1);} else echo $current_page; ?>&id=<?php echo $id?>">
												&laquo;</a>
											</li>
											<?php if($total_page>0){for($i=1;$i<=$total_page;$i++){?>
											<li><a href="index.php?page=category&pagination=<?php echo $i?>&id=<?php echo $id?>"><?php echo $i ?></a></li>
											<?php }	} ?>
											<li>
												<a href="index.php?page=category&pagination=<?php if($current_page<$total_page){ echo ($current_page+1);} else echo $current_page; ?>&id=<?php echo $id?>">
													&raquo;</a>
											</li>
										</ul>
									</div>
			</div>
		</div>


<?php  } ?>