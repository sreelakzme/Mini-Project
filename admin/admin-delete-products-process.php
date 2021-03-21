<?php
include("dbconnect.php");
if (isset($_POST['deletebutton']))
{
$productid=$_GET['pid'];
$sql="delete from products where pid='$productid'";
mysql_query($sql);

header("location:admin-products.php");

}
?>
