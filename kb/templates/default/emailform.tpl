<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>{$kbtitle}</title>
<link rel="stylesheet" href="templates/{$smarty.const.MAIN_TEMPLATE}/css/style.css" type="text/css" />
</head>
<body>
<script language="JavaScript">
{literal}
<!--
	function checkform(frm)
	{
		if(frm.from_name.value=="")
		{
			alert("Please enter a value in the field \"From Name\".");
			frm.from_name.focus();
			return (false);
		}
		if(frm.from_email.value=="")
		{
			alert("Please enter a value in the field \"From Email\".");
			frm.from_email.focus();
			return (false);
		}
		if(frm.to_name.value=="")
		{
			alert("Please enter a value in the field \"Reciever Name\".");
			frm.to_name.focus();
			return (false);
		}
		if(frm.to_email.value=="")
		{
			alert("Please enter a value in the field \"To Email\".");
			frm.to_email.focus();
			return (false);
		}
		validemail=0;
		var checkStr = frm.to_email.value;
		for (i = 0; i < checkStr.length; i++)
		{
			if(checkStr.charAt(i)=="@")
				validemail |= 1;
			if(checkStr.charAt(i)==".")
				validemail |= 2;
		}
		if(validemail != 3)
		{
			alert("Please enter a valid email address.");
			frm.to_email.focus();
			return (false);
		}
	}
// -->
{/literal}
</script>
<form method="post" action="email.php" name="mainform" onsubmit="return checkform(this)">
<input type="hidden" name="cmd" value="email" />
<input type="hidden" name="id" value="{$id}" />

<table class="list">
	<tr>
		<th colspan="2">Email Article</th>
	</tr>
	<tr>
		<td>
			From Name:
		</td>
		<td>
			<input type="text" name="from_name" size="35" />
		</td>
	</tr>
	<tr>
		<td>
			From Email:
		</td>
		<td>
			<input type="text" name="from_email" size="35" />
		</td>
	</tr>
	<tr>
		<td>
			Reciever Name:
		</td>
		<td>
			<input type="text" name="to_name" size="35" />
		</td>
	</tr>
	<tr>
		<td>
			Reciever Email:
		</td>
		<td>
			<input type="text" name="to_email" size="35" />
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<input type="submit" name="submit" value="submit" />
		</td>
	</tr>
</table>
</form>

</body>
</html>