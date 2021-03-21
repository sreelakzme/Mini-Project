<html>
<body>
<head><meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
   <script src="js/jquery.js" type="text/javascript"></script>
   <title>Banarsiya</title>
<script type="text/javascript">
function showHint()
{
var s=document.register.username.value;
if (s.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","checkusername.php?q="+s,true);
xmlhttp.send();
}
</script>

<script type="text/javascript">
function valid()
{

        var phno=document.register.phone.value;        
        var filter=/^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
	var em=document.register.email.value;
	
	if(!filter.test(em))
	{
		alert("Please provide a valid-email address");
		document.register.email.focus();
		return false;
	}
	if(document.register.uid.value=="")
	{
		alert("Please enter your id");
		document.register.uid.focus();
		return false;
	}
	else if(document.register.username.value=="")
	{
		alert("Please enter your username");
		document.register.username.focus();
		return false;
	}
	else if(document.register.password.value=="")
	{
		alert("Please enter your password");
		document.register.password.focus();
		return false;
	}
	else if(document.register.email.value=="")
	{
		alert("Please enter your Email ID");
		document.register.email.focus();
		return false;
	}
	else if(document.register.phone.value=="")
	{
		alert("Please enter your Phone No");
		document.register.phone.focus();
		return false;
	}
        else if(phno.length>10 || phno.length<10)
	{
		alert("Phone number must be 10 digits");
		document.register.phone.focus();
		return false;
	}
	else if(document.register.address.value=="")
	{
		alert("Please enter your address");
		document.register.address.focus();
		return false;
	}
	else if(document.register.zipcode.value=="")
	{
		alert("Please enter your Zipcode");
		document.register.zipcode.focus();
		return false;
	}
	else if(document.register.state.value=="")
	{
		alert("Please Select a State");
		document.register.state.focus();
		return false;
	}
	else
	{
   alert("Account Created Successfully");		
   return true;
                
	}
}
</script>

</head>
<body><div class="container">
<div id="header"><?php include('header1.php'); ?></div>

 <div id="content">
    
     <h3>Create an Account</h3>
    <form name="register" action="registerprocess.php" method="POST">
    <table width="80%" border="0" cellpadding:"20" cellspacing="0">
   <tr>
    <td>ID</td>
    <td><input class="formfield" name="uid" type="text"></td>
  </tr>
  <tr>
    <td>Username</td>
    <td><input class="formfield" type="text" name="username" id="t1" onKeyUp="showHint()"/><div style="color:#339ef4;" id="txtHint"></div><p></p></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input class="formfield" name="password" type="password"></td>
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
    <td>Address</td>
    <td> <textarea class="formfield" name="address" id="textarea" cols="24" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>Zipcode</td>
    <td><input class="formfield" name="zipcode" type="text"></td>
  </tr>
  <tr>
    <td>State</td>
    <td><select class="formfield" name="state">
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
    </select></td>
  </tr>
 
  <tr>
    <td></td>
    <td><br><input class="formbutton" type="submit" name="regbutton" value="Register" onclick="return valid()">
&nbsp;&nbsp;&nbsp;<input class="formbutton" type="reset" name="clearbutton" value="Clear"></td>
  </tr>
</table>

    </form> 
    </div>
<div id="footerwrapper"><?php include('footer.php'); ?></div>
</div>
</body></html>