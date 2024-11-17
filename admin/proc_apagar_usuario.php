<?php
session_start();
require_once("../conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
$result_usuario = "DELETE FROM usuario WHERE idusuario='$id'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
if(mysqli_affected_rows($conexao)){
$_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
header("Location: ../admin");
}else{
$_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado</p>";
header("Location: ../admin");
}
}else{	
$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
header("Location: ../admin");
}
?>