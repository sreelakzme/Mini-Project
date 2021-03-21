<?php
session_start();
$aid=$_SESSION['sessid'];
if(!$aid)
{
header("location:admin-login.php");
}
?>
<?php
include("dbconnect.php");
$sql="select * from contact where status=1";
$exe=mysql_query($sql);
?>

<html>
<body>
<head><meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
   <script src="js/jquery.js" type="text/javascript"></script>
   <title>Banarasiya Administration Panel</title></head>
<body><div class="container">
<div id="header"><?php include('header3.php'); ?></div>

<div id="content">
    
  <h2>Registered Users</h2>
<table align="center" style="border:1px solid #cccccc;width:90%;height:auto;cellpadding:15;cellspacing:0;text-align:center;font-size:16px;">
<tr style="background:#339ef4;height:40px;">
    <td><b>Name</b><br></td>
    <td><b>Email ID</b><br></td>
    <td><b>Phone No.</b><br></td>
    <td><b>Shop License ID</b><br></td>
    
    </tr>
  <?php 
  while($fetch=mysql_fetch_array($exe))
  {
  ?>
<tr style="height:40px;">
    <td><?php echo $fetch['name']?></td>
    <td><?php echo $fetch['email']?></td>
    <td><?php echo $fetch['phno']?></td>
    <td><?php echo $fetch['license']?></td> 
    <td><a href="subdelete.php?name=<?php echo $fetch['name']?>">Delete</a></td>
    </tr>
  <?php
  }
  ?>
</table>
</div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>