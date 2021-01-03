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
    public function ListaUsuarioPorID($id_usuario){
      $usuarios = new CrudUsuarios();
      $Lusuarios = new UsuariosLO();
      $Lusuarios = $usuarios->ListarUsuarioPorID($id_usuario);
              
      return  $Lusuarios;
              
    }

     public function ListaUsuarioPorCPF($cpf){
      $usuarios = new CrudUsuarios();
      $Lusuarios = new UsuariosLO();
      $Lusuarios = $usuarios->ListarUsuarioPorCPF($cpf);
                
       return  $Lusuarios;
                
       }



                public function ListaUsuarioNome($nome){
                  $usuarios = new CrudUsuarios();
                  $Lusuarios = new UsuariosLO();
                  $Lusuarios = $usuarios->ListarUsuarioNome($nome);
                  
                  return  $Lusuarios;
                  
                  }

                  public function ListaUsuariosComPaginacao($paginaCorrente,$linhasPorPagina){
                    $usuarios = new CrudUsuarios();
                    $Lusuarios = new UsuariosLO();
                    $Lusuarios = $usuarios->ListarUsuariosComPaginacao($paginaCorrente,$linhasPorPagina);
                    
                    return  $Lusuarios;
                    
                    }

                    public function ListarTotais(){
                      $totais=0;
                      $ListarTotal = new CrudUsuarios();
                      $totais=$ListarTotal->ObterTotalUsuarios();
                      return $totais;
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