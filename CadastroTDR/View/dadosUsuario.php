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
$UsuariosLt = new ManterBL();
$ListUsuarios = new UsuariosLO();

$ListUsuarios=$UsuariosLt->ListaUsuarioPorID($id_usuario);
foreach ($ListUsuarios->getUsuarios()as $usuario) {
   
   $cpf=$usuario->cpf;
   $login=$usuario->login;
   $nome=$usuario->nome;
   $sobrenome=$usuario->sobrenome;
   $id_perfil=$usuario->id_perfil;
   $situacao=$usuario->situacao;
   $email=$usuario->email;
   $celular=$usuario->celular;
   $id_usuario=$usuario->id_usuario;
  }
?>

<!DOCTYPE html>
<html><head>
</head><body>
<table >
<tr><td>
ID Usuario:<? echo $id_usuario; ?></td>	<td>
CPF:<? echo $cpf; ?></td><td>
Login:<? echo $login; ?></td>
</tr>
<tr><td>Nome:<? echo $nome; ?></td><td> Sobrenome: <? echo $sobrenome; ?></td></tr>
<tr><td>id_perfil: <? echo $id_perfil; ?></td></tr>
<tr><td>Situação <? echo $situacao; ?></td></tr>
<tr><td>email:<? echo $email; ?></td><td>celular:<? echo $celular;?></td></tr>

</table>
<a href="ListarUsuarios.php">Voltar</a>

</body>
</html>