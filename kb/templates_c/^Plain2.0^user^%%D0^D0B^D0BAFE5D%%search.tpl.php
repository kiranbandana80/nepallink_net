<?php /* Smarty version 2.6.13, created on 2008-04-22 05:20:27
         compiled from search.tpl */ ?>
<script type="text/javascript" src="includes/classes/cpaint/cpaint2.inc.compressed.js"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
<?php echo '
	var cp = new cpaint();
	cp.set_transfer_mode(\'get\');
	cp.set_response_type(\'text\');
	cp.set_persistent_connection(false);
	cp.set_async(true);
	cp.set_proxy_url(\'\');
	cp.set_debug(false);
	
		var Q = "";
		function startTimer()
		{
			if (document.searchkb.q.value != Q && document.searchkb.q.value != "")
			{
				var Q = escape(document.searchkb.q.value);
				cp.call(\'';  echo $this->_tpl_vars['url'];  echo '/ajax.php\', \'search\', searchResponse, Q);
			}
		
			setTimeout(\'startTimer();\', 2000);
		}
		function searchResponse(result) {
			document.getElementById(\'response\').innerHTML = result;
		}		
'; ?>

//-->
</script>
<h1><?php echo @LANG_SEARCH_HELP_CENTER; ?>
</h1>
<form action="index.php" name="searchkb">
<p>Search Text:<input type="text" class="norm" size="30" name="q" /><input class="norm" type="submit" name="submit" value="Submit" /></p>
<input type="hidden" name="cmd" value="search" />
</form>
<script language="Javascript" type="text/javascript">startTimer();</script>
<div id="response"></div>