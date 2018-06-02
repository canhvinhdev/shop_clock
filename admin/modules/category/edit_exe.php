<?php
if($_REQUEST)
{
	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	$cname = isset($_POST["cname"]) ? $_POST["cname"] : 0;
	$parent = isset($_REQUEST["parent_id"]) ? $_REQUEST["parent_id"] :0;
  // var_dump(  $parent);
  // die();
	$validate=array();
	$cname  = trim($cname);
	if($cname){
		$sql_check="select * from category";
		$data_check =select_list($sql_check);
		foreach ($data_check as $data) {
			if($data['Category_name']==$cname && $data['ID']!=$id)

			{
				$validate['Category_name']="Tên danh mục đã tồn tại, mời thử lại!";  
			}
		}
	}

	if (count($validate)==0) {


		if($cname){

			$sql = "update category set Category_name = '$cname', Parent_id = '$parent' where ID = '$id'";
			$result = 0;
			if ($cname){
		//echo "thanh cong";
				$result = exec_update($sql);
				?>
				<script language="javascript">
					alert("Bạn đã sửa thành công danh mục");
					window.location ="index.php?page=category&type=list";
				</script>
				<?php
			} 
			else{
			}
			
		}
	}
// var_dump($validate['Category_name']);

}
?>

