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
if (isset($_POST['proceedcheckout']))
{
$displaytotal=$_GET['total'];
$sql="select * from users where uid='$uid'";
$exe=mysql_query($sql);
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

<script type="text/javascript">
function validcheckout()
{
	if(document.checkout.shipping.value=="")
	{
		alert("Please select a Shipping Method");
		document.checkout.shipping[0].focus();
		return false;
	}
	else if(document.checkout.payment.value=="")
	{
		alert("Please choose your Payment Preference");
		document.checkout.payment[0].focus();
		return false;
	}
	else
	{
     return true;
                
	}
}
</script>


</head>
<body><div class="container">
<div id="header"><?php include('header2.php'); ?></div>

<div id="content">
    
<h2>Checkout</h2><p></p><p></p>
<h3 style="font-family:"Verdana",Geneva,Sans-Serif;color:#339ef4;">Cart Total: Rs. <?php echo $displaytotal; ?></h3><p></p>
<h3 style="font-family:"Verdana",Geneva,Sans-Serif;">Shipping Address:</h3>
<form method="POST" action="checkout-process.php?displaytotal=<?php echo $displaytotal; ?>&userid=<?php echo $uid; ?>" name="checkout">
<table style="border:0;width:70%;height:auto;cellpadding:15;cellspacing:0;font-size:16px;">
  <?php 
  while($fetch=mysql_fetch_array($exe))
  {
  ?>
  <tr><td>Name:</td><td><input type="text" name="orname" value="<?php echo $fetch['username']?>" class="formfield"></td>
  <td>Email ID:</td><td><input type="text" name="oremail" value="<?php echo $fetch['email']?>" class="formfield"></td></tr>
  <tr><td>Phone No:</td><td><input type="text" name="orphone" value="<?php echo $fetch['phone']?>" class="formfield"></td>
  <td>Address:</td><td><textarea name="oraddress" cols="16" rows="4" class="formfield"><?php echo $fetch['address']?></textarea></td></tr>
  <tr><td>State:</td><td><select name="orstate" class="formfield"><option><?php echo $fetch['state']?></option>

<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>

</select>

</td>
<td>Zipcode:</td><td><input name="orzipcode" type="text" value="<?php echo $fetch['zipcode']?>" class="formfield"></td>
</tr>
  
  <?php
  }
  ?>
</table><p></p>

<h3 style="font-family:"Verdana",Geneva,Sans-Serif;">Shipping Preference</h3>
<input type="radio" name="shipping" value="Free Shipping">Free Shipping&nbsp;&nbsp;
<input type="radio" name="shipping" value="Express Shipping">Express Shipping (Rs. 250)
<p></p>

<h3 style="font-family:"Verdana",Geneva,Sans-Serif;">Select Payment Option</h3>
<input type="radio" name="payment" value="Credit Card">Credit Card&nbsp;&nbsp;
<input type="radio" name="payment" value="Internet Banking">Internet Banking&nbsp;&nbsp;
<input type="radio" name="payment" value="Cash on Delivery">Cash on Delivery
<p></p><input type="submit" value="Confirm Order" name="orderprocess" class="formbutton" onClick="return validcheckout()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Cancel Order" name="ordercancel" class="formbutton" onClick="url('cart.php')">
</form>
    </div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>