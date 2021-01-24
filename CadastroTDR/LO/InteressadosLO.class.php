<?php
namespace TrilhosDorioCadastro\LO
{
use \ArrayObject;
use TrilhosDorioCadastro\DTO\InteressadosDTO;
class InteressadosLO{
private $Interessados;

function  __construct()
{
    $this->Interessados= new ArrayObject();
}
public function add(InteressadosDTO $Interessados)
    {
        //$this->Interessadoss->offsetSet($Interessados->getTitulo(),$Interessados); //Função porfora77
        $this->Interessadoss->append($Interessados); //adiciona um indice automatico
    }
    public function getInteressados(){

        return $this->Interessadoss;
    }
    public function del(InteressadosDTO $Interessados)
    {
        $this->Interessadoss->offsetUnset($Interessados);
    }

    public function find(InteressadosDTO $Interessados)
    {
        return $this->Interessadoss->offsetExists($Interessados);
    }

}

}
?>