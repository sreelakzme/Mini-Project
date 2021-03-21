<?php
include("dbconnect.php");
if (isset($_POST['updatebutton']))
{
$getproductid=$_POST['hiddenfield'];
$name=$_POST['name'];
$description=$_POST['description'];
$categories=$_POST['categories'];
$price=$_POST['price'];
$photo=$_FILES['photo']['name'];
move_uploaded_file($_FILES['photo']['tmp_name'],"images/".$photo);
$lphoto=$_FILES['lphoto']['name'];
move_uploaded_file($_FILES['photo']['tmp_name'],"images/".$lphoto);
$rphoto=$_FILES['rphoto']['name'];
move_uploaded_file($_FILES['photo']['tmp_name'],"images/".$rphoto);
if(empty($_FILES['photo']['name']))
{
$sql="update products set name='$name',description='$description',categoryname='$categories',price='$price' where pid='$getproductid'";
mysql_query($sql);
}

else
{
$sql2="update products set name='$name',description='$description',categoryname='$categories',price='$price',photo='$photo' where pid='$getproductid'";
mysql_query($sql2);
}
header("location:admin-products.php");

}
?>
