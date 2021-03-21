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
$sql="select * from orders";
$exe=mysql_query($sql);
?>

<html>
<body>
<head><meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
   <script src="js/jquery.js" type="text/javascript"></script>
   <title>Banarasiya Administration Panel</title></head>
<body><div class="container">
<div id="header"><?php include('header3.php'); ?></div>

<div id="content">
    
  <h2>Orders</h2>
<table align="center" style="border:1px solid #cccccc;width:95%;height:auto;cellpadding:15;cellspacing:0;text-align:center;font-size:14px;">
<tr style="background:#339ef4;height:40px;">
    <td><b>Order ID</b></td>
    <td><b>User ID</b></td>
    <td><b>Cart Total</b></td>
    <td><b>Payment Mode</b></td>
    <td><b>Shipping Method</b></td>
    <td><b>Order Status</b></td>
    <td></td>
</tr>

  <?php 
  while($fetch=mysql_fetch_array($exe))
  {
  ?><form method="POST" name="adminorders" action="admin-orders-process.php?orderid=<?php echo $fetch['oid']?>">
 <tr style="height:40px;">
    <td><?php echo $fetch['oid']?></td>
    <td><?php echo $fetch['uid']?></td>
    <td><?php echo $fetch['carttotal']?></td>
    <td><?php echo $fetch['paymentmode']?></td>
    <td><?php echo $fetch['shippingmethod']?></td>
    <td><select name="orderstatus" class="formfield" style="height:30px;width:150px;font-size:14px;"><option><?php echo $fetch['status']?>
<option value="Processing">Processing</option>
<option value="Confirmed">Confirmed</option>
<option value="Dispatched">Dispatched</option>
<option value="Completed">Completed</option>
<option value="Cancelled">Cancelled</option>
</option>
</select>

<input type="submit" class="formbutton" style="height:30px;font-size:14px;" value="Update Status" name="order-update"></td>
<td><a href="admin-order-summary.php?orderid=<?php echo $fetch['oid']?>">View Details</a></td>
    </tr></form>
  <?php
  }
  ?>
</table>
</div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>