<?php /* Smarty version 2.6.13, created on 2008-04-05 07:56:41
         compiled from layout.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $this->_tpl_vars['kbtitle']; ?>
</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link href="templates/<?php echo @MAIN_TEMPLATE; ?>
/css/style.css" rel="stylesheet" type="text/css" />
	<link href="javascript/dtree/dtree.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="javascript/dtree/dtree.js"></script>
</head>

<body>

	<div id="header">
		<h1><a href="index.php"><?php echo $this->_tpl_vars['kbtitle']; ?>
</a></h1>
	</div>
	
	<div id="container">
		<div id="sidebar">
			<div class="dtree">
			<script type="text/javascript">
				<!--
				<?php echo '
				d = new dTree(\'d\');
				d.add(0,-1,\'';  echo @LANG_MAIN_CATS;  echo '\');
				'; ?>

					<?php $_from = $this->_tpl_vars['js_tree']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
						<?php echo $this->_tpl_vars['entry']['name']; ?>

					<?php endforeach; endif; unset($_from); ?>
				document.write(d);
				//-->
			</script>
			</div>
		</div>
		
		<div id="content">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['body'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>			
		</div>
	</div>
	
	<div id="footer">
		<div id="footercontent">
			Copyright &copy; <b>NepalLink Network Pvt. Ltd.</b> 2000 - 2008
	  </div>
	</div>

</body>
</html>