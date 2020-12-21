<?php
use TrilhosDorioCadastro\BL\{ControleAcesso as AcessoLogin,ManterUsuario};
use TrilhosDorioCadastro\DTO\{UsuariosDTO,PerfilDTO};
require '../autoloader.php';
$cpf=$_POST['cpf'];
$senha=$_POST['senha'];
$logado=0;
ob_start(); 
$novoAcesso = new AcessoLogin();
$resultado=$novoAcesso->acesso($cpf,$senha);
		if ($resultado == true){
		$logado=1;		
		}
	else{		
			header("Location:../login.html");			
	        exit();		
		}
if($logado==1){
	session_start();
	//session_register("SESSION");
	//session_register("SESSION_UNAME");
	//$SESSION_UNAME = $cpf;
	$_SESSION['usuario'] =$cpf;
    header("Location:index.php");
	exit();	
		}
?>
