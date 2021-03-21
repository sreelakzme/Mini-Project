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
$sql="select * from admin where aid='$aid'";
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
<div id="header"><?php include('header3.php'); ?></div>

<div id="content">
    
  <h2>Edit Profile</h2>
<form method="POST" action="admin-edit-profile-process.php" name="admineditprofile">
<table style="border:0;width:50%;height:auto;cellpadding:15;cellspacing:0;font-size:16px;">
  <?php 
  while($fetch=mysql_fetch_array($exe))
  {
  ?>
  <tr><td>Name:</td><td><input class="formfield" type="text" name="name" value="<?php echo $fetch['name']?>" name="name"></td></tr>
  <tr><td>Username:</td><td><input class="formfield" type="text" name="username" value="<?php echo $fetch['username']?>"></td></tr>
  <tr><td>Password:</td><td><input class="formfield" type="password" name="password" value="<?php echo $fetch['password']?>"></td></tr>
  
  <?php
  }
  ?>
</table><p></p>
<input type="submit" value="Update" name="update" id="update" class="formbutton">&nbsp;&nbsp;&nbsp;<input type="reset" value="Cancel" class="formbutton">
</form>
    </div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>