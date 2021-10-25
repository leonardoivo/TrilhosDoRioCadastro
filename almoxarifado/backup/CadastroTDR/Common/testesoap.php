<?php
    $nome="";
    $dataDeNascimento="";
    $sexo="";
    $nomeMae="";


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
echo $b->codretorno."<br/>";
echo $b->oCPFResponse->retornoWSRedesim->statusEnvio."<br/>";
//retornoWS09Redesim
// $xml=simplexml_load_string($resultado) or die("Error: Cannot create object");
// print_r($xml);
 $nome=$b->oCPFResponse->retornoWS09Redesim->dadosCPF->nome;
 $dataDeNascimento=$b->oCPFResponse->retornoWS09Redesim->dadosCPF->dataNascimento;
 $sexo=$b->oCPFResponse->retornoWS09Redesim->dadosCPF->sexo;
 $nomeMae=$b->oCPFResponse->retornoWS09Redesim->dadosCPF->nomeMae;


    }

   // $len = strlen($dataDeNascimento);
    $ano = substr($dataDeNascimento,0,4);
    $mes = substr($dataDeNascimento,4,2);
    $dia = substr($dataDeNascimento,6,2);
    $dtNascimento = $ano."-".$mes."-".$dia;

     echo $nome."<br/>";
     echo  $dataDeNascimento."<br/>";
     echo  $sexo."<br/>";
     echo  $nomeMae."<br/>";

    
   // echo $resultado;

//echo $result['ServiceWs09Result']['XmlDBE'];
// $client = new SoapClient('http://regin.juceb.ba.gov.br/wsrfbregin/ServiceReginRFB.asmx?wsdl');
// print_r($client->__getFunctions());

// for($i=0;$client->__getFunctions()->count>$i;$i++){


// }


?>