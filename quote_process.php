<?php
//ini_set("display_errors",0);
session_start();
include("lib/class.phpmailer.php");
$count = $_SESSION['security_count'];


//if user submit for than 7 times redirect to index.php
if($count>=8) {
 Header("Location: index.php");
 die;
}

if(count($_POST) >0 ){

$name=$_POST['name'];
$company=$_POST['company'];
$phone = $_POST['phone'];
$state_country=$_POST['state_country'];
$email=$_POST['email'];
$refer=$_POST['refer'];
$SEO=$_POST['SEO'];
$comments=$_POST['comments'];
$newsletter_subscribe=$_POST['newsletter_subscribe'];
$code=$_POST['code'];

$postdate=date("Y M jS");

if($_SESSION['security_code']!=$code) {
 include("invalid_security_code.php");
} else {


$msg = <<<MSG
<html>
<body bgcolor="#CDDAED">
<h3><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Quote Details</strong> </font></h3>
<table width="591" height="304" border="1" bgcolor="#cdcdcd">
  <tr>
    <td width="361"><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Name </strong></font></td>
    <td width="214"><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$name</font></td>
  </tr>
  <tr>
    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Company </strong></font></td>
    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$company</font></td>
  </tr>
  <tr>
    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Phone number</strong></font></td>
    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$phone</font></td>
  </tr>
  <tr>
    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Which state and country are you located in?</strong></font></td>
    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$state_country</font></td>
  </tr>
  <tr>
    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Email address </strong></font></td>
    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$email</font></td>
  </tr>
  <tr>
    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Where did you hear about us?</strong></font></td>
    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$refer</font></td>
  </tr>
  <tr>
    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Would you like a search engine optimisation package?</strong></font></td>
    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$SEO</font></td>
  </tr>
  <tr>
    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Comments</strong></font></td>
    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$comments</font></td>
  </tr>
  <tr>
    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong> 	
Would you like to receive our free monthly E-Newsletter?</strong></font></td>
    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$newsletter_subscribe</font></td>
  </tr>
  
  
</table>
<br/>
<small>Powered by <a href="http://nepallink.net">Nepallink Network</a></small>
</body>
<html>
MSG;


$mail = new PHPMailer();
$mail->IsHTML(true);
$mail->From = "".$email;
$mail->FromName = "".$name;
$mail->AddAddress("info@nepallink.net");
// $mail->AddAddress("sarose@nepallink.net");

$mail->Subject = "Quote Details posted on $postdate";
$mail->Body = $msg;

if(!$mail->Send())
{
 echo 'Message was not sent.';
 echo 'Mailer error: ' . $mail->ErrorInfo;
}

//session_destroy(); 
unset($_SESSION['security_code']);
$_SESSION['security_count']++;

include_once("quote_success.php");  

} 

}
?>