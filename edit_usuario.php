<?php
session_start();
require_once("conexao.php");
require_once('class/valida.class.php'); 
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE idusuario = '$id'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Editar usuários</title>		
</head>
<body>
<?php require_once("../header.php");?>	
<br/><br/>
<a href="index.php">Listar</a><br>
<h1>Editar Usuário</h1>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
<form method="POST" action="proc_edit_usuario.php">
<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
			
<label>Nome: </label>
<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>
			
<label>E-mail: </label>
<input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['email']; ?>"><br><br>
				
<label>Telefone: </label>

<input type="email" name="telefone" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Somente Números"  value="<?php echo $row_usuario['telefone']; ?>"><br><br>
			
<input type="submit" value="Editar">
</form>
<br/>
<br/>
<?php require_once("../rodape.php");?>
</body>
</html>