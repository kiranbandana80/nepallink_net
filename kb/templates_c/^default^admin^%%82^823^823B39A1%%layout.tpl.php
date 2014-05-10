<?php /* Smarty version 2.6.13, created on 2008-04-05 07:44:50
         compiled from layout.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php echo $this->_tpl_vars['kbtitle']; ?>
</title>
<link rel="stylesheet" href="templates/admin/css/style.css" type="text/css" />
</head>

<body>
<div id="header">
	<div id="header-container">
	<h1><a href="admin.php"><?php echo $this->_tpl_vars['kbtitle']; ?>
</a></h1>
<div id="tabs">
  <ul>
    <li><a <?php if ($this->_tpl_vars['active'] == ""): ?>id="activetab" <?php endif; ?>href="admin.php" title="<?php echo @LANG_HOME; ?>
"><span><?php echo @LANG_HOME; ?>
</span></a></li>
    <li><a <?php if ($this->_tpl_vars['active'] == 'articles'): ?>id="activetab" <?php endif; ?>href="admin.php?cmd=articles" title="<?php echo @LANG_MANAGE_ARTICLES; ?>
"><span><?php echo @LANG_MANAGE_ARTICLES; ?>
</span></a></li>
    <li><a <?php if ($this->_tpl_vars['active'] == 'categories'): ?>id="activetab" <?php endif; ?>href="admin.php?cmd=categories" title="<?php echo @LANG_MANAGE_CATS; ?>
"><span><?php echo @LANG_MANAGE_CATS; ?>
</span></a></li>
    <li><a <?php if ($this->_tpl_vars['active'] == 'settings'): ?>id="activetab" <?php endif; ?>href="admin.php?cmd=settings" title="<?php echo @LANG_CONFIGURATION; ?>
"><span><?php echo @LANG_CONFIGURATION; ?>
</span></a></li>
    <li><a <?php if ($this->_tpl_vars['active'] == 'glossary'): ?>id="activetab" <?php endif; ?>href="admin.php?cmd=glossary" title="<?php echo @LANG_MANAGE_GLOSSARY; ?>
"><span><?php echo @LANG_MANAGE_GLOSSARY; ?>
</span></a></li>
    <li><a <?php if ($this->_tpl_vars['active'] == 'comments'): ?>id="activetab" <?php endif; ?>href="admin.php?cmd=comments" title="<?php echo @LANG_MANAGE_COMMENTS; ?>
"><span><?php echo @LANG_MANAGE_COMMENTS; ?>
</span></a></li>
    <li><a <?php if ($this->_tpl_vars['active'] == 'users'): ?>id="activetab" <?php endif; ?>href="admin.php?cmd=users" title="<?php echo @LANG_MANAGE_USERS; ?>
"><span><?php echo @LANG_MANAGE_USERS; ?>
</span></a></li>    
	<li><a <?php if ($this->_tpl_vars['active'] == 'managemodules'): ?>id="activetab" <?php endif; ?>href="admin.php?cmd=managemodules" title="<?php echo @LANG_ADMIN_MODULE_MANAGE; ?>
"><span><?php echo @LANG_ADMIN_MODULE_MANAGE; ?>
</span></a></li>
  </ul>
</div>
</div>
<br class="clear" />
<div id="breadcrumb">&raquo; <a href="admin.php?action=logout"><?php echo @LANG_LOGOUT; ?>
</a></div>
</div>
	
	<div id="wrapper">
		
		<div id="content">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['body'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>	
		
	</div>
	<div id="footer">
		<div id="footercontent">
			&copy; 2006 Barnes Innovations | Powered by <a href="http://www.barnesinnovations.com/">PeanutKB <?php echo $this->_tpl_vars['kbversion']; ?>
</a> | Icons by <a href="http://www.famfamfam.com/">FamFamFam</a>
	  </div>
	</div>
</body>
</html>