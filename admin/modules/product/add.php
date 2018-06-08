


<?php include("add_exe.php"); 
?>


<?php
$sql = "select * from category where Parent_ID = 0";
$data_cate_product = select_list($sql);



?>
<script type="text/javascript" language="javascript" src="js/ckeditor/ckeditor.js" ></script>


<div class="panel-heading">
	<div class="panel-title">Thêm sản phẩm mới</div>

	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
	</div>
</div>
<div class="panel-body">
	<form class="form-horizontal addpro"  method="POST" enctype="multipart/form-data"> 
		<fieldset>


			<div class="form-group">
				<label>Tên sản phẩm</label>
				<input class="form-control" placeholder="" required="" value="<?php  if($_POST)  echo $cname ?>" name="cname" type="text">

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
							<option value="<?php echo $datas['ID'] ?>" ><?php echo $datas['Category_name'] ?></option>
							<?php 
							$Id_Parent_id = $datas['ID'];
							$sql_parent_category= "select * from category where Parent_id= $Id_Parent_id ";

							$data_parent_category = select_list($sql_parent_category);  ?> 
							<?php foreach($data_parent_category as $data2) { ?>
							<option value="<?php echo $data2['ID'] ?>">--<?php echo $data2['Category_name'] ?></option>
							<?php } } ?>


						</select>

					</div>



					<div class="form-group">
						<label>Hình ảnh đại diện</label>
						<input class="form-control" placeholder="" name="img" type="file" required="">
					</div>


					<div class="form-group">
						<label>Mức giá (VNĐ)</label>
						<input class="form-control" placeholder="Nhập mức giá" name="price" type="number" required="">
					</div>
					<div class="form-group">
						<label>Số lượng</label>
						<input class="form-control" placeholder="Số lượng" name="quantity" type="number" required="">
					</div>
					<div class="form-group">
						<label>Mô tả về sản phẩm</label>
						<textarea class="form-control ckeditor" placeholder="Mô tả cụ thể" name="description"></textarea>
					</div>


				</fieldset>
				<div>
					<div>

						<i class="fa fa-save"></i>
						<button class="btn-info" name="addpro" type="submit">
							Thêm sản phẩm
						</button>

					</div>
				</div>
			</form>
		</div>
