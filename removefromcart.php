<?php
include("dbconnect.php");
if (isset($_POST['removefromcart']))
{
$cartid=$_GET['ctid'];
$sql="delete from cart where ctid='$cartid'";
mysql_query($sql);

header("location:cart.php");

}
?>
