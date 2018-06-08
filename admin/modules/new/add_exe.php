<?php



if($_REQUEST)
{
	$title = isset($_POST["title"]) ? $_POST["title"] : 0;

	$short = isset($_POST["short"]) ? $_POST["short"] : 0;

	$img = isset($_POST["img"]) ? $_POST["img"] : 0;


	$des = isset($_POST["des"]) ? $_POST["des"] : 0;



	$parent = isset($_REQUEST["parent"]) ? $_REQUEST["parent"] :0;

	$created_date = date('Y/m/d H:i:s');

	$img = '';
	if (isset($_FILES['img'])){
		$fitem = $_FILES['img'];	
		$filename = pathinfo($fitem['name'],PATHINFO_FILENAME);
		$ext = pathinfo($fitem['name'],PATHINFO_EXTENSION);
		$extra = time();
		$toFile = "uploads/{$filename}-{$extra}.{$ext}";	

		$name = "uploads/{$filename}-{$extra}.{$ext}";	
		if (move_uploaded_file($fitem['tmp_name'],$toFile)){

		//$thumbnail = $toFile;	
		//echo $toFile; exit();
			$img = $name;
		}

	}


	$img = $img ;





	$validate=array();
	$title  = trim($title);


	if($title){
		$sql_check="select * from news";
		$data_check =select_list($sql_check);

		foreach ($data_check as $data) {

			if($data['Title'] == $title )
			{
				$validate['Title']="Tên danh mục đã tồn tại, mời thử lại!";  

			}

		}




	}
	if (count($validate)==0) {


		$sql = "insert into news(Title, Summarize, 	Image, 	News_Content , Created_Date) values ('$title','$short','$img','des','$created_date')";
		$result = 0;
		if ($title){
	//echo "thanh cong";
			$result = exec_update($sql);

			?>

			<script language="javascript">
				alert("Bạn đã thêm thành công danh mục");
				window.location ="index.php?page=new&type=list";
			</script>
			<?php
		}else{

		}
	}
}
?>