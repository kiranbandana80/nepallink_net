<?php
error_reporting(0);

//NOTE check support.com.np, the DNS fails to show correct status...

//(C) 2003-2005 Nepallink


class DOMAIN_STATUS {
	const AVAILABLE = 1;
	const NOT_AVAILABLE = 0;
	const SOCKET_ERROR = -1;
	const REQUEST_ERROR = -2;
}



//Default TLD whois servers

$whois_servers = array(
'com' => 'whois.internic.net',
'net' => 'whois.internic.net',
'org' => 'whois.publicinterestregistry.net',
'name' => 'whois.nic.name',
'info' => 'whois.afilias.info',
'biz' => 'whois.neulevel.biz',
'edu' => 'whois.educause.net',
'mobi'=>'whois.dotmobiregistry.net',
'co'=>'whois.nic.co'
);

/************
  Reterive Whois info
**************/

function GetNewWhoisInfo($result,$a_query,$a_port=43)
{
$whois_new=trim(sqeeze($result,"Whois Server:", "Referral"));

if(strlen($whois_new)>0) {

echo "Retrieved from $whois_new";
$sock1 = @fsockopen($whois_new,$a_port);

    if (!$sock1) {
    	return -1;      // socket not open
    }

    $sendr = @fputs($sock1,"$a_query\r\n");

   	if (!$sendr) {
           echo "could not send packet";
    		return -1;         // could not send packet
    	}


     while(!feof($sock1))
    		$new_result .= fgets($sock1,128);

    
    @fclose($sock1);

    return "<pre>".trim($new_result)."</pre>";
}

return false;
}


/************
  Squeeze the text
**************/

function sqeeze($str, $beg, $fin)
{
		 $start_pos = strpos($str, $beg);
		 if (is_string($start_pos) && !$start_pos) {
			  return -1;
		}
		$start_pos = $start_pos + strlen($beg);
		$length = strpos($str, $fin) - $start_pos;
		return substr($str, $start_pos, $length);
}


/************
  Printe Available TLD
************/

function printld()
{
  global $whois_servers;
    foreach($whois_servers as $tld=>$server) {
     echo "<option>$tld</option>";
  }
}

/**
check domains
@param $a_server Domain Name
@param $a_query tldm
@param $a_port default port of Whois server
**/

