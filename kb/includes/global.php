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
	session_start();

	define( 'IN_KB', 1 );

	//Find out what directory we're in
	if (substr(PHP_OS, 0, 3) == "WIN")
	{
		$base_dir = str_replace('includes\\global.php', '', realpath(__FILE__));
		$pear_dir = $base_dir.'includes\\classes\\pear';
	}
	else
	{
		$base_dir = str_replace('includes/global.php', '', realpath(__FILE__));
		$pear_dir = $base_dir.'includes/classes/pear';
	}
	define("BASE_DIR", $base_dir);
	
	// For PEAR packages
	ini_set('include_path', ini_get('include_path').PATH_SEPARATOR.$pear_dir);
	require_once(BASE_DIR .'/config.php');
	
	// Include Database class
	require_once 'DB.php';
	
	// Setup Database Class
	$dsn = "mysql://$db_username:$db_password@$db_server/$db_name";
	$db = DB::connect($dsn);
	if (DB::isError($db))
	{
		die ($db->getMessage());
	}
	$db->setFetchMode(DB_FETCHMODE_ASSOC);
	
	//settings
	require_once(BASE_DIR .'includes/functions.php');
	require_once(BASE_DIR .'includes/classes/kernel/KB.php');
	$KB= new KB($db);
	$theme=$KB->settings['template'];
	
	//modules
	require_once(BASE_DIR .'includes/classes/kernel/Modules.php');
	$modules = new Modules($db);
	
	//mailer
	require_once(BASE_DIR .'includes/classes/kernel/Mailer.php');
	$mailer = new Mailer();
	
	//Smarty
	define("MAIN_TEMPLATE", $theme);
	require_once(BASE_DIR .'includes/classes/kernel/Template.php');
	$template = new Template();
	
	//general settings
	$url=$KB->settings['url'];
	//format the url//
	if((substr(strtolower($url),0,7) != "http://"))
		$url = "http://" . $url;
	if(substr($url,-1) == "/") $url = rtrim($url, '/');
		$template->assign('url', $url);
		
	//title
	$template->assign('kbversion', $KB->settings['version']);	
	$template->assign('kbtitle', $KB->settings['site_name']);
	
	//internal
	require_once(BASE_DIR .'/'. $KB->settings['language']);
	
	// Get rid of global variables (security). Idea from phpBB2.2
	if (@ini_get('register_globals'))
	{
		if (!empty($_REQUEST))
		{
			foreach ($_REQUEST as $name => $value)
			{
				unset(${$name});
			}
		}
	}
	
	// deal with magic_quotes nastiness in GPC data
	if (get_magic_quotes_gpc())
	{
		function exec_gpc_stripslashes(&$arr)
		{
			if (is_array($arr))
			{
				foreach($arr AS $_arrykey => $_arryval)
				{
					if (is_string($_arryval))
					{
						$arr["$_arrykey"] = stripslashes($_arryval);
					}
					else if (is_array($_arryval))
					{
						$arr["$_arrykey"] = exec_gpc_stripslashes($_arryval);
					}
				}
			}
			return $arr;
		}
		$_GET = exec_gpc_stripslashes($_GET);
		$_POST = exec_gpc_stripslashes($_POST);
		$_COOKIE = exec_gpc_stripslashes($_COOKIE);
		if (is_array($_FILES))
		{
			foreach ($_FILES AS $key => $val)
			{
				$_FILES[$key]['tmp_name'] = str_replace('\\', '\\\\', $val['tmp_name']);
			}
		}
		$_FILES = exec_gpc_stripslashes($_FILES);
		$_REQUEST = array_merge($_GET, $_POST, $_COOKIE);
	}
	set_magic_quotes_runtime(0);
?>
