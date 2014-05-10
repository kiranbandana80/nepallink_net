{* @$Revision: 1.2 $ *}
<fieldset>
		<legend>{$smarty.const.LANG_ADMIN_MODULE_MANAGE}</legend>
{if $msg}
	<p class="row1" align="center">{$msg}</p>
{/if}
<p align="center"><a href='admin.php?cmd=managemodules&amp;action=regenerate'>{$smarty.const.LANG_ADMIN_REGENERATE}</a></p>

{literal}
<script language="javascript" type="text/javascript">
	<!--
		function deletemodule(id)
		{
			if(confirm('{/literal}{$smarty.const.LANG_ADMIN_MODULE_DELETECONFIRM}{literal}'))
			{
				document.location = 'admin.php?cmd=managemodules&id=' + id + '&do=changestate&action=remove';
			}
		}
		function MM_openBrWindow(theURL,winName,features) { //v2.0
			window.open(theURL,winName,features);
		}
	// -->
</script>
{/literal}
<form method="post" action="admin.php" name="mainform">
<input type="hidden" name="cmd" value="managemodules" />
<input type="hidden" name="act" value="xxxxx">
<input type="hidden" name="id" value="xxxxx">
	<table class="list" width="100%">
		<tr>
			<th>{$smarty.const.LANG_ADMIN_MODULE_NAME}</th>
			<th>{$smarty.const.LANG_DESCRIPTION}</th>
			<th>{$smarty.const.LANG_ADMIN_DIRECTORY}</th>
			<th>{$smarty.const.LANG_ADMIN_VERSION}</th>
			<th>{$smarty.const.LANG_ADMIN_STATE}</th>
			<th>{$smarty.const.LANG_ADMIN_ACTIONS}</th>
		</tr>
		{if $noresults<>""}
			<tr><td colspan="7" class="formstrip">{$noresults}</td></tr>
		{else}
		{foreach from=$results item="entry" name=status}
			<tr>
				<td class="{cycle values="row1,row2" advance=false}">{$entry.displayname}</td>
				<td class="{cycle values="row1,row2" advance=false}">{$entry.description}</td>
				<td class="{cycle values="row1,row2" advance=false}">{$entry.directory}</td>
				<td class="{cycle values="row1,row2" advance=false}">{$entry.version}</td>
				<td class="{if $entry.state=="Active"}active{elseif $entry.state=="Inactive"}inactive{else}{cycle values="row1,row2" advance=false}{/if}">{$entry.state}</td>
				<td class="{cycle values="row1,row2" advance=true}" nowrap>
				<a href='admin.php?cmd=managemodules&amp;id={$entry.id}&amp;do=changestate&amp;action={$entry.action}'>{$entry.actiontext}</a>
				{if $entry.action == "initialize" || $entry.action=="activate"}
				| <a href="javascript:deletemodule('{$entry.id}')">{$smarty.const.LANG_DELETE}</a>
				{/if}
				{if $entry.admin_capable==1 && $entry.action=="deactivate"}
				| <a href="admin.php?cmd=modules&amp;mod={$entry.name}">{$smarty.const.LANG_ADMIN_MANAGE}</a>
				{/if}
				| <a href="javascript:void(0);" onclick="MM_openBrWindow('modules/{$entry.directory}/readme.txt','readme','scrollbars=yes,resizable=yes,width=600,height=500')">{$smarty.const.LANG_ADMIN_HELP}</a>
				</td>
			</tr>
		{/foreach}
		{/if}
	</table>
</form>
</fieldset>