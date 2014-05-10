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
	if (!$Articles->DeleteArticle($id))
	{
		//not successfull
		$template->assign('go',FALSE);
		$template->assign('error', $db->getMessage());
		$template->assign('location', 'admin.php?cmd=articles');
		$template->assign('body','admin/forward.tpl');
	}
	else
	{
		$template->assign('go', TRUE);
		$template->assign('location', 'admin.php?cmd=articles');
		$template->assign('body', 'forward.tpl');
	}
}
elseif(isset($act) && $act=='add')
{
	//add an article
	$sSQL='INSERT INTO '.PREFIX.'articles (aDate,aCat,aTitle,aDisplay,aShortDesc,aDescription,aLastModified,aAuthor) ' .
			'VALUES (' .
				'NOW(),
				'.(int)$_POST['aCat'] .',
				'.$db->quoteSmart($_POST['aTitle']).',
				'.$db->quoteSmart($_POST['aDisplay']).',
				'.$db->quoteSmart($_POST['aShortDesc']).',
				'.$db->quoteSmart($_POST['aDescription']).',
				NOW(), ' .
				''.$_SESSION['_authsession']['data']['mID'].'' .
			')';
	$result=$db->query($sSQL);
	//get the last insert id. Pear DB doesn't support this :(
	//$id = mysql_insert_id($db);
	//$tmp = $db->createSequence('articleID');
	//$id = $db->nextId('articleID');
	$sSQL='SELECT LAST_INSERT_ID() FROM '.PREFIX.'articles';
	$result=$db->query($sSQL);
	$lastid=$result->fetchRow();
	$id=$lastid['LAST_INSERT_ID()'];
	$modules->call_hook('AddArticle', $id);
		if (PEAR::isError($db))
		{
			//not successfull
			$template->assign('go',FALSE);
			$template->assign('error', $db->getMessage());
			$template->assign('location', 'admin.php?cmd=articles');
			$template->assign('body','admin/forward.tpl');
		}
		else
		{
			//handle the new categories//
			$cat="";
			if(is_array(@$_POST["cat"]))
			{
				foreach(@$_POST["cat"] as $catObj)
				{
					$cat += $catObj;
					$sSQL= "INSERT INTO ".PREFIX."article2cat (article_id,category_id) VALUES (".$db->quoteSmart($id).",".$db->quoteSmart($catObj).")";
					$db->query($sSQL);
				}
			}
			//do they have any attachments
				foreach ($_FILES["userfile"]["error"] as $key => $error) 
				{
					if ($error == UPLOAD_ERR_OK) 
					{
						$tmp_name = $_FILES["userfile"]["tmp_name"][$key];
						$name = $_FILES["userfile"]["name"][$key];
						$type = $_FILES["userfile"]["type"][$key];
						$size = $_FILES["userfile"]["size"][$key];
						move_uploaded_file($tmp_name, "uploads/".$id."_".$name);
						//now insert
						$sSQL='INSERT INTO '.PREFIX.'attachments (aArticleID, aName, aType, aSize) VALUES ('.$id.', "'.$id.'_'.mysql_real_escape_string($name).'", "'.$type.'", "'.$size.'")';
						$db->query($sSQL);
				   }
				}
			$template->assign('go', TRUE);
			$template->assign('location', 'admin.php?cmd=articles');
			$template->assign('body', 'forward.tpl');
		}
}
elseif(isset($act) && $act=='edit')
{
	if($_POST['aDisplay']=="")
	{
		$_POST['aDisplay']="N";
	}
	$sSQL='UPDATE '.PREFIX.'articles SET ' .
				'aCat='. $db->quoteSmart($_POST['aCat']) .',' .
				'aTitle='.$db->quoteSmart($_POST['aTitle']).',' .
				'aDisplay='.$db->quoteSmart($_POST['aDisplay']).',' .
				'aShortDesc='.$db->quoteSmart($_POST['aShortDesc']).', ' .
				'aDescription='.$db->quoteSmart($_POST['aDescription']).', ' .
				'aLastModified=NOW() ' .
			'WHERE aID='. $id;
	$db->query($sSQL);
	if (PEAR::isError($db))
	{
		//not successfull
		$template->assign('go',FALSE);
		$template->assign('error', $db->getMessage());
		$template->assign('location', 'admin.php?cmd=articles');
		$template->assign('body','admin/forward.tpl');
	}
	else
	{
		$modules->call_hook('EditArticle', $id);
		//handle the new categories//
		$sSQL="DELETE FROM ".PREFIX."article2cat WHERE article_id=".$id;
		$db->query($sSQL);
		$cat="";
			if(is_array(@$_POST["cat"]))
			{
				foreach(@$_POST["cat"] as $catObj)
				{
					$cat += $catObj;
					$sSQL= "INSERT INTO ".PREFIX."article2cat (article_id,category_id) VALUES (".$db->quoteSmart($id).",".$db->quoteSmart($catObj).")";
					//echo $sSQL.'<br>';
					$db->query($sSQL);
				}
			}
		//do they want to delete any attachments? 
		foreach(@$_POST as $objItem => $objValue)
		{
			if(substr($objItem,0,6)=="attach" && $objValue<>"")
			{
				$id = (int) str_replace("attach", "", $objItem);
				$sSQL='SELECT aName FROM '.PREFIX.'attachments WHERE aID='.$id;
				$result = $db->query($sSQL);
				if($result->size() ==1)
				{
					//found one now lets delete it
					$rs=$result->fetch();
					@unlink('uploads/'.$rs['aName']);
					$sSQL='DELETE FROM '.PREFIX.'attachments WHERE aID='.$id;
					$db->query($sSQL);
				}
			}
		}
			//do they have any attachments
			foreach ($_FILES["userfile"]["error"] as $key => $error) 
			{
				if ($error == UPLOAD_ERR_OK) 
				{
					$tmp_name = $_FILES["userfile"]["tmp_name"][$key];
					$name = $_FILES["userfile"]["name"][$key];
					$type = $_FILES["userfile"]["type"][$key];
					$size = $_FILES["userfile"]["size"][$key];
					move_uploaded_file($tmp_name, "uploads/".$id."_".$name);
					//now insert
					$sSQL='INSERT INTO '.PREFIX.'attachments (aArticleID, aName, aType, aSize) VALUES ('.$id.', "'.$id.'_'.mysql_real_escape_string($name).'", "'.$type.'", "'.$size.'")';
					$db->query($sSQL);
			   }
			}
		$template->assign('go', TRUE);
		$template->assign('location', 'admin.php?cmd=articles');
		$template->assign('body', 'forward.tpl');
	}
}
elseif(isset($mode) && $mode=='add')
{
	$modules->call_hook('AddArticleForm', $id);
	//get the categories
	$template->assign('cat',$Articles->selected_cat_tree("", 0, $id));
	$template->assign('body', 'kbadmin_articles_edit.tpl');
}
elseif(isset($mode) && $mode=='edit')
{
	//get the article they want to edit. 
	$sSQL='SELECT aID,aTitle,aShortDesc,aDescription,aDisplay FROM '.PREFIX.'articles WHERE aID='. $id;
	$result = $db->query($sSQL);
	$row=$result->fetchRow();
	
	//format the template
	$template->assign('action','edit');
	$template->assign('aID',$row['aID']);
	$template->assign('aTitle',$row['aTitle']);
	$template->assign('aShortDesc', $row['aShortDesc']);
	$template->assign('aDescription',$row['aDescription']);
	$template->assign('aDisplay',$row['aDisplay']);
	
	//get the categories
	$template->assign('cat',$Articles->selected_cat_tree("", 0, $id));
	
	//get any attachments
	$sSQL='SELECT aID,aName,aType,aSize FROM '.PREFIX.'attachments WHERE aArticleID='.$id;
	$result=$db->query($sSQL);
	while($attach=$result->fetchRow())
	{
		$attachments[]=$attach;
	}
	$template->assign('attachments',$attachments);
	$modules->call_hook('EditArticleForm', $id);
	$template->assign('body', 'kbadmin_articles_edit.tpl');
}
else
{
	//get a list of articles
	$sSQL='SELECT aID,aTitle,aDate,aHits,aDisplay,aLastModified,cName FROM '.PREFIX.'articles LEFT JOIN '.PREFIX.'categories ON aCat=cID WHERE 1=1';
	$sSQL .= ( empty($_GET['q']) ) ? '': " AND (aTitle LIKE '%".mysql_escape_string($_GET['q'])."%' OR aDescription LIKE '%".mysql_escape_string($_GET['q'])."%')";
	$sSQL .= " ORDER BY aCat ASC, aDate DESC";
	
	$params = array(
	    'mode'       => 'Sliding',
	    'perPage'    => $KB->settings['max_search'],
	    'delta'      => 2,
	    'urlVar'    => 'num',
	    'spacesBeforeSeparator' => '1',
	    'spacesAfterSeparator' => '1',
	);
	$results=Pager_Wrapper_DB(&$db, $sSQL, $params);
	$i=0;
	foreach($results['data'] as $value)
	{
		$catName='';
		$id=$value['aID'];
		$catSQL="SELECT cName FROM ".PREFIX."article2cat LEFT JOIN ".PREFIX."categories ON category_id=cID WHERE article_id=".$value['aID']." ORDER BY cOrder ASC";
		$result=$db->query($catSQL);
		$totalItems = (int)$result->numRows();
		$count=1;
		while($cat=$result->fetchRow())
		{
			if($count<$totalItems)
			{
				$comma=", ";
			}
			else
			{
				$comma="";	
			}
			$catName[]=$cat['cName']. $comma;
			$count++;
		}
		$results['data']["$i"]['cName']=$catName;
		$i++;
	}
	$template->assign('data', $results['data']);
	
	$template->assign('maxPage', $results['page_numbers']['total']);
	$template->assign('pageNum', $results['page_numbers']['current']);
	$template->assign('numrows', $results['totalItems']);
	$template->assign('links', $results['links']);
	$modules->call_hook('ListArticles', $id);
	$template->assign('body', 'kb_articles.tpl');
}
?>