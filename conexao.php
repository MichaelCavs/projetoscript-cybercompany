<?php
$servidor = "localhost";
$usuario = "u910050783_Home";
$senha = "z!_zWicb98LL#6&";
$dbname = "u910050783_Home";


$host = "localhost";
$user = "u910050783_Home";
$pass = "z!_zWicb98LL#6&";
$dbname = "u910050783_Home";

//Conexao com a porta
$conn = new PDO("mysql:host=$host;dbname=".$dbname, $user, $pass);


//Criar a conexao
$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);

?>