
<!DOCTYPE html>
<head>
<script src="js/BuscaEndereco.js"></script>
<meta charset="iso-8859-1">
    <link rel="stylesheet" href="css/style.css" media="all" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>
<body>
<html>
<img src="img/titulo01.png" >

	<h1>Cadastro</h1>
<div class="container">

<form name="cadastrar" method="post" action="cadastroUser.php">
<table   cellspacing="0" cellpadding="0">
<tr>
	<td>
CPF:<input type="text" id="campoCPF" maxlength="11" name="cpf"></td>
</tr>
<tr><td>Nome:<input type="text" id="campoNome" name="nome"></td><td> Sobrenome: <input type="text" name="sobrenome" id="campoSobrenome"></td></tr>
<tr><td>login <input type="text" id="campoLogin" name="login"></td></tr>
<tr><td>Email:<input type="text" id="campoEmail" name="email"></td></tr>

<tr><td>Senha:<input type="password" id="campoSenha"name="senha"></td></tr>
<tr><td>Re-senha:<input type="password"  id="campoSenha"name="re-senha"></td></tr>
<tr><td>celular:<input type="text" name="celular"  id="campoCPF" id="campoTelefone"></td></tr>

<tr><td><div class="my_content_container "><input type="submit" value="cadastrar"></div></td> <td><input type="button" onclick="location.href='http://www.trilhosdorio.com.br';" value="Voltar" /></td></tr>
</table>

</form>



</body>

</html>







