<?php
namespace TrilhosDorioCadastro\LO
{
use \ArrayObject;
use TrilhosDorioCadastro\DTO\OrigemAssociadoDTO;
class OrigemAssociadoLO{
private $OrigemAssociados;

function  __construct()
{
    $this->OrigemAssociados= new ArrayObject();
}
public function add(OrigemAssociadoDTO $OrigemAssociado)
    {
        //$this->OrigemAssociados->offsetSet($OrigemAssociado->getTitulo(),$OrigemAssociado); //Função porfora77
        $this->OrigemAssociados->append($OrigemAssociado); //adiciona um indice automatico
    }
    public function getOrigemAssociados(){

        return $this->OrigemAssociados;
    }
    public function del(OrigemAssociadoDTO $OrigemAssociado)
    {
        $this->OrigemAssociados->offsetUnset($OrigemAssociado);
    }

    public function find(OrigemAssociadoDTO $OrigemAssociado)
    {
        return $this->OrigemAssociados->offsetExists($OrigemAssociado);
    }

}

}
?>