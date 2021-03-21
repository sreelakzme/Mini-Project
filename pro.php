<?php
session_start();
include("dbconnect.php");
$pid=$_GET['pid'];

$uid=$_SESSION['sessid'];
if(!$uid)
{
header("location:user-login.php");
}
else
{
$sql="select * from products where pid='$pid'";
	$exe=mysql_query($sql);
	$fetch=mysql_fetch_array($exe);
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
<form action="add-to-cart-process.php?pid=<?php echo $fetch['pid'] ?>" method="POST" name="addtocart">
<p style="text-align:center;"><img src="picture/<?php echo $fetch['fullview']?>"></p>

<p style="text-align:center;"><?php echo $fetch['name']?></p>
<p style="text-align:center;"><?php echo $fetch['categoryname']?></p>
<p style="text-align:center;"><?php echo "Rs: ".$fetch['price'] ." /-"?></p>
<p style="text-align:center;font-size:18px;"><button style="border:0;background:#ffffff;" type="submit" name="addtocart" id="addtocart" ><img src="images/addtocartsmall.png"></button></p></form>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html><?php
}
?>