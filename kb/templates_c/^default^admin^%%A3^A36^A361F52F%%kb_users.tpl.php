<?php /* Smarty version 2.6.13, created on 2008-04-05 07:46:09
         compiled from kb_users.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'kb_users.tpl', 38, false),)), $this); ?>
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
<fieldset>
		<legend><?php echo @LANG_MANAGE_USERS; ?>
</legend>
<form method="post" action="admin.php" name="mainform">
<input type="hidden" name="cmd" value="users" />
<input type="hidden" name="act" value="xxxxx" />
<input type="hidden" name="mode" value="xxxxx" />
<input type="hidden" name="id" value="xxxxx" />

<table class="list">
	<tr>
		<th>User Name</th>
		<th>User Email</th>
		<th><?php echo @LANG_MODIFY; ?>
</th>
		<th><?php echo @LANG_DELETE; ?>
</th>
	</tr>
	<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
		 <tr class="<?php echo smarty_function_cycle(array('values' => "row1,row2"), $this);?>
">
			<td>
				<?php echo $this->_tpl_vars['entry']['mUsername']; ?>

			</td>
			<td>
				<?php echo $this->_tpl_vars['entry']['mEmail']; ?>

			</td>
			<td width="10%" nowrap>
				<input type="button" name="Button" value="<?php echo @LANG_MODIFY; ?>
" onClick="modify(<?php echo $this->_tpl_vars['entry']['mID']; ?>
)" />
			</td>
			<td width="10%" nowrap>
				<input type="button" name="Button" value="<?php echo @LANG_DELETE; ?>
" onClick="deletelisting(<?php echo $this->_tpl_vars['entry']['mID']; ?>
)" />
		</td>
		</tr>
	<?php endforeach; else: ?>
		<tr><td>No results</td></tr>
	<?php endif; unset($_from); ?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "row1,row2",'advance' => false), $this);?>
">
			<td colspan="3" align="center"><input type="button" name="Button" value="<?php echo @LANG_ADD_NEW; ?>
" onClick="document.location = 'admin.php?cmd=users&amp;mode=add'" /></td>
		</tr>
</table>
</form>
</fieldset>