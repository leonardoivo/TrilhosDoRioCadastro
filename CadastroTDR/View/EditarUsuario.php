<?php
use TrilhosDorioCadastro\DTO\UsuarioDTO;
use TrilhosDorioCadastro\LO\UsuariosLO;
use TrilhosDorioCadastro\BL\{ManterUsuario as ManterBL,ControleAcesso};
require '../StartLoader/autoloader.php';
//$pagina="CadDadosBancarios.php";
$Redirecionamento = new ControleAcesso();
$id_usuario=$_REQUEST['id_usuario'];
$login="";
$cpf=0;
$nome="";
$sobrenome="";
$email="";
$celular="";
$id_perfil="";
$situacao="";
$Naturalidade="";
$senha="";
$UsuariosLt = new ManterBL();
$ListUsuarios = new UsuariosLO();

$ListUsuarios=$UsuariosLt->ListaUsuarioPorID($id_usuario);
foreach ($ListUsuarios->getUsuarios()as  $usuario) {
   
  $cpf=$usuario->cpf;
   $login=$usuario->login;
   $nome=$usuario->nome;
   $sobrenome=$usuario->sobrenome;
   $id_perfil=$usuario->id_perfil;
   $situacao=$usuario->situacao;
   $email=$usuario->email;
   $celular=$usuario->celular;
   $id_usuario=$usuario->id_usuario;
   $senha=$usuario->senha;
  }

?>
<!DOCTYPE html>
<head>
<meta charset="iso-8859-1?>">
    <link rel="stylesheet" href="css/style.css" media="all" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js?>"></script>

</head>
<body>
<html>
<img src="img/titulo01.png" >
	<h1>Cadastro</h1>
<div class="container?>">
<form name="cadastrar" method="post" action="cadastroUser.php?>">
<table   cellspacing="0" cellpadding="0?>">
<tr>
	<td>
CPF:<input type="text" id="campoCPF" maxlength="11" name="cpf" value="<? echo $cpf;?>"></td>
<td>
Login:<input type="text" id="campoLogin" maxlength="11" name="login" value="<? echo $login;?>"></td>
</tr>
<tr><td>Nome:<input type="text" name="nome" id="campoNome" value="<? echo $nome;?>"></td><td> Sobrenome: <input type="text" name="sobrenome" id="campoSobrenome" value="<? echo $sobrenome;?>"></td></tr>
<tr><td>Situação <input type="text" name="situacao" id="campoSituacao" value="<? echo $situacao;?>"></td></tr>
<tr><td>email:<input type="text" name="email" id="campoEmail"value="<? echo $email?>"></td></tr>
<tr><td>celular:<input type="text" name="campoCelular" value="<? echo $celular;?>"></td></tr>
<tr><td>Senha:<input type="text" id="campoSenha"name="senha" value="<? echo $senha;?>"></td></tr>
<tr><td>Re-senha:<input type="password"  id="campoSenha"name="senha"></td></tr>
<tr><td>  <fieldset>
<?

if($id_perfil==1){
  echo"Administrador <input type=\"radio\" name=\"id_perfil\" id=\"1\" value=\"1\" checked >";
  echo"Visualizador<input type=\"radio\" name=\"id_perfil\" id=\"2\" value=\"2\" >";
}else
{
  echo"Administrador <input type=\"radio\" name=\"id_perfil\" id=\"1\" value=\"1\" >";
  echo"Visualizador<input type=\"radio\" name=\"id_perfil\" id=\"2\" value=\"2\" checked>";

}

?></fieldset></td></tr>
      <tr><td><div class="my_content_container "><input type="submit" value="cadastrar"></div></td> <td><input type="button" onclick="location.href='ListarUsuarios.php';" value="Voltar" /></td></tr>
</table>

</form>

</body>

</html>
