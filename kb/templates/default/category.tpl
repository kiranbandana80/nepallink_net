	{* Show the subcats *}
	{if $catrows > 0}
	<h1>{$smarty.const.LANG_SUB_CATS}</h1>
	<div id="category">
	<ul>
	{foreach from=$category item="entry"}
		<li><a href="index.php?cmd=category&id={$entry.cID}">{$entry.cName}</a></li>
	{/foreach}
	</ul>
	</div>
	{/if}
	
	{* latest Articles *}
	{if $numrows>0}
		{include file="articleslist.tpl"}
	{/if}

	{if $catrows==0 && $numrows==0}
		<h1>{$smarty.const.LANG_ERROR}</h1>
		<p>{$smarty.const.LANG_SORRY_NO_ARTICLES}</p>
		<h1>{$smarty.const.LANG_SEARCH_HELP_CENTER}</h1>
		<form action="index.php" name="searchkb">
		<input type="text" name="q" />
		<input type="submit" name="submit" value="Submit" />
		<input type="hidden" name="cmd" value="search" />
		</form>
	{/if}