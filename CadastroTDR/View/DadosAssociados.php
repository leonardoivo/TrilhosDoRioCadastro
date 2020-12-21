<?php
use TrilhosDorioCadastro\DTO\CadastroAssociadoDTO as CadastroDTO;
use TrilhosDorioCadastro\LO\CadastroAssociadoLO as  CadastroLO;
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL,ControleAcesso};
require '../autoloader.php';
//$pagina="CadDadosBancarios.php";
$Redirecionamento = new ControleAcesso();
$cpf=$_REQUEST['cpf'];
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
$ListAssociados=$AssociadosLt->ListarAssociadoPorCPF($cpf);
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

  }



?>

<!DOCTYPE html>
<html><head>
</head><body>
<table >
<tr>	<td>
CPF:<? echo $cpfUser; ?></td>
</tr>
<tr><td>Nome:<? echo $nome; ?></td><td> Sobrenome: <? echo $sobrenome; ?></td></tr>
<tr><td>Endereço:<? echo $Endereco; ?></td><td>Numero:<? echo $numero; ?></td><td> Complemento: <? echo $Complemento; ?></td><td>CEP: <? echo $CEP; ?></td></tr>
<tr><td> Bairro:<? echo $bairro; ?></td><td>Cidade: <? echo $cidade; ?> </td><td>Estado: <? echo $estado; ?></td><td>Pais: <? echo $Pais; ?> </td></tr>
<tr><td>Data de Nascimento <? echo $DataDeNascimento; ?></td><td> Naturalidade: <? echo $Naturalidade; ?></td></tr>
<tr><td>Email:<? echo $Email; ?></td><td>Telefone:<? echo $Telefone;?></td></tr>



</table>
<a href="Associados.php">Voltar</a>

</body>
</html>