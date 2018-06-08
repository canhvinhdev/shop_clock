<?php

if($_REQUEST)
{
	$cname = isset($_POST["cname"]) ? $_POST["cname"] : 0;
	$parent = isset($_REQUEST["parent_id"]) ? $_REQUEST["parent_id"] :0;
	$validate=array();
	$cname  = trim($cname);
	if($cname){
		$sql_check="select * from category";
		$data_check =select_list($sql_check);

		foreach ($data_check as $data) {

			if($data['Category_name'] == $cname )
			{
				$validate['Category_name']="Tên danh mục đã tồn tại, mời thử lại!";  

			}
			
		}
	}
	if (count($validate)==0) {

		$sql = "insert into category(Category_Name, Parent_id) values ('$cname', '$parent ')";
		$result = 0;
		if ($cname){
	//echo "thanh cong";
			$result = exec_update($sql);

			?>
			<script language="javascript">
				alert("Bạn đã thêm thành công danh mục");
				window.location ="index.php?page=category&type=list";
			</script>
			<?php
		} 
		else{
		}
	}
// var_dump($validate['Category_name']);
}

?>