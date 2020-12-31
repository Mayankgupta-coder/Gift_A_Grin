<?php
require('top.php');
if(isset($_GET['id']) && $_GET['id']!=''){
   global $pid;
   $pid=$_GET['id'];
   ?>
   <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" action="multiimage.php?id=<?php echo $pid?>" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
									
									<input type="file" name="imageFile[]" multiple>
								</div>
                                <input type="submit" name="uploadImageBtn" id="uploadImageBtn" value="Upload Images">
							   
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   <?php
                $result='';
                $sql="select name from product where id='$pid'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($result);
                $pname=$row['name'];
    if (isset($_POST['uploadImageBtn'])) {
        $uploadFolder = 'uploads/';
        foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
            $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
            $imageName = $_FILES['imageFile']['name'][$key];
            $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);
            $c=1;
            if(mysqli_query($con,"insert into `images`(product_id,product_name,image) values('$pid','$pname','$imageName')"))
            {
                // echo 'Image uploaded succesfully';
            }
            else{
                echo mysqli_error($con);
            }
            // save to database
        
        }
        
    }
}


if(!isset($_GET['id'])){
    ?>
    <div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Products Images</h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th width="2%">Product ID</th>
                               <th width="2%">Product Name</th>
							   <th width="10%">images</th>
							</tr>
						 </thead>
						 <tbody>
                            <?php 
                            $sql="select * from images group by product_id";
                            $result=mysqli_query($con,$sql);
                            
							$i=1;
							while($row=mysqli_fetch_assoc($result)){
                                $uid=$row['product_id'];
                                $sql="select * from product where id='$uid'";
                                $result_unique=mysqli_query($con,$sql);
                                $num=mysqli_num_rows($result_unique);
                                if($num>0)
                                {
                                ?>
							<tr class="tablerow">
							   <!-- <td class="serial"><?php echo $i?></td> -->
							   <td><?php echo $row['product_id']?></td>
                               <td><?php echo $row['product_name']?></td>
                                <?php 
                                $pid=$row['product_id'];
                                $sql2="select * from images where product_id='$pid'";
                                $result2=mysqli_query($con,$sql2);?>
                                <td>
                               <?php while($row=mysqli_fetch_assoc($result2)){?>
                                <img src="<?php echo 'uploads/'.$row['image'];?>" width="300" height="100"/>
                                
                                <?php
                            }?>
                            </td>
							</tr>
                            <?php }?>
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
<?php
}
?>
                