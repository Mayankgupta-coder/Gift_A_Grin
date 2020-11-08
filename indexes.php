<?php
require('connection.inc.php');
require('functions.inc.php');

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
        <a class="js-scroll-trigger" href="index.php">New Arrivals</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#contact">Contact Us</a>
      </li>
    </ul>
  </nav>

  <!-- Header -->
  <header class="masthead d-flex">
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
  <section class="content-section" id="about">
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
  <section class="content-section bg-primary text-white text-center" id="services">
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
  <section class="content-section" id="products">
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
  <section id="contact" class="content-section text-white">
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
                <a class="d-block text-white" href="mailto:contact@yourwebsite.com" class="mb-2">contact@yourwebsite.com</a>

            </div>
            <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
              <i class="icon-social-instagram fa-3x text-muted rounded-circle"></i>
              <a class="d-block text-white" href="https://www.instagram.com/gift.a.grin/" class="mb-2">@gift.a.grin</a>
          </div>
        </div>

    </div>
  </section>

  <!-- Map -->
  <div class="map">
    <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
    <br />
    <small>
      <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
    </small>
  </div>

  <!-- Footer -->
  <footer class="footer text-center bg-dark">
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

</body>

</html>
