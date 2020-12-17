<?php
require('connection.inc.php');
require('functions.inc.php');
include('Mobile_Detect.php');
include('BrowserDetection.php');
// include('track.php');
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
// echo $ip;
$myquery="select web_count from visitors_count where web_count='$ip'";
$res=mysqli_query($con,$myquery);
    $num=mysqli_num_rows($res);
    
if($num==0)
{
    mysqli_query($con,"insert into visitors_count(web_count) values ('$ip')");
}
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
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gift A Grin</title>

  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/stylish-portfolio.css" rel="stylesheet">
  <style>
  .scroll
  {
    min-width:100%;
    height:100vh;
  }
  #contact
  {
    min-width:100%;
    height:60vh;
  }
  .footer
  {
    min-width:100%;
    height:30vh;
  }
  </style>

</head>

<body id="page-top">

  <!-- Navigation -->
  <a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-brand">
        <a class="js-scroll-trigger" href="#page-top"><img src="img/logo4.png" height="40px" width="120px"></a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#page-top">Home</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#about">About</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#services">Categories</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#products">Products</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="indexe.php">New Arrivals</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#contact">Contact Us</a>
      </li>
    </ul>
  </nav>

  <!-- Header -->
  <header class="masthead d-flex scroll">
    <div class="container text-center my-auto">
      <h1 class="mb-3">Crafting your imagination by our Hands</h1>
      <h4 class="mb-5">
        <em>Making your life more beautiful...<i class="fas fa-heart"></i></em>
      </h4>
      <a class="btn btn-primary btn-lg js-scroll-trigger" href="#products">Products</a>
    </div>
    <div class="overlay"></div>
  </header>

  <!-- About -->
  <section class="content-section scroll" id="about">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h1>What We Offer?</h1>
          <ul>
            <li><i class="fas fa-plus"></i>Get the best quality customized products</li>
            <li><i class="fas fa-plus"></i>A wide range starting from Birthday presents to Home Decore</li>
            <li><i class="fas fa-plus"></i>Free Home Delivery on every products</li>
            <li><i class="fas fa-plus"></i>Easy payment methods</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Categories -->
  <section class="content-section bg-primary text-white text-center scroll" id="services">
    <div class="container">
      <div class="content-section-heading">
        <h3 class="text-light mb-1">Categories</h3>
      </div>
      <div class="row">
                                        <?php
										foreach($cat_arr as $list){
											?>
											
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
          <a href="categories.php?id=<?php echo $list['id']?>"><i class="fas fa-fire-alt"></i></a>
          </span>
          <h4>
            <strong><?php echo $list['categories']?></strong>
          </h4>
		<h4><i class="fas fa-star"></i></h4>
          <!-- <p class="text-faded mb-0">This Diwali lighten up your home with these candles</p> -->
        </div>
        
        <?php
                                        }?>
  </section>

  <!-- Portfolio -->
  <section class="content-section scroll" id="products">
    <div class="container">
      <div class="content-section-heading text-center">
        <h3 class="text-secondary mb-0">Products</h3>
        <br>
        
      </div>
      <div class="row no-gutters">
      <?php
      $i=0;
      
      $get_product=get_product($con,6,'','','','','yes');
      foreach($get_product as $list){
      ?>
        <div class="col-lg-4">
        <a class="portfolio-item" href="product.php?id=<?php echo $list['id']?>">
            <div class="caption">
              <div class="caption-content">
                <div class="h2"><?php echo $get_product[$i]['name']?></div>
                <p class="mb-0"><?php echo $get_product[$i]['short_desc']?></p>
              </div>
            </div>
            <img class="img-fluid" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
          </a>
        </div>
        
        <?php
    $i++; } ?>
        
        
  </section>

  <!-- Call to Action -->
  <section id="contact" class="content-section text-white scroll">
    <div class="container text-center">
      <h3 class="mb-5">Contact Us</h3>
      
        <div class="row">
            <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                <i class="fas fa-phone fa-3x text-muted rounded-circle"></i>
                <div class="mb-2">+91 9818198016</div>
            </div>
            <div class="col-lg-4 mr-auto text-center mb-5 mb-lg-0">
                <i class="fas fa-envelope fa-3x text-muted rounded-circle"></i>
                <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                <a class="d-block text-white" href="mailto:amritasoni1996@gmail.com" class="mb-2">amritasoni1996@gmail.com</a>

            </div>
            <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
              <i class="icon-social-instagram fa-3x text-muted rounded-circle"></i>
              <a class="d-block text-white" href="https://www.instagram.com/gift.a.grin/" class="mb-2">@gift.a.grin</a>
          </div>
        </div>

    </div>
  </section>

  <!-- Map -->
  <div class="map scroll">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.974989066042!2d77.43811411455954!3d28.63051169092439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cee3b73900165%3A0x16607205a655c99!2sMilano%20Tower%2C%20Mahagun%20Mascot!5e0!3m2!1sen!2sus!4v1605009703171!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <br />
    <small>
      <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.974989066042!2d77.43811411455954!3d28.63051169092439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cee3b73900165%3A0x16607205a655c99!2sMilano%20Tower%2C%20Mahagun%20Mascot!5e0!3m2!1sen!2sus!4v1605009703171!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0""></a>
    </small>
  </div>

  <!-- Footer -->
  <footer class="footer text-center bg-dark scroll">
    <div class="container">
      
      <p class="text-light">Copyright &copy; 2020 Gift A Grin</p>
      <p class="float-right">Images from <a href="https://pixels.com/">Pixels</a> and <a href="https://pixabay.com/">Pixabay</a><br>
      Created logo at <a href="https://logomakr.com/">LogoMakr.com</a></p>
    </div>
  </footer>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/stylish-portfolio.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.21/jquery.scrollify.min.js" integrity="sha512-UyX8JsMsNRW1cYl8BoxpcamonpwU2y7mSTsN0Z52plp7oKo1u92Xqfpv6lOlTyH3yiMXK+gU1jw0DVCsPTfKew==" crossorigin="anonymous"></script>
  <script>
        $(function() {
          $.scrollify({
            section : ".scroll",
            setHeights: false,
          });
        });
      </script>

</body>

</html>
