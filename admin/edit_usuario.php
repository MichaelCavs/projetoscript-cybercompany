<?php
session_start();
require_once("../conexao.php");
require_once('../class/valida.class.php'); 
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuario WHERE idusuario = '$id'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<?php
session_start();
session_start();
require_once("../class/db.class.php");
require_once("../class/usuario.class.php");
$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);
?>
<body>

<?php require_once("header.php");?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Editar usuários</title>		
</head>
<body>

<br/><br/>
<h1>Editar Usuário</h1>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
<form method="POST" action="proc_edit_usuario.php">
<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
<br/>			
<label>Nome: </label>
<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>
<br/>			
<label>E-mail: </label>
<input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['email']; ?>"><br><br>
<br/>				
<label>Telefone: </label>
<input type="telefone" name="telefone" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Somente Números"  value="<?php echo $row_usuario['telefone']; ?>"><br><br>
<br/>			
<input type="submit" value="Editar">
</form>
<br/>
<br/>
<?php require_once("../rodape.php");?>
</body>
</html>