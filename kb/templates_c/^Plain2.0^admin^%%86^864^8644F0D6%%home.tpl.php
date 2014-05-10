<?php /* Smarty version 2.6.13, created on 2008-04-22 06:03:18
         compiled from home.tpl */ ?>
<fieldset>
		<legend>Dashboard</legend>
		<table id="mainpanel">
		<tr>
			<td width="110" class="icon">
				<img src="templates/admin/images/icon_articles.png" alt="<?php echo @LANG_MANAGE_ARTICLES; ?>
" align="middle" border="0" />
				<br />
				<a href="admin.php?cmd=articles"><?php echo @LANG_MANAGE_ARTICLES; ?>
</a>
			</td>
			<td width="110" class="icon">
				<img src="templates/admin/images/icon_categories.png" alt="<?php echo @LANG_MANAGE_CATS; ?>
" align="middle" border="0" />
				<a href="admin.php?cmd=categories"><?php echo @LANG_MANAGE_CATS; ?>
</a>
			</td>
			<td width="110" class="icon">
				<img src="templates/admin/images/icon_home.png" alt="<?php echo @LANG_CONFIGURATION; ?>
" align="middle" border="0" />
				<a href="admin.php?cmd=settings"><?php echo @LANG_CONFIGURATION; ?>
</a>
			</td>
			<td width="110" class="icon">
				<img src="templates/admin/images/icon_glossary.png" alt="<?php echo @LANG_MANAGE_GLOSSARY; ?>
" align="middle" border="0" />
				<a href="admin.php?cmd=glossary"><?php echo @LANG_MANAGE_GLOSSARY; ?>
</a>
			</td>	
		</tr>
		<tr>
			<td width="110" class="icon">
				<img src="templates/admin/images/icon_comments.png" alt="<?php echo @LANG_MANAGE_COMMENTS; ?>
" align="middle" border="0" />
				<a href="admin.php?cmd=comments"><?php echo @LANG_MANAGE_COMMENTS; ?>
</a>
			</td>
			<td width="110" class="icon">
				<img src="templates/admin/images/icon_users.png" alt="<?php echo @LANG_MANAGE_USERS; ?>
" align="middle" border="0" />
				<br />
				<a href="admin.php?cmd=users"><?php echo @LANG_MANAGE_USERS; ?>
</a>
			</td>
			
			<td width="110" class="icon">
				<img src="templates/admin/images/icon_stats.png" alt="<?php echo @LANG_MANAGE_STATS; ?>
" align="middle" border="0" />
				<a href="admin.php?cmd=stats">
				<?php echo @LANG_MANAGE_STATS; ?>

				</a>
			</td>
			
			<td width="110">
				
			</td>
		</tr>
	</table>
	</fieldset>  

	
	<div id="stats">
	<fieldset>
		<legend><?php echo @LANG_QUICK_STATS; ?>
</legend>
		<p><?php echo @LANG_WELCOME; ?>
 <?php echo $this->_tpl_vars['username']; ?>
</p>
		<p><?php echo @LANG_TOTAL; ?>
 <?php echo @LANG_ARTICLES; ?>
: <?php echo $this->_tpl_vars['articles']; ?>
</p>
		<p><?php echo @LANG_TOTAL; ?>
 <?php echo @LANG_CATS; ?>
: <?php echo $this->_tpl_vars['categories']; ?>
</p>
		<p><?php echo @LANG_TOTAL; ?>
 <?php echo @LANG_COMMENTS; ?>
: <?php echo $this->_tpl_vars['comments']; ?>
</p>
	</fieldset>  
	</div>