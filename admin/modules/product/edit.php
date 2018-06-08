<?php include("edit_exe.php"); ?>
<?php

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$sql_edit = "select * from product where ID = $id";
	$data_edit = select_one($sql_edit);
	$sql = "select * from category where Parent_ID = 0";
$data_cate_product = select_list($sql);

?>
<script type="text/javascript" language="javascript" src="js/ckeditor/ckeditor.js" ></script>
<div class="panel-heading">
	<div class="panel-title">Sửa sản phẩm</div>

	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
	</div>
</div>
<div class="panel-body">
	<form class="form-horizontal"  method="POST" enctype="multipart/form-data"> 
		<input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
		<fieldset>	
	<div class="form-group">
				<label>Tiêu đề sản phẩm</label>
				<input class="form-control" placeholder="" value="<?php if($_POST){ echo $cname ;} else echo $data_edit['Product_Name'];?>" name="cname" type="text">
					<?php
		        if($_POST){echo '<span style="color:red">'.$validate['Product_Name']."<br/> </span>";}   
		    ?>
			</div>
			<div class="form-group">
				<label>Thuộc danh mục</label>
				<select id="input" class="form-control" name="category" required="required">			
						<?php 
						foreach ($data_cate_product as $datas)
						{ 
							?>
						<option <?php  if( $datas['ID'] == $data_edit['Category_ID'])  { ?>   selected="selected" <?php } ?> value="<?php echo $datas['ID'] ?>" ><?php echo $datas['Category_name'] ?></option>
						<?php 
						$Id_Parent_id = $datas['ID'];
						$sql_parent_category= "select * from category where Parent_id= $Id_Parent_id ";

						$data_parent_category = select_list($sql_parent_category);  ?> 
						<?php foreach($data_parent_category as $data2) { ?>
						<option  <?php  if( $data2['ID'] == $data_edit['Category_ID'])  { ?>   selected="selected" <?php } ?>  value="<?php echo $data2['ID'] ?>">--<?php echo $data2['Category_name'] ?></option>
						<?php } } ?>
					

					</select>

				</div>


				<div class="form-group">
					<label>Hình ảnh đại diện</label>
					<input class="form-control" placeholder="" name="thumbnail" value="<?php echo $data_edit['Product_Images'] ?>" type="file">

					<img src="<?php echo $data_edit['Product_Images']?>" width="100px" style=" margin-bottom: 10px; border: 1px solid #86a31d">


				
                    <input type="hidden" name="thumbnail" required="required" value="<?php echo $data_edit['Product_Images'] ?>"/>
			</div>



				</div>


				<div class="form-group">
					<label>Mức giá</label>
					<input class="form-control" placeholder="Nhập mức giá" name="price" value="<?php echo $data_edit['Product_Price'] ?>" type="number">
				</div>

	



				<div class="form-group">
					<label>Số lượng</label>
					<input class="form-control" placeholder="Số lượng" name="quantity" value="<?php echo $data_edit['Quantity'] ?>" type="number">
				</div>
				<div class="form-group">
					<label>Mô tả về sản phẩm</label>
					<textarea class="form-control ckeditor" placeholder="Mô tả cụ thể" name="description"><?php echo $data_edit['Description'] ?> </textarea>
				</div>


			</fieldset>
			<div>
				<div>

					<i class="fa fa-save"></i>
					<button class="btn-info" name="updateproduct" type="submit">
						Sửa sản phẩm
					</button>

				</div>
			</div>
		</form>
	</div>
