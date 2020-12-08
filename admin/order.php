
<?php
ob_start();
require('top_order.php');
require('fpdf.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$pname='';
			$fname='';
			$lname='';
			$phone='';
			$email='';
			$adress='';
			$city='';
			$state='';
			$qty='';
			$total='';
			$image='';
		$sql="select * from buyers_info where id='$id'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
			$pname=$row['product_name'];
			$fname=$row['first_name'];
			$lname=$row['last_name'];
			$phone=$row['phone'];
			$email=$row['email'];
			$adress=$row['address'];
			$city=$row['city'];
			$state=$row['state'];
			$qty=$row['quantity'];
			$total=$row['total'];
			$image='payments/product/'.$row['image'];
		
		if(mysqli_query($con,"insert into `selling_info`(product_name,first_name,last_name,phone,email,address,city,state,quantity,total,image) values('$pname','$fname','$lname','$phone','$email','$adress','$city','$state','$qty','$total','$image')"))
		{
			echo "success";
		}
		else{
			echo $pname;
		}
		$delete_sql="delete from buyers_info where id='$id'";
		mysqli_query($con,$delete_sql);
		
	}
}
$per_page=10;
$current_page=1;
$record=mysqli_num_rows(mysqli_query($con,"select * from buyers_info"));
$page=ceil($record/$per_page);
$start=1;
if(isset($_GET['start'])){
	$start=$_GET['start'];
	$current_page=$start;
	$start--;
	$start=$start*$per_page;
}

$sql="select * from buyers_info ORDER BY id desc limit $start,$per_page";
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
							   <th width="10%">Order place at</th>
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
							   <th width="30%">order Delivered</th>
							</tr>
						 </thead>
						 
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){
								$order_id=mysqli_real_escape_string($con,$row['id']);
								
								?>
							<tr>
							   
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
                               <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
							   <td><a href="pdf.php?id=<?php echo $order_id?>"><button>PDF</button></a></td>
							   <td>
								<?php
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
							   </td>
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
	
	<div class="margin_button">
	
		<?php
		$next=1;
		$prev=1;
		if(isset($_GET['next'])){
			$next=$_GET['next'];
		}
		if(isset($_GET['start']))
		{
			$next=$_GET['start'];
			$prev=$next;
		}
		?>
		<?php
		if($prev>1)
		{
			?>
		<a href="?start=<?php echo $prev-1?>"> <button type="button" class="btn btn-dark" id="my_button">PREVIOUS</button></a>
		<?php
	   }?>
	   <?php	
	   if($prev==1)
		{
			?>
		<a href="?start=<?php echo $page?>"> <button type="button" class="btn btn-dark" id="my_button">PREVIOUS</button></a>
		<?php
	   }?>	
		<?php
		
			for($i=$next;$i<=$next+1;$i++)
						 {
							if($i<=$page)
							{
							$class='dark';
							 if($current_page==$i)
							 {
								 $class='light';
							 }
							 ?>
							
							<a href="?start=<?php echo $i?>"><button type="button" class="btn btn-<?php echo $class?>" id="my_button"><?php echo $i ?></button></a>
							
						 <?php
							}
						}
						?>
						<?php
						if($i<=$page+1)
						{
						?>
						<a href="?start=<?php echo $i-1?>"> <button type="button" class="btn btn-dark" id="my_button">NEXT</button></a>
					    <?php
						}
						else{
							?>
							<a href="?start=1"> <button type="button" class="btn btn-dark" id="my_button">NEXT</button></a>
						<?php
						}
						?>
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