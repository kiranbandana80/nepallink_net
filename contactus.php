<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

if(count($_POST['submit']) > 0 ){

  $name_from_req =test_input($_POST["name_from_req"]);
  $email_from =test_input($_POST["email_from"]);
  $country_req =  test_input($_POST["country_req"]);
  $domainname =test_input($_POST["domainname"]);
  $to =test_input($_POST["to"]);
  $question =test_input($_POST["question"]);
  $captchamsg="";
//$code = $_POST["securitycode"]; 
  $code = $_POST["g-recaptcha-response"];
  $secretKey=getenv('SECRETKEY');
  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=".$code;
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$response=json_decode($response);
$err = curl_error($curl);
curl_close($curl);
  if($response->success==TRUE && $code != NULL){
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    $mail = new PHPMailer(true); // Passing `true` enables exceptions
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
   

    try{
      //server settings
    $mail->isSMTP();
    $mail->Host        = "samrat.01cloud.com"; // Sets SMTP server
    $mail->SMTPDebug   = 0; // 2 to enable SMTP debug information
    $mail->SMTPAuth    = TRUE; // enable SMTP authentication
    $mail->SMTPSecure  = "ssl"; //Secure conection
    $mail->Port        = 465; // set the SMTP port
    $mail->Username    = getenv('SMTPMAIL'); // SMTP account username
    $mail->Password    = getenv('SMTPPASS'); // SMTP account password
    $mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
    $mail->CharSet     = 'UTF-8';
    $mail->Encoding    = '8bit';

    //Receipients
    $mail->setFrom($email_from, $name_from_req);
    $mail->addAddress('samrat.shakya@nepallink.net', 'Samrat Shakya');     // Add a recipient
    //$mail->addAddress('sarose@nepallink.net');               // Name is optional
    $mail->addReplyTo('samrat.shakya@nepallink.net', 'Information');
    $mail->addCC('samrat.shakya@nepallink.net');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Message from Contact Form of Nepallink';
    $mail->Body    =$domainname;
    $mail->Body= strtr(file_get_contents('emailTemplate.php'), array('desc' => $question,'name'=>$name_from_req,'email'=>$email_from,'website'=>$domainname,'country'=>$country_req));
    //$mail->addAttachment('images/nepallink.gif');
    //$mail->AltBody = $question;

    $mail->send();
    session_destroy();
    Header("Location: http://www.nepallink.net/thanks.php");
    } catch (Exception $e) {
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
  }else{
    $captchamsg="<font color='red'>Secuirty code incorrect</font>";
  }
}


// if($_SESSION['security_code']!=$code) {
// $captchamsg="<font color='red'>Secuirty code incorrect</font>";
// } else {

// $headers = 'From: sales@nepallink.net' . "\r\n" .
//  'Reply-To: '.$email_from . "\r\n" .
//     'X-Mailer: PHP/' . phpversion();

// $autoresponder_message = <<<MSG

// A customer has submitted following feedback/comment/suggestion

// *************************************************
// >
// > Name : $name_from_req
// > Email: $email_from
// > Country: $country_req
// > Domain Name: $domainname
// > Contact to: $to
// > Comments: $question
// >
// **************************************************
// --
// MSG;

// mail('sales@nepallink.net', 'Inquiry From Client', $autoresponder_message,$headers);
// session_destroy();
// Header("Location: http://www.nepallink.net/thanks.php");
// die;
// }
//}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<html>
<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Nepallink Contact Address | Nepallink Telephone | Nepallink Fax | Nepallink Address | Nepallink Contact</title>

<script src="http://www.nepallink.net/javascript/prototype.js" type="text/javascript"></script>
<script src="http://www.nepallink.net/javascript/effects.js" type="text/javascript"></script>
<script src="http://www.nepallink.net/javascript/validation.js" type="text/javascript"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<meta name="description" content="Nepallink Contact Address. You can use our telephone, fax, email and VOIP to reach us." />
<meta name="keywords" content="NepalLink - Support Online" />
<meta name="robots" content="index, follow" />
<meta name="revisit" content="7 days" />
<meta name="distribution" content="global" />
<link rel="shortcut icon" href="favicon.ico" />
<link rel="Stylesheet" href="style.css" type="text/css" />
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>
<body>
<center>
<div id="container">
<table border="0" cellpadding="0" cellspacing="0" width="775">
  <tr>
    <td width="14" align="left" valign="top" background="images/left.gif">&nbsp;</td>
    <td width="747" align="right" valign="middle" bgcolor="#E5E7E8" height="20">NepalLink Contact Information</td>
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



<table width="775" border="0" cellpadding="0" cellspacing="0" bgcolor="#F1F1F2">
  <tr>
    <td width="14" align="left" valign="top" background="images/left.gif">&nbsp;</td>
    <td width="747" align="left" valign="middle" bgcolor="#FFFFFF">



<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="35%" align="left" valign="top">&nbsp;&nbsp;<font class="title">Contact us</font>
	<br />
	<ul>
	<div align="justify">
It is our desire to ensure that you are completely satisfied with our services. We are dedicated to provide timely and accurate answers to your inquiries. You may use our e-mail or call us anytime to contact us. You are always welcome to post questions on any related topic and our customer support team will respond immediately to these requests. 
<br /><br />
If you have any questions or comments, or if you would like more information on our services, please fill out the form provided, and we will get back to you as soon as possible.
 </div>
<br />
<img src="images/contact.jpg" border="0" alt="We are just behind you! Knock us!!">
<br /><br />

<!-- Vertical Response  -->

<form method="post" action="http://oi.vresp.com?fid=543fb67595" target="vr_optin_popup" onSubmit="window.open( 'http://www.verticalresponse.com', 'vr_optin_popup', 'scrollbars=yes,width=600,height=450' ); return true;" >

  <div style="font-family: verdana; font-size: 11px; width: 160px; padding: 10px; border: 1px solid #000000; ">
    <strong><span style="color: #333333;">Sign Up Today!</span></strong>
    <p style="text-align: right; margin-top: 10px; margin-bottom: 10px;"><span style="color: #f00;">* </span><span style="color: #333333">required</span></p>
    <label style="color: #333333;">Email Address:</label>    <span style="color: #f00">* </span>
    <br/>
    <input name="email_address" size="15" style="margin-top: 5px; margin-bottom: 5px; border: 1px solid #999; padding: 3px;"/>
    <br/>
    <label style="color: #333333;">First Name:</label>
    <br/>
    <input name="first_name" size="15" style="margin-top: 5px; margin-bottom: 5px; border: 1px solid #999; padding: 3px;"/>
    <br/>
    <label style="color: #333333;">Last Name:</label>
    <br/>
    <input name="last_name" size="15" style="margin-top: 5px; margin-bottom: 5px; border: 1px solid #999; padding: 3px;"/>
    <br/>
    <input type="submit" value="Join Now" style="margin-top: 5px; border: 1px solid #999; padding: 3px;"/>
  </div>
</form>

<!-- Vertical Response  -->


</ul>

<br /><br />

	</td>
    <td width="5%" align="left" valign="top" class="rightborder">&nbsp;</td>
    <td width="60%" align="left" valign="top"><img src="images/contactus.jpg"><br />


<br /><br />
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="10%" align="left" valign="top">&nbsp;</td>
    <td width="80%" align="left" valign="top">
<div align="justify">

<table border="0" cellpadding="4" cellspacing="0" width="80%">
  <tr>
    <td width="48%" bgcolor="#EEEEEE"><b>Contact us in Kathmandu</b></td>
  </tr>
  <tr>
    <td width="48%"><b>Sales:</b>&nbsp;
    sales(at)nepallink.net</td>
  </tr>
  <tr>
    <td width="48%"><b>Billing:</b>
    billing(at)nepallink.net ( <a href="payment.php" target="_blank">Payment Details </a>) </td>
  </tr>

  <tr>
    <td width="48%"><b>Technical Support:</b>
        <a target="_blank" href="https://client.nepallink.net/">Client Portal</a>
    </td>
  </tr>

  <tr>
    <td width="48%"><b>Abuse:</b>
	<a target="_blank" href="https://client.nepallink.net/">Client Portal</a>
    </td>
  </tr>

  <tr>
    <td width="48%">
      <p><b>Phone</b>  +977-1-4260822<br>
          <strong>Phone:</strong> +977-1-4267994<br>
            <strong>Cell: </strong> +977-9841262275<br />
            </p>
      </td>
  </tr>
  <tr>
    <td width="48%"><b>Nepal Office Address</b><br />
    Link Road, Khusibu<br />
    Kathmandu - 17<br/>
    Nepal</td>
  </tr>

 <tr>
    <td width="48%" bgcolor="#EEEEEE"><br><b>Contact us in Hyderabad</b></td>
  </tr>
  <tr>
    <td width="48%">
Plot no:102 hyline complex<br>
Banjarahills Road no:12, <br>
Hyderabad 500034  <br>
Landline number 9140-65457272<br>
      </td>
  </tr>

</table>


<br /><br />

<a name="form">
Please contact us via the following contact form.<br />
</a>
<form name="contatcus" id="contatcus" method="post" action="">
<input type="hidden" name="subject" value="Feedback" >
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="100%" bgcolor="#EEEEEE">
	<?php 
								 if(!isset($x)){
	
	
	
								  if(isset($msg)){ 
									echo "
									<tr>
										<td colspan=\"3\" ><h3><font color=\"#800000\">$msg</font></h3></td>
									</tr>";
									}
								  ?>
    <p align="center">Your  Name<br />
    <input type="text" id="name_from_req" name="name_from_req" size="20" value = "<?php echo isset($_POST['name_from_req']) ? $_POST['name_from_req'] : "";?>" class="required" required onkeypress="validate(event)"><br />
    Your E-mail<br />
    <input type="email" name="email_from" size="20" value = "<?php echo isset($_POST['email_from']) ? $_POST['email_from'] : "";?>" class="required validate-email" required><br />
    Country<br />
    <input type="text" name="country_req" size="20" value = "<?php echo isset($_POST['country_req']) ? $_POST['country_req'] : "";?>" class="required" onkeypress="validate(event)"><br />
    Your Domain Name<br />
    <input type="text" name="domainname" size="20" value = "<?php echo isset($_POST['domainname']) ? $_POST['domainname'] : "";?>"><br />
    Select who you wish to contact<br />
    <font face="Tahoma" size="2">
    <font style="color: rgb(127, 127, 127)" class="tah11">
    <select name="to">
      <option value="sales" selected="selected">Sales</option>
      <option value="support">Support</option>
      <option value="billing">Billing</option>
      <option value="jobs">Jobs</option>
      <option value="abuse">Abuse</option>
    </select></font></font><br />
Please enter your comments, suggestions & question below:<br />
      <textarea cols="40" rows="5" wrap="off" name="question" class="required"><?php echo isset($_POST['question']) ? $_POST['question'] : "";?></textarea><br />

<br/>
<!-- <img src='CaptchaSecurityImages.php' border=1><br/>
Enter Security Code:<br/>
<input type=text size=10 name=securitycode class="required"><br/>
<?php echo $captchamsg; ?><br/> -->
<div class="g-recaptcha" data-sitekey="<?= getenv('SITEKEY'); ?>" id="lrecaptcha"></div>  
<?php echo $captchamsg; ?><br/>
      <p align="center">
        <input name="submit" border="0" type="submit" value="submit">
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



</div>
</td>
    <td width="10%" align="left" valign="top">&nbsp;</td>
  </tr>
</table>


<br /><br />

	</td>
  </tr>
</table>


<p>&nbsp;</p>

</td>
    <td width="14" align="left" valign="top" background="images/right.gif">&nbsp;</td>
  </tr>
   <?php
	}else
	{
	echo "
									<tr>
										<td colspan=\"3\" ><h3><font color=\"#800000\">$msg</font></h3></td>
									</tr>";
									
									$retry ="Visit Again Contact Page  "."<a href=contact.php> Contact </a>";
									echo"<tr>
										<td colspan=\"3\" ><h3><font color=\"#800000\">$retry</font></h3></td>
									</tr>";
									} //end of if else
	?>
</table>
<script type="text/javascript">
   function validate(e) {
        var regex = new RegExp("[a-zA-Z ]");
        var key = e.keyCode || e.which;
        key = String.fromCharCode(key);
        
        if(!regex.test(key)) {
            e.returnValue = false;
            if(e.preventDefault) {
                e.preventDefault();
            }
        }
    }
</script>

<?php
include_once("footer.php");
 ?>
</center>
