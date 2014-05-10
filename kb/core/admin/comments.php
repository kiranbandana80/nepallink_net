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
defined( 'IN_KB' ) or die( 'Restricted access' );

// ################### CORE ######################
require_once 'Pager/Pager.php'; 
require_once 'Pager/Pager_Wrapper.php';

// ################### COMMENTS ######################
$act = ( empty($_POST['act']) ) ? 1 : $_POST['act'];
$action = ( empty($_POST['action']) ) ? 1 : $_POST['action'];
$mode = ( empty($_REQUEST['mode']) ) ? 1 : $_REQUEST['mode'];
$id = ( empty($_REQUEST['id']) ) ? 1 : (int)$_REQUEST['id'];

	if(isset($act) && $act=='delete')
	{
		//delete the category
		$sSQL='DELETE FROM '.PREFIX.'comments WHERE cID='.$id.' LIMIT 1';
		$result=$db->query($sSQL);
		if (DB::isError($result))
		{
			//not successfull
			$template->assign('go',FALSE);
			$template->assign('location', 'admin.php?cmd=comments');
			$template->assign('body','forward.tpl');
		}
		else
		{
			$template->assign('go', TRUE);
			$template->assign('location', 'admin.php?cmd=comments');
			$template->assign('body', 'forward.tpl');
		}
	}
	elseif(isset($act) && $act=='approve')
	{
		//delete the category
		$sSQL='UPDATE '.PREFIX.'comments SET cApproved="Y" WHERE cID='.$id.' LIMIT 1';
		$result=$db->query($sSQL);
		if (DB::isError($result))
		{
			//not successfull
			$template->assign('go',FALSE);
			$template->assign('location', 'admin.php?cmd=comments');
			$template->assign('body','forward.tpl');
		}
		else
		{
			$template->assign('go', TRUE);
			$template->assign('location', 'admin.php?cmd=comments');
			$template->assign('body', 'forward.tpl');
		}
	}
	elseif(isset($mode) && $mode=='edit')
	{
		//get the category they want to edit. 
		$sSQL='SELECT cID,cName,cEmail,cAID,cComments,cDate,cApproved FROM '.PREFIX.'comments WHERE cID='. $id;
		$result = $db->query($sSQL);
		$row=$result->fetchRow();
		
		//format the template
		$template->assign('action','edit');
		$template->assign('cID',$row['cID']);
		$template->assign('cName',$row['cName']);
		$template->assign('cEmail',$row['cEmail']);
		$template->assign('cAID',$row['cAID']);
		$template->assign('cComments',$row['cComments']);
		$template->assign('cApproved',$row['cApproved']);
		$template->assign('body', 'kbadmin_comments_edit.tpl');
	}
	elseif(isset($mode) && $mode=='add')
	{
		$template->assign('body', 'kbadmin_comments_edit.tpl');
	}
	elseif(isset($action) && $action=='edit')
	{
		$sSQL='UPDATE '.PREFIX.'comments SET cName='. $db->quoteSmart($_POST['cName']) .',cEmail='. $db->quoteSmart($_POST['cEmail']) .',cAID='.(int)$_POST['cAID'].',cComments='. $db->quoteSmart($_POST['cComments']) .',cApproved='.$db->quoteSmart($_POST['cApproved']).' WHERE cID='. $id;
		$result=$db->query($sSQL);
		if (DB::isError($result))
		{
			//not successfull
			$template->assign('go',FALSE);
			$template->assign('location', 'admin.php?cmd=comments');
			$template->assign('body','forward.tpl');
		}
		else
		{
			$template->assign('go', TRUE);
			$template->assign('location', 'admin.php?cmd=comments');
			$template->assign('body', 'forward.tpl');
		}
	}
	else
	{
		$sSQL='SELECT cID,cName,cEmail,cAID,cComments,cDate,cApproved FROM '.PREFIX.'comments WHERE 1=1';
		$sSQL .= ( empty($_GET['q']) ) ? '': " AND (cName LIKE '%".$_GET['q']."%' OR cEmail LIKE '%".$_GET['q']."%' OR cComments LIKE '%".$_GET['q']."%' )";
		$sSQL .= ( empty($_GET['aid']) ) ? '': " AND (cAID = ".(int)$_GET['aid'].")";
		$sSQL .= ( empty($_GET['approved']) ) ? '': " AND (cAID = '".$_GET['approved']."')";
		$sSQL .= " ORDER BY cDate DESC";
		
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
		$template->assign('body', 'kbadmin_comments.tpl');
	}
?>
