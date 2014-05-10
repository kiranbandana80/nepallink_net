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

	//get the user stats
	$sSQL='SELECT COUNT(*) AS total FROM '.PREFIX.'members';
	$result = $db->query($sSQL);
	$row=$result->fetchRow();
	$users=$row['total'];
	
	//get the categories
	$sSQL='SELECT COUNT(*) AS total FROM '.PREFIX.'categories';
	$result = $db->query($sSQL);
	$row=$result->fetchRow();
	$totalcats=$row['total'];
	
	$sSQL='SELECT COUNT(*) AS total FROM '.PREFIX.'categories WHERE parent_id=0';
	$result = $db->query($sSQL);
	$row=$result->fetchRow();
	$parentcats=$row['total'];
	
	$sSQL='SELECT COUNT(*) AS total FROM '.PREFIX.'categories WHERE parent_id<>0';
	$result = $db->query($sSQL);
	$row=$result->fetchRow();
	$subcats=$row['total'];
	
	//get the articles
	$sSQL='SELECT aID,aCat,aTitle,aDescription,aDate,aHits,aDisplay FROM '.PREFIX.'articles WHERE aDisplay="Y" ORDER BY aHits DESC LIMIT 5';
	$result = $db->query($sSQL);
	$toparticles=array();
	while ($row=$result->fetchRow()) 
	{
		$toparticles[]=$row;
	}

	//format the template
	$template->assign('users',$users);
	$template->assign('totalcats',$totalcats);
	$template->assign('parentcats',$parentcats);
	$template->assign('subcats',$subcats);
	$template->assign('toparticles',$toparticles);
	$template->assign('body', 'kbadmin_stats.tpl');
?>
