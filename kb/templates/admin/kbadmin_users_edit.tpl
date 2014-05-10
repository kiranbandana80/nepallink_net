<fieldset>
		<legend>{$smarty.const.LANG_MANAGE_USERS}</legend>
<form action="admin.php" method="post">
<table class="list">
     <tr>
		<td class="{cycle values="row1,row2" advance=false}">{$smarty.const.LANG_USERNAME}: </td>
		<td class="{cycle values="row1,row2" advance=true}"><input type="text" size="35" name="mUsername" value="{$mUsername}" /></td>
	</tr>
	<tr>
		<td class="{cycle values="row1,row2" advance=false}">{$smarty.const.LANG_EMAIL}: </td>
		<td class="{cycle values="row1,row2" advance=true}"><input type="text" size="35" name="mEmail" value="{$mEmail}" /></td>
	</tr>
	<tr>
		<td colspan="2"><strong>{$smarty.const.LANG_RETYPE_PASSWORD_TXT}</strong></td>
	</tr>
	<tr>
		<td class="{cycle values="row1,row2" advance=false}">{$smarty.const.LANG_PASSWORD}: </td>
		<td class="{cycle values="row1,row2" advance=true}"><input type="password" size="35" name="mPassword" /></td>
	</tr>
	<tr>
		<td class="{cycle values="row1,row2" advance=false}">{$smarty.const.LANG_RETYPE_PASSWORD}: </td>
		<td class="{cycle values="row1,row2" advance=true}"><input type="password" size="35" name="mPassword2" /></td>
	</tr>
	<tr>
		<td class="{cycle values="row1,row2" advance=true}" colspan="2"><input type="submit" name="submit" value="{$smarty.const.LANG_SUBMIT}" /></td>
	</tr>
 </table>
 <input type="hidden" name="id" value="{$mID}" />
 {if $action=="edit"}
 <input type="hidden" name="action" value="edit" />
 {else}
  <input type="hidden" name="action" value="add" />
 {/if}
  <input type="hidden" name="cmd" value="users" />
 </form>
 </fieldset>