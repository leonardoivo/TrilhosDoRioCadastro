<?php

use TrilhosDorioCadastro\DTO\CadastroAssociadoDTO as CadastroDTO;
use TrilhosDorioCadastro\LO\CadastroAssociadoLO as  CadastroLO;
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL,ControleAcesso};
use TrilhosDorioCadastro\Common\EnvioEmail;
require '../StartLoader/autoloader.php';
$Redirecionamento = new ControleAcesso();
$cadastroDT = new CadastroDTO();
$ManterCadastro = new ManterBL();
$pagina='';
$remetente="boasvindas@trilhosdorio.com.br";
$editar=false;
$id_associado='';
$text= file_get_contents('CorpoEmail.html');
 $p = $GLOBALS['_'.$_SERVER['REQUEST_METHOD']];
$editar=isset($_POST['editar'])?$_POST['editar']:false;
$id_associado=isset($_POST['id_associado'])?$_POST['id_associado']:0;
   $cadastroDT->nome=$_POST['nome'];
   $cadastroDT->sobrenome=$_POST['sobrenome'];
   $cadastroDT->data_De_nascimento=$_POST['dataNascimento'];
   $cadastroDT->email=$_POST['email'];
   $cadastroDT->telefone=$_POST['telefone'];
   $cadastroDT->id_origem= 1; //A ser preenchido por uma caixa de seleção.
   $cadastroDT->endereco=$_POST['endereco'];
   $cadastroDT->cep=$_POST['cep'];
   $cadastroDT->Bairro= $_POST['bairro'];
   $cadastroDT->nomePai=$_POST['pai'];
   $cadastroDT->nomeMae= $_POST['mae'];
   $cadastroDT->Cidade=$_POST['cidade'];
   $cadastroDT->Estado= $_POST['uf'];
   $cadastroDT->data_De_cadastro= date("Y-m-d"); ;
   $cadastroDT->pais=$_POST['Pais'];
   $cadastroDT->data_De_desligamento= date("Y-m-d"); 
   $cadastroDT->forma_de_doacao= 0;//A ser preenchido por uma caixa de seleção.
   $cadastroDT->numero=$_POST['numero'];
   $cadastroDT->complemento= empty($_POST['Complemento'])?0:$_POST['Complemento'];
   $cadastroDT->cpf=$_POST['cpf'];
   $cadastroDT->interesses=implode(",", $_POST['interesses']);
   $cadastroDT->naturalidade=$_POST['Naturalidade'];
   $cadastroDT->idTipoPagamento=1;
   
   if($editar==true && $id_associado>0){
    $pagina='Associados.php';
    $ManterCadastro->EditarAssociado($cadastroDT,$id_associado);
    $Redirecionamento->Redirecionar($pagina);
   }else{
    //$pagina='http://localhost/TrilhosDoRioCadastro/CadastroTDR/View/CadDadosBancarios.php';
    $pagina='BoasVindas.html';
    $ManterCadastro->CadastrarAssociado($cadastroDT);
    $enviarEmail = new EnvioEmail($remetente,$cadastroDT->email,'Seja muito bem vindo a Trilhos do Rio',$text);
    $enviarEmail->sendMail();
   //$Redirecionamento->RedirecionarParaTipoPag($pagina,$_POST['cpf']);
    $Redirecionamento->Redirecionar($pagina);

   }
?>