<script language="javascript" type="text/javascript">
{literal}
<!--
	function deletelisting(id) 
	{
		cmsg = "Sure you want to delete this record?\nIt can not be undone!"
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
{/literal}
</script>
<fieldset>
		<legend>{$smarty.const.LANG_MANAGE_USERS}</legend>
<form method="post" action="admin.php" name="mainform">
<input type="hidden" name="cmd" value="users" />
<input type="hidden" name="act" value="xxxxx" />
<input type="hidden" name="mode" value="xxxxx" />
<input type="hidden" name="id" value="xxxxx" />

<table class="list">
	<tr>
		<th>User Name</th>
		<th>User Email</th>
		<th>{$smarty.const.LANG_MODIFY}</th>
		<th>{$smarty.const.LANG_DELETE}</th>
	</tr>
	{foreach from=$data item="entry"}
		 <tr class="{cycle values="row1,row2"}">
			<td>
				{$entry.mUsername}
			</td>
			<td>
				{$entry.mEmail}
			</td>
			<td width="10%" nowrap>
				<input type="button" name="Button" value="{$smarty.const.LANG_MODIFY}" onClick="modify({$entry.mID})" />
			</td>
			<td width="10%" nowrap>
				<input type="button" name="Button" value="{$smarty.const.LANG_DELETE}" onClick="deletelisting({$entry.mID})" />
		</td>
		</tr>
	{foreachelse}
		<tr><td>No results</td></tr>
	{/foreach}
		<tr class="{cycle values="row1,row2" advance=false}">
			<td colspan="3" align="center"><input type="button" name="Button" value="{$smarty.const.LANG_ADD_NEW}" onClick="document.location = 'admin.php?cmd=users&amp;mode=add'" /></td>
		</tr>
</table>
</form>
</fieldset>