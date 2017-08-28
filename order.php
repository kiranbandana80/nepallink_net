<?php
session_start();
$product_id = filter_var($_REQUEST["plan"], FILTER_SANITIZE_STRING);

$order_map = array (
//"FES010"   =>  "http://client.nepallink.net/order/?skip=1&pid=4",
//"FES010"   =>  "http://client.nepallink.net/cart.php?a=add&pid=58",
"FES010"   =>  "http://client.nepallink.net/cart.php?a=add&pid=121",
"bronze"    =>  "http://client.nepallink.net/cart.php?a=add&pid=1",
"gold"       =>   "http://client.nepallink.net/cart.php?a=add&pid=5",
"platinum" => "http://client.nepallink.net/cart.php?a=add&pid=15",
"RESELLER_BRONZE" => "http://client.nepallink.net/cart.php?a=add&pid=9",
"RESELLER_GOLD" => "http://client.nepallink.net/cart.php?a=add&pid=10",
"RESELLER_PLANTINUM" => "http://client.nepallink.net/cart.php?a=add&pid=11",
"VPS_BRONZE" => "http://client.nepallink.net/cart.php?a=add&pid=6",
"VPS_GOLD" => "http://client.nepallink.net/cart.php?a=add&pid=7",
"JAVA_SHARED_HOSTING"=>"http://client.nepallink.net/cart.php?a=add&pid=19",
"VPS_PLANTINUM" => "http://client.nepallink.net/cart.php?a=add&pid=8",
"RESELLER_ENTERPRISE"=>"http://client.nepallink.net/cart.php?a=add&pid=43",
"WIN_RESELLER_BRONZE"=>"http://client.nepallink.net/cart.php?a=add&pid=12",
"WIN_RESELLER_GOLD"=>"http://client.nepallink.net/cart.php?a=add&pid=13",
"VPSFES010"=>"http://client.nepallink.net/cart.php?a=add&pid=53",
"WIN_RESELLER_PLANTINUM"=>"http://client.nepallink.net/cart.php?a=add&pid=14",
"DON_NET_BASIC"=>"http://client.nepallink.net/cart.php?a=add&pid=16",
"JAVA_PRIVATE_HOSTING"=>"http://client.nepallink.net/cart.php?a=add&pid=21",
"DON_NET_PROFESSIONAL"=>"http://client.nepallink.net/cart.php?a=add&pid=17",
"UNLIMITED_SSD"=>"https://client.nepallink.net/cart.php?a=add&pid=182",
"WIN_CLOUD_STARTER"=>"https://client.nepallink.net/cart.php?a=add&pid=185",
"WIN_CLOUD_BRONZE"=>"https://client.nepallink.net/cart.php?a=add&pid=70",
"WIN_CLOUD_GOLD"=>"https://client.nepallink.net/cart.php?a=add&pid=71",
"WIN_CLOUD_PLANTINUM"=>"https://client.nepallink.net/cart.php?a=add&pid=72",
"NODE_BROZNE_HOSTING"=>"https://client.nepallink.net/cart.php?a=add&pid=204",
"NODE_GOLD_HOSTING"=>"https://client.nepallink.net/cart.php?a=add&pid=206",
"NODE_PLATINUM_HOSTING"=>"https://client.nepallink.net/cart.php?a=add&pid=207"
);

if (array_key_exists($product_id, $order_map)) {
  Header('Location: '.$order_map[$product_id]);
} 

if(count($_POST) >0 ){

$name_from_req = $_POST["name_from_req"];
$plan = $_POST["plan"];
$email_from =  $_POST["email_from"];
$address = $_POST["address"];
$phone=$_POST["phonecell"];
$domain = $_POST["domainname"];

$code = $_POST["securitycode"];

$captchamsg="";



if($_SESSION['security_code']!=$code) {
$captchamsg="<font color='red'>Secuirty code incorrect</font>";
} else {

$headers = 'From: webmaster@nepallink.net' . "\r\n" .
 'Reply-To: '.$email_from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$autoresponder_message = <<<MSG

A New Hosting Order Received.

*************************************************
>
> Name : $name_from_req
> Email: $email_from
> Address: $address 
> Contact #: $phone
> Domain : $domain
> Hosting Package: $plan
> Domain Name: $domain
>
**************************************************
--
MSG;

mail('sales@nepallink.net', '[NEPALLINK.NET] New Hosting Order', $autoresponder_message,$headers);

/* Create lead in CRM */
include("lib/crm.php");
	
$params = array();
$params["lastname"] = $name_from_req;
$params["email"] = $email_from;
$params["phone"] = $phone;
$params["company"] = $domain;
$params["country"] = $email_from;
$params["description"] = $autoresponder_message;
$params["assigned_user_id"] = DEFAULT_LEAD_OWNER_USERID;
createCRMLead($params);	
unset($params);

Header("Location: http://www.nepallink.net/thanksorder.php");
die;
}

}

