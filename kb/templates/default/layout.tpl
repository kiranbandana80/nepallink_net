<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{$kbtitle}</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link href="templates/{$smarty.const.MAIN_TEMPLATE}/css/style.css" rel="stylesheet" type="text/css" />
	<link href="javascript/dtree/dtree.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="javascript/dtree/dtree.js"></script>
</head>

<body>

	<div id="header">
		<h1><a href="index.php">{$kbtitle}</a></h1>
	</div>
	
	<div id="container">
		<div id="sidebar">
			<div class="dtree">
			<script type="text/javascript">
				<!--
				{literal}
				d = new dTree('d');
				d.add(0,-1,'{/literal}{$smarty.const.LANG_MAIN_CATS}{literal}');
				{/literal}
					{foreach from=$js_tree item=entry}
						{$entry.name}
					{/foreach}
				document.write(d);
				//-->
			</script>
			</div>
		</div>
		
		<div id="content">
			{include file=$body}			
		</div>
	</div>
	
	<div id="footer">
		<div id="footercontent">
			Copyright &copy; <b>NepalLink Network Pvt. Ltd.</b> 2000 - 2008
	  </div>
	</div>

</body>
</html>
