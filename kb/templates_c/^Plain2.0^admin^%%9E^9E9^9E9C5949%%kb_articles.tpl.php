<?php /* Smarty version 2.6.13, created on 2008-04-22 05:20:40
         compiled from kb_articles.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'kb_articles.tpl', 49, false),array('modifier', 'date_format', 'kb_articles.tpl', 57, false),)), $this); ?>
<fieldset>
		<legend><?php echo @LANG_ARTICLES; ?>
</legend>
		<form name="search" action="admin.php" method="get">
	<table width="250" border="0" cellspacing="1" cellpadding="4" align="center">
		<tr>
			<td nowrap><strong><?php echo @LANG_SEARCH; ?>
 <?php echo @LANG_ARTICLES; ?>
:</strong> <input name="q" type="text" class="searchtext" id="q" value="<?php echo $this->_tpl_vars['q']; ?>
"></td>
			<td><input type="submit" name="Submit" value="Search"></td>
		</tr>
	</table>
	<input type="hidden" name="cmd" value="articles" />
</form>

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
<input type="hidden" name="cmd" value="articles" />
<input type="hidden" name="act" value="xxxxx" />
<input type="hidden" name="mode" value="xxxxx" />
<input type="hidden" name="id" value="xxxxx" />
<table class="list">
	<tr>
		<th><?php echo @LANG_TITLE; ?>
</th>
		<th width="5%"><?php echo @LANG_VIEWED; ?>
</th>
		<th width="5%"><?php echo @LANG_DATE_ADDED; ?>
</th>
		<th><?php echo @LANG_CATEGORY; ?>
</th>
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
				<div class="kbarticle"><?php echo $this->_tpl_vars['entry']['aTitle']; ?>
</div>
			</td>
			<td width="5%"<?php if ($this->_tpl_vars['entry']['aDisplay'] <> 'Y'): ?> style="background-color: #EFEFEF;"<?php endif; ?> nowrap>
				<?php echo $this->_tpl_vars['entry']['aHits']; ?>

			</td>
			<td width="5%"<?php if ($this->_tpl_vars['entry']['aDisplay'] <> 'Y'): ?> style="background-color: #EFEFEF;"<?php endif; ?> nowrap>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['aDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, @LANG_DATE_TIME) : smarty_modifier_date_format($_tmp, @LANG_DATE_TIME)); ?>

			</td>
			<td width="30%"<?php if ($this->_tpl_vars['entry']['aDisplay'] <> 'Y'): ?> style="background-color: #EFEFEF;"<?php endif; ?> nowrap>
				<?php $_from = $this->_tpl_vars['entry']['cName']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['catname']):
?>
					<?php echo $this->_tpl_vars['catname']; ?>
 
				<?php endforeach; endif; unset($_from); ?>
			</td>
			<td width="10%" nowrap>
				<input type="button" name="Button" value="<?php echo @LANG_MODIFY; ?>
" onClick="modify(<?php echo $this->_tpl_vars['entry']['aID']; ?>
)" />
			</td>
			<td width="10%" nowrap>
				<input type="button" name="Button" value="<?php echo @LANG_DELETE; ?>
" onClick="deletelisting(<?php echo $this->_tpl_vars['entry']['aID']; ?>
)" />
			</td>
		</tr>
	<?php endforeach; else: ?>
		<tr><td>No results</td></tr>
	<?php endif; unset($_from); ?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "row1,row2",'advance' => false), $this);?>
">
			<td colspan="6" align="center"><input type="button" name="Button" value="<?php echo @LANG_ADD_NEW; ?>
" onClick="document.location = 'admin.php?cmd=articles&amp;mode=add'" /></td>
		</tr>
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