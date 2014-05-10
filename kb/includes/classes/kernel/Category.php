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

/**
 * Categories Base Class used in generating a list of categories as well as adding, editing, and deleting.
 *
 * @category   Kernel
 */
class Category
{
	/**
	 * Instance of database connection class
	 * @access private 
	 */
	var $db;
	
	/**
	 * An article id
	 * @var id
	 * @access private 
	*/	
	var $id;
	 
	/**
	 * Article Constructor
	 * @param object database connection
	 * @access public
	*/
	function Category(&$db)
	{
	 	$this->db=& $db;
	}
	
	/**
	* Parent_Categories
	* Return a list of all parent categories.
	* Query the database and return an array of all parent categories. This is used in the navigation
	* @return array $data
	*/
	function Parent_Categories()
	{
		$sSQL = "SELECT cID,cName,cDescription FROM ".PREFIX."categories WHERE parent_id=0 AND cDisplay='Y' ORDER BY cORDER ASC, cName ASC";
		$result = $this->db->query($sSQL);
		while ($row = $result->fetchRow())
		{
			$data[]=$row;
		}
		return $data;
	}
	
	/**
	 * Generate the breadcrumb trail
	 * @param int $node The node to begin with.
	 * @param int $lev The level to begin with
	 * @return array
	 */
	function breadcrumb($node,$lev)
	{
		$sSQL="SELECT cID,cName,parent_id FROM ".PREFIX."categories WHERE cID='".$node."'";
		$result=$this->db->query($sSQL);
		$row=$result->fetchRow();
		$path = array();
		$link="index.php?cmd=category&id=".$row['cID'];
		$path[] = "<a href='".$link."' class='breadcrumb'>".safeStripSlashes($row['cName'])."</a>";
		// only continue if this $node isn't the root node
		// (that's the node with no parent)
		if ($row['parent_id']!=0) 
		{
			$path = array_merge($this->breadcrumb($row['parent_id'],$lev+1), $path);
		}
		return $path;
	}
	
	/**
	 * js_tree
	 * This function is used for the javascript tree menu
	 * @param string $prefix Prefix used before the sub categories
	 * @param int $parent The parent id of the category.
	 * @return array
	 */
	function js_tree($prefix, $parent)
	{
		$arr = array();
		$sSQL="SELECT cID,cName,parent_id,cOrder FROM ".PREFIX."categories WHERE parent_id=".$parent." AND cDisplay<>'N' ORDER BY cORDER ASC, cName ASC";
		$result = $this->db->query($sSQL);
		$i=1;
		$j=100;
		while($row = $result->fetchRow())
		{
			$id=$row['cID'];
			$parent=$row['parent_id'];
			$row['name'] = 'd.add('.$id.','.$parent.',\''.addslashes($row['cName']).'\',\'index.php?cmd=category&id='.$id.'\');';
			array_push($arr, $row);
			$i++;
			$sSQL="SElECT aID,aCat,aTitle FROM ".PREFIX."articles WHERE aCat=".$id." AND aDisplay='Y'";
			$result2 = $this->db->query($sSQL);
			while($row2 = $result2->fetchRow())
			{
					$row['name'] = 'd.add('.$j.','.$id.',\''.addslashes($row2['aTitle']).'\',\'index.php?cmd=article&id='.$row2['aID'].'\');';
					array_push($arr, $row);
					$j++;
			}
			$arr = array_merge($arr, $this->js_tree($prefix ."&nbsp;&nbsp;&raquo;&nbsp;", $id));
		}
		return $arr;
	}
	
	function admin_cat_tree($prefix, $parent=0)
	{
		$arr = array();
		$sSQL="SELECT cID,cName,cDescription FROM ".PREFIX."categories WHERE parent_id=".$parent." ORDER BY cOrder ASC, cName ASC";
		$result=$this->db->query($sSQL);
		while ($rs=$result->fetchRow())
		{
			$id=$rs['cID'];
			$row['cName'] = $prefix . $rs['cName'];
			$row['cID']=$id;
			array_push($arr, $row);
			$arr = array_merge($arr, cat_tree($prefix ."&nbsp;&nbsp;&raquo;&nbsp;", $id));
		}
		return $arr;
	}
	
	
	
	/**
	* Delete the category
	*
	* @param int $id The id of the category.
	* @return bool True on success, False otherwise.
	*/
	function deleteCat($id)
	{
		if ( !is_numeric($id) )
 		{
			trigger_error('Categories::deleteCat: Numeric value for id required');
        }
		$sSQL='DELETE FROM '.PREFIX.'categories WHERE cID='.$id.' LIMIT 1';
		$this->db->query($sSQL);
		if (PEAR::isError($this->db))
		{
			//not successfull
			return false;
		}
		else
		{
			return true;
		}
	}
}
?>