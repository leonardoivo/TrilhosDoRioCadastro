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
        $this->Usuarios->append($Usuarios); //adiciona um indice automatico
    }
    public function getUsuarios(){

        return $this->Usuarios;
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