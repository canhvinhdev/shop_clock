

<?php 
$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql_km= "select * from discount where ID = $id ";
$data_km = select_one($sql_km);
$id_km = $data_km['ID'];
$name_discount = $data_km['Discount'];

// var_dump($id_km);
?>
<script type="text/javascript" language="javascript" src="modules/ckeditor/ckeditor.js" ></script>
<!-- Topbar -->

<!-- /Topbar -->
<div class="panel-heading">


  <div class="panel-title col-md-12">Thêm sản phẩm cho chương trình khuyến mãi <h3><?php echo $name_discount ?></h3></div>

  <!-- <button type="button" class="btn btn-info right"><a href="?page=order&type=add">Tạo hóa đơn</a></button> -->
</div>


<?php 
$sql_dssp = "select * from product inner join discountproduct where product.ID = discountproduct.Product_ID and Discount_ID = $id ";
$data_dssp = select_list($sql_dssp);

?>
<div class="panel-body">
  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
    <thead>
      <tr class="active">
        <th>STT</th>
        <th>Các sản phẩm đã thêm vào chương trình </th>
        <th>  Giá gốc</th>

        <th>  % KM</th>
        <th>  Giá áp dụng khuyến mại tại chương trình</th>
        <th>  Tác vụ</th>
      </tr>
    </thead>
    <tbody>



      <?php if($data_dssp){
        $i = 0;
        foreach ($data_dssp as $data) { 
         ?>
         <tr>
          <td> <?php echo $i++ ?></td>

          <td>
           <?php echo $data['Product_ID'] ?>- -    <?php echo $data['Product_Name'] ?>


         </td>
         <td>     <?php echo number_format($data['Product_Price'] )  ?> đ</td>
         <td> <span class="label label-info"> <?php   echo $data['Number_Discount'] ?> %</span></td>


         <?php  

         $giagoc = $data['Product_Price'];

         $giakm = $giagoc - ($giagoc*$data['Number_Discount']/100);


         ?>
         <td> <?php   echo number_format($giakm)  ?>  đ</td>

         <td>   <button type="button" class="btn btn-danger" data-variant="<?php  echo $data['ID'] ?>" id="xoakm">X</button></td>
       </tr>
       <?php }} ?>


     </tbody>
   </table>
 </div>



 <div class="panel-body">


  <form method="post"  enctype="multipart/form-data">

    <table class="table table-hover" >
     <thead>
      <tr class="active">
        <th></th>
        <th>Tất cả sản phẩm</th>


      </tr>
    </thead>


    <tbody>

      <tr>
        <td>Sản phẩm</td>
        <td>
          <?php
          $sql_sp="select * from product where Status = 1 ";
          $datas_sp=select_list($sql_sp); 

          ?>
          <?php 
          foreach ($datas_sp as $dat) { 
            $id_sp=$dat['ID'];             
            ?>
            <div style="width: 50%;float: left;">

              <input type="checkbox" class="radio_height " name="sp[]" value="<?php echo $dat['ID'] ?>"/> 
              <?php echo $dat['ID'];?>  --   <?php echo $dat['Product_Name'];?>
            </div>
            <?php } ?>

          </td>
        </tr>
      </tbody>
    </table>
    <div class="km_sp">
      <div class="sanphamchon"></div>
      <br/>
      <div style="margin-left: 450px;" >
        <div  id="themkm" class="btn btn-success">Thêm khuyến mãi</div> 
      </div> 
    </div>
  </form>

</div>
<script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
<script  type="text/javascript" charset="utf-8" async defer>
  $(document).ready(function(){
    $('.radio_height').change(function(e) {
      var data = [];
      $('input[name="sp[]"]:checked').each(function() {
        data.push(this.value);

      });
      $.ajax({
        url: "modules/discount/select.php" ,
        type:'POST',
        data:{'data':data},
        success:function(data){
          $('.sanphamchon').html(data);

        }
      });
    });

  });
  $(document).ready(function(){
    $('#themkm').click(function(e){


      if($('input[name="sp[]"]:checked').length > 0)
      {


        var data2=[];
        var id_km = "<?php echo $id_km ?>";
        $('input[name="listkm[]"]:checked').each(function() {
          var km_tien = $(this).parents('.kmsp_tien').find('#km_tien');
          var km_tien_new = km_tien.val();
          var id_dh = $(this).parents('.kmsp_tien').find('#id_dh');
          var id = id_dh.val();
          var km_dk = $(this).parents('.kmsp_tien').find('#km_di_kem');
          var km_dk_new = km_dk.val();
               //id.push(this.value);//

               var item =  {id_km:id_km,id:id,km_dk:km_dk_new,km_tien:km_tien_new};
               console.log(id);
               data2.push(item);
               console.log(data2);
             });
        $.ajax({
          url:'modules/discount/add_pro_exe.php',
          type:'POST',
          //dataType:'json',
          cache: false,
          data:{'data':data2,},
          success: function(data){

            console.log(data);
            alert(data);

          }
           
        });
 setInterval(function(){  location.reload();}, 1000);
      }
      else
      {
        alert('Bạn chưa lựa chọn sảm phẩm !')
      }
    });


    $(document).on('click', '#xoakm', function(e){
   var id = $(this).data("variant");

   var id_km = "<?php  echo  $id_km ?>"
     
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
          url:'modules/discount/del_pro_exe.php',
          type:'POST',
          //dataType:'json',
          cache: false,
          data:{id:id},
          success: function(data){

           $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
            alert(data);

          }
        });
   setInterval(function(){  location.reload();}, 1000);
   }
  });
  });
</script>

