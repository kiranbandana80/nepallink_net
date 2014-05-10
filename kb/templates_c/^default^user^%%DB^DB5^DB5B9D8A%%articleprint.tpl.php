<?php /* Smarty version 2.6.13, created on 2008-04-22 07:27:41
         compiled from articleprint.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $this->_tpl_vars['aTitle']; ?>
</title>
<style type="text/css">
<!--
<?php echo '
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
'; ?>

-->
</style>
</head>

<body onLoad="javascript: window.print();">
<?php if ($this->_tpl_vars['available'] == 'n'): ?>
<?php echo $this->_tpl_vars['lang']['kb']['notfound']; ?>

<?php else: ?>

	<h1><?php echo $this->_tpl_vars['aTitle']; ?>
</h1>
	<p>Article ID: <?php echo $this->_tpl_vars['aID']; ?>
</p>
	
	<p class="problem"><strong><?php echo @LANG_PROBLEM; ?>
</strong></p>
		
		<blockquote>
		  <p><?php echo $this->_tpl_vars['aShortDesc']; ?>
</p>
		</blockquote>
		
		<p class="problem"><strong><?php echo @LANG_SOLUTION; ?>
</strong></p>
		
		<blockquote>
			<p><?php echo $this->_tpl_vars['aDescription']; ?>
</p>
		</blockquote>
<?php endif; ?>
</body>
</html>