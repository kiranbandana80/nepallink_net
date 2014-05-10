<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>{$kbtitle}</title>
<link rel="stylesheet" href="templates/admin/css/style.css" type="text/css" />
</head>

<body>
<div id="header">
	<div id="header-container">
	<h1><a href="admin.php">{$kbtitle}</a></h1>
<div id="tabs">
  <ul>
    <li><a {if $active==""}id="activetab" {/if}href="admin.php" title="{$smarty.const.LANG_HOME}"><span>{$smarty.const.LANG_HOME}</span></a></li>
    <li><a {if $active=="articles"}id="activetab" {/if}href="admin.php?cmd=articles" title="{$smarty.const.LANG_MANAGE_ARTICLES}"><span>{$smarty.const.LANG_MANAGE_ARTICLES}</span></a></li>
    <li><a {if $active=="categories"}id="activetab" {/if}href="admin.php?cmd=categories" title="{$smarty.const.LANG_MANAGE_CATS}"><span>{$smarty.const.LANG_MANAGE_CATS}</span></a></li>
    <li><a {if $active=="settings"}id="activetab" {/if}href="admin.php?cmd=settings" title="{$smarty.const.LANG_CONFIGURATION}"><span>{$smarty.const.LANG_CONFIGURATION}</span></a></li>
    <li><a {if $active=="glossary"}id="activetab" {/if}href="admin.php?cmd=glossary" title="{$smarty.const.LANG_MANAGE_GLOSSARY}"><span>{$smarty.const.LANG_MANAGE_GLOSSARY}</span></a></li>
    <li><a {if $active=="comments"}id="activetab" {/if}href="admin.php?cmd=comments" title="{$smarty.const.LANG_MANAGE_COMMENTS}"><span>{$smarty.const.LANG_MANAGE_COMMENTS}</span></a></li>
    <li><a {if $active=="users"}id="activetab" {/if}href="admin.php?cmd=users" title="{$smarty.const.LANG_MANAGE_USERS}"><span>{$smarty.const.LANG_MANAGE_USERS}</span></a></li>    
	<li><a {if $active=="managemodules"}id="activetab" {/if}href="admin.php?cmd=managemodules" title="{$smarty.const.LANG_ADMIN_MODULE_MANAGE}"><span>{$smarty.const.LANG_ADMIN_MODULE_MANAGE}</span></a></li>
  </ul>
</div>
</div>
<br class="clear" />
<div id="breadcrumb">&raquo; <a href="admin.php?action=logout">{$smarty.const.LANG_LOGOUT}</a></div>
</div>
	
	<div id="wrapper">
		
		<div id="content">
			{include file=$body}
		</div>	
		
	</div>
	<div id="footer">
		<div id="footercontent">
			&copy; 2006 Barnes Innovations | Powered by <a href="http://www.barnesinnovations.com/">PeanutKB {$kbversion}</a> | Icons by <a href="http://www.famfamfam.com/">FamFamFam</a>
	  </div>
	</div>
</body>
</html>
