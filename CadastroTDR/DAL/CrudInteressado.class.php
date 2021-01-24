<?php
namespace TrilhosDorioCadastro\DAL{
use TrilhosDorioCadastro\DAL\Crud;
use TrilhosDorioCadastro\DTO\InteressadosDTO;
use TrilhosDorioCadastro\LO\InteressadosLO;
use \ArrayObject;
use \PDO;

class CrudInteressados extends Crud{
    public $id_Interessados=0;
    public $nome_Interessados="";
    private $conexao;
    private $efetivar;
    public $Interessados;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarInteressadoss(){
    
        $resultado=$this->conexao->query("select * from interessados order by id_interessado asc");
         $Interessados = new InteressadosLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $InteressadosDT= new InteressadosDTO();
            $InteressadosDT->id_Interessados=$linha['id_interessado'];
            $InteressadosDT->nome=$linha['nome'];
            $InteressadosDT->sobrenome=$linha['sobrenome'];
            $InteressadosDT->email=$linha['email'];
            $InteressadosDT->telefone=$linha['telefone'];   
            $InteressadosDT->interesses=$linha['interesses'];     
            $Interessados->add($InteressadosDT);
        }
        return $Interessados;
        }
    
        public function ListarInteressadossComPaginacao($paginaCorrente,$linhasPorPagina){
    
            $resultado=$this->conexao->query("select * from interessados order by cpf id_interessado limit $paginaCorrente,$linhasPorPagina");
             $Interessados = new InteressadosLO();
            while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
            {
                 $InteressadosDT= new InteressadosDTO();
                $InteressadosDT->id_Interessados=$linha['id_interessado'];
                $InteressadosDT->nome=$linha['nome'];
                $InteressadosDT->sobrenome=$linha['sobrenome'];
                $InteressadosDT->telefone=$linha['telefone'];   
                $InteressadosDT->email=$linha['email'];
                $InteressadosDT->interesses=$linha['interesses'];     
                $Interessados->add($InteressadosDT);
            }
            return $Interessados;
            }

            public function ListarInteressadossUltimos(){
    
                $resultado=$this->conexao->query("SELECT * FROM interessados order by id_interessado desc limit 10");
                 $Interessados = new InteressadosLO();
                while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
                {
                     $InteressadosDT= new InteressadosDTO();
                    $InteressadosDT->id_Interessados=$linha['id_interessado'];
                    $InteressadosDT->nome=$linha['nome'];
                    $InteressadosDT->sobrenome=$linha['sobrenome'];
                    $InteressadosDT->email=$linha['email'];
                    $InteressadosDT->telefone=$linha['telefone'];  
                    $InteressadosDT->interesses=$linha['interesses'];     
                    $Interessados->add($InteressadosDT);
                }
                return $Interessados;
                }
    
     public function ObterTotalInteressados(){
           $totais=0;
           $resultado=$this->conexao->query("select * from interessado order by id_interessado asc");
           $resultado->execute();
           $totais=$resultado->rowCount();     
           return $totais;
     }

     public function ConfirmaExistenciaInteressado($nome,$sobrenome){
        $retorno=false;
     
        $this->efetivar=$this->conexao->prepare("select * from interessados where nome=:nome and sobrenome:sobrenome");
        $this->efetivar->bindParam("nome",$nome);
        $this->efetivar->bindParam("sobrenome",$sobrenome);
        $this->efetivar->execute();
        $this->efetivar->RowCount();
        $quantidade=$this->efetivar->RowCount();
        if($quantidade>0){
             $retorno=true; 
           }
        
     return $retorno;
    }


        public function BuscarInteressados($nomeInteressados){
            $resultado=$this->conexao->query("select * from interessados where nome like '%{$nomeInteressados}%'");
            $Interessados = new InteressadosLO();
           while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
           {
                $InteressadosDT= new InteressadosDTO();
               $InteressadosDT->id_Interessados=$linha['id_interessado'];
               $InteressadosDT->nome=$linha['nome'];
               $InteressadosDT->sobrenome=$linha['sobrenome'];
               $InteressadosDT->email=$linha['email'];
               $InteressadosDT->interesses=$linha['interesses'];     
               $InteressadosDT->telefone=$linha['telefone'];   
               $Interessados->add($InteressadosDT);
           }
           return $Interessados;
           
    
        }
        
