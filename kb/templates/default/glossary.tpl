<h1>{$smarty.const.LANG_GLOSSARY}</h1>
<table border="0" class="tborder" width="100%">
	<tr>
		<td><a href="index.php?cmd=glossary&q=%23">#</a></td>
		{foreach from=$letter item=entry}
			<td><a href="index.php?cmd=glossary&q={$entry.letter|upper}">{$entry.letter|upper}</a></td>
		{/foreach}
	</tr>
</table>


<br />
{foreach from=$terms item=entry}
<dl>
	<dt><a name="{$entry.gTerm}"></a>{$entry.gTerm}</dt>
	<dd>{$entry.gDefinition}</dd>
</dl>	
{/foreach}
		