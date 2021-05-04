<?php require('top.php');
include('Mobile_Detect.php');
include('BrowserDetection.php');
include('db.php');

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
?>

<!-- css -->
<style>
.slider__container{    
    background-image: -webkit-radial-gradient(top, #28f6fa, #05b0fa,#057ffa); 
    background-image:    -moz-radial-gradient(top, #28f6fa, #05b0fa,#057ffa); 
    background-image:     -ms-radial-gradient(top, #28f6fa, #05b0fa,#057ffa); 
    background-image:      -o-radial-gradient(top, #28f6fa, #05b0fa,#057ffa); 
    background-image:         radial-gradient(top, #28f6fa, #05b0fa,#057ffa);
    height:45rem;
   
}

.slide__container .slider__inner h1{
    font-size:3.6rem;
    line-height:4.5rem;
}
.slide__container .slider__inner h2{
    line-height:2.4rem; color: white;margin-bottom:3.6rem;
    letter-spacing:0.25rem;
}
.slide__container .slider__inner h3{
    font-size:1.6rem; letter-spacing:0.2rem; margin-bottom:3.5rem; color: rgb(136, 33, 33);
    font-style: italic;
    line-height:2.4rem;
    font-weight:500
}
.slide__container .slider__inner h3 b{
    font-size:34px;color: #572417;
}
.slide__container .slide__thumb img{
    height:28rem;
    width:31rem;
}
@media screen and (max-width:843px) { 
               .slide__container .slide__thumb img{ 
                     width:31rem;
                     height:14rem;
                }  
}
@media screen and (max-width:843px) { 
               .slide__container .slide__thumb .bdayimg{ 
                     width:31rem;
                     height:12rem;
                }  
}

</style>
<!-- css end -->

<div class="body__overlay"></div>
       
        <!-- Start Slider Area -->
<div class="slider__container slider--one bg__cat--3" style="background-color: rgb(67, 224, 247); padding:0">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">                                        
                                        <!--<h3>Get <b> Flat 20% Off </b> on every product this Festive Season<h3> -->      
                                        <h2>Book beautiful presents for your loved ones</h2>
                                        <h1>Amazing Stuff</h1>
                                        <!-- <div class="cr__btn">
                                            <a href="cart.html">Shop Now</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="img/c1.jpg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        
                                    <h2>Get your customized cards</h2>
                                        <h1>Latest Cards Collection</h1>
                                        
                                        <!-- <div class="cr__btn">
                                            <a href="cart.html">Shop Now</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="img/bday.jpg" alt="slider images" class="bdayimg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        
                                    <h2>Order Now</h2>
                                       <h1>Customized Candles</h1>
                                        <!-- <div class="cr__btn">
                                            <a href="cart.html">Shop Now</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="img/christmas-2926962_1280.jpg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                       
                                        <h2>Add some sparkle to you life</h2>
                                        <h1>Beautiful Lamps</h1>
                                        <!-- <div class="cr__btn">
                                            <a href="cart.html">Shop Now</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="lamp.jpg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->

            </div>
        </div>

        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
							<?php
							$get_product=get_product($con,4);
							foreach($get_product as $list){
							?>
                            <!-- Start Single Category -->
                            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id=<?php echo $list['id']?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images" height="250px" width="120px">
                                        </a>
                                    </div>
                                    <!--<div class="fr__hover__info">
										<ul class="product__action">
											<li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')"><i class="icon-heart icons"></i></a></li>
											<li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><i class="icon-handbag icons"></i></a></li>
										</ul>
									</div>-->
                                    <div class="fr__product__inner">
                                        <h4><a href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></h4>
                                        <ul class="fr__pro__prize">
                                            
                                            <li><?php echo '₹'.$list['price']?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->
        <!-- Start Product Area -->
        <section class="ftr__product__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Best Seller</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__list clearfix mt--30">
							<?php
							$get_product=get_product($con,8,'','','','','yes');
							foreach($get_product as $list){
							?>
                            <!-- Start Single Category -->
                            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id=<?php echo $list['id']?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images" height="250px" width="120px">
                                        </a>
                                    </div>
                                    <!--<div class="fr__hover__info">
										<ul class="product__action">
											<li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')"><i class="icon-heart icons"></i></a></li>
											<li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><i class="icon-handbag icons"></i></a></li>
										</ul>
									</div>-->
                                    <div class="fr__product__inner">
                                        <h4><a href="product.php?id=<?php echo '₹'.$list['id']?>"><?php echo $list['name']?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <!--<li class="old__prize"><s><?php echo '₹'.$list['mrp']?></s></li>-->
                                            <li><?php echo $list['price']?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
							<?php } ?>
                        </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->
		<input type="hidden" id="qty" value="1"/>
<?php require('footer.php')?>        
