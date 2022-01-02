<?php
namespace TrilhosDorioCadastro\DAL{
use TrilhosDorioCadastro\DAL\Crud;
use TrilhosDorioCadastro\DTO\OrigemAssociadoDTO;
use TrilhosDorioCadastro\LO\OrigemAssociadoLO;
use \ArrayObject;
use \PDO;

class CrudOrigemAssociado extends Crud{
    public $id_OrigemAssociado=0;
    public $nome_OrigemAssociado="";
    private $conexao;
    private $efetivar;
    public $OrigemAssociado;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarOrigemAssociado(){
    
        $resultado=$this->conexao->query("select * from OrigemAssociado");
         $OrigemAssociado = new OrigemAssociadoLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $OrigemAssociadoDT= new OrigemAssociadoDTO();
            $OrigemAssociadoDT->id_origem=$linha['id_origem'];
            $OrigemAssociadoDT->Origem=$linha['Origem'];
            $OrigemAssociado->add($OrigemAssociadoDT);

        }
        return $OrigemAssociado;
        }
    
    
    
    public function GravarOrigemAssociado(OrigemAssociadoDTO $OrigemAssociadoDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into OrigemAssociado (nome_OrigemAssociado,id_patrimonio,Descricao,DataDeCriacao) values (:nome_OrigemAssociado,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("Origem",$OrigemAssociadoDT->Origem);
    $this->efetivar->execute();
    
    }
    
    public function AlterarOrigemAssociado(OrigemAssociadoDTO $OrigemAssociadoDT){
        $this->efetivar=$this->conexao->prepare("update OrigemAssociado set nome_OrigemAssociado=:nome_OrigemAssociado,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_OrigemAssociado=:id_OrigemAssociado");
        $this->efetivar->bindValue("id_origem",$OrigemAssociadoDT->id_origem);
        $this->efetivar->bindValue("Origem",$OrigemAssociadoDT->Origem);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirOrigemAssociado($id_origem){
    
        $this->efetivar=$this->conexao->prepare("delete from  OrigemAssociado where id_origem=?");
        $this->efetivar->bindValue(1,$id_origem);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>