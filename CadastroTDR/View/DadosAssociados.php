<?php
use TrilhosDorioCadastro\DTO\{CadastroAssociadoDTO as CadastroDTO,DadoBancarioJV_DTO,CartaoCreditoDTO};
use TrilhosDorioCadastro\LO\{CadastroAssociadoLO as  CadastroLO,DadoBancarioJV_LO,CartaoCreditoLO};
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL,ControleAcesso,ManterPagamento};
require '../StartLoader/autoloader.php';
//$pagina="CadDadosBancarios.php";
$Redirecionamento = new ControleAcesso();
$id_associado=$_REQUEST['id_associado'];
$cpf=0;
$cpfUser="";
$nome="";
$numero="";
$bairro="";
$sobrenome="";
$Endereco="";
$Complemento="";
$CEP="";
$Pais="";
$cidade="";
$estado="";
$DataDeNascimento="";
$Naturalidade="";
$Email="";
$Telefone="";
$idTipoPagamento=0;
$nomePai="";
$nomeMae="";
$interesses="";
$AssociadosLt = new ManterBL();
$ListAssociados = new CadastroLO();
$DadoPagamento = new ManterPagamento();

$ListAssociados=$AssociadosLt->ListarAssociadoID($id_associado);
foreach ($ListAssociados->getCadastroAssociados()as $k => $associado) {
   
   $cpfUser=$associado->cpf;
   $nome=$associado->nome;
   $numero=$associado->numero;
   $bairro=$associado->Bairro;
   $sobrenome=$associado->sobrenome;
   $Endereco=$associado->endereco;
   $Complemento=$associado->complemento;
   $CEP=$associado->cep;
   $Pais=$associado->pais;
   $cidade=$associado->Cidade;
   $estado=$associado->Estado;
   $DataDeNascimento=$associado->data_De_nascimento;
   $Naturalidade=$associado->naturalidade;
   $Email=$associado->email;
   $Telefone=$associado->complemento;
   $idTipoPagamento=$associado->idTipoPagamento;
   $id_associado=$associado->id_associado;
   $nomePai=$associado->nomePai;
   $nomeMae=$associado->nomeMae;
   $interesses=$associado->interesses;
  }



?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
<tr>	<td>
CPF:<? echo $cpfUser; ?></td>
</tr>
<tr><td>Nome:<? echo $nome; ?></td><td> Sobrenome: <? echo $sobrenome; ?></td></tr>
<tr><td>Endereço:<? echo $Endereco; ?></td><td>Numero:<? echo $numero; ?></td><td> Complemento: <? echo $Complemento; ?></td><td>CEP: <? echo $CEP; ?></td></tr>
<tr><td> Bairro:<? echo $bairro; ?></td><td>Cidade: <? echo $cidade; ?> </td><td>Estado: <? echo $estado; ?></td><td>Pais: <? echo $Pais; ?> </td></tr>
<tr><td>Nome da mãe:<? echo $nomeMae; ?> </td><td>Nome do pai:<? echo $nomePai; ?></td></tr>
<tr><td>Data de Nascimento <? echo $DataDeNascimento; ?></td><td> Naturalidade: <? echo $Naturalidade; ?></td></tr>
<tr><td>Email:<? echo $Email; ?></td><td>Telefone:<? echo $Telefone;?></td></tr>
<?switch($idTipoPagamento){
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