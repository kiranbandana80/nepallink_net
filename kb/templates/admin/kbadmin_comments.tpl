<fieldset>
		<legend>{$smarty.const.LANG_COMMENTS}</legend>
<form name="search" action="admin.php" method="get">
	<table width="250" border="0" cellspacing="1" cellpadding="4" align="center">
		<tr>
			<td nowrap><strong>{$smarty.const.LANG_SEARCH} {$smarty.const.LANG_COMMENTS}:</strong> <input name="q" type="text" class="searchtext" id="q" value="{$q}"></td>
			<td><input type="submit" name="Submit" value="{$smarty.const.LANG_SEARCH}"></td>
		</tr>
	</table>
	<input type="hidden" name="cmd" value="comments" />
</form>

<script language="javascript" type="text/javascript">
{literal}
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
<input type="hidden" name="cmd" value="comments" />
<input type="hidden" name="act" value="xxxxx" />
<input type="hidden" name="mode" value="xxxxx" />
<input type="hidden" name="id" value="xxxxx" />

<table class="list" width="100%">
	<tr>
		<th>{$smarty.const.LANG_NAME}</th><th>{$smarty.const.LANG_EMAIL}</th><th>{$smarty.const.LANG_DATE_ADDED}</th><th>{$smarty.const.LANG_APPROVED}</th><th>{$smarty.const.LANG_MODIFY}</th><th>{$smarty.const.LANG_DELETE}</th>
	</tr>
{foreach from=$data item="entry"}
     <tr class="{cycle values="row1,row2"}">
		<td>
			&nbsp;<a href="admin.php?cmd=comments&mode=edit&id={$entry.cID}">{$entry.cName}</a>
		</td>
		<td>
			{$entry.cEmail}
		</td>
		<td>
			{$entry.cDate|date_format:$smarty.const.LANG_DATE_TIME}
		</td>
		<td>
			{if $entry.cApproved=="Y"}
				<img src="templates/admin/images/ok.png" />
			{else}
				<a href="#" onclick="approve({$entry.cID})"><img src="templates/admin/images/x.png" border="0" alt="{$smarty.const.LANG_APPROVE}" /></a>
			{/if}
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
 </table>
 </form>
 
 
	<div class="pageNav">
	{* display pagination *}
	<table class="pagination" cellpadding="3" cellspacing="1" border="0" align="right" style="margin-top:3px">
	<tr>
		<td class="navigationBack" style="font-weight:normal">{$smarty.const.LANG_SHOWING_PAGE} {$pageNum} {$smarty.const.LANG_OF} {$maxPage}</td>
		<td class="paginationNum">{$links}</td>
	</tr>
	</table>
	</div>
</fieldset>