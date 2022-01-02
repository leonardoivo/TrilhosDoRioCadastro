<?php
use TrilhosDorioCadastro\DTO\{CadastroAssociadoDTO as CadastroDTO,TipoPagamentoDTO};
use TrilhosDorioCadastro\LO\{CadastroAssociadoLO as  CadastroLO,TipoPagamentoLO};
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL,ControleAcesso,ManterPagamento};
require '../StartLoader/autoloader.php';
//$pagina="CadDadosBancarios.php";
$Redirecionamento = new ControleAcesso();
$AssociadosLt = new ManterBL();
$ListAssociados = new CadastroLO();
$DadoPagamento = new ManterPagamento();
$listTipoPag= new TipoPagamentoLO();
$id_associado=$_REQUEST['id_associado'];
$idTipoPagamento=0;
$ListAssociados=$AssociadosLt->ListarAssociadoID($id_associado);
$listTipoPag=$DadoPagamento->ListarTiposPagamentos();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<link rel="shortcut icon" href="img/favicon.png" />
<!-- CSS-->
   <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
   <link href="css/estilos.css" rel="stylesheet">

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
         <a class="nav-link" href="CadastroIn.php" onclick='location.replace("CadastroIn.html")'>Cadastrar Novo Associado</a>
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
<input type="hidden" name="nomepagina" value="editarDadosAssociados.php">


