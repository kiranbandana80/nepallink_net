<HTML>
<HEAD>
<TITLE>Nepal Domain Registration | Nepal Domain Register | NP Domain |  Nepal Web Design |  Nepal Graphic Design | Nepal Domain Hosting | Nepal Java Domain Hosting | Nepal ASP Domain | Nepal Hosting | Nepal Register Domain | India Nepal Domain Hosting | Cheap Domain Hosting | Domain Nepal Registration</TITLE>
<META http-equiv=Content-Language content=en-us>
<META  name="description" content="NepalLink is the leading provider of Web hosting for small & medium businesses, our product offering include virtual, e-commerce, and dedicated web hosting as well as domain registration & web design.">
<META name="keywords" content="Shared, Dedicated, Managed, Virtual, Business, Web, Hosting, Service, Reseller, Domain,  Internet, E-commerce, Windows, Unix, Linux, FreeBSD, Server, PHP, MySQL, ASP">
<META  name="Abstract" content="Hosting, Web Hosting, Shared Web Hosting, Dedicated Web Hosting, Managed Hosting, Reseller Web Hosting, Hosting Service, Business Web Hosting, Shared Hosting, Dedicated Hosting, Reseller Hosting, Dedicated Server, Internet Web Hosting, Domain Name Search, Domain Name Transfer, Domain Name Purchase, Domain Name Registration, Site Hosting, Data Center, E-commerce Hosting, Web Page Hosting, Windows Web Hosting, Web Hosting Sales, Web Hosting Services, Web Hosting Sales Chat, Web Hosting Solutions, Scalable Web Hosting, Stable Web Hosting, Windows 2000 Web Hosting, Linux Hosting, Linux Web Hosting, Unix Hosting, Unix Web Hosting, Reseller Program, Reseller Dedicated Hosting, Reseller Shared Hosting, Virtual Private Server, Cold Fusion Hosting, ColdFusion Hosting, ASP Web Hosting, ASP Hosting, PHP Hosting, Inexpensive Web Hosting, Web Hosting Discounts, SQL Hosting, MySQL Hosting, Web Hosting Company, Web Hosting Industry, SSL, POP E-mail, FrontPage Extensions">
<META name="author" content="Nepallink Network">
<META name="srce" content="http://www.nepallink.net">
<META name="robots" content="index/follow">
<META name="revisit" content="7 days">
<META name="distribution" content="global">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<LINK REL="Stylesheet" href="style.css" type="text/css">
</HEAD>

<BODY BGCOLOR=#E4E5EA LEFTMARGIN=0 TOPMARGIN=2 MARGINWIDTH=0 MARGINHEIGHT=0 BACKGROUND="images/bg.gif">
<CENTER>





<table border="0" cellpadding="0" cellspacing="0" width="775">
  <tr>
    <td width="14" align="left" valign="top" background="images/left.gif">&nbsp;</td>
    <td width="747" align="right" valign="middle" bgcolor="#E5E7E8" height="20"><strong>Nepal Domain Hosting</strong> - <strong>Domain Registration </strong>- <strong>Web design </strong>- <strong>Web Promotion  </strong></td>
    <td width="14" align="left" valign="top" background="images/right.gif">&nbsp;</td>
  </tr>
</table>

  <?php
include_once("header.php");
?>



<table border="0" cellpadding="0" cellspacing="0" width="775">
  <tr>
    <td width="14" align="left" valign="top" background="images/left.gif"><img src="images/spacer.gif" height="15" width="10" alt=""></td>
    <td width="747" align="left" valign="top" background="images/bkg.gif"><img src="images/spacer.gif" height="15" width="10" alt=""></td>
    <td width="14" align="left" valign="top" background="images/right.gif"><img src="images/spacer.gif" height="15" width="10" alt=""></td>
  </tr>
</table>



<table border="0" cellpadding="0" cellspacing="0" width="775">
  <tr>
    <td width="14" align="left" valign="top" background="images/left.gif">&nbsp;</td>
    <td width="747" align="left" valign="middle" bgcolor="#FFFFFF">



<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="35%" align="left" valign="top">&nbsp;&nbsp;<font class="title">Check Domain Result</font>
	<br><br>
	<ul>
	<div align="justify">
