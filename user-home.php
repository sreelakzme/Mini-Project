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
$sql="select * from products";
$exe=mysql_query($sql);
if(isset($_GET['quantity']))
{
?><script type="text/javascript">
alert("<?php echo $_GET['quantity']; ?>");
</script>

<?php
}
?>
<?php
$sql2="select * from users where uid='$uid'";
$exe2=mysql_query($sql2);
$fetchuser=mysql_fetch_array($exe2);
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
    
  <h4 style="color:#339ef4;">Welcome, <?php echo $fetchuser['username']?></h4><p></p>
<h2 style="color:#000000;text-align:center;">Our Products</h2>
<ul class="product-grid">
 <?php 
  while($fetch=mysql_fetch_array($exe))
  {
  ?><li><form action="add-to-cart-process.php?pid=<?php echo $fetch['pid'] ?>" method="POST" name="addtocart"><p style="text-align:center;font-size:18px;"><?php echo $fetch['name']?></p><p style="text-align:center;"><img src="images/<?php echo $fetch['photo']?>" width="100px" height="100px" class="productzoom"></p><p style="text-align:center;font-size:16px;"><?php echo $fetch['description']?></p><p style="text-align:center;font-size:16px;color:#ce0000;">Rs. <?php echo $fetch['price']?></p><p style="text-align:center;font-size:16px;"><input type="text" style="width:30px;height:30px;text-align:center;" name="quantity" value="1"></p><p style="text-align:center;font-size:18px;"><button style="border:0;background:#ffffff;" type="submit" name="addtocart" id="addtocart" ><img src="images/addtocartsmall.png"></button></p>

</form></li><?php
  }
  ?>
</ul>

    </div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>