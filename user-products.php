<?php
session_start();
$uid=$_SESSION['sessid'];
if(!$uid)
{
header("location:user-login.php");
}
?>
<?php
if(isset($_GET['quantity']))
{
?><script type="text/javascript">
alert("<?php echo $_GET['quantity']; ?>");
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
    
<h2 style="color:#000000;text-align:center;">Our Products</h2>
<form method="POST" action="" name="filterproducts" style="width:400px;margin-left:auto;margin-right:auto;">

<select  name="filtercategories" class="formfield" style="width:180px;"><option value="All Products">All Products</option>
<option value="Banarasi Silk">Banarasi Silk</option>
<option value="Tussar Weaving">Tussar Weaving</option>
<option value="Organza">Organza</option>
<option value="Georgette saree">Georgette saree</option>

<input type="submit" class="formbutton" value="Show" name="filter">
</form>

<ul class="product-grid">
<?php 
include("dbconnect.php");

if (isset($_POST['filter']))
{
$filtercategory=$_POST['filtercategories'];
if($filtercategory=='All Products')
{
 $sql="select * from products";
$exe=mysql_query($sql);
  while($fetch=mysql_fetch_array($exe))
  {
  ?><li><form action="add-to-cart-process.php?pid=<?php echo $fetch['pid'] ?>" method="POST" name="addtocart"><p style="text-align:center;font-size:18px;"><?php echo $fetch['name']?></p><p style="text-align:center;"><a href="pro.php"><a href="profirst.php?pid=<?php echo $fetch['categoryname']?>"><img src="images/<?php echo $fetch['photo']?>" width="100px" height="100px" class="productzoom"></a></p><p style="text-align:center;font-size:16px;"><?php echo $fetch['description']?></p><p style="text-align:center;font-size:16px;color:#ce0000;">Rs. <?php echo $fetch['price']?></p><p style="text-align:center;font-size:16px;"><input type="text" style="width:30px;height:30px;text-align:center;" name="quantity" value="1"></p><p style="text-align:center;font-size:18px;"><button style="border:0;background:#ffffff;" type="submit" name="addtocart" id="addtocart" ><img src="images/addtocartsmall.png"></button></p></form></li><?php
  }
		
}
	else
{
$sql="select * from products where categoryname='$filtercategory'";
$exe=mysql_query($sql);
$count=mysql_num_rows($exe);
if($count==0)
{
echo "<b>No Products available in Selected Category</b>";
}
else
{
  while($fetch=mysql_fetch_array($exe))
  {
  ?><li><form action="add-to-cart-process.php?pid=<?php echo $fetch['pid'] ?>" method="POST" name="addtocart"><p style="text-align:center;font-size:18px;"><?php echo $fetch['name']?></p><p style="text-align:center;"><a href="profirst.php?pid=<?php echo $fetch['categoryname']?>"><img src="images/<?php echo $fetch['photo']?>" width="100px" height="100px" class="productzoom"></a></p><p style="text-align:center;font-size:16px;"><?php echo $fetch['description']?></p><p style="text-align:center;font-size:16px;color:#ce0000;">Rs. <?php echo $fetch['price']?></p><p style="text-align:center;font-size:16px;"><input type="text" style="width:30px;height:30px;text-align:center;" name="quantity" value="1"></p><p style="text-align:center;font-size:18px;"><button style="border:0;background:#ffffff;" type="submit" name="addtocart" id="addtocart" ><img src="images/addtocartsmall.png"></button></p></form></li><?php
  }
}
}}
else
{
	
	
$sql="select * from products";
$exe=mysql_query($sql);

  while($fetch=mysql_fetch_array($exe))
  {
  ?><li><form action="add-to-cart-process.php?pid=<?php echo $fetch['pid'] ?>" method="POST" name="addtocart"><p style="text-align:center;font-size:18px;"><?php echo $fetch['name']?></p><p style="text-align:center;"><a href="profirst.php?pid=<?php echo $fetch['categoryname']?>"><img src="images/<?php echo $fetch['photo']?>" width="100px" height="100px" class="productzoom"></a></p><p style="text-align:center;font-size:16px;"><?php echo $fetch['description']?></p><p style="text-align:center;font-size:16px;color:#ce0000;">Rs. <?php echo $fetch['price']?></p><p style="text-align:center;font-size:16px;"><input type="text" style="width:30px;height:30px;text-align:center;" name="quantity" value="1"></p><p style="text-align:center;font-size:18px;"><button style="border:0;background:#ffffff;" type="submit" name="addtocart" id="addtocart" ><img src="images/addtocartsmall.png"></button></p></form></li><?php
  }

}
  ?>
</ul>

    </div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>