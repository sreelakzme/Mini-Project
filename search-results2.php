<?php
session_start();
$uid=$_SESSION['sessid'];
if(!$uid)
{
header("location:user-login.php");
}
?>

<?php
include("dbconnect.php");
if (isset($_POST['searchbtn']))
{
$search_query=$_POST['searchterm'];
$sql="select * from products WHERE name LIKE '%".$search_query."%' OR description LIKE '%".$search_query."%'";
$exe=mysql_query($sql);
}
$sql2="select * from products";
$exe2=mysql_query($sql2);
if(isset($_GET['quantity']))
{
?><script type="text/javascript">
alert("<?php echo $_GET['quantity']; ?>");
</script>
<?php
}
?>
<html>
<body>
<head><meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
   <script src="js/jquery.js" type="text/javascript"></script>
   <title>Banarasiya</title></head>
<body><div class="container">
<div id="header"><?php include('header2.php'); ?></div>

<div id="content">
 <?php 
 $count=mysql_num_rows($exe);
 if($count==0)
{
echo "<b>No Products found. Please try again with different keywords.";
}
else
{
?>
<table width="90%" border="0" align="center"><tr><td><h3>Search results for '<?php echo $search_query; ?>'</h3></td></tr>
  <?php
  while($fetch=mysql_fetch_array($exe))
  {
  ?>
  <tr><form action="add-to-cart-process.php?pid=<?php echo $fetch['pid'] ?>" method="POST" name="addtocart">
    <td><?php echo $fetch['name']?></td>
    <td><?php echo $fetch['description']?></td>
    <td><?php echo $fetch['price']?></td>
    <td><img src="images/<?php echo $fetch['photo']?>" width="80px" height="80px" /></td>
<td>
<p style="text-align:center;font-size:16px;"><input type="text" style="width:30px;height:30px;text-align:center;" name="quantity" value="1"></p></td>

<td><p style="text-align:center;font-size:18px;"><button style="border:0;background:#ffffff;" type="submit" name="addtocart" id="addtocart" ><img src="images/addtocartsmall.png"</button></p></td></form>
  </tr>
  <?php
  }
}
  ?>  

</table>
</div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>