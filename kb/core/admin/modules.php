<?php
/**********************************
* BarnesKB 0.0.1
* http://www.barnesinnovations.com
**********************************
* Copyright Barnes Innovations 2006
*
* @author $Author: Eric $
* @version $Revision: 130 $
* @package BarnesKB
*
* Updated: $Date: 2005-11-05 16:39:52 +0000 (Sat, 05 Nov 2005) $
*/
	
defined( 'IN_KB' ) or die( 'Restricted access' );

if(isset($_REQUEST['mod']))
{
	$mod=$modules->getModuleByName($_REQUEST['mod']);
	if (@file_exists(BASE_DIR .'modules/'.$mod['directory'].'/admin.php'))
	{
		$template = & new Template($mod['name']);
		$template->assign('kbtitle', $KB->settings['site_name']);
		require_once(BASE_DIR .'modules/'.$mod['directory'].'/admin.php');
	}
	else
	{
		// Goes back to index
		header('Location: admin.php');		
		exit();	
	}
}
else
{
	// Goes back to index
	header('Location: admin.php');		
	exit();	
}
?>