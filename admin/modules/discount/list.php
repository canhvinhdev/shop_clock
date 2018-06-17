
<?php 
$sql_discount= "select * from discount";
$data_discount = select_list($sql_discount);
?>
<div class="panel-heading">
	<div class="panel-title col-md-5">Danh sách khuyến mại</div>
	<button type="button" class="btn btn-info right"><a href="?page=discount&type=add">Thêm chương khuyến mãi</a></button>
</div>






<div class="panel-body">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr class="active">
				<th>STT</th>
				<th>Chương trình khuyến mãi</th>
				<th>Ngày bắt đầu</th>
				<th>Ngày kết thúc</th>
				<th>Cấu hình</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$i= 1;
			if($data_discount){
				foreach ($data_discount as $datas){
					?>
					<tr class="odd gradeX">
						<td><?php echo $i++ ?></td>
						<td><?php echo $datas['Discount'] ?></td>
						<td><?php echo  date('d/m/Y',strtotime($datas['Start_Time'])) ?></td>
						<td><?php echo  date('d/m/Y',strtotime($datas['End_Time'])) ?></td>		
						<td class="center">

							<button type="button" class="btn btn-success"><a href="?page=discount&type=discount_product&id=<?php echo $datas['ID']?> ">Cấu hình</a></button>
							<button type="button" class="btn btn-success"><a href="?page=discount&type=edit&id=<?php echo $datas['ID']?> ">Sửa</a></button>
							<button type="button" class="btn btn-danger"><a <a onclick="javascript: return confirm('Bạn muốn xóa khuyến mãi không');" href="?page=discount&type=delete&id=<?php echo $datas['ID']?> ">Xóa</a></button>
						</td>
					</tr>
					<?php } } ?>
				</tbody>
			</table>
		</div>