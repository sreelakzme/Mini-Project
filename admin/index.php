<html>
<body>
<head><meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
   <script src="js/jquery.js" type="text/javascript"></script>
   <title>Banarasiya Administration Panel</title></head>
<body><div class="container">
<div id="header">
  <?php include('header1.php'); ?>
</div>

    <div id="content">
    
    <form action="" method="POST" name="adminlogin"><table border="0" width="50%" cellspacing="0" cellpadding="1">
<tr><td>Enter Username:</td><td><input class="formfield" type="text" name="username"></td></tr>
<tr><td>Enter Password:</td><td><input class="formfield" type="password" name="password"></td></tr></table>
<input class="formbutton" style="margin-left:200px;" type="submit" value="Login" name="login">
</form><br><br>
<?php
include("dbconnect.php");
if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];
session_start();
$sql="select AID from admin where username='$username' && password='$password'";
$exe=mysql_query($sql);
$fetch=mysql_fetch_array($exe);
$count=mysql_num_rows($exe);
if($count==1)
{
	$_SESSION['sessid']=$fetch['AID'];
	header("location:admin-home.php");
}

else
{
echo "Incorrect Username or Password";
}
}
?>
    </div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>