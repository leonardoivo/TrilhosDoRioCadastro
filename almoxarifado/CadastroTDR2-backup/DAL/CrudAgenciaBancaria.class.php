<?php
namespace TrilhosDorioCadastro\DAL{
use TrilhosDorioCadastro\DAL\Crud;
use TrilhosDorioCadastro\DTO\AgenciaBancariaDTO;
use TrilhosDorioCadastro\LO\AgenciaBancariaLO;
use \ArrayObject;
use \PDO;

class CrudAgenciaBancaria extends Crud{
    public $id_AgenciaBancaria=0;
    public $nome_AgenciaBancaria="";
    private $conexao;
    private $efetivar;
    public $AgenciaBancaria;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarAgenciaBancarias(){
    
        $resultado=$this->conexao->query("select * from agenciaBancaria");
         $AgenciaBancaria = new AgenciaBancariaLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $AgenciaBancariaDT= new AgenciaBancariaDTO();
            $AgenciaBancariaDT->idAgencia=$linha['idAgencia'];
            $AgenciaBancariaDT->nomeagencia=$linha['nomeagencia'];
            $AgenciaBancariaDT->numeroagencia=$linha['numeroagencia'];
            $AgenciaBancariaDT->idbanco=$linha['idbanco'];
            $AgenciaBancaria->add($AgenciaBancariaDT);
        }
        return $AgenciaBancaria;
        }
    
        public function ListarAgenciaBancariaPorNome($nomeAgencia){
    
            $resultado=$this->conexao->query("select * from agenciaBancaria where nomeagencia like %'{$nomeAgencia}'%");
             $AgenciaBancaria = new AgenciaBancariaLO();
            while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
            {
                 $AgenciaBancariaDT= new AgenciaBancariaDTO();
                $AgenciaBancariaDT->idAgencia=$linha['idAgencia'];
                $AgenciaBancariaDT->nomeagencia=$linha['nomeagencia'];
                $AgenciaBancariaDT->numeroagencia=$linha['numeroagencia'];
                $AgenciaBancariaDT->idbanco=$linha['idbanco'];
                $AgenciaBancaria->add($AgenciaBancariaDT);
            }
            return $AgenciaBancaria;
            }

        public function ListarAgenciaBancariaPorNumero($numeroagencia){
            $teste="select * from agenciabancaria where numeroagencia='{$numeroagencia}'";
            $resultado=$this->conexao->query("select * from agenciabancaria where numeroagencia='{$numeroagencia}'");
            while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
            {
               
                $this->id_AgenciaBancaria=$linha['idAgencia'];
            }
            return $this->id_AgenciaBancaria;
            }
        
    
    public function GravarAgenciaBancaria(AgenciaBancariaDTO $AgenciaBancariaDT)
    {
    $this->efetivar=$this->conexao->prepare("INSERT INTO agenciabancaria(nomeagencia,numeroagencia,idbanco) VALUES (:nomeagencia,:numeroagencia,:idbanco)");
    $this->efetivar->bindValue("nomeagencia",$AgenciaBancariaDT->nomeagencia);
    $this->efetivar->bindValue("numeroagencia", $AgenciaBancariaDT->numeroagencia);
    $this->efetivar->bindValue("idbanco",$AgenciaBancariaDT->idbanco);
    $this->efetivar->execute();
    echo "\nPDOStatement::errorInfo():\n";
           $arr = $this->efetivar->errorInfo();
           print_r($arr);
    
    }
    
    public function AlterarAgenciaBancaria($idAgencia,AgenciaBancariaDTO $AgenciaBancariaDT){
        $this->efetivar=$this->conexao->prepare("UPDATE agenciabancaria SET nomeagencia=:nomeagencia,numeroagencia=:numeroagencia,idbanco=:idbanco WHERE idAgencia=:idAgencia");
        $this->efetivar->bindValue("idAgencia",$idAgencia);
        $this->efetivar->bindValue("nomeagencia",$AgenciaBancariaDT->nomeagencia);
        $this->efetivar->bindValue("numeroagencia", $AgenciaBancariaDT->numeroagencia);
        $this->efetivar->bindValue("idbanco",$AgenciaBancariaDT->idbanco);
        $this->efetivar->execute();
        echo "\nPDOStatement::errorInfo():\n";
        $arr = $this->efetivar->errorInfo();
        print_r($arr);
    }
    
    public function ExcluirAgenciaBancaria($idAgencia){
    
        $this->efetivar=$this->conexao->prepare("delete from  AgenciaBancaria where idAgencia=?");
        $this->efetivar->bindValue(1,$idAgencia);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>