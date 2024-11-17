<?php
session_start();
?>
<body>

<?php require_once("../header.php");?>

<?php require_once("./paginacao.php");?>

<?php require_once("../class/db.class.php");?>

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
$artigos_por_pagina = 2;
$pagina_atual = ! empty( $_GET['pagina'] ) ? (int) $_GET['pagina'] : 0;
$pagina_atual = $pagina_atual * $artigos_por_pagina;

// Cria a consulta para o MySQL e executa
$vinculo = $conn->prepare("SELECT * FROM computador LIMIT $pagina_atual,$artigos_por_pagina");
$vinculo->execute();

// Mostra os valores
while( $mostra = $vinculo->fetch() ) {
?>
<div class="tabela">
<div class="Bold">
<font color="black">
Nome:
</font>
</div>
<div class="kg">
<font color="#1E90FF">
<?php echo $mostra["nome"];?>
</font>
</div>
</div>
<br/>
<div class="Bold">
<font color="black">
E-mail De Contato:
</font>
</div>
<div class="kg">
<font color="#1E90FF">
<?php echo $mostra["email"];?>
</font>
</div>
<br/>
<div class="tabela">
<div class="Bold">
<font color="black">
Numero De Contato:
</font>
</div>
<div class="kg">
<font color="#1E90FF">
<?php echo $mostra["contato"];?>
</font>
</div>
</div>
<br/>
<div class="Bold">
<font color="black">
Defeito Do Aparelho:
</font>
</div>
<div class="kg">
<font color="#1E90FF">
<?php echo $mostra["numero1"];?>
</font>
</div>

</div>
<br/>
<div align="center">
<div class="kg">
<font color="black">
<?php
}

// Pegamos o valor total de artigos em uma consulta sem limite
$total_artigos = $conn->prepare("SELECT COUNT(*) AS total FROM computador");
$total_artigos->execute();
$total_artigos = $total_artigos->fetch();
$total_artigos = $total_artigos['total'];

echo paginacao( $total_artigos,$artigos_por_pagina, 100);
?>
</font>
</div>
</div>
<br/><br/>

<?php require_once('rodape.php');?>