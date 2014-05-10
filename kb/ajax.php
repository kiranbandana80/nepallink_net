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
	require_once('includes/global.php');
	require_once(BASE_DIR .'/includes/classes/cpaint/cpaint2.inc.php');

	$cp = new cpaint();
	$cp->register('edit_article');
	$cp->register('search');
	$cp->start();
	$cp->return_data();


	function edit_article($id)
	{
		global $db, $cp;
		
		$sSQL='SELECT aID,aCat,aShortDesc,aDescription FROM '.PREFIX.'articles WHERE aID='.$id;
		$result = $db->query($sSQL);
		$rs=$result->fetch();
	
		$output.="<form action='admin.php' method='post'>\n";
		$output.='<textarea id="content" name="content" style="width: 100%" rows="15">'.$rs['aDescription'].'</textarea><br />';
		$output.='<input type="submit" value="submit" name="Modify" />';
		$output.='</form>';
	
		$cp->set_id("response");
		#$add_result_node =& $cp->add_node("add");
		#$add_result_node->set_data($output);
		$cp->set_data($output);
		return;
	}

	function search($q)
	{
		global $db, $cp;
		
		$limit=10;
		$sSQL='SELECT aID,aCat,aTitle,aShortDesc,aDescription,aDate,aHits FROM '.PREFIX.'articles WHERE aDisplay="Y"';
		$sSQL .= ( empty($q) ) ? '': " AND (aTitle LIKE '%".$q."%' OR aShortDesc LIKE '%".$q."%' OR aDescription LIKE '%".$q."%')";
		$sSQL .= " ORDER BY aDate DESC, aTitle DESC LIMIT 10";
		$result=$db->query($sSQL);
		$output='<h3>'.LANG_SEARCH_RESULTS.'</h3>';
		$output.='<div id="latest"><ul>';
		while($rs=$result->fetchRow())
		{
			
			$output.= '<li><a href="index.php?cmd=article&id='.$rs['aID'].'">'.$rs['aTitle'].'</a></li>';
		}
		$output.='</ul></div>';
		$cp->set_id("searchResponse");
		#$add_result_node =& $cp->add_node("add");
		#$add_result_node->set_data($output);
		$cp->set_data($output);
		return;
	}
?>
