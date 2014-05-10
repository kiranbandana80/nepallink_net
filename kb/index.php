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

// ################### SET PHP ENVIRONMENT ######################
error_reporting(E_ALL & ~E_NOTICE);

// ################### BACK END ######################
require_once('includes/global.php');
require_once(BASE_DIR .'includes/classes/kernel/Category.php');
$Category= new Category($db);
$template->assign('parent_categories', $Category->Parent_Categories());
$template->assign('js_tree', $Category->js_tree(1,0));
$template->assign('breadcrumb', $Category->breadcrumb(0,0));
// ################### CONTROLLER ######################
if(!empty($_REQUEST['cmd']))
{
	//need to add error checking and cleaning here
	$cmd=mysql_real_escape_string($_REQUEST['cmd']);
}

$file = BASE_DIR ."core/front/$cmd.php";
if (file_exists($file))
{
	require_once($file);
}
else
{
	require_once('core/front/index.php');
}

// ################## TEMPLATE ############################
$template->display('layout.tpl');
?>