<?php
namespace TrilhosDorioCadastro\LO
{
use \ArrayObject;
use TrilhosDorioCadastro\DTO\BancoDTO;
class BancoLO{
private $Bancos;

function  __construct()
{
    $this->Bancos= new ArrayObject();
}
public function add(BancoDTO $Banco)
    {
        //$this->Bancos->offsetSet($Banco->getTitulo(),$Banco); //Função porfora77
        $this->Bancos->append($Banco); //adiciona um indice automatico
    }
    public function getBancos(){

        return $this->Bancos;
    }
    public function del(BancoDTO $Banco)
    {
        $this->Bancos->offsetUnset($Banco);
    }

    public function find(BancoDTO $Banco)
    {
        return $this->Bancos->offsetExists($Banco);
    }

}

}
?>