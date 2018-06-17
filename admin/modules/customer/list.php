
<?php 
$sql_user= "select * from users where Permission = 0 and Status = 1 order by ID DESC";

$data_user = select_list($sql_user);




?>
<div class="panel-heading">
	<div class="panel-title col-md-5">Danh sách khách hàng</div>
	<button type="button" class="btn btn-info right"><a href="?page=customer&type=add">Thêm khách hàng mới</a></button>
</div>
<div class="panel-body">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr class="active">
				<th>STT</th>
				<th>Tên</th>
				<th>Email</th>
				<th>Số điện thoại</th>

			
						<th>	Ngày đăng ký</th>				
				<th>Cấu hình</th>
			</tr>
		</thead>
		<tbody>

			<?php 
			$i= 1;
			if($data_user){
				foreach ($data_user as $datas){
					?>
					<tr class="odd gradeX">
					<td><?php echo $i++ ?></td>
								<td><?php echo $datas['User_Name'] ?></td>
					<td><?php echo $datas['Email'] ?></td>


						<td>0<?php echo $datas['Moblie_Number'] ?></td>
					

					
						<td><?php echo  date('d/m/Y',strtotime($datas['Registed_Date'])) ?></td>
						<td class="center">

							<button type="button" class="btn btn-success"><a href="?page=customer&type=order&id=<?php echo $datas['ID']?> ">Đơn hàng</a></button>
							<button type="button" class="btn btn-success"><a href="?page=customer&type=edit&id=<?php echo $datas['ID']?> ">Sửa</a></button>
					<button type="button" class="btn btn-danger"><a <a onclick="javascript: return confirm('Bạn muốn xóa khách hàng không');" href="?page=customer&type=delete&id=<?php echo $datas['ID']?> ">Xóa</a></button>
						</td>
					</tr>
					<?php } } ?>
				</tbody>
			</table>
		</div>