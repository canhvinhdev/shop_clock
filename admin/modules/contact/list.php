

<?php 
$sql_contact = "select * from contact";

$data_contact = select_list($sql_contact);

?>

<div class="panel-heading">


	<div class="panel-title col-md-5">Danh mục Liên hệ</div>
	<!-- <button type="button" class="btn btn-info right"><a href="?page=category&type=add">Thêm Liên</a></button> -->
</div>
<div class="panel-body">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên liên hệ</th>
				
				<th>SĐT liên hệ</th>
					<th>Nội dung </th>
				<th>Tình trạng</th>
			<th>Ngày gửi</th>
				<th>Cấu hình</th>
			</tr>
		</thead>
		<tbody>


			<?php 

$i= 1;
 if($data_contact){
            foreach ($data_contact as $datas){?>
  
			<tr class="odd gradeX">
				<td><?php echo $i++ ?></td>
				<td><?php echo $datas['Name'] ?></td>

			
			<td><?php echo $datas['Phone'] ?></td>

	<td><?php echo $datas['Content'] ?></td>
				<td><?php 

				if($datas['Status'] == 0){
						echo "<div class='alert alert-danger'>Chưa phản hồi</div>";
				}else{
					echo "<div class='alert alert-success'>Đã phản hồi</div>";
				}

				?></td>
				

				<td>
					
<?php echo date("h:i:s m/d/Y", strtotime($datas['Created_Date'])); ?>
				</td>
				<td class="center">
					<button type="button" class="btn btn-success"><a href="?page=contact&type=edit&id=<?php echo $datas['ID']?> ">Phản hồi</a></button>
				<!-- 	<button type="button" class="btn btn-danger"><a href="?page=contact&type=delete&id=<?php echo $datas['ID']?> ">Xóa</a></button> -->
				</td>
			</tr>
<?php } }?>

		</tbody>
	</table>
</div>
