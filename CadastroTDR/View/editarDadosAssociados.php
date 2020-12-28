<?php
use TrilhosDorioCadastro\DTO\{CadastroAssociadoDTO as CadastroDTO,DadoBancarioJV_DTO,CartaoCreditoDTO,BancoDTO,TipoPagamentoDTO};
use TrilhosDorioCadastro\LO\{CadastroAssociadoLO as  CadastroLO,DadoBancarioJV_LO,CartaoCreditoLO,BancoLO,TipoPagamentoLO};
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL,ControleAcesso,ManterPagamento};
require '../StartLoader/autoloader.php';
//$pagina="CadDadosBancarios.php";
$Redirecionamento = new ControleAcesso();
$AssociadosLt = new ManterBL();
$ListAssociados = new CadastroLO();
$DadoPagamento = new ManterPagamento();
$ListdadoCard = new CartaoCreditoLO();
$listTipoPag= new TipoPagamentoLO();
$listBanco= new BancoLO();
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
  }




?>

<!DOCTYPE html>
<head>
<script src="js/BuscaEndereco.js?>"></script>
<meta charset="iso-8859-1?>">
    <link rel="stylesheet" href="css/style.css" media="all" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js?>"></script>

</head>
<body>
<html>
<img src="img/titulo01.png" >
	<h1>Cadastro</h1>
<div class="container?>">
<form name="cadastrar" method="post" action="Cadastro.php?>">
<table   cellspacing="0" cellpadding="0?>">
<tr>
	<td>
CPF:<input type="text" id="campoCPF" maxlength="11" name="cpf" value="<? echo $cpfUser;?>"></td>
<td>CEP: <input type="text" name="cep" id="campoCEP" value="<? echo $CEP;?>" onblur="pesquisacep(this.value);" ></td>
</tr>
<tr><td>Nome:<input type="text" name="nome" value="<? echo $nome;?>"></td><td> Sobrenome: <input type="text" name="sobrenome" value="<? echo $sobrenome;?>"></td></tr>
<tr><td>Endereço:<input type="text" name="endereco" id="endereco" value="<? echo $Endereco;?>"></td><td>Numero:<input type="text" id="campoNumero" name="numero" value="<? echo $numero;?>"></td><td> Complemento: <input type="text" id="campoComplemento" name="Complemento" value="<? echo $Complemento;?>"></td></tr>
<tr><td> Bairro:<input type="text" name="bairro" id="bairro" value="<? echo $bairro;?>"></td><td>Cidade: <input type="text" name="cidade" id="cidade" value="<? echo $cidade;?>"> </td><td>Estado: <input type="text" name="uf" id="uf" value="<? echo $estado;?>"> </td><td>Pais: <input type="text" name="Pais" value="<? echo $Pais;?>"> </td></tr>
<tr><td>Data de Nascimento <input type="date" name="dataNascimento" value="<? echo $DataDeNascimento;?>"></td><td> Naturalidade: <input type="text" id="campoNaturalidade" name="Naturalidade" value="<? echo $Naturalidade;?>"> </td></tr>
<tr><td>Email:<input type="text" name="email" value="<? echo $Email?>"></td></tr>


<tr><td>Telefone:<input type="text" name="campoTelefone" value="<? echo $Telefone;?>"></td></tr>
<tr><td>  <fieldset>
	  <label>Pesquisa: <input type="checkbox" name="interesses[]" value="Pesquisa"/> </label>
	  <label>Historia: <input type="checkbox" name="interesses[]" value="Historia"/> </label>
	  <label>Expedicões: <input type="checkbox" name="interesses[]" value="Expedicões" checked="checked"/> </label>
	  </fieldset></td></tr>
    <tr><td>

<?

