
<?php
$type=$_GET['type'];
if($type=="add"){
	include("add.php");
}		
if($type=="edit"){
	include("edit.php");
}		
if($type=="delete"){
	include("delete.php");
}
?>

<?php 
$sql_slider = "select * from slider";

$data_slider = select_list($sql_slider);

?>

<div class="panel-heading">


	<div class="panel-title col-md-5">Danh mục slider</div>
	
</div>
<div class="panel-body">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tiêu đề slider</th>
				<th>File ảnh</th>
			<th>Url</th>

				<th>Cấu hình</th>
			</tr>
		</thead>
		<tbody>


			<?php 

$i= 1;
 if($data_slider){
            foreach ($data_slider as $datas){?>
  
			<tr class="odd gradeX">
				<td><?php echo $i++ ?></td>
				<td><?php echo $datas['Title'] ?></td>
				<td><img src="<?php echo $datas['Image'] ?>" width="200"></td>
				<td><?php echo $datas['Url']?></td>
				<td class="center">
					<button type="button" class="btn btn-success"><a <a onclick="javascript: return confirm('Bạn muốn xóa slide không');" href="?page=slider&type=edit&id=<?php echo $datas['ID']?> ">Cập nhật</a></button>
					
				</td>
			</tr>
<?php } }?>

		</tbody>
	</table>
</div>
