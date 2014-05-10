<?php 

  $client = new SoapClient(null, array(
      'location' => 
         "http://support.nepallink.net/webservice.php?wsdl",
      'uri'      => "urn:ticketwsdl", 
      'trace'    => 1 ));

   echo("\nDumping client object:\n");
   var_dump($client);

   $return = $client->__soapCall("openticket",
   array('name'=>'sarose','email'=>'sarose@nepallink.net',
          'phone'=>'4496198','topic'=>'1',
          'subject'=>'TEst Ticket Ignore',
          'message'=>'TEst Ticket Ignore'));
   echo("\nReturning value of __soapCall() call: ".$return);

   echo("\nDumping request headers:\n" 
      .$client->__getLastRequestHeaders());

   echo("\nDumping request:\n".$client->__getLastRequest());

   echo("\nDumping response headers:\n"
      .$client->__getLastResponseHeaders());

   echo("\nDumping response:\n".$client->__getLastResponse());
?>
