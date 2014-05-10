<?php /* Smarty version 2.6.13, created on 2008-04-22 05:22:48
         compiled from articleslist.tpl */ ?>
<h1><?php echo $this->_tpl_vars['catTitle']; ?>
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
	 
<div class="pageNav">
	<?php echo @LANG_SHOWING_PAGE; ?>
 <?php echo $this->_tpl_vars['pageNum']; ?>
 <?php echo @LANG_OF; ?>
 <?php echo $this->_tpl_vars['maxPage']; ?>

	<?php echo $this->_tpl_vars['links']; ?>

</div>