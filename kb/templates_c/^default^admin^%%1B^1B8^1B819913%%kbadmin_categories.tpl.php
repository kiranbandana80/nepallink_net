<?php /* Smarty version 2.6.13, created on 2008-04-05 07:46:01
         compiled from kbadmin_categories.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'kbadmin_categories.tpl', 36, false),array('modifier', 'truncate', 'kbadmin_categories.tpl', 41, false),)), $this); ?>
<fieldset>
		<legend><?php echo @LANG_CATS; ?>
</legend>
		<script language="javascript" type="text/javascript">
<?php echo '
<!--
	function deletelisting(id) 
	{
		cmsg = "Sure you want to delete this record?\\nIt can not be undone!"
		if (confirm(cmsg)) {
			document.mainform.id.value = id;
			document.mainform.act.value = "delete";
			document.mainform.submit();
		}
	}
	function modify(id) 
	{
		document.mainform.id.value = id;
		document.mainform.mode.value = "edit";
		document.mainform.submit();
	}
// -->
'; ?>

</script>

<form method="post" action="admin.php" name="mainform">
<input type="hidden" name="cmd" value="categories" />
<input type="hidden" name="act" value="xxxxx" />
<input type="hidden" name="mode" value="xxxxx" />
<input type="hidden" name="id" value="xxxxx" />

<table class="list" width="100%">
	<tr>
		<th><?php echo @LANG_CATS; ?>
 <?php echo @LANG_NAME; ?>
</th><th><?php echo @LANG_DESCRIPTION; ?>
</th><th><?php echo @LANG_MODIFY; ?>
</th><th><?php echo @LANG_DELETE; ?>
</th>
	</tr>
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
     <tr class="<?php echo smarty_function_cycle(array('values' => "row1,row2"), $this);?>
">
		<td>
			&nbsp;<a href="admin.php?cmd=categories&amp;mode=edit&amp;id=<?php echo $this->_tpl_vars['entry']['cID']; ?>
"><?php echo $this->_tpl_vars['entry']['cName']; ?>
</a>
		</td>
		<td>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['cDescription'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 60, "...", false) : smarty_modifier_truncate($_tmp, 60, "...", false)); ?>

		</td>
		<td width="10%" nowrap>
			<input type="button" name="Button" value="<?php echo @LANG_MODIFY; ?>
" onClick="modify(<?php echo $this->_tpl_vars['entry']['cID']; ?>
)" />
		</td>
		<td width="10%" nowrap>
			<input type="button" name="Button" value="<?php echo @LANG_DELETE; ?>
" onClick="deletelisting(<?php echo $this->_tpl_vars['entry']['cID']; ?>
)" />
		</td>
	</tr>
<?php endforeach; else: ?>
	<tr><td>No results</td></tr>
<?php endif; unset($_from); ?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "row1,row2"), $this);?>
">
			<td colspan="3" align="center"><input type="button" name="Button" value="<?php echo @LANG_ADD_NEW; ?>
" onClick="document.location = 'admin.php?cmd=categories&amp;mode=add'" /></td>
		</tr>
 </table>
 </form>
</fieldset>