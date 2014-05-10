<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>{$aTitle}</title>
<style type="text/css">
<!--
{literal}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #666666;
}
h1 {
	font-size: 24px;
	color: #666666;
}
.problem {
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #333333;
	margin: 5px;
	padding: 5px;
}
{/literal}
-->
</style>
</head>

<body onLoad="javascript: window.print();">
{if $available == 'n'}
{$lang.kb.notfound}
{else}

	<h1>{$aTitle}</h1>
	<p>Article ID: {$aID}</p>
	
	<p class="problem"><strong>{$smarty.const.LANG_PROBLEM}</strong></p>
		
		<blockquote>
		  <p>{$aShortDesc}</p>
		</blockquote>
		
		<p class="problem"><strong>{$smarty.const.LANG_SOLUTION}</strong></p>
		
		<blockquote>
			<p>{$aDescription}</p>
		</blockquote>
{/if}
</body>
</html>
