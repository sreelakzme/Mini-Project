<?php
include("dbconnect.php");
if(isset($_POST['sendbutton']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
$phone=$_POST['phone'];
	$msg=$_POST['message'];
	 $sql="insert into complaints (name,email,phno,complaints)
	 values('$name','$email','$phone','$msg')";
mysql_query($sql);
}
?>
<html>
<body>
<head><meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
   <script src="js/jquery.js" type="text/javascript"></script>
   <title>Banarasiya</title>

<script type="text/javascript">
function valid()
{
	if(document.contactus.name.value=="")
	{
		alert("Please enter your name");
		document.contactus.name.focus();
		return false;
	}
	else if(document.contactus.email.value=="")
	{
		alert("Please enter your Email ID");
		document.contactus.email.focus();
		return false;
	}
	else if(document.contactus.phone.value=="")
	{
		alert("Please enter your Phone No");
		document.contactus.phone.focus();
		return false;
	}
	else if(document.contactus.message.value=="")
	{
		alert("Please enter your address");
		document.contactus.message.focus();
		return false;
	}
	else
	{
   alert("Message Sent Successfully");		
   return true;
                
	}
}
</script>

</head>
<body><div class="container">
<div id="header"><?php include('header1.php'); ?></div>

 <div id="content">
    
     <h2>Your Complaints</h2>
    <form name="contactus" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
    <table width="80%" border="0" cellpadding:"20" cellspacing="0" style="font-size:16px;">
   <tr>
    <td>Name</td>
    <td><input class="formfield" name="name" type="text"></td>
  </tr>
 
  <tr>
    <td>Email ID</td>
    <td><input class="formfield" name="email" type="text"></td>
  </tr>
  
  <tr>
    <td>Phone No.</td>
    <td><input class="formfield" name="phone" type="text"></td>
  </tr>
 
  <tr>
    <td>Your Complaints or Feedback</td>
    <td> <textarea class="formfield" style="height:100px;" name="message" id="textarea" cols="24" rows="5"></textarea></td>
  </tr>
   
  <tr>
    <td></td>
    <td><br><input class="formbutton" type="submit" name="sendbutton" value="Send Message" onClick="return valid()">
&nbsp;&nbsp;&nbsp;<input class="formbutton" type="reset" name="clearbutton" value="Clear"></td>
  </tr>
</table>

    </form> 
    </div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>