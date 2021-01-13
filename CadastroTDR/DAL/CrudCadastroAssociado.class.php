<?php
namespace TrilhosDorioCadastro\DAL{
use TrilhosDorioCadastro\DAL\Crud;
use TrilhosDorioCadastro\DTO\CadastroAssociadoDTO;
use TrilhosDorioCadastro\LO\CadastroAssociadoLO;
use \ArrayObject;
use \PDO;

class CrudCadastroAssociado extends Crud{
    public $id_CadastroAssociado=0;
    public $nome_CadastroAssociado="";
    private $conexao;
    private $efetivar;
    public $CadastroAssociado;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarCadastroAssociados(){
    
        $resultado=$this->conexao->query("select * from cadastroAssociado order by cpf asc");
         $CadastroAssociado = new CadastroAssociadoLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $CadastroAssociadoDT= new CadastroAssociadoDTO();
            $CadastroAssociadoDT->id_associado=$linha['id_associado'];
            $CadastroAssociadoDT->nome=$linha['nome'];
            $CadastroAssociadoDT->sobrenome=$linha['sobrenome'];
            $CadastroAssociadoDT->data_De_nascimento=$linha['data_De_nascimento'];
            $CadastroAssociadoDT->email=$linha['email'];
            $CadastroAssociadoDT->id_origem=$linha['id_origem'];     
            $CadastroAssociadoDT->endereco=$linha['endereco'];     
            $CadastroAssociadoDT->cep=$linha['cep'];     
            $CadastroAssociadoDT->Bairro=$linha['Bairro'];     
            $CadastroAssociadoDT->Cidade=$linha['Cidade'];     
            $CadastroAssociadoDT->Estado=$linha['Estado'];     
            $CadastroAssociadoDT->data_De_cadastro=$linha['data_De_cadastro'];     
            $CadastroAssociadoDT->pais=$linha['pais'];     
            $CadastroAssociadoDT->data_De_desligamento=$linha['data_De_desligamento'];     
            $CadastroAssociadoDT->numero=$linha['numero'];     
            $CadastroAssociadoDT->complemento=$linha['complemento'];     
            $CadastroAssociadoDT->forma_de_doacao=$linha['forma_de_doacao'];     
            $CadastroAssociadoDT->cpf=$linha['cpf'];     
            $CadastroAssociadoDT->interesses=$linha['interesses'];     
            $CadastroAssociadoDT->naturalidade=$linha['naturalidade'];  
            $CadastroAssociadoDT->idTipoPagamento=$linha['idTipoPagamento'];  
            $CadastroAssociadoDT->nomePai=$linha['nomePai']; 
            $CadastroAssociadoDT->nomeMae=$linha['nomeMae']; 

            $CadastroAssociado->add($CadastroAssociadoDT);
        }
        return $CadastroAssociado;
        }
    
        public function ListarCadastroAssociadosComPaginacao($paginaCorrente,$linhasPorPagina){
    
            $resultado=$this->conexao->query("select * from cadastroAssociado order by cpf asc limit $paginaCorrente,$linhasPorPagina");
             $CadastroAssociado = new CadastroAssociadoLO();
            while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
            {
                 $CadastroAssociadoDT= new CadastroAssociadoDTO();
                $CadastroAssociadoDT->id_associado=$linha['id_associado'];
                $CadastroAssociadoDT->nome=$linha['nome'];
                $CadastroAssociadoDT->sobrenome=$linha['sobrenome'];
                $CadastroAssociadoDT->data_De_nascimento=$linha['data_De_nascimento'];
                $CadastroAssociadoDT->email=$linha['email'];
                $CadastroAssociadoDT->id_origem=$linha['id_origem'];     
                $CadastroAssociadoDT->endereco=$linha['endereco'];     
                $CadastroAssociadoDT->cep=$linha['cep'];     
                $CadastroAssociadoDT->Bairro=$linha['Bairro'];     
                $CadastroAssociadoDT->Cidade=$linha['Cidade'];     
                $CadastroAssociadoDT->Estado=$linha['Estado'];     
                $CadastroAssociadoDT->data_De_cadastro=$linha['data_De_cadastro'];     
                $CadastroAssociadoDT->pais=$linha['pais'];     
                $CadastroAssociadoDT->data_De_desligamento=$linha['data_De_desligamento'];     
                $CadastroAssociadoDT->numero=$linha['numero'];     
                $CadastroAssociadoDT->complemento=$linha['complemento'];     
                $CadastroAssociadoDT->forma_de_doacao=$linha['forma_de_doacao'];     
                $CadastroAssociadoDT->cpf=$linha['cpf'];     
                $CadastroAssociadoDT->interesses=$linha['interesses'];     
                $CadastroAssociadoDT->naturalidade=$linha['naturalidade'];  
                $CadastroAssociadoDT->idTipoPagamento=$linha['idTipoPagamento'];  
                $CadastroAssociadoDT->nomePai=$linha['nomePai']; 
                $CadastroAssociadoDT->nomeMae=$linha['nomeMae'];   

                $CadastroAssociado->add($CadastroAssociadoDT);
            }
            return $CadastroAssociado;
            }

