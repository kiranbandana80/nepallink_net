<fieldset>
		<legend>{$smarty.const.LANG_ARTICLES}</legend>
		<form name="search" action="admin.php" method="get">
	<table width="250" border="0" cellspacing="1" cellpadding="4" align="center">
		<tr>
			<td nowrap><strong>{$smarty.const.LANG_SEARCH} {$smarty.const.LANG_ARTICLES}:</strong> <input name="q" type="text" class="searchtext" id="q" value="{$q}"></td>
			<td><input type="submit" name="Submit" value="Search"></td>
		</tr>
	</table>
	<input type="hidden" name="cmd" value="articles" />
</form>

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
<input type="hidden" name="cmd" value="articles" />
<input type="hidden" name="act" value="xxxxx" />
<input type="hidden" name="mode" value="xxxxx" />
<input type="hidden" name="id" value="xxxxx" />
<table class="list">
	<tr>
		<th>{$smarty.const.LANG_TITLE}</th>
		<th width="5%">{$smarty.const.LANG_VIEWED}</th>
		<th width="5%">{$smarty.const.LANG_DATE_ADDED}</th>
		<th>{$smarty.const.LANG_CATEGORY}</th>
		<th>{$smarty.const.LANG_MODIFY}</th>
		<th>{$smarty.const.LANG_DELETE}</th>
	</tr>
	{foreach from=$data item="entry"}
		 <tr class="{cycle values="row1,row2"}">
			<td>
				<div class="kbarticle">{$entry.aTitle}</div>
			</td>
			<td width="5%"{if $entry.aDisplay<>"Y"} style="background-color: #EFEFEF;"{/if} nowrap>
				{$entry.aHits}
			</td>
			<td width="5%"{if $entry.aDisplay<>"Y"} style="background-color: #EFEFEF;"{/if} nowrap>
				{$entry.aDate|date_format:$smarty.const.LANG_DATE_TIME}
			</td>
			<td width="30%"{if $entry.aDisplay<>"Y"} style="background-color: #EFEFEF;"{/if} nowrap>
				{foreach from=$entry.cName item="catname"}
					{$catname} 
				{/foreach}
			</td>
			<td width="10%" nowrap>
				<input type="button" name="Button" value="{$smarty.const.LANG_MODIFY}" onClick="modify({$entry.aID})" />
			</td>
			<td width="10%" nowrap>
				<input type="button" name="Button" value="{$smarty.const.LANG_DELETE}" onClick="deletelisting({$entry.aID})" />
			</td>
		</tr>
	{foreachelse}
		<tr><td>No results</td></tr>
	{/foreach}
		<tr class="{cycle values="row1,row2" advance=false}">
			<td colspan="6" align="center"><input type="button" name="Button" value="{$smarty.const.LANG_ADD_NEW}" onClick="document.location = 'admin.php?cmd=articles&amp;mode=add'" /></td>
		</tr>
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