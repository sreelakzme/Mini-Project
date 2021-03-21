<?php
session_start();
$aid=$_SESSION['sessid'];
if(!$aid)
{
header("location:admin-login.php");
}
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
    
  <h2 style="text-align:center;">Administration Panel</h2>


<table align="center" style="border:0;width:90%;height:auto;">
 
    <tr>
    <td><div id="adminbox"><a href="admin-add-products.php">Add Products</a></div></td>
    <td><div id="adminbox"><a href="admin-products.php">Edit Products</a></div></td>
    <td><div id="adminbox"><a href="admin-orders.php">View Orders</a></div></td>
    <td><div id="adminbox"><a href="admin-users.php">Users</a></div></td></tr>
   <tr>   

    <td><div id="adminbox"><a href="admin-edit-profile.php">Edit Profile</a></div></td>
  
    <td><div id="adminbox"><a href="viewcomplaints.php">View Complaints</a></div></td>
    <td><div id="adminbox"><a href="monthlyreport.php">Monthly Report</a></div></td>
    <td><div id="adminbox"><a href="viewreport.php">Categorywise Report</a></div></td>
    </tr>
  
</table>
</div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>