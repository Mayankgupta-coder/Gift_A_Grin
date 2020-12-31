
<?php
ob_start();
require('top_order.php');
require('fpdf.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
}
$per_page=10;
$current_page=1;
$record=mysqli_num_rows(mysqli_query($con,"select * from selling_info"));
$page=ceil($record/$per_page);
$start=1;
if(isset($_GET['start'])){
	$start=$_GET['start'];
	$current_page=$start;
	$start--;
	$start=$start*$per_page;
}

$sql="select * from selling_info ORDER BY id desc";
$res=mysqli_query($con,$sql);
ob_end_flush();
?>
<html>
<style>
.margin_button
{
	display:flex;
	flex-wrap:wrap;
	justify-content: center;
	flex-direction:row;
}
#my_button 
{
	margin:2px;
}
</style>
<body>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Orders</h4>
				   
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							  
							   <th width="2%">ID</th>
							   <th width="10%">Product Name</th>
							   <th width="10%">Order delivered at</th>
                               <th width="30%">First Name</th>
                               <th width="10%">Last Name</th>
							  
                               <th width="7%">contact</th>
                               <th width="30%">Email</th>
							   <th width="30%">adress</th>
                               <th width="7%">city</th>
                               <th width="7%">state</th>
                               <th width="7%">quantity req</th>
                               <th width="7%">total amount</th>
                               <th width="125px">Payment SS</th>
							   
							</tr>
						 </thead>
						 
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){
								$order_id=mysqli_real_escape_string($con,$row['id']);
								
								?>
							<tr class="tablerow">
							   
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['product_name']?></td>
							   <td><?php echo $row['date']?></td>
                               <td><?php echo $row['first_name']?></td>
                               <td><?php echo $row['last_name']?></td>
							   
							   <td><?php echo $row['phone']?></td>
                               <td><?php echo $row['email']?></td>
                               <td><?php echo $row['address']?></td>
                               <td><?php echo $row['city']?></td>
                               <td><?php echo $row['state']?></td>
							   <td><?php echo $row['quantity']?></td>
                               <td><?php echo $row['total']?></td>
                               <td><img src="<?php echo $row['image']?>"/></td>
							   <td><a href="pdf.php?sell_id=<?php echo $order_id?>"><button>PDF</button></a></td>
							   
							</tr>
							<?php } ?>
						 </tbody>
						 
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
	
	

						
	<!-- <script>
							   function downloadPdf()
							   {
								   <?php
								   
								   $pdf = new FPDF(); 
								   $pdf->AddPage();
								   $pdf->Image('payments/product/145009471_9.jpg',0,0);
								   $pdf->Output();
								   ?>
							   }
							   </script> -->
</div>
</body>
</html>