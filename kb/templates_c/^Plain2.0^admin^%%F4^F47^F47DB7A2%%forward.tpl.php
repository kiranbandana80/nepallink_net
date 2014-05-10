<?php /* Smarty version 2.6.13, created on 2008-04-22 05:20:33
         compiled from forward.tpl */ ?>
<?php if ($this->_tpl_vars['go'] == TRUE): ?>
<meta http-equiv="refresh" content="2;URL=<?php echo $this->_tpl_vars['location']; ?>
" />
<table class="list">
	<tr>
		<th><?php echo @LANG_THANKS; ?>
</th>
	</tr>
	<tr>
		<td><?php echo @LANG_FORWARD; ?>
<br /><?php echo @LANG_FORWARD_IF_NOT; ?>
 <a href="<?php echo $this->_tpl_vars['location']; ?>
"><?php echo @LANG_FORWARD_CLICK_HERE; ?>
.</a></td>
	</tr>
</table>

<?php else: ?>

<table class="list">
	<tr>
		<th><?php echo @LANG_ERROR; ?>
</th>
	</tr>
	<tr>
		<td><?php if ($this->_tpl_vars['error'] == ""):  echo @LANG_ERROR_MSG;  else:  echo $this->_tpl_vars['error'];  endif; ?></td>
	</tr>
</table>

<?php endif; ?>