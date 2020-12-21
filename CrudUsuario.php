<?php

include("../../config.php");

session_start();
$usuario=$_SESSION["usuario"];
$operacao=$_GET['operacao'];
$cpf="";
$nome="";
$numero="";
$bairro="";
$sobrenome="";
$Endereco="";
$Complemento="";
$CEP="";
$cidade="";
$estado="";
$Pais="";
$DataDeNascimento="";
$Naturalidade="";
$Email="";
$Senha="";
$Telefone="";
$id_associado=0;
$nomeUsuario = "";
$interesses="";
if(isset($usuario)){



switch($operacao){

    case '1':

    if(  isset($_POST['cpf'] )&&
        isset($_POST['nome'])&&
        isset($_POST['numero'])&&
        isset($_POST['bairro'])&&
        isset($_POST['sobrenome'])&&
        isset($_POST['endereco'])&&
        isset($_POST['Complemento'])&&
        isset($_POST['Cep'])&&
        isset($_POST['Cidade'])&&
        isset($_POST['Estado'])&&
        isset($_POST['Pais'])&&
        isset($_POST['DataDeNascimento'])&&
        isset($_POST['Naturalidade'])&&
        isset($_POST['email'])&&
        isset($_POST['senha'])&&
        isset($_POST['telefone'])){

       $cpf=$_POST['cpf'];
       $nome=$_POST['nome'];
       $numero=$_POST['numero'];
       $bairro=$_POST['bairro'];
       $sobrenome=$_POST['sobrenome'];
       $Endereco=$_POST['endereco'];
       $Complemento=$_POST['Complemento'];
       $CEP=$_POST['Cep'];
       $cidade=$_POST['Cidade'];
       $estado=$_POST['Estado'];
       $Pais=$_POST['Pais'];
       $DataDeNascimento=$_POST['DataDeNascimento'];
       $Naturalidade=$_POST['Naturalidade'];
       $Email=$_POST['email'];
       $Senha=$_POST['senha'];
       $Telefone=$_POST['telefone'];
        $nomeUsuario = $_POST['nome'];
      
    //     ($cpf,
    //   $nome,
    //   $numero,
    //   $bairro,
    //   $sobrenome,
    //   $Endereco,
    //   $Complemento,
    //   $CEP,
    //   $cidade,
    //   $estado,
    //   $Pais,
    //   $DataDeNascimento,
    //   $Naturalidade,
    //   $Email,
    //   $Senha,
    //   $Telefone,$link) 

    }
   
    CadastrarUsuario($cpf,
    $nome,
    $numero,
    $bairro,
    $sobrenome,
    $Endereco,
    $Complemento,
    $CEP,
    $cidade,
    $estado,
    $Pais,
    $DataDeNascimento,
    $Naturalidade,
    $Email,
    $Senha,
    $Telefone,$link) ;
 

    
    
    break;

    case '2':

    if(
      isset($_POST['cpf'] )||
      isset($_POST['nome'])||
      isset($_POST['numero'])||
      isset($_POST['bairro'])||
      isset($_POST['sobrenome'])||
      isset($_POST['endereco'])||
      isset($_POST['Complemento'])||
      isset($_POST['Cep'])||
      isset($_POST['Cidade'])||
      isset($_POST['Estado'])||
      isset($_POST['Pais'])||
      isset($_POST['DataDeNascimento'])||
      isset($_POST['Naturalidade'])||
      isset($_POST['email'])||
      isset($_POST['interesses'])||
      isset($_POST['telefone'])){

        $cpf=$_POST['cpf'];
       $nome=$_POST['nome'];
       $numero=$_POST['numero'];
       $bairro=$_POST['bairro'];
       $sobrenome=$_POST['sobrenome'];
       $Endereco=$_POST['endereco'];
       $Complemento=$_POST['Complemento'];
       $CEP=$_POST['Cep'];
       $cidade=$_POST['Cidade'];
       $estado=$_POST['Estado'];
       $Pais=$_POST['Pais'];
       $DataDeNascimento=$_POST['DataDeNascimento'];
       $Naturalidade=$_POST['Naturalidade'];
       $Email=$_POST['email'];
       $interesses=$_POST['interesses'];
       $Telefone=$_POST['telefone'];
    }


    EditarUsuario($id_associado,$cpf,
    $nome,
    $numero,
    $bairro,
    $sobrenome,
    $Endereco,
    $Complemento,
    $CEP,
    $cidade,
    $estado,
    $Pais,
    $DataDeNascimento,
    $Naturalidade,
    $Email,
    $interesses,
    $Telefone,$link);
    
    break;


    case '3':

    if(isset($_GET['id_usuario'])){
        $id_associado=$_GET['id_usuario'];
        }
    ApagarUsuario($id_associado,$link);

    break;

}

   
}
else{
		
    header("Location:login.html");
    
    }


