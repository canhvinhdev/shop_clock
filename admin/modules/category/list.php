
<?php 
$sql_cate = "select * from category";

$data_cate = select_list($sql_cate);

?>

<div class="panel-heading">


	<div class="panel-title col-md-5">Danh mục sản phẩm</div>
	<button type="button" class="btn btn-info right"><a href="?page=category&type=add">Thêm danh mục</a></button>
</div>
<div class="panel-body">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên danh mục</th>
				<th>Cấp danh mục</th>

				<th>Cấu hình</th>
			</tr>
		</thead>
		<tbody>


			<?php 

			$i= 1;
			if($data_cate){
				foreach ($data_cate as $datas){ if($datas['Parent_id'] == 0){?>

				<tr class="odd gradeX">
					<td><?php echo $i++ ?></td>
					<td> 
						<?php
						echo $datas['Category_name'];
						?>
					</td>
					<td>
						<?php 
						$sql="select * from category where ID=".$datas['Parent_id'];
						$rss=select_one($sql);
						?>

						<?php
						if($datas['Parent_id']==0){
							echo 'Danh mục cha';
						}
						else
							echo 'Danh mục con của '.$rss['Category_name'];
						?>
					</td>

					<td class="center">
						<button type="button" class="btn btn-success"><a href="?page=category&type=edit&id=<?php echo $datas['ID']?> ">Sửa</a></button>
						<button type="button" class="btn btn-danger"><a href="?page=category&type=delete&id=<?php echo $datas['ID']?> ">Xóa</a></button>
					</td>
				</tr>
				<?php 
				foreach ($data_cate as $key) {
					if($key['Parent_id'] == $datas['ID']){
						?>
						<tr class="odd gradeX">
							<td><?php echo $i++ ?></td>
							<td> 
								<?php
								echo "|----" .$key['Category_name']."";
								?>
							</td>
							<td>						
								<?php
								if($key['Parent_id']==0){
									echo 'Danh mục cha';
								}
								else
									echo 'Danh mục con của '.$datas['Category_name'];
								?>
							</td>
							<td class="center">
								<button type="button" class="btn btn-success"><a href="?page=category&type=edit&id=<?php echo $key['ID']?> ">Sửa</a></button>
								<button type="button" class="btn btn-danger"><a href="?page=category&type=delete&id=<?php echo $key['ID']?> ">Xóa</a></button>
							</td>
						</tr>
						<?php
					}
				} 	
				?>
				<?php } } } ?>

			</tbody>
		</table>
	</div>
