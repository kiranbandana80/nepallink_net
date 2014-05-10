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

//function safe add slashes.
function safeAddSlashes($string) 
{
	if (get_magic_quotes_gpc()) 
	{
		return $string;
	}
	else 
	{
		return addslashes($string);
	}
}
//function safe strip slashes.
function safeStripSlashes($string) 
{
	if (get_magic_quotes_gpc()) 
	{
		return stripslashes($string);
	}
	else 
	{
		return $string;
	}
}
//login function
function login($username, $status, $auth) 
{
	global $template;
	$template->assign('status', $status);
	$template->assign('target', 'admin.php');
	$template->display('login.tpl');
	die();
}
/**
* return a list of all categories
* 
* Query the database and return an array of all categories.
*/
function cat_tree($prefix, $parent=0)
{
	global $db;
	$arr = array();
	$sSQL="SELECT cID,cName,cDescription FROM ".PREFIX."categories WHERE parent_id=".$parent." AND cDisplay='Y' ORDER BY cOrder DESC, cName ASC";
	$result=$db->query($sSQL);
	while ($rs=$result->fetchRow())
	{
		$id=$rs['cID'];
		$row['cName'] = $prefix . $rs['cName'];
		$row['cID']=$id;
		array_push($arr, $row);
		$arr = array_merge($arr, cat_tree($prefix ."&nbsp;&nbsp;&raquo;&nbsp;", $id));
	}
	return $arr;
}
?>