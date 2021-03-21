<?php
session_start();
$aid=$_SESSION['sessid'];
if(!$aid)
{
header("location:admin-login.php");
}
?>

<html>
<body>
<head><meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
   <script src="js/jquery.js" type="text/javascript"></script>
   <title>Banarasiya Administration Panel</title>

<script type="text/javascript">
function valid()
{
	if(document.addproduct.name.value=="")
	{
		alert("Please enter Product Name");
		document.addproduct.name.focus();
		return false;
	}
	else if(document.addproduct.description.value=="")
	{
		alert("Please enter Product Description");
		document.addproduct.description.focus();
		return false;
	}
        else if(document.addproduct.categories.value=="")
	{
		alert("Please select Product Category");
		document.addproduct.categories.focus();
		return false;
	}
        else if(document.addproduct.price.value=="")
	{
		alert("Please enter Product Price");
		document.addproduct.price.focus();
		return false;
	}
       
        else if(document.addproduct.photo.value=="")
	{
		alert("Please upload Photo");
		document.addproduct.photo.focus();
		return false;
	}
	else
	{
   alert("Product Created Successfully");		
   return true;
                
	}
}
</script>

</head>
<body><div class="container">
<div id="header"><?php include('header3.php'); ?></div>

<div id="content">
    
  <h2>Add New Product</h2>
<form name="addproduct" action="admin-add-products-process.php" enctype="multipart/form-data" method="POST">
    <table width="80%" border="0" cellpadding:"20" cellspacing="0">
   <tr>
    <td>Name</td>
    <td><input class="formfield" name="name" type="text"></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea class="formfield" name="description" id="textarea" cols="24" rows="5"></textarea></td>
  </tr>
  
  <tr>
    <td>Select Category</td>
    <td><select class="formfield" name="categories">
<option value="Banarasi Silk">Banarasi Silk</option>
<option value="Tussar Weaving">Tussar Weaving</option>
<option value="Organza">Organza</option>
<option value="Georgette saree">Georgette saree</option>

        </select></td>
  </tr>
<tr>
    <td>Price</td>
    <td><input class="formfield" name="price" type="text"></td>
  </tr>

   <tr>
    <td>Photo</td>
    <td><br><input type="file" name="photo" id="fileField" /></td>
  </tr>
  <tr>
    <td>Full View</td>
    <td><br><input type="file" name="lphoto" id="fileField" /></td>
  </tr>
  
  <tr>
    <td></td>
    <td><br><input class="formbutton" type="submit" name="addbutton" value="Add Product" onClick="return valid()">
&nbsp;&nbsp;&nbsp;<input class="formbutton" type="reset" name="clearbutton" value="Clear"></td>
  </tr>
</table>

    </form> 

</div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>