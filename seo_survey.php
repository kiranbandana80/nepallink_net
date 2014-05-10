<?php
include("lib/class.phpmailer.php");

$pages = Array( 'page1' =>'seo-contact.php',
                         'page2' => 'seo-questions.php',
                         'success' => 'thankyou.php' );

session_start();

$target = cleanup("target");

if($target==2) {
	$contact = $_POST["contact"];
	$_SESSION["contact"] = serialize  ($contact);
	//header("Location: ".$pages[0]);
        include($pages["page2"]);
	die;
}

if($target==3)
{
	$buffer ="";
	$search = array('_','\'','"','\\');
	$replace = array(' ','','','');
        
        if(!isset($_SESSION["contact"]) AND !isset($_SESSION["question"]) ) {
             session_destroy();
             header("Location: index.php ");             
              exit(0);
        }

	$contact = unserialize($_SESSION["contact"]);

	$buffer = "<h2>Contact Details </h2><table border=1 width=70%>";
	
	    foreach($contact as $k=>$v) {
			 $buffer .= "<tr><td width='30%'>$k</td><td with='40%'> $v<br/></td></tr>";
		}

		$buffer .= "</table> <br/><br/>";
       

	$buffer = str_replace($search, $replace, $buffer);

        $questions = $_POST["question"];

	$buffer2 = "<h2> SEO Questionnaire</h2><table border=0 width=70%>";

	if(count($questions)>0)
		foreach($questions as $q) {
			$i=0;
			$j++;
			$buffer2 .="<tr><td><br/><br/><b>$j.".$q[0]."</b></td></tr>";
			foreach($q as $answer) {
				if($i) {
					if(!empty($answer)) {						
						$buffer2 .=  "<tr><td>Ans: $answer</td></tr>";
					}
				}			
				$i++;
			}


	
	}
}

$buffer2 .= "</table>";
$buffer .= $buffer2;



$mail = new PHPMailer();
$mail->IsHTML(true);
$mail->From = "".$email;
$mail->FromName = "seo@nepallink.net";
//$mail->AddAddress("info@nepallink.net");
$mail->AddAddress("sarose@nepallink.net");

$mail->Subject = "SEO Questionnaire Form Result";
$mail->Body = $buffer;

if(!$mail->Send())
{
 echo 'Message was not sent.';
 echo 'Mailer error: ' . $mail->ErrorInfo;
}

session_destroy();
header("Location: ".$pages["success"]);
?>

<?php
function cleanup($p)
{
$v = $_POST[$p];
$v = trim($v);
return $v;
}
?>
