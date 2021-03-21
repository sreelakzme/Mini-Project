<?php
session_start();
include("dbconnect.php");
$id=$_GET['id'];
$sql="select * from contact where id='$id'";
$exe=mysql_query($sql);
$fetch=mysql_fetch_array($exe);
$name=$fetch['name'];
$email=$fetch['email'];
$pass=$fetch['password'];
$sql1="insert into admin (name,username,password) values ('$name','$email','$pass')";
$sql2="update contact set status=1 where id='$id'";
mysql_query($sql1);
mysql_query($sql2);
header("location:message.php");