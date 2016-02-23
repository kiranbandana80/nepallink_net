<?php
session_start();

if(count($_POST) >0 ){

$name_from_req = $_POST["name_from_req"];
$email_from = $_POST["email_from"];
$country_req =  $_POST["country_req"];
$domianname = $_POST["domianname"];
$to =  $_POST["to"];
$question = $_POST["question"];
$code = $_POST["securitycode"];

$captchamsg="";



if($_SESSION['security_code']!=$code) {
$captchamsg="<font color='red'>Secuirty code incorrect</font>";
} else {

$headers = 'From: noreply@nepallink.net' . "\r\n" .
 'Reply-To: '.$email_from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$autoresponder_message = <<<MSG

A customer has submitted following feedback/comment/suggestion

*************************************************
>
> Name : $name_from_req
> Email: $email_from
> Country: $country_req
> Domain Name: $domianname
> Contact to: $to
> Comments: $question
>
**************************************************
--
MSG;

mail('info@nepallink.net', 'Payment Inquiry From Client', $autoresponder_message,$headers);

$client = new SoapClient(null, array(
      'location' => "http://support.nepallink.net/webservice.php?wsdl",
      'uri'      => "urn:ticketwsdl",
      'trace'    => 1 ));

$return = $client->__soapCall("openticket",
           array('name'=>$name_from_req,'email'=>$email_from,
          'phone'=>'','topic'=>'2',
          'subject'=>'Inquiry submitted to '.$to,
          'message'=>'Domain Name:'.$domianname.' --- Inquiry:'.$question));

Header("Location: http://www.nepallink.net/thanks.php");
die;
}

}

?>
<HTML>
<HEAD>
<TITLE>Nepallink Payment Method</TITLE>
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

<script src="http://www.nepallink.net/javascript/prototype.js" type="text/javascript"></script>
<script src="http://www.nepallink.net/javascript/effects.js" type="text/javascript"></script>
<script src="http://www.nepallink.net/javascript/validation.js" type="text/javascript"></script>
</HEAD>

<BODY BGCOLOR=#E4E5EA LEFTMARGIN=0 TOPMARGIN=2 MARGINWIDTH=0 MARGINHEIGHT=0 BACKGROUND="images/bg.gif">
<CENTER>


<table border="0" cellpadding="0" cellspacing="0" width="775">
  <tr>
    <td width="14" align="left" valign="top" background="images/left.gif">&nbsp;</td>
    <td width="747" align="right" valign="middle" bgcolor="#E5E7E8" height="20"><strong>Nepallink Network Payment Information</strong> </td>
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
    <td width="35%" align="left" valign="top"><font class="title">Pay online </font><br />
	<br />
	<ul>
	  <p align="center"><img src="images/paypal.jpg" alt="Paypal" width="123" height="129"></p>
	  <p align="center">&nbsp;</p>
	  <p align="center"><br/>
	</ul>

    <br /><br />

	</td>
    <td width="5%" align="left" valign="top" class="rightborder">&nbsp;</td>
    <td width="60%" align="left" valign="top"><h3 align="center">&nbsp;</h3>
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="10%" align="left" valign="top">&nbsp;</td>
    <td width="80%" align="left" valign="top">
<div align="justify">
  <p>We accept payments through payment gateways like <strong>2Checkout</strong>, <strong>Paypal</strong>,&amp; <strong>Bank Transfer</strong>. You can also pay through Cheque.</p>
  <p>Our paypal address is : <strong>payments@nepallink.net</strong> </p>
<p><strong>You can transfer your payments in following banks:-</strong><br>
<hr>
  <br>    
  <strong><img src="images/logo/himalayanbank.gif" width="158" height="41" alt="Himalayan Bank"><br>
  Himalayan Bank Ltd<br>
    </strong>Thamel Branch, Kathmandu, Nepal.<br>
        SWIFT CODE: HIMANPKA<br>
A/C Name  : Nepallink Network Pvt Ltd<br>
A/C No. 01902189330011<br>
<br>
</p>
<hr>
<p><img src="images/logo/nepalinvestmentbank.gif" width="256" height="40" alt="Nepal Ivestment Bank"><br>
  <strong>Nepal Investment Bank</strong><br>
  Putali Sadak, Kathmandu, Nepal<br>
  SWIFT CODE:   NIBLNPKT  <br>
  A/C Name: Nepallink Network Pvt Ltd<br>
  A/C No: 01201020254496<br>
  <br>
