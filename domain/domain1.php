<?php

//Author: sarose@Nepallink.com
//(C) 2003-2005 Nepallink


//Default TLD whois servers

$whois_servers = array(
'com' => 'whois.internic.net',
'net' => 'whois.internic.net',
'org' => 'whois.publicinterestregistry.net',
'name' => 'whois.nic.name',
'info' => 'whois.afilias.info',
'biz' => 'whois.neulevel.biz',
'edu' => 'whois.educause.net');

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
    			return("$a_query is available. <a href='../registration.php'><b>Register Now</b></a>");
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

           return "$a_query is not available. See  <a href='$PHP_SELF?domain=$domain&tld=$tld&detail=yes'><b>details</b></a>";
}

?>