

<?php 
$sql_pro = "select * from product where Status = 1 order by ID DESC";

$data_pro = select_list($sql_pro);

?>



<div class="panel-heading">
	<div class="panel-title col-md-5">Danh sách sản phẩm</div>
	<button type="button" class="btn btn-info right"><a href="?page=product&type=add">Thêm hoa</a></button>
</div>
<div class="panel-body">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr class="text-center">
				<th>STT</th>
				<th>Tên sản phẩm</th>
				<th>Ảnh đại diện</th>
				<th>Danh mục</th>
				<th>Giá</th>
				<th>Chương trình khuyến mãi</th>
				<th>Cấu hình sản phẩm</th>
			</tr>
		</thead>
		<tbody>

			<?php 
			$i= 1;
			if($data_pro){
				foreach ($data_pro as $datas){?>
				<tr class="odd gradeX">
					<td><?php echo $i++ ?></td>
					<td><?php echo $datas['Product_Name'] ?></td>
					<td><img src="<?php echo $datas['Product_Images'] ?>" width="150"></td>






					<?php 

					$id = $datas['ID'];




				
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



					$Id_category = $datas['Category_ID'];
					$sql_cate = "select * from category where ID = $Id_category";
					$data_cate = select_one($sql_cate);
					?>
					<td class="center"><?php echo $data_cate['Category_name'] ?></td>

					<td class="center red" > <p style="color: red; font-size: 20px; " class="red"><?php echo number_format($giacuoicung) ?>đ </p><br>
						<?php if ($data_ct_giamgia){ ?>
						<del><?php echo number_format($giagocsp)  ?>VNĐ</del>
						<?php } ?>


					</td>
					<td class="center">
						<?php 
						$sql_hienthikieusp = "SELECT * FROM discountproduct where discountproduct.Product_ID = $id";
						$data_hienthikieusp = select_list($sql_hienthikieusp);

						if($data_hienthikieusp){

							foreach($data_hienthikieusp as $data2){
								$id_km =$data2['Discount_ID'];

								$sql_tenkm = "SELECT * FROM discount where ID = $id_km";
								$data_tenkm = select_list($sql_tenkm);
								
								foreach($data_tenkm as $data3){
									?>
									<span class="label label-success"><?php echo $data3['Discount']  ?></span>
									<?php
								}
							}
						}
						else{
							?>
							Không có chương trình
							<?php } ?>

						</td>
						<td class="center">
							<button type="button" class="btn btn-success"><a href="?page=product&type=edit&id=<?php echo $datas['ID']?> ">Sửa</a></button>
							<button type="button" class="btn btn-danger"><a href="?page=product&type=delete&id=<?php echo $datas['ID']?> ">Xóa</a></button>
						</td>
					</tr>

					<?php } }?>

				</tbody>
			</table>
		</div>
