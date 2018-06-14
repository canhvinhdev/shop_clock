<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql_order = "select * from `order` where ID = $id";
$data_order = select_one($sql_order);
?>
<body class="bill_content">
<div id="page" class="page">
    <div class="">
        <div class="logo"><img src="../images/logo_footer.png" width="200" class="img-responsive"></div>
        <div class="company">C.Ty TNHH ...</div>
    </div>
  <br/>
  <div class="title">
        HÓA ĐƠN THANH TOÁN
        <br/>

  </div>
  <br/>
  <br>
  <br>
<p>
<hr>
Tên khách hàng: <strong>   <?php echo $data_order['Name'] ?> </strong>
<hr>
Địa chỉ: <strong>   <?php echo $data_order['Shipping_Address'] ?> </strong>
<hr>
Số điện thoại: <strong>   <?php echo $data_order['Moblie_Number'] ?> </strong>
<hr>
Gi chú: <strong>   <?php echo $data_order['Note'] ?> </strong>
<hr>

</p>
<strong>Danh sách sản phẩm đã mua:</strong>
<hr>
  <table class="TableData">
    <tr>
      <th>STT</th>
      <th>Tên</th>
      <th>Số</th>
      <th>Thành tiền</th>
    </tr>
   
    <?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql_order = "select * from `detail_order` where Order_ID = $id";
$list = select_list($sql_order);
?>
 <tr>
        <?php
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $sql_order = "select * from `detail_order` where Order_ID = $id";
            $list = select_list($sql_order);
        ?>
        <?php $stt =0; $total = 0;
        if ($list) {foreach ($list as $datas) {  $stt++;?>
            <th ><?php echo $stt; ?></th>
            <th><?php echo $datas['ProductName_DetailOrder'];?></th>
            <th><?php echo $datas['Quantity_DetailOrder'];?></th>
            <th><?php echo $datas['Price_DetailOrder']; ?></th>
            <?php $total += $datas['Price_DetailOrder'];?>
        </tr>
        <?php } } ?>
        <tr>
            <th scope="row"></th>
            <th></th>
            <th><strong>Tổng tiền</strong></th>
            <th><strong><?php echo $total;?></strong></th>
        </tr>
    </tr>
  </table>
  <div class="footer-left"> Hà Nội, <?php echo date("d/m/Y");?><br/>
    Khách hàng </div>
  <div class="footer-right"> Hà Nội, <?php echo date("d/m/Y");?><br/>
    Nhân viên </div>
</div>
</body>

	<button class=" btn bill_on btn-success" type="button">
		<p class="">IN đơn hàng</p>
				</button>
<script>


$('.bill_on').click(function(){
$('.show_bar').hide();
$(this).hide();
window.print();
});
$('.button-strip .cancel').click(function(){
alert('a');
});


	</script>

<style>
body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tohoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 100%;
    overflow:hidden;
    min-height:297mm;
    padding: 2.5cm;
    margin-left:auto;
    margin-right:auto;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 237mm;
    outline: 2cm #FFEAEA solid;
}
 @page {
 size: A4;
 margin: 0;
}
button {
    width:100px;
    height: 24px;
}
.header {
    overflow:hidden;
}
.logo {
    background-color:#FFFFFF;
    text-align:left;
    float:left;
}
.company {
    padding-top:24px;
    text-transform:uppercase;
    background-color:#FFFFFF;
    text-align:right;
    float:right;
    font-size:16px;
}
.title {
    text-align:center;
    position:relative;
    color:#0000FF;
    font-size: 24px;
    top:1px;
}
.footer-left {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    float:left;
    font-size: 12px;
    bottom:1px;
}
.footer-right {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 12px;
    float:right;
    bottom:1px;
}
.TableData {
    background:#ffffff;
    font: 11px;
    width:100%;
    border-collapse:collapse;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:12px;
    border:thin solid #d3d3d3;
}
.TableData TH {
    background: rgba(0,0,255,0.1);
    text-align: center;
    font-weight: bold;
    color: #000;
    border: solid 1px #ccc;
    height: 24px;
}
.TableData TR {
    height: 24px;
    border:thin solid #d3d3d3;
}
.TableData TR TD {
    padding-right: 2px;
    padding-left: 2px;
    border:thin solid #d3d3d3;
}
.TableData TR:hover {
    background: rgba(0,0,0,0.05);
}
.TableData .cotSTT {
    text-align:center;
    width: 10%;
}
.TableData .cotTenSanPham {
    text-align:left;
    width: 40%;
}
.TableData .cotHangSanXuat {
    text-align:left;
    width: 20%;
}
.TableData .cotGia {
    text-align:right;
    width: 120px;
}
.TableData .cotSoLuong {
    text-align: center;
    width: 50px;
}
.TableData .cotSo {
    text-align: right;
    width: 120px;
}
.TableData .tong {
    text-align: right;
    font-weight:bold;
    text-transform:uppercase;
    padding-right: 4px;
}
.TableData .cotSoLuong input {
    text-align: center;
}
@media print {
 @page {
 margin: 0;
 border: initial;
 border-radius: initial;
 width: initial;
 min-height: initial;
 box-shadow: initial;
 background: initial;
 page-break-after: always;
}
}
	</style>