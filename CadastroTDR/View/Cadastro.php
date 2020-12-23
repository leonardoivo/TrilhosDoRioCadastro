<?php

use TrilhosDorioCadastro\DTO\CadastroAssociadoDTO as CadastroDTO;
use TrilhosDorioCadastro\LO\CadastroAssociadoLO as  CadastroLO;
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL,ControleAcesso};
use TrilhosDorioCadastro\Common\EnvioEmail;
require '../StartLoader/autoloader.php';

$pagina='CadDadosBancarios.php';
$Redirecionamento = new ControleAcesso();


$cadastroDT = new CadastroDTO();
 $p = $GLOBALS['_'.$_SERVER['REQUEST_METHOD']];

   $cadastroDT->nome=$_POST['nome'];
   $cadastroDT->sobrenome=$_POST['sobrenome'];
   $cadastroDT->data_De_nascimento=$_POST['dataNascimento'];
   $cadastroDT->email=$_POST['email'];
   $cadastroDT->telefone=$_POST['telefone'];
   $cadastroDT->id_origem= 1; //A ser preenchido por uma caixa de seleção.
   $cadastroDT->endereco=$_POST['endereco'];
   $cadastroDT->cep=$_POST['cep'];
   $cadastroDT->Bairro= $_POST['bairro'];
   $cadastroDT->Cidade=$_POST['cidade'];
   $cadastroDT->Estado= $_POST['uf'];
   $cadastroDT->data_De_cadastro= date("Y-m-d"); ;
   $cadastroDT->pais=$_POST['Pais'];
   $cadastroDT->data_De_desligamento= date("Y-m-d"); 
   $cadastroDT->forma_de_doacao= 0;//A ser preenchido por uma caixa de seleção.
   $cadastroDT->numero=$_POST['numero'];
   $cadastroDT->complemento= empty($_POST['Complemento'])?0:$_POST['Complemento'];
   $cadastroDT->cpf=$_POST['cpf'];
   $cadastroDT->interesses= "TESTE" ;//$_POST['interesses'];
   $cadastroDT->naturalidade=$_POST['Naturalidade'];
   $EfetivarCadastro = new ManterBL();
   $EfetivarCadastro->CadastrarAssociado($cadastroDT);
   $enviarEmail = new EnvioEmail($cadastroDT->email,$cadastroDT->email,'teste','Teste de envio');
   $enviarEmail->sendMail();
   $Redirecionamento->RedirecionarParaTipoPag($pagina,$_POST['cpf']);



?>