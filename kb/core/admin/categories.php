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
require_once(BASE_DIR ."includes/classes/kernel/Category.php");
$Category=new Category($db);
$allcats=cat_tree('');
$template->assign('parent_categories', $allcats);

// ################### CATEGORIES ######################
$act = ( empty($_POST['act']) ) ? 1 : $_POST['act'];
$mode = ( empty($_REQUEST['mode']) ) ? 1 : $_REQUEST['mode'];
$id = ( empty($_REQUEST['id']) ) ? 1 : (int)$_REQUEST['id'];

if(isset($act) && $act=='delete')
{
	//delete the category
	if(!$Category->deleteCat($id))
	{
		//not successfull
		$template->assign('go',FALSE);
		$template->assign('location', 'admin.php?cmd=categories');
		$template->assign('body','forward.tpl');
	}
	else
	{
		$template->assign('go', TRUE);
		$template->assign('location', 'admin.php?cmd=categories');
		$template->assign('body', 'forward.tpl');
	}
}
elseif(isset($act) && $act=='add')
{
	//add a Category
	$sSQL='INSERT INTO '.PREFIX.'categories (parent_id,cName,cDisplay,cDescription) ' .
			'VALUES (' .
				$db->quoteSmart($_POST['parent_id']) .',
				'. $db->quoteSmart($_POST['cName']).',
				'. $db->quoteSmart($_POST['cDisplay']).',
				'. $db->quoteSmart($_POST['cDescription']).')';
	$result=$db->query($sSQL);
	if (PEAR::isError($db))
	{
		//not successfull
		$template->assign('go',FALSE);
		$template->assign('error', $db->getMessage());
		$template->assign('location', 'admin.php?cmd=categories');
		$template->assign('body','admin/forward.tpl');
	}
	else
	{
		$template->assign('go', TRUE);
		$template->assign('location', 'admin.php?cmd=categories');
		$template->assign('body', 'forward.tpl');
	}
}
elseif(isset($act) && $act=='edit')
{
	if($_POST['cDisplay'] == "")
	{
		$_POST['cDisplay']="N";
	}
	$sSQL='UPDATE '.PREFIX.'categories SET ' .
					'cOrder='. $db->quoteSmart($_POST['cOrder']).', ' .
					'parent_id='. $db->quoteSmart($_POST['parent_id']) .',' .
					'cName='.$db->quoteSmart($_POST['cName']).',' .
					'cDisplay='.$db->quoteSmart($_POST['cDisplay']).',' .
					'cDescription='.$db->quoteSmart($_POST['cDescription']).' ' .
				'WHERE cID='. $id;
	$db->query($sSQL);
	if (PEAR::isError($db))
	{
		//not successfull
		$template->assign('go',FALSE);
		$template->assign('error', $db->getMessage());
		$template->assign('location', 'admin.php?cmd=categories');
		$template->assign('body','admin/forward.tpl');
	}
	else
	{
		$template->assign('go', TRUE);
		$template->assign('location', 'admin.php?cmd=categories');
		$template->assign('body', 'forward.tpl');
	}
}
elseif(isset($mode) && $mode=='add')
{
	$template->assign('body', 'kbadmin_categories_edit.tpl');
}
elseif(isset($mode) && $mode=='edit')
{
	//get the category they want to edit. 
	$sSQL='SELECT cID, parent_id,cName,cDescription,cDisplay,cOrder FROM '.PREFIX.'categories WHERE cID='. $id;
	$result = $db->query($sSQL);
	$row=$result->fetchRow();
	
	//format the template
	$template->assign('action','edit');
	$template->assign('cID',$row['cID']);
	$template->assign('parent_id',$row['parent_id']);
	$template->assign('cName',$row['cName']);
	$template->assign('cDescription',$row['cDescription']);
	$template->assign('cDisplay',$row['cDisplay']);
	$template->assign('cOrder',$row['cOrder']);
	$template->assign('body', 'kbadmin_categories_edit.tpl');
}
else
{
	//get a list of articles
	$tree = $Category->admin_cat_tree("", 0);
	$max=count($tree);
	$template->assign('catTitle',$catTitle);
	$template->assign('data',$tree);
	$template->assign('max',$max);
	$template->assign('body', 'kbadmin_categories.tpl');
}
?>