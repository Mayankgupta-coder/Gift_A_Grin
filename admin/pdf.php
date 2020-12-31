<?Php
require('fpdf.php');
require('connection.php');
require('functions.php');
if(isset($_GET['id']) && $_GET['id']!=''){
$id=$_GET['id'];
$sql="select * from buyers_info where id=$id";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$img='payments/product/'.$row['image'];
$pdf = new FPDF(); 
$pdf->AddPage();
$pdf->Image($img,0,0);
$pdf->Output();
}
elseif(isset($_GET['sell_id']) && $_GET['sell_id']!=''){
    $id=$_GET['sell_id'];
    $sql="select * from selling_info where id=$id";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
    $img=$row['image'];
    $pdf = new FPDF(); 
    $pdf->AddPage();
    $pdf->Image($img,0,0);
    $pdf->Output();
}
?>