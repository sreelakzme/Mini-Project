<?php
session_start();
$uid=$_SESSION['sessid'];
if(!$uid)
{
header("location:user-login.php");
}
?>

<?php
include("dbconnect.php");
$sql="select * from orders where uid='$uid'";
$exe=mysql_query($sql);

?>
<html>
<body>
<head><meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
   <script src="js/jquery.js" type="text/javascript"></script>
   <title>Banarasiya</title></head>
<body><div class="container">
<div id="header"><?php include('header2.php'); ?></div>

<div id="content">
    
  <h2>Order History</h2>
<table align="center" style="border:1px solid #cccccc;width:90%;height:auto;cellpadding:15;cellspacing:0;text-align:center;font-size:16px;">

<tr style="background:#339ef4;height:40px;">
    <td><b>Order ID</b></td>
    <td><b>Date</b></td>
    <td><b>Cart Total</b></td>
    <td><b>Payment Mode</b></td>
    <td><b>Shipping Method</b></td>
    <td><b>Order Status</b></td>
</tr>  

  <?php 
  while($fetch=mysql_fetch_array($exe))
  {
  ?>
  <tr style="height:40px;">
<td><?php echo $fetch['oid']?></td>
<td><?php $formatdate=explode(" ",$fetch['date']); echo $formatdate[0]; ?></td>
<td><?php echo $fetch['carttotal']?></td>
<td><?php echo $fetch['paymentmode']?></td>
<td><?php echo $fetch['shippingmethod']?></td>
<td><?php echo $fetch['status']?></td>
</tr>
  
  <?php
  }
  ?>
</table><p></p>

    </div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>