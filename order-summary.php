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
$sql="select * from orders where uid='$uid' ORDER BY oid DESC LIMIT 1";
$exe=mysql_query($sql);
$fetch=mysql_fetch_array($exe);

$sql2="select * from users where uid='$uid'";
$exe2=mysql_query($sql2);
$fetchuser=mysql_fetch_array($exe2);

$sql3="delete from cart where uid='$uid'";
mysql_query($sql3);

?>
<html>
<body>
<head><meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
   <script src="js/jquery.js" type="text/javascript"></script>
   <title>Banarasiya</title></head>
   <script>
   function printing()
   {
	   window.print();
   }
   </script>
<body><div class="container">
<div id="header"><?php include('header2.php'); ?></div>

<div id="content">
    
  <h3>Your Order is Confirmed</h3>

<table align="left" style="width:30%;height:auto;cellpadding:10;cellspacing:0;text-align:justify;font-size:16px;border:0;">
  <tr><td>Order ID:</td><td><?php echo $fetch['oid']?></td></tr>
  <tr><td>Grand Total:</td><td>Rs. <?php echo $fetch['carttotal']?></td></tr>
  <tr><td>Payment Mode:</td><td><?php echo $fetch['paymentmode']?></td></tr> 
  <tr><td>Shipping:</td><td><?php echo $fetch['shippingmethod']?></td></tr> 
</table><br><br><br><br><br><br>

 <p style="text-align:justify;font-size:22px;">Shipping Address:</p>

   <p style="text-align:justify;font-size:16px;">Name: <?php echo $fetch['orname']?></p>
   <p style="text-align:justify;font-size:16px;">Address: <?php echo $fetch['oraddress']?></p>
   <p style="text-align:justify;font-size:16px;">State: <?php echo $fetch['orstate']?> - <?php echo $fetch['orzipcode']?></p>
   <p style="text-align:justify;font-size:16px;">Phone: <?php echo $fetch['orphone']?></p>
   <p style="text-align:justify;font-size:16px;">Email: <?php echo $fetch['oremail']?>&ensp;&ensp;<input type="submit" value="Click Here To print Your Bill" name="orderprocess" class="formbutton" onClick="return printing()" width="300px	"></p>
  
 <p style="text-align:justify;font-size:18px;">You can track your order status by <a href="user-orders.php?id=<?php echo $fetch['uid']?>">clicking here</a></p>

</div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>