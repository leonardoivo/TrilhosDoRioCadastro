<?php
namespace TrilhosDorioCadastro\LO
{
use \ArrayObject;
use TrilhosDorioCadastro\DTO\PerfilDTO;
class PerfilLO{
private $Perfils;

function  __construct()
{
    $this->Perfils= new ArrayObject();
}
public function add(PerfilDTO $Perfil)
    {
        //$this->Perfils->offsetSet($Perfil->getTitulo(),$Perfil); //Função porfora77
        $this->Perfils->append($Perfil); //adiciona um indice automatico
    }
    public function getPerfils(){

        return $this->Perfils;
    }
    public function del(PerfilDTO $Perfil)
    {
        $this->Perfils->offsetUnset($Perfil);
    }

    public function find(PerfilDTO $Perfil)
    {
        return $this->Perfils->offsetExists($Perfil);
    }

}

}
?>