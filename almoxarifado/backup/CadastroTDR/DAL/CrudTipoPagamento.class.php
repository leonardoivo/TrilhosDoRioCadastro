<?php
namespace TrilhosDorioCadastro\DAL{
use TrilhosDorioCadastro\DAL\Crud;
use TrilhosDorioCadastro\DTO\TipoPagamentoDTO;
use TrilhosDorioCadastro\LO\TipoPagamentoLO;
use \ArrayObject;
use \PDO;

class CrudTipoPagamento extends Crud{
    public $id_TipoPagamento=0;
    public $nome_TipoPagamento="";
    private $conexao;
    private $efetivar;
    public $TipoPagamento;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarTipoPagamento(){
    
        $resultado=$this->conexao->query("select * from TipoPagamento");
         $TipoPagamento = new TipoPagamentoLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
            $TipoPagamentoDT= new TipoPagamentoDTO();
            $TipoPagamentoDT->idTipoPagamento=$linha['idTipoPagamento'];
            $TipoPagamentoDT->nomeTipoPag=$linha['nomeTipoPag'];
            $TipoPagamentoDT->descricao=$linha['descricao'];
            $TipoPagamento->add($TipoPagamentoDT);

        }
        return $TipoPagamento;
        }
    
    public function ListarTotaisPorMeiosPag(){
     $totaisMeiosPag = array();
    //  $totaisMeiosPag["totais"]=0;
    //  $totaisMeiosPag["meiosPag"]="";
     $resultado = $this->conexao->query("select count(cadAssoc.idTipoPagamento) totais ,TipPag.nomeTipoPag meiosPag from cadastroAssociado cadAssoc
     inner join TipoPagamento TipPag on cadAssoc.idTipoPagamento=TipPag.idTipoPagamento
     GROUP BY TipPag.nomeTipoPag");
     while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){
       // $totaisMeiosPag["totais"]["meiosPag"] = array('totais'=>$linha['totais'],'meiosPag'=>$linha['meiosPag']);

        array_push($totaisMeiosPag, array('totais'=>$linha['totais'],'meiosPag'=>$linha['meiosPag']));

    //     $totaisMeiosPag["totais"]=$linha['totais'];
    //  $totaisMeiosPag["meiosPag"]=$linha['meiosPag'];

     }

     return $totaisMeiosPag;
    }

    
    public function GravarTipoPagamento(TipoPagamentoDTO $TipoPagamentoDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into TipoPagamento (nome_TipoPagamento,id_patrimonio,Descricao,DataDeCriacao) values (:nome_TipoPagamento,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("idTipoPagamento",$TipoPagamentoDT->idTipoPagamento);
    $this->efetivar->bindValue("nomeTipoPag",$TipoPagamentoDT->nomeTipoPag);
    $this->efetivar->bindValue("descricao", $TipoPagamentoDT->descricao);
    $this->efetivar->bindValue("TipoPagamento",$TipoPagamentoDT->TipoPagamento);
    $this->efetivar->execute();
    
    }
    
    public function AlterarTipoPagamento(TipoPagamentoDTO $TipoPagamentoDT){
        $this->efetivar=$this->conexao->prepare("update TipoPagamento set nome_TipoPagamento=:nome_TipoPagamento,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_TipoPagamento=:id_TipoPagamento");
        $this->efetivar->bindValue("idTipoPagamento",$TipoPagamentoDT->idTipoPagamento);
        $this->efetivar->bindValue("nomeTipoPag",$TipoPagamentoDT->nomeTipoPag);
        $this->efetivar->bindValue("descricao", $TipoPagamentoDT->descricao);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirTipoPagamento($idTipoPagamento){
    
        $this->efetivar=$this->conexao->prepare("delete from  TipoPagamento where idTipoPagamento=?");
        $this->efetivar->bindValue(1,$idTipoPagamento);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>