<?php

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';


$sqlthumb = "select * from slider where ID = $id";
$relthumb = select_one($sqlthumb);
$img = '';

if (isset($_POST['updatslider'])) {


	if($_FILES['img']['name']!= ""){
		if(isset($_FILES['img'])){
			$item = $_FILES['img'];
			$filename = pathinfo($item['name'], PATHINFO_FILENAME);
			$ext = pathinfo($item['name'], PATHINFO_EXTENSION);
			$extra = time();
			$tofile = "uploads/{$filename}-{$extra}.{$ext}";
			if(move_uploaded_file($item['tmp_name'], $tofile)){
				$img = $tofile;
			}
		}
	}
	else
	{
		$img = $relthumb['Image'];
	}


	$created_date = date('Y/m/d H:i:s');


	$title = isset($_POST["title"]) ? $_POST["title"] : 0;
	$image = $img;

	$url = isset($_POST["url"]) ? $_POST["url"] : 0;
	$content = isset($_POST["content"]) ? $_POST["content"] : 0;






	$validate=array();
	$title  = trim($title);


	if($cname){
		$sql_check="select * from slider";
		$data_check =select_list($sql_check);

		foreach ($data_check as $data) {

			if($data['Title'] == $title )
			{
				$validate['Title']="Tên slider đã có. Mời nhập lại";  

			}
			
		}




	}
	if (count($validate)==0) {




	$sql = "update slider set Title = '$title', Image = '$image', Url = '$url',Content = '$content' where ID = '$id' ";

	$result = 0;
	if ($title){
		
		$result = exec_update($sql);
			?>

			<script language="javascript">
				alert("Bạn đã cập nhật thành công!");
				window.location ="index.php?page=slider&type=list";
			</script>
			<?php

	}

		else{


		}
	
}
}
?>


