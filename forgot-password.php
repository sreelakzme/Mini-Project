<html>
<body>
<head><meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
   <script src="js/jquery.js" type="text/javascript"></script>
   <title>Banarasiya</title></head>
<body><div class="container">
<div id="header"><?php include('header1.php'); ?></div>

    <div id="content">
    
    <form action="" method="POST" name="forgotpassword"><table border="0" width="50%" cellspacing="0" cellpadding="1">
<tr><td>Enter Username:</td><td><input class="formfield" type="text" name="username"></td></tr></table>
<input class="formbutton" style="margin-left:200px;" type="submit" value="Show Password" name="forgotpassword">
</form>
<?php
include("dbconnect.php");
if(isset($_POST['forgotpassword']))
{
$username=$_POST['username'];
$sql="select password from users where username='$username'";
$exe=mysql_query($sql);
$fetch=mysql_fetch_array($exe);
$count=mysql_num_rows($exe);
if($count==1)
{
echo "Your Password is ".$fetch['password'];
}

else
{
echo "Username not found";
}
}
?>
    </div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>