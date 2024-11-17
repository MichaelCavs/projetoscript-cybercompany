<?php
session_start();
require_once('class/valida.class.php'); 
require_once('conexao.php');
require_once('header.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastrar</title>		
	</head>
	<body>
		
		
		<h1>Cadastrar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
<form method="POST" action="verifica_cadastro.php">
<div class="pure-control-group">
<label for="nome">Nome</label>

<input type="nome" name="nome" type="text" placeholder="Primeiro Nome"> 
<br/>
<label for="sobrenome">Sobrenome</label>

<input type="sobrenome" name="sobrenome" type="text" placeholder="Digite Seu Sobrenome"> 
</div>
<br/>
<div class="pure-control-group">
<label for="telefone">Telefone</label>

<input type="telefone" name="telefone" type="text" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Somente Números">

</div>
<br/>
<div class="pure-control-group">
<label for="cidade">Cidade</label>

<input type="cidade" name="cidade" type="text" placeholder="Digite a sua Cidade"> 
<br/>
<label for="estado">Estado</label>
<select type="estado" name="estado">
<option value=""></option>
<option value="ac">Acre</option>
<option value="al">Alagoas</option>
<option value="am">Amazonas</option>
<option value="ap">Amapá</option>
<option value="ba">Bahia</option>
<option value="ce">Ceará</option>
<option value="df">Distrito Federal</option>
<option value="es">Espirito Santo</option>
<option value="go">Goiás</option>
<option value="ma">Maranhão</option>
<option value="mg">Minas Gerais</option>
<option value="ms">Mato Grosso do Sul</option>
<option value="mt">Mato Grosso</option>
<option value="pa">Pará</option>
<option value="pb">Paraíba</option>
<option value="pe">Pernambuco</option>
<option value="pi">Piauí</option>
<option value="pr">Paraná</option>
<option value="rj">Rio de Janeiro</option>
<option value="rn">Rio Grande do Norte</option>
<option value="ro">Rondônia</option>
<option value="rr">Roraima</option>
<option value="rs">Rio Grande do Sul</option>
<option value="sc">Santa Catarina</option>
<option value="se">Sergipe</option>
<option value="sp">São Paulo</option>
<option value="to">Tocantins</option>
</select> 
</div>
<br/>
<div class="pure-control-group">
<label for="cep">CEP</label>

<input type="cep" name="cep" type="text" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Somente Números"> 
</div>
<br/>
<div class="pure-control-group">
<label for="email">Email</label>
<input type="email" name="email"  placeholder="contato@email.com.br">
</div>
<br/>
<div class="pure-control-group">
<label for="senha">Senha</label>

<input type="senha" name="senha" type="password" placeholder="Digite sua Senha" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');"> 
</div>
<br/>
<input type="submit" value="Cadastrar" name="CadUsuario">
</form>
<br/>
<?php require_once("rodape.php");?>
</body>
</html>