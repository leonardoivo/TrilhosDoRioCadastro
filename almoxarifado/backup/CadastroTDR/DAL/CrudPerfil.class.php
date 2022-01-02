<?php
namespace TrilhosDorioCadastro\DAL{
use TrilhosDorioCadastro\DAL\Crud;
use TrilhosDorioCadastro\DTO\{AcessoJV_DTO,PerfilDTO,UsuariosDTO};
use TrilhosDorioCadastro\LO\{PerfilLO,AcessoJV_LO,UsuariosLO};
use \ArrayObject;
use \PDO;

class CrudPerfil extends Crud{
    public $id_Perfil=0;
    public $nome_Perfil="";
    private $conexao;
    private $efetivar;
    public $Perfil;

    
    public function __construct()
    {
        $this->conexao = new Crud();
       
    }
    
    public function ListarPerfil(){
    
        $resultado=$this->conexao->query("select * from Perfil");
         $Perfil = new PerfilLO();
        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
        {
             $PerfilDT= new PerfilDTO();
            $PerfilDT->id_perfil=$linha['id_perfil'];
            $PerfilDT->nome_Perfil=$linha['nome_Perfil'];
            $PerfilDT->tipo_acesso=$linha['tipo_acesso'];     
            $Perfil->add($PerfilDT);
        }
        return $Perfil;
        }
    
        public function ListarPerfilID($id_perfil){
    
            $resultado=$this->conexao->query("select * from Perfil where id_perfil={$id_perfil}");
             $Perfil = new PerfilLO();
            while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
            {
                 $PerfilDT= new PerfilDTO();
                $PerfilDT->id_perfil=$linha['id_perfil'];
                $PerfilDT->nome_Perfil=$linha['nome_Perfil'];
                $PerfilDT->tipo_acesso=$linha['tipo_acesso'];     
                $Perfil->add($PerfilDT);
            }
            return $Perfil;
            }
        
            public function DefineTipoAcesso($id_usuario){
    
                $resultado=$this->conexao->query("select * from usuarios usr inner join perfil pf
                on usr.id_perfil=pf.id_perfil  where usr.id_usuario={$id_usuario}");
                 $Acesso = new AcessoJV_LO;
                while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
                {
                     $PerfilDT= new AcessoJV_DTO();
                    $PerfilDT->id_perfil=$linha['id_perfil'];
                    $PerfilDT->nome_Perfil=$linha['nome_Perfil'];
                    $PerfilDT->tipo_acesso=$linha['tipo_acesso'];     
                    $Acesso->add($PerfilDT);
                }
                return $Acesso;
                }


    
    
    public function GravarPerfil(PerfilDTO $PerfilDT)
    {
    $this->efetivar=$this->conexao->prepare("insert into Perfil (nome_Perfil,tipo_acesso) values (:nome_Perfil,:tipo_acesso)");
    $this->efetivar->bindValue("nome_Perfil",$PerfilDT->nome_Perfil);
    $this->efetivar->bindValue("tipo_acesso", $PerfilDT->tipo_acesso);
    $this->efetivar->execute();
    
    }
    
    public function AlterarPerfil(PerfilDTO $PerfilDT){
        $this->efetivar=$this->conexao->prepare("update Perfil set nome_Perfil=:nome_Perfil,tipo_acesso=:tipo_acesso where id_Perfil=:id_Perfil");
        $this->efetivar->bindValue("id_perfil",$PerfilDT->id_perfil);
        $this->efetivar->bindValue("nome_Perfil",$PerfilDT->nome_Perfil);
        $this->efetivar->bindValue("tipo_acesso", $PerfilDT->tipo_acesso);
        $this->efetivar->execute();
    
    }
    
    public function ExcluirPerfil($id_perfil){
    
        $this->efetivar=$this->conexao->prepare("delete from  Perfil where id_perfil=?");
        $this->efetivar->bindValue(1,$id_perfil);
        $this->efetivar->execute();
    
    
    }
    
    
    }
}


?>