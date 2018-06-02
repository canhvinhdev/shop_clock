<?php

if($_REQUEST)
{
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
	 $created_date = date('Y/m/d H:i:s');
  	$cname = isset($_POST["cname"]) ? $_POST["cname"] : 0;
  	$category = isset($_REQUEST["category"]) ? $_REQUEST["category"] :0;
  	$type = isset($_REQUEST["type"]) ? $_REQUEST["type"] :0;
  	$price = isset($_POST["price"]) ? $_POST["price"] : 0;

  	$quantity = isset($_POST["quantity"]) ? $_POST["quantity"] : 0;
  	$description = isset($_POST["description"])  ? $_POST["description"] :0;
	$validate=array();
	$cname  = trim($cname);
	if($cname){
		$sql_check="select * from product";
		$data_check =select_list($sql_check);

		foreach ($data_check as $data) {

			if($data['Product_Name'] == $cname )
			{
				$validate['Product_Name']="Tên danh mục đã tồn tại, mời thử lại!";  

			}			
		}
	}
	$status = "1";
	if (count($validate)==0) {
  	$sql = "insert into product(Product_Name, Category_ID, Product_Images, Product_Price, Quantity, Description, Status,Created_Date) values ('$cname', '$category' ,'$img', '$price' ,'$quantity', '$description', '$status','$created_date')";
		$result = 0;
		if ($cname){
	//echo "thanh cong";
			$result = exec_update($sql);
			?>
			<script language="javascript">
				alert("Bạn đã thêm thành công danh mục");
				window.location ="index.php?page=product&type=list";
			</script>
			<?php
		} 
		else{
		}
	}
// var_dump($validate['Category_name']);

}

?>




