<?php
session_start();
ob_start();
use TrilhosDorioCadastro\DTO\InteressadosDTO as CadastroDTO;
use TrilhosDorioCadastro\LO\InteressadosLO as  CadastroLO;
use TrilhosDorioCadastro\BL\{ManterInteressado as ManterBL,ControleAcesso};
require '../StartLoader/autoloader.php';

$usuario=null;
$usuario=isset($_SESSION["usuario"])?$_SESSION["usuario"]:null;
$Controle = new ControleAcesso();
$InteressadosLt = new ManterBL();
$ListInteressados = new CadastroLO();
$TotaisDeInteressados=$InteressadosLt->ListarTotais();
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
<link href=\"css/estilos.css\" rel=\"stylesheet\">

<!--Javascript -->
<script src=\"js/jquery-3.2.1.min.js\"></script>
<script src=\"js/bootstrap.min.js\"></script>
<script type=\"text/javascript\" src=\"https://www.google.com/jsapi\"></script>

<script type=\"text/javascript\">
google.load('visualization', '1.0', {'packages':['corechart']});
google.setOnLoadCallback(function(){
  var json_text = $.ajax({url: \"../Common/GerarGraficos.php\", dataType:\"json\", async: false}).responseText;
  var json = eval(\"(\" + json_text + \")\");
  var dados = new google.visualization.DataTable(json.dados);

  var chart = new google.visualization.BarChart(document.getElementById('area_grafico'));
  chart.draw(dados, json.config);
});
</script>
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
        <a class=\"nav-link\" href=\"Associados.php\">Associados </a>
      </li>
      <li class=\"nav-item active\">
      <a class=\"nav-link\" href=\"ListarInteressados.php\">Interessados </a>
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
  <div class=\"col\">
  <h1>Últimos associados cadastrados</h1>
  </div>
  <div class=\"col\">
  <h1>Dados gerais estátisticos</h1>
  </div>
  </div>
  <div class=\"row\">
    <div class=\"col\">";
echo $paginaPart1;
echo "
<div class=\"table-responsive\">
<table class=\"table table-bordered table-striped \">";
$ListInteressados=$InteressadosLt->ListarInteressadosRecentes();
foreach ($ListInteressados->getInteressados()as $interessado) {   
    echo "<tr><td> <a href=\"DadosInteressado.php?id_interessado=".$interessado->id_interessado."\" >".$interessado->nome." ".$interessado->sobrenome."</a></td></tr>";
  } 	
$paginaParte2=" </table>
  </div>
</div>
<div class=\"col\">
";
$paginaPart3="
</div>
</div>
</div></body></html>";
echo $paginaParte2;
  echo "
  <div id=\"Qualificacao\">
 <h4>Total de cadastrados:</h4>
 <span class=\"TextoTotais\">{$TotaisDeInteressados}</span>
 </div>";
//echo " <div id=\"area_grafico\"></div>";
 $teste=$InteressadosLt->ObterInteressesDosInteressados();

$arr = array_keys($teste);
echo "<div class=\"table-responsive\"><table class=\"table table-bordered table-striped \">";
for($i=0;count($teste)>$i;$i++){
  $valor= $teste[$arr[$i]];

  echo "<tr><td>".$valor[0]."</td>"."<td>".$valor[1]."</td></tr>";

}
echo "</table></div>";


echo $paginaPart3;
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