<?php
use TrilhosDorioCadastro\DTO\UsuarioDTO;
use TrilhosDorioCadastro\LO\UsuariosLO;
use TrilhosDorioCadastro\BL\{ManterUsuario as ManterBL,ControleAcesso};
require '../StartLoader/autoloader.php';
//$pagina="CadDadosBancarios.php";
$Redirecionamento = new ControleAcesso();
$id_usuario=$_REQUEST['id_usuario'];
$UsuariosLt = new ManterBL();
$ListUsuarios = new UsuariosLO();
$ListUsuarios=$UsuariosLt->ListaUsuarioPorID($id_usuario);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<link rel="shortcut icon" href="img/favicon.png" />

<!-- CSS-->
   <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body> 
<img src="img/titulo01.png" >
 <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
   <a class="navbar-brand" href="index.php">Home</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
         <a class="nav-link" href="ListarUsuarios.php" onclick='location.replace("ListarUsuarios.php")'>voltar</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="ListarUsuarios.php?saida=1" onclick='location.replace("../login.html")'>Sair</a>
       </li>
     </ul>
   </div>
 </nav>  
<div class="container">
<h1>Dados do Usuário do Sistema</h1>
<table class="table table-bordered table-striped" >
<?
foreach ($ListUsuarios->getUsuarios()as $usuario) {
?>
<tr><td>
ID Usuario:<? echo $usuario->id_usuario; ?></td>	<td>
CPF:<? echo $usuario->cpf; ?></td><td>
Login:<? echo $usuario->login; ?></td>
</tr>
<tr><td>Nome:<? echo $usuario->nome; ?></td><td> Sobrenome: <? echo $usuario->sobrenome; ?></td></tr>
<tr><td>id_perfil: <? echo $usuario->id_perfil; ?></td></tr>
<tr><td>Situação <? echo $usuario->situacao; ?></td></tr>
<tr><td>email:<? echo $usuario->email; ?></td><td>celular:<? echo $usuario->celular;?></td></tr>
<?
  }
?>
</table>
<a href="ListarUsuarios.php">Voltar</a>
</div>
</body>
</html>