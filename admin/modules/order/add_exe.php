
<?php
include("../lib_db.php");
	$name = isset($_REQUEST["name"]) ? $_REQUEST["name"] : 0;

	$phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : 0;


	$address = isset($_REQUEST["address"]) ? $_REQUEST["address"] : 0;
	$total = 0;

	foreach($_POST['data'] as $item){
		$id_product = $item['id_product'];
		$quantity = $item['quantity'];
		$sql="select * from product where ID = $id_product";
		$datas = select_one($sql);
		
					$id = $datas['ID'];
					$giagocsp = $datas['Product_Price'];
					$sql_promotion = "select * from discount inner join discountproduct on discount.ID = discountproduct.Discount_ID where discountproduct.Product_ID = $id ";
					$data_ct_giamgia = select_list($sql_promotion);
					$sp_giamgia = $giagocsp; 
					if($data_ct_giamgia){
						$giacuoicung = 0;
						foreach ($data_ct_giamgia as $data3){

							$number = $data3['Number_Discount'];
							$number_percent  =  (($sp_giamgia*$data3['Number_Discount'])/100)*$quantity;
							$giacuoicung+= $number_percent;
						}

						$giacuoicung =  $sp_giamgia-$giacuoicung;
						$total+=$giacuoicung ;
					}else
					{
						$giacuoicung = $sp_giamgia * $quantity;
						$total+=$giacuoicung ;
					}
	}
	$sql_order = "insert into `order`(Name, Moblie_Number,Shipping_Address,Order_Time,Subtotal) values ('$name', '$phone ','$address', curdate(),$total)";
	$result = exec_update($sql_order);
	$max = "select * from `order` order by ID desc";
	$row1 = select_one($max);
	foreach($_POST['data'] as $item){
		$total=0;
		$id_product = $item['id_product'];
		$quantity = $item['quantity'];
		$sql="select * from product where ID = $id_product";
		$datas = select_one($sql);
		
					$id = $datas['ID'];
					$giagocsp = $datas['Product_Price'];
					$sql_promotion = "select * from discount inner join discountproduct on discount.ID = discountproduct.Discount_ID where discountproduct.Product_ID = $id ";
					$data_ct_giamgia = select_list($sql_promotion);
					$sp_giamgia = $giagocsp; 
					if($data_ct_giamgia){
						$giacuoicung = 0;
						foreach ($data_ct_giamgia as $data3){

							$number = $data3['Number_Discount'];
							$number_percent  =  (($sp_giamgia*$data3['Number_Discount'])/100)*$quantity;
							$giacuoicung+= $number_percent;
						}

						$giacuoicung =  $sp_giamgia-$giacuoicung;
						$total=$giacuoicung ;
					}else
					{
						$giacuoicung = $sp_giamgia * $quantity;
						$total=$giacuoicung ;
					}
		$ProductName= $datas['Product_Name'];
		$order_id = $row1['ID'];
		$sql12 = "insert into detail_order(Order_ID,Product_ID,ProductName_DetailOrder, Quantity_DetailOrder,Price_DetailOrder) values ($order_id, $id,'$ProductName',$quantity, $total)";
		$test = exec_update($sql12);
		echo "bạn đã tạo hóa đoen thành công";die();
	
	} 

?>

