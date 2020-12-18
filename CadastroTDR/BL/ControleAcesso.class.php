<?php
namespace TrilhosDorioCadastro\BL{
use TrilhosDorioCadastro\DAL\{CrudUsuarios,CrudPerfil, CrudTipoPagamento};
use TrilhosDorioCadastro\DTO\{UsuariosDTO,PerfilDTO,AcessoJV_DTO};
use TrilhosDorioCadastro\LO\{PerfilLO,UsuariosLO,AcessoJV_LO};
class ControleAcesso{

public function Redirecionar($pagina){
    header("Location: {$pagina}");
}

public function RedirecionarParaTipoPag($pagina,$cpf){
    $paginaComid=$pagina.'?cpf='.$cpf;

    header("Location: {$paginaComid}");
}

public function acesso($login,$senha){
   
    $liberar=false;
    $veracesso = new CrudUsuarios();
    $liberar= $veracesso->ConfirmaLogin($login,$senha);
    return $liberar;
    }
    
    public function ListaUsuarios(){
        $usuarios = new CrudUsuarios();
        $Lusuarios = $usuarios->ListarUsuarios();
        foreach($Lusuarios->getUsuarioss() as $k=>$usuario)
        {
           echo $usuario->id_usuario;
           echo $usuario->cpf;
           echo $usuario->nome."<br/>";
        }
        
        
        }

   public function ListarPerfil(){
    $perfil =  new CrudPerfil();
    $listPerfil = new PerfilLO();
    $listPerfil= $perfil->ListarPerfil();
    return $listPerfil;
   }

   public function ListarPerfilporID($id_perfil){
    $perfil =  new CrudPerfil();
    $listPerfil = new PerfilLO();
    $listPerfil= $perfil->ListarPerfilID($id_perfil);
    return $listPerfil;
   }

   public function IdentificaTipoAcesso($id_usuario){
       $TipoAcesso = new CrudPerfil();
       $ListAcesso = new AcessoJV_LO();
       $ListAcesso = $TipoAcesso->DefineTipoAcesso($id_usuario);
       return $ListAcesso;
   }



}
}

?>