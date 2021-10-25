<?php
namespace TrilhosDorioCadastro\DAL{
use TrilhosDorioCadastro\DAL\Crud;
use TrilhosDorioCadastro\DTO\UsuariosDTO;
use TrilhosDorioCadastro\LO\UsuariosLO;
use \ArrayObject;
use \PDO;

class CrudUsuarios extends Crud{
    public $id_Usuarios=0;
    public $nome_Usuarios="";
    private $conexao;
    private $efetivar;
    public $Usuarios;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarUsuarios(){
    
        $resultado=$this->conexao->query("select * from usuarios");
         $Usuarios = new UsuariosLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
            $UsuariosDT= new UsuariosDTO();
            $UsuariosDT->id_usuario=$linha['id_usuario'];
            $UsuariosDT->cpf=$linha['cpf'];
            $UsuariosDT->nome=$linha['nome'];
            $UsuariosDT->id_perfil=$linha['id_perfil'];
            $UsuariosDT->email=$linha['email'];
            $UsuariosDT->login=$linha['login'];     
            $UsuariosDT->senha=$linha['senha'];     
            $UsuariosDT->celular=$linha['celular'];     
            $UsuariosDT->situacao=$linha['situacao'];     
            $UsuariosDT->sobrenome=$linha['sobrenome'];     
            $Usuarios->add($UsuariosDT);
      


        }
        return $Usuarios;
        }
        public function ConfirmaLogin($login,$senha){
            $retorno=false;
         
            $this->efetivar=$this->conexao->prepare("select * from usuarios where cpf=:cpf and senha=:senha");
            $this->efetivar->bindValue("cpf",$login);
            $this->efetivar->bindValue("senha",$senha);

            $this->efetivar->execute();
            $this->efetivar->RowCount();

            $quantidade=$this->efetivar->RowCount();
            if($quantidade==1){
                 $retorno=true; 
               }
            
         return $retorno;
        }
    
    
        public function ListarUsuarioPorID($id_usuario){
    
            $resultado=$this->conexao->query("select * from usuarios where id_usuario={$id_usuario}");
             $Usuarios = new UsuariosLO();
            while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
            {
                $UsuariosDT= new UsuariosDTO();
                $UsuariosDT->id_usuario=$linha['id_usuario'];
                $UsuariosDT->cpf=$linha['cpf'];
                $UsuariosDT->nome=$linha['nome'];
                $UsuariosDT->id_perfil=$linha['id_perfil'];
                $UsuariosDT->email=$linha['email'];
                $UsuariosDT->login=$linha['login'];     
                $UsuariosDT->senha=$linha['senha'];     
                $UsuariosDT->celular=$linha['celular'];     
                $UsuariosDT->situacao=$linha['situacao'];     
                $UsuariosDT->sobrenome=$linha['sobrenome'];     
                $Usuarios->add($UsuariosDT);
          
    
    
            }
            return $Usuarios;
            }

            public function ListarUsuarioPorCPF($cpf){
    
                $resultado=$this->conexao->query("select * from usuarios where cpf={$cpf}");
                 $Usuarios = new UsuariosLO();
                while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
                {
                    $UsuariosDT= new UsuariosDTO();
                    $UsuariosDT->id_usuario=$linha['id_usuario'];
                    $UsuariosDT->cpf=$linha['cpf'];
                    $UsuariosDT->nome=$linha['nome'];
                    $UsuariosDT->id_perfil=$linha['id_perfil'];
                    $UsuariosDT->email=$linha['email'];
                    $UsuariosDT->login=$linha['login'];     
                    $UsuariosDT->senha=$linha['senha'];     
                    $UsuariosDT->celular=$linha['celular'];     
                    $UsuariosDT->situacao=$linha['situacao'];     
                    $UsuariosDT->sobrenome=$linha['sobrenome'];     
                    $Usuarios->add($UsuariosDT);
              
        
        
                }
                return $Usuarios;
                }
    