</p>
<hr>
<p>
<img src="images/globalime.jpg"><br/>
<b>Global IME Bank</b><br/>
Chhetrapati, Kathmandu, Nepal<br/> 
A/C Name: Nepallink Network Pvt Ltd<Br/>
A/C No: 2501010000262<br/>
</p>
<hr>

<p><img src="images/logo/nepalbankltd.gif" width="145" height="40" alt="Nepal Bank Limited"><br>
  <strong>Nepal Bank Limited<br>
  </strong>Kantipath, Kathmandu, Nepal<br>
  Branch Code: 000217
  SWIFT CODE:   NEBLNPKA  <br>
  A/C Name: The Young Software Pvt Ltd<br>
  A/C No: 21700100192000000001</p>
<hr>
<p>
<strong>eSewa Payment</strong><br/>
eSewa id: 9841262275<Br/>
eSewa Email: billing@nepallink.net<br/>
</p>
<hr>
<p>
<strong>Paypal Payment</strong><br/>
Paypal id: payments@nepallink.net<br/>
</p>
<hr>
<p>&nbsp; </p>
<p>Please ensure to quote any necessary information whilst providing us with a cheque/deposit slip etc., to help us identify you as a customer.</p>
<p>Feel free to contact us for more details. <br/>
      <br/>
  
        <b>Cell and Landline</b><br/>
  Tel: +977 1 4260822<br />
  Fax +977 1 4267994 <br>
  Cell : +977-9841262275 <br/>
        <br />
        <br />
</p>
</div>
</td>
    <td width="10%" align="left" valign="top">&nbsp;</td>
  </tr>
</table>

<br /><br />

<a name="form">If you have any question(s) please feel free to submit here. <br />
</a>
<form name="contatcus" id="contatcus" method="post" action="">
<input type="hidden" name="subject" value="Payment inquiry." >
<table border="0" cellpadding="0" cellspacing="0" width="98%">
  <tr>
    <td width="100%" bgcolor="#EEEEEE">

    <p align="center">Your  Name<br />
    <input type="text" id="name_from_req" name="name_from_req" size="20" value = "<?php echo isset($_POST['name_from_req']) ? $_POST['name_from_req'] : "";?>" class="required"><br />
    Your E-mail<br />
    <input type="text" name="email_from" size="20"value = "<?php echo isset($_POST['email_from']) ? $_POST['email_from'] : "";?>" class="required validate-email"><br />
    Country<br />
    <input type="text" name="country_req" size="20"value = "<?php echo isset($_POST['country_req']) ? $_POST['country_req'] : "";?>" class="required"><br />
    Your Domain Name<br />
    <input type="text" name="domainname" size="20"value = "<?php echo isset($_POST['domainname']) ? $_POST['domainname'] : "";?>"><br />
    Select who you wish to contact<br />
    <font face="Tahoma" size="2">
    <font style="color: rgb(127, 127, 127)" class="tah11"><select name="to">
    <option value="Sales" >Sales</option>
    <option value="Support">Support</option>
    <option value="Billing" selected="selected">Billing</option>
    <option value="Webmaster">Webmaster</option>
    <option value="Administrator">Administrator</option>
    <option value="Hostmaster">Hostmaster</option>
    <option value="Jobs">Jobs</option>
    <option value="Abuse">Abuse</option>
    </select></font></font><br />
Please enter your comments, suggestions & question below:<br />
      <textarea cols="40" rows="5" wrap="off" name="question" class="required"><?php echo isset($_POST['question']) ? $_POST['question'] : "";?></textarea>
<br />

<br/>
<img src='CaptchaSecurityImages.php' border=1><br/>
Enter Security Code:<br/>
<input type=text size=10 name=securitycode class="required"><br/>
<?php echo $captchamsg; ?><br/>
      <p align="center">
        <input src="images/send.gif" name="submit" border="0" type="image">
          </td>
  </tr>
</table>
</form>

<script type="text/javascript">
				function formCallback(result, form) {
					window.status = "valiation callback for form '" + form.id + "': result = " + result;
				}
var valid = new Validation('contatcus', 
		{immediate : true, onFormValidate : formCallback});
</script>



<br /><br /></td>
  </tr>
</table>


<p>&nbsp;</p>

</td>
    <td width="14" align="left" valign="top" background="images/right.gif">&nbsp;</td>
  </tr>
</table>


<?php
include_once("footer.php");
?>