function checkdomain ($a_query, $a_server, $whois_detail=false,$a_port=43)
{
    global $whois_servers;

    $available = "No match";
    $available2 = "Not found";

    $a_query = strip_tags($a_query);
    $a_query = str_replace("www.", "", $a_query);
    $a_query = str_replace("http://", "", $a_query);

    @reset($whois_servers);

    $domain = $a_query;
    $tld = $a_server;

    $a_query = $a_query . "." . $a_server;

    $a_server = $whois_servers[$a_server];


    $sock = @fsockopen($a_server,$a_port);

    	if (!$sock) {
    	return -1;      // socket not open
    	}

    	$send_request = @fputs($sock,"$a_query\r\n");

    	if (!$send_request) {
    		return -1;         // could not send packet
    	}


    	while(!feof($sock)) {
    		$result .= fgets($sock,128);   // get result
    	}

    	//$result = str_replace("\n", "<br>", $result);

    	if(@eregi($available,$result) OR @eregi($available2,$result)) {
                @fclose($sock);
    			return("The domain that you requested, <b>www.$a_query</b>, is still available! If you would like to use this domain name, we recommend that you reserve it as soon as possible. Please <a href='../registration.php?domainname=$domain.$tld'><b>click here</b></a> if you would like to reserve $a_query now.
<br/><br/><br/><p align='center'><button onclick=\"window.location.href='../registration.php?domainname=$domain.$tld';\">
<b>Register $domain.$tld Now!</b></button></p>");
    	  }


          if($whois_detail) {
             $result1=GetNewWhoisInfo
($result,$a_query,$a_port);

             @fclose($sock);

             if($result1!=-1)
                 return $result1;
             else
                return "<pre>".trim($result)."</pre>";

          }

           @fclose($sock);

$buffer = '<b>SORRY!</b>, The domain that you requested, <b>www.'.$a_query.'</b>, has already been registered. See  <a href='.$PHP_SELF.'?domain='.$domain.'&tld='.$tld.'&detail=yes><b>details</b></a>
<h3>Try other Domain</h4>
<form action="domaincheck.php">
 <div style="padding:0 0 0 20px;color: #7f7f7f; font-size: 12px;">
						WWW. <input size="26" name="domain" onChange="javascript:this.value=this.value.toUpperCase();"/>&nbsp; 
						<select name="tld"> 
							<option value="com" selected="selected">.COM</option>
							<option value="net">.NET</option>
						        <option value="co">.CO</option>
							<option value="org">.ORG</option> 
							<option value="edu">.EDU</option> 
							<option value="biz">.BIZ</option> 
							<option value="info">.INFO</option>
							<option value="mobi">.MOBI</option>
							<option value="com.np">.COM.NP</option>
	                                                <option value="net.np">.NET.NP</option>
                                                        <option value="edu.np">.EDU.NP</option>
                                                        <option value="org.np">.ORG.NP</option>

						</select>
<input type="submit" value="Submit" name="submit">
					  </div>
</form>';

return $buffer;

}


function checkNpDomain($npdomain)
{
	$authns = array("yarrina.connect.com.au","shikhar.mos.com.np","np-ns.anycast.pch.net","ns-ext.isc.org");
	$result = dns_get_record($npdomain, DNS_NS, $authns, $addtl);

     
	if(isset($result[0]["target"])) {
		if(strlen($result[0]["target"])>5) {
$buffer = '<b>SORRY!</b>, The domain that you requested, <b>www.'.$npdomain.'</b>, has already been registered. 
<h3>Try other Domain</h4>
';

return $buffer;


		}
	}

	 return("The domain that you requested, <b>www.$npdomain</b>, is still available! If you would like to use this domain name, we recommend that you reserve it as soon as possible. 
<br/><br/><br/><p align='center'><button onclick=\"window.location.href='../registration.php?domainname=$npdomain';\">
<b>Register $npdomain Now!</b></button></p>");
}


/**
check NP domains service 
@param $a_server Domain Name
@param $a_query tldm
@param $a_port default port of Whois server
**/


function checkNpDomainService($npdomain)
{
	$authns = array("yarrina.connect.com.au","shikhar.mos.com.np","np-ns.anycast.pch.net","ns-ext.isc.org");
	$result = dns_get_record($npdomain, DNS_NS, $authns, $addtl);
     
	if(isset($result[0]["target"])) {
		if(strlen($result[0]["target"])>5) {
			return DOMAIN_STATUS::AVAILABLE; 
		}
	}	
	return DOMAIN_STATUS::NOT_AVAILABLE;
}

/**
check domains service 
@param $a_server Domain Name
@param $a_query tldm
@param $a_port default port of Whois server
**/

function checkDomainService($a_query, $a_server, $whois_detail=false,$a_port=43)
{
    global $whois_servers;

    $available = "/No match/i";
    $available2 = "/Not found/i";
    $result = "";

    $a_query = strip_tags($a_query);
    $a_query = str_replace("www.", "", $a_query);
    $a_query = str_replace("http://", "", $a_query);

    @reset($whois_servers);

    $domain = $a_query;
    $tld = $a_server;

	if( strpos(strtolower($domain), ".np") ) {
		$ctld = strtolower($domain.".".$tld);
  		return checkNpDomainService($ctld);
	}

    $a_server = $whois_servers[$a_server];

    $sock = @fsockopen($a_server,$a_port);

    	if (!$sock) {
    	return DOMAIN_STATUS::SOCKET_ERROR;      // socket not open
    	}

    	$send_request = @fputs($sock,"$a_query\r\n");

    	if (!$send_request) {
    		return DOMAIN_STATUS::REQUEST_ERROR;
    	}

    	while(!feof($sock)) {
    		$result .= fgets($sock,128);   
	}

    	// if(@eregi($available,$result) OR @eregi($available2,$result)) {  // ereg is derepciated from  PHP 5.3 onwards
		
    	if(@preg_match($available,$result) OR @preg_match($available2,$result)) {
		@fclose($sock);
		unset($result);
		return DOMAIN_STATUS::AVAILABLE;    			
    	  }
           
	@fclose($sock);

	unset($result);
       return DOMAIN_STATUS::NOT_AVAILABLE;
}


// strpos that takes an array of values to match against a string
// note the stupid argument order (to match strpos)
// changed for domain service -- donot use for generic puprose..
function strpos_arr($haystack, $needle) {
    if(!is_array($needle)) $needle = array($needle);
    foreach($needle as $what=>$val) {
        if(($pos = strpos($haystack, $what))!==false) return $what;
    }
    return false;
}


function is_valid_domain_name($domain_name)
{
    return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain_name) //valid chars check
            && preg_match("/^.{1,253}$/", $domain_name) //overall length check
            && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain_name)   ); //length of each label
}