            public function ListarCadastroAssociadosUltimos(){
    
                $resultado=$this->conexao->query("SELECT * FROM cadastroAssociado order by id_associado desc limit 10");
                 $CadastroAssociado = new CadastroAssociadoLO();
                while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
                {
                     $CadastroAssociadoDT= new CadastroAssociadoDTO();
                    $CadastroAssociadoDT->id_associado=$linha['id_associado'];
                    $CadastroAssociadoDT->nome=$linha['nome'];
                    $CadastroAssociadoDT->sobrenome=$linha['sobrenome'];
                    $CadastroAssociadoDT->data_De_nascimento=$linha['data_De_nascimento'];
                    $CadastroAssociadoDT->email=$linha['email'];
                    $CadastroAssociadoDT->id_origem=$linha['id_origem'];     
                    $CadastroAssociadoDT->endereco=$linha['endereco'];     
                    $CadastroAssociadoDT->cep=$linha['cep'];     
                    $CadastroAssociadoDT->Bairro=$linha['Bairro'];     
                    $CadastroAssociadoDT->Cidade=$linha['Cidade'];     
                    $CadastroAssociadoDT->Estado=$linha['Estado'];     
                    $CadastroAssociadoDT->data_De_cadastro=$linha['data_De_cadastro'];     
                    $CadastroAssociadoDT->pais=$linha['pais'];     
                    $CadastroAssociadoDT->data_De_desligamento=$linha['data_De_desligamento'];     
                    $CadastroAssociadoDT->numero=$linha['numero'];     
                    $CadastroAssociadoDT->complemento=$linha['complemento'];     
                    $CadastroAssociadoDT->forma_de_doacao=$linha['forma_de_doacao'];     
                    $CadastroAssociadoDT->cpf=$linha['cpf'];     
                    $CadastroAssociadoDT->interesses=$linha['interesses'];     
                    $CadastroAssociadoDT->naturalidade=$linha['naturalidade'];  
                    $CadastroAssociadoDT->idTipoPagamento=$linha['idTipoPagamento'];  
                    $CadastroAssociadoDT->nomePai=$linha['nomePai']; 
                    $CadastroAssociadoDT->nomeMae=$linha['nomeMae'];   
    
                    $CadastroAssociado->add($CadastroAssociadoDT);
                }
                return $CadastroAssociado;
                }
    
     public function ObterTotalAssociados(){
           $totais=0;
           $resultado=$this->conexao->query("select * from cadastroAssociado order by cpf asc");
           $resultado->execute();
           $totais=$resultado->rowCount();     
           return $totais;
     }

     public function ConfirmaExistenciaUsuario($cpf){
        $retorno=false;
     
        $this->efetivar=$this->conexao->prepare("select * from cadastroAssociado where cpf=:cpf");
        $this->efetivar->bindParam("cpf",$cpf);
        $this->efetivar->execute();
        $this->efetivar->RowCount();
        $quantidade=$this->efetivar->RowCount();
        if($quantidade>0){
             $retorno=true; 
           }
        
     return $retorno;
    }


