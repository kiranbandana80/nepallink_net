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

// ################### BACK END ######################
require_once 'Pager/Pager.php'; 
require_once 'Pager/Pager_Wrapper.php';
$id = ( empty($_GET['id']) ) ? 1 : (int)$_GET['id'];

// ################### CATEGORY NAME ######################
$path=$Category->breadcrumb($id,0);
$sSQL='SELECT cName FROM '.PREFIX.'categories WHERE cID='.$id;
$result=$db->query($sSQL);
$rs=$result->fetchRow();
$catTitle=$rs['cName'];
$result->free();

// ################### SUBCATEGORYS ######################
$sSQL='SELECT cID, parent_id, cName,cDescription FROM '.PREFIX.'categories WHERE cDisplay="Y" AND parent_id='. $id.' ORDER BY cORDER ASC, cName ASC';
$result = $db->query($sSQL);
$catrows = $result->numRows();
$category = array();
while ($row = $result->fetchRow())
{
	$category[]=$row;
}
$result->free();
$template->assign('category',$category);
$template->assign('catrows',$catrows);

// ################### ARTICLES ######################

$sSQL="SELECT article_id FROM ".PREFIX."article2cat WHERE category_id=".$id;
$result = $db->query($sSQL);
$totalItems = (int)$result->numRows();
$count=1;
$aID='';
while ($row = $result->fetchRow())
{
	if($count<$totalItems)
	{
		$comma=", ";
	}
	else
	{
		$comma="";	
	}
	$aID.=$row['article_id']. $comma;
	$count++;
}
if($aID<>"")
{
	$sSQL='SELECT aID,aTitle,aShortDesc,aDate,aHits FROM '.PREFIX.'articles WHERE aID IN ('.$aID.') AND aDisplay="Y" ORDER BY aDate';
	$params = array(
	    'mode'       => 'Sliding',
	    'perPage'    => $KB->settings['max_search'],
	    'delta'      => 2,
	    'urlVar'    => 'num',
	    'spacesBeforeSeparator' => '1',
	    'spacesAfterSeparator' => '1',
	);
	$results=Pager_Wrapper_DB(&$db, $sSQL, $params);
}

$template->assign('data', $results['data']);
$template->assign('maxPage', $results['page_numbers']['total']);
$template->assign('pageNum', $results['page_numbers']['current']);
$template->assign('numrows', $results['totalItems']);
$template->assign('links', $results['links']);

// ################### DISPLAY TEMPLATE ######################
$template->assign('breadcrumb', $path);
$template->assign('catTitle', $catTitle);
$template->assign('body', 'category.tpl');
?>