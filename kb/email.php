<?php
/**********************************
* PeanutKB 0.0.1
* http://www.barnesinnovations.com
**********************************
* Copyright Barnes Innovations 2006
*
* @author $Author: Eric $
* @version $Revision: 130 $
* @package PeanutKB
*
* Updated: $Date: 2005-11-05 16:39:52 +0000 (Sat, 05 Nov 2005) $
*/

// ################### SET PHP ENVIRONMENT ######################
error_reporting(E_ALL & ~E_NOTICE);

// ################### BACK END ######################
require_once('includes/global.php');
if(isset($_REQUEST['cmd']) && $_REQUEST['cmd']=="email")
	{
		// Set the subject
		$subject=LANG_EMAIL_SUBJECT;
		$subject = str_replace("##to_name##", $_REQUEST['to_name'], $subject);
		$subject = str_replace("##to_email##", $_REQUEST['to_email'], $subject);
		$subject = str_replace("##from_name##", $_REQUEST['from_name'], $subject);
		$subject = str_replace("##from_email##", $_REQUEST['from_email'], $subject);
		$mailer->Subject = $subject; 
		// Body
		$body=LANG_EMAIL_BODY;
		$link=$url .'/index.php?cmd=article&id='.$_REQUEST['id'];
		$body = str_replace("##to_name##", $_REQUEST['to_name'], $body);
		$body = str_replace("##to_email##", $_REQUEST['to_email'], $body);
		$body = str_replace("##from_name##", $_REQUEST['from_name'], $body);
		$body = str_replace("##from_email##", $_REQUEST['from_email'], $body);
		$body = str_replace("##url##", $link, $body);
		
		$mailer->Body = $body;
		// Who is it from?
		$mailer->FromName = $_REQUEST['from_name'];
		$mailer->From = $_REQUEST['from_email'];
		// Add an address to send to.
		$mailer->AddAddress($_REQUEST['to_email'], $_REQUEST['to_name']);
		
		if(!$mailer->Send())
		{
		  echo 'There was a problem sending the email!';
		}
		else
		{
		  echo LANG_EMAIL_SENT;
		}
		$mailer->ClearAddresses(); 
	}
	else
	{
		//show the email form
		$template->assign('id', $_REQUEST['id']);
		$template->assign('kbtitle', $peanut->settings['site_name']);
		$template->display('emailform.tpl');
	}
?>