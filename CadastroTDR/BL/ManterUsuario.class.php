<?php
namespace TrilhosDorioCadastro\BL{
use TrilhosDorioCadastro\DAL\{CrudUsuarios,CrudPerfil};
use TrilhosDorioCadastro\DTO\{UsuariosDTO,PerfilDTO};
use TrilhosDorioCadastro\LO\{UsuariosLO,PerfilLO};
    class ManterUsuario{
        public function ListaUsuarios(){
            $usuarios = new CrudUsuarios();
            $Lusuarios = new UsuariosLO();
            $Lusuarios = $usuarios->ListarUsuarios();
            
            return  $Lusuarios;
            
            }
    public function CadastrarUsuarios(UsuariosDTO $usuario){
      $crUsuario = new CrudUsuarios();
      $crUsuario->GravarUsuarios($usuario);
    }
    public function EditarUsuarios($idusuario,UsuariosDTO $usuario){
      $crUsuario = new CrudUsuarios();
      $crUsuario->AlterarUsuarios($usuario,$idusuario);

    }
    public function ExcluirUsuarios($idusuario){
      $crUsuario = new CrudUsuarios();
      $crUsuario->ExcluirUsuarios($idusuario);


    }


    }
}

?>