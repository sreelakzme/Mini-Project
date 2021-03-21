
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
    
<h2 style="color:#000000;text-align:center;">Mothly Report </h2>
<form method="POST" action="" name="filterproducts" style="width:400px;margin-left:auto;margin-right:auto;">

<select  name="month" class="formfield" style="width:180px;"><option value="">--select your Month--</option>
<option value="Jan">January</option>
<option value="Feb">February</option>
<option value="Mar">March</option>
<option value="Apr">April</option>
<option value="May">May</option>
<option value="Jun">June</option>
<option value="Jul">July</option>
<option value="Aug">August</option>
<option value="Sep">September</option>
<option value="Oct">October</option>
<option value="Nov">November</option>
<option value="Dec">December</option>


<input type="submit" class="formbutton" value="Show" name="filter">
</form>
<?php 
include("dbconnect.php");

if (isset($_POST['filter']))
{
$month=$_POST['month'];
$sql="select * from report where month='$month'";
$exe=mysql_query($sql);
$count=mysql_num_rows($exe);
if($count==0)
{
	echo "<b>No Products purchased in Selected Month</b>";
}
else
{
?>

<h2> Report On Purchasing Details</h2>
<table align="center" style="border:1px solid #cccccc;width:90%;height:auto;cellpadding:15;cellspacing:0;text-align:center;font-size:16px;">
<tr style="background:#339ef4;height:40px;">
    <td><b>product Id</b><br></td>
    <td><b>Category</b><br></td>
    <td><b>Date</b><br></td>
    <td><b>Price</b><br></td>
    
    </tr>
  <?php 
  while($fetch=mysql_fetch_array($exe))
  {
  ?>
<tr style="height:40px;">
<td><?php echo $fetch['prod_id']?></td> 
    <td><?php echo $fetch['category']?></td>
    <td><?php echo $fetch['date']?></td>
    <td><?php echo $fetch['price']?></td>
    
    
    </tr>
  <?php
  }
}
}
  ?>
</table>


</div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>