<fieldset>
		<legend>{$smarty.const.LANG_GLOSSARY}</legend>
{* glossary *}
<form name="search" action="admin.php" method="get">
	<table width="250" border="0" cellspacing="1" cellpadding="4" align="center">
		<tr>
			<td nowrap><strong>{$smarty.const.LANG_SEARCH} {$smarty.const.LANG_GLOSSARY}:</strong> <input name="q" type="text" class="searchtext" id="q" value="{$q}"></td>
			<td><input type="submit" name="Submit" value="{$smarty.const.LANG_SEARCH}"></td>
		</tr>
	</table>
	<input type="hidden" name="cmd" value="glossary" />
</form>


<script language="javascript" type="text/javascript">
{literal}
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
{/literal}
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
{foreach from=$data item="entry"}
     <tr class="{cycle values="row1,row2"}">
		<td>
			<div class="kbarticle"><a href="admin.php?cmd=glossary&amp;mode=edit&amp;id={$entry.gID}">{$entry.gTerm}</a></div>
		</td>
		<td width="10%">
			<input type="button" name="Button" value="{$smarty.const.LANG_MODIFY}" onClick="document.location = 'admin.php?cmd=glossary&amp;mode=edit&amp;id={$entry.gID}'" />
		</td>
		<td width="10%">
			<input type=button value="{$smarty.const.LANG_DELETE}" onClick="deletecat('{$entry.gID}')">
		</td>
	</tr>
{foreachelse}
	<tr><td>No results</td></tr>
{/foreach}
		<tr class="{cycle values="row1,row2"}">
			<td colspan="3" align="center"><input type="button" name="Button" value="{$smarty.const.LANG_ADD_NEW}" onClick="document.location = 'admin.php?cmd=glossary&amp;mode=add'" /></td>
		</tr>
 </table>
 </form>
 </fieldset>

 
	<div class="pageNav">
	{* display pagination *}
	<table class="pagination" cellpadding="3" cellspacing="1" border="0" align="right" style="margin-top:3px">
	<tr>
		<td class="navigationBack" style="font-weight:normal">{$smarty.const.LANG_SHOWING_PAGE} {$pageNum} {$smarty.const.LANG_OF} {$maxPage}</td>
		<td class="paginationNum">{$links}</td>
	</tr>
	</table>
	</div>