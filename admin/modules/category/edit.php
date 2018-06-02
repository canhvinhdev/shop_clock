<?php include("edit_exe.php"); ?>

<?php

	$id = isset($_GET['id']) ? $_GET['id'] : '';
 $sqlC = "select * from category ";
 $relC = select_list($sqlC);
 $sqlother = "select * from category where ID = $id";
 $relother = select_one($sqlother);

 $sql="select * from category where Parent_id=0";
						$rs= select_list($sql);
?>

<div class="panel-heading">
	<div class="panel-title">Sửa danh mục sản phẩm</div>

	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
		<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
	</div>
</div>
<div class="panel-body">
	<form class="form-horizontal addpro" action="" method="POST"> 

		<input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
		<fieldset>
			<div class="form-group">
				<label>Tiêu đề danh mục sản phẩm</label>
				<input class="form-control" placeholder="" value="<?php if($_POST){ echo $cname ;} else echo $relother['Category_name'];?>" name="cname" type="text">
					<?php
		        if($_POST){echo '<span style="color:red">'.$validate['Category_name']."<br/> </span>";}   
		    ?>
			</div>




	<div class="form-group">
					<label>Cấp danh mục</label>

			<select name="parent_id" class="form-control">
								<option value="0"
								<?php if($relother['Parent_id'] == 0) {?>
									selected="selected" <?php }?>
								?>

									Danh mục cha
								</option>
								<?php foreach ($rs as $da){?>
			                        <option class="cate_base" value="<?php echo $da['ID'] ?>" 
			                        <?php if($da['ID'] == $relother['Parent_id']) {?>  selected="selected" <?php }?>
			                        >
			                            <?php echo $da['Category_name'] ?>                                
			                        </option>
			                        <?php $sqlCat = "select * from category where Parent_id=".$da['ID'];
			                        
			                        $ca = select_list($sqlCat);  ?> 
			                        <?php foreach($ca as $cas) { ?>
			                            <option value="<?php echo $cas['ID'] ?>">|----<?php echo $cas['Category_name'] ?></option>
			                            <?php } ?>
			                    <?php }?>

						</select>
					</div>
		</fieldset>
		<div>
		
				<i class="fa fa-save"></i>
				<button class="btn-info" type="submit">
				Sửa danh mục
				</button>
			
		</div>
	</form>
</div>
