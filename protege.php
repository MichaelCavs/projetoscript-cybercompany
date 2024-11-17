<?php

// Inclua este script em todas as páginas que exigirem que o usuário esteja logado
// 
// Protege a página
session_start();
if (!isset($_SESSION['logado'])) {
    // Verifica se existem Cookies para manter conectado
    if (isset($_COOKIE["email"]) && isset($_COOKIE["senha"])) {
        $usuario = new usuario();
        if (!$usuario->validaLogin($_COOKIE))
            header('Location: login.php');
    } else
        header('Location: login.php');
    //
}
//
?>

