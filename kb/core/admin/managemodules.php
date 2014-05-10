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
if(isset($_GET['action']))
{
	if($_GET['action']=="regenerate")
	{
		if($modules->regenerate())
		{
			$template->assign('msg',LANG_ADMIN_REGENERATE_SUCCESS);	
		}
	}
}
if(isset($_GET['do']) && isset($_GET['action']) && isset($_GET['id']))
{
	if($_GET['do']=="changestate")
	{
		$modules->changeStatus($_GET['id'], $_GET['action']);
	}
}

	$sSQL='SELECT id,name,displayname,description,directory,version,admin_capable,state FROM '.PREFIX.'modules';
	$result=$db->query($sSQL);
	$data=array();
	while($row=$result->fetchRow())
	{
		switch($row['state'])
		{
			case 1:
				$row['state']=LANG_ADMIN_MODULE_UNINITIALIZED;
				$row['action']="initialize";
				$row['actiontext']=LANG_ADMIN_MODULE_INITIALIZE;
			break;
			case 2:
				$row['state']=LANG_ADMIN_MODULE_INACTIVE;
				$row['action']="activate";
				$row['actiontext']=LANG_ADMIN_MODULE_ACTIVATE;
			break;
			case 3:
				$row['state']=LANG_ADMIN_MODULE_ACTIVE;
				$row['action']="deactivate";
				$row['admin_capable']=$row['admin_capable'];
				$row['actiontext']=LANG_ADMIN_MODULE_DEACTIVATE;
			break;
		}
		$data[] = $row;
	}
	$template->assign('results', $data);
	$template->assign('body','managemodules.tpl');
?>