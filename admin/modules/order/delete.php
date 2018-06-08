<?php

	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	$sqldelC = "update `order` set Status = 0 where ID = $id";
	$reldelC = exec_update($sqldelC);

		echo('Xóa file thành công');
		echo "<br>";
		echo "<a href='index.php?page=order&type=list' > Quay lại danh mục khách hàng </a>";
		
?>
