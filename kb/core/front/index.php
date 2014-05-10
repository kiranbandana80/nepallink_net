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
$modules->call_hook('index', '');
$sSQL = "SELECT aID,aTitle,aShortDesc,aDate,aHits FROM ".PREFIX."articles WHERE aDisplay='Y' ORDER BY aDate LIMIT ". $KB->settings['max_search'];
$result = $db->query($sSQL);
while ($row = $result->fetchRow())
{
	$data[]=$row;
}

//format the template
$template->assign('data',$data);
$template->assign('body', 'index.tpl');
?>
