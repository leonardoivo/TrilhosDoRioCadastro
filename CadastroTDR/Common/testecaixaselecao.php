<?php
use TrilhosDorioCadastro\DTO\{CadastroAssociadoDTO as CadastroDTO,CartaoCreditoDTO,AgenciaBancariaDTO,BancoDTO,TipoPagamentoDTO};
use TrilhosDorioCadastro\LO\{CadastroAssociadoLO as  CadastroLO,CartaoCreditoLO,BancoLO,AgenciaBancariaLO,TipoPagamentoLO};
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL,ControleAcesso,ManterPagamento};
require '../autoloader.php';

$pagina="CadDadosBancarios.php";
$Redirecionamento = new ControleAcesso();
$Pagamento = new ManterPagamento();
$teste= $_POST['tipoPagamento'];


?>




<script language="javascript">
function submitForm(){
    var val = document.myform.tipoPagamento.value;
    if(val!=-1){
        document.myform.submit();
    }
}
</script>
<form method="post" name="myform" action="<?php echo $_SERVER['PHP_SELF']  ?>" >

    <table class="form">

            <select name="tipoPagamento" class="formfield" id="tipoPagamento" onchange="submitForm();">
                <option value="-1"> Category </option>
                <?
                $listTipoPag= new TipoPagamentoLO();
                $listTipoPag=$Pagamento->ListarTiposPagamentos();
                $meio="";
foreach($listTipoPag->getTipoPagamentos() as $k=>$tipoPag){
    echo '<option value="'.$tipoPag->idTipoPagamento.'">'.$tipoPag->nomeTipoPag.'</option>';  
 
    $meio=$tipoPag->idTipoPagamento;
}

                ?>
             </select>

    </table>

</form>