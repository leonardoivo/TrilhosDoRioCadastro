<?php
use TrilhosDorioCadastro\DTO\{InteressadosDTO as CadastroDTO};
use TrilhosDorioCadastro\LO\{InteressadosLO as  CadastroLO};
use TrilhosDorioCadastro\BL\{ManterInteressado as ManterBL,ControleAcesso};
require '../StartLoader/autoloader.php';
//$pagina="CadDadosBancarios.php";
$Redirecionamento = new ControleAcesso();
$InteressadosLt = new ManterBL();
$ListInteressados = new CadastroLO();
$id_associado=$_REQUEST['id_associado'];
$idTipoPagamento=0;
$ListInteressados=$InteressadosLt->ListarInteressadosID($id_associado);
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
         <a class="nav-link" href="CadastroIn.php" onclick='location.replace("CadastroIn.html")'>Cadastrar Novo Interessado</a>
       </li>
     <li class="nav-item active">
         <a class="nav-link" href="Interessados.php" onclick='location.replace("Interessados.php")'>voltar</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="Interessados.php?saida=1" onclick='location.replace("../login.html")'>Sair</a>
       </li>   
     </ul>   
   </div>
 </nav>  
    <h2>Alterar Interessado</h2>
<div class="container">
<form name="cadastrar" method="post" action="Cadastro.php"  id="Cadastro" onsubmit="validaFormInteressado(); return false;">
<input type="hidden" name="nomepagina" value="editarDadosInteressados.php">


<?
foreach ($ListInteressados->getCadastroInteressados()as $k => $associado) {
  
   $id_associado=$associado->id_associado;
   $interesses=$associado->interesses;
   ?>
<input type="hidden" name="id_associado" value="<? echo $id_associado;?>">
<input type="hidden" name="editar" value="true">
  <div class="form-row">
 
  <div class="form-group col-md-6">
    <label for="inputNome" class="Subtitulos">Nome</label>
    <input type="text" class="form-control" id="inputNome" name="nome" value="<? echo $associado->nome;?>" placeholder="Nome" name="nome">
  </div>
    <div class="form-group col-md-6">
    <label for="inputSobrenome" class="Subtitulos">Sobrenome</label>
    <input type="text" class="form-control" id="inputSobrenome"  name="sobrenome" value="<? echo $associado->sobrenome;?>" placeholder="Sobrenome">
  </div>
  <div class="form-group col-md-6">
    <label for="inputEmail4" class="Subtitulos">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="email" value="<? echo $associado->email?>" placeholder="Email">
  </div>
   <div class="form-group col-md-2">
    <label for="inputTelefone" class="Subtitulos">Telefone</label>
    <input type="text" class="form-control" name="telefone" value="<? echo $associado->telefone;?>" id="inputTelefone">
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
      <button type="submit" class="btn  btn-dark">Confirmar Edição</button>
   </div>
</div>
</form>
</body>
</html>