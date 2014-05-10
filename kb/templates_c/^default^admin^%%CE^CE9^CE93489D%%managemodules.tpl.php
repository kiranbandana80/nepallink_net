<?php /* Smarty version 2.6.13, created on 2008-04-05 07:46:11
         compiled from managemodules.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'managemodules.tpl', 43, false),)), $this); ?>
<fieldset>
		<legend><?php echo @LANG_ADMIN_MODULE_MANAGE; ?>
</legend>
<?php if ($this->_tpl_vars['msg']): ?>
	<p class="row1" align="center"><?php echo $this->_tpl_vars['msg']; ?>
</p>
<?php endif; ?>
<p align="center"><a href='admin.php?cmd=managemodules&amp;action=regenerate'><?php echo @LANG_ADMIN_REGENERATE; ?>
</a></p>

<?php echo '
<script language="javascript" type="text/javascript">
	<!--
		function deletemodule(id)
		{
			if(confirm(\'';  echo @LANG_ADMIN_MODULE_DELETECONFIRM;  echo '\'))
			{
				document.location = \'admin.php?cmd=managemodules&id=\' + id + \'&do=changestate&action=remove\';
			}
		}
		function MM_openBrWindow(theURL,winName,features) { //v2.0
			window.open(theURL,winName,features);
		}
	// -->
</script>
'; ?>

<form method="post" action="admin.php" name="mainform">
<input type="hidden" name="cmd" value="managemodules" />
<input type="hidden" name="act" value="xxxxx">
<input type="hidden" name="id" value="xxxxx">
	<table class="list" width="100%">
		<tr>
			<th><?php echo @LANG_ADMIN_MODULE_NAME; ?>
</th>
			<th><?php echo @LANG_DESCRIPTION; ?>
</th>
			<th><?php echo @LANG_ADMIN_DIRECTORY; ?>
</th>
			<th><?php echo @LANG_ADMIN_VERSION; ?>
</th>
			<th><?php echo @LANG_ADMIN_STATE; ?>
</th>
			<th><?php echo @LANG_ADMIN_ACTIONS; ?>
</th>
		</tr>
		<?php if ($this->_tpl_vars['noresults'] <> ""): ?>
			<tr><td colspan="7" class="formstrip"><?php echo $this->_tpl_vars['noresults']; ?>
</td></tr>
		<?php else: ?>
		<?php $_from = $this->_tpl_vars['results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['status'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['status']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['entry']):
        $this->_foreach['status']['iteration']++;
?>
			<tr>
				<td class="<?php echo smarty_function_cycle(array('values' => "row1,row2",'advance' => false), $this);?>
"><?php echo $this->_tpl_vars['entry']['displayname']; ?>
</td>
				<td class="<?php echo smarty_function_cycle(array('values' => "row1,row2",'advance' => false), $this);?>
"><?php echo $this->_tpl_vars['entry']['description']; ?>
</td>
				<td class="<?php echo smarty_function_cycle(array('values' => "row1,row2",'advance' => false), $this);?>
"><?php echo $this->_tpl_vars['entry']['directory']; ?>
</td>
				<td class="<?php echo smarty_function_cycle(array('values' => "row1,row2",'advance' => false), $this);?>
"><?php echo $this->_tpl_vars['entry']['version']; ?>
</td>
				<td class="<?php if ($this->_tpl_vars['entry']['state'] == 'Active'): ?>active<?php elseif ($this->_tpl_vars['entry']['state'] == 'Inactive'): ?>inactive<?php else:  echo smarty_function_cycle(array('values' => "row1,row2",'advance' => false), $this); endif; ?>"><?php echo $this->_tpl_vars['entry']['state']; ?>
</td>
				<td class="<?php echo smarty_function_cycle(array('values' => "row1,row2",'advance' => true), $this);?>
" nowrap>
				<a href='admin.php?cmd=managemodules&amp;id=<?php echo $this->_tpl_vars['entry']['id']; ?>
&amp;do=changestate&amp;action=<?php echo $this->_tpl_vars['entry']['action']; ?>
'><?php echo $this->_tpl_vars['entry']['actiontext']; ?>
</a>
				<?php if ($this->_tpl_vars['entry']['action'] == 'initialize' || $this->_tpl_vars['entry']['action'] == 'activate'): ?>
				| <a href="javascript:deletemodule('<?php echo $this->_tpl_vars['entry']['id']; ?>
')"><?php echo @LANG_DELETE; ?>
</a>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['entry']['admin_capable'] == 1 && $this->_tpl_vars['entry']['action'] == 'deactivate'): ?>
				| <a href="admin.php?cmd=modules&amp;mod=<?php echo $this->_tpl_vars['entry']['name']; ?>
"><?php echo @LANG_ADMIN_MANAGE; ?>
</a>
				<?php endif; ?>
				| <a href="javascript:void(0);" onclick="MM_openBrWindow('modules/<?php echo $this->_tpl_vars['entry']['directory']; ?>
/readme.txt','readme','scrollbars=yes,resizable=yes,width=600,height=500')"><?php echo @LANG_ADMIN_HELP; ?>
</a>
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
	</table>
</form>
</fieldset>