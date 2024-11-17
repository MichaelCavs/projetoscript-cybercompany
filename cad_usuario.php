<?php
session_start();
require_once('class/valida.class.php'); 
Require_once('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastrar</title>		
	</head>
	<body>
		<a href="cad_usuario.php">Cadastrar</a><br>
		
		<h1>Cadastrar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_cad_usuario.php">
			<label>Nome: </label>
			<input type="text" name="nome" value="nome" placeholder="Digite o nome completo"><br><br>
		
			<label>E-mail: </label>
			<input type="email" name="email" valeu="nome" placeholder="Digite o seu melhor e-mail"><br><br>
			<br/>
		 <label>Telefone: </label>
           <input type="telefone" name="telefone" type="text" valeu="telefone" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Somente Números"> 
           <br/>
			<input type="submit" value="Cadastrar">
		</form>
	</body>
</html>