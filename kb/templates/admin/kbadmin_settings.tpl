<fieldset>
		<legend>{$smarty.const.LANG_CONFIGURATION}</legend>
<form action="admin.php" method="post">
<table class="list">
	{foreach from=$data item=entry}
     <tr>
		<td class="{cycle values="row1,row2" advance=false}">{$entry.name}: </td>
		{if $entry.type=="yesno"}
			<td class="{cycle values="row1,row2" advance=true}">
				<select name="{$entry.sID}">
					<option value="Y"{if $entry.value=="Y"} SELECTED{/if}>Yes</option>
					<option value="N"{if $entry.value=="N"} SELECTED{/if}>No</option>
				</select>
			</td>
		{elseif $entry.type=="template"}
			<td class="{cycle values="row1,row2" advance=true}">
				<select name="{$entry.sID}">
					{foreach from=$templates item=temp}
					<option value="{$temp}"{if $entry.value==$temp} SELECTED{/if}>{$temp}</option>
					{/foreach}
				</select>
			</td>
		{elseif $entry.type=="language"}
			<td class="{cycle values="row1,row2" advance=true}">
				<select name="{$entry.sID}">
					{foreach from=$language item=lang}
					<option value="{$lang}"{if $entry.value==$lang} SELECTED{/if}>{$lang}</option>
					{/foreach}
				</select>
			</td>
		{else}
			<td class="{cycle values="row1,row2" advance=true}"><input type="text" size="35" name="{$entry.sID}" value="{$entry.value}" /></td>
		{/if}
	</tr>
	{/foreach}
	<tr>
		<td class="{cycle values="row1,row2" advance=true}" colspan="2" align="center"><input type="submit" name="submit" value="{$smarty.const.LANG_SUBMIT}" /></td>
	</tr>
 </table>
<input type="hidden" name="action" value="edit" />
<input type="hidden" name="cmd" value="settings" />
</form>
</fieldset>