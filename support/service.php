<?php
  $soap = new SoapServer(
    'AddService.wsdl',
    array('uri' => 'http://php.hoshmand.org/')
  );
  $soap->setClass('ServiceClass');
  $soap->handle();
  class ServiceClass {
    function add($a, $b) {
      return $a + $b;
    }
  }
?><?php
  $soap = new SoapServer(
    'AddService.wsdl',
    array('uri' => 'http://php.hoshmand.org/')
  );
  $soap->setClass('ServiceClass');
  $soap->handle();
  class ServiceClass {
    function add($a, $b) {
      return $a + $b;
    }
  }
?>
