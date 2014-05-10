<h1>{$smarty.const.LANG_CATS}</h1>
{html_table_adv loop=$parent_categories cols=3 table_attr='width="100%"' td_attr='width="33%"'}
	<img src="templates/{$smarty.const.MAIN_TEMPLATE}/images/folder.png" />&nbsp;<a href="index.php?cmd=category&id=[[cID]]">[[cName]]</a>
{/html_table_adv}

{* latest Articles *}
<h1>{$smarty.const.LANG_LATEST_ARTICLES}</h1>
<div id="latest">
<ul>
{foreach from=$data item="entry"}
	<li><a href="index.php?cmd=article&id={$entry.aID}">{$entry.aTitle}</a></li>
{/foreach}
</ul>
</div>