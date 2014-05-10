<?php /* Smarty version 2.6.13, created on 2008-04-22 05:20:30
         compiled from index.tpl */ ?>
<h1><?php echo @LANG_SEARCH_HELP_CENTER; ?>
</h1>
<form action="index.php" name="searchkb">
<input type="text" name="q" />
<input type="submit" name="submit" value="Submit" />
<input type="hidden" name="cmd" value="search" />
</form>

<br />

<h1><?php echo @LANG_LATEST_ARTICLES; ?>
</h1>
<div id="latest">
<ul>
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
	<li><a href="index.php?cmd=article&id=<?php echo $this->_tpl_vars['entry']['aID']; ?>
"><?php echo $this->_tpl_vars['entry']['aTitle']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>