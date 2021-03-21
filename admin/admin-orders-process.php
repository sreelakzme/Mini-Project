<?php
include("dbconnect.php");
session_start();
$aid=$_SESSION['sessid'];
if (isset($_POST['order-update']))
{

$orderid=$_GET['orderid'];
$newstatus=$_POST['orderstatus'];

$sql="update orders set status='$newstatus' where oid='$orderid'";

mysql_query($sql);

}
header("location:admin-orders.php");
?>
