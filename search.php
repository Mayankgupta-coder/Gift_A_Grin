<?php 
require('top.php');
$str=mysqli_real_escape_string($con,$_GET['str']);
if($str!=''){
	$get_product=get_product($con,'','','',$str);
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}

$price_high_selected="";
$price_low_selected="";
$new_selected="";
$old_selected="";
$sort_order="";
$name_descending_selected="";
$name_ascending_selected="";
if(isset($_GET['sort'])){
	$sort=mysqli_real_escape_string($con,$_GET['sort']);
	if($sort=="price_high"){
		$sort_order=" order by product.price desc";
		$price_high_selected="selected";	
	}if($sort=="price_low"){
		$sort_order=" order by product.price asc ";
		$price_low_selected="selected";
	}if($sort=="new"){
		$sort_order=" order by product.id desc ";
		$new_selected="selected";
	}if($sort=="old"){
		$sort_order=" order by product.id asc ";
		$old_selected="selected";
	}if($sort=="name_desc"){
		$sort_order=" order by product.name desc ";
		$name_descending_selected="selected";
	}if($sort=="name_asc"){
		$sort_order=" order by product.name asc ";
		$name_ascending_selected="selected";
	}

}
if($str!=''){
	$get_product=get_product($con,'','','',$str,$sort_order);
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}								
?>
<script>
function sort_product(strs,site_path){
	let sort_product_id_search=jQuery('#sort_product_id_search').val();
    window.location.href=site_path+"search.php?str="+strs+"&sort="+sort_product_id_search;
    
}

</script>
<div class="body__overlay"></div>
        
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Search</span>
								  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><?php echo $str?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
					<?php if(count($get_product)>0){?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                        <div class="htc__select__option divcol">
									SORT BY:
                                    <select class="ht__select" onchange="sort_product('<?php echo $str?>',' ')" id="sort_product_id_search">
                                        <option value="">Default softing</option>
                                        <option value="price_low" <?php echo $price_low_selected?>>Sort by price low to high</option>
                                        <option value="price_high" <?php echo $price_high_selected?>>Sort by price high to low</option>
										<option value="name_asc" <?php echo $name_ascending_selected?>>Sort by name in ascending order</option>
										<option value="name_desc" <?php echo $name_descending_selected?>>Sort by name in descending order</option>
                                        <option value="new" <?php echo $new_selected?>>Sort by new first</option>
										<option value="old" <?php echo $old_selected?>>Sort by old first</option>
                                    </select>
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
														<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
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
        <!-- End Product Grid -->
        <!-- End Banner Area -->
<?php require('footer.php')?>        