?>

<HTML>
<HEAD>
<TITLE>NepalLink - Web Design, Graphic, Content Management & Portal System</TITLE>
<META http-equiv=Content-Language content=en-us>
<META  name="description" content="NepalLink is the leading provider of Web hosting for small & medium businesses, our product offering include virtual, e-commerce, and dedicated web hosting as well as domain registration & web design.">
<META name="keywords" content="Shared, Dedicated, Managed, Virtual, Business, Web, Hosting, Service, Reseller, Domain,  Internet, E-commerce, Windows, Unix, Linux, FreeBSD, Server, PHP, MySQL, ASP">
<META  name="Abstract" content="Hosting, Web Hosting, Shared Web Hosting, Dedicated Web Hosting, Managed Hosting, Reseller Web Hosting, Hosting Service, Business Web Hosting, Shared Hosting, Dedicated Hosting, Reseller Hosting, Dedicated Server, Internet Web Hosting, Domain Name Search, Domain Name Transfer, Domain Name Purchase, Domain Name Registration, Site Hosting, Data Center, E-commerce Hosting, Web Page Hosting, Windows Web Hosting, Web Hosting Sales, Web Hosting Services, Web Hosting Sales Chat, Web Hosting Solutions, Scalable Web Hosting, Stable Web Hosting, Windows 2000 Web Hosting, Linux Hosting, Linux Web Hosting, Unix Hosting, Unix Web Hosting, Reseller Program, Reseller Dedicated Hosting, Reseller Shared Hosting, Virtual Private Server, Cold Fusion Hosting, ColdFusion Hosting, ASP Web Hosting, ASP Hosting, PHP Hosting, Inexpensive Web Hosting, Web Hosting Discounts, SQL Hosting, MySQL Hosting, Web Hosting Company, Web Hosting Industry, SSL, POP E-mail, FrontPage Extensions">
<META name="author" content="Nepallink Network">
<META name="srce" content="http://www.nepallink.net">
<META name="robots" content="index/follow">
<META name="revisit" content="7 days">
<META name="distribution" content="global">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<LINK REL="Stylesheet" href="style.css" type="text/css">

<style type="text/css"> 
.label {float: left; width: 120px; }
.uname {width: 200px; }
.error { color: red; padding-left: 10px; }
.class { color: black; font-weight: bold}
#submit { margin-left: 125px; margin-top: 10px;}
</style>


<script type='text/javascript' src='script/jquery.js'></script> 
<script type='text/javascript' src='script/jquery.validate.js'></script> 



<script type='text/javascript'>
$(document).ready(function() {
$('.status').hide();
$('#domainchk').blur(function (e) {
e.preventDefault();
var name = $('#domainchk').val();
var parent = $(this).parent();
var data='dom='+name;
$.ajax({
type:"POST",
url:"domain/domchksrv.php",
data:data,
beforeSend: function() {
				$('.status').html('<img src="images/busy.gif" />');
				$('.status').show(); 
			},

success:function(html) {
$('.status').text(html);
$('.status').show();
},
error: function(xhr, textstatus, errorThrown) { alert('Error occured while sending, Try again'); $('.status').hide(); }
});
return false;
});
});
</script>

</HEAD>

<BODY BGCOLOR=#E4E5EA LEFTMARGIN=0 TOPMARGIN=2 MARGINWIDTH=0 MARGINHEIGHT=0 BACKGROUND="images/bg.gif">
<CENTER>


<table border="0" cellpadding="0" cellspacing="0" width="775">
  <tr>
    <td width="14" align="left" valign="top" background="images/left.gif">&nbsp;</td>
    <td width="747" align="right" valign="middle" bgcolor="#E5E7E8" height="20">NepalLink - Web design, hosting and promotion</td>
    <td width="14" align="left" valign="top" background="images/right.gif">&nbsp;</td>
  </tr>
</table>


         <?php
		  include_once("header.php");
		  ?>


