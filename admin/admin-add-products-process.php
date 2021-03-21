<?php
include("dbconnect.php");
if (isset($_POST['addbutton']))
{
$name=$_POST['name'];
$description=$_POST['description'];
$categories=$_POST['categories'];
$price=$_POST['price'];
$photo=$_FILES['photo']['name'];
move_uploaded_file($_FILES['photo']['tmp_name'],"images/".$photo);
$lphoto=$_FILES['lphoto']['name'];
move_uploaded_file($_FILES['lphoto']['tmp_name'],"picture/".$lphoto);



 $sql="insert into products(name,description,categoryname,price,photo,fullview)
values('$name','$description','$categories','$price','$photo','$lphoto')";

mysql_query($sql);

header("location:admin-products.php");

}
?>
