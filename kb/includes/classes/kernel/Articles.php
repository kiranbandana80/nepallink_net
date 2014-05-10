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
* @category   Kernel
*
* Updated: $Date: 2005-11-05 16:39:52 +0000 (Sat, 05 Nov 2005) $
*/

/**
 * Include the Highlight subclass for calling articles.
 */
require_once(BASE_DIR ."includes/classes/kernel/Highlight.php");

/**
 * Articles
 *
 * The Articles class provides methods for creating and
 * modifing articles.
 */
class Articles
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
	function Articles(&$db)
	{
	 	$this->db=& $db;
	}
	
	/**
	 * GetArticle
	 * Get a single article
	 * @param int $id article id
	 * @return array Article details
	 */
	function GetArticle($id)
	{
		global $template, $Category;
		//if($admin)
		if(defined( 'IN_ADMIN' ))
		{
			$sSQL='SELECT aID,aCat,aTitle,aShortDesc,aDescription,aDate,aHits FROM '.PREFIX.'articles WHERE aID='.$id;
			//get the details
			$articles=$result->fetchRow();
		}
		else
		{
			$sSQL='SELECT aID,aCat,aTitle,aShortDesc,aDescription,aDate,aHits,cName FROM '.PREFIX.'articles LEFT JOIN '.PREFIX.'categories ON aCat=cID WHERE aDisplay="Y" AND aID='.$id;
			//update hit count
			$this->UpdateCount($id);
			//get the details
			$result = $this->db->query($sSQL);
			$articles=$result->fetchRow();
			$highlight = new HighLight();
			$articles['aDescription']=$highlight->_check($articles['aDescription']);
			//glossary
			$articles['aDescription']=$highlight->_glossary($articles['aDescription']);
			$articles['cat']=$this->GetCategory($id);
		}
		if (DB::isError($result))
		{
			die("Articles::GetArticle::Unable to get article:: " . $result->getMessage() . "\n");
			return false;
		}
		$template->assign('breadcrumb',$Category->breadcrumb($articles['aCat'],0));
		$template->bulkAssign($articles);
		return $articles;
	}
	
	/**
	 * GetCategory
	 * Get a comma list of categories for a particular article
	 * @param int article id
	 * @return string of categories
	 */
	function GetCategory($id)
	{
		$catSQL="SELECT cName FROM ".PREFIX."article2cat LEFT JOIN ".PREFIX."categories ON category_id=cID WHERE article_id=".$value['aID']." ORDER BY cOrder ASC";
		$res=& $this->db->query($catSQL);
		if (PEAR::isError($res)) {
			return $res;
		}
		$totalItems = (int)$res->numRows();
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
		$res->free();
		return $catName;
	}
	
	/**
	 * GetComments
	 * Get any comments related to an article
	 * @param int article id
	 * @return array Array of attachments
	 */
	function GetComments($id)
	{
		$sSQL='SELECT cID,cName,cEmail,cDate,cComments FROM '.PREFIX.'comments WHERE cApproved="Y" AND cAID='.$id;
		$result = $this->db->query($sSQL);
		if (DB::isError($result))
		{
			die("Articles::GetComments::Unable to get comments:: " . $result->getMessage() . "\n");
		}
		else
		{
			while ($row = $result->fetchRow())
			{
				$comments[]=$row;
			}
			return $comments;
		}	
	}
	
	/**
	 * AddComment
	 * Add comments to an article
	 * @param int article id
	 * @return array Array of attachments
	 */
	function AddComment($name, $email='', $comments, $id, $approved='N')
	{
		$sSQL='INSERT INTO '.PREFIX.'comments (cName,cEmail,cAID,cComments,cDate,cApproved) '.
			'VALUES (' .
				$this->db->quoteSmart($name).',' .
				$this->db->quoteSmart($email).',' .
				$this->db->quoteSmart($id).',' .
				$this->db->quoteSmart($comments).',' .
				'NOW(),' .
				$this->db->quoteSmart($approved).
				')';
		$result = $this->db->query($sSQL);
		if (PEAR::isError($this->db))
		{
			//not successfull
			echo  $this->db->getMessage();
		}
		else
		{
			return true;
		}
	}
	/**
	 * GetAttachments
	 * Get any attachments related to an article
	 * @param int article id
	 * @return array Array of attachments
	 */
	function GetAttachments($id)
	{
		$sSQL='SELECT aID,aName,aType,aSize FROM '.PREFIX.'attachments WHERE aArticleID='.$id;
		$result = $this->db->query($sSQL);
		if (DB::isError($result))
		{
			die("Articles::GetArticle::Unable to get article:: " . $result->getMessage() . "\n");
		}
		else
		{
			while ($row = $result->fetchRow())
			{
				$attachments[]=$row;
			}
			return $attachments;
		}	
	}
	
	/**
	 * UpdateCount
	 * Update the hit count on a single article
	 * @param int article id
	 */
	function UpdateCount($id)
	{
		//Update the hitcount
		$sSQL = 'UPDATE '.PREFIX.'articles SET aHits=aHits+1 WHERE aID='. $id;
		$result=$this->db->query($sSQL);
	}
	
	/**
	 * DeleteArticle
	 * Delete an article and all attachments
	 * @param int $id Article id
	 * @return bool True if the article is deleted, false otherwise.
	 */
	function DeleteArticle($id)
	{
		global $modules;
		$sSQL='DELETE FROM '.PREFIX.'articles WHERE aID='.$id.' LIMIT 1';
		$this->db->query($sSQL);
		if (PEAR::isError($this->db))
		{
			//not successfull
			return false;
		}
		else
		{
			//get any attachments
			$sSQL='SELECT aID,aName FROM '.PREFIX.'attachments WHERE aArticleID='.$id;
			$result=$this->db->query($sSQL);
			while($attach=$result->fetchRow())
			{
				@unlink('uploads/'.$attach['aName']);
				$sSQL='DELETE FROM '.PREFIX.'attachments WHERE aID='.$attach['aID'].' LIMIT 1';
				$this->db->query($sSQL);
			}
			$modules->call_hook('DeleteArticle', $id);
			return true;
		}
	}
	
	function selected_cat_tree($prefix, $parent, $modify)
	{
		$arr = array();
		$sSQL="SELECT cID,cName,cOrder FROM ".PREFIX."categories WHERE parent_id=".$parent." ORDER BY cORDER DESC, cName ASC";
		$result=$this->db->query($sSQL);
		while($row=$result->fetchRow())
		{
			$res=& $this->db->query("SELECT article_id FROM ".PREFIX."article2cat WHERE category_id=".$row['cID']." AND article_id=".$modify."");
			if (PEAR::isError($res)) {
                return $res;
            }
			$totalItems = (int)$res->numRows();
			$res->free();
			if($totalItems>0)
			{
				$row['selected']="Y";
			}
			else
			{
				$row['selected']="N";
			}
			$cID=$row['cID'];
			$row['cName'] = $prefix . safeStripSlashes($row['cName']);
			array_push($arr, $row);
			$arr = array_merge($arr, $this->selected_cat_tree($prefix ."&nbsp;&nbsp;&raquo;&nbsp;", $cID, $modify));
		}
		return $arr;
	}
}
?>