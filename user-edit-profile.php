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
$sql="select * from users where uid='$uid'";
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
    
  <h2>Edit Profile</h2>
<form method="POST" action="user-edit-profile-process.php" name="editprofile">
<table style="border:0;width:70%;height:auto;cellpadding:15;cellspacing:0;align:center;font-size:16px;">
  <?php 
  while($fetch=mysql_fetch_array($exe))
  {
  ?>
  
  <tr><td>Username:</td><td><input type="text" class="formfield" name="username" value="<?php echo $fetch['username']?>"></td></tr>
  <tr><td>Password:</td><td><input type="password" class="formfield" name="password" value="<?php echo $fetch['password']?>"></td></tr>
  <tr><td>Email:</td><td><input type="text" class="formfield" name="email" value="<?php echo $fetch['email']?>"></td></tr>
  <tr><td>Phone:</td><td><input type="text" class="formfield" name="phone" value="<?php echo $fetch['phone']?>"></td></tr>
  <tr><td>Address:</td><td><textarea name="address" class="formfield" cols="16" rows="4"><?php echo $fetch['address']?></textarea></td></tr>
  <tr><td>Zipcode:</td><td><input name="zipcode" class="formfield" type="text" value="<?php echo $fetch['zipcode']?>"></td></tr>
  <tr><td>State:</td><td><select name="state" class="formfield"><option><?php echo $fetch['state']?></option>

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

</td></tr>
  
  <?php
  }
  ?>
</table><p></p>
<input type="submit" value="Update" class="formbutton" name="update" id="update">&nbsp;&nbsp;&nbsp;<input type="reset" class="formbutton" value="Cancel">
</form>
    </div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>