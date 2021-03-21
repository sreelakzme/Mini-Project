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
$sql="select p.*,c.* from products p,cart c where p.pid=c.pid AND c.uid='$uid'";
$exe=mysql_query($sql);
$total=0;

if(isset($_GET['newquantity']))
{
?><script type="text/javascript">
alert("<?php echo $_GET['newquantity']; ?>");
</script>

<?php
}
?>



<html>
<body>
<head><meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
   <script src="js/jquery.js" type="text/javascript"></script>
   <title>Banarasiya</title>

</head>
<body><div class="container">
<div id="header"><?php include('header2.php'); ?></div>

<div id="content">
    
  <h2 align="center">Your Cart</h2>
<?php
$count=mysql_num_rows($exe);
if($count==0)
{
echo "<b>No Products available in your cart. Why dont you add some?</b>";
}
else
{
?>
<table align="center" style="border:1px solid #339ef4;width:80%;height:auto;cellpadding:15;cellspacing:0;text-align:center;font-size:16px;">
  <tr>
    <th style="background:#339ef4;height:50px;"><b>Product ID</b></td>
    <th style="background:#339ef4;height:50px;"><b>Product Name</b></td>
    <th style="background:#339ef4;height:50px;"><b>Price</b></td>
    <th style="background:#339ef4;height:50px;"><b>Quantity</b></td>
    <th style="background:#339ef4;height:50px;"><b>Sub-total</b></td>
    <th style="background:#339ef4;height:50px;"></td>
  </tr>
  <?php 
  while($fetch=mysql_fetch_array($exe))
  {
  ?>
  <tr style="height:60px;">
    <td><?php echo $fetch['pid']?></td>
    <td><?php echo $fetch['name']?></td>
    <td><?php echo $fetch['price']?></td>
    <td><form action="updatecart.php?ctid=<?php echo $fetch['ctid'] ?>" method="POST" name="updatecart"><input class="formfield" style="width:40px;text-align:center;" type="text" name="quantity" value="<?php echo $fetch['qty']?>">&nbsp;<input class="formbutton" style="width:140px;" type="submit" name="cartupdatebutton" value="update"></form></td>
    <td><?php echo $fetch['subtotal']?></td>
    <td><form action="removefromcart.php?ctid=<?php echo $fetch['ctid'] ?>" method="POST" name="cartprocess">
    <input class="formfield" type="hidden" name="cartid" value="<?php echo $ctid; ?>">
    <button type="submit" class="removefromcart" name="removefromcart"><img src="images/remove.png" width="20px" height="20px"></button></form></td>
  </tr>
 
  <?php
 	  $total=$fetch['subtotal']+$total;
  }
  

  ?>  

 
</table>
<p></p><div style="text-align:justify;padding-left:900px;"><h4>Sub Total: Rs. <?php echo $total;?></h4></div><p></p>
<?php
$salestax=$total*0.14;
$grandtotal=$total+$salestax;
?>
<div style="text-align:justify;padding-left:900px;"><h4>VAT @ 14%: Rs. <?php echo $salestax;?></h4></div><p></p>
<div style="text-align:justify;padding-left:900px;"><h3>Grand Total: Rs. <?php echo $grandtotal;?></h3></div><p></p>
<form action="checkout.php?total=<?php echo $grandtotal; ?>" method="POST" name="cart" style="padding-left:880px;"><input type="submit" name="proceedcheckout" value="Proceed to Checkout" class="formbutton" style="width:250px;">

</form><?php
 	    }
  

  ?>  
    </div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>