<form action="admin.php" method="post">
<fieldset>
		<legend>{$smarty.const.LANG_MANAGE_COMMENTS}</legend>
<table class="list">
	<tr>
		<td class="{cycle values="row1,row2" advance=false}">{$smarty.const.LANG_NAME}: </td>
		<td class="{cycle values="row1,row2" advance=true}"><input type="text" size="35" name="cName" value="{$cName}" /></td>
	</tr>
	<tr>
		<td class="{cycle values="row1,row2" advance=false}">{$smarty.const.LANG_EMAIL}: </td>
		<td class="{cycle values="row1,row2" advance=true}"><input type="text" size="35" name="cEmail" value="{$cEmail}" /></td>
	</tr>
	<tr>
		<td class="{cycle values="row1,row2" advance=false}">{$smarty.const.LANG_DISPLAY}: </td>
		<td class="{cycle values="row1,row2" advance=true}"><input type="checkbox" name="cApproved" value="Y"{if $cApproved=="Y"} CHECKED{/if} /></td>
	</tr>
	<tr>
		<td class="{cycle values="row1,row2" advance=false}"">{$smarty.const.LANG_DESCRIPTION}: </td>
		<td class="{cycle values="row1,row2" advance=true}">
		<textarea id="cComments" name="cComments" style="width: 100%" rows="15">{$cComments}</textarea>
		</td>
	</tr>
	<tr>
		<td class="{cycle values="row1,row2" advance=true}" colspan="2"><input type="submit" name="submit" value="{$smarty.const.LANG_SUBMIT}" /></td>
	</tr>
 </table>
 <input type="hidden" name="id" value="{$cID}" />
 {if $action=="edit"}
 <input type="hidden" name="action" value="edit" />
 {else}
  <input type="hidden" name="action" value="add" />
 {/if}
  <input type="hidden" name="cmd" value="comments" />
  </fieldset>
 </form>