<?php
session_start();
require_once("../conexao.php");
session_start();
require_once("../class/db.class.php");
require_once("../class/usuario.class.php");
require_once("../class/valida.class.php");
$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);
?>
<body>

<?php require_once("../header.php");?>


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


<br/><br/>

<br/><br/>		
<div class="barra" align="center"><font color="white"><h1>Listar De Professores</h1></font></div>
<?php
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
//Receber o número da página
$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
//Setar a quantidade de itens por pagina
$qnt_result_pg = 3;
		
//calcular o inicio visualização
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
$result_usuarios = "SELECT * FROM professores LIMIT $inicio, $qnt_result_pg";
$resultado_usuarios = mysqli_query($conexao, $result_usuarios);
while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
?>
<br/>
<div class="linha">
<br>
Nome: <?php echo $row_usuario['nome'];?> 
<br>
Telefone: <?php echo $row_usuario['telefone'];?>
<br>
Email: <?php echo $row_usuario['email'];?>
</div>
<table width="100%" border="2" class="menu">
<tr>
<td width="50%" align="center" border="2">
<a href='edit_professor.php?id=<?php echo $row_usuario['idusuario'];?>'>Editar </a>  
</td>
<td width="50%" align="center" border="2">
<a href='proc_apagar_professor.php?id=<?php $row_usuario['nome'];?>'>Apagar</a>
</td>
</tr>
</table>
<?php
}
		
//Paginação - Somar a quantidade de usuários
$result_pg = "SELECT COUNT(idusuario) AS num_result FROM professores";
$resultado_pg = mysqli_query($conexao, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);

//Quantidade de pagina 
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
//Limitar os link antes depois
$max_links = 2;
?>

<table width="100%" border="2" class="menu">
<tr>
<td width="33%" align="center"> 
<a href='index.php?pagina=1'>Primeira</a> 
<td>

<input type="submit" value="<?php echo $pagina;?>" align="center"/>

<?php		
for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
if($pag_dep <= $quantidade_pg){
?>

<a href='index.php?pagina=<?php echo $pag_dep;?>'><?php echo $pag_dep;?></a> 
<td width="33%" align="center">
<?php
}
}
?>
</td>
<td width="34%" align="center" class="menu">
<?php 		
for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
if($pag_ant >= 1){
?>

<a href='index.php?pagina=<?php echo $pag_ant;?>'><?php echo $pag_ant;?></a> 

<?php
}
}
?>
<a href='index.php?pagina=<?php echo $quantidade_pg;?>'>Ultima</a>
</td>
</tr>
</table>		
<br/>
<br/>		

<br/>
<br/>
<?php require_once("../rodape.php");?>	
</body>
</html>