<?php
include("dbconnect.php");
session_start();
$aid=$_SESSION['sessid'];
if (isset($_POST['update']))
{

$name=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];

$sql="update admin set name='$name',username='$username',password='$password' where aid='$aid'";

mysql_query($sql);

}
header("location:admin-edit-profile.php");
?>
