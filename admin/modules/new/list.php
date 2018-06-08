
<?php 
$sql_new= "select * from news order by ID DESC";

$data_news = select_list($sql_new);




?>
<div class="panel-heading">
	<div class="panel-title col-md-5">Danh sách tin tức</div>
	<button type="button" class="btn btn-info right"><a href="?page=new&type=add">Thêm tin tức</a></button>
</div>
<div class="panel-body">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr class="active">
				<th>STT</th>
				<th>Tiêu đề</th>
				<th>Mô tả ngắn</th>
				<th>Ngày đăng</th>

				<th>Ảnh đại diện</th>
										
				<th>Cấu hình</th>
			</tr>
		</thead>
		<tbody>

			<?php 
			$i= 1;
			if($data_news){
				foreach ($data_news as $datas){
					?>
					<tr class="odd gradeX">
					<td><?php echo $i++ ?></td>
								<td><?php echo $datas['Title'] ?></td>
					<td><?php echo $datas['Summarize'] ?></td>


						<td><?php echo $datas['Created_Date'] ?></td>
					<td><img src="<?php echo $datas['Image'] ?>" width="70"></td>

					
					
						<td class="center">
							<button type="button" class="btn btn-success"><a href="?page=new&type=edit&id=<?php echo $datas['ID']?> ">Sửa</a></button>
					<button type="button" class="btn btn-danger"><a href="?page=new&type=delete&id=<?php echo $datas['ID']?> ">Xóa</a></button>
						</td>
					</tr>
					<?php } } ?>
				</tbody>
			</table>
		</div>