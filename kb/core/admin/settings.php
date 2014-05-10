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

// ################### CORE ######################
require_once 'Pager/Pager.php'; 
require_once 'Pager/Pager_Wrapper.php';
require_once(BASE_DIR ."includes/classes/kernel/Articles.php");
$Articles=new Articles($db);
$allcats=cat_tree('');
$template->assign('parent_categories', $allcats);

// ################### SETTINGS ######################
$action = ( empty($_POST['action']) ) ? 1 : $_POST['action'];
$id = ( empty($_REQUEST['id']) ) ? 1 : (int)$_REQUEST['id'];

if(isset($action) && $action=='edit')
{	
	foreach ($_POST as $key => $value)
	{
		if(is_int($key))
		{
			$id=$key;
			// Update the database with the value
			$sSQL='UPDATE '.PREFIX.'settings SET value = '.$db->quoteSmart($value).' WHERE (sID = '.$id.')';
			$db->query($sSQL);
		}
	}
	$modules->call_hook('EditSettings', '');
	$template->assign('go', TRUE);
	$template->assign('location', 'admin.php?cmd=settings');
	$template->assign('body','forward.tpl');
}
else
{
	//get the info
	$location = 'templates/';
	if ($handle = opendir($location)) 
	{
		while (false !== ($file = readdir($handle))) 
		{
			if ($file != "." && $file != ".." && $file != "admin" && $file != "CVS" && $file != "modules" && $file != "index.html") 
			{
				$templates[]=$file;
			}
	   }
	   closedir($handle);
	}
	$location = 'language/';
	if ($handle = opendir($location)) 
	{
		while (false !== ($file = readdir($handle))) 
		{
			if ($file != "." && $file != ".." && $file != "index.html") 
			{
				$language[]="language/".$file;
			}
	   }
	   closedir($handle);
	}
	
	$sSQL='SELECT sID, short_name,name,value,type FROM '.PREFIX.'settings WHERE short_name<>"version" ORDER BY sID';
	$result = $db->query($sSQL);
	while($row=$result->fetchRow())
	{
		$data[]=$row;
	}
	//format the template
	$template->assign('action','edit');
	$template->assign('data',$data);
	$template->assign('templates',$templates);
	$template->assign('language',$language);
	$modules->call_hook('EditSettingsForm', '');
	$template->assign('body', 'kbadmin_settings.tpl');
}
?>