<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://stevendie.xtgem.com/themes/jhoncms_4.10/style.css" type="text/css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://stevendie.xtgem.com/themes/jhoncms_4.10/style.css" type="text/css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<?php
session_start();
require_once("../class/db.class.php");
require_once("../class/usuario.class.php");
require_once("../class/valida.class.php");
require_once("../conexao.php");
$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);
?>
<?php
if(@$_SESSION['logado']){
?>
<nav class="navbar navbar-inverse">

<div class="container-fluid">
<table width="100%" border="0">
<tr>
<td width="50%" align="center"> 
<font color="white" size="2">Portifolio CyberCompany</font>
</td>
<td width="50%" align="center">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>                        
</button>
<font color="blue">usuário: </font><br/>
<font color="red">
 <?php echo $dados['nome'];?>

<?php echo $dados['sobrenome'];?>
</font>

</div>
</td>
</tr>
</table>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">      
<ul class="nav navbar-nav navbar-right">
<div align="left" color="white">
<b size="2">
<br/>
</b>
</div>
<div align="center" color="white">
<b size="2">
<br/>

<li>
<a href="../admin">Atualizar</a>
</li>
<br/>
</b>
</div>
</ul>
</div>
</div>
</div>
</nav>
<?php
}
?>

<div align="center">

<img src="https://i.postimg.cc/7LhVQFX3/logo.png" alt="Sem Imagem" width="400" height="230"/>


</div>