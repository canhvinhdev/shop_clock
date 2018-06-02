<?php 
include("../lib_db.php");
?>
<script type="text/javascript" language="javascript" src="modules/ckeditor/ckeditor.js" ></script>
<div class="list_content">
	<table class="table table-hover">
		<h3 align="center">Danh sách sản phẩm chọn</h3>

		<tr>
			<th>Tên sản phẩm</th>
		
			<th>Giá khuyến mại</th>
		</tr>

		<?php					
		if($_REQUEST){
			foreach ($_REQUEST['data'] as $value) {
				$sql = "Select * from product where ID =".$value;
				$dh = select_one($sql);
					//print_r($dh);exit();
				?>
				<tr >
					<td><?php echo $dh['Product_Name']; ?>

					</td>
					<td class="kmsp_tien">
						<input type="checkbox" checked="checked" class="col-md-1" name="listkm[]" value="<?php echo $dh['ID']; ?>" >
						<input type="hidden" id="id_dh" value="<?php echo $dh['ID']; ?>">
						<input   type="number" value="" class=" col-md-8"  placeholder="0%" required="" name="giam_gia" id="km_tien" >
					</td>			        

				</tr>

				<?php } }else "";
				?>

			</table>
		</div>
