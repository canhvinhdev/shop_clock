<?php

	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';


	$sql_parent_ID = "select * from category where ID = $id";
	$data_parent_ID = select_one($sql_parent_ID);

	$sql_parent_product = "select * from product where Category_ID = $id";
	$data_parent_product = select_list($sql_parent_product);

if($data_parent_product ){



echo "Danh mục có chứa trong sản phẩm ! Thực hiện cập nhật lại trong sản phẩm trước";


}
else{



	echo "<scrip> alert('Bạn muốn xóa danh mục ko')</scrip>";
	$sqldelC = "delete from category where ID = $id";
	$reldelC = exec_update($sqldelC);

		echo('Xóa file thành công');
	}	
?>
