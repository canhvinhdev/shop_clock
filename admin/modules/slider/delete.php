<?php

	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	$sqldelC = "delete from category where ID = $id";
	$reldelC = exec_update($sqldelC);

		echo('Xóa file thành công');
		
?>
