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
if(isset($_REQUEST['q']) && !empty($_REQUEST['q']))
{
	$queryStrings = explode(" ",trim($_REQUEST['q']));
	$sSQL='SELECT aID,aCat,aTitle,aShortDesc,aDescription,aDate,aHits FROM '.PREFIX.'articles WHERE aDisplay="Y"';
	$sSQL .= ( empty($_REQUEST['cat']) ) ? '': " AND aCat LIKE '%".(int)$_REQUEST['cat']."%'";
	foreach ($queryStrings AS $word)
	{
		$word=mysql_real_escape_string($word);
       $sSQL .= " AND (aTitle LIKE '%".$word."%' OR aShortDesc LIKE '%".$word."%' OR aDescription LIKE '%".$word."%')";	
	}
	//$sSQL .= ( empty($_REQUEST['q']) ) ? '': " AND (aTitle LIKE '%".$_REQUEST['q']."%' OR aShortDesc LIKE '%".$_REQUEST['q']."%' OR aDescription LIKE '%".$_REQUEST['q']."%')";
	//$sSQL .= $modules->call_hook('search_where', $_REQUEST['q']); // Call any module functions
	$sSQL .= " ORDER BY aDate DESC, aTitle DESC";
	
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
	$template->assign('catTitle', LANG_SEARCH_RESULTS);
	$template->assign('body', 'articleslist.tpl');
}
else
{
	//show the search form
	$template->assign('body', 'search.tpl');
}
?>