function EditarUsuario ($id_associado,$cpf,
$nome,
$numero,
$bairro,
$sobrenome,
$Endereco,
$Complemento,
$CEP,
$cidade,
$estado,
$Pais,
$DataDeNascimento,
$Naturalidade,
$Email,
$interesses,
$Telefone,$link) {
    // cpf='$cpf',
    // nome='$cpf',
    // numero='$numero',
    // bairro='$bairro',
    // sobrenome='$sobrenome',
    // Endereco='$Endereco',
    // Complemento='$Complemento',
    // CEP='$CEP',
    // cidade='$cidade',
    // estado='$estado',
    // Pais='$Pais',
    // DataDeNascimento=DataDeNascimento=str_to_date(\"$DataNascUsuario\",  \"%d/%m/%Y\"),
    // uf='$Naturalidade',
    // Email='$Email',
    // interesses='$interesses',
    // Telefone='$Telefone'
    
       
       
    
            $DataNascUsuario =  date("m/d/Y", strtotime($DataDeNascimento));     
           
            $queryEditarUsuario = " update usuarios SET   cpf='$cpf',
            nome='$nome',
            numero='$numero',
            bairro='$bairro',
            sobrenome='$sobrenome',
            Endereco='$Endereco',
            Complemento='$Complemento',
            CEP='$CEP',
            cidade='$cidade',
            estado='$estado',
            Pais='$Pais',
            DataDeNascimento=DataDeNascimento=str_to_date(\"$DataNascUsuario\",  \"%d/%m/%Y\"),
            uf='$Naturalidade',
            Email='$Email',
            interesses='$interesses',
            Telefone='$Telefone'  WHERE id_usuario=".$id_associado;

            $queryEditaUsuario = mysqli_query($link, $queryEditarUsuario)or die("Erro inadimissivel!!");
           
            header("Location:usuarios.php");
    
    }



function CadastrarUsuario ($cpf,
$nome,
$numero,
$bairro,
$sobrenome,
$Endereco,
$Complemento,
$CEP,
$cidade,
$estado,
$Pais,
$DataDeNascimento,
$Naturalidade,
$Email,
$motivacoes,
$Telefone,$link) {

    $DataNascUsuario =  date("d/m/Y", strtotime($DataDeNascimento));   
 //if(isset($nomeUsuario)&&isset($endereco)&&isset($id_cargo)&&isset($id_associado)){
    $Cadastrar="insert into cadastroAssociado (cpf,nome,endereco,numero,complemento,bairro,cep,Cidade,data_De_nascimento,email,sobrenome,naturalidade,pais,estado,interesses,telefone) values('$cpf','$nome','$Endereco','$numero','$Complemento','$bairro','$CEP','$cidade',str_to_date(\"$DataNascUsuario\",  \"%d/%m/%Y\"),'$Email','$sobrenome','$Naturalidade','$Pais','$estado','$motivacoes','$Telefone')";
	$queryCadastro = mysqli_query($link,$Cadastrar)or die("Erro inadimissivel!!");
	//echo $queryInserirRegistro;
	//$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));

	if($queryCadastro== true){

		header("Location:usuarios.php");
	}
	
	
//}
}




function ApagarUsuario($id_associado,$link){
    $queryApagarUsuario="delete from usuarios where id_usuario=".$id_associado;
    echo $queryApagarUsuario;
    $enderecoApagado= mysqli_query($link,$queryApagarUsuario);
    
    header("Location:usuarios.php");
    
    }
?>

