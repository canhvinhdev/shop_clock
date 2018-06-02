


<?php include("edit_exe.php"); ?>


<?php

	$id = isset($_GET['id']) ? $_GET['id'] : '';
 $sql = "select * from news ";
 $sql_new = select_list($sql);
 $sql2 = "select * from news where ID = $id";
 $sql_new2 = select_one($sql2);
?>




<div class="panel-heading">
	<div class="panel-title">Sửa tin tức</div>

	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
	</div>
</div>
<div class="panel-body">
	<form class="form-horizontal addpro" action="" method="POST"   enctype="multipart/form-data"> 

			<input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
		<fieldset>
			




	<div class="form-group">
				<label>Tiêu đề tin tức</label>
				<input class="form-control" placeholder="" value="<?php if($_POST){ echo $title ;} else echo $sql_new2['Title'];?>" name="cname" type="text">
					<?php
		        if($_POST){echo '<span style="color:red">'.$validate['Title']."<br/> </span>";}   
		    ?>
			</div>



			<div class="form-group">
				<label>Mô tả ngắn</label>
				<textarea class="form-control ckeditor" placeholder="" name="short" rows="3"><?php echo  $sql_new2['Summarize'] ?></textarea>
			</div>


			<div class="form-group">
				  <?php if ($sql_new2['Image']){?> 
                    <img src="<?php echo $sql_new2['Image']?>" width="100px"/>
                    <?php } ?>
                    <input type="file" name="thumbnail" size=50/>
                    <input type="hidden" name="thumbnail" required="required" value="<?php echo $sql_new2['Image'] ?>"/>
			</div>



<div class="form-group">
				<label>Mô tả chi tiết</label>
				<textarea class="form-control ckeditor" placeholder="" name="des" rows="3"><?php echo  $sql_new2['News_Content'] ?>
				</textarea>
			</div>

		</fieldset>
		<div>
			<div>
		
				<i class="fa fa-save"></i>
				<button class="btn-info" type="submit" name="updatenews">
				Sửa tin tức
				</button>
			
		</div>
		</div>
	</form>
</div>

