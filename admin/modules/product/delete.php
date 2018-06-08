<?php

	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';


	$sqldelC = "update product set Status = 0 where ID = $id";
	$reldelC = exec_update($sqldelC);

		echo('Xóa file thành công');
		
?>