<?
foreach ($ListAssociados->getCadastroAssociados()as $k => $associado) {
  
   $idTipoPagamento=$associado->idTipoPagamento;
   $id_associado=$associado->id_associado;
   $interesses=$associado->interesses;
   ?>
<input type="hidden" name="id_associado" value="<? echo $id_associado;?>">
<input type="hidden" name="editar" value="true">
  <div class="form-row">
  <div class="form-group col-md-2">
    <label for="inputCPF" class="Subtitulos">CPF</label>
    <input type="text" class="form-control" id="cpf"  value="<? echo $associado->cpf;?>" name="cpf">
  </div>
  <div class="form-group col-md-6">
    <label for="inputNome" class="Subtitulos">Nome</label>
    <input type="text" class="form-control" id="inputNome" name="nome" value="<? echo $associado->nome;?>" placeholder="Nome" name="nome">
  </div>
    <div class="form-group col-md-6">
    <label for="inputSobrenome" class="Subtitulos">Sobrenome</label>
    <input type="text" class="form-control" id="inputSobrenome"  name="sobrenome" value="<? echo $associado->sobrenome;?>" placeholder="Sobrenome">
  </div>
   <div class="form-group col-md-2">
    <label for="inputDataNascimento" class="Subtitulos">Data de Nascimento</label>
    <input type="date" class="form-control" name="dataNascimento" value="<? echo $associado->data_De_nascimento;?>" id="inputDataNascimento">
  </div>
   </div>
   <div class="form-row">
               <div class="form-group col-md-6">
                         <label for="inputSexo" class="Subtitulos">Sexo:</label>
                         <?if($associado->sexo=="M"){?>
                     <div class="form-check form-check-inline">
                         <input class="form-check-input" type="radio" name="sexo" value="M"id="gridCheck" checked>
                         <label class="form-check-label" for="gridCheck">Masculino</label>
                      </div>
                       <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="sexo" value="F" id="gridCheck">
                          <label class="form-check-label" for="gridCheck">Feminino</label>
                      </div>
                      <?}else if($associado->sexo=="F"){?>
                      <div class="form-check form-check-inline">
                         <input class="form-check-input" type="radio" name="sexo" value="M"id="gridCheck">
                         <label class="form-check-label" for="gridCheck">Masculino</label>
                      </div>
                       <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="sexo" value="F" id="gridCheck" checked>
                          <label class="form-check-label" for="gridCheck">Feminino</label>
                      </div>
                      <?}else{?>
                        <div class="form-check form-check-inline">
                         <input class="form-check-input" type="radio" name="sexo" value="M"id="gridCheck">
                         <label class="form-check-label" for="gridCheck">Masculino</label>
                      </div>
                       <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="sexo" value="F" id="gridCheck" >
                          <label class="form-check-label" for="gridCheck">Feminino</label>
                      </div>
                   <?}?>

                 </div>
         </div>
     <div class="form-row">

    <div class="form-group col-md-1">
    <label for="inputNaturalidade" class="Subtitulos" class="Subtitulos">Naturalidade</label>
    <input type="text" class="form-control"  name="Naturalidade" value="<? echo $associado->naturalidade;?>" id="inputNaturalidade">
  </div>
  <div class="form-group col-md-6">
    <label for="inputEmail4" class="Subtitulos">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="email" value="<? echo $associado->email?>" placeholder="Email">
  </div>
   <div class="form-group col-md-2">
    <label for="inputTelefone" class="Subtitulos">Telefone</label>
    <input type="text" class="form-control" name="telefone" value="<? echo $associado->telefone;?>" id="inputTelefone">
  </div>
  <div class="form-group col-md-6">
    <label for="inputMae" class="Subtitulos">Nome da mãe</label>
    <input type="text" class="form-control" id="inputMae" name="mae" placeholder="Nome da mãe" value="<? echo $associado->nomeMae;?>">
  </div>
  <div class="form-group col-md-6">
    <label for="inputMae" class="Subtitulos">Nome do Pai</label>
    <input type="text" class="form-control" id="inputPai" name="pai" placeholder="Nome do pai" value="<? echo $associado->nomePai;?>">
  </div>
  <div class="form-group col-md-2">
    <label for="inputCEP" class="Subtitulos">CEP</label>
    <input type="text" class="form-control" id="inputCEP" name="cep"  value="<? echo $associado->cep;?>" onblur="pesquisacep(this.value);">
  </div>
<div class="form-group  col-md-6">
  <label for="inputAddress" class="Subtitulos">Endereço</label>
  <input type="text" class="form-control" id="endereco" value="<? echo $associado->endereco;?>" name="endereco">
</div>
<div class="form-group col-md-1">
    <label for="inputNumero" class="Subtitulos">Numero</label>
    <input type="text" class="form-control"  name="numero" value="<? echo $associado->numero;?>" id="inputNumero">
</div>
<div class="form-group col-md-1">
    <label for="inputComplemento">Complemento</label>
    <input type="text" class="form-control" name="Complemento" value="<? echo $associado->complemento;?>" id="inputComplemento">
 </div>
</div>  
<div class="form-group col-md-6">
  <label for="inputBairro" class="Subtitulos">Bairro</label>
  <input type="text" class="form-control" id="bairro" name="bairro" value="<? echo $associado->Bairro;?>">
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputCity" class="Subtitulos">Cidade</label>
    <input type="text" class="form-control" name="cidade" value="<? echo $associado->Cidade;?>" id="cidade">
  </div>
  <div class="form-group col-md-1">
    <label for="inputEstado" class="Subtitulos">Estado</label>
   <input type="text" id="uf" name="uf" value="<? echo $associado->Estado;?>" class="form-control">

  </div> 
  <div class="form-group col-md-2">
    <label for="inputPais" class="Subtitulos">Pais</label>
    <input type="text" class="form-control" name="Pais"   value="<? echo $associado->pais;?>" id="inputPais">
  </div>
</div>
<p>Da lista abaixo, selecione a ação que acha mais interessante promovida pela AF Trilhos do Rio*</p>

<div class="form-row">
    <fieldset>
      
<?
$interesse = array();
$checked_arr = array();
 foreach(explode(",",$interesses) as $item){

 //echo "<li>".$item."</li>";

array_push($interesse,$item);


}

// foreach($interesse as $language){

//   $checked = "";
//   if(in_array($language,$checked_arr)){
//     $checked = "checked";
//   }
//   echo '<input type="checkbox" name="interesses[]" value="'.$language.'" '.$checked.' > '.$language.' <br/>';
// }



?>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="interesses[]" value="Caminhadas e Expedições de pesquisa e reconhecimento ferroviário"  id="gridCheck">
            <label class="form-check-label" for="gridCheck">
Caminhadas e Expedições de pesquisa e reconhecimento ferroviário
</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="interesses[]" value="Troca de informações e dados ferroviários" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
Troca de informações e dados ferroviários
</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="interesses[]" value="Leitura de livros e publicações históricas e/ou ferroviárias" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
Leitura de livros e publicações históricas e/ou ferroviárias

</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="interesses[]" value="Ferromodelismo" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
Ferromodelismo
</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="interesses[]" value="Historia" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
Ações filantrópicas

</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="interesses[]" value="Produção de material audiovisual com temática histórico-ferroviária" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
Produção de material audiovisual com temática histórico-ferroviária

</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="interesses[]" value="Propostas e sugestões de projetos ferroviários e de mobilidade"  id="gridCheck">
            <label class="form-check-label" for="gridCheck">
Propostas e sugestões de projetos ferroviários e de mobilidade

</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="interesses[]" value="Propostas e sugestões de preservação e restauração histórico-ferroviária" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
Propostas e sugestões de preservação e restauração histórico-ferroviária

</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="interesses[]" value="Outro" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
Outro
</label>
        </div>
    </fieldset>
</div>
</div>

<?}?>
<div class="form-row">
      <label for="inputDoacoes" class="Subtitulos">Se puder, contribua conosco para manutenção do nosso trabalho e luta:</label>
           <select class="form-select" aria-label="Default select example" name="tipoPagamento">
             <?
             foreach($listTipoPag->getTipoPagamentos() as $tipopag){
             echo "<option value=\"{$tipopag->idTipoPagamento}\">{$tipopag->nomeTipoPag}</option>";
            
             }
             
             ?>
              </select>
      </div>
   <div class="form-row">
      <button type="submit" class="btn  btn-dark">Confirmar Edição</button>
   </div>
</div>
</form>
</body>
</html>