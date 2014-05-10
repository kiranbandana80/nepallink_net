<?php /* Smarty version 2.6.13, created on 2008-04-22 05:20:17
         compiled from article.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'article.tpl', 38, false),array('function', 'cycle', 'article.tpl', 83, false),)), $this); ?>
<script language="javascript" type="text/javascript">
<!-- // 
<?php echo '
function addbookmark(title,url) 
{
	if (window.sidebar) 
	{ 
		window.sidebar.addPanel(title, url,""); 
	} 
	else if( document.all ) 
	{
		window.external.AddFavorite( url, title);
	} 
	else if( window.opera && window.print ) 
	{
		return true;
	}
}
function emailform()
{
	newwin=window.open("email.php?id=';  echo $this->_tpl_vars['aID'];  echo '","Email","menubar=no, scrollbars=yes, width=420, height=380, directories=no,location=no,resizable=yes,status=no,toolbar=no");
}
function addComments(){
	document.getElementById(\'commentform\').style.display=\'block\';
}
'; ?>

// -->
</script>
<script type="text/javascript" src="javascript/overlib/overlib.js"><!-- overLIB (c) Erik Bosrup --></script>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>

<h1><?php echo $this->_tpl_vars['aTitle']; ?>
</h1>
<p><?php echo $this->_tpl_vars['aShortDesc']; ?>
</p>

<p><?php echo $this->_tpl_vars['aDescription']; ?>
</p>

<p class="smalltext">
	<?php echo @LANG_ADDED_ON; ?>
: <span class="kbdate"><?php echo ((is_array($_tmp=$this->_tpl_vars['aDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, @LANG_DATE_LONG) : smarty_modifier_date_format($_tmp, @LANG_DATE_LONG)); ?>
</span>
	<?php echo @LANG_VIEWED; ?>
: <?php echo $this->_tpl_vars['aHits']; ?>
 <?php echo @LANG_TIMES; ?>

</p>

<div class="articlemenu">
<span><img src="templates/<?php echo @MAIN_TEMPLATE; ?>
/images/printer.png">&nbsp;<a href="index.php?cmd=article&id=<?php echo $this->_tpl_vars['aID']; ?>
&action=print" target="_blank"><?php echo @LANG_PRINT; ?>
 <?php echo @LANG_SOLUTION; ?>
</a></span>
<span><img src="templates/<?php echo @MAIN_TEMPLATE; ?>
/images/heart_add.png">&nbsp;<a href="javascript:addbookmark('<?php echo $this->_tpl_vars['aTitle']; ?>
','<?php echo $this->_tpl_vars['url']; ?>
/index.php?cmd=article&id=<?php echo $this->_tpl_vars['aID']; ?>
');"><?php echo @LANG_ADD_TO_FAVORITES; ?>
</a></span>
<span><img src="templates/<?php echo @MAIN_TEMPLATE; ?>
/images/email.png">&nbsp;<a href='javascript:emailform();'><?php echo @LANG_EMAIL; ?>
 <?php echo @LANG_SOLUTION; ?>
</a></span>
<?php if ($this->_tpl_vars['allowcomments'] == 'Y'): ?>
<span><img src="templates/<?php echo @MAIN_TEMPLATE; ?>
/images/user_comment.png">&nbsp;<a class="small" href="javascript:void(0);" onClick="addComments()" title="Post">Post a comment</a></span>
<?php endif; ?>
</div>

<?php if ($this->_tpl_vars['attachments']): ?>
<div id="attachments">
	<strong><?php echo @LANG_ATTACHMENTS; ?>
</strong>
	<?php $_from = $this->_tpl_vars['attachments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aid'] => $this->_tpl_vars['entry']):
?>
	<span><?php if ($this->_tpl_vars['entry']['aType'] == "text/html"): ?><img src="templates/<?php echo @MAIN_TEMPLATE; ?>
/images/html.png" border="0" alt="<?php echo $this->_tpl_vars['entry']['aName']; ?>
" /><?php elseif ($this->_tpl_vars['entry']['aType'] == "application/download"): ?><img src="templates/<?php echo @MAIN_TEMPLATE; ?>
/images/zip.png" border="0" alt="<?php echo $this->_tpl_vars['entry']['aName']; ?>
" /><?php elseif ($this->_tpl_vars['entry']['aType'] == "image/png"): ?><img src="templates/<?php echo @MAIN_TEMPLATE; ?>
/images/image.png" border="0" alt="<?php echo $this->_tpl_vars['entry']['aName']; ?>
" /><?php else: ?><img src="templates/<?php echo @MAIN_TEMPLATE; ?>
/images/unknown.png" border="0" alt="<?php echo $this->_tpl_vars['entry']['aName']; ?>
" /><?php endif; ?>
	&nbsp;<a href="uploads/<?php echo $this->_tpl_vars['entry']['aName']; ?>
" target="_blank"><?php echo $this->_tpl_vars['entry']['aName']; ?>
</a></span>
	<?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>
	
<?php if ($this->_tpl_vars['starrating']): ?>
<br />
<table border="0" class="tborder">
	<tr>
		<th colspan="8">Rating</th>
	</tr>
	<tr>
	  <td><?php echo $this->_tpl_vars['starrating']; ?>
 &nbsp; </td>
      <td><a href="index.php?cmd=article&id=<?php echo $this->_tpl_vars['aID']; ?>
&rating=2"><?php echo @LANG_HELPFUL; ?>
</a> &nbsp;</td>
      <td><a href="index.php?cmd=article&id=<?php echo $this->_tpl_vars['aID']; ?>
&rating=1"><?php echo @LANG_NOT_HELPFUL; ?>
</a></td>
  </tr>
</table>
<?php endif; ?>



<?php if ($this->_tpl_vars['allowcomments'] == 'Y'): ?>
	<h2><?php echo @LANG_COMMENTS; ?>
</h2>
	<?php if ($this->_tpl_vars['comments'] <> ""): ?>
	<ol id="commentlist">
	<?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
		<li class="<?php echo smarty_function_cycle(array('values' => "alt,",'advance' => true), $this);?>
" id="comment-<?php echo $this->_tpl_vars['entry']['cID']; ?>
">
			<div class="cmtinfo">
				<em>on <?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['cDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%A, %B %e, %Y") : smarty_modifier_date_format($_tmp, "%A, %B %e, %Y")); ?>

					<small class="commentmetadata"><a href="#comment-3021" title="">&nbsp;</a> </small>
				</em>
				<cite><?php echo $this->_tpl_vars['entry']['cName']; ?>
</cite>
			</div>
			<br />
			<p><?php echo $this->_tpl_vars['entry']['cComments']; ?>
</p>
		</li>
	<?php endforeach; endif; unset($_from); ?>
	</ol>
	<?php else: ?>
	<p><?php echo @LANG_NO_COMMENTS; ?>
</p>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['addedcomment'] == TRUE): ?>
		<h3><?php echo @LANG_THANKS_COMMENTS; ?>
</h3>
	<?php else: ?>
					<div id="commentform" style="display:none">
						<!-- // Add Commment // -->
						<script Language="JavaScript" type="text/javascript">
						<?php echo '
						<!--
							function checkform(frm)
							{
								if(frm.fullname.value=="")
								{
									alert("';  echo @LANG_JAVASCRIPT_PLEASE_ENTER; ?>
 '<?php echo @LANG_FULL; ?>
 <?php echo @LANG_NAME;  echo '\'.");
									frm.fullname.focus();
									return (false);
								}
								if(frm.comments.value=="")
								{
									alert("';  echo @LANG_JAVASCRIPT_PLEASE_ENTER; ?>
 '<?php echo @LANG_COMMENTS;  echo '\'.");
									frm.comments.focus();
									return (false);
								}
								return (true);
							}
						//-->
						'; ?>

						</script>
			
						<h3><?php echo @LANG_LEAVE_COMMENTS; ?>
: </h3>
						<form method="post" action="index.php" name="comments" id="commentform" onsubmit="return checkform(this)">
						<table width="100%">
							<tr>
								<td><label for="fullname"><?php echo @LANG_FULL; ?>
 <?php echo @LANG_NAME; ?>
:</label></td>
								<td><input type="text" name="fullname" value="<?php echo $_SESSION['username']; ?>
" /></td>
							</tr>
							<tr>
								<td><label for="email"><?php echo @LANG_EMAIL; ?>
: (<?php echo @LANG_OPTIONAL; ?>
)</label></td>
								<td><input type="text" name="email" id="email" /></td>
							</tr>
							<tr>
								<td colspan="2">
									<label for="comment"><?php echo @LANG_COMMENTS; ?>
:</label>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<textarea name="comments" id="comment" cols="50%" rows="10" tabindex="4" id="comment"></textarea>
								</td>
							</tr>
							<tr>
								<td colspan="2"><input name="submit" type="submit" value="<?php echo @LANG_SUBMIT; ?>
"></td>
							</tr>
						</table>
						<input type="hidden" name="action" value="addcomment" />
						<input type="hidden" name="cmd" value="article" />
						<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['aID']; ?>
" />
						</form>
						
						<!-- // End Add Comment //-->
					</div>
	<?php endif; ?>
<?php endif; ?>