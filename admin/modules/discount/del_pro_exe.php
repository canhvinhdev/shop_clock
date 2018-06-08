<?php   

include("../lib_db.php");
	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

if(isset($_POST['id']))
{
  	$sqldelC = "delete from discountproduct where ID = $id";

  		$reldelC = exec_update($sqldelC);

		echo('Xóa file thành công');
}else{
    echo 'Không có dữ liệu được gửi sang';
}
 ?>