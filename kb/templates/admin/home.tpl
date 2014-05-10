<fieldset>
		<legend>Dashboard</legend>
		<table id="mainpanel">
		<tr>
			<td width="110" class="icon">
				<img src="templates/admin/images/icon_articles.png" alt="{$smarty.const.LANG_MANAGE_ARTICLES}" align="middle" border="0" />
				<br />
				<a href="admin.php?cmd=articles">{$smarty.const.LANG_MANAGE_ARTICLES}</a>
			</td>
			<td width="110" class="icon">
				<img src="templates/admin/images/icon_categories.png" alt="{$smarty.const.LANG_MANAGE_CATS}" align="middle" border="0" />
				<a href="admin.php?cmd=categories">{$smarty.const.LANG_MANAGE_CATS}</a>
			</td>
			<td width="110" class="icon">
				<img src="templates/admin/images/icon_home.png" alt="{$smarty.const.LANG_CONFIGURATION}" align="middle" border="0" />
				<a href="admin.php?cmd=settings">{$smarty.const.LANG_CONFIGURATION}</a>
			</td>
			<td width="110" class="icon">
				<img src="templates/admin/images/icon_glossary.png" alt="{$smarty.const.LANG_MANAGE_GLOSSARY}" align="middle" border="0" />
				<a href="admin.php?cmd=glossary">{$smarty.const.LANG_MANAGE_GLOSSARY}</a>
			</td>	
		</tr>
		<tr>
			<td width="110" class="icon">
				<img src="templates/admin/images/icon_comments.png" alt="{$smarty.const.LANG_MANAGE_COMMENTS}" align="middle" border="0" />
				<a href="admin.php?cmd=comments">{$smarty.const.LANG_MANAGE_COMMENTS}</a>
			</td>
			<td width="110" class="icon">
				<img src="templates/admin/images/icon_users.png" alt="{$smarty.const.LANG_MANAGE_USERS}" align="middle" border="0" />
				<br />
				<a href="admin.php?cmd=users">{$smarty.const.LANG_MANAGE_USERS}</a>
			</td>
			
			<td width="110" class="icon">
				<img src="templates/admin/images/icon_stats.png" alt="{$smarty.const.LANG_MANAGE_STATS}" align="middle" border="0" />
				<a href="admin.php?cmd=stats">
				{$smarty.const.LANG_MANAGE_STATS}
				</a>
			</td>
			
			<td width="110">
				
			</td>
		</tr>
	</table>
	</fieldset>  

	
	<div id="stats">
	<fieldset>
		<legend>{$smarty.const.LANG_QUICK_STATS}</legend>
		<p>{$smarty.const.LANG_WELCOME} {$username}</p>
		<p>{$smarty.const.LANG_TOTAL} {$smarty.const.LANG_ARTICLES}: {$articles}</p>
		<p>{$smarty.const.LANG_TOTAL} {$smarty.const.LANG_CATS}: {$categories}</p>
		<p>{$smarty.const.LANG_TOTAL} {$smarty.const.LANG_COMMENTS}: {$comments}</p>
	</fieldset>  
	</div>