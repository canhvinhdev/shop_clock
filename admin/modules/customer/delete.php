	<?php

	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	$sqldelC = "update users set Status = 0 where ID = $id";
	$reldelC = exec_update($sqldelC);

		echo('Xóa file thành công');

		echo "<br><--<a href='index.php?page=customer&type=list' > Quay lại danh mục khách hàng </a>";
		
?>
