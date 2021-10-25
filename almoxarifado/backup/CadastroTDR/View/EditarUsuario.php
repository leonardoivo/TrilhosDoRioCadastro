<?php
use TrilhosDorioCadastro\DTO\UsuarioDTO;
use TrilhosDorioCadastro\LO\UsuariosLO;
use TrilhosDorioCadastro\BL\{ManterUsuario as ManterBL,ControleAcesso};
require '../StartLoader/autoloader.php';
//$pagina="CadDadosBancarios.php";
$Redirecionamento = new ControleAcesso();
$id_usuario=$_REQUEST['id_usuario'];
$id_perfil="";
$UsuariosLt = new ManterBL();
$ListUsuarios = new UsuariosLO();
$ListUsuarios=$UsuariosLt->ListaUsuarioPorID($id_usuario);
?>
<!DOCTYPE html>

<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<link rel="shortcut icon" href="img/favicon.png" />

<!-- CSS-->
   <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
   <link href="css/estilos.css" rel="stylesheet">

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
<h1>Cadastro</h1>
<form name="cadastrar" method="post" action="cadastroUser.php" action="cadastroUser.php" id="Cadastro" onsubmit="validaFormUsuario(); return false;">
<input type="hidden" name="editar" value="true">
<?
foreach ($ListUsuarios->getUsuarios()as  $usuario) {
   
   $id_perfil=$usuario->id_perfil;
   $id_usuario=$usuario->id_usuario;
   ?>
   <input type="hidden" name="id_usuario" value="<? echo $id_usuario;?>">
   <div class="form-row">
   <div class="form-group col-md-2">
       <label for="inputCPF" class="Subtitulos">ID do usuário:<? echo $id_usuario;?> </label>
     </div>
     <div class="form-group col-md-2">
       <label for="inputCPF" class="Subtitulos">CPF</label>
       <input type="text" class="form-control" id="cpf" value="<? echo $usuario->cpf;?>" name="cpf"  onkeypress='return SomenteNumero(event)'>
     </div>
     <div class="form-group col-md-2">
       <label for="inputLogin">Login</label>
       <input type="text" class="form-control" id="login" value="<? echo $usuario->login;?>"  name="login" >
     </div>
 
     <div class="form-group col-md-6">
       <label for="inputNome" class="Subtitulos">Nome</label>
       <input type="text" class="form-control" id="inputNome" name="nome" value="<? echo $usuario->nome;?>"placeholder="Nome" >
     </div>
 
     <div class="form-group col-md-6">
       <label for="inputSobrenome" class="Subtitulos">Sobrenome</label>
       <input type="text" class="form-control" id="inputSobrenome"  name="sobrenome" value="<? echo $usuario->sobrenome;?>" placeholder="Sobrenome">
     </div>
     <div class="form-group col-md-1">
       <label for="inputSituacao" class="Subtitulos">Situação</label>
       <input type="text" class="form-control"  name="situacao" value="<? echo $usuario->situacao;?>" id="inputSituacao">
      </div>   
 </div>
  <div class="form-row"> 
 
      <div class="form-group col-md-6">
        <label for="inputEmail4" class="Subtitulos">Email</label>
        <input type="email" class="form-control" id="inputEmail4" name="email" value="<? echo $usuario->email?>" placeholder="Email">
      </div>
 
      <div class="form-group col-md-2">
       <label for="inputCelular" class="Subtitulos">Celular</label>
       <input type="text" class="form-control" name="celular" value="<? echo $usuario->celular;?>" id="inputCelular"  onkeypress='return SomenteNumero(event)'>
      </div>
 
     
      <div class="form-group col-md-6">
         <label for="senha" class="Subtitulos">Senha</label>
         <input type="password" class="form-control" id="senha" name="senha" value="<? echo $usuario->senha;?>" placeholder="senha">
      </div>
 
      <div class="form-group col-md-6">
         <label for="re-senha" class="Subtitulos">Re-senha</label>
         <input type="password" class="form-control" id="re-senha" name="re-senha" placeholder="re-senha">
      </div>
 
    </div>  
    <div class="form-row">

    <?

  }
if($id_perfil==1){?>
 <div class="form-radio">
         <input class="form-radio-input" type="radio" name="id_perfil" value="1" id="gridCheck" checked>
         <label class="form-radio-label" for="gridCheck">
           Administrador
         </label>
      </div>

       <div class="form-radio">
          <input class="form-radio-input" type="radio" name="id_perfil" value="2" id="gridCheck">
          <label class="form-radio-label" for="gridCheck">
           Visualizador
         </label>
      </div>


<?} else {?>
       <div class="form-radio">
         <input class="form-radio-input" type="radio" name="id_perfil" value="1"id="gridCheck">
         <label class="form-radio-label" for="gridCheck">
           Administrador
         </label>
      </div>

       <div class="form-radio">
          <input class="form-radio-input" type="radio" name="id_perfil" value="2" id="gridCheck" checked>
          <label class="form-radio-label" for="gridCheck">
           Visualizador
         </label>
      </div>
     
<?}?>
</div>

     <div class="form-row">

      <button type="submit" class="btn btn-dark">Gravar Edição</button>
      </div>

   </form>
</div>





















</body>

</html>
