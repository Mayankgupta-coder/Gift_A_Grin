<?php 
require('top.php');
include('Mobile_Detect.php');
include('BrowserDetection.php');


$browser=new Wolfcast\BrowserDetection;

$browser_name=$browser->getName();
$browser_version=$browser->getVersion();

$detect=new Mobile_Detect();

if($detect->isMobile()){
	$type='Mobile';
}elseif($detect->isTablet()){
	$type='Tablet';
}else{
	$type='PC';
}

if($detect->isiOS()){
	$os='IOS';
}elseif($detect->isAndroidOS()){
	$os='Android';
}else{
	$os='Window';
}

$url=(isset($_SERVER['HTTPS'])) ? "https":"http";
$url.="//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$ref='';
if(isset($_SERVER['HTTP_REFERER'])){
	$ref=$_SERVER['HTTP_REFERER'];
}
$sql="insert into visitor(browser_name,browser_version,type,os,url,ref) values('$browser_name','$browser_version','$type','$os','$url','$ref')";
mysqli_query($con,$sql);
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con,'','',$product_id);
	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
    

?>

        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" alt="Product image" height="500px" width="600px">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl" style="font-size:50px; font-weight:600;">
                                <h2 style="font-size:38px; font-weight:500;"><?php echo $get_product['0']['name']?></h2>
                                <ul  class="pro__prize">
                                    <li class="old__prize"><s><?php echo '₹'.$get_product['0']['mrp']?></s></li>
                                    <li><?php echo '₹'.$get_product['0']['price']?></li>
                                </ul>
                                <p class="pro__info"><?php echo $get_product['0']['short_desc']?></p>
                                <div class="ht__pro__desc">
                                    <!-- <div class="sin__desc">
                                        <p><span>Availability:</span> In Stock</p>
                                    </div> -->
									
                                    <div class="sin__desc align--left" style="font-size:50px; font-weight:600;">
                                        <p><span>Category:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#"><?php echo $get_product['0']['categories']?></a></li>
                                        </ul>
                                    </div>
                                    
                                   </div>
									
                                </div>
                              
                               <form method="post" action="Payment.php?id=<?php echo $get_product['0']['id']?>">
                               <input type="text" placeholder="enter quantity" name="quantity">
                               <button class="fr__btn" type="submit" name="submitpay">BUY PRODUCT</button>
                               </form>
                                
				
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area 
		<!-- Start Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            
                        <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">Description</a></li>&nbsp;
                        <?php echo $get_product['0']['description']?>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <?php
                if(isset($_GET['id'])){
                    $pid=$_GET['id'];
                $sql="select image from images where product_id='$pid'";
		$result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result)){?>
            <a href="<?php echo 'admin/'.'uploads/'.$row['image'];?>"><img class="mymulimg" src="<?php echo 'admin/'.'uploads/'.$row['image'];?>"width="300" height="300"/></a>
            <?php
        }
    }
        ?>
                <div class="row">
                    <div class="col-xs-12">
                    
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                   
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->
        
										
<?php require('footer.php')?>        
