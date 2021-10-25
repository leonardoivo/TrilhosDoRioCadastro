
<!DOCTYPE html>
<head>
<script src="BuscaEndereco.js"></script>


</head>
<body>
<html>
	<h1>Cadastro</h1>
<div class="container">

<form name="cadastrar" method="post" action="EnviaCadastro.php">
<table  border="1" cellspacing="0" cellpadding="0">
<tr>
	<td>
CPF:<input type="text"  maxlength="11" name="cpf"></td>
<td>CEP: <input type="text" name="cep" id="cep"onblur="pesquisacep(this.value);" ></td>
</tr>
<tr><td>Nome:<input type="text" name="nome"></td><td> Sobrenome: <input type="text" name="sobrenome"></td></tr>
<tr><td>Endereço:<input type="text" name="rua" id="rua"></td><td>Numero:<input type="text" name="numero"></td><td> Complemento: <input type="text" name="Complemento"></td></tr>
<tr><td> Bairro:<input type="text" name="bairro" id="bairro"></td><td>Cidade: <input type="text" name="cidade" id="cidade"> </td><td>Estado: <input type="text" name="uf" id="uf"> </td><td>Pais: <input type="text" name="Pais"> </td></tr>
<tr><td>Data de Nascimento <input type="date" name="DataDeNascimento"></td><td> Naturalidade: <input type="text" name="Naturalidade"> </td></tr>
<tr><td>Email:<input type="text" name="email"></td></tr>

<!-- <tr><td>Senha:<input type="password" name="senha"></td></tr>
<tr><td>Re-senha:<input type="password" name="re-senha"></td></tr> -->
<tr><td>Telefone:<input type="text" name="telefone"></td></tr>
<tr><td>  <fieldset>
	  <label>Pesquisa: <input type="checkbox" name="interesses[]" value="Pesquisa"/> </label>
	  <label>Historia: <input type="checkbox" name="interesses[]" value="Historia"/> </label>
	  <label>Expedicões: <input type="checkbox" name="interesses[]" value="Expedicões" checked="checked"/> </label>
	  </fieldset></td></tr>
<tr><td><div class="my_content_container "><input type="submit" value="cadastrar"></div></td> <td><input type="button" onclick="location.href='http://www.trilhosdorio.com.br';" value="Voltar" /></td></tr>
</table>

</form>



</body>

</html>







