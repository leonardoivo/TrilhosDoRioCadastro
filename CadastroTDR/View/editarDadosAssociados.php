<?php
use TrilhosDorioCadastro\DTO\CadastroAssociadoDTO as CadastroDTO;
use TrilhosDorioCadastro\LO\CadastroAssociadoLO as  CadastroLO;
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL,ControleAcesso};
require '../StartLoader/autoloader.php';
//$pagina="CadDadosBancarios.php";
$Redirecionamento = new ControleAcesso();
$id_associado=$_REQUEST['id_associado'];
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

$AssociadosLt = new ManterBL();
$ListAssociados = new CadastroLO();
$ListAssociados=$AssociadosLt->ListarAssociadoID($id_associado);
foreach ($ListAssociados->getCadastroAssociados() as  $associado) {
    
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
      <tr><td><div class="my_content_container "><input type="submit" value="cadastrar"></div></td> <td><input type="button" onclick="location.href='Associados.php';" value="Voltar" /></td></tr>
</table>

</form>

</body>

</html>