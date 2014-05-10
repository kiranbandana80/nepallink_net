<?php

//$contents = ob_get_contents(); // store buffer in $contents
/*
ob_end_clean(); // delete output buffer and stop buffering
$search = array (
"/support.php/",
"/aboutus.php/",
"/contactus.php/",
"/faq.php/",
"/order.php\?plan=bronze/",
"/order.php\?plan=gold/",
"/order.php\?plan=platinum/",
"/portfolio.php/",
"/emaillogin.php/",
"/privacy.php/",
"/terms.php/"

);
$replace = array(
"support",
"aboutus",
"contact",
"faq",
"order_bronze",
"order_gold",
"order_platinum",
"portfolio",
"emaillogin",
"privacy",
"term"
);

// $search = htmlentities("/modules.php\?op=(.*?)&name=News&file=(.*?)&sid=(.*?)&mode=(.*?)thold=
// (.?)/");
$contents = preg_replace($search, $replace,$contents);
*/
//echo $contents;

?>
<table border="0" cellpadding="0" cellspacing="0" width="775">
  <tr>
    <td width="14" align="left" valign="top" bgcolor="#F1F1F2"><img src="../images/spacer.gif" height="15" width="10" alt="" /></td>
    <td width="347" align="left" valign="top" bgcolor="#F1F1F2" class="topborder">
<br />&nbsp;&nbsp;<b><a href="../privacy.php">Privacy Policy</a></b> | 
	<b><a href="../terms.php">Terms &amp; Condition</a><br /><br />
</td>
    <td width="400" align="left" valign="top" bgcolor="#F1F1F2" class="topborder">
<br />Copyright &copy; <b>NepalLink Network Pvt. Ltd.</b> 2000 - <?php echo date("Y");?> <br />
All right reserved.  |  <a href="mailto:webmaster@nepallink.net">Webmaster</a>
</td>
    <td width="14" align="left" valign="top" bgcolor="#F1F1F2"><img src="../images/spacer.gif" height="15" width="10" alt="" /></td>
  </tr>
</table>
</body>
</div>
</html>

