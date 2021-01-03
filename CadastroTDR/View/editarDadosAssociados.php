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
$nomePai="";
$nomeMae="";


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

    <script src="js/BuscaEndereco.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>
    <img src="img/titulo01.png">
    <input type="hidden" name="editar" value="true">

 <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
   <a class="navbar-brand" href="index.php">Home</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
     <ul class="navbar-nav mr-auto">
     <li class="nav-item active">
         <a class="nav-link" href="CadastroIn.html" onclick='location.replace("CadastroIn.html")'>Cadastrar Novo Associado</a>
       </li>
     <li class="nav-item active">
         <a class="nav-link" href="Associados.php" onclick='location.replace("Associados.php")'>voltar</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="Associados.php?saida=1" onclick='location.replace("../login.html")'>Sair</a>
       </li>   
     </ul>   
   </div>
 </nav>  
    <h2>Alterar Associado</h2>
<div class="container">
<form name="cadastrar" method="post" action="Cadastro.php"  id="Cadastro" onsubmit="validaFormAssociado(); return false;">
<input type="hidden" name="id_associado" value="<? echo $id_associado;?>">
<input type="hidden" name="editar" value="true">

  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputCPF">CPF</label>
      <input type="text" class="form-control" id="cpf"  value="<? echo $cpfUser;?>" name="cpf">
    </div>
    <div class="form-group col-md-6">
      <label for="inputNome">Nome</label>
      <input type="text" class="form-control" id="inputNome" name="nome" value="<? echo $nome;?>" placeholder="Nome" name="nome">
    </div>
      <div class="form-group col-md-6">
      <label for="inputSobrenome">Sobrenome</label>
      <input type="text" class="form-control" id="inputSobrenome"  name="sobrenome" value="<? echo $sobrenome;?>" placeholder="Sobrenome">
    </div>
     <div class="form-group col-md-2">
      <label for="inputDataNascimento">Data de Nascimento</label>
      <input type="date" class="form-control" name="dataNascimento" value="<? echo $DataDeNascimento;?>" id="inputDataNascimento">
    </div>
     </div>
       <div class="form-row">

      <div class="form-group col-md-1">
      <label for="inputNaturalidade">Naturalidade</label>
      <input type="text" class="form-control"  name="Naturalidade" value="<? echo $Naturalidade;?>" id="inputNaturalidade">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email" value="<? echo $Email?>" placeholder="Email">
    </div>
     <div class="form-group col-md-2">
      <label for="inputTelefone">Telefone</label>
      <input type="text" class="form-control" name="telefone" value="<? echo $Telefone;?>" id="inputTelefone">
    </div>
    <div class="form-group col-md-6">
      <label for="inputMae">Nome da mãe</label>
      <input type="text" class="form-control" id="inputMae" name="mae" placeholder="Nome da mãe" value="<? echo $nomeMae;?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputMae">Nome do Pai</label>
      <input type="text" class="form-control" id="inputPai" name="pai" placeholder="Nome do pai" value="<? echo $nomePai;?>">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCEP">CEP</label>
      <input type="text" class="form-control" id="inputCEP" name="cep"  value="<? echo $CEP;?>" onblur="pesquisacep(this.value);">
    </div>
  <div class="form-group  col-md-6">
    <label for="inputAddress">Endereço</label>
    <input type="text" class="form-control" id="endereco" value="<? echo $Endereco;?>" name="endereco">
  </div>
  <div class="form-group col-md-1">
      <label for="inputNumero">Numero</label>
      <input type="text" class="form-control"  name="numero" value="<? echo $numero;?>" id="inputNumero">
  </div>
  <div class="form-group col-md-1">
      <label for="inputComplemento">Complemento</label>
      <input type="text" class="form-control" name="Complemento" value="<? echo $Complemento;?>" id="inputComplemento">
   </div>
 </div>  
  <div class="form-group col-md-6">
    <label for="inputBairro">Bairro</label>
    <input type="text" class="form-control" id="bairro" name="bairro" value="<? echo $bairro;?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Cidade</label>
      <input type="text" class="form-control" name="cidade" value="<? echo $cidade;?>" id="cidade">
    </div>
    <div class="form-group col-md-1">
      <label for="inputEstado">Estado</label>
     <input type="text" id="uf" name="uf" value="<? echo $estado;?>" class="form-control">

    </div> 
    <div class="form-group col-md-2">
      <label for="inputPais">Pais</label>
      <input type="text" class="form-control" name="Pais"   value="<? echo $Pais;?>" id="inputPais">
    </div>
  </div>
  <div class="form-row">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="interesses[]" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Pesquisa
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="interesses[]" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Historia
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox"name="interesses[]"  id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Expedicões
      </label>
    </div>
   </div>
   

 </div>



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
echo "";

