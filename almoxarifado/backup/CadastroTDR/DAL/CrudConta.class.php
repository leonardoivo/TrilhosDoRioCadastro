<?php
namespace TrilhosDorioCadastro\DAL{
use TrilhosDorioCadastro\DAL\Crud;
use TrilhosDorioCadastro\DTO\{ContaDTO,DadoBancarioJV_DTO};
use TrilhosDorioCadastro\LO\{ContaLO,DadoBancarioJV_LO};
use \ArrayObject;
use \PDO;

class CrudConta extends Crud{
    public $id_Conta=0;
    public $nome_Conta="";
    private $conexao;
    private $efetivar;
    public $Conta;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarConta(){
    
        $resultado=$this->conexao->query("select * from conta");
         $Conta = new ContaLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $ContaDT= new ContaDTO();
            $ContaDT->idconta=$linha['idconta'];
            $ContaDT->tipoconta=$linha['tipoconta'];
            $ContaDT->idagencia=$linha['idagencia'];
            $ContaDT->numeroconta=$linha['numeroconta'];
            $ContaDT->digitoconta=$linha['digitoconta'];
            $ContaDT->id_associado=$linha['id_associado'];     
            $Conta->add($ContaDT);

        }
        return $Conta;
        }
        public function ListarContaPorId($idconta){
    
            $resultado=$this->conexao->query("select * from conta where idconta={$idconta}");
             $Conta = new ContaLO();
            while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
            {
                 $ContaDT= new ContaDTO();
                $ContaDT->idconta=$linha['idconta'];
                $ContaDT->tipoconta=$linha['tipoconta'];
                $ContaDT->idagencia=$linha['idagencia'];
                $ContaDT->numeroconta=$linha['numeroconta'];
                $ContaDT->digitoconta=$linha['digitoconta'];
                $ContaDT->id_associado=$linha['id_associado'];     
                $Conta->add($ContaDT);
    
            }
            return $Conta;
            }
        
        public function ListarDadosBancarios($id_associado){
         
           $resultado=$this->conexao->query("select c.idconta idconta,bc.codigobancario codigobancario,bc.nomebanco nomebanco,ag.numeroagencia numeroagencia,c.tipoconta tipoconta,c.numeroconta numeroconta,c.digitoconta digitoconta from conta c inner join agenciabancaria ag on c.idagencia=ag.idagencia inner join banco bc on ag.idbanco=bc.idbanco where c.id_associado={$id_associado}");
           $DadosBancarios = new DadoBancarioJV_LO();
           while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){
            $DadosBancarioDT = new DadoBancarioJV_DTO();
            $DadosBancarioDT->idconta=$linha['idconta'];
            $DadosBancarioDT->codigobancario=$linha['codigobancario'];
            $DadosBancarioDT->nomebanco=$linha['nomebanco'];
            $DadosBancarioDT->numeroagencia=$linha['numeroagencia'];
            $DadosBancarioDT->tipoconta=$linha['tipoconta'];
            $DadosBancarioDT->numeroconta=$linha['numeroconta'];
            $DadosBancarioDT->digitoconta=$linha['digitoconta'];
            $DadosBancarios->add($DadosBancarioDT);
           }
           
           return $DadosBancarios;

        }
    
    
    public function GravarConta(ContaDTO $ContaDT)
    {
    $this->efetivar=$this->conexao->prepare("INSERT INTO conta(tipoconta, idagencia, numeroconta, digitoconta, id_associado) VALUES (:tipoconta, :idagencia, :numeroconta, :digitoconta, :id_associado)");
    $this->efetivar->bindValue("tipoconta",$ContaDT->tipoconta);
    $this->efetivar->bindValue("idagencia",$ContaDT->idagencia);
    $this->efetivar->bindValue("numeroconta",$ContaDT->numeroconta);
    $this->efetivar->bindValue("digitoconta",$ContaDT->digitoconta);
    $this->efetivar->bindValue("id_associado",$ContaDT->id_associado);     
    $this->efetivar->execute();
    echo "\nPDOStatement::errorInfo():\n";
           $arr = $this->efetivar->errorInfo();
           print_r($arr);
    
    }
    
    public function AlterarConta(ContaDTO $ContaDT,$idConta){
        $this->efetivar=$this->conexao->prepare("update conta set nome_Conta=:nome_Conta,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Conta=:id_Conta");
        $this->efetivar->bindValue("idconta",$idConta);
        $this->efetivar->bindValue("tipoconta",$ContaDT->tipoconta);
        $this->efetivar->bindValue("idagencia",$ContaDT->idagencia);
        $this->efetivar->bindValue("numeroconta",$ContaDT->numeroconta);
        $this->efetivar->bindValue("digitoconta",$ContaDT->digitoconta);
        $this->efetivar->bindValue("id_associado",$ContaDT->id_associado);   ;
        $this->efetivar->execute();
        echo "\nPDOStatement::errorInfo():\n";
           $arr = $this->efetivar->errorInfo();
           print_r($arr);
    
    }
    
    public function ExcluirConta($idconta){
    
        $this->efetivar=$this->conexao->prepare("delete from  conta where idconta=?");
        $this->efetivar->bindValue(1,$idconta);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>