$listTipoPag=$DadoPagamento->ListarTiposPagamentos();
$meio="";
echo "<select name=\"tipoPagamento\" onchange=\"this.form.submit()\" onchange=\"this.form.submit()\">";
foreach($listTipoPag->getTipoPagamentos() as $tipoPag){
?>
    <option value="<? echo $tipoPag->idTipoPagamento ?>" <?=($tipoPag->idTipoPagamento == $idTipoPagamento )?'selected':''?> ><? echo $tipoPag->nomeTipoPag;?></option> 

<?

$meio=$tipoPag->idTipoPagamento;

    
}
echo "</select>";
echo "</tr></td>";

switch($idTipoPagamento){
  case 1:
    echo "sem dados financeiros cadastrados";
    break;
  case 2:
  
  $listDadoBancario = new DadoBancarioJV_LO();
  $listDadoBancario= $DadoPagamento->ListarDadosBancariosPorID($id_associado);
  foreach($listDadoBancario->getDadosBancario() as $dadobancarioDT){


    echo "<th>Debito em conta</th>";
    echo "<tr><td><input type=\"hidden\" name=\"envio\" value=\"{$idTipoPagamento}\"></td>";

    echo "<tr><td>Banco:";
    $listBanco=$DadoPagamento->ListarTodosOsBancos();
    
    echo "<select name=\"banco\"  >";
    foreach($listBanco->getBancos() as $banco){
      ?>
      <option value= "<?echo $banco->idbanco; ?>" <?=($banco->nomebanco == $dadobancarioDT->nomebanco)?'selected':'' ?> ><? echo $banco->nomebanco;?></option>"; 

      <?
    }
    echo "</select> </td>";
    echo" <td>  <fieldset>";

   if($dadobancarioDT->tipoconta){
    echo"Corrente <input type=\"radio\" name=\"tipoconta\" id=\"1\" value=\"1\" checked >";
     echo"Poupança<input type=\"radio\" name=\"tipoconta\" id=\"2\" value=\"2\" >";
   }
   else{
     echo"Corrente <input type=\"radio\" name=\"tipoconta\" id=\"1\" value=\"1\" >";
     echo"Poupança<input type=\"radio\" name=\"tipoconta\" id=\"2\" value=\"2\" checked>";
   }
   echo" </fieldset></td></tr>";
    echo "<td>Agencia:<input type=\"text\" name=\"agencia\" value=\"{$dadobancarioDT->numeroagencia}\"></td>";
    echo "<td>Conta:<input type=\"text\" name=\"conta\"  value=\"{$dadobancarioDT->numeroconta}\"></td>";
    echo "<td>Digito:<input type=\"text\" name=\"digito\" value=\"{$dadobancarioDT->digitoconta}\"></td></tr>";
  }
     break;
  case 3:
    $ListdadoCard = $DadoPagamento->BuscarCartaoPorAssociado($id_associado);
    foreach($ListdadoCard->getCartaoCredito() as $dadosCartaoDT){
      echo "<th>Cartao de Credito</th>";
      echo "<tr><td>bandeira:<input type=\"text\" name=\"bandeira\" value=\"{$dadosCartaoDT->bandeira}\"></td>";
      echo "<td>numeroCartao:<input type=\"text\" name=\"numeroCartao\" value=\"{$dadosCartaoDT->numeroCartao}\"></td>";
      echo "<td>Titular:<input type=\"text\" name=\"Titular\" value=\"{$dadosCartaoDT->Titular}\"></td>";
      echo "<td>dataDeValidade:<input type=\"text\" name=\"dataDeValidade\" value=\"{$dadosCartaoDT->dataDeValidade}\"></td></tr>";
      echo "<td>codigo:<input type=\"text\" name=\"codigo\" value=\"{$dadosCartaoDT->codigo}\"></td></tr>";
    }
   
     break;
  case 4:
     break;
  case 5:
     break;
  }
?>
    <tr><td><div class="my_content_container "><input type="submit" value="cadastrar"></div></td> <td><input type="button" onclick="location.href='Associados.php';" value="Voltar" /></td></tr>
</table>

</form>

</body>

</html>