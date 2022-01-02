<?php
namespace TrilhosDorioCadastro\LO
{
use \ArrayObject;
use TrilhosDorioCadastro\DTO\AgenciaBancariaDTO;
class AgenciaBancariaLO{
private $AgenciaBancarias;

function  __construct()
{
    $this->AgenciaBancarias= new ArrayObject();
}
public function add(AgenciaBancariaDTO $AgenciaBancaria)
    {
        //$this->AgenciaBancarias->offsetSet($AgenciaBancaria->getTitulo(),$AgenciaBancaria); //Função porfora77
        $this->AgenciaBancarias->append($AgenciaBancaria); //adiciona um indice automatico
    }
    public function getAgenciaBancarias(){

        return $this->AgenciaBancarias;
    }
    public function del(AgenciaBancariaDTO $AgenciaBancaria)
    {
        $this->AgenciaBancarias->offsetUnset($AgenciaBancaria);
    }

    public function find(AgenciaBancariaDTO $AgenciaBancaria)
    {
        return $this->AgenciaBancarias->offsetExists($AgenciaBancaria);
    }

}

}
?>