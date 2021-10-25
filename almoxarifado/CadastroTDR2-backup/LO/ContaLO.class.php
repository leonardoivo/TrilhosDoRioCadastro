<?php
namespace TrilhosDorioCadastro\LO
{
use \ArrayObject;
use TrilhosDorioCadastro\DTO\ContaDTO;
class ContaLO{
private $Contas;

function  __construct()
{
    $this->Contas= new ArrayObject();
}
public function add(ContaDTO $Conta)
    {
        //$this->Contas->offsetSet($Conta->getTitulo(),$Conta); //Função porfora77
        $this->Contas->append($Conta); //adiciona um indice automatico
    }
    public function getContas(){

        return $this->Contas;
    }
    public function del(ContaDTO $Conta)
    {
        $this->Contas->offsetUnset($Conta);
    }

    public function find(ContaDTO $Conta)
    {
        return $this->Contas->offsetExists($Conta);
    }

}

}
?>