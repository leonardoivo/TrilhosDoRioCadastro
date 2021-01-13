<?php
session_start();
ob_start();
use TrilhosDorioCadastro\DTO\CadastroAssociadoDTO as CadastroDTO;
use TrilhosDorioCadastro\LO\CadastroAssociadoLO as  CadastroLO;
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL,ControleAcesso};
require '../StartLoader/autoloader.php';

$usuario=null;
$usuario=isset($_SESSION["usuario"])?$_SESSION["usuario"]:null;
$Controle = new ControleAcesso();
$AssociadosLt = new ManterBL();
$ListAssociados = new CadastroLO();
$TotaisDeAssociados=$AssociadosLt->ListarTotais();

if($usuario>0){
$paginaPart1="<!DOCTYPE html>
<html>
<head>

<meta charset=\"utf-8\" />
<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" /> 
<link rel=\"shortcut icon\" href=\"img/favicon.png\" />

<!-- CSS-->
<link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">
<!--Javascript -->
<script src=\"js/jquery-3.2.1.min.js\"></script>
<script src=\"js/bootstrap.min.js\"></script>

</head>
<body>
<img src=\"img/titulo01.png\" >                          
<nav class=\"navbar navbar-expand-lg  navbar-dark bg-dark\">
  <a class=\"navbar-brand\" href=\"index.php\">Home</a>
  <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navTeste\" aria-controls=\"navTeste\" aria-expanded=\"false\" aria-label=\"Alterna navegação\">
    <span class=\"navbar-toggler-icon\"></span>
  </button>
  <div class=\"collapse navbar-collapse\" id=\"navTeste\">
    <ul class=\"navbar-nav mr-auto\">
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"Associados.php\">Ver Associados </a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\"href=\"ListarUsuarios.php\">Usuarios</a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"index.php?saida=1\" onclick='location.replace(\"../login.html\")'>Sair</a>
      </li>
    </ul>  
  </div>
</nav>
<div class=\"container\">
  <div class=\"row\">
    <div class=\"col-sm\">";
echo $paginaPart1;
echo "<h1>Ultimo associados cadastrados</h1>
<div class=\"table-responsive\">

<table class=\"table table-bordered table-striped \">";
$ListAssociados=$AssociadosLt->ListarAsssociadosRecentes();
foreach ($ListAssociados->getCadastroAssociados()as $associado) {   
    echo "<tr><td> <a href=\"DadosAssociados.php?id_associado=".$associado->id_associado."\" >".$associado->nome." ".$associado->sobrenome."</a></td>";
   echo "</tr>";
  } 	
$paginaParte2=" </table>
</div></div>
<div class=\"col-sm\">
Total de cadastrados:".$TotaisDeAssociados."</div>
</div>
</div></body></html>";

echo $paginaParte2;
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