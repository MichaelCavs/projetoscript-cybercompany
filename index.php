<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Pagina Inicial </title>
<link rel="stylesheet" href="../css/pure-min.css">
<link rel="stylesheet" href="estilo.css">
</head>
<?php
session_start();
require_once("class/db.class.php");
require_once("class/usuario.class.php");
require_once("class/valida.class.php");
require_once("conexao.php");
$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);

?>
<body>
<?php require_once("header.php");?>
<br/>

<table width="100%" border="0">
<tr>
<td width="100%" align="center" class="linha">
<br/>
<font color="red">
<font size="5" type="arial">MENU DE ATENDIMENTO </font>
<br/>
</font>
<br/>
</td>
</tr>
</table>
<table width="100%" align="center">
<tr>
<td width="50%" align="center" class="menu">
<font size="5">Computador</font>
<br/>
<a href="computador">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYe8FHNIXtPlv4GYL2SVjPMTHkky61fyraGDL-njqDWalKvrSKgDy_tQo&s=10" align="center" width="90" height="90">
</a>
</td>
<td width="50%" align="center" class="menu">
<font size="5">Tablet</font>
<br/>
<a href="tablet">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpDrlLQik-jDyDux5MwOwBOTftIizhEHCW-IDdWKWiFa-g2EoAtVtonyEI&s=10" align="center" width="90" height="90"/>
</a>
</td></tr>
</table>

<table width="100%" align="center">
<tr>
<td width="50%" align="left" class="menu">
<font size="5">Celular</font>
<br/>
<a href="celular"/>
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3MoFmCLTd9yUnIQuh-P9mG8dZcK-Y-nEqVvkc7Wt_W-CZFNMUAvityFk&s=10" width="90" height="90"/>
</a>
</td>
<td width="50%" align="left" class="menu">
<font size="5">
Notebook 
</font>
<br/>
<a href="notebook">
<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXjs5abuYBkcin6U4ok6MP0XpOMPPlpdVe2SffeXCGx24-cCwwdXS3ZK00&s=10" width="90" height="90"/>
</a>
</td>
</tr>
</table>



<font color="white">
<div align="center">
<br/>
</font>
<br/><br/>
<?php
$usuarionline = $conn->prepare("SELECT * FROM usuario");
$usuarionline->execute();
$professoresonline = $conn->prepare("SELECT * FROM professores");
$professoresonline->execute();


?>
<div align="left">
<div class="dark">
<br/>
<font color="blue">
<img src="https://i.postimg.cc/B6XkGsBG/129manstudent1-100298.png" width="25" height="25"/>
Alunos Registrados: </font> <font color="red"> ( <?php echo $usuarionline->rowCount();?> ) </font>
<br/>
<hr color="white"/>
</div>
<div class="dark">
<br/>
<font color="blue">
<img src="https://i.postimg.cc/qRDr8jjp/teacher-128-44171.png" width="25" height="25"/>
Professores Registrados: </font> <font color="red"> ( <?php echo $professoresonline->rowCount();?> ) </font><br/><br/>
</div>
</div>
<?php require_once('rodape.php');?>
</body>
</html>