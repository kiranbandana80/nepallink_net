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
class Modules
{
	/**
 	 * Instance of database connection class
 	 * @access private
 	 * @var object
 	 */
 	var $db;
	
	/**
	* @var array All User modules
	* @access private
	*/
	var $userModules;
	
	/**
 	 * Plugins constructor
 	 * 
 	 * @param object database connection
 	 * @access public
 	 */
 	function Modules(&$db)
 	{
 		$this->db=& $db;
 	}
 	
 	/**
	 * Call Hook
	 * 
	 * Throughout the script when a certain action occurs it will call this hook.
	 * @param string $function String containing the function name.
	 * @param array $params An array of parameters that are passed. 
	 * @param string $type The type of action.  Default is user action.
	 */
 	function call_hook($function, $params, $type="user")
	{
		// Find all the user modules
		$sSQL='SELECT name, directory FROM '.PREFIX.'modules WHERE state=3';
 		$result = $this->db->query($sSQL);
 		
 		while ($rs = $result->fetchRow())
 		{
 			if (@file_exists('modules/'.$rs['directory'].'/mod_'.$type.'.php'))
			{
				require_once('modules/'.$rs['directory'].'/mod_'.$type.'.php');
			}
			
			$function_name = $rs['name'].'_'.$function;
			
			if (function_exists($function_name))
			{
				call_user_func($function_name, $params);
			}
 		}
 		return;
	}
 	
 	
 	/**
	 * Get Module
	 * 
	 * Get a single module
	 * @param int $id 
	 */
 	function getModule($id)
 	{
 		$sSQL='SELECT id,name,description,directory,version,state FROM '.PREFIX.'modules WHERE id='.$id.' LIMIT 1';
 		$result=$this->db->query($sSQL);
 		return $result->fetchRow(); 
 	}
 	
 	/**
	 * Get an active module by name
	 * 
	 * Get a single module
	 * @param string $name 
	 */
 	function getModuleByName($name, $type="user")
 	{
 		$sSQL='SELECT id,name,description,directory,version,state,admin_capable,user_capable FROM '.PREFIX.'modules WHERE name="'.mysql_escape_string($name).'" AND state=3 LIMIT 1';
 		$result=$this->db->query($sSQL);
 		return $result->fetchRow(); 
 	}
 	
 	/**
	 * Init Module
	 * 
	 * Install or uninstall a module.
	 * @param int $id
	 * @param string $action 
	 */
 	function initModule($id, $action)
 	{
 		if ( !is_numeric($id) )
 		{
			trigger_error('Module::initModule: Numeric value for id required');
        }
        $directory=$this->getModule($id);
        if (@file_exists(BASE_DIR .'modules/'.$directory['directory'].'/init.php'))
		{
			require_once(BASE_DIR .'modules/'.$directory['directory'].'/init.php');
			if($action=="uninstall")
			{
				if ( function_exists('uninstall') ) 
				{
					uninstall();
				}
			}
			elseif($action=="upgrade")
			{
				if ( function_exists('upgrade') ) 
				{
					upgrade();
				}
			}
			else
			{
				if ( function_exists('install') ) 
				{
					install();
				}
			}
		}
		else
		{
			return false;
		}
 	}
 	
 	/**
	 * Change Status
	 * 
	 * Change the status of a module
	 * 
	 * @param int $id
	 * @param string $state
	 */
 	function changeStatus($id, $state)
 	{
 		if ( !is_numeric($id) )
 		{
			trigger_error('Module::status: Numeric value for id required');
        }
 		switch($state)
 		{
 			case "initialize":
 			$sSQL='UPDATE '.PREFIX.'modules SET state=2 WHERE id='.$id;
 			$this->initModule($id, 'install');
 			break;
 			case "activate":
 			$sSQL='UPDATE '.PREFIX.'modules SET state=3 WHERE id='.$id;
 			break;
 			case "deactivate":
 			$sSQL='UPDATE '.PREFIX.'modules SET state=2 WHERE id='.$id;
 			break;
 			case "remove":
 			$sSQL='DELETE FROM '.PREFIX.'modules WHERE id='.$id.' LIMIT 1';
 			$this->initModule($id, 'uninstall');
 			break;
 		}
 		$result=$this->db->query($sSQL);
 		if (PEAR::isError($this->db))
		{
			trigger_error('Module::status: Unable to change state');
            return false;
        }
        else
        {
        	return true;
        }
 	}
 	/**
 	 * Regenerate Modules
 	 * 
 	 * Scan the modules directory and add any new modules
 	 */
 	function regenerate()
 	{
 		$opendir = opendir(BASE_DIR .'/modules');
 		while (false !== ($module = readdir($opendir)))
		{
			// Ignores . and .. that opendir displays
			if ($module != '.' && $module != '..')
			{
				// Checks if they have the correct files
				if ($this->exists($module))
				{
					$this->modules["$module"]['file'] = 'modules/'.$module.'/config.php';
				}
			}
		}
		closedir($opendir);
 		if (!empty($this->modules))
		{
			//assign $data to null
			$data='';
			foreach ($this->modules as $name => $module)
			{				
				if (file_exists(BASE_DIR .'modules/'.$name.'/config.php'))
				{
					require_once(BASE_DIR .'modules/'.$name.'/config.php');
				}
				$this->modules["$name"]['data'] = $data;
				
				$sSQL='SELECT * FROM '.PREFIX.'modules WHERE directory="'.$name.'"';
				$result=$this->db->query($sSQL);
				if ($result->numRows() == 0)
				{
					//it doesn't exist
					$sSQL='INSERT INTO '.PREFIX.'modules SET ' .
							'name="'.$data['module']['name'].'", ' .
							'displayname="'.$data['module']['displayname'].'", ' .
							'description="'.$data['module']['description'].'", ' .
							'directory="'.$name.'", ' .
							'version="'.$data['module']['version'].'", ' .
							'admin_capable="'.$data['module']['admin_capable'].'", ' .
							'user_capable="'.$data['module']['user_capable'].'", ' .
							'state=1';
					$this->db->query($sSQL);
				}
			}
 		}
 		return true;
 	}
 	
 	/**
	 * Checks if a module exists
	 * 
	 * @return boolean True if files exist, false otherwise
	 */
	function exists($module)
	{
		return (@file_exists(BASE_DIR .'modules/'.$module.'/config.php')) ? true : false;
	}
}
?>