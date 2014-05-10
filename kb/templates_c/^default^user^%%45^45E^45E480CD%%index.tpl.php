<?php /* Smarty version 2.6.13, created on 2008-04-05 07:53:39
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'html_table_adv', 'index.tpl', 2, false),)), $this); ?>
<h1><?php echo @LANG_CATS; ?>
</h1>
<?php $this->_tag_stack[] = array('html_table_adv', array('loop' => $this->_tpl_vars['parent_categories'],'cols' => 3,'table_attr' => 'width="100%"','td_attr' => 'width="33%"')); $_block_repeat=true;smarty_block_html_table_adv($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	<img src="templates/<?php echo @MAIN_TEMPLATE; ?>
/images/folder.png" />&nbsp;<a href="index.php?cmd=category&id=[[cID]]">[[cName]]</a>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_html_table_adv($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

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