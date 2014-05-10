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

// ################### GET QUERY ######################
	//what do they want to see?  
	if(isset($_GET['q']))
	{
		if($q=="#")
		{
			$sSQL = "SELECT gID,gTerm,gDefinition FROM ".PREFIX."glossary WHERE gTerm LIKE '.%' OR gTerm LIKE '0%' OR gTerm LIKE '1%' OR gTerm LIKE '2%' OR gTerm LIKE '3%' OR gTerm LIKE '4%' OR gTerm LIKE '5%' OR gTerm LIKE '6%' OR gTerm LIKE '7%' OR gTerm LIKE '8%' OR gTerm LIKE '9%' ORDER BY gTerm";
		}
		else
		{
			$q=mysql_real_escape_string($_REQUEST['q']);
			$sSQL = 'SELECT gID,gTerm,gDefinition FROM '.PREFIX.'glossary WHERE ';
			$sSQL .= ( empty($_REQUEST['q']) ) ? '': " gTerm LIKE '". $q ."%'";
			$sSQL .= ' ORDER BY gTerm';
		}
	}
	else
	{
		$sSQL = 'SELECT gID,gTerm,gDefinition FROM '.PREFIX.'glossary ORDER BY gTerm';
	}
	
	$result=$db->query($sSQL);
	while($rs=$result->fetchRow())
	{
		$terms[]=$rs;
	}
	
	// Use of character sequences introduced in 4.1.0
	// array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i');
	// we uppercase this through smarty
	$letter=range('a', 'z');
	
	//format the template

	$template->assign('terms',$terms);
	$template->assign('letter',$letter);
	$template->assign('catTitle',LANG_GLOSSARY);
	$template->assign('body', 'glossary.tpl');
?>