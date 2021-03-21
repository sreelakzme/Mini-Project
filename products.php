<?php
include("dbconnect.php");
$sql="select * from products";
$exe=mysql_query($sql);
?>
<html>
<body>
<head><meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
   <script src="js/jquery.js" type="text/javascript"></script>
   <title>Banarasiya</title>

</head>

<body><div class="container">
<div id="header"><?php include('header1.php'); ?></div>

<div id="content">
    
<h2 style="color:#000000;text-align:center;">Our Products</h2>
<ul class="product-grid">
 <?php 
  while($fetch=mysql_fetch_array($exe))
  {
  ?><li><p style="text-align:center;font-size:18px;"><?php echo $fetch['name']?></p><p style="text-align:center;"><img src="images/<?php echo $fetch['photo']?>" width="100px" height="100px" class="productzoom"></p><p style="text-align:center;font-size:16px;"><?php echo $fetch['description']?></p><p style="text-align:center;font-size:18px;color:#ce0000;">Rs. <?php echo $fetch['price']?></p></li><?php
  }
  ?>
</ul>

    </div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>