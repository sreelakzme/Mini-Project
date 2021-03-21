<?php
include("dbconnect.php");
session_start();
$uid=$_SESSION['sessid'];
$pid=$_GET['pid'];
$sql="SELECT * from products WHERE pid='$pid'";  
$exe=mysql_query($sql);
$fetch=mysql_fetch_array($exe);
$stock=$fetch['stock'];
$price=$fetch['price'];
//$stock=$fetch['stock'];
if (isset($_POST['addtocart']))
{
$qty=$_POST['quantity'];
$qty1=$stock-$qty;
$subtotal=$price*$qty;
$sql="insert into cart(uid,pid,baseprice,qty,subtotal)
values('$uid','$pid','$price','$qty','$subtotal')";

mysql_query($sql);
$sql1="update products set stock='$qty1' where pid='$pid'";

mysql_query($sql1);

//$newstock=$stock-$qty;

//$sql2="update products set stock='$newstock' where pid='$pid'";

//mysql_query($sql2);

header("location:cart.php");
}


?>