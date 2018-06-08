
<?php

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] :0;

$sql = "select * from  news where ID = $id";
$sql_new = select_one($sql);

?>




<div class="container" style="padding-top: 10px">
	<div class="row">
		<ol class="breadcrumb">
			<li>
				<a href=" ">Home</a>
			</li>

			

			<li  class="active">
				<a href="#"><?php echo $sql_new['Title'] ?></a>
			</li>

		</ol>
	</div>
</div>
<div class="container">
	<div class="row">
	
		</div>
		<div class="col-md-12">

			<h3><?php echo $sql_new['Title'] ?></h3>
			<div class="price detail-info-entry">
				<div class="des-short">
					<?php if(isset( $sql_new['Summarize'])) { 	?>
					<p>	<?php echo $sql_new['Summarize'] ?></p>

					<?php } ?>
				</div>	
				<div class="cle" style="padding-top: 30px">		
	<?php echo $sql_new['News_Content'] ?>	
	</p> 						
			</div>
		</div>
	</div>
	
</div>

</div>
</div>
