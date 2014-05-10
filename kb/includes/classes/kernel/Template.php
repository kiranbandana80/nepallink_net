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
require_once(BASE_DIR . "includes/classes/smarty/Smarty.class.php");

class Template extends Smarty
{
	var $smarty;
	
	/*
	 * The module for wich the object is for
	 */
	var $module;
	
	function Template($module = '')
	{
		global $debug;
		
		$this->Smarty();

		$this->debugging = $debug;
		$this->compile_check = true;
		$this->caching = false;
		$this->template_dir = array();
		$this->module = $module;

		//plugins directory
		if (is_dir(BASE_DIR . 'includes/classes/smarty/plugins')) 
		{
			array_push($this->plugins_dir, BASE_DIR . 'includes/classes/smarty/plugins');
		}
		
		// add theme specific plugins directories, if they exist
		if (is_dir(BASE_DIR .'modules/'. $this->module .'/plugins'))
		{
			array_push($this->plugins_dir, BASE_DIR .'modules/'. $this->module .'/plugins');
		}
		
		// add templates directory
		if(defined('IN_ADMIN'))
		{
			$template_dir = BASE_DIR . 'templates/admin';
			if (file_exists($template_dir)) 
			{
				array_push($this->template_dir, $template_dir);
				$compile_dir="admin";
			}
		}
		else
		{
			$template_dir = BASE_DIR . 'templates/'. MAIN_TEMPLATE;
			if (file_exists($template_dir)) 
			{
				array_push($this->template_dir, $template_dir);
				$compile_dir="user";
			}
			$template_dir = BASE_DIR . 'templates/default';
			if (file_exists($template_dir)) 
			{
				array_push($this->template_dir, $template_dir);
				$compile_dir="user";
			}
		}
		
		// add module specific templates, if they exist
		$moduletheme=BASE_DIR .'modules/'. $this->module .'/templates';
		if (is_dir($moduletheme))
		{
			array_push($this->template_dir, $moduletheme);
		}

		//compile directory
		$this->compile_dir = BASE_DIR . 'templates_c';
		
		// compile id
		$this->compile_id = $this->module . '|' . MAIN_TEMPLATE .'|'. $compile_dir;
	}
	
	/*
	 * bulkAssign
	 * Bulk Assigns variables to smarty
	 * @param array 
	 */
	function bulkAssign($array)
	{
		while (list($key, $value) = each($array)) 
		{
			$this->assign($key, $value);
		}
	}
}
?>