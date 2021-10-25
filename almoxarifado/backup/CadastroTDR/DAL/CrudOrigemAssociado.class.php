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
    
    public function ListarTotaisOrigensAssoc(){
      $totaisOrigens =  array();
      $totaisOrigens['totais']=0;
      $totaisOrigens['NomeOrigem']="";
      
      $resultado= $this->conexao->query("select count(cadAssoc.id_origem) totais ,orgAssoc.Origem NomeOrigem from cadastroAssociado cadAssoc
       inner join OrigemAssociado orgAssoc on cadAssoc.id_origem=orgAssoc.id_origem GROUP BY orgAssoc.Origem; ");
      while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){
  
        $totaisOrigens['totais']=$linha['totais'];
        $totaisOrigens['NomeOrigem']=$linha['NomeOrigem'];

      }
      return $totaisOrigens;
    }
    
    public function GravarOrigemAssociado(OrigemAssociadoDTO $OrigemAssociadoDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into OrigemAssociado (Origem) values (:Origem)");
    $this->efetivar->bindValue("Origem",$OrigemAssociadoDT->Origem);
    $this->efetivar->execute();
    
    }
    
    public function AlterarOrigemAssociado(OrigemAssociadoDTO $OrigemAssociadoDT){
        $this->efetivar=$this->conexao->prepare("update OrigemAssociado set Origem:Origem where id_origem=:id_origem");
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