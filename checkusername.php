<?php
include("dbconnect.php");
$a=$_GET['q'];
if($a!="")
{
	$query="select * from users where username='$a'";
	$res=mysql_query($query);
	$r=mysql_num_rows($res);
	if($r>0)
	{
		echo "username already taken";
	}
	else
	{
		echo "username available";
	}
}
	?>
