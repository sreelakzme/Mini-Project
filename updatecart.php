<?php
include("dbconnect.php");
if (isset($_POST['cartupdatebutton']))
{
$cartid=$_GET['ctid'];
$newquantity=$_POST['quantity'];
if ($newquantity>0)
{
$sql1="select baseprice from cart where ctid='$cartid'";
$exe=mysql_query($sql1);
$fetch=mysql_fetch_array($exe);
$price=$fetch['baseprice'];
$subtotal=$price * $newquantity;
$sql="update cart set qty='$newquantity',subtotal='$subtotal' where ctid='$cartid'";
mysql_query($sql);

header("location:cart.php");
}
else
{
$newquantity="Minimum Quantity should be 1";
header("location:cart.php?newquantity=$newquantity");
}
}
?>
