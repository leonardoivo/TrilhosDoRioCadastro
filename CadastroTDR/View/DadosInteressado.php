<?php
use TrilhosDorioCadastro\DTO\InteressadoDTO as InteressadoDTO;
use TrilhosDorioCadastro\LO\InteressadosLO;
use TrilhosDorioCadastro\BL\{ManterInteressado as ManterBL,ControleAcesso};
require '../StartLoader/autoloader.php';
//$pagina="CadDadosBancarios.php";
$Redirecionamento = new ControleAcesso();
$id_interessado=$_REQUEST['id_interessado'];
$Telefone="";
$idTipoPagamento=0;
$interesses="";
$InteressadosLt = new ManterBL();
$ListInteressados = new InteressadosLO();

$ListInteressados=$InteressadosLt->ListarInteressadosID($id_interessado);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="shortcut icon" href="img/favicon.png" />

<meta name="viewport" content="width=device-width, initial-scale=1" /> 
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
         <a class="nav-link" href="Interessados.php" onclick='location.replace("index.php")'>voltar</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="Interessados.php?saida=1" onclick='location.replace("../login.html")'>Sair</a>
       </li>
     </ul>
    
   </div>
 </nav>
<div class="container">
<h1>Dados do Interessado</h1>
<table class="table">
<?
foreach ($ListInteressados->getInteressadoInteressados()as $k => $associado) {
   
   $idTipoPagamento=$associado->idTipoPagamento;
   $id_interessado=$associado->id_interessado;
   $interesses=$associado->interesses;
   ?>
<tr>	<td>
   CPF:<? echo $associado->cpf; ?></td>
   </tr>
   <tr><td >Nome:<? echo $associado->nome; ?></td><td> Sobrenome: <? echo $associado->sobrenome; ?></td></tr>
   <tr><td>Email:<? echo $associado->email; ?></td><td>Telefone:<? echo $associado->telefone;?></td></tr>
   <?
  }
?>
</table>
<ul>
<?
foreach(explode(",",$interesses) as $item){
  echo "<li>".$item."</li>";
}
?>
</ul>
<a href="Interessados.php">Voltar</a>
</div>
</body>
</html>