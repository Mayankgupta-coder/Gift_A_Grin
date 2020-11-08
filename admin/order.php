<?php
ob_start();
require('top.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update product set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from product where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from buyers_info";
$res=mysqli_query($con,$sql);
ob_end_flush();
?>
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
                               <th width="30%">Payment SS</th>
							   
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
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
</div>
