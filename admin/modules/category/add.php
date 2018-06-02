
<?php include("add_exe.php"); 
?>



<div class="panel-heading">
	<div class="panel-title">Thêm danh mục sản phẩm</div>

	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
	</div>
</div>
<div class="panel-body">
	<form class="form-horizontal addpro"  method="POST"> 
		<fieldset>
			<div class="form-group">
				<label>Tiêu đề danh mục sản phẩm</label>
				<input class="form-control" placeholder="" required="" value="<?php  if($_POST)  echo $cname ?>" name="cname" type="text">

				<?php
				if($_POST){echo '<span style="color:red">'.$validate['Category_name']."<br/> </span>";}   
					?>
				</div>



				<div class="form-group">
					<label>Cấp danh mục</label>





					
					<?php 
					$sql="select * from category";
					$rs= select_list($sql);
					?>
					
					
					<select name="parent_id" class="form-control">
						<option value="0">
							

							Danh mục cha
						</option>
						<?php foreach ($rs as $da){
							if($da['Parent_id'] == 0){
								?>
								

								<option class="cate_base" value="<?php echo $da['ID'] ?>"  >
									<?php echo $da['Category_name'] ?>                                
								</option>


								<?php $sqlCat = "select * from category where Parent_id=".$da['ID'];
								
								$ca = select_list($sqlCat);  ?> 
								<?php foreach($ca as $cas) { ?>
								<option value="<?php echo $cas['ID'] ?>">|----<?php echo $cas['Category_name'] ?></option>
								<?php } ?>
								<?php } }?>


							</select>
							
						</tr>
					</div>
				</fieldset>
				<div>
					<div>
						
						<i class="fa fa-save"></i>
						<button class="btn-info" type="submit">
							Thêm danh mục
						</button>
						
					</div>
				</div>
			</form>
		</div>
