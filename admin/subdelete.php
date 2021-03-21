<?php
session_start();
 $name=$_GET['name'];
include("dbconnect.php");
 $sql="delete from admin where name='$name'";
 $sql1="update contact set status=0 where name='$name'";
mysql_query($sql);
mysql_query($sql1);
header("location:subadmin.php");