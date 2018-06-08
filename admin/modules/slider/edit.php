

<?php include("edit_exe.php"); ?>
<?php

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$sql_slider= "select * from slider where ID = $id";
	$data_edit = select_one($sql_slider);

?>
<script type="text/javascript" language="javascript" src="js/ckeditor/ckeditor.js" ></script>


<div class="panel-heading">
	<div class="panel-title">Cập nhật slider</div>

	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
	</div>
</div>
<div class="panel-body">
	<form class="form-horizontal addpro"  method="POST" enctype="multipart/form-data"> 
		<input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
		<fieldset>
			<div class="form-group">
				<label>Tiêu đề </label>
				<input class="form-control" placeholder="Nhập tên sản phẩm" value="<?php echo $data_edit['Title'] ?>" name="title" type="text">
			</div>
			
				<div class="form-group">
					<label>Hình ảnh đại diện</label>
					<input class="form-control" placeholder="" name="img"  type="file">
 <input type="hidden" name="img"  value="<?php echo $data_edit['Image'] ?>"/>
					<img src="<?php echo $data_edit['Image']?>" width="100px" style=" margin-bottom: 10px; border: 1px solid #86a31d">

				</div>


					<div class="form-group">
				<label>Đường dẫn</label>
				<input class="form-control" placeholder="Nhập tên sản phẩm" value="<?php echo $data_edit['Url'] ?>" name="url" type="text">
			</div>
				<div class="form-group">
				<label>Nội dung mô tả </label>
				<input class="form-control" placeholder="" value="<?php echo $data_edit['Content'] ?>" name="content" type="text">
			</div>
			

			</fieldset>
			<div>
				<div>

					<i class="fa fa-save"></i>
					<button class="btn-info" name="updatslider" type="submit">
						Cập nhật slider
					</button>

				</div>
			</div>
		</form>
	</div>
