<?php
namespace TrilhosDorioCadastro\LO
{
use \ArrayObject;
use TrilhosDorioCadastro\DTO\UsuariosDTO;
class UsuariosLO{
private $Usuarios;

function  __construct()
{
    $this->Usuarios= new ArrayObject();
}
public function add(UsuariosDTO $Usuarios)
    {
        //$this->Usuarioss->offsetSet($Usuarios->getTitulo(),$Usuarios); //Função porfora77
        $this->Usuarioss->append($Usuarios); //adiciona um indice automatico
    }
    public function getUsuarioss(){

        return $this->Usuarioss;
    }
    public function del(UsuariosDTO $Usuarios)
    {
        $this->Usuarios->offsetUnset($Usuarios);
    }

    public function find(UsuariosDTO $Usuarios)
    {
        return $this->Usuarios->offsetExists($Usuarios);
    }

}

}
?>