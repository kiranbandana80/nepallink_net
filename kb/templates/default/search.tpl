<script type="text/javascript" src="includes/classes/cpaint/cpaint2.inc.compressed.js"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
{literal}
	var cp = new cpaint();
	cp.set_transfer_mode('get');
	cp.set_response_type('text');
	cp.set_persistent_connection(false);
	cp.set_async(true);
	cp.set_proxy_url('');
	cp.set_debug(false);
	
		var Q = "";
		function startTimer()
		{
			if (document.searchkb.q.value != Q && document.searchkb.q.value != "")
			{
				var Q = escape(document.searchkb.q.value);
				cp.call('{/literal}{$url}{literal}/ajax.php', 'search', searchResponse, Q);
			}
		
			setTimeout('startTimer();', 2000);
		}
		function searchResponse(result) {
			document.getElementById('response').innerHTML = result;
		}		
{/literal}
//-->
</script>
<h1>{$smarty.const.LANG_SEARCH_HELP_CENTER}</h1>
<form action="index.php" name="searchkb">
<p>Search Text:<input type="text" class="norm" size="30" name="q" /><input class="norm" type="submit" name="submit" value="Submit" /></p>
<input type="hidden" name="cmd" value="search" />
</form>
<script language="Javascript" type="text/javascript">startTimer();</script>
<div id="response"></div>