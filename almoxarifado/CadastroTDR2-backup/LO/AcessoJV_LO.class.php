<?php
namespace TrilhosDorioCadastro\LO
{
use \ArrayObject;
use TrilhosDorioCadastro\DTO\ACessoJV_DTO;
class   AcessoJV_LO{
private $Acessos;

function  __construct()
{
    $this->Acessos= new ArrayObject();
}
public function add(AcessoJV_DTO $Acesso)
    {
        //$this->Acessos->offsetSet($Acesso->getTitulo(),$Acesso); //Função porfora77
        $this->Acessos->append($Acesso); //adiciona um indice automatico
    }
    public function getAcessos(){

        return $this->Acessos;
    }
    public function del(AcessoJV_DTO $Acesso)
    {
        $this->Acessos->offsetUnset($Acesso);
    }

    public function find(AcessoJV_DTO $Acesso)
    {
        return $this->Acessos->offsetExists($Acesso);
    }

}

}