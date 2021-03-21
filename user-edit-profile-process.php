<?php
include("dbconnect.php");
session_start();
$uid=$_SESSION['sessid'];
if (isset($_POST['update']))
{

$name=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$zipcode=$_POST['zipcode'];
$state=$_POST['state'];

$sql="update users set name='$name',username='$username',password='$password',email='$email',phone='$phone',address='$address',zipcode='$zipcode',state='$state' where uid='$uid'";

mysql_query($sql);

}
header("location:user-edit-profile.php");
?>
