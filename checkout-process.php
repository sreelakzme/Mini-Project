<?php
session_start();

include("dbconnect.php");
$pid=$_SESSION['pid'];
 $qq="select * from products where pid='$pid'";
$ww=mysql_query($qq);
$fet=mysql_fetch_array($ww);

$categoryname=$fet['categoryname'];
$m=date("M");
$y=date("Y");
$date=date("d-m-y");
if (isset($_POST['orderprocess']))
{
$userid=$_GET['userid'];
$paymentmode=$_POST['payment'];
$shippingmethod=$_POST['shipping'];
$orname=$_POST['orname'];
$oremail=$_POST['oremail'];
$orphone=$_POST['orphone'];
echo $oraddress=$_POST['oraddress'];
$orstate=$_POST['orstate'];
$orzipcode=$_POST['orzipcode'];
$status="Processing";
$getdatetime=date('y-m-d h:i:s');
if($shippingmethod=='Express Shipping')
{
$carttotal=$_GET['displaytotal']+250;
}
else
{
$carttotal=$_GET['displaytotal'];
}
$sql="insert into orders(uid,carttotal,paymentmode,shippingmethod,orname,oremail,orphone,oraddress,orstate,orzipcode,status,date)
values('$userid','$carttotal','$paymentmode','$shippingmethod','$orname','$oremail','$orphone','$oraddress','$orstate','$orzipcode','$status','$getdatetime')";

mysql_query($sql);

$sql1="insert into report(prod_id,category,month,year,date,price)values('$pid','$categoryname','$m','$y','$date','$carttotal')";

mysql_query($sql1);



header("location:order-summary.php");

}
?>