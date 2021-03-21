<?php
include("dbconnect.php");
if (isset($_POST['regbutton']))
{
$uid=$_POST['uid'];
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$zipcode=$_POST['zipcode'];
$state=$_POST['state'];

$sql="insert into users(uid,username,password,email,phone,address,zipcode,state)
values('uid','$username','$password','$email','$phone','$address','$zipcode','$state')";

mysql_query($sql);

header("location:index.php");

}
?>