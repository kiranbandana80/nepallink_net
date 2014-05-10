<?php
session_start();
include_once("domain.php");
$domain = $_REQUEST["dom"];
$tld = strpos_arr($domain,$whois_servers);

if($tld!==null) {
$_SESSION["count"]++;
if($_SESSION["count"]>50) {
 echo "Too much request. Try after a while";
 die;
}

$ret = checkDomainService($domain,$tld);

switch($ret) {
 case DOMAIN_STATUS::AVAILABLE: 
	echo "Available";
	break;

 case DOMAIN_STATUS::NOT_AVAILABLE:
	echo "Not Available";
	break;

 case DOMAIN_STATUS::REQUEST_ERROR:
	echo "Request Error, Try Again";
	break;

 default:
	echo "Error Occured!";
	break;
}
}
die;
