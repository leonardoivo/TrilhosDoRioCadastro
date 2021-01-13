<?php

use TrilhosDorioCadastro\DTO\UsuariosDTO;
use TrilhosDorioCadastro\LO\UsuariosLO;
use TrilhosDorioCadastro\BL\{ManterUsuario as ManterBL,ControleAcesso};
use TrilhosDorioCadastro\Common\EnvioEmail;
require '../StartLoader/autoloader.php';
$Redirecionamento = new ControleAcesso();
$cadastroDT = new UsuariosDTO();
$ManterUsuario = new ManterBL();
$pagina='';
$remetente="boasvindas@trilhosdorio.com.br";
$editar=false;
$id_usuario='';
 $p = $GLOBALS['_'.$_SERVER['REQUEST_METHOD']];
$editar=isset($_POST['editar'])?$_POST['editar']:false;
$id_usuario=isset($_POST['id_usuario'])?$_POST['id_usuario']:0;

    $cadastroDT->cpf=$_POST['cpf'];
   $cadastroDT->nome=$_POST['nome'];
   $cadastroDT->sobrenome=$_POST['sobrenome'];
   $cadastroDT->login=$_POST['login'];
   $cadastroDT->email=$_POST['email'];
   $cadastroDT->celular=$_POST['celular'];
   $cadastroDT->id_perfil= $_POST['id_perfil']; //A ser preenchido por uma caixa de seleção.
   $cadastroDT->senha=$_POST['senha'];
   $cadastroDT->situacao=0;
   
   if($editar==true && $id_usuario>0){
    $pagina='ListarUsuarios.php';
    $ManterUsuario->EditarUsuarios($id_usuario,$cadastroDT);
    $Redirecionamento->Redirecionar($pagina);
   }else{
    $pagina='../login.html';
    $ManterUsuario->CadastrarUsuarios($cadastroDT);
    $enviarEmail = new EnvioEmail($remetente,$cadastroDT->email,'Seja muito bem vindo a Trilhos do Rio','E um Prazer ter você como associado');
    $enviarEmail->sendMail();
    $Redirecionamento->Redirecionar($pagina);

   }



?>
