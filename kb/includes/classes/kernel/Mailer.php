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
* @category Kernel
*
* Updated: $Date: 2005-11-05 16:39:52 +0000 (Sat, 05 Nov 2005) $
*/

require_once(BASE_DIR .'includes/classes/phpmailer/class.phpmailer.php');

class Mailer extends PHPMailer
{
	var $priority = 3;
	var $to_name;
	var $to_email;
	var $From = null;
	var $FromName = null;
	var $Sender = null;
	
	function Mailer()
	{
		global $site, $peanut;
		// Comes from config.php $site array
		if($site['smtp_mode'] == 'enabled')
		{
			$this->Host = $site['smtp_host'];
			$this->Port = $site['smtp_port'];
			if($site['smtp_username'] != '')
			{
			$this->SMTPAuth  = true;
			$this->Username  = $site['smtp_username'];
			$this->Password  =  $site['smtp_password'];
			}
			$this->Mailer = "smtp";
		}
		if(!$this->From)
		{
			$this->From = $peanut->settings['contact_email'];
		}
		if(!$this->FromName)
		{
			$this-> FromName = $peanut->settings['site_name'];
		}
		if(!$this->Sender)
		{
			$this->Sender = $site['from_email'];
		}
		$this->Priority = $this->priority;
	}
}
?>
