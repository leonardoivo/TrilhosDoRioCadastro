<?php
session_start();
ob_start();
use TrilhosDorioCadastro\DTO\UsuarioDTO;
use TrilhosDorioCadastro\LO\UsuariosLO;
use TrilhosDorioCadastro\BL\{ManterUsuario as ManterBL,ControleAcesso};
require '../StartLoader/autoloader.php';
$usuario=isset($_SESSION["usuario"])?$_SESSION["usuario"]:null;
//$pagina="CadDadosBancarios.php";
$Redirecionamento = new ControleAcesso();
$usuariosLt = new ManterBL();
$Listusuarios = new UsuariosLO();
$id_usuario= isset($_REQUEST['id_usuario'])?$_REQUEST['id_usuario']:0;
$exclusao = isset($_REQUEST['exclusao'])?$_REQUEST['exclusao']:false;
if(isset($usuario))
{
if($id_usuario!=0 && $exclusao==true){
    $usuariosLt->ExcluirUsuarios($id_usuario);
}
echo "<!DOCTYPE html><html><head></head><body> <img src=\"img/titulo01.png\" >
";
echo "<table border=1>
	<tr><th>usuarios cadastrados</th></tr>";
$Listusuarios=$usuariosLt->ListaUsuarios();
foreach ($Listusuarios->getUsuarios()as $usuario) {   
    echo "<tr><td> <a href=\"dadosUsuario.php?id_usuario=".$usuario->id_usuario."\">".$usuario->nome." ".$usuario->sobrenome."</a></td>";
//         // if(VerAcesso($usuario,$link)==true){
         echo "<td> <a href=\"EditarUsuario.php?id_usuario=". $usuario->id_usuario."\">Editar</a></td>";
         echo " <td> <a href=\"ListarUsuarios.php?id_usuario=".$usuario->id_usuario."& exclusao=true\"> Apagar</a></td>";
         //          //}
   echo "</tr>";
  } 	
  echo "</table>";
   echo "<a href=\"CadastrarUser.php\"> Incluir usuário</a>";
   echo "<a href=\"index.php\" onclick='location.replace(\"index.php\")'>voltar</a>";
   echo "<a href=\"usuarios.php?saida=1\" onclick='location.replace(\"../login.html\")'>Sair</a>";
   echo "</body></html>";
}	
else if (!isset($usuario))
{
header("Location:../login.html");
      if (headers_sent())
       {
        die("O redirecionamento falhou. Por favor, clique neste link: <a href=...>");
       }
}
 if(isset($_REQUEST["saida"]))
{
     while (ob_get_level() > 0) {
        ob_end_clean();
    }
  session_unset();
  session_destroy();
  exit(header("Location:../login.html"));
}
?>
