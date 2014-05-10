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

// ################### ARTICLES ######################
$act = ( empty($_POST['act']) ) ? 1 : $_POST['act'];
$mode = ( empty($_REQUEST['mode']) ) ? 1 : $_REQUEST['mode'];
$id = ( empty($_REQUEST['id']) ) ? 1 : (int)$_REQUEST['id'];

if(isset($act) && $act=='delete')
{
	//delete the article
	$sSQL='DELETE FROM '.PREFIX.'glossary WHERE gID='.$id.' LIMIT 1';
	$db->query($sSQL);
	if (PEAR::isError($db))
	{
		//not successfull
		$template->assign('go',FALSE);
		$template->assign('location','admin.php?cmd=glossary');
		$template->assign('body','forward.tpl');
	}
	else
	{
		$template->assign('go', TRUE);
		$template->assign('location', 'admin.php?cmd=glossary');
		$template->assign('body', 'forward.tpl');
	}
}
elseif(isset($act) && $act=='add')
{
	$sSQL='INSERT INTO '.PREFIX.'glossary (gTerm,gDefinition) VALUES ('. $db->quoteSmart($_POST['gTerm']) .', '. $db->quoteSmart($_POST['gDefinition']) .')';	
	$db->query($sSQL);
	if (PEAR::isError($db))
	{
		//not successfull
		$template->assign('go',FALSE);
		$template->assign('location','admin.php?cmd=glossary');
		$template->assign('body','forward.tpl');
	}
	else
	{
		$template->assign('go', TRUE);
		$template->assign('location', 'admin.php?cmd=glossary');
		$template->assign('body', 'forward.tpl');
	}
}
elseif(isset($act) && $act=='edit')
{
	$sSQL='UPDATE '.PREFIX.'glossary SET ' .
				'gTerm='. $db->quoteSmart($_POST['gTerm']) .',' .
				'gDefinition='.$db->quoteSmart($_POST['gDefinition']).'' .
			' WHERE gID='. $id;
	$db->query($sSQL);
	if (PEAR::isError($db))
	{
		//not successfull
		$template->assign('go',FALSE);
		$template->assign('location','admin.php?cmd=glossary');
		$template->assign('error', $db->getMessage());
		$template->assign('body','forward.tpl');
	}
	else
	{
		$template->assign('go', TRUE);
		$template->assign('location', 'admin.php?cmd=glossary');
		$template->assign('body', 'forward.tpl');
	}
}
elseif(isset($mode) && $mode=='add')
{
	$template->assign('body', 'kbadmin_glossary_edit.tpl');
}
elseif(isset($mode) && $mode=='edit')
{
	//get the term they want to edit. 
	$sSQL='SELECT gID,gTerm,gDefinition FROM '.PREFIX.'glossary WHERE gID='. $id;
	$result = $db->query($sSQL);
	$row=$result->fetchRow();
	
	//format the template
	$template->assign('action','edit');
	$template->assign('gID',$row['gID']);
	$template->assign('gTerm',$row['gTerm']);
	$template->assign('gDefinition',$row['gDefinition']);
	$template->assign('body', 'kbadmin_glossary_edit.tpl');
}
else
{
	//get a list of articles
	$sSQL='SELECT gID,gTerm,gDefinition FROM '.PREFIX.'glossary WHERE 1=1';
	$sSQL .= ( empty($_GET['q']) ) ? '': " AND (gTerm LIKE '".mysql_real_escape_string($_GET['q'])."%')";
	$sSQL .= " ORDER BY gTerm DESC";
	
	$params = array(
	    'mode'       => 'Sliding',
	    'perPage'    => $KB->settings['max_search'],
	    'delta'      => 2,
	    'urlVar'    => 'num',
	    'spacesBeforeSeparator' => '1',
	    'spacesAfterSeparator' => '1',
	);
	$results=Pager_Wrapper_DB(&$db, $sSQL, $params);
	$template->assign('data', $results['data']);
	$template->assign('maxPage', $results['page_numbers']['total']);
	$template->assign('pageNum', $results['page_numbers']['current']);
	$template->assign('numrows', $results['totalItems']);
	$template->assign('links', $results['links']);
	$template->assign('body', 'kbadmin_glossary.tpl');
}
?>