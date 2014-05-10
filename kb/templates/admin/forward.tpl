{*forward the user *}
{if $go == TRUE}
<meta http-equiv="refresh" content="2;URL={$location}" />
<table class="list">
	<tr>
		<th>{$smarty.const.LANG_THANKS}</th>
	</tr>
	<tr>
		<td>{$smarty.const.LANG_FORWARD}<br />{$smarty.const.LANG_FORWARD_IF_NOT} <a href="{$location}">{$smarty.const.LANG_FORWARD_CLICK_HERE}.</a></td>
	</tr>
</table>

{else}

<table class="list">
	<tr>
		<th>{$smarty.const.LANG_ERROR}</th>
	</tr>
	<tr>
		<td>{if $error==""}{$smarty.const.LANG_ERROR_MSG}{else}{$error}{/if}</td>
	</tr>
</table>

{/if}