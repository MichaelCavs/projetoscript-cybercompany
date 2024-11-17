<?php
require_once('class/db.class.php');
require_once('class/valida.class.php'); 
require_once('class/usuario.class.php');
require_once('header.php');

if(($_SERVER['REQUEST_METHOD'] =='POST')) {
$usuario = new usuario();
$usuario->validaLogin($_POST);
if(@$_SESSION['logado']){
echo "<script language='javascript' type='text/javascript'>alert('Você Logou-Se Com Sucesso');window.location.href='index.php';</script>";
}
else
$erro ="<script language='javascript' type='text/javascript'>alert('Login Invalido');window.location.href='../login.php';</script>";
}
?>

<meta charset="UTF-8">
<title>Login - Logando No Site</title>
<link rel="stylesheet" href="css/pure-min.css">
</head>
<body>
<form class="pure-control-group" method="post">
<fieldset>
<legend style="margin-left: 10%"> <h2>Login</h2> </legend>
<p style="color: red"><b><?php echo @$erro; ?></b></p>
<label for="email" align="left">Email</label>
<br/>
<input id="email" name="email" type="email" placeholder="Email" value="<?= @$_POST['email'] ?>" align="left">
<br/>
<label for="password" align="left">Senha</label>
<br/>
<input id="senha" name="senha" type="password" placeholder="Senha" align="left">
<br/>
<br/>
<label for="remember" class="pure-checkbox" align="left">
<input id="cookies" name="cookies" type="checkbox" checked> Mantenha-me conectado
</label>
<br/>
<br/>
<button type="submit" class="pure-button pure-button-primary">Entrar</button>
</fieldset>
<br/>
<br/>
</form>
</div>
<br/>
<? require_once('rodape.php');?>
</body>
</html>
