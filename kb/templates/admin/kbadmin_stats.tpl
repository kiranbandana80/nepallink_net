<fieldset>
		<legend>{$smarty.const.LANG_MANAGE_STATS}</legend>
		<table width="100%">
		<tr>
			<td valign="top">
				<strong>{$smarty.const.LANG_CATS}</strong>
				<ul>
					<li>{$smarty.const.LANG_TOTAL} {$smarty.const.LANG_CATS}: {$totalcats}</li>
					<li>{$smarty.const.LANG_MAIN_CATS}: {$parentcats}</li>
					<li>{$smarty.const.LANG_SUB_CATS}: {$subcats}</li>
				</ul>
			</td>
			<td valign="top">
				<strong>{$smarty.const.LANG_MOST_VIEWED}</strong>
				<ul>
				{foreach from=$toparticles item=entry}
					<li><a href="index.php?cmd=article&amp;id={$entry.aID}" target="_blank">{$entry.aTitle}</a> ({$entry.aHits})</li>
				{/foreach}
				</ul>
			</td>
		</tr>
		<tr>
			<td valign="top">
				<strong>{$smarty.const.LANG_USERS}</strong>
				<ul>
					<li>{$smarty.const.LANG_TOTAL} {$smarty.const.LANG_USERS}: {$users}</li>
				</ul>
			</td>
		</tr>
</table>
</fieldset>