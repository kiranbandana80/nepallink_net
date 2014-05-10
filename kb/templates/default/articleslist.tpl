<h1>{$catTitle}</h1>
<div id="latest">
<ul>
{foreach from=$data item="entry"}
	<li><a href="index.php?cmd=article&id={$entry.aID}">{$entry.aTitle}</a></li>
{/foreach}
</ul>
</div>
	 
{* display pagination *}
<div class="pageNav">
	{$smarty.const.LANG_SHOWING_PAGE} {$pageNum} {$smarty.const.LANG_OF} {$maxPage}
	{$links}
</div>