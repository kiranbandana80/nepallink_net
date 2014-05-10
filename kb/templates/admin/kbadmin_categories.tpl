<fieldset>
		<legend>{$smarty.const.LANG_CATS}</legend>
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

<form method="post" action="admin.php" name="mainform">
<input type="hidden" name="cmd" value="categories" />
<input type="hidden" name="act" value="xxxxx" />
<input type="hidden" name="mode" value="xxxxx" />
<input type="hidden" name="id" value="xxxxx" />

<table class="list" width="100%">
	<tr>
		<th>{$smarty.const.LANG_CATS} {$smarty.const.LANG_NAME}</th><th>{$smarty.const.LANG_DESCRIPTION}</th><th>{$smarty.const.LANG_MODIFY}</th><th>{$smarty.const.LANG_DELETE}</th>
	</tr>
{foreach from=$data item="entry"}
     <tr class="{cycle values="row1,row2"}">
		<td>
			&nbsp;<a href="admin.php?cmd=categories&amp;mode=edit&amp;id={$entry.cID}">{$entry.cName}</a>
		</td>
		<td>
			{$entry.cDescription|truncate:60:"...":false}
		</td>
		<td width="10%" nowrap>
			<input type="button" name="Button" value="{$smarty.const.LANG_MODIFY}" onClick="modify({$entry.cID})" />
		</td>
		<td width="10%" nowrap>
			<input type="button" name="Button" value="{$smarty.const.LANG_DELETE}" onClick="deletelisting({$entry.cID})" />
		</td>
	</tr>
{foreachelse}
	<tr><td>No results</td></tr>
{/foreach}
		<tr class="{cycle values="row1,row2"}">
			<td colspan="3" align="center"><input type="button" name="Button" value="{$smarty.const.LANG_ADD_NEW}" onClick="document.location = 'admin.php?cmd=categories&amp;mode=add'" /></td>
		</tr>
 </table>
 </form>
</fieldset>