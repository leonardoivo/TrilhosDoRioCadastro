<?php 
use TrilhosDorioCadastro\LO\{CadastroAssociadoLO as  CadastroLO,TipoPagamentoLO,OrigemAssociadoLO};
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL,ControleAcesso,ManterPagamento};
require 'StartLoader/autoloader.php';
$Controle = new ControleAcesso();
$AssociadosLt = new ManterBL();
$ListOrigem = new OrigemAssociadoLO();
$listTipoPag = new TipoPagamentoLO();
$Pagamento = new ManterPagamento();

$ListOrigem =$AssociadosLt->ListarOrigens();
$listTipoPag=$Pagamento->ListarTiposPagamentos();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="View/img/favicon.png" />

    <!-- CSS-->
    <link rel="stylesheet" type="text/css" media="screen" href="View/css/bootstrap.min.css" />
    <link href="View/css/estilos.css" rel="stylesheet">

    <script src="View/js/BuscaEndereco.js"></script>
    <script src="View/js/validacoes.js"></script>
    <script src="View/js/jquery-3.2.1.min.js"></script>
    <script src="View/js/bootstrap.min.js"></script>
    <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
    <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6Lej6i0aAAAAAPxrkkVYcowflq4iedQLrDi7J0me'
        });
      };
    </script>
</head>
<img src="View/img/titulo01.png">
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <a class="navbar-brand" href="http://www.trilhosdorio.com.br">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
     <span class="navbar-toggler-icon"></span>
   </button>
    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="http://www.trilhosdorio.com.br" onclick='location.replace("http://www.trilhosdorio.com.br")'>voltar</a>
            </li>
        </ul>
    </div>
</nav>
<h2>Cadastro de Associado - Trilhos do Rio</h2>
<div class="container">
    <form name="cadastrar" method="post" action="View/Cadastro.php" id="Cadastro" onsubmit="validaFormAssociado(); return false;">
        <input type="hidden" name="editar" value="false">
        <input type="hidden" name="nomepagina" value="Cadastro.php">

        <div class="form-row">

            <div class="form-group col-md-2">
                <label for="inputCPF" class="Subtitulos">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" onkeypress='return SomenteNumero(event)'>
            </div>

            <div class="form-group col-md-6">
                <label for="inputNome" class="Subtitulos">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" name="nome">
            </div>

            <div class="form-group col-md-6">
                <label for="inputSobrenome" class="Subtitulos">Sobrenome</label>
                <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome">
            </div>

            <div class="form-group col-md-2" class="Subtitulos">
                <label for="inputDataNasciment" class="Subtitulos">Data de Nascimento</label>
                <input type="date" class="form-control" name="dataNascimento" id="dataNascimento">
            </div>
        </div>
        <div class="form-row">
               <div class="form-group col-md-6">
                         <label for="inputSexo" class="Subtitulos">Sexo:</label>
                     <div class="form-check form-check-inline">
                         <input class="form-check-input" type="radio" name="sexo" value="M"id="gridCheck">
                         <label class="form-check-label" for="gridCheck">Masculino</label>
                      </div>
                       <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="sexo" value="F" id="gridCheck">
                          <label class="form-check-label" for="gridCheck">Feminino</label>
                      </div>
                 </div>
         </div>
        <div class="form-row">

            <div class="form-group col-md-1" class="Subtitulos">
                <label for="inputNaturalidade">Naturalidade</label>
                <input type="text" class="form-control" name="Naturalidade" id="Naturalidade">
            </div>

            <div class="form-group col-md-6">
                <label for="inputEmail4" class="Subtitulos">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>

            <div class="form-group col-md-2">
                <label for="inputTelefone" class="Subtitulos">Telefone</label>
                <input type="text" class="form-control" name="telefone" id="telefone" onkeypress='return SomenteNumero(event)'>
            </div>

            <div class="form-group col-md-6">
                <label for="inputMae" class="Subtitulos">Nome da mãe</label>
                <input type="text" class="form-control" id="mae" name="mae" placeholder="Nome da mãe">
            </div>

            <div class="form-group col-md-6">
                <label for="inputMae" class="Subtitulos">Nome do Pai</label>
                <input type="text" class="form-control" id="pai" name="pai" placeholder="Nome do pai">
            </div>

            <div class="form-group col-md-2">
                <label for="inputCEP" class="Subtitulos">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" onblur="pesquisacep(this.value);" onkeypress='return SomenteNumero(event)'>
            </div>
            <div class="form-group  col-md-6">
                <label for="inputAddress" class="Subtitulos">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco">
            </div>

            <div class="form-group col-md-1">
                <label for="inputNumero" class="Subtitulos">Numero</label>
                <input type="text" class="form-control" name="numero" id="numero" onkeypress='return SomenteNumero(event)'>
            </div>
            <div class="form-group col-md-1">
                <label for="inputComplemento" class="Subtitulos">Complemento</label>
                <input type="text" class="form-control" name="Complemento" id="Complemento" onkeypress='return SomenteNumero(event)'>
            </div>
            <div class="form-group col-md-6">
                <label for="inputBairro" class="Subtitulos">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Apartamento, hotel, casa, etc.">
            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="inputCity" class="Subtitulos">Cidade</label>
                <input type="text" class="form-control" name="cidade" id="cidade">
            </div>

            <div class="form-group col-md-1">
                <label for="inputEstado" class="Subtitulos">Estado</label>
                <input type="text" id="uf" name="uf" class="form-control">
            </div>

            <div class="form-group col-md-2">
                <label for="inputPais" class="Subtitulos">Pais</label>
                <input type="text" class="form-control" name="Pais" id="Pais">
            </div>

        </div>
        <p>Da lista abaixo, selecione a ação que acha mais interessante promovida pela AF Trilhos do Rio*
        </p>
        <div class="form-row">
            <fieldset>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="interesses[]" value="Caminhadas e Expedições de pesquisa e reconhecimento ferroviário" id="gridCheck">
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
                    <input class="form-check-input" type="checkbox" name="interesses[]" value="Propostas e sugestões de projetos ferroviários e de mobilidade" id="gridCheck">
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
        </div>  <div class="form-group">
      
      <div class="form-row"> <fieldset>

          <label for="inputOrigem" class="Subtitulos">Como você nos connheceu?</label> 
             <select class="form-select" aria-label="Default select example" name="id_origem">
               <?
                 foreach($ListOrigem->getOrigemAssociados() as $origem){
                 echo " <option value=\"{$origem->id_origem}\">{$origem->Origem}</option>";
                }             
               ?>
            </select>
            </fieldset>

    </div>
    <div class="form-row"><fieldset>

           <label for="inputDoacoes" class="Subtitulos">Se puder, contribua conosco para manutenção do nosso trabalho e luta:</label>
           <select class="form-select" aria-label="Default select example" name="tipoPagamento">
              <?
                foreach($listTipoPag->getTipoPagamentos() as $tipopag){
                echo "<option value=\"{$tipopag->idTipoPagamento}\">{$tipopag->nomeTipoPag}</option>";
      
                }
       
               ?>
          </select>                  </fieldset>

     </div>
</div>

      <div class="form-group">
      <!-- <div class="g-recaptcha" data-sitekey="6Lej6i0aAAAAAPxrkkVYcowflq4iedQLrDi7J0me"></div>
      </div> -->

      <div class="form-group col-md-6">
           <div id="html_element"></div>
          </div>

         <div class="form-group col-md-6">
            <button type="submit" class="btn btn-dark" onsubmit="validaFormAssociado(); return false;">Salvar</button>
         </div>
      </div>
      
      
  </form>
  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
  async defer>
</script>
</div>


</body>

</html>