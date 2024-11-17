<?php
session_start();
require_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$cidade= filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$senha = sha1($senha);
$result_usuario = "INSERT INTO usuario (nome, sobrenome, telefone, cidade , estado, cep , email , senha, created) VALUES ('$nome', '$sobrenome','$telefone','$cidade','$estado','$cep','$email','$senha', NOW())";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
 
 $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Verificar se o usuário clicou no botão
if(!empty($dados['CadUsuario'])){

$empty_input = false;

$dados = array_map('trim', $dados);
if(in_array("", $dados)) {
$empty_input = true;
echo "<p style='color: #f00;'>Erro: Necessário preencher todos campos!</p>";
} elseif(!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
$empty_input = true;
echo "<p style='color: #f00;'>Erro: Necessário preencher com e-mail válido!</p>";
}
}



if(mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado</p>";
	header("Location: cadastro.php");
}
?>