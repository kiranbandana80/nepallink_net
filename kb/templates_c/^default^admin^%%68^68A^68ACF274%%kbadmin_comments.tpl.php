<?php /* Smarty version 2.6.13, created on 2008-04-05 07:46:08
         compiled from kbadmin_comments.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'kbadmin_comments.tpl', 56, false),array('modifier', 'date_format', 'kbadmin_comments.tpl', 64, false),)), $this); ?>
<fieldset>
		<legend><?php echo @LANG_COMMENTS; ?>
</legend>
<form name="search" action="admin.php" method="get">
	<table width="250" border="0" cellspacing="1" cellpadding="4" align="center">
		<tr>
			<td nowrap><strong><?php echo @LANG_SEARCH; ?>
 <?php echo @LANG_COMMENTS; ?>
:</strong> <input name="q" type="text" class="searchtext" id="q" value="<?php echo $this->_tpl_vars['q']; ?>
"></td>
			<td><input type="submit" name="Submit" value="<?php echo @LANG_SEARCH; ?>
"></td>
		</tr>
	</table>
	<input type="hidden" name="cmd" value="comments" />
</form>

<script language="javascript" type="text/javascript">
<?php echo '
<!--
	function approve(id)
	{
		cmsg = "Sure you want to approve this record?"
		if (confirm(cmsg)) 
		{
			document.mainform.id.value = id;
			document.mainform.act.value = "approve";
			document.mainform.submit();
		}
	}
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
<input type="hidden" name="cmd" value="comments" />
<input type="hidden" name="act" value="xxxxx" />
<input type="hidden" name="mode" value="xxxxx" />
<input type="hidden" name="id" value="xxxxx" />

<table class="list" width="100%">
	<tr>
		<th><?php echo @LANG_NAME; ?>
</th><th><?php echo @LANG_EMAIL; ?>
</th><th><?php echo @LANG_DATE_ADDED; ?>
</th><th><?php echo @LANG_APPROVED; ?>
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
			&nbsp;<a href="admin.php?cmd=comments&mode=edit&id=<?php echo $this->_tpl_vars['entry']['cID']; ?>
"><?php echo $this->_tpl_vars['entry']['cName']; ?>
</a>
		</td>
		<td>
			<?php echo $this->_tpl_vars['entry']['cEmail']; ?>

		</td>
		<td>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['cDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, @LANG_DATE_TIME) : smarty_modifier_date_format($_tmp, @LANG_DATE_TIME)); ?>

		</td>
		<td>
			<?php if ($this->_tpl_vars['entry']['cApproved'] == 'Y'): ?>
				<img src="templates/admin/images/ok.png" />
			<?php else: ?>
				<a href="#" onclick="approve(<?php echo $this->_tpl_vars['entry']['cID']; ?>
)"><img src="templates/admin/images/x.png" border="0" alt="<?php echo @LANG_APPROVE; ?>
" /></a>
			<?php endif; ?>
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
 </table>
 </form>
 
 
	<div class="pageNav">
		<table class="pagination" cellpadding="3" cellspacing="1" border="0" align="right" style="margin-top:3px">
	<tr>
		<td class="navigationBack" style="font-weight:normal"><?php echo @LANG_SHOWING_PAGE; ?>
 <?php echo $this->_tpl_vars['pageNum']; ?>
 <?php echo @LANG_OF; ?>
 <?php echo $this->_tpl_vars['maxPage']; ?>
</td>
		<td class="paginationNum"><?php echo $this->_tpl_vars['links']; ?>
</td>
	</tr>
	</table>
	</div>
</fieldset>