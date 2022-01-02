<?php
$client = new SoapClient('http://regin.juceb.ba.gov.br/wsrfbregin/ServiceReginRFB.asmx?wsdl');

$function = 'ServiceWs09';

// $arguments= array(
//     'cpf'  => '05248801745'
// );

$arguments= array('ServiceWs09' => array(
    'cpf'  => '05248801745'

));

$options = array('location' => 'http://regin.juceb.ba.gov.br/wsrfbregin/ServiceReginRFB.asmx');


$result = $client->__soapCall($function, $arguments, $options);

echo 'Response: ';

//var_dump($result);
$resultado="";
foreach($result as $b){
    //echo $b['code'];
//echo $b->XmlDBE."<br/>";
$resultado=$b->XmlDBE;

$xml=simplexml_load_string($resultado) or die("Error: Cannot create object");
print_r($xml);

    }

   // echo $resultado;

//echo $result['ServiceWs09Result']['XmlDBE'];
// $client = new SoapClient('http://regin.juceb.ba.gov.br/wsrfbregin/ServiceReginRFB.asmx?wsdl');
// print_r($client->__getFunctions());

// for($i=0;$client->__getFunctions()->count>$i;$i++){


// }


?>