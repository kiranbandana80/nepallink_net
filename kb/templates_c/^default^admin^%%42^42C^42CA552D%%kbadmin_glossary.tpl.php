<?php /* Smarty version 2.6.13, created on 2008-04-05 07:46:07
         compiled from kbadmin_glossary.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'kbadmin_glossary.tpl', 47, false),)), $this); ?>
<fieldset>
		<legend><?php echo @LANG_GLOSSARY; ?>
</legend>
<form name="search" action="admin.php" method="get">
	<table width="250" border="0" cellspacing="1" cellpadding="4" align="center">
		<tr>
			<td nowrap><strong><?php echo @LANG_SEARCH; ?>
 <?php echo @LANG_GLOSSARY; ?>
:</strong> <input name="q" type="text" class="searchtext" id="q" value="<?php echo $this->_tpl_vars['q']; ?>
"></td>
			<td><input type="submit" name="Submit" value="<?php echo @LANG_SEARCH; ?>
"></td>
		</tr>
	</table>
	<input type="hidden" name="cmd" value="glossary" />
</form>


<script language="javascript" type="text/javascript">
<?php echo '
<!--
	function newcat(id) 
	{
			document.mainform.id.value = id;
			document.mainform.act.value = "add";
			document.mainform.submit();
	}
	function deletecat(id) 
	{
		cmsg = "Are you sure you wish to delete this term? It can not be undone."
		if (confirm(cmsg)) {
			document.mainform.id.value = id;
			document.mainform.act.value = "delete";
			document.mainform.submit();
		}
	}
// -->
'; ?>

</script>
<form method="post" action="admin.php" name="mainform">
<input type="hidden" name="act" value="xxxxx">
<input type="hidden" name="id" value="xxxxx">
<input type="hidden" name="cmd" value="glossary">
<table class="list">
<tr>
	<th>Term</th>
	<th>Modify</th>
	<th>Delete</th>
</tr>
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
     <tr class="<?php echo smarty_function_cycle(array('values' => "row1,row2"), $this);?>
">
		<td>
			<div class="kbarticle"><a href="admin.php?cmd=glossary&amp;mode=edit&amp;id=<?php echo $this->_tpl_vars['entry']['gID']; ?>
"><?php echo $this->_tpl_vars['entry']['gTerm']; ?>
</a></div>
		</td>
		<td width="10%">
			<input type="button" name="Button" value="<?php echo @LANG_MODIFY; ?>
" onClick="document.location = 'admin.php?cmd=glossary&amp;mode=edit&amp;id=<?php echo $this->_tpl_vars['entry']['gID']; ?>
'" />
		</td>
		<td width="10%">
			<input type=button value="<?php echo @LANG_DELETE; ?>
" onClick="deletecat('<?php echo $this->_tpl_vars['entry']['gID']; ?>
')">
		</td>
	</tr>
<?php endforeach; else: ?>
	<tr><td>No results</td></tr>
<?php endif; unset($_from); ?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "row1,row2"), $this);?>
">
			<td colspan="3" align="center"><input type="button" name="Button" value="<?php echo @LANG_ADD_NEW; ?>
" onClick="document.location = 'admin.php?cmd=glossary&amp;mode=add'" /></td>
		</tr>
 </table>
 </form>
 </fieldset>

 
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