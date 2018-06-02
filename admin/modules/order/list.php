

<?php 
    
    $sql="SELECT * FROM `order` where Status = 1  order by ID DESC";

    $data_order = select_list($sql);

?>
<<div class="panel-heading">
	<div class="panel-title col-md-5">Đơn hàng</div>
	<button type="button" class="btn btn-info right"><a href="?page=order&type=add">Tạo đơn hàng mới</a></button>
</div>
<div class="panel-body">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr>
				<th>STT</th>
				<th>Mã</th>
				<th>Ngày đặt</th>			
				<th>Khách hàng</th>
				<th>Kiểu thanh toán</th>
				<th>Tình trạng</th>
				<th>Tổng tiền</th>
				<th>Xử lý</th>
			</tr>
		</thead>
		<tbody>


			<?php 

$i= 1;
 if($data_order){
            foreach ($data_order as $datas){?>
  
			<tr class="odd gradeX">
				<td><?php echo $i++ ?></td>

				<td>
					CODE-<?php  echo  $datas['ID'];  ?>
				</td>
				<td><?php echo date("h:i:s m/d/Y", strtotime($datas['Order_Time'])); ?></td>
				<td>
					<?php 
						 $user_id =  $datas['User_ID'];
						
						 if(isset($user_id)){
						 	$sql_user = "select * from users where ID = $user_id ";

								$data_user = select_one($sql_user);
									?>


	
						<span class="label label-info"> <a href=""><?php echo $data_user['User_Name']?></a></span>



							<?php	
		
						 }
						 else{
						 ?>
	<span class="label label-info"> <a href=""><?php echo $datas['Name']?></a></span>

						<?php

}

					 ?>

				</td>
				<td>
							<?php 

if($datas['Method_Payment'] == 0){
	echo "Thanh toán trực tiếp";
}else{
	echo "Thanh toán qua chuyển khoản";
}




					 ?>
				</td>
				<td>
					
<?php 

				if($datas['Order_Status'] == 0){
						echo "<div class='alert alert-danger'>Chưa thanh toán</div>";
				}else if($datas['Order_Status'] == 1){
					echo "<div class='alert alert-success'>Đã thanh toán</div>";
				}

				?>

				</td>
				<td>
			<?php 
				echo number_format($datas['Subtotal']);

			 ?> 
VNĐ
				</td>
				<td class="center">


					<button type="button" class="btn btn-success"><a href="?page=order&type=edit&id=<?php echo $datas['ID']?> ">Sửa</a></button>
					<button type="button" class="btn btn-danger"><a href="?page=order&type=delete&id=<?php echo $datas['ID']?> ">Xóa</a></button>
				</td>
			</tr>

<?php } }?>

		</tbody>
	</table>
</div>
