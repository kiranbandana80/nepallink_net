<?php /* Smarty version 2.6.13, created on 2008-04-22 05:23:00
         compiled from maintenance.tpl */ ?>
<?php if ($this->_tpl_vars['msg']): ?>
	<p class="row1" align="center"><?php echo $this->_tpl_vars['msg']; ?>
</p>
<?php endif; ?>
<table class="list" width="100%">
	<tr>
		<th>Title</th>
		<th>Description</th>
		<th>Run</th>
	</tr>
     <tr class="row1">
		<td>Reset Article Views </td>
		<td>
			Running this will reset your article view back to one. </td>

		<td width="10%" nowrap>
			<form method="post" action="admin.php" name="mainform">
			<input type="hidden" name="cmd" value="modules" />
			<input type="hidden" name="mod" value="maintenance" />
			<input type="hidden" name="act" value="reset" />
			<input type="submit" name="Submit" value="Run" />
			</form>
		</td>
	</tr>
     <tr class="row2">
          <td>Delete Compilied Templates </td>
          <td>Running this will delete all your compiled templates. </td>
          <td nowrap><form method="post" action="admin.php" name="mainform">
			<input type="hidden" name="cmd" value="modules" />
			<input type="hidden" name="mod" value="maintenance" />
			<input type="hidden" name="act" value="delete_compiled" />
			<input type="submit" name="Submit" value="Run" />
			</form></td>
     </tr>
 </table>