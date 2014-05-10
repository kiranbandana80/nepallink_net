<?php
include("domain.php");

$domain=$_REQUEST["domain"];
$tld=$_REQUEST["tld"];
$detail=$_REQUEST["detail"];

if($detail=="yes") 
  echo checkdomain($domain,$tld,true);
elseif (!empty($domain))
  echo checkdomain($domain,$tld);

?>
