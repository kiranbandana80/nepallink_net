<?php
/***********************************************************************
| Developed by Peanut Scripts
|-----------------------------------------------------------------------
| All source code & content (c) Copyright 2006, Peanut Scripts
|   unless specifically noted otherwise.
|
|The contents of this file are protect under law as the intellectual property
| of Peanut Scripts. Any use, reproduction, disclosure or copying
| of any kind without the express and written permission of Peanut Scripts is forbidden.
|
| @version $Revision: 1.1 $
| @package PeanutKB
| ______________________________________________________________________
|	http://www.peanutscripts.com
***********************************************************************/

/**
* admin.php
* Example module admin - accessed via admin.php?cmd=module&module=example
* @package PeanutKB
*/
if(isset($_REQUEST['act']) && $_REQUEST['act']=='reset')
{
	$sSQL='UPDATE '.PREFIX.'articles SET aHits = 0';
	$result=$db->query($sSQL);
	if (DB::isError($result))
	{
		echo "ERROR modifying the database.";
	}
	else
	{
		$template->assign('msg', 'Articles reset successfully.');
	}
}
elseif(isset($_REQUEST['act']) && $_REQUEST['act']=='delete_compiled')
{
	$template->clear_compiled_tpl();
	$template->assign('msg', 'Compiled templates successfully deleted.');
}

// Display template
$template->assign('body', 'maintenance.tpl');
?>