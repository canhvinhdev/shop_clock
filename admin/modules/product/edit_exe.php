<?php
if (isset($_POST['updateproduct'])) {

	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
	$sqlthumb = "select * from product where ID = $id";
	$relthumb = select_one($sqlthumb);

	$created_date = date('Y/m/d H:i:s');
	$cname = isset($_POST["cname"]) ? $_POST["cname"] : 0;
	$category = isset($_REQUEST["category"]) ? $_REQUEST["category"] :0;
	
	$price = isset($_POST["price"]) ? $_POST["price"] : 0;
	$quantity = isset($_POST["quantity"]) ? $_POST["quantity"] : 0;
	$description = isset($_POST["description"])  ? $_POST["description"] :0;

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

		$image = $thumbnail;


		$validate=array();
		$cname  = trim($cname);


		if($cname){
			$sql_check="select * from product";
			$data_check =select_list($sql_check);

			foreach ($data_check as $data) {
				if($data['Product_Name']==$cname && $data['ID']!=$id)

				{
					$validate['Product_Name']="Sản phầm trùng tên . Mời nhập lại";  

				}

			}
		}
		if (count($validate)==0) {
			$sql = "update product set Product_Name = '$cname', Category_ID = '$category', Product_Images = '$image', Product_Price = '$price', Description= '$description ' where ID = '$id' ";
			$result = 0;
			if ($cname){
				$result = exec_update($sql);
				?>
				<script language="javascript">
					alert("Bạn đã cập nhật thành công!");
					window.location ="index.php?page=product&type=list";
				</script>
				<?php
			}
		}
	}
}
?>

