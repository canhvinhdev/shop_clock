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

			if($data['Discount'] == $title )
			{
				$validate['Discount']="Tên danh mục đã tồn tại, mời thử lại!";  
			}	
		}
	}


$start = isset($_REQUEST["start"]) ? $_REQUEST["start"] : '';
			$end = isset($_REQUEST["end"]) ? $_REQUEST["end"] : '';
		
        	//echo $data['ngay_bd'];
		    $start1=strtotime($start);
		    //echo $start;exit();
		    $end1=strtotime($end); 




$now=date("Y/m/d");
    //echo $now;exit();
    $time_now=strtotime($now);

	 if($start1<$time_now){
                	$validate['start']="Ngày bắt đầu lớn hơn hoặc bằng ngày hiện tại!"; 
    }
    if($end1<=$start){
                	$validate['end']="Ngày kết thúc phải lớn hơn ngày bắt đầu và ngày hiện tại!"; 
    }
	if (count($validate)==0) {
		$sql = "insert into discount(Discount, Attach_Discount,Start_Time, End_Time) values ('$title', '$des ','$start', '$end')";
		$result = 0;
		if ($title){
		//echo "thanh cong";
			$result = exec_update($sql);


			?>
			<script language="javascript">
				alert("Bạn đã thêm thành công !");
				window.location ="index.php?page=discount&type=list";
			</script>
			<?php
		}
	} 
	else{
	}
}

?>