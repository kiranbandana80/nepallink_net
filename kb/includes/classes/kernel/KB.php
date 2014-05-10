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
* @category Kernel
*
* Updated: $Date: 2005-11-05 16:39:52 +0000 (Sat, 05 Nov 2005) $
*/

class KB
{
	/**
	 * Instance of database connection class
	 * @access private 
	 */
	var $db;
	
	/**
	* Assigns system settings to class variables, checks template existance and assigns allowed sources
	*
	* @param object database connection
	*/
	function KB(&$db)
	{
		$this->db=& $db;
		
		// Get settings and place into array for use throughout application	
		$query = $this->db->query('SELECT short_name, value FROM '.PREFIX.'settings');
		
		while ($row = $query->fetchRow())
		{
			$this->settings[$row['short_name']] = $row['value'];
		}
	}
	
	function breadcrumb($node,$lev) 
	{
		$sSQL="SELECT id,name,parent_id FROM ".PREFIX."categories WHERE id='".$node."'";
		$result=$this->db->query($sSQL);
		$row=$result->fetch();
		$path = array();
		$path[]= safeStripSlashes($row['name']);
		// only continue if this $node isn't the root node
		// (that's the node with no parent)
		if ($row['parent_id']!=0) 
		{
			$path = array_merge(breadcrumb_title($row['parent_id'],$lev+1), $path);
		}
		return $path;
	}
}
?>