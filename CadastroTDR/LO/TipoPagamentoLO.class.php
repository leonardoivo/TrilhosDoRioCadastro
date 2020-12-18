<?php
namespace TrilhosDorioCadastro\LO
{
use \ArrayObject;
use TrilhosDorioCadastro\DTO\TipoPagamentoDTO;
class TipoPagamentoLO{
private $TipoPagamentos;

function  __construct()
{
    $this->TipoPagamentos= new ArrayObject();
}
public function add(TipoPagamentoDTO $TipoPagamento)
    {
        //$this->TipoPagamentos->offsetSet($TipoPagamento->getTitulo(),$TipoPagamento); //Função porfora77
        $this->TipoPagamentos->append($TipoPagamento); //adiciona um indice automatico
    }
    public function getTipoPagamentos(){

        return $this->TipoPagamentos;
    }
    public function del(TipoPagamentoDTO $TipoPagamento)
    {
        $this->TipoPagamentos->offsetUnset($TipoPagamento);
    }

    public function find(TipoPagamentoDTO $TipoPagamento)
    {
        return $this->TipoPagamentos->offsetExists($TipoPagamento);
    }

}

}
?>