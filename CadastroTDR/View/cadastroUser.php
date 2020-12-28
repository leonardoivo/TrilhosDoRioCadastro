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
$editar=$_POST['editar'];
$id_usuario=$_POST['id_usuario'];
    $cadastroDT->cpf=$_POST['cpf'];
   $cadastroDT->nome=$_POST['nome'];
   $cadastroDT->sobrenome=$_POST['sobrenome'];
   $cadastroDT->email=$_POST['email'];
   $cadastroDT->celular=$_POST['celular'];
   $cadastroDT->id_perfil= 1; //A ser preenchido por uma caixa de seleção.
   $cadastroDT->senha=$_POST['endereco'];
   $cadastroDT->situacao=0;
   
   if($editar==true && isset($id_usuario)){
    $pagina='ListarUsuarios.php';
    $ManterUsuario->EditarUsuarios($cadastroDT,$id_usuario);
    $Redirecionamento->Redirecionar($pagina);
   }else{
    $pagina='../CadastroTDR/login.html';
    $ManterUsuario->CadastrarUsuarios($cadastroDT);
    $enviarEmail = new EnvioEmail($remetente,$cadastroDT->email,'Seja muito bem vindo a Trilhos do Rio','E um Prazer ter você como associado');
    $enviarEmail->sendMail();
    $Redirecionamento->Redirecionar($pagina);

   }



?>
