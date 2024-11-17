<?php
session_start()
require_once("conexao.php");
require_once("../class/db.class.php");
require_once("../class/usuario.class.php");
require_once("../class/valida.class.php");
$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);


if (!isset($_SESSION['logado'])) {
unset($_SESSION['idusuario'], $_SESSION['nome'], $_SESSION['email']);

$_SESSION['msg'] = "Deslogado com sucesso";
header("Location: login.php");
}
?>