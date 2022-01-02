<?php
namespace TrilhosDorioCadastro\LO
{
use \ArrayObject;
use TrilhosDorioCadastro\DTO\CadastroAssociadoDTO;
class CadastroAssociadoLO{
private $CadastroAssociados;

function  __construct()
{
    $this->CadastroAssociados= new ArrayObject();
}
public function add(CadastroAssociadoDTO $CadastroAssociado)
    {
        //$this->CadastroAssociados->offsetSet($CadastroAssociado->getTitulo(),$CadastroAssociado); //Função porfora77
        $this->CadastroAssociados->append($CadastroAssociado); //adiciona um indice automatico
    }
    public function getCadastroAssociados(){

        return $this->CadastroAssociados;
    }
    public function del(CadastroAssociadoDTO $CadastroAssociado)
    {
        $this->CadastroAssociados->offsetUnset($CadastroAssociado);
    }

    public function find(CadastroAssociadoDTO $CadastroAssociado)
    {
        return $this->CadastroAssociados->offsetExists($CadastroAssociado);
    }

}

}
?>