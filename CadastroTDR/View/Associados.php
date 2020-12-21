<?php
session_start();
ob_start();
use TrilhosDorioCadastro\DTO\CadastroAssociadoDTO as CadastroDTO;
use TrilhosDorioCadastro\LO\CadastroAssociadoLO as  CadastroLO;
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL,ControleAcesso};
require '../autoloader.php';
$usuario=isset($_SESSION["usuario"])?$_SESSION["usuario"]:null;
//$pagina="CadDadosBancarios.php";
$Redirecionamento = new ControleAcesso();
$AssociadosLt = new ManterBL();
$ListAssociados = new CadastroLO();
$id_associado= isset($_REQUEST['id_associado'])?$_REQUEST['id_associado']:0;
$exclusao = isset($_REQUEST['exclusao'])?$_REQUEST['exclusao']:false;
if(isset($usuario))
{
if($id_associado!=0 && $exclusao==true){
    $AssociadosLt->ExcluirAssociado($id_associado);
}
echo "<!DOCTYPE html><html><head></head><body> <img src=\"img/titulo01.png\" >
";
echo "<table border=1>
	<tr><th>Associados cadastrados</th></tr>";
$ListAssociados=$AssociadosLt->ListarAssociados();
foreach ($ListAssociados->getCadastroAssociados()as $associado) {   
    echo "<tr><td> <a href=\"DadosAssociados.php?cpf=".$associado->cpf."\">".$associado->nome." ".$associado->sobrenome."</a></td>";
//         // if(VerAcesso($usuario,$link)==true){
         echo "<td> <a href=\"editarDadosAssociados.php?id_associado=". $associado->id_associado."\">Editar</a></td>";
         echo " <td> <a href=\"Associados.php?id_associado=".$associado->id_associado."& exclusao=true\"> Apagar</a></td>";
         //          //}
   echo "</tr>";
  } 	
  echo "</table>";
   echo "<a href=\"Cadastro.html\"> Incluir usuário</a>";
   echo "<a href=\"index.php\" onclick='location.replace(\"index.php\")'>voltar</a>";
   echo "<a href=\"Associados.php?saida=1\" onclick='location.replace(\"../login.html\")'>Sair</a>";
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
