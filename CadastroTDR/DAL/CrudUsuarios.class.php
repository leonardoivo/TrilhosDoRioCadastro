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
    
        $resultado=$this->conexao->query("select * from Usuarios");
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
            $resultado=$this->conexao->query("select * from usuarios where cpf={$login} and senha={$senha}");
            $quantidade=count($resultado->fetchAll());
            if($quantidade==1){
             $retorno=true; 
             }
         return $retorno;
        }
    
    
    public function GravarUsuarios(UsuariosDTO $UsuariosDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Usuarios (nome_Usuarios,id_patrimonio,Descricao,DataDeCriacao) values (:nome_Usuarios,:id_patrimonio,:Descricao,:DataDeCriacao)");
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
    
    }
    
    public function AlterarUsuarios(UsuariosDTO $UsuariosDT,$id_usuario){
        $this->efetivar=$this->conexao->prepare("update Usuarios set nome_Usuarios=:nome_Usuarios,id_patrimonio=:id_patrimonio,Descricao=:Descricao,DataDeCriacao=:DataDeCriacao where id_Usuarios=:id_Usuarios");
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
    
    }
    
    public function ExcluirUsuarios($id_usuario){
    
        $this->efetivar=$this->conexao->prepare("delete from  Usuarios where id_usuario=?");
        $this->efetivar->bindValue(1,$id_usuario);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>