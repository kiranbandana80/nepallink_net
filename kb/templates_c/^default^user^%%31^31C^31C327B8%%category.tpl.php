<?php /* Smarty version 2.6.13, created on 2008-04-05 07:56:49
         compiled from category.tpl */ ?>
		<?php if ($this->_tpl_vars['catrows'] > 0): ?>
	<h1><?php echo @LANG_SUB_CATS; ?>
</h1>
	<div id="category">
	<ul>
	<?php $_from = $this->_tpl_vars['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
		<li><a href="index.php?cmd=category&id=<?php echo $this->_tpl_vars['entry']['cID']; ?>
"><?php echo $this->_tpl_vars['entry']['cName']; ?>
</a></li>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
	</div>
	<?php endif; ?>
	
		<?php if ($this->_tpl_vars['numrows'] > 0): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "articleslist.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['catrows'] == 0 && $this->_tpl_vars['numrows'] == 0): ?>
		<h1><?php echo @LANG_ERROR; ?>
</h1>
		<p><?php echo @LANG_SORRY_NO_ARTICLES; ?>
</p>
		<h1><?php echo @LANG_SEARCH_HELP_CENTER; ?>
</h1>
		<form action="index.php" name="searchkb">
		<input type="text" name="q" />
		<input type="submit" name="submit" value="Submit" />
		<input type="hidden" name="cmd" value="search" />
		</form>
	<?php endif; ?>