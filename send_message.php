<?php
require('connection.inc.php');
require('functions.inc.php');
$name=get_safe_value($con,$_POST['name']);
$email=get_safe_value($con,$_POST['email']);
$mobile=get_safe_value($con,$_POST['mobile']);
$comment=get_safe_value($con,$_POST['message']);
$added_on=date('Y-m-d h:i:s');
$body = "<h4>Name:".$name."<br>Email: ".$email."<br>Mobile:".$mobile."<br>Comment".$comment."</h4>";
$url = 'https://smartmenu.pythonanywhere.com/mail?from=noreply.jumblejuggle@gmail.com&to='.$email.'&subject=Message from giftagrin&body=You got some message&html='.$body;
$url2 = 'https://smartmenu.pythonanywhere.com/mail?from=noreply.jumblejuggle@gmail.com&to=mynkgpt16@gmail.com&subject=Message from giftagrin&body=You got some message&html='.$body;

mysqli_query($con,"insert into contact_us(name,email,mobile,comment,added_on) values('$name','$email','$mobile','$comment','$added_on')");
echo "Thank you";
?>