We offer <strong>domain registration</strong> service with  competitive prices, the most versatile interface and many free features. <br><br>
Thousands of <strong>domain</strong> names are registered daily, so we urge you to register a domain name NOW even if you don't end up using it until next year. </div>
<br>
<img src="images/domainreg.jpg" border="0" alt="Nepal Domain Registration, India Domain Registration, Domain Hosting, Cheap Domain Registration">
<br>
<br>
</ul>

    <br><br>

	</td>
    <td width="5%" align="left" valign="top" class="rightborder">&nbsp;</td>
    <td width="60%" align="left" valign="top"><img src="images/domains.jpg" alt="Nepal Domain Registration, India Domain Registration, Domain Hosting, Cheap Domain Registration"><br>


<br><br>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="10%" align="left" valign="top">&nbsp;</td>
    <td width="80%" align="left" valign="top">
<div align="justify">
<b></b>
<div style="width:450px;overflow-y:auto;overflow-x:auto;border:0px solid black;">
  <h3><strong>NP Domain Registrations </strong></h3>
  <table cellpadding="4" cellspacing="1" border=0>
<tr><td><span style="color:black;">


<!-- Domain check result -->
<?php
include("domain/domain.php");

$domain=htmlspecialchars(strip_tags(trim($_REQUEST["domain"])));
$tld=htmlspecialchars(strip_tags($_REQUEST["ext"]));
$detail=htmlspecialchars(strip_tags($_REQUEST["detail"]));

if(!empty($domain) && is_valid_domain_name($domain) ) {


$pos = strpos(strtolower($tld), ".np");
	if($pos) {
	  $ctld = strtolower($domain.".".$tld);
	  echo checkNpDomain($ctld);
	}
}
?>

<br>
<h3>Try Another</h3>
<form action="domaincheck.php">
<div style="padding:0 0 0 20px;color: #7f7f7f; font-size: 12px;">

WWW. <input size="20" name="domain" onChange="javascript:this.value=this.value.toUpperCase();"/>&nbsp; 
<select name="ext"> 	    <option value="com.np">.COM.NP</option>
							<option value="net.np">.NET.NP</option>
							<option value="org.np">.ORG.NP</option> 
							<option value="edu.np">.EDU.NP</option> 
							<option value="info.np">.INFO.NP</option> 
							<option value="biz.np">.BIZ.NP</option> 
							<option value="mobi.np">.MOBI.NP</option> 
							<option value="travel.np">.TRAVEL.NP</option> 
							<option value="edu.np">.EDU.NP</option> 
							<option value="gov.np">.GOV.NP</option>
						</select>
<input type="submit" name="submit" value="Register">
					  </div>
</form>
</span></td></tr></table>

<h2>Term and Conditions</h2>
<ul>
<li>
.NP domain registration is FREE of cost. If you wish to opt facilitation service from Nepallink, the one time charges is 300 NRs (USD 5) for Indivdual, NRs 500 (USD 7) for local company and USD 50 for company outside Nepal.
</li>
<li>
Foreign corporations/Multi-national companies can only register domains that suggest their company/trade names and cannot register other generic domains.
</li>
<li>
For company residing in Nepal requires an official letter head of organization with stamp and xerox of organization certificate issued by Nepal Government.
</li>
<li>
For Individual, a citizenship xerox is sufficient.
</li>
<li>
In case of registration rejection from NP registrar or failure in event of insufficient document, no amount shall be refunded or consolidate with any Nepallink services.
</li>
<li>
.NP Domain Registration is subjected to the <A href='http://register.mos.com.np/terms_and_conditions.asp' target='_blank'>Terms and Condition</a> 
</li>
</ul>


</div>

<!-- Domain check result end -->


</div>
</td>
    <td width="10%" align="left" valign="top">&nbsp;</td>
  </tr>
</table>


<br><br>



	</td>
  </tr>
</table>


<p>&nbsp;</p>

</td>
    <td width="14" align="left" valign="top" background="images/right.gif">&nbsp;</td>
  </tr>
</table>
<?php
include_once("footer.php");
 ?>
