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

$act = ( empty($_REQUEST['act']) ) ? 1 : $_REQUEST['act'];
$action = ( empty($_REQUEST['action']) ) ? 1: $_REQUEST['action'];
$mode = ( empty($_REQUEST['mode']) ) ? 1 : $_REQUEST['mode'];
$id = ( empty($_REQUEST['id']) ) ? 1 : (int)$_REQUEST['id'];

if(isset($act) && $act=='delete')
{
	//delete the user
	$sSQL='DELETE FROM '.PREFIX.'members WHERE aID='.$id.' LIMIT 1';
	$db->query($sSQL);
	if (PEAR::isError($db))
	{
		//not successfull
		$template->assign('go',FALSE);
		$template->assign('location', 'admin.php?cmd=users');
		$template->assign('body','forward.tpl');
	}
	else
	{
		$template->assign('go', TRUE);
		$template->assign('location', 'admin.php?cmd=users');
		$template->assign('body', 'forward.tpl');
	}
}
elseif(isset($mode) && $mode=='edit')
{ 
	$sSQL='SELECT mID,mUsername,mEmail,mPassword FROM '.PREFIX.'members WHERE mID='. $id;
	$result = $db->query($sSQL);
	$row=$result->fetchRow();
	
	//format the template
	$template->assign('action','edit');
	$template->assign('mID',$row['mID']);
	$template->assign('mUsername',$row['mUsername']);
	$template->assign('mEmail',$row['mEmail']);
	$template->assign('mPassword', $row['mPassword']);
	$template->assign('body', 'kbadmin_users_edit.tpl');
}
elseif(isset($mode) && $mode=='add')
{
	$template->assign('body', 'kbadmin_users_edit.tpl');
}
elseif(isset($action) && $action=='edit')
{
	$sSQL='UPDATE '.PREFIX.'members SET mUsername='. $db->quoteSmart($_POST['mUsername']) .',mEmail='. $db->quoteSmart($_POST['mEmail']);
	if($_POST['mPassword'] && $_POST['mPassword2'])
	{
		if($_POST['mPassword']==$_POST['mPassword2'])
		{
			$sSQL.=', mPassword="'.md5($_POST['mPassword']).'"';
		}
	}
	$sSQL .= ' WHERE mID='. $id;
	$db->query($sSQL);
	if (PEAR::isError($db))
	{
		//not successfull
		$template->assign('go',FALSE);
		$template->assign('location', 'admin.php?cmd=users');
		$template->assign('body','forward.tpl');
	}
	else
	{
		$template->assign('go', TRUE);
		$template->assign('location', 'admin.php?cmd=users');
		$template->assign('body', 'forward.tpl');
	}
}
elseif(isset($action) && $action=='add')
{
	$sSQL='INSERT INTO '.PREFIX.'members (mUsername,mEmail,mPassword) VALUES ('. $db->quoteSmart($_POST['mUsername']) .','. $db->quoteSmart($_POST['mEmail']) .', "'.md5($_POST['mPassword']).'")';
	$db->query($sSQL);
	if (PEAR::isError($db))
	{
		//not successfull
		$template->assign('go',FALSE);
		$template->assign('location', 'admin.php?cmd=users');
		$template->assign('body','forward.tpl');
	}
	else
	{
		$template->assign('go', TRUE);
		$template->assign('location', 'admin.php?cmd=users');
		$template->assign('body', 'forward.tpl');
	}
}
else
{
	//get the user information
	$sSQL='SELECT mID,mUsername,mEmail FROM '.PREFIX.'members ORDER BY mUsername DESC';
	$result = $db->query($sSQL);
	$data = array();
	$i=0;
	while ($row=$result->fetchRow()) 
	{
		$data[]=$row;
	}
	
	//format the template
	$template->assign('data',$data);
	$template->assign('body', 'kb_users.tpl');
}
?>
