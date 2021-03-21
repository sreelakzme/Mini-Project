<?php
session_start();
$aid=$_SESSION['sessid'];
if(!$aid)
{
header("location:admin-login.php");
}
?>
<?php
include("dbconnect.php");
$orderid=$_GET['orderid'];
$sql="select * from orders where oid='$orderid'";
$exe=mysql_query($sql);
$fetch=mysql_fetch_array($exe);
$formatdate=explode(" ",$fetch['date']); 
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
<div id="header"><?php include('header3.php'); ?></div>

<div id="content">
    
  <h3>Order Details</h3>

<table align="left" style="width:50%;height:auto;cellpadding:10;cellspacing:0;text-align:justify;font-size:16px;border:0;">
  <tr><td>Order ID:</td><td><?php echo $fetch['oid']?></td></tr>
  <tr><td>Order Date:</td><td><?php echo $formatdate[0]; ?></td></tr>
  <tr><td>Grand Total:</td><td>Rs. <?php echo $fetch['carttotal']?></td></tr>
  <tr><td>Payment Mode:</td><td><?php echo $fetch['paymentmode']?></td></tr> 
  <tr><td>Shipping Method:</td><td><?php echo $fetch['shippingmethod']?></td></tr> 
</table><br><br><br><br><br><br><br><br><hr color="#fffff" width="100%">
 <p style="text-align:justify;font-size:22px;">Shipping Address:</p>

   
   <p style="text-align:justify;font-size:16px;">Address: <?php echo $fetch['oraddress']?></p>
   <p style="text-align:justify;font-size:16px;">State: <?php echo $fetch['orstate']?> - <?php echo $fetch['orzipcode']?></p>
   <p style="text-align:justify;font-size:16px;">Phone: <?php echo $fetch['orphone']?></p>
   <p style="text-align:justify;font-size:16px;">Email: <?php echo $fetch['oremail']?></p>


</div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>