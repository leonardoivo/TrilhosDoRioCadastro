<?php
namespace TrilhosDorioCadastro\Common{
class ObterDadoCPF{
  private   $nome;
  private   $dataDeNascimento;
  private   $sexo;
  private   $nomeMae;
  private   $client;  
  private   $function;
  private   $result;
  private   $arguments;
  public function __construct($cpf)
  {
    $this->client = new \SoapClient('http://regin.juceb.ba.gov.br/wsrfbregin/ServiceReginRFB.asmx?wsdl');
    $this->function = 'ServiceWs09';
    $this->arguments= array('ServiceWs09' => array('cpf'=>$cpf));
    $this->options = array('location' => 'http://regin.juceb.ba.gov.br/wsrfbregin/ServiceReginRFB.asmx'); 
    $this->result = $this->client->__soapCall($this->function, $this->arguments, $this->options);
  
    foreach($this->result as $b){
        $this->nome=$b->oCPFResponse->retornoWS09Redesim->dadosCPF->nome;
        $this->dataDeNascimento=$b->oCPFResponse->retornoWS09Redesim->dadosCPF->dataNascimento;
        $this->sexo=$b->oCPFResponse->retornoWS09Redesim->dadosCPF->sexo;
        $this->nomeMae=$b->oCPFResponse->retornoWS09Redesim->dadosCPF->nomeMae;
           }
           $this->dataDeNascimento = $this->TratarData();
}

function TratarData(){
    $ano = substr($this->dataDeNascimento,0,4);
    $mes = substr($this->dataDeNascimento,4,2);
    $dia = substr($this->dataDeNascimento,6,2);
    $dtNascimento = $ano."-".$mes."-".$dia;
   return $dtNascimento;
}

public function getNome(){
 return    $this->nome;
}
public function getDataDeNascimento(){
  return  $this->dataDeNascimento;
}
public function getSexo(){
 return   $this->sexo;
}
public function getNomeMae(){
  return  $this->nomeMae;

     }
} 
}

?>