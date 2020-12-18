<?php
namespace TrilhosDorioCadastro\DAL{
use TrilhosDorioCadastro\DAL\Crud;
use TrilhosDorioCadastro\DTO\BancoDTO;
use TrilhosDorioCadastro\LO\BancoLO;
use \ArrayObject;
use \PDO;

class CrudBanco extends Crud{
    public $id_Banco=0;
    public $nome_Banco="";
    private $conexao;
    private $efetivar;
    public $Banco;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarBancos(){
    
        $resultado=$this->conexao->query("select * from banco");
         $LBanco = new BancoLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $BancoDT= new BancoDTO();
            $BancoDT->idbanco=$linha['idbanco'];
            $BancoDT->nomebanco=$linha['nomebanco'];
            $BancoDT->codigobancario=$linha['codigobancario'];
            $LBanco->add($BancoDT);
        }
        return $LBanco;
        }
    
    public function ListaBanco($nomeBanco){
        $resultado=$this->conexao->query("select * from Banco where nomebanco like%'{$nomeBanco}'%");
        $LBanco = new BancoLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $BancoDT= new BancoDTO();
            $BancoDT->idbanco=$linha['idbanco'];
            $BancoDT->nomebanco=$linha['nomebanco'];
            $BancoDT->codigobancario=$linha['codigobancario'];
            $LBanco->add($BancoDT);
        }
        return $LBanco;
    


    }
    
    public function ListaBancoPorID($idBanco){
        $resultado=$this->conexao->query("select * from Banco where idbanco={$idBanco}");
        $LBanco = new BancoLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $BancoDT= new BancoDTO();
            $BancoDT->idbanco=$linha['idbanco'];
            $BancoDT->nomebanco=$linha['nomebanco'];
            $BancoDT->codigobancario=$linha['codigobancario'];
            $LBanco->add($BancoDT);
        }
        return $LBanco;
    


    }


    public function GravarBanco(BancoDTO $BancoDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Banco (nome_Banco,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Banco,:id_patrimonio,:Descricao,:DataDeCriacao)");
    $this->efetivar->bindValue("nomebanco",$BancoDT->nomebanco);
    $this->efetivar->bindValue("codigobancario", $BancoDT->codigobancario);
    $this->efetivar->execute();
    
    }
    
    public function AlterarBanco(BancoDTO $BancoDT,$idbanco){
        $this->efetivar=$this->conexao->prepare("update Banco set nome_Banco=:nome_Banco,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Banco=:id_Banco");
        $this->efetivar->bindValue("idbanco",$idbanco);
        $this->efetivar->bindValue("nomebanco",$BancoDT->nomebanco);
        $this->efetivar->bindValue("codigobancario", $BancoDT->codigobancario);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirBanco($idbanco){
    
        $this->efetivar=$this->conexao->prepare("delete from  Banco where idbanco=?");
        $this->efetivar->bindValue(1,$idbanco);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>