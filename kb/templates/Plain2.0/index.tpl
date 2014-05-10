<h1>{$smarty.const.LANG_SEARCH_HELP_CENTER}</h1>
<form action="index.php" name="searchkb">
<input type="text" name="q" />
<input type="submit" name="submit" value="Submit" />
<input type="hidden" name="cmd" value="search" />
</form>

<br />

{* latest Articles *}
<h1>{$smarty.const.LANG_LATEST_ARTICLES}</h1>
<div id="latest">
<ul>
{foreach from=$data item="entry"}
	<li><a href="index.php?cmd=article&id={$entry.aID}">{$entry.aTitle}</a></li>
{/foreach}
</ul>
</div>