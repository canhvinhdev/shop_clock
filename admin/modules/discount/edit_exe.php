<?php
if($_REQUEST)
{

	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	$title = isset($_POST["title"]) ? $_POST["title"] : 0;

	$des = isset($_POST["des"]) ? $_POST["des"] : 0;

	$start = isset($_POST["start"]) ? $_POST["start"] : 0;
	$end = isset($_POST["end"]) ? $_POST["end"] : 0;
	$validate=array();
	$title  = trim($title);
	if($title){
		$sql_check="select * from discount";
		$data_check =select_list($sql_check);
		foreach ($data_check as $data) {
			if($data['Discount']==$title && $data['ID']!=$id)

			{
				$validate['title']="Tên khuyến mãi đã tồn tại, mời thử lại!";  
			}
		}
	}

	$start = isset($_REQUEST["start"]) ? $_REQUEST["start"] : '';
	$end = isset($_REQUEST["end"]) ? $_REQUEST["end"] : '';
	$now=date("Y/m/d");
	$time_now=strtotime($now);
        	//echo $data['ngay_bd'];
	$start_fix =strtotime($start);
		    echo $start_fix;exit();
	$end_fix =strtotime($end); 
	if($start_fix<$time_now){
		$validate['start']="Ngày bắt đầu lớn hơn hoặc bằng ngày hiện tại!"; 
	}
	if($end_fix<=$start){
		$validate['end']="Ngày kết thúc phải lớn hơn ngày bắt đầu và ngày hiện tại!"; 
	}
	if (count($validate)==0) {
		if($title){
			$sql = "update discount set Discount = '$title', Attach_Discount = '$des',  Start_Time = '$start' , End_Time = '$end' where ID ='$id'";
			$result = 0;
			if ($title){
		//echo "thanh cong";
				$result = exec_update($sql);

				?>
				<script language="javascript">
					alert("Bạn đã sửa thành công!");
					window.location ="index.php?page=discount&type=list";
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