switch($idTipoPagamento){
  case 1:
    echo "sem dados financeiros cadastrados";
    break;
  case 2:
  
  $listDadoBancario = new DadoBancarioJV_LO();
  $listDadoBancario= $DadoPagamento->ListarDadosBancariosPorID($id_associado);
  foreach($listDadoBancario->getDadosBancario() as $dadobancarioDT){


    echo "<h3>Debito em conta</h3>";
    echo "<input type=\"hidden\" name=\"envio\" value=\"{$idTipoPagamento}\">";

    echo "Banco:";
    $listBanco=$DadoPagamento->ListarTodosOsBancos();
    
    echo "<select name=\"banco\"  >";
    foreach($listBanco->getBancos() as $banco){
      ?>
      <option value= "<?echo $banco->idbanco; ?>" <?=($banco->nomebanco == $dadobancarioDT->nomebanco)?'selected':'' ?> ><? echo $banco->nomebanco;?></option>"; 

      <?
    }
    echo "</select> ";
    echo"   <fieldset>";

   if($dadobancarioDT->tipoconta){
    echo"Corrente <input type=\"radio\" name=\"tipoconta\" id=\"1\" value=\"1\" checked >";
     echo"Poupança<input type=\"radio\" name=\"tipoconta\" id=\"2\" value=\"2\" >";
   }
   else{
     echo"Corrente <input type=\"radio\" name=\"tipoconta\" id=\"1\" value=\"1\" >";
     echo"Poupança<input type=\"radio\" name=\"tipoconta\" id=\"2\" value=\"2\" checked>";
   }
   echo" </fieldset>";
    echo "Agencia:<input type=\"text\" name=\"agencia\" value=\"{$dadobancarioDT->numeroagencia}\">";
    echo "Conta:<input type=\"text\" name=\"conta\"  value=\"{$dadobancarioDT->numeroconta}\">";
    echo "Digito:<input type=\"text\" name=\"digito\" value=\"{$dadobancarioDT->digitoconta}\">";
  }
     break;
  case 3:
    $ListdadoCard = $DadoPagamento->BuscarCartaoPorAssociado($id_associado);
    foreach($ListdadoCard->getCartaoCredito() as $dadosCartaoDT){
      echo "<h3>Cartao de Credito</h3>";
      echo "bandeira:<input type=\"text\" name=\"bandeira\" value=\"{$dadosCartaoDT->bandeira}\">";
      echo "numeroCartao:<input type=\"text\" name=\"numeroCartao\" value=\"{$dadosCartaoDT->numeroCartao}\">";
      echo "Titular:<input type=\"text\" name=\"Titular\" value=\"{$dadosCartaoDT->Titular}\">";
      echo "dataDeValidade:<input type=\"text\" name=\"dataDeValidade\" value=\"{$dadosCartaoDT->dataDeValidade}\">";
      echo "codigo:<input type=\"text\" name=\"codigo\" value=\"{$dadosCartaoDT->codigo}\">";
    }
   
     break;
  case 4:
     break;
  case 5:
     break;
  }
?>
   <div class="form-row">
      <button type="submit" class="btn  btn-dark">Confirmar Edição</button>
   </div>
</div>
</form>
</body>
</html>