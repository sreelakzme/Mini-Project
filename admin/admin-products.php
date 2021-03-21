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
$sql="select * from products";
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
    
  <h2>Edit Products</h2>

<table align="center" style="border:1px solid #cccccc;width:98%;height:auto;cellpadding:15;cellspacing:0;font-size:16px;text-align:center;">
<tr style="background:#339ef4;height:40px;">
    <td>#ID</td>
    <td>Name</td>
    <td>Category</td>    
    <td>Price</td>
      <td></td>
    <td></td>
    <td></td>
  </tr> 

 <?php 
  while($fetch=mysql_fetch_array($exe))
  {
  ?>
  <tr>
    <td><?php echo $fetch['pid']?></td>
    <td><?php echo $fetch['name']?></td>
    <td><?php echo $fetch['categoryname']?></td>    
    <td>Rs. <?php echo $fetch['price']?></td>
    
    <td><img src="images/<?php echo $fetch['photo']?>" width="80px" height="80px" /></td>
    <td><a href="admin-edit-products.php?pid=<?php echo $fetch['pid'] ?>"><b>Edit Product</b></a></td>
    <td><form action="admin-delete-products-process.php?pid=<?php echo $fetch['pid'] ?>" method="POST" name="deleteproduct"><input type="submit" name="deletebutton" class="formbutton" value="Remove Product"></form></td>
  </tr>
  <?php
  }
  ?>
</table>

    </div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>