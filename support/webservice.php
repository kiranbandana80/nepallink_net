<?php
// Pull in the NuSOAP code
require_once('lib/nusoap/nusoap.php');
//osTicket lib
include('wsclient.inc.php');

// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('ticket', 'urn:ticketwsdl');
// Register the method to expose
$server->register('openticket',                // method name
    array(
    'name' => 'xsd:string',
    'email'=>'xsd:string',
    'phone'=>'xsd:string',
    'topic'=>'xsd:string',
    'subject'=>'xsd:string',
    'message'=>'xsd:string'), 
       // input parameters
    array('return' => 'xsd:string'),      // output parameters
    'urn:ticketwsdl',                      // namespace
    'urn:ticketwsdl#openticket',                // soapaction
    'rpc',                                // style
    'encoded',                            // use
    'Says hello to the caller'            // documentation
);

function openticket($name,$email,$phone,$topic,$subject,$message)
{
define('SOURCE','Web'); //Ticket source.
//$inc='open.inc.php';    //default include.
$errors=array();
$_POST['name']=$name;
$_POST['email']=$email;
$_POST['phone']=$phone;
$_POST['topicId']=$topic;
$_POST['subject']=$subject;
$_POST['message']=$message;
error_log($_POST['name']);
//if($_POST):
    $_POST['deptId']=$_POST['emailId']=0; //Just Making sure we don't accept crap...only topicId is expected.

    if(($ticket=Ticket::create($_POST,$errors,SOURCE))){
        return 'Support ticket request created';
        if($thisclient && $thisclient->isValid()) //Logged in...simply view the newly created ticket.
           return 'Authentication Required';
    }else{
        $errors['err']=$errors['err']?$errors['err']:'Unable to create a ticket. Pleae correct errors below and try again!';
        return $errors['err'];
    }
//endif;

}

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
