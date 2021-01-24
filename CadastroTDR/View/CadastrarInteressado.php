<?php

use TrilhosDorioCadastro\DTO\InteressadosDTO as InteressadoDTO;
use TrilhosDorioCadastro\LO\InteressadosLO as  CadastroLO;
use TrilhosDorioCadastro\BL\{ManterInteressado as ManterBL,ControleAcesso};
use TrilhosDorioCadastro\Common\EnvioEmail;
require '../StartLoader/autoloader.php';
$Redirecionamento = new ControleAcesso();
$interessadoDT = new InteressadoDTO();
$ManterCadastro = new ManterBL();
$pagina='';
$remetente="boasvindas@trilhosdorio.com.br";
$editar=false;
$id_interessado='';
$text= file_get_contents('CorpoEmail.html');
 $p = $GLOBALS['_'.$_SERVER['REQUEST_METHOD']];
$editar=isset($_POST['editar'])?$_POST['editar']:false;
$nomepagina="";

$id_interessado=isset($_POST['id_interessado'])?$_POST['id_interessado']:0;
   $nomepagina=$_POST['nomepagina'];
   $interessadoDT->nome=$_POST['nome'];
   $interessadoDT->sobrenome=$_POST['sobrenome'];
   $interessadoDT->email=$_POST['email'];
   $interessadoDT->telefone=$_POST['telefone'];
   $interessadoDT->interesses=implode(",", $_POST['interesses']);

   if($editar==true && $id_interessado>0){
    $pagina='Interessados.php';
    $ManterCadastro->EditarInteressado($interessadoDT,$id_interessado);
    $Redirecionamento->Redirecionar($pagina);
   }else if( $ManterCadastro->ConfirmaExistenciaInteressado($interessadoDT->cpf)==false){
    //$pagina='http://localhost/TrilhosDoRioCadastro/CadastroTDR/View/CadDadosBancarios.php';
    $pagina='BoasVindas.html';
    $ManterCadastro->CadastrarInteressado($interessadoDT);
    $enviarEmail = new EnvioEmail($remetente,$interessadoDT->email,'Seja muito bem vindo a Trilhos do Rio',$text);
    $enviarEmail->sendMail();
    $emailAdm="leonardo.ivo22@gmail.com";
    $enviarEmail = new EnvioEmail($remetente,$emailAdm,'Um novo interessado acaba de se cadastrar no site da Trilhos do Rio',$ManterCadastro->ObterDadosNovointeressadoEmail($interessadoDT->cpf));
    $enviarEmail->sendMail();
   //$Redirecionamento->RedirecionarParaTipoPag($pagina,$_POST['cpf']);
    $Redirecionamento->Redirecionar($pagina);
   }
   else{
    echo "<script>alert('Usuário já cadastrado!');location.href=\"{$nomepagina}\";</script>";
   }
?>