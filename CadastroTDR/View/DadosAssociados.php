<?php
use TrilhosDorioCadastro\DTO\{CadastroAssociadoDTO as CadastroDTO,DadoBancarioJV_DTO,CartaoCreditoDTO};
use TrilhosDorioCadastro\LO\{CadastroAssociadoLO as  CadastroLO,DadoBancarioJV_LO,CartaoCreditoLO};
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL,ControleAcesso,ManterPagamento};
require '../StartLoader/autoloader.php';
//$pagina="CadDadosBancarios.php";
$Redirecionamento = new ControleAcesso();
$id_associado=$_REQUEST['id_associado'];
$Telefone="";
$idTipoPagamento=0;
$interesses="";
$AssociadosLt = new ManterBL();
$ListAssociados = new CadastroLO();
$DadoPagamento = new ManterPagamento();

$ListAssociados=$AssociadosLt->ListarAssociadoID($id_associado);
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
         <a class="nav-link" href="Associados.php" onclick='location.replace("index.php")'>voltar</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="Associados.php?saida=1" onclick='location.replace("../login.html")'>Sair</a>
       </li>
     </ul>
    
   </div>
 </nav>
<div class="container">
<h1>Dados do Associado</h1>
<table class="table">
<?
foreach ($ListAssociados->getCadastroAssociados()as $k => $associado) {
   
   $idTipoPagamento=$associado->idTipoPagamento;
   $id_associado=$associado->id_associado;
   $interesses=$associado->interesses;
   ?>
<tr>	<td>
   CPF:<? echo $associado->cpf; ?></td>
   </tr>
   <tr><td>Nome:<? echo $associado->nome; ?></td><td> Sobrenome: <? echo $associado->sobrenome; ?></td></tr>
   <tr><td>Endereço:<? echo $associado->endereco; ?></td><td>Numero:<? echo $associado->numero; ?></td><td> Complemento: <? echo $associado->complemento; ?></td><td>CEP: <? echo $associado->cep; ?></td></tr>
   <tr><td> Bairro:<? echo $associado->Bairro; ?></td><td>Cidade: <? echo $associado->Cidade; ?> </td><td>Estado: <? echo $associado->Estado; ?></td><td>Pais: <? echo $associado->pais; ?> </td></tr>
   <tr><td>Nome da mãe:<? echo $associado->nomeMae; ?> </td><td>Nome do pai:<? echo $associado->nomePai; ?></td></tr>
   <tr><td>Data de Nascimento <? echo $associado->data_De_nascimento; ?></td><td> Naturalidade: <? echo $associado->naturalidade; ?></td></tr>
   <tr><td>Email:<? echo $associado->email; ?></td><td>Telefone:<? echo $associado->telefone;?></td></tr>
   <?
  }
switch($idTipoPagamento){
case 1:
  echo "sem dados financeiros cadastrados";
  break;
case 2:

$listDadoBancario = new DadoBancarioJV_LO();
$listDadoBancario= $DadoPagamento->ListarDadosBancariosPorID($id_associado);
foreach($listDadoBancario->getDadosBancario() as $dadobancarioDT){
  
  echo "<th>Debito em conta</th>";
  echo "<tr><td>Banco:{$dadobancarioDT->nomebanco} </td>";
  echo "<tr><td>Código Bancário:{$dadobancarioDT->codigobancario} </td>";
 echo" <td>  <fieldset>";
 if($dadobancarioDT->tipoconta){
  echo"Corrente";
 }
 else{
  echo "Poupança";
 }
 echo" </fieldset></td></tr>";
  echo "<td>Agencia:{$dadobancarioDT->numeroagencia}</td>";
  echo "<td>Conta:{$dadobancarioDT->numeroconta}</td>";
  echo "<td>Digito:{$dadobancarioDT->digitoconta}</td></tr>";


}
   break;
case 3:
  $ListdadoCard = new CartaoCreditoLO();
  $ListdadoCard = $DadoPagamento->BuscarCartaoPorAssociado($id_associado);
  foreach($ListdadoCard->getCartaoCreditos as $dadosCartaoDT){
    echo "<th>Cartao de Credito</th>";
    echo "<tr><td>bandeira:{$dadosCartaoDT->bandeira}</td>";
    echo "<td>numeroCartao:{$dadosCartaoDT->numeroCartao}</td>";
    echo "<td>Titular:{$dadosCartaoDT->Titular}</td>";
    echo "<td>dataDeValidade:{$dadosCartaoDT->dataDeValidade}</td></tr>";
    echo "<td>codigo:<input{$dadosCartaoDT->codigo}</td></tr>";    
  }
 
   break;
case 4:
   break;
case 5:
   break;
}?>
</table>
<ul>
<?
foreach(explode(",",$interesses) as $item){

  echo "<li>".$item."</li>";

}
?>
</ul>
<a href="Associados.php">Voltar</a>
</div>
</body>
</html>