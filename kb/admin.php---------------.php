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
session_start();
error_reporting(E_ALL & ~E_NOTICE);
define( 'IN_ADMIN', TRUE);

// ################### BACK END ######################
require_once('includes/global.php');
require_once 'Auth.php';
$a = new Auth('DB',
	array(
		'table' => PREFIX.'members',
		'usernamecol' => 'mUsername',
		'passwordcol' => 'mPassword',
		'cryptType' => 'md5',
		'dsn' => $dsn,
		'db_fields' => '*'
		),
	'login', # login function name
	true #show login?
);
// Auth the user
$a->start();
$template->assign('username', $_SESSION['_authsession']['username']);
$template->assign('html_integration', $KB->settings['html_integration']);
// Check for logout
if (isset($_REQUEST['action']) && $_REQUEST['action']=="logout" && $a->getAuth()) 
{
	$a->start();
	$a->logout();
	session_destroy();
	header("Location: admin.php");
	exit();
}

// ################### CONTROLLER ######################
if(!empty($_REQUEST['cmd']))
{
	//need to add error checking and cleaning here
	$cmd=$_REQUEST['cmd'];	
}

$file = BASE_DIR ."core/admin/$cmd.php";
if (file_exists($file)) 
{
	$template->assign('active', $cmd);
	require_once($file);
}
else
{
	require_once('core/admin/index.php');
}

// ################## TEMPLATE ############################
$template->assign('kbtitle', $KB->settings['site_name']);
$template->display('layout.tpl');
?>