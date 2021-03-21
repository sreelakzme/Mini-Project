<?php
session_start();
include("dbconnect.php");
$pid=$_GET['pid'];

$uid=$_SESSION['sessid'];
if(!$uid)
{
header("location:user-login.php");
}
else
{
$sql="select * from products where categoryname='$pid'";
	$exe=mysql_query($sql);
?>


<html>
<body>
<head><meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
   <script src="js/jquery.js" type="text/javascript"></script>
   <title>E-Store</title>

</head>

<body><div class="container">
<div id="header"><?php include('header2.php'); ?></div>

<div id="content">
<ul class="product-grid">
	<?php
    while($fetch=mysql_fetch_array($exe))
	{
		?>
<li>
<p style="text-align:center;"><a href="pro.php?pid=<?php echo $fetch['pid']?>"><img src="images/<?php echo $fetch['photo']?>"></a></p>

<p style="text-align:center;"><?php echo $fetch['name']?></p>
<p style="text-align:center;"><?php echo $fetch['categoryname']?></p>
<p style="text-align:center;"><?php echo $fetch['description']?></p>
<p style="text-align:center;"><?php echo "Rs: ". $fetch['price']." /-"?></p></li>
<?php
	}
	?>
</ul>
</div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html><?php
}

?>