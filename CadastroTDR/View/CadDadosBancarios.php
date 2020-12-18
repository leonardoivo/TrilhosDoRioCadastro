<?php
use TrilhosDorioCadastro\DTO\{CadastroAssociadoDTO as CadastroDTO,CartaoCreditoDTO,AgenciaBancariaDTO,BancoDTO,TipoPagamentoDTO,ContaDTO};
use TrilhosDorioCadastro\LO\{CadastroAssociadoLO as  CadastroLO,CartaoCreditoLO,BancoLO,AgenciaBancariaLO,TipoPagamentoLO,ContaLO};
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL,ControleAcesso, ManterAssociado, ManterPagamento};
require '../autoloader.php';


$Redirecionamento = new ControleAcesso();
$Pagamento = new ManterPagamento();
$associado = new ManterBL();


$pagina="CadDadosBancarios.php";
$cpf=empty($_REQUEST['cpf'])?0:$_REQUEST['cpf'];
$idbanco=0;
$id_associado=empty($_REQUEST['id_associado'])?0:$_REQUEST['id_associado'];
$tipoPagamentoenvio=empty($_REQUEST['envio'])?0:$_REQUEST['envio'];
$tipoPagamento=0;
if(isset($_POST['tipoPagamento'])){
    $tipoPagamento= $_POST['tipoPagamento'];
}
if(isset($cpf)&&($id_associado==0)){
    $id_associado=$associado->BuscarIDAssociadoCPF($cpf);

}

?>

<!DOCTYPE html>
<head>


</head>
<body>
<html>
	<h1>Formas de Doação</h1>
<div class="container">

<form name="cadDadosBancarios" method="post" action="<?php echo $_SERVER['PHP_SELF']  ?>"   >
<table   cellspacing="0" cellpadding="0">
<tr><td>

<?
$listTipoPag= new TipoPagamentoLO();
$listTipoPag=$Pagamento->ListarTiposPagamentos();
$meio="";
echo "<select name=\"tipoPagamento\" onchange=\"this.form.submit()\" onchange=\"this.form.submit()\">";
foreach($listTipoPag->getTipoPagamentos() as $k=>$tipoPag){

    echo "<option value=\"$tipoPag->idTipoPagamento\" >".$tipoPag->nomeTipoPag."</option>"; 

$meio=$tipoPag->idTipoPagamento;

    
}
echo "</select>";?>



</td></tr>  
<?

    echo "<tr><td><input type=\"hidden\" name=\"id_associado\" value=\"{$id_associado}\"></td>";

switch($tipoPagamento){
case 1:
    echo "<th>Debito em conta</th>";
    echo "<tr><td><input type=\"hidden\" name=\"envio\" value=\"{$tipoPagamento}\"></td>";

    echo "<tr><td>Banco:";
    $listBanco= new BancoLO();
    $listBanco=$Pagamento->ListarTodosOsBancos();
    
    echo "<select name=\"banco\"  >";
    foreach($listBanco->getBancos() as $banco){
        echo "<option value=\"$banco->idbanco\" >".$banco->nomebanco."</option>"; 
    }
    echo "</select> </td>";
   echo" <td>  <fieldset>";
   echo"Corrente <input type=\"radio\" name=\"tipoconta\" id=\"1\" value=\"1\" >";
   echo"Poupança<input type=\"radio\" name=\"tipoconta\" id=\"2\" value=\"2\" >";
   echo" </fieldset></td></tr>";
   
    echo "<td>Agencia:<input type=\"text\" name=\"agencia\"></td>";
    echo "<td>Conta:<input type=\"text\" name=\"conta\"></td>";
    echo "<td>Digito:<input type=\"text\" name=\"digito\"></td></tr>";

break;
case 2:
   // $tipoPagamento=2;
   // $tipoPagamentoenvio=$tipoPagamento;    
    echo "<th>Cartao de Credito</th>";
    echo "<tr><td><input type=\"hidden\" name=\"envio\" value=\"{$tipoPagamento}\"></td>";
    echo "<tr><td>bandeira:<input type=\"text\" name=\"bandeira\"></td>";
    echo "<td>numeroCartao:<input type=\"text\" name=\"numeroCartao\"></td>";
    echo "<td>Titular:<input type=\"text\" name=\"Titular\"></td>";
    echo "<td>dataDeValidade:<input type=\"text\" name=\"dataDeValidade\"></td></tr>";
    echo "<td>codigo:<input type=\"text\" name=\"codigo\"></td></tr>";
 break;

}

?>
<tr></tr>
<tr></tr>
<tr></tr>
</table>
<input type="submit" text="enviar">

</form>

</body>

</html>

<?
switch($tipoPagamentoenvio){
case 1:
    if(!empty($_POST['conta'])){ $agenciaDTO = new AgenciaBancariaDTO();
        $agenciaDTO->idbanco=$_POST['banco'];
        $agenciaDTO->nomeagencia=$_POST['agencia'];
        $agenciaDTO->numeroagencia=$_POST['agencia'];
        
        $ContaDT = new ContaDTO();
        $ContaDT->tipoconta=$_POST['tipoconta'];
        $ContaDT->numeroconta=$_POST['conta'];
        $ContaDT->digitoconta=$_POST['digito'];
        $ContaDT->id_associado=$id_associado;
        $pagDebito= new  ManterPagamento($id_associado,$tipoPagamentoenvio,$ContaDT,$agenciaDTO);
        $pagDebito->CadastrarDadosPagamento($tipoPagamentoenvio);
    }
   
break;

case 2:
    if(!empty($_POST['numeroCartao'])){$CartaoDT= new CartaoCreditoDTO();
        $CartaoDT->bandeira=$_POST['bandeira'];
        $CartaoDT->numeroCartao=$_POST['numeroCartao'];
        $CartaoDT->Titular=$_POST['Titular'];
        $CartaoDT->dataDeValidade=$_POST['dataDeValidade']; 
        $CartaoDT->codigo=$_POST['codigo'];
        $CartaoDT->id_associado=$id_associado;
    
        $pagCredito= new  ManterPagamento($id_associado,$tipoPagamentoenvio,$CartaoDT);
        $pagCredito->CadastrarDadosPagamento($tipoPagamentoenvio);
    }
    
break;


}


?>