<html>
<body>
<head><meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
   <script src="js/jquery.js" type="text/javascript"></script>
   <title>Banarasi Sarees</title></head>
<body><div class="container">
  <div id="header"><?php include('header1.php'); ?></div>
<?php
include("dbconnect.php");
$sql="select * from products ORDER BY pid DESC LIMIT 4";
$exe=mysql_query($sql);
?>

<div id="content"><table width="100%" border="0" align="center"><tr><td align="center"><img src="images/sree.jpg" align="center"></td></tr></table>
<h2 style="color:#000000;text-align:center;">Featured Products</h2>
<ul class="product-grid">
 <?php 
  while($fetch=mysql_fetch_array($exe))
  {
  ?><li style="border:1px solid #339ef4;"><p style="text-align:center;font-size:18px;"><?php echo $fetch['name']?></p><p style="text-align:center;"><img src="images/<?php echo $fetch['photo']?>" width="100px" height="100px"></p><p style="text-align:center;font-size:16px;"><?php echo $fetch['description']?></p><p style="text-align:center;font-size:18px;color:#ce0000;">Rs. <?php echo $fetch['price']?></p></li><?php
  }
  ?>
</ul>

</div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>

</body></html>