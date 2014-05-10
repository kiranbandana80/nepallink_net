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
require_once(BASE_DIR ."includes/classes/kernel/Articles.php");
$Articles=new Articles($db);
$id = ( empty($_REQUEST['id']) ) ? 1 : (int)$_REQUEST['id'];

// ################### ADD COMMENT ######################
if(isset($_POST['action']) && $_POST['action']=="addcomment")
{
	$fullname=@$_POST['fullname'];
	$email=@$_POST['email'];
	$comments=@$_POST['comments'];
	$id=$_POST['id'];
	$manual_approve=$KB->settings['manual_approve_comments'];
	$approved="N";
	if($KB->settings['manual_approve_comments'] != "Y")
	{
		$approved="Y";
	}
	if($Articles->AddComment($fullname,$email,$comments,$id, $approved))
	{
		$template->assign('addedcomment', 'TRUE');	
	}
}

// ################### GET ARTICLE ######################
$modules->call_hook('GetArticle', $id);
$article=$Articles->GetArticle($id);
$template->assign('attachments', $Articles->GetAttachments($id));
$template->assign('comments', $Articles->GetComments($id));
$template->assign('allowcomments', $KB->settings['comments']);

// ################### DISPLAY TEMPLATE ######################
if(!empty($_GET['action']) && $_GET['action']=="print")
{
	$modules->call_hook('PrintArticle', $id);
	$template->display('articleprint.tpl');
	die;
}
else
{
	$template->assign('body', 'article.tpl');
}
?>