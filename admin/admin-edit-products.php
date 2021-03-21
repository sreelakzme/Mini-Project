<?php
session_start();
$aid=$_SESSION['sessid'];
if(!$aid)
{
header("location:admin-login.php");
}
?>

<?php
$pid=$_GET['pid'];
include("dbconnect.php");
$sql="select * from products where pid='$pid'";
$exe=mysql_query($sql);
$fetch=mysql_fetch_array($exe);
?>
<html>
<body>
<head><meta charset='utf-8'>
  
   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
   <script src="js/jquery.js" type="text/javascript"></script>
   <title>Banarasiya</title></head>
<body><div class="container">
<div id="header"><?php include('header3.php'); ?></div>

<div id="content">
    
  <h2>Edit Products</h2>
<form method="POST" action="admin-edit-products-process.php" enctype="multipart/form-data" name="admineditproducts">
<table style="border:0;width:80%;height:auto;cellpadding:20;cellspacing:0;align:center;font-size:16px;">
  
  <tr><td>Name:</td><td><input class="formfield" type="text" name="name" value="<?php echo $fetch['name']?>" name="name"></td></tr>
  <tr><td>Description:</td><td><textarea class="formfield" name="description" id="textarea" cols="24" rows="5"><?php echo $fetch['description']?></textarea></td></tr>
  <tr><td>Category:</td><td><select class="formfield" name="categories"><option><?php echo $fetch['categoryname']?></option>
<option value="Banarasi Silk">Banarasi Silk</option>
<option value="Tussar Weaving">Tussar Weaving</option>
<option value="Organza">Organza</option>
<option value="Georgette saree">Georgette saree</option>
        </select></td></tr>
  <tr><td>Price:</td><td><input class="formfield" type="text" name="price" value="<?php echo $fetch['price']?>"></td></tr>
    <tr><td>Photo:</td><td><img src="images/<?php echo $fetch['photo']?>" height="100px" width="100px"><br>
    <input type="file" name="photo" id="fileField" value="<?php echo $fetch['photo']?>">
<input class="formfield" type="hidden" name="hiddenfield" value="<?php echo $pid; ?>">
</td></tr>
 <tr><td>Full View</td><td><img src="picture/<?php echo $fetch['fullview']?>"><br>
 <input type="file" name="lphoto" id="fileField" value="<?php echo $fetch['lphoto']?>"></td></tr>

<tr><td></td>
<td><input type="submit" value="Update" name="updatebutton" id="updatebutton" class="formbutton">&nbsp;&nbsp;&nbsp;<input type="reset" value="Cancel" class="formbutton"></td></tr>
</table></form>
    </div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>