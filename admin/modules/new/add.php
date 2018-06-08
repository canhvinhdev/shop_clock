


<?php include("add_exe.php"); 
?>


<script type="text/javascript" language="javascript" src="js/ckeditor/ckeditor.js" ></script>



<div class="panel-heading">
	<div class="panel-title">Thêm tin tức</div>

	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
	</div>
</div>
<div class="panel-body">
	<form class="form-horizontal " method="POST" enctype="multipart/form-data"> 
		<fieldset>
			<div class="form-group">
				<label>Tiêu đề tin tức</label>
				<input class="form-control" placeholder="" name="title" value="<?php  if($_POST) echo $title ?>"  type="text">


					<?php
		        if($_POST){echo '<span style="color:red">'.$validate['Title']."<br/> </span>";}   
		    ?>
			</div>



			<div class="form-group">
				<label>Mô tả ngắn</label>
				<textarea class="form-control ckeditor" placeholder="" name="short" rows="3"></textarea>
			</div>


			<div class="form-group">
				<label>File ảnh</label>
				<input class="form-control" placeholder="" name="img" type="file">

			</div>



<div class="form-group">
				<label>Mô tả chi tiết</label>
				<textarea class="form-control ckeditor" placeholder="" name="des" rows="3"></textarea>
			</div>

		</fieldset>
		<div>
			<div>
		
				<i class="fa fa-save"></i>
				<button class="btn-info" type="submit" name="addnews">
				Thêm tin tức
				</button>
			
		</div>
		</div>
	</form>
</div>