        public function BuscarAssociado($nomeassociado){
            $resultado=$this->conexao->query("select * from cadastroAssociado where nome like '%{$nomeassociado}%'");
            $CadastroAssociado = new CadastroAssociadoLO();
           while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
           {
                $CadastroAssociadoDT= new CadastroAssociadoDTO();
               $CadastroAssociadoDT->id_associado=$linha['id_associado'];
               $CadastroAssociadoDT->nome=$linha['nome'];
               $CadastroAssociadoDT->sobrenome=$linha['sobrenome'];
               $CadastroAssociadoDT->data_De_nascimento=$linha['data_De_nascimento'];
               $CadastroAssociadoDT->email=$linha['email'];
               $CadastroAssociadoDT->id_origem=$linha['id_origem'];     
               $CadastroAssociadoDT->endereco=$linha['endereco'];     
               $CadastroAssociadoDT->cep=$linha['cep'];     
               $CadastroAssociadoDT->Bairro=$linha['Bairro'];     
               $CadastroAssociadoDT->Cidade=$linha['Cidade'];     
               $CadastroAssociadoDT->Estado=$linha['Estado'];     
               $CadastroAssociadoDT->data_De_cadastro=$linha['data_De_cadastro'];     
               $CadastroAssociadoDT->pais=$linha['pais'];     
               $CadastroAssociadoDT->data_De_desligamento=$linha['data_De_desligamento'];     
               $CadastroAssociadoDT->numero=$linha['numero'];     
               $CadastroAssociadoDT->complemento=$linha['complemento'];     
               $CadastroAssociadoDT->forma_de_doacao=$linha['forma_de_doacao'];     
               $CadastroAssociadoDT->cpf=$linha['cpf'];     
               $CadastroAssociadoDT->interesses=$linha['interesses'];     
               $CadastroAssociadoDT->naturalidade=$linha['naturalidade'];  
               $CadastroAssociadoDT->idTipoPagamento=$linha['idTipoPagamento'];  
               $CadastroAssociadoDT->nomePai=$linha['nomePai']; 
               $CadastroAssociadoDT->nomeMae=$linha['nomeMae'];   

               $CadastroAssociado->add($CadastroAssociadoDT);
           }
           return $CadastroAssociado;
           
    
        }
        
        public function BuscarAssociadoCPF($cpf){
            $resultado=$this->conexao->query("select * from cadastroAssociado where cpf={$cpf}");
            $CadastroAssociado = new CadastroAssociadoLO();
           while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
           {
                $CadastroAssociadoDT= new CadastroAssociadoDTO();
               $CadastroAssociadoDT->id_associado=$linha['id_associado'];
               $CadastroAssociadoDT->nome=$linha['nome'];
               $CadastroAssociadoDT->sobrenome=$linha['sobrenome'];
               $CadastroAssociadoDT->data_De_nascimento=$linha['data_De_nascimento'];
               $CadastroAssociadoDT->email=$linha['email'];
               $CadastroAssociadoDT->id_origem=$linha['id_origem'];     
               $CadastroAssociadoDT->endereco=$linha['endereco'];     
               $CadastroAssociadoDT->cep=$linha['cep'];     
               $CadastroAssociadoDT->Bairro=$linha['Bairro'];     
               $CadastroAssociadoDT->Cidade=$linha['Cidade'];     
               $CadastroAssociadoDT->Estado=$linha['Estado'];     
               $CadastroAssociadoDT->data_De_cadastro=$linha['data_De_cadastro'];     
               $CadastroAssociadoDT->pais=$linha['pais'];     
               $CadastroAssociadoDT->data_De_desligamento=$linha['data_De_desligamento'];     
               $CadastroAssociadoDT->numero=$linha['numero'];     
               $CadastroAssociadoDT->complemento=$linha['complemento'];     
               $CadastroAssociadoDT->forma_de_doacao=$linha['forma_de_doacao'];     
               $CadastroAssociadoDT->cpf=$linha['cpf'];     
               $CadastroAssociadoDT->interesses=$linha['interesses'];     
               $CadastroAssociadoDT->naturalidade=$linha['naturalidade'];    
               $CadastroAssociadoDT->idTipoPagamento=$linha['idTipoPagamento'];  
               $CadastroAssociadoDT->nomePai=$linha['nomePai']; 
               $CadastroAssociadoDT->nomeMae=$linha['nomeMae'];   


               $CadastroAssociado->add($CadastroAssociadoDT);
           }
           return $CadastroAssociado;
           
    
        }

        public function BuscarIDAssociadoCPF($cpf){
            $resultado=$this->conexao->query("select * from cadastroAssociado where cpf={$cpf}");
            $CadastroAssociado = new CadastroAssociadoLO();
            
           while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
           {
                $CadastroAssociadoDT= new CadastroAssociadoDTO();
               $this->id_CadastroAssociado=$linha['id_associado'];
              // $CadastroAssociado->add($CadastroAssociadoDT);
           }
           return  $this->id_CadastroAssociado;
           
    
        }


