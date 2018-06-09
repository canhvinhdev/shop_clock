

<?php

	$id = isset($_GET['id']) ? $_GET['id'] : '';


 $sqlcontact = "select * from contact where ID = $id";
 $contact = select_one($sqlcontact);
?>

<div class="panel-heading">
	<div class="panel-title">Phản hồi Email</div>

	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
	</div>
</div>
<div class="panel-body">
	<form class="form-horizontal addpro" action="modules/contact/edit_exe.php" method="POST"> 


		<input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
		<fieldset>
			<div class="form-group">
				<label>Tên người liên hệ</label>
				<input class="form-control" readonly placeholder="" value="<?php echo $contact['Name'] ?>" name="name" type="text">
			</div>

	<div class="form-group">
				<label>Email</label>
				<input class="form-control" readonly placeholder="" value="<?php echo $contact['Email'] ?>" name="email" type="email">
			</div>
	<div class="form-group">
				<label>Số điện thoại</label>
				<input class="form-control" readonly placeholder="" value="<?php echo $contact['Phone'] ?>" name="phone" type="number">
			</div>
	<div class="form-group">
				<label>Nội dung liên hệ</label>
				<input class="form-control" readonly placeholder="" value="<?php echo $contact['Content'] ?>" name="content" type="text">
			</div>

				<div class="form-group">
				
				<a href="mailto:<?php echo $contact['Email'] ?>">>Gửi email KH</a>
			</div>
	<div class="form-group">
				<label>Trạng thái</label>
				<select name="status">
					<option value="0" <?php if ($contact['Status'] == 0) {  ?> selected <?php } ?> >Chưa phản hồi</option>
					<option value="1" <?php if ($contact['Status'] == 1) {  ?> selected <?php } ?> >Đã phản hồi</option>
				</select>
			</div>
		</fieldset>
		<div>
		
				<i class="fa fa-save"></i>
				<button class="btn-info" type="submit">
				Cập nhật phản hồi
				</button>
			
		</div>
	</form>
</div>
