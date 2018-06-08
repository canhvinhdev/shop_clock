


<?php 
$sql_pro = "select * from product where Status = 1 order by ID DESC";

$data_pro = select_list($sql_pro);

?>

<div class="panel-heading">
<div class="panel-title">Thêm thông tin Khách hàng </div>

<div class="panel-options">
	<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
	<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
</div>
</div>
<div class="panel-body">

	<fieldset class="">
		<div class="col-md-8" >
			<h4>Thông tin đơn hàng</h4>

			<div class="panel-body">
				<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
					<thead>
						<tr class="text-center">
							<th>Lựa chọn</th>
							<th>Tên sản phẩm</th>
							<th>Ảnh đại diện</th>	
								<th>Số lượng</th>							
							<th>Chương trình khuyến mãi</th>										
						</tr>
					</thead>
					<tbody>

						<?php 
						$i= 1;
						if($data_pro){
							foreach ($data_pro as $datas){?>
								<tr class="odd gradeX show_product">
									<td><input type="checkbox" class="variant" data-variant="<?php echo $datas['ID'] ?>"  name="Product_Name[]"></td>
									<td><?php echo $datas['Product_Name'] ?></td>
									<td><img src="<?php echo $datas['Product_Images'] ?>" width="50"></td>
									<?php 
									$id = $datas['ID'];
									$giagocsp = $datas['Product_Price'];
									$sql_promotion = "select * from discount inner join discountproduct on discount.ID = discountproduct.Discount_ID where discountproduct.Product_ID = $id ";
									$data_ct_giamgia = select_list($sql_promotion);
									$sp_giamgia = $giagocsp; 
									if($data_ct_giamgia){
										$giacuoicung = 0;
										foreach ($data_ct_giamgia as $data3){

											$number = $data3['Number_Discount'];
											$number_percent  =  ($sp_giamgia*$data3['Number_Discount'])/100;
											$giacuoicung+= $number_percent;


										}

										$giacuoicung =  $sp_giamgia-$giacuoicung;
									}else
									{
										$giacuoicung = $sp_giamgia;

									}
									$Id_category = $datas['Category_ID'];
									$sql_cate = "select * from category where ID = $Id_category";
									$data_cate = select_one($sql_cate);
									?>
							

									<td>
										
										<input type="number" name="Quantity_DetailOrder[]" value="1" min ="1" class="text-center quantity">
									</td>

								
									<td class="center">




										<?php 
										$sql_hienthikieusp = "SELECT * FROM discountproduct where discountproduct.Product_ID = $id";
										$data_hienthikieusp = select_list($sql_hienthikieusp);

										if($data_hienthikieusp){

											foreach($data_hienthikieusp as $data2){
												$id_km =$data2['Discount_ID'];

												$sql_tenkm = "SELECT * FROM discount where ID = $id_km";
												$data_tenkm = select_list($sql_tenkm);

												foreach($data_tenkm as $data3){
													?>
													<span class="label label-success"><?php echo $data3['Discount']  ?></span>
													<?php
												}
											}
										}
										else{
											?>
											Không có chương trình
										<?php } ?>

									</td>
								
								</tr>

							<?php } }?>

						</tbody>
					</table>
				</div>
		</div>

			<div class="col-md-4">
				<div class="  col-md-12" >
					<label>Tên</label>
					<input class="form-control name" placeholder="Nhập tên thường"   name="Name" type="text" required>
				</div>
				<div class="col-md-12" >
					<label>Số điện thoại:</label>
					<input class="form-control phone" placeholder="Nhập số điện thoại"  name="Mobile_Number" type="text" required>
				</div>
				<div class="col-md-12" >
					<label>Địa chỉ chính:</label>
					<input class="form-control address" placeholder="Nhập địa chỉ"   name="Shipping_Address" type="text" required>
				</div>
			</div>
	</fieldset>
	<div class="col-md-12" style="padding-top: 20px">
	<div>
		<i class="fa fa-save"></i>
		<button class="btn-info" id="themhd">
			Tạo đơn hàng
		</button>
	</div>
	</div>
	
</div>
<script type="text/javascript">
	 $(document).ready(function(){
		$('#themhd').click(function(e){

			var data2=[];

			var data3=[];
		  if($('input[name="Product_Name[]"]:checked').length > 0)
		  {		

		     $('input[name="Product_Name[]"]:checked').each(function() {	
		      var id_product = $(this).parents('.show_product').find('.variant').attr('data-variant');
		    //  var id_dh = $(this).parents().find('#id_dh');
		    // var id = id_dh.val();
		      //id.push(this.value);//
		     // var item =  {id_km:id_km,id:id,km_dk:km_dk_new,km_tien:km_tien_new};
		     // console.log(id);
		     // data2.push(item);
		     // console.log(data2);		  
		       var quantity = $(this).parents('.show_product').find('.quantity').val();	 
			   if(quantity == undefined || quantity <1 ){
					alert('Số lượng tối thiểu bằng 1 !')
				return;
				}
		         var item =  {id_product:id_product,quantity:quantity};
           
               data2.push(item);
            
		 });
		   }


		   		
		 	var name = $('.name').val();
			if(name == undefined || name ==""){
				alert('Chưa nhập tên !')
				return;
			}

		  	var phone = $('.phone').val();
			  if(phone == undefined || phone ==""){
				alert('Chưa nhập số điện thoại !')
				return;
			}
		  	var address = $('.address').val();
			  if(address == undefined || address ==""){
				alert('Chưa nhập địa chỉ !')
				return;
			}	
		      $.ajax({
		      url:'modules/order/add_exe.php',
		      type:'POST',
		      //dataType:'json',
		      cache: false,
		      data:{'data':data2, 'name': name, 'phone': phone, 'address': address},
		      success: function(data){

		        console.log(data);
		        alert(data);

		      }
		       
		    });

		 });	
		  

	});
</script>