        public function BuscarAssociadoPorID($id_associado){
            $resultado=$this->conexao->query("select * from cadastroAssociado where id_associado={$id_associado}");
            $CadastroAssociado = new CadastroAssociadoLO();
           while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
           {
                $CadastroAssociadoDT= new CadastroAssociadoDTO();
               $CadastroAssociadoDT->id_associado=$linha['id_associado'];
               $CadastroAssociadoDT->nome=$linha['nome'];
               $CadastroAssociadoDT->sobrenome=$linha['sobrenome'];
               $CadastroAssociadoDT->data_De_nascimento=$linha['data_De_nascimento'];
               $CadastroAssociadoDT->email=$linha['email'];
               $CadastroAssociadoDT->id_origem=$linha['id_origem'];     
               $CadastroAssociadoDT->endereco=$linha['endereco'];     
               $CadastroAssociadoDT->cep=$linha['cep'];     
               $CadastroAssociadoDT->Bairro=$linha['Bairro'];     
               $CadastroAssociadoDT->Cidade=$linha['Cidade'];     
               $CadastroAssociadoDT->Estado=$linha['Estado'];     
               $CadastroAssociadoDT->data_De_cadastro=$linha['data_De_cadastro'];     
               $CadastroAssociadoDT->pais=$linha['pais'];     
               $CadastroAssociadoDT->data_De_desligamento=$linha['data_De_desligamento'];     
               $CadastroAssociadoDT->numero=$linha['numero'];     
               $CadastroAssociadoDT->complemento=$linha['complemento'];     
               $CadastroAssociadoDT->forma_de_doacao=$linha['forma_de_doacao'];     
               $CadastroAssociadoDT->cpf=$linha['cpf'];     
               $CadastroAssociadoDT->interesses=$linha['interesses'];     
               $CadastroAssociadoDT->naturalidade=$linha['naturalidade'];   
               $CadastroAssociadoDT->naturalidade=$linha['telefone'];    
               $CadastroAssociadoDT->idTipoPagamento=$linha['idTipoPagamento'];  
               $CadastroAssociadoDT->nomePai=$linha['nomePai']; 
               $CadastroAssociadoDT->nomeMae=$linha['nomeMae'];     

               $CadastroAssociado->add($CadastroAssociadoDT);
           }
           return $CadastroAssociado;
           
    
        }
 
    public function GravarCadastroAssociado(CadastroAssociadoDTO $CadastroAssociadoDT)
    {
       
            $insertParte1="insert into cadastroAssociado (nome,sobrenome,data_De_nascimento,email,telefone,id_origem, endereco, cep, Bairro, Cidade, Estado,data_De_cadastro,pais,data_De_desligamento,forma_de_doacao, numero,complemento,cpf,interesses,naturalidade,idTipoPagamento,nomeMae,nomePai)";
            $insertParte2="values (:nome,:sobrenome,:data_De_nascimento,:email,:telefone,:id_origem,:endereco,:cep,:Bairro,:Cidade,:Estado,:data_De_cadastro,:pais,:data_De_desligamento,:forma_de_doacao,:numero,:complemento,:cpf,:interesses,:naturalidade,:idTipoPagamento,:nomeMae,:nomePai)";
            $insertJuncao=$insertParte1.$insertParte2;   
               
           $this->efetivar=$this->conexao->prepare($insertJuncao);  
           $this->efetivar->bindParam("nome", $CadastroAssociadoDT->nome);
           $this->efetivar->bindParam("sobrenome", $CadastroAssociadoDT->sobrenome);
           $this->efetivar->bindParam("data_De_nascimento", $CadastroAssociadoDT->data_De_nascimento);
           $this->efetivar->bindParam("email", $CadastroAssociadoDT->email);
           $this->efetivar->bindParam("telefone", $CadastroAssociadoDT->telefone);    
           $this->efetivar->bindParam("id_origem", $CadastroAssociadoDT->id_origem);     
           $this->efetivar->bindParam("endereco", $CadastroAssociadoDT->endereco);    
           $this->efetivar->bindParam("cep", $CadastroAssociadoDT->cep); 
           $this->efetivar->bindParam("Bairro", $CadastroAssociadoDT->Bairro);   
           $this->efetivar->bindParam("Cidade", $CadastroAssociadoDT->Cidade);    
           $this->efetivar->bindParam("Estado", $CadastroAssociadoDT->Estado);     
           $this->efetivar->bindParam("data_De_cadastro", $CadastroAssociadoDT->data_De_cadastro); 
           $this->efetivar->bindParam("pais",$CadastroAssociadoDT->pais);    
           $this->efetivar->bindParam("data_De_desligamento",$CadastroAssociadoDT->data_De_desligamento);    
           $this->efetivar->bindParam("numero",$CadastroAssociadoDT->numero);    
           $this->efetivar->bindParam("complemento",$CadastroAssociadoDT->complemento);    
           $this->efetivar->bindParam("forma_de_doacao",$CadastroAssociadoDT->forma_de_doacao);
           $this->efetivar->bindParam("cpf", $CadastroAssociadoDT->cpf);    
           $this->efetivar->bindParam("interesses", $CadastroAssociadoDT->interesses);  
           $this->efetivar->bindParam("naturalidade", $CadastroAssociadoDT->naturalidade); 
           $this->efetivar->bindParam("idTipoPagamento", $CadastroAssociadoDT->idTipoPagamento); 
           $this->efetivar->bindParam("nomeMae", $CadastroAssociadoDT->nomeMae); 
           $this->efetivar->bindParam("nomePai", $CadastroAssociadoDT->nomePai); 
           $this->efetivar->execute();
           //echo "\nPDOStatement::errorInfo():\n";
           $arr = $this->efetivar->errorInfo();
           //print_r($arr);

       

    }
    
