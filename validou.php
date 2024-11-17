<?php
session_start();
require_once("conexao.php");

$curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);
$word = filter_input(INPUT_POST, 'word', FILTER_SANITIZE_STRING);
$excel = filter_input(INPUT_POST, 'excel', FILTER_SANITIZE_STRING);
$access= filter_input(INPUT_POST, 'access', FILTER_SANITIZE_STRING);
$PowerPoint = filter_input(INPUT_POST, 'PowerPoint', FILTER_SANITIZE_STRING);
$outlook = filter_input(INPUT_POST, 'outlook', FILTER_SANITIZE_STRING);
$LinguaPortuguesa = filter_input(INPUT_POST, 'LinguaPortuguesa', FILTER_SANITIZE_EMAIL);
$etica = filter_input(INPUT_POST, 'etica', FILTER_SANITIZE_STRING);
$DireitoConstitucional = filter_input(INPUT_POST, 'DireitoConstitucional', FILTER_SANITIZE_STRING);
$DireitoAdministrativo = filter_input(INPUT_POST, 'DireitoAdministrativo', FILTER_SANITIZE_STRING);
$nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_STRING);
$mes = filter_input(INPUT_POST, 'mes', FILTER_SANITIZE_STRING);


$result_usuario = "INSERT INTO usuario (curso,word,excel,access,PowerPoint,outlook,LínguaPortuguesa,etica,DireitoConstitucional,DireitoAdministrativo,nivel,mes) VALUES ('$curso', '$word','$excel','$access','$PowerPoint','$outlook','$LinguaPortuguesa','$etica','$DireitoConstitucional','$DireitoAdministrativo','$nivel','$mes', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);
 
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



if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Nota cadastrada com sucesso</p>";
	header("Location: ../admin");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Nota não foi cadastrado</p>";
	header("Location: notas.php");
}
?>