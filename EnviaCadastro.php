<?php
include("./config.php");
//$link=mysqli_connect($host,$login_db,$senha_db);
$cpf=$_POST['cpf'];
$nome=$_POST['nome'];
$numero=$_POST['numero'];
$bairro=$_POST['bairro'];
$sobrenome=$_POST['sobrenome'];
$Endereco=$_POST['rua'];
$Complemento=$_POST['Complemento'];
$CEP=$_POST['cep'];
$cidade=$_POST['cidade'];
$estado=$_POST['uf'];
$Pais=$_POST['Pais'];
$DataDeNascimento=$_POST['DataDeNascimento'];
$Naturalidade=$_POST['Naturalidade'];
$Email=$_POST['email'];

$Telefone=$_POST['telefone'];

$motivacoes ="";	
$interesses=$_POST["interesses"];
if(!empty($interesses))
 {
	
	foreach($interesses as $interesse)
	{

		$motivacoes  .= ',' . $interesse;
	  //  echo '<ul><li></li>'.htmlentities($foodstuff).'</li></ul>';	
	    
    }

  }

// 	}
	
$Cadastrar="insert into cadastroAssociado (cpf,nome,endereco,numero,complemento,bairro,cep,Cidade,data_De_nascimento,email,sobrenome,naturalidade,pais,estado,interesses) values('$cpf','$nome','$Endereco','$numero','$Complemento','$bairro','$CEP','$cidade','$DataDeNascimento','$Email','$sobrenome','$Naturalidade','$Pais','$estado','$motivacoes')";
// $Cadastrar="insert into cadastroAssociado (cpf,nome,endereco,numero,complemento,bairro,cep,cidade,data_de_nascimento,email,senha,sobrenome,naturalidade,pais,estado) values('$cpf','$nome','$Endereco','$numero','$Complemento','$bairro','$CEP','$cidade','$DataDeNascimento','$Email','$Senha','$sobrenome','$Naturalidade','$Pais','$estado')";

$query=mysqli_query($link,"SELECT * from cadastroAssociado where cpf=".$cpf);

$cadastro= mysqli_num_rows($query); 

   if($cadastro>0){

	   echo "usuario já cadastrado";

	 }
   else if($cadastro==0){
		$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));

		echo "Cadastrado com sucesso!";

		header("Location: FormasDeDoacao.php");


	 }



?>
