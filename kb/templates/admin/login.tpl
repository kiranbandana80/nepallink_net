<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Login</title>
<link rel="stylesheet" href="templates/admin/css/style.css" type="text/css" />
</head>

<body>
<br/><br/>
	<table width="500" align="center" style="border: 1px solid #405E80;">
		<tr>
			<td align="left">
				<img src="templates/admin/images/icon_login.png" />
			</td>
			<td>
				<form action="{$target}" method="post">
				<input type="hidden" name="cmd" value="login" />
				<input type="hidden" name="action" value="login" />
					<table width="100%" cellpadding="3" style="border: 1px solid #405E80;">
						<tr>
							<td>{$smarty.const.LANG_USERNAME}: </td>
							<td><input type="text" name="username" value="{$username|escape}" /></td>
						</tr>
						<tr>
							<td>{$smarty.const.LANG_PASSWORD}: </td>
							<td><input type="password" name="password" value="{$password|escape}" /></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="submit" value="Login"  /></td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
	</table>
	<div style="text-align: center;">&copy; 2006 <a href="http://www.barnesinnovations.com">Peanut Help Center</a> {$kbversion}</div>
</body>
</html>
