<?php /* Smarty version 2.6.13, created on 2008-04-05 07:44:43
         compiled from login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'login.tpl', 24, false),)), $this); ?>
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
				<form action="<?php echo $this->_tpl_vars['target']; ?>
" method="post">
				<input type="hidden" name="cmd" value="login" />
				<input type="hidden" name="action" value="login" />
					<table width="100%" cellpadding="3" style="border: 1px solid #405E80;">
						<tr>
							<td><?php echo @LANG_USERNAME; ?>
: </td>
							<td><input type="text" name="username" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['username'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
						</tr>
						<tr>
							<td><?php echo @LANG_PASSWORD; ?>
: </td>
							<td><input type="password" name="password" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['password'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="submit" value="Login"  /></td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
	</table>
	<div style="text-align: center;">&copy; 2006 <a href="http://www.barnesinnovations.com">Peanut Help Center</a> <?php echo $this->_tpl_vars['kbversion']; ?>
</div>
</body>
</html>