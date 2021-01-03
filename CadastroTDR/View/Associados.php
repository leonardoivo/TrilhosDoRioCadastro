<?php
session_start();
ob_start();
use TrilhosDorioCadastro\DTO\CadastroAssociadoDTO as CadastroDTO;
use TrilhosDorioCadastro\LO\CadastroAssociadoLO as  CadastroLO;
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL,ControleAcesso};
require '../StartLoader/autoloader.php';
$usuario=isset($_SESSION["usuario"])?$_SESSION["usuario"]:null;
//$pagina="CadDadosBancarios.php";
$Controle = new ControleAcesso();
$AssociadosLt = new ManterBL();
$ListAssociados = new CadastroLO();
$TotalLinhas=0;
$linhasPorPagina=10;
$paginaCorrente=0;
$totalPaginas=0;
$incremento=0;
$decremento = 0;
$avanco=0;
$retorno=0;
$paginaAtual=0;
$id_associado= isset($_REQUEST['id_associado'])?$_REQUEST['id_associado']:0;
$exclusao = isset($_REQUEST['exclusao'])?$_REQUEST['exclusao']:false;
$numero_pagina =(isset($_GET['pagina']))? $_GET['pagina'] : 1; 


$TotalLinhas=$AssociadosLt->ListarTotais();
$totalPaginas=$Controle->ObterTotalDePaginas($TotalLinhas,$linhasPorPagina);
$paginaCorrente=$Controle->ObterPaginaCorrente($linhasPorPagina,$numero_pagina);

if(isset($usuario))
{
if($id_associado!=0 && $exclusao==true){
    $AssociadosLt->ExcluirAssociado($id_associado);
}
echo "<!DOCTYPE html>
<html>
<head>

<meta charset=\"utf-8\" />
<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" /> 
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
   <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#conteudoNavbarSuportado\" aria-controls=\"conteudoNavbarSuportado\" aria-expanded=\"false\" aria-label=\"Alterna navegação\">
     <span class=\"navbar-toggler-icon\"></span>
   </button>
 
   <div class=\"collapse navbar-collapse\" id=\"conteudoNavbarSuportado\">
     <ul class=\"navbar-nav mr-auto\">
       <li class=\"nav-item active\">
         <a class=\"nav-link\" <a href=\"CadastroIn.html\">Cadastrar Associado </a>
       </li>
       <li class=\"nav-item\">
         <a class=\"nav-link\" href=\"index.php\" onclick='location.replace(\"index.php\")'>voltar</a>
       </li>
 
       <li class=\"nav-item\">
         <a class=\"nav-link\" href=\"Associados.php?saida=1\" onclick='location.replace(\"../login.html\")'>Sair</a>
       </li>
     </ul>
    
   </div>
 </nav>
 ";
echo "<div class=\"container\">
<h1>Associados cadastrados</h1>
<div class=\"table-responsive\">

<table class=\"table table-bordered table-striped \">";
$ListAssociados=$AssociadosLt->ListarAssociadosComPaginacao($paginaCorrente,$linhasPorPagina);
foreach ($ListAssociados->getCadastroAssociados()as $associado) {   
    echo "<tr><td> <a href=\"DadosAssociados.php?id_associado=".$associado->id_associado."\" >".$associado->nome." ".$associado->sobrenome."</a></td>";
//         // if(VerAcesso($usuario,$link)==true){
         echo "<td> <a href=\"editarDadosAssociados.php?id_associado=". $associado->id_associado."\" >Editar</a></td>";
         echo " <td> <a href=\"Associados.php?id_associado=".$associado->id_associado."& exclusao=true\" > Apagar</a></td>";
         //          //}
   echo "</tr>";
  } 	
  echo "</table>
  </div>
  ";
  $incremento=$numero_pagina+1;
  $decremento = $numero_pagina-1;
  $avanco=($incremento>$totalPaginas)?1:$incremento;
  $retorno=(1>$decremento)?1:$decremento;

  echo "<nav aria-label=\"Navegação de página exemplo\">
 <ul class=\"pagination\">
   <li class=\"page-item\">
     <a class=\"page-link\" href='Associados.php?pagina=".$retorno."' aria-label=\"Anterior\">
       <span aria-hidden=\"true\">&laquo;</span>
       <span class=\"sr-only\">Anterior</span>
     </a>
   </li>";
   for ($i=1;1+$totalPaginas>$i;$i++)
   {
     // $paginaAtual=$i;
      $ativo = ($i == $numero_pagina) ? 'numativo' : '';
      // echo "<a href='Associados.php?pagina=".$i."' class='numero ".$ativo."'> ".$i." </a>";
      if($ativo=='numativo'){
        echo  " <li class=\"page-item active\">
        <a class=\"page-link\" href='Associados.php?pagina=".$i."' >".$i."<span class=\"sr-only\"></span></a>
        
        </li>";

      }else{
        echo  " <li class=\"page-item\">
        <a class=\"page-link\" href='Associados.php?pagina=".$i."' >".$i."<span class=\"sr-only\"></span></a>
        
        </li>";

        
      }
      echo"<li class=\"page-item\">";  
   }
  echo "<a class=\"page-link\" href='Associados.php?pagina=".$avanco."' aria-label=\"Próximo\">
       <span aria-hidden=\"true\">&raquo;</span>
       <span class=\"sr-only\">Próximo</span>
     </a>
   </li>
 </ul>
</nav>"; 
 echo"<br/></div>";
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
