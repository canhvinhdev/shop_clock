<?php

	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';





	$sqldelC = "delete from discountproduct where Discount_ID = $id";




	$reldelC = exec_update($sqldelC);
var_dump($reldelC);
	$sqldelC = "delete from discount where ID = $id";




	$reldelC = exec_update($sqldelC);

		echo('Xóa file thành công');
		
?>
