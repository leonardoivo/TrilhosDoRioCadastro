<?php
use TrilhosDorioCadastro\DTO\{CadastroAssociadoDTO as CadastroDTO,DadoBancarioJV_DTO,CartaoCreditoDTO};
use TrilhosDorioCadastro\LO\{CadastroAssociadoLO as  CadastroLO,DadoBancarioJV_LO,CartaoCreditoLO};
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL,ControleAcesso,ManterPagamento};
require '../StartLoader/autoloader.php';
//$pagina="CadDadosBancarios.php";
$Redirecionamento = new ControleAcesso();
$cpf=$_REQUEST['cpf'];
$cpfUser="";
$id_associado=0;
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
$AssociadosLt = new ManterBL();
$ListAssociados = new CadastroLO();
$DadoPagamento = new ManterPagamento();

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
   $idTipoPagamento=$associado->idTipoPagamento;
   $id_associado=$associado->id_associado;
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
  echo "Poupança<input";
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
<a href="Associados.php">Voltar</a>

</body>
</html>