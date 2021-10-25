<?php
namespace TrilhosDorioCadastro\LO
{
use \ArrayObject;
use TrilhosDorioCadastro\DTO\CartaoCreditoDTO;
class CartaoCreditoLO{
private $CartaoCreditos;

function  __construct()
{
    $this->CartaoCreditos= new ArrayObject();
}
public function add(CartaoCreditoDTO $CartaoCredito)
    {
        //$this->CartaoCreditos->offsetSet($CartaoCredito->getTitulo(),$CartaoCredito); //Função porfora77
        $this->CartaoCreditos->append($CartaoCredito); //adiciona um indice automatico
    }
    public function getCartaoCredito(){

        return $this->CartaoCreditos;
    }
    public function del(CartaoCreditoDTO $CartaoCredito)
    {
        $this->CartaoCreditos->offsetUnset($CartaoCredito);
    }

    public function find(CartaoCreditoDTO $CartaoCredito)
    {
        return $this->CartaoCreditos->offsetExists($CartaoCredito);
    }

}

}
?>