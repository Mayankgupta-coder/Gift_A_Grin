<?php 
require('connection.inc.php');
require('functions.inc.php');
$msg='';
$pname='';
	$fname='';
	$lname='';
	$phone='';
	$email='';
	$adress='';
	$city='';
	$state='';
    $qty='';
    $amount='';
	$total='';
	$image='';
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
<?php
if(isset($_POST['submit'])){
    
    $pname=$get_product['0']['name'];
	$fname=get_safe_value($con,$_POST['fname']);
	$lname=get_safe_value($con,$_POST['lname']);
	$phone=get_safe_value($con,$_POST['number']);
	$email=get_safe_value($con,$_POST['mail']);
	$adress=get_safe_value($con,$_POST['adress']);
	$city=get_safe_value($con,$_POST['city']);
	$state=get_safe_value($con,$_POST['state']);
    $qty=get_safe_value($con,$_POST['quantity']);
    $amount=$get_product['0']['price'];
	$total=$qty*$amount;
	// $image=get_safe_value($con,$_POST['image']);
    
	if(isset($_GET['id']) && $_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
    }
    if($msg==''){
        
		$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
            mysqli_query($con,"insert into `buyers_info`(product_name,first_name,last_name,phone,email,address,city,state,quantity,total,image) values('$pname','$fname','$lname','$phone','$email','$adress','$city','$state','$qty','$total','$image')");
            echo '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p>payment  done successfully</p>
        </div>';
	}
    
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Registration Form</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/form_style.css">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    	<title>Buy Now</title>
  	</head>
  	<body>
      <div class="container">
		<h1>Payment of <b><?php echo $get_product['0']['name']?><b></h1>
		<form action="Payment.php?id=<?php echo $get_product['0']['id']?>" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="inpname" class="control-label">First Name:</label>
							<input 
								type="text"
								class="form-control"
								id="inpname"
								name="fname"
								onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)"
								required
							/>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="inpgender" class="control-label" required>Last Name:</label>
						<input 
								type="text"
								class="form-control"
								id="inpname"
								name="lname"
								onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)"
								required
							/>
					</div>
				</div>
			</div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="inpnumber">Phone Number:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="inpnumber"
                        name="number"
                        pattern="[6-9]{1}[0-9]{9}" 
                        required
                    />
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="inpmail">Email Id:</label>
                    <input
                        type="email"
                        class="form-control"
                        id="inpmail"
                        name="mail"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" 
                        required
                    />
                </div>
            </div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="inpschool" class="control-label">Address:</label>
							<input
								type="text"
								class="form-control"
								id="inpadress"
								name="adress"
								onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)"
							/>
						</div>
                    </div>
                    <div class="col-sm-6">
						<div class="form-group">
							<label for="inpschool" class="control-label">City:</label>
							<input
								type="text"
								class="form-control"
								id="inpcity"
								name="city"
								onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)"
							/>
						</div>
                    </div>
                    <div class="col-sm-6">
						<div class="form-group">
							<label for="inpschool" class="control-label">State:</label>
							<input
								type="text"
								class="form-control"
								id="inpstate"
								name="state"
								onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)"
							/>
						</div>
					</div>
				
					
                    
                    <div class="col-sm-6">
						<div class="form-group">
							<label for="inpquan">Quantity:</label>
							<input
								type="number"
								class="form-control"
								id="inpquan"
								name="quantity"
								required
							/>
						</div>
                    </div>
                    <div class="col-sm-6">
						<div class="form-group">
                            <label for="inpam">Amount of 1 item:</label>
                            
                            <input
                            
								type="text"
								class="form-control"
								id="inpam"
								name="amount"
                                required value="<?php echo $get_product['0']['price']?>"
                                disabled="disabled"
                                
							/>
						</div>
                    </div>
                    <div class="col-sm-6">
						<div class="form-group">
							<label for="inpquan">Pay Using:</label>
                            <select id="selectpay" name="payment" class="form-control" required>
                                <option>PayTM</option>
                                <option>Google Pay</option>
                                <option>UPI ID</option>
                                <option>Phone Pay</option>
                            </select>
                        
						</div>
                    </div>
                    
                    <div class="col-sm-12">
						<div class="form-group">
							<label>Scan any of the QR Code:</label>
                            <ul style="list-style:none" >
                                <li class="col-sm-4"><img src="img/qr1.jpeg" height="440px" width="320px"></li>
                                <li class="col-sm-4"><img src="img/qr3.jpeg" height="440px" width="320px"></li>
                                <li class="col-sm-4"><img src="img/qr2.jpeg" height="440px" width="320px"></li>
                            </ul>
                        
						</div>
                    </div>

                    <div class="col-sm-12">
						<div class="form-group">
							<label for="inpquan">Upload Screenshot after payment:</label>
                            <input type="file"
                            
                            name="image"
                            class="form-control"
                            required
                            >

                        
						</div>
                    </div>
                    <div id="button" class="col-sm-12">
                        <input type="Submit" class="btn btn-primary" name="submit"/>                        
                    </div>
			</form>
		</div>
		
    </body>
</html>
