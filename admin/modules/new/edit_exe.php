<?php


$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';


$sqlthumb = "select * from news where ID = $id";

$relthumb = select_one($sqlthumb);

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$title = isset($_POST["title"]) ? $_POST["title"] : 0;

$short = isset($_POST["short"]) ? $_POST["short"] : 0;



$des = isset($_POST["des"]) ? $_POST["des"] : 0;


if (isset($_POST['updatenews'])) {

	if($_REQUEST){
		$thumbnail = '';
		if ($_FILES['thumbnail']['name']!=""){
			$fitem = $_FILES['thumbnail'];	
			$filename = pathinfo($fitem['name'],PATHINFO_FILENAME);
			$ext = pathinfo($fitem['name'],PATHINFO_EXTENSION);
			$extra = time();
			$toFile = "uploads/{$filename}-{$extra}.{$ext}";	

			$name = "uploads/{$filename}-{$extra}.{$ext}";	
			if (move_uploaded_file($fitem['tmp_name'],$toFile)){
					//echo $toFile; exit();
					//$thumbnail = $toFile;	
				$thumbnail = $name;
			}
		}
		else{
			$thumbnail= isset($_REQUEST["thumbnail"]) ? $_REQUEST["thumbnail"]  : "";
		}

		$img = $thumbnail;


		$validate=array();
		$title  = trim($title);


		if($title){
			$sql_check="select * from news";
			$data_check =select_list($sql_check);

			foreach ($data_check as $data) {
				if($data['Title']==$title && $data['ID']!=$id)

				{
					$validate['Title']="Bài viết đã có. Mời nhập lại";  

				}

			}
		}
		if (count($validate)==0) {
			$sql = "update news set Title = '$title', Summarize = '$short', Image = '$img' ,  News_Content = '$des' where ID ='$id'";
			$result = 0;
			if ($title){
				$result = exec_update($sql);
				?>
				<script language="javascript">
					alert("Bạn đã cập nhật thành công!");
					window.location ="index.php?page=new&type=list";
				</script>
				<?php
			}
		}
	}
}
?>

