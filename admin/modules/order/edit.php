

<?php

	$id = isset($_GET['id']) ? $_GET['id'] : '';

 $sql_order = "select * from `order` where ID = $id";
 $data_order = select_one($sql_order);
?>

<div class="panel-heading">
	<div class="panel-title">Chuyển trạng thái</div>

	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
	</div>
</div>
<div class="panel-body">
	<form class="form-horizontal addpro" action="modules/order/edit_exe.php" method="POST"> 
				<input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
		<fieldset>
			<div class="form-group">
				<label>Cập nhật tình trạng</label>
				<select name="status" id="input" class="form-control" required="required">
				<option value="0" <?php if ($data_order['Order_Status'] == 0) {  ?> selected <?php } ?> >Chưa thanh toán</option>
					<option value="1" <?php if ($data_order['Order_Status'] == 1) {  ?> selected <?php } ?> >Đã thanh toán</option>

				</select>
			</div>



		</fieldset>
		<div>
		
				<i class="fa fa-save"></i>
				<button class="btn-info" type="submit">
				Cập nhật
				</button>
			
		</div>
	</form>
</div>
