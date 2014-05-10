<?php

ini_set("display_errors",0);



include("lib/class.phpmailer.php");



session_start();



$count = $_SESSION['security_count'];





//if user submit for than 2 times redirect to index.php

if($count>=12) {

 Header("Location: index.php");

 die;

}



if(count($_POST) >10 ){



$already_Domain_Name=$_POST['already_Domain_Name'];

$web_space_need=$_POST['web_space_need'];

$Bandwidth_need = $_POST['Bandwidth_need'];

$email_accounts=$_POST['email_accounts'];

$web_based_email=$_POST['web_based_email'];

$script_need = $_POST["Scripts_need"];

$Database_need=$_POST['Database_need'];

$Features=$_POST['Features'];

$Technical_Customer_Service=$_POST['Technical_Customer_Service'];

$Ecommerce_Services=$_POST['Ecommerce_Services'];

$budget=$_POST['budget'];

$firstname=$_POST['firstname'];

$lastname=$_POST['lastname'];

$email=$_POST['email'];

$confirm_email= $_POST['confirm_email'];

$phone=$_POST['phone'];

$additional_comments=$_POST['additional_comments'];

$address=$_POST['address'];

$city=$_POST['city'];

$province=$_POST['province'];

$postalcode=$_POST['postalcode'];

$country=$_POST['country'];

$code=$_POST['code'];

$postdate=date("Y M jS");

if($_SESSION['security_code']!=$code) {

 include("invalid_security_code.php");

} else {


//Get script selected values
foreach ($script_need as $s) {
$script .="$s, ";
}

//Get database selected values
foreach ($Database_need as $s) {
$database .="$s, ";
}

//Get feature selected values
foreach ($Features as $s) {
$features .="$s, ";
}

//Get technical selected values
foreach ($Technical_Customer_Service as $s) {
$technical .="$s, ";
}

//Get $Ecommerce_Services selected values

foreach ($Ecommerce_Services as $s) {
$ecommerce .="$s, ";
}





$msg = <<<MSG

<html>

<body bgcolor="#CDDAED">

<h3><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Web Hosting Details</strong> </font></h3>

<table width="591" height="304" border="1" bgcolor="#cdcdcd">

  <tr>

    <td width="340"><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Do you already own a Domain Name? </strong></font></td>

    <td width="273"><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$already_Domain_Name</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>How much web space do you need? </strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$web_space_need</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>How much Bandwidth do you need?</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$Bandwidth_need</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>How many email accounts do you need?</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$email_accounts</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Do you need web based email?</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$web_based_email</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>What Scripts do you need?</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" > 

      $script

</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>What Database do you need?</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$database</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Add-On Features</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$features</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Technical Support & Customer Service</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$technical</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Ecommerce Services</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$ecommerce</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>What is your budget?</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$budget</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>First Name:</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$firstname</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Last Name:</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$lastname</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Email:</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$email</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Phone:</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$phone</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Address:</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$address</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>City:</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$city</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>State/Province:</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$province</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Zip/Post Code:</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$postalcode</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Country:</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$country</font></td>

  </tr>

  <tr>

    <td><font face="Geneva, Arial, Helvetica, sans-serif"><strong>Additional Comments:</strong></font></td>

    <td><font color=blue face="Geneva, Arial, Helvetica, sans-serif" >$additional_comments</font></td>

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

$mail->FromName = "".$firstname." ".$lastame;

$mail->AddAddress("rajesh@nepallink.net");

$mail->AddAddress("sarose@nepallink.net");



//$mail->AddBCC("rajesh@nepallink.net"); 

$mail->Subject = "Web Hosting posted on $postdate";

$mail->Body = $msg;



if(!$mail->Send())

{

   echo 'Message was not sent.';

   echo 'Mailer error: ' . $mail->ErrorInfo;

}

  

//session_destroy(); 

unset($_SESSION['security_code']);



$_SESSION['security_count']++;



header("location:webhosting_success.php");



//mail("info@lailai.com.np, lailai@wlink.com.np", "Reservation posted on $postdate",$msg,$headers);



} 



}

?>

