<?php
require('top.php');
// require('functions.php');


$sql="select *,count(url) from visitor GROUP BY url,browser_name,type,os DESC";
$res=mysqli_query($con,$sql);
$myquery="select web_count from visitors_count";
$result=mysqli_query($con,$myquery);
    $num=mysqli_num_rows($result);
    
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">SEO</h4>
				   <?php echo "the count is".$num;?>
				   
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							  
							   <th>Browser Name</th>
							  
							   <th>Type</th>
                               <th>OS</th>
                               <th>URL</th>
                               <th>Count</th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr class="tablerow">
							   
							   <td><?php echo $row['browser_name']?></td>
							   
                               <td><?php echo $row['type']?></td>
                               <td><?php echo $row['os']?></td>
                               <td><?php echo $row['url']?></td>
                               <td><?php echo $row['count(url)']?></td>
							   
							</tr>
                            <?php
                        $i++; } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