    public function AlterarCadastroAssociado(CadastroAssociadoDTO $CadastroAssociadoDT,$id_associado){
        $this->efetivar=$this->conexao->prepare("UPDATE cadastroAssociado SET nome=:nome,sobrenome=:sobrenome,data_De_nascimento=:data_De_nascimento,email=:email,telefone=:telefone,id_origem=:id_origem,endereco=:endereco,cep=:cep,Bairro=:Bairro,Cidade=:Cidade,Estado=:Estado,data_De_cadastro=:data_De_cadastro,pais=:pais,data_De_desligamento=:data_De_desligamento,forma_de_doacao=:forma_de_doacao,numero=:numero,complemento=:complemento,cpf=:cpf,interesses=:interesses,naturalidade=:naturalidade,idTipoPagamento=:idTipoPagamento,nomePai=:nomePai,nomeMae=:nomeMae WHERE id_associado=:id_associado");
        $this->efetivar->bindParam("id_associado",$id_associado);
        $this->efetivar->bindParam("nome", $CadastroAssociadoDT->nome);
        $this->efetivar->bindParam("sobrenome", $CadastroAssociadoDT->sobrenome);
        $this->efetivar->bindParam("data_De_nascimento", $CadastroAssociadoDT->data_De_nascimento);
        $this->efetivar->bindParam("email", $CadastroAssociadoDT->email);
        $this->efetivar->bindParam("id_origem", $CadastroAssociadoDT->id_origem);     
        $this->efetivar->bindParam("endereco", $CadastroAssociadoDT->endereco);    
        $this->efetivar->bindParam("cep", $CadastroAssociadoDT->cep); 
        $this->efetivar->bindParam("Bairro", $CadastroAssociadoDT->Bairro);   
        $this->efetivar->bindParam("Cidade", $CadastroAssociadoDT->Cidade);    
        $this->efetivar->bindParam("Estado", $CadastroAssociadoDT->Estado);     
        $this->efetivar->bindParam("data_De_cadastro", $CadastroAssociadoDT->data_De_cadastro); 
        $this->efetivar->bindParam("pais",$CadastroAssociadoDT->pais);    
        $this->efetivar->bindParam("data_De_desligamento",$CadastroAssociadoDT->data_De_desligamento);    
        $this->efetivar->bindParam("numero",$CadastroAssociadoDT->numero);    
        $this->efetivar->bindParam("complemento",$CadastroAssociadoDT->complemento);    
        $this->efetivar->bindParam("forma_de_doacao",$CadastroAssociadoDT->forma_de_doacao);
        $this->efetivar->bindParam("cpf", $CadastroAssociadoDT->cpf);    
        $this->efetivar->bindParam("interesses", $CadastroAssociadoDT->interesses);  
        $this->efetivar->bindParam("naturalidade", $CadastroAssociadoDT->naturalidade); 
        $this->efetivar->bindParam("telefone", $CadastroAssociadoDT->telefone); 
        $this->efetivar->bindParam("idTipoPagamento", $CadastroAssociadoDT->idTipoPagamento); 
        $this->efetivar->bindParam("nomeMae", $CadastroAssociadoDT->nomeMae); 
        $this->efetivar->bindParam("nomePai", $CadastroAssociadoDT->nomePai); 
        $this->efetivar->execute();
        echo "\nPDOStatement::errorInfo():\n";
           $arr = $this->efetivar->errorInfo();
           print_r($arr);
    
    }
    
    public function ExcluirCadastroAssociado($id_associado){
    
        $this->efetivar=$this->conexao->prepare("delete from cadastroAssociado where id_associado=?");
        $this->efetivar->bindValue(1,$id_associado);
        $this->efetivar->execute();
        // echo "\nPDOStatement::errorInfo():\n";
        // $arr = $this->efetivar->errorInfo();
        // print_r($arr);
    
    }
    
    
    }
}


?>