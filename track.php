<?php
require('connection.inc.php');
if(isset($_COOKIE['visit']))
{

}
else{
    setcookie('visit','yes',time()+(60*60*24*30));
    mysqli_query($con,"update count set total_count=total_count+1");
}