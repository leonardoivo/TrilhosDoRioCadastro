<?php
include("./config.php");
$cpf=$_REQUEST['cpf'];
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

$query= mysqli_query($link, "SELECT * from cadastroAssociado where cpf=".$cpf);
    while($linha=mysqli_fetch_assoc($query))
      {
	        $cpfUser=$linha['cpf'];
              $nome=$linha['nome'];
              $numero=$linha['numero'];
              $bairro=$linha['Bairro'];
              $sobrenome=$linha['sobrenome'];
              $Endereco=$linha['endereco'];
              $Complemento=$linha['complemento'];
              $CEP=$linha['cep'];
              $cidade=$linha['Cidade'];
              $estado=$linha['Estado'];
              $Pais=$linha['pais'];
               $DataDeNascimento=$linha['data_De_nascimento'];
            $Naturalidade=$linha['naturalidade'];
             $Email=$linha['email'];
	      $Telefone=$linha['telefone'];

	}

?>
<!DOCTYPE html>
<html><head>
</head><body>
<table >
<tr>	<td>
CPF:<? echo $cpfUser; ?></td>
</tr>
<tr><td>Nome:<? echo $nome; ?></td><td> Sobrenome: <? echo $sobrenome; ?></td></tr>
<tr><td>Endereço:<? echo $Endereco; ?></td><td>Numero:<? echo $numero; ?></td><td> Complemento: <? echo $Complemento; ?></td><td>CEP: <? echo $CEP; ?></td></tr>
<tr><td> Bairro:<? echo $bairro; ?></td><td>Cidade: <? echo $cidade; ?> </td><td>Estado: <? echo $estado; ?></td><td>Pais: <? echo $Pais; ?> </td></tr>
<tr><td>Data de Nascimento <? echo $DataDeNascimento; ?></td><td> Naturalidade: <? echo $Naturalidade; ?></td></tr>
<tr><td>Email:<? echo $Email; ?></td><td>Telefone:<? echo $Telefone;?></td></tr>



</table>
<a href="associados.php">Voltar</a>

</body>
</html>