<?php
include("./config.php");
//include("./VerAcesso.php");
//session_start();
//$usuario=$_SESSION['usuario'];

//if(isset($_SESSION['usuario'])){
$query=mysqli_query($link,"select * from cadastroAssociado order by cpf asc");
echo "<!DOCTYPE html><html><head></head><body>";
echo "<table border=1>
	<tr><th>Usuarios cadastrados</th></tr>";
while($linha=mysqli_fetch_assoc($query))
   {
         $cpf=$linha['cpf'];

         $nome=$linha['nome'];
         $sobrenome=$linha['sobrenome'];
          echo "<tr><td> <a href=\"DadosUsuarios.php?cpf=".$cpf."\">".$nome." ".$sobrenome."</a></td>";
        // if(VerAcesso($usuario,$link)==true){
         echo "<td> <a href=\"EditarUsuario.php?cpf=".$cpf."\">Editar</a></td>";
         //}
	      echo "</tr>";
    }
   echo "</table>";
  
   //if(VerAcesso($usuario,$link)==true){
		echo "<a href=\"cadastrar.php\"> Incluir usuário</a>";
	
	
   //}
   echo "<a href=\"associados.php?saida=1\" onclick='location.replace(\"login.html\")'>Sair</a>";
   echo "<a href=\"../index.php\" onclick='location.replace(\"index.php\")'>voltar</a>";

   echo "</body></html>";
//   }else{
// 	    header("Location:login.html");
//        }
// if(isset($_REQUEST["saida"])){

// 	    session_unset();
// 		session_destroy();
// 		header("Location: login.html");
        


// 	}

?>
