
<?php include("edit_exe.php"); ?>
<?php

$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql = "select * from discount ";
$sql_new = select_list($sql);
$sql2 = "select * from discount where ID = $id";
$sql_new2 = select_one($sql2);
?>


<script type="text/javascript" language="javascript" src="js/ckeditor/ckeditor.js" ></script>



<div class="panel-body">
	<form class="form-horizontal addpro" method="POST"> 


		<input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
		<fieldset>
			<div class="form-group">
				<label>Tên khuyến mãi</label>
				<input class="form-control" placeholder="" required="" value="<?php if($_POST){ echo $title ;} else echo $sql_new2['Discount'];?>" name="title" type="text">
			<!-- 	<?php
				if($_POST){ echo '<span style="color:red">'.$validate['title']."<br/> </span>";}   
					?> -->
				</div>
				<div class="form-group">
					<label>Mô tả về khuyến mãi</label>
					<textarea class="form-control ckeditor" placeholder="" name="des" rows="3"><?php echo  $sql_new2['Attach_Discount'] ?></textarea>
				</div>
				<tr>

					<div class="form-group">
						<label>Ngày bắt đầu :</label>



						<input type="date" name="start" class="form-control "  required="required" min="1970-01-01" max="2018-12-31" value="<?php if($_POST){
							echo $start;
						}else echo $sql_new2['Start_Time']?>"/>
						<?php
						if($_POST){
							if($start<$time_now) echo '<span style="color:red">'.$validate['start']."<br/> </span>";
							}?>
						</div>


						<div class="form-group">
							<label>Ngày kết thúc :</label>

							<input type="date" name="end" class="form-control "  required="required" min="1970-01-01" max="2018-12-31" value="<?php if($_POST){
								echo $end;
							}else echo $sql_new2['End_Time']?>"/>
							<?php
							if($_POST){
								if($end<=$start) echo '<span style="color:red">'.$validate['end']."<br/> </span>";
								}?>
							</div>


						</fieldset>
						<div>
							<div>
								<i class="fa fa-save"></i>
								<button class="btn-info" type="submit">
									Cập nhật khuyến mãi
								</button>
							</div>
						</div>
					</form>
				</div>

