<?php 
include ("../lib_db.php");
$i = 0;

foreach($_POST['data'] as $item){
  $res[] = $item;
  $id_sp = $res[$i]['id'];
  $id_km = $res[$i]['id_km'];
  $km_tien = $res[$i]['km_tien']; 
    //echo "ok";
  // var_dump($id_sp);

  $result = 0;
  $count = 0;
  if($id_km>0){


    $km=" select discountproduct.Product_ID,discountproduct.Discount_ID,discount.* from discountproduct,discount where discountproduct.Discount_ID = $id_km";
    $kmsql=select_list($km);

if($kmsql){
    foreach ($kmsql as $key) 
    {
     // $sqsl="select * from discount where ID=".$id_km;
     //            //echo $sqsl;exit();
     // $rkm=select_one($sqsl);


     // $sql = "select * from discountproduct where Discount_ID = ".$id_km;
     // $kmsql2=select_list($sql);


     if($key['Product_ID']==$id_sp ) {
       $err = "Sản phẩm đã tôn tại trong chương trình khuyến mãi này! ";  
       $count++;
     }
}


   }
 }
 if ($count == 0 ) {


  $sqlSPKM="insert into discountproduct(Product_ID, Discount_ID,Number_Discount) values ($id_sp,$id_km,$km_tien)";

        //  //echo $sqlSPKM;
  $result = exec_update($sqlSPKM);



}
$i++;
}
if (isset($err)) {
  echo $err;
}
else
{

 echo 'Bạn đã thêm thành công khuyến mãi'; 

}



?>



