<?php

$client = new SoapClient(
"http://crm.nepallink.info/vtigerservice.php?service=webforms&wsdl",
array(
"location" => "http://crm.nepallink.info/vtigerservice.php?service=webforms",
"compression" => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP,
"login" => "sarose", // default
"password" => "1Lumbini2" // default
));

$params = array();
$params["lastname"] = "lastnamea";
$params["email"] = "email@email.com";
$params["phone"] = "phone";
$params["company"] = "company";
$params["country"] = "country";
$params["description"] = "description";

// user id to assign the lead in vtiger
$params["assigned_user_id"] = 1;

$result = $client->__soapCall("create_lead_from_webform", $params);
echo $result;
?>