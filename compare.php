<?php 
require('top.php');
include('Mobile_Detect.php');
include('BrowserDetection.php');
$get_product='';
if(isset($_POST['submit_checkbox'])){
    if(!empty($_POST['checkArr'])){
    // foreach($_POST['checkArr'] as $checked){
    //   echo $checked."</br>";
    // }
    $id1=$_POST['checkArr']['0'];
    $id2=$_POST['checkArr']['1'];
    // echo $_POST['checkArr']['0'];
    // echo $_POST['checkArr']['1'];
    
  }
  $get_product=get_product($con,'','','','','','',$id1,$id2);
}



?>

<!DOCTYPE html>
<html>
<head>
<style>
.flex-container {
  display: flex;
  flex-wrap: nowrap;
  background-color: DodgerBlue;
}

.flex-container > div {
  background-color: #f1f1f1;
  width: 100px;
  margin: 10px;
  text-align: center;
  line-height: 75px;
  font-size: 30px;
}
</style>
</head>
<body>
<?php
foreach($get_product as $list){
    $name1=$list['name'];
    $name2=$list['name'];
}
    ?>
<h1>Compare <?php echo $name1?> and <?php echo $name2?></h1>
<div class="body__overlay"></div>
        
        
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
					<?php if(count($get_product)>0){?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
						<div class="htc__grid__top">
                                <div class="htc__select__option divcol">
									SORT BY:
                                    <select class="ht__select" onchange="sort_product_drop('<?php echo $cat_id?>',' ')" id="sort_product_id">
                                        <option value="">Default softing</option>
                                        <option value="price_low" <?php echo $price_low_selected?>>Sort by price low to high</option>
                                        <option value="price_high" <?php echo $price_high_selected?>>Sort by price high to low</option>
										<option value="name_asc" <?php echo $name_ascending_selected?>>Sort by name in ascending order</option>
										<option value="name_desc" <?php echo $name_descending_selected?>>Sort by name in descending order</option>
                                        <option value="new" <?php echo $new_selected?>>Sort by new first</option>
										<option value="old" <?php echo $old_selected?>>Sort by old first</option>
                                    </select>
                                </div>
								
                               
                            </div>
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <?php
										foreach($get_product as $list){
										?>
										<!-- Start Single Category -->
										<div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
											<div class="category">
												<div class="ht__cat__thumb">
													<a href="product.php?id=<?php echo $list['id']?>">
														<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images" height="260px" width="120px">
													</a>
												</div>
												
												<div class="fr__product__inner">
													<h4><a href="product-details.html"><?php echo $list['name']?></a></h4>
													<ul class="fr__pro__prize">
														<li class="old__prize"><s><?php echo '₹'.$list['mrp']?></s></li>
														<li><?php echo '₹'.$list['price']?></li>
													</ul>
												</div>
											</div>
										</div>
										<?php } ?>
                                    </div>
							   </div>
                            </div>
                        </div>
                    </div>
					<?php } else { 
						echo "Data not found";
					} ?>
                
				</div>
            </div>
        </section>
        

</body>
</html>
