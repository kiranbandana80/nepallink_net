<script language="javascript" type="text/javascript">
<!-- // 
{literal}
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
	newwin=window.open("email.php?id={/literal}{$aID}{literal}","Email","menubar=no, scrollbars=yes, width=420, height=380, directories=no,location=no,resizable=yes,status=no,toolbar=no");
}
function addComments(){
	document.getElementById('commentform').style.display='block';
}
{/literal}
// -->
</script>
<script type="text/javascript" src="javascript/overlib/overlib.js"><!-- overLIB (c) Erik Bosrup --></script>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>

<h1>{$aTitle}</h1>
<p>{$aShortDesc}</p>

<p>{$aDescription}</p>

<p class="smalltext">
	{$smarty.const.LANG_ADDED_ON}: <span class="kbdate">{$aDate|date_format:$smarty.const.LANG_DATE_LONG}</span>
	{$smarty.const.LANG_VIEWED}: {$aHits} {$smarty.const.LANG_TIMES}
</p>

<div class="articlemenu">
<span><img src="templates/{$smarty.const.MAIN_TEMPLATE}/images/printer.png">&nbsp;<a href="index.php?cmd=article&id={$aID}&action=print" target="_blank">{$smarty.const.LANG_PRINT} {$smarty.const.LANG_SOLUTION}</a></span>
<span><img src="templates/{$smarty.const.MAIN_TEMPLATE}/images/heart_add.png">&nbsp;<a href="javascript:addbookmark('{$aTitle}','{$url}/index.php?cmd=article&id={$aID}');">{$smarty.const.LANG_ADD_TO_FAVORITES}</a></span>
<span><img src="templates/{$smarty.const.MAIN_TEMPLATE}/images/email.png">&nbsp;<a href='javascript:emailform();'>{$smarty.const.LANG_EMAIL} {$smarty.const.LANG_SOLUTION}</a></span>
{if $allowcomments=="Y"}
<span><img src="templates/{$smarty.const.MAIN_TEMPLATE}/images/user_comment.png">&nbsp;<a class="small" href="javascript:void(0);" onClick="addComments()" title="Post">Post a comment</a></span>
{/if}
</div>

{if $attachments}
<div id="attachments">
	<strong>{$smarty.const.LANG_ATTACHMENTS}</strong>
	{foreach from=$attachments item=entry key=aid}
	<span>{if $entry.aType=="text/html"}<img src="templates/{$smarty.const.MAIN_TEMPLATE}/images/html.png" border="0" alt="{$entry.aName}" />{elseif $entry.aType=="application/download"}<img src="templates/{$smarty.const.MAIN_TEMPLATE}/images/zip.png" border="0" alt="{$entry.aName}" />{elseif $entry.aType=="image/png"}<img src="templates/{$smarty.const.MAIN_TEMPLATE}/images/image.png" border="0" alt="{$entry.aName}" />{else}<img src="templates/{$smarty.const.MAIN_TEMPLATE}/images/unknown.png" border="0" alt="{$entry.aName}" />{/if}
	&nbsp;<a href="uploads/{$entry.aName}" target="_blank">{$entry.aName}</a></span>
	{/foreach}
</div>
{/if}
	
{if $starrating}
<br />
<table border="0" class="tborder">
	<tr>
		<th colspan="8">Rating</th>
	</tr>
	<tr>
	  <td>{$starrating} &nbsp; </td>
      <td><a href="index.php?cmd=article&id={$aID}&rating=2">{$smarty.const.LANG_HELPFUL}</a> &nbsp;</td>
      <td><a href="index.php?cmd=article&id={$aID}&rating=1">{$smarty.const.LANG_NOT_HELPFUL}</a></td>
  </tr>
</table>
{/if}


{* Comments *}

{if $allowcomments=="Y"}
	<h2>{$smarty.const.LANG_COMMENTS}</h2>
	{if $comments<>""}
	<ol id="commentlist">
	{foreach from=$comments item=entry}
		<li class="{cycle values="alt," advance=true}" id="comment-{$entry.cID}">
			<div class="cmtinfo">
				<em>on {$entry.cDate|date_format:"%A, %B %e, %Y"}
					<small class="commentmetadata"><a href="#comment-3021" title="">&nbsp;</a> </small>
				</em>
				<cite>{$entry.cName}</cite>
			</div>
			<br />
			<p>{$entry.cComments}</p>
		</li>
	{/foreach}
	</ol>
	{else}
	<p>{$smarty.const.LANG_NO_COMMENTS}</p>
	{/if}
	
	{if $addedcomment==TRUE}
		<h3>{$smarty.const.LANG_THANKS_COMMENTS}</h3>
	{else}
					<div id="commentform" style="display:none">
						<!-- // Add Commment // -->
						<script Language="JavaScript" type="text/javascript">
						{literal}
						<!--
							function checkform(frm)
							{
								if(frm.fullname.value=="")
								{
									alert("{/literal}{$smarty.const.LANG_JAVASCRIPT_PLEASE_ENTER} '{$smarty.const.LANG_FULL} {$smarty.const.LANG_NAME}{literal}'.");
									frm.fullname.focus();
									return (false);
								}
								if(frm.comments.value=="")
								{
									alert("{/literal}{$smarty.const.LANG_JAVASCRIPT_PLEASE_ENTER} '{$smarty.const.LANG_COMMENTS}{literal}'.");
									frm.comments.focus();
									return (false);
								}
								return (true);
							}
						//-->
						{/literal}
						</script>
			
						<h3>{$smarty.const.LANG_LEAVE_COMMENTS}: </h3>
						<form method="post" action="index.php" name="comments" id="commentform" onsubmit="return checkform(this)">
						<table width="100%">
							<tr>
								<td><label for="fullname">{$smarty.const.LANG_FULL} {$smarty.const.LANG_NAME}:</label></td>
								<td><input type="text" name="fullname" value="{$smarty.session.username}" /></td>
							</tr>
							<tr>
								<td><label for="email">{$smarty.const.LANG_EMAIL}: ({$smarty.const.LANG_OPTIONAL})</label></td>
								<td><input type="text" name="email" id="email" /></td>
							</tr>
							<tr>
								<td colspan="2">
									<label for="comment">{$smarty.const.LANG_COMMENTS}:</label>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<textarea name="comments" id="comment" cols="50%" rows="10" tabindex="4" id="comment"></textarea>
								</td>
							</tr>
							<tr>
								<td colspan="2"><input name="submit" type="submit" value="{$smarty.const.LANG_SUBMIT}"></td>
							</tr>
						</table>
						<input type="hidden" name="action" value="addcomment" />
						<input type="hidden" name="cmd" value="article" />
						<input type="hidden" name="id" value="{$aID}" />
						</form>
						
						<!-- // End Add Comment //-->
					</div>
	{/if}
{/if}