        public function BuscarInteressadosNomeSobrenome($nome,$sobrenome){
            $resultado=$this->conexao->query("select * from interessados where where nome={$nome} and sobrenome={$sobrenome}");
            $Interessados = new InteressadosLO();
           while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
           {
                $InteressadosDT= new InteressadosDTO();
               $InteressadosDT->id_Interessados=$linha['id_interessado'];
               $InteressadosDT->nome=$linha['nome'];
               $InteressadosDT->sobrenome=$linha['sobrenome'];
               $InteressadosDT->email=$linha['email'];
               $InteressadosDT->interesses=$linha['interesses'];     
               $InteressadosDT->telefone=$linha['telefone'];   

               $Interessados->add($InteressadosDT);
           }
           return $Interessados;
           
    
        }

        public function BuscarInteressadosEmail($email){
            $resultado=$this->conexao->query("select * from interessados where email={$email}");
            $Interessados = new InteressadosLO();
           while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
           {
                $InteressadosDT= new InteressadosDTO();
               $InteressadosDT->id_Interessados=$linha['id_interessado'];
               $InteressadosDT->nome=$linha['nome'];
               $InteressadosDT->sobrenome=$linha['sobrenome'];
               $InteressadosDT->email=$linha['email'];
               $InteressadosDT->interesses=$linha['interesses'];     
               $InteressadosDT->telefone=$linha['telefone'];   

               $Interessados->add($InteressadosDT);
           }
           return $Interessados;
           
    
        }

        public function BuscarIDInteressadosEmail($email){
            $resultado=$this->conexao->query("select * from Interessados where cpf={$email}");
            $Interessados = new InteressadosLO();
            
           while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
           {
                $InteressadosDT= new InteressadosDTO();
               $this->id_Interessados=$linha['id_interessado'];
              // $Interessados->add($InteressadosDT);
           }
           return  $this->id_Interessados;
           
    
        }

        

        public function BuscarInteressadosPorID($id_interessados){
            $resultado=$this->conexao->query("select * from interessados where id_interessados={$id_interessados}");
            $Interessados = new InteressadosLO();
           while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
           {
                $InteressadosDT= new InteressadosDTO();
               $InteressadosDT->id_Interessados=$linha['id_interessado'];
               $InteressadosDT->nome=$linha['nome'];
               $InteressadosDT->sobrenome=$linha['sobrenome'];
               $InteressadosDT->email=$linha['email'];
               $InteressadosDT->interesses=$linha['interesses'];     
               $InteressadosDT->telefone=$linha['telefone'];    
               $Interessados->add($InteressadosDT);
           }
           return $Interessados;
           
    
        }
 
    public function GravarInteressados(InteressadosDTO $InteressadosDT)
    {
       
            $insertParte1="insert into Interessados (nome,sobrenome,email,telefone,interesses)";
            $insertParte2="values (:nome,:sobrenome,:email,:telefone,:interesses)";
            $insertJuncao=$insertParte1.$insertParte2;   
               
           $this->efetivar=$this->conexao->prepare($insertJuncao);  
           $this->efetivar->bindParam("nome", $InteressadosDT->nome);
           $this->efetivar->bindParam("sobrenome", $InteressadosDT->sobrenome);
           $this->efetivar->bindParam("email", $InteressadosDT->email);
           $this->efetivar->bindParam("telefone", $InteressadosDT->telefone);    
           $this->efetivar->bindParam("interesses", $InteressadosDT->interesses);  
           $this->efetivar->execute();
           //echo "\nPDOStatement::errorInfo():\n";
           $arr = $this->efetivar->errorInfo();
           //print_r($arr);

       

    }
    
    public function AlterarInteressados(InteressadosDTO $InteressadosDT,$id_Interessados){
        $this->efetivar=$this->conexao->prepare("UPDATE Interessados SET nome=:nome,sobrenome=:sobrenome,email=:email,telefone=:telefone,interesses=:interesses WHERE id_Interessados=:id_Interessados");
        $this->efetivar->bindParam("id_Interessados",$id_Interessados);
        $this->efetivar->bindParam("nome", $InteressadosDT->nome);
        $this->efetivar->bindParam("sobrenome", $InteressadosDT->sobrenome);
        $this->efetivar->bindParam("email", $InteressadosDT->email);
        $this->efetivar->bindParam("interesses", $InteressadosDT->interesses);  
        $this->efetivar->bindParam("telefone", $InteressadosDT->telefone); 
        $this->efetivar->execute();
        echo "\nPDOStatement::errorInfo():\n";
           $arr = $this->efetivar->errorInfo();
           print_r($arr);
    
    }
    
    public function ExcluirInteressados($id_Interessados){
    
        $this->efetivar=$this->conexao->prepare("delete from Interessados where id_Interessados=?");
        $this->efetivar->bindValue(1,$id_Interessados);
        $this->efetivar->execute();
        // echo "\nPDOStatement::errorInfo():\n";
        // $arr = $this->efetivar->errorInfo();
        // print_r($arr);
    
    }
    
    
    }
}


?>