<?php
namespace TrilhosDorioCadastro\LO{
use \ArrayObject;
use TrilhosDorioCadastro\DTO\DadoBancarioJV_DTO;
class DadoBancarioJV_LO{
private $DadosBancarios;

public function __construct()
{
    $this->DadosBancarios= new ArrayObject();
}
public function add(DadoBancarioJV_DTO $DadoBancario){
    $this->DadosBancarios->append($DadoBancario);
            //$this->DadoBancarios->offsetSet($DadoBancario->getTitulo(),$DadoBancario); //Função porfora77

}
public function getDadosBancario(){
   return $this->DadosBancarios;
}

public function del(DadoBancarioJV_DTO $DadoBancario)
    {
        $this->DadosBancarios->offsetUnset($DadoBancario);
    }

    public function find(DadoBancarioJV_DTO $DadoBancario)
    {
        return $this->DadoBancarios->offsetExists($DadoBancario);
    }

?>