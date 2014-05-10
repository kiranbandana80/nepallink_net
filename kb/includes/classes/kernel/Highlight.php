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
* @category Kernel
*
* Updated: $Date: 2005-11-05 16:39:52 +0000 (Sat, 05 Nov 2005) $
*/
require_once 'Text/Highlighter.php';
require_once 'Text/Highlighter/Renderer/Html.php';

class HighLight
{
	// The languages the PEAR HLigher can accept
	var $acceptable_lang = array('php', 'cpp', 'css', 'diff', 'dtd', 'javascript',
                                 'mysql', 'perl', 'python', 'ruby', 'sql', 'xml', 'java');
    
	/*
	 * _check
	 * 
	 * Check the content for bb tags
	 * @param string $content
	 * @return param $content
	 */
	function _check($content)
    {
    	$content=stripslashes($content);

		$content = preg_replace('#\[code\](.*?)\[/code\]#sie', '$this->_highlight(\'\\1\', false, $content);', $content);
		$content = preg_replace('#\[code lang="(.*?)"\](.*?)\[/code\]#sie', '$this->_highlight(\'\\2\', \'\\1\', $content);', $content);
		return $content;
    }

	/*
	 * _highlight
	 * 
	 * Perform the highlight
	 * @param string $txt
	 * @param string $content
	 * @return param
	 */
    function _highlight($txt, $lang = '', $content)
    {
    	$txt = str_replace(array("\\\"", "\\\'"), array("\"", "\'"), $txt);
        $txt = trim($txt);
		
		$options = array(
			'numbers' => HL_NUMBERS_LI,
			'tabsize' => 4,
		);
		if(!in_array($lang, $this->acceptable_lang))
		{
			$lang='php';
		}
		$renderer =& new Text_Highlighter_Renderer_HTML($options);
		$highlighter =& Text_Highlighter::factory($lang);
		$highlighter->setRenderer($renderer);
		return $highlighter->highlight($txt);
    }
    
    /*
     * _glossary
     * 
     * Checks for keyterms in the glossary
     */
    function _glossary($content)
    {
    	global $db;
    	$sSQL = "SELECT gID,gTerm,gDefinition FROM ".PREFIX."glossary";
		$result = $db->query($sSQL);
		while($row = $result->fetchRow())
		{
			$words[] = $row['gTerm'];
			$def=$row['gDefinition'];
			$sDef=$this->_dot($def,75);
			$char1=substr($row['gTerm'], 0, 1);
			$replacements[] = '<a href="index.php?cmd=glossary&q='.$char1.'#'.$row['gTerm'].'" onmouseover="return overlib(\'<b>'.$row['gTerm'].'</b><br>'.addslashes($sDef).'\')" onmouseout="return nd();">'.$row['gTerm'].'</a>';
		}
		return str_replace($words, $replacements, $content);  
    }
    
    /*
     * _dot
     * 
     * Trims a string and adds periods to the end
     */
    function _dot($str, $len, $dots = "...") 
	{
		if (strlen($str) > $len) 
		{
			$dotlen = strlen($dots);
			$str = substr_replace($str, $dots, $len - $dotlen);
		}
		return $str;
	}
}
?>

