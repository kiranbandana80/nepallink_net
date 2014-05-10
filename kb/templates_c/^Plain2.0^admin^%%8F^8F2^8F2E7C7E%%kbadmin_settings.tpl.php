<?php /* Smarty version 2.6.13, created on 2008-04-22 05:20:19
         compiled from kbadmin_settings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'kbadmin_settings.tpl', 7, false),)), $this); ?>
<fieldset>
		<legend><?php echo @LANG_CONFIGURATION; ?>
</legend>
<form action="admin.php" method="post">
<table class="list">
	<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
     <tr>
		<td class="<?php echo smarty_function_cycle(array('values' => "row1,row2",'advance' => false), $this);?>
"><?php echo $this->_tpl_vars['entry']['name']; ?>
: </td>
		<?php if ($this->_tpl_vars['entry']['type'] == 'yesno'): ?>
			<td class="<?php echo smarty_function_cycle(array('values' => "row1,row2",'advance' => true), $this);?>
">
				<select name="<?php echo $this->_tpl_vars['entry']['sID']; ?>
">
					<option value="Y"<?php if ($this->_tpl_vars['entry']['value'] == 'Y'): ?> SELECTED<?php endif; ?>>Yes</option>
					<option value="N"<?php if ($this->_tpl_vars['entry']['value'] == 'N'): ?> SELECTED<?php endif; ?>>No</option>
				</select>
			</td>
		<?php elseif ($this->_tpl_vars['entry']['type'] == 'template'): ?>
			<td class="<?php echo smarty_function_cycle(array('values' => "row1,row2",'advance' => true), $this);?>
">
				<select name="<?php echo $this->_tpl_vars['entry']['sID']; ?>
">
					<?php $_from = $this->_tpl_vars['templates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['temp']):
?>
					<option value="<?php echo $this->_tpl_vars['temp']; ?>
"<?php if ($this->_tpl_vars['entry']['value'] == $this->_tpl_vars['temp']): ?> SELECTED<?php endif; ?>><?php echo $this->_tpl_vars['temp']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
		<?php elseif ($this->_tpl_vars['entry']['type'] == 'language'): ?>
			<td class="<?php echo smarty_function_cycle(array('values' => "row1,row2",'advance' => true), $this);?>
">
				<select name="<?php echo $this->_tpl_vars['entry']['sID']; ?>
">
					<?php $_from = $this->_tpl_vars['language']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang']):
?>
					<option value="<?php echo $this->_tpl_vars['lang']; ?>
"<?php if ($this->_tpl_vars['entry']['value'] == $this->_tpl_vars['lang']): ?> SELECTED<?php endif; ?>><?php echo $this->_tpl_vars['lang']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
		<?php else: ?>
			<td class="<?php echo smarty_function_cycle(array('values' => "row1,row2",'advance' => true), $this);?>
"><input type="text" size="35" name="<?php echo $this->_tpl_vars['entry']['sID']; ?>
" value="<?php echo $this->_tpl_vars['entry']['value']; ?>
" /></td>
		<?php endif; ?>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	<tr>
		<td class="<?php echo smarty_function_cycle(array('values' => "row1,row2",'advance' => true), $this);?>
" colspan="2" align="center"><input type="submit" name="submit" value="<?php echo @LANG_SUBMIT; ?>
" /></td>
	</tr>
 </table>
<input type="hidden" name="action" value="edit" />
<input type="hidden" name="cmd" value="settings" />
</form>
</fieldset>