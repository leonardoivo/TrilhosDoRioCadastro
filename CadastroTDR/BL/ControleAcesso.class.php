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
    $content = http_build_query(array(
     'cpf' => '32'
    ));
    $context = stream_context_create(array(
        'http' => array(
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                        "Content-Length: ".strlen($content)."\r\n".
                        "User-Agent:MyAgent/1.0\r\n",
            'method'  => 'POST',
            'content' => $content,
        )
    ));
    
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