<table border="0" cellpadding="0" cellspacing="0" width="775">
  <tr>
    <td width="14" align="left" valign="top" background="images/left.gif"><img src="images/spacer.gif" height="15" width="10" alt=""></td>
    <td width="747" align="left" valign="top" background="images/bkg.gif"><img src="images/spacer.gif" height="15" width="10" alt=""></td>
    <td width="14" align="left" valign="top" background="images/right.gif"><img src="images/spacer.gif" height="15" width="10" alt=""></td>
  </tr>
</table>



<table border="0" cellpadding="0" cellspacing="0" width="775">
  <tr>
    <td width="14" align="left" valign="top" background="images/left.gif">&nbsp;</td>
    <td width="747" align="left" valign="middle" bgcolor="#FFFFFF">



<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="35%" align="left" valign="top">&nbsp;&nbsp;<font class="title">Contact us</font>
<center>
<br><br>

<ul>

	<div align="justify">
Sales:</b>&nbsp; <a href="mailto:sales@nepallink.net">
    sales(at)nepallink.net</a><br>
Billing:</b> <a href="mailto:billing@nepallink.net">
    billing(at)nepallink.net</a> <br>
    <table border="0" cellpadding="4" cellspacing="0" width="80%">
      <tbody>
        <tr>
          <td width="48%"><p><strong>Phone</strong>&nbsp;+977-1-4260822<br>
            <strong>Phone:</strong>&nbsp;+977-1-4267994<br>
            <strong>Cell:&nbsp;</strong>+977-9841262275<br>
            </p></td>
          </tr>
        <tr>
          <td width="48%"><strong>Nepal Office Address</strong><br>
            Link Road, Khusibu<br>
            Kathmandu - 17<br>
            Nepal</td>
          </tr>
        <tr>
          <td><p><strong>India Office Address<br>
          </strong>Plot no:102 hyline complex Banjarahills Road no:12, Hyderabad 500034 Landline number 9140-65457272</p></td>
          </tr>
        </tbody>
    </table>
    <br><Br>
</div>
</ul>
<br>
	<ul>
	  <br>
<img src="images/contact.jpg" border="0" alt="We are just behind you! Knock us!!">
<br><br>
Want support? get it <a href="support.php"><b>here</b></a>.
</ul>

<br><br>

	</td>
    <td width="5%" align="left" valign="top" class="rightborder">&nbsp;</td>
    <td width="60%" align="left" valign="top"><img src="images/contactus.jpg"><br>


<br><br>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="10%" align="left" valign="top">&nbsp;</td>
    <td width="80%" align="left" valign="top">
<div align="justify">


<br><br>
<img src='images/order_blue.gif' border=0>
<br>
<form method="post" name=order id=order>
<input type="hidden" name="subject" value="New Order">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="100%" bgcolor="#EEEEEE">
    <p align="center">Your  Name<br>
    <input type="text" name="name_from_req" size="20" class="required" 
value="<?=$name_from_req?>">
<br>
    Order Package:<br>
    <input type="text" value="<?=$_REQUEST["plan"]?>" name="pland" size="20"  disabled="true">
<input type="hidden" value="<?=$_REQUEST["plan"]?>" name="plan" size="30">

<br>
    Your E-mail<br>
    <input type="text" name="email_from" size="20" class="required validate-email" value="<?=$email_from?>"><br>
    Adress <br>
    <input type="text" name="address" size="20" class="required" value="<?=$address?>"><br>

    Phone/Cell:<br>
    <input type="text" name="phonecell" size="20" value="<?=$phone?>" ><br>

    Your Domain Name<br>
    <input type="text" id="domainchk" name="domainname" value="<?php echo $domain; ?>" size="20" class="required">
	<br/>
	<span class="status"></span>
	<br>
</font><br/><br/>
<img src='CaptchaSecurityImages.php' border=1><br/>
Enter Security Code:<br/>
<input type=text size=10 name=securitycode class="required"><br/>
<?php echo $captchamsg; ?>

<br/>
<input src="images/send.gif" name="submit" border="0" type="image">
</td>
  </tr>
</table>
</form>

</div>
</td>
    <td width="10%" align="left" valign="top">&nbsp;</td>
  </tr>
</table>


<br><br>

	</td>
  </tr>
</table>

<script type="text/javascript">
				function formCallback(result, form) {
					window.status = "valiation callback for form '" + form.id + "': result = " + result;
				}
var valid = new Validation('order', 
		{immediate : true, onFormValidate : formCallback});
</script>


<p>&nbsp;</p>

</td>
    <td width="14" align="left" valign="top" background="images/right.gif">&nbsp;</td>
  </tr>
</table>
<?php
include_once("footer.php");
 ?>