                public function ListarUsuarioNome($nome){
    
                    $resultado=$this->conexao->query("select * from usuarios where nome like '%{$nome}%'");
                     $Usuarios = new UsuariosLO();
                    while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
                    {
                        $UsuariosDT= new UsuariosDTO();
                        $UsuariosDT->id_usuario=$linha['id_usuario'];
                        $UsuariosDT->cpf=$linha['cpf'];
                        $UsuariosDT->nome=$linha['nome'];
                        $UsuariosDT->id_perfil=$linha['id_perfil'];
                        $UsuariosDT->email=$linha['email'];
                        $UsuariosDT->login=$linha['login'];     
                        $UsuariosDT->senha=$linha['senha'];     
                        $UsuariosDT->celular=$linha['celular'];     
                        $UsuariosDT->situacao=$linha['situacao'];     
                        $UsuariosDT->sobrenome=$linha['sobrenome'];     
                        $Usuarios->add($UsuariosDT);
                  
                    }
                    return $Usuarios;
                    }

    public function GravarUsuarios(UsuariosDTO $UsuariosDT)
    {
    $this->efetivar=$this->conexao->prepare("INSERT INTO usuarios( cpf, nome, id_perfil, email, login, senha, celular, situacao, sobrenome) VALUES (:cpf,:nome, :id_perfil, :email, :login, :senha, :celular, :situacao, :sobrenome)");
    $this->efetivar->bindValue("cpf",$UsuariosDT->cpf);
    $this->efetivar->bindValue("nome", $UsuariosDT->nome);
    $this->efetivar->bindValue("id_perfil",$UsuariosDT->id_perfil);
    $this->efetivar->bindValue("email",$UsuariosDT->email);
    $this->efetivar->bindValue("login",$UsuariosDT->login);
    $this->efetivar->bindValue("senha",$UsuariosDT->senha);
    $this->efetivar->bindValue("celular",$UsuariosDT->celular);
    $this->efetivar->bindValue("situacao",$UsuariosDT->situacao);
    $this->efetivar->bindValue("sobrenome",$UsuariosDT->sobrenome);
    $this->efetivar->execute();
    echo "\nPDOStatement::errorInfo():\n";
    $arr = $this->efetivar->errorInfo();
    print_r($arr);
    
    }
    
    public function AlterarUsuarios(UsuariosDTO $UsuariosDT,$id_usuario){
        $this->efetivar=$this->conexao->prepare("UPDATE usuarios SET cpf=:cpf,nome=:nome,id_perfil=:id_perfil,email=:email,login=:login,senha=:senha,celular=:celular,situacao=:situacao,sobrenome=:sobrenome WHERE id_usuario=:idusuario");
        $this->efetivar->bindValue("id_usuario",$id_usuario);
        $this->efetivar->bindValue("cpf",$UsuariosDT->cpf);
        $this->efetivar->bindValue("nome", $UsuariosDT->nome);
        $this->efetivar->bindValue("id_perfil",$UsuariosDT->id_perfil);
        $this->efetivar->bindValue("email",$UsuariosDT->email);
        $this->efetivar->bindValue("login",$UsuariosDT->login);
        $this->efetivar->bindValue("senha",$UsuariosDT->senha);
        $this->efetivar->bindValue("celular",$UsuariosDT->celular);
        $this->efetivar->bindValue("situacao",$UsuariosDT->situacao);
        $this->efetivar->bindValue("sobrenome",$UsuariosDT->sobrenome);
        $this->efetivar->execute();
        echo "\nPDOStatement::errorInfo():\n";
        $arr = $this->efetivar->errorInfo();
        print_r($arr);
    
    }
    
    public function ExcluirUsuarios($id_usuario){
    
        $this->efetivar=$this->conexao->prepare("delete from  usuarios where id_usuario=?");
        $this->efetivar->bindValue(1,$id_usuario);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>