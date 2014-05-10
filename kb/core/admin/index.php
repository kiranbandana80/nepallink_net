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

	//get statitics
	$sSQL='SELECT COUNT(*) AS articles FROM '.PREFIX.'articles';
	$result=$db->query($sSQL);
	$row=$result->fetchRow();
	$articles=$row['articles'];
	
	$sSQL='SELECT COUNT(*) AS categories FROM '.PREFIX.'categories';
	$result=$db->query($sSQL);
	$row=$result->fetchRow();
	$categories=$row['categories'];
	
	$sSQL='SELECT COUNT(*) AS comments FROM '.PREFIX.'comments';
	$result=$db->query($sSQL);
	$row=$result->fetchRow();
	$comments=$row['comments'];
	
	//format the template
	$template->assign('articles',$articles);
	$template->assign('categories',$categories);
	$template->assign('comments',$comments);
	$template->assign('body', 'home.tpl');
?>