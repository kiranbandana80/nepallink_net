<?php
define('CRM_LEAD_WEBSERVICE',"http://crm.nepallink.info/vtigerservice.php?service=webforms");
define('CRM_LEAD_WEBSERVICE_WSDL',CRM_LEAD_WEBSERVICE."&wsdl");
define('CRM_USER','app01');
define('CRM_PASS','1Lumbini2');
define('DEFAULT_LEAD_OWNER_USERID',3);


/* Create new lead in CRM */
function createCRMLead($lead)
{
	$client = new SoapClient(
	CRM_LEAD_WEBSERVICE_WSDL,
	array(
	"location" => CRM_LEAD_WEBSERVICE,
	"compression" => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP,
	"login" => CRM_USER, // default
	"password" => CRM_PASS // default
	));

	$params = array();
	$params["lastname"] = $lead["lastname"];
	$params["email"] = $lead["email"];
	$params["phone"] = $lead["phone"];
	$params["company"] = $lead["company"];
	$params["country"] = $lead["country"];
	$params["description"] = $lead["description"];
	$params["assigned_user_id"] = $lead["assigned_user_id"];

	$result = $client->__soapCall("create_lead_from_webform", $params);
	//echo $result;
}