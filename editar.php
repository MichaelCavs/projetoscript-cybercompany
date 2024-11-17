<?php
require_once('class/db.class.php');
require_once('class/valida.class.php');
require_once('class/usuario.class.php');

// Protege a página
require_once('protege.php');
///////////////////
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Editar Aluno</title>
<link rel="stylesheet" href="css/pure-min.css">
    </head>
    <body>

 <?php
 if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
 $usuario = new usuario();
 $retorno = $usuario->editar($_POST);
 $id = $_POST['idusuario'];
 $dados = $_POST;
 } else {
if ($_SESSION['idusuario'] == 1 && isset($_GET['idusuario']))
$id = $_GET['idusuario'];
else
$id = $_SESSION['idusuario'];
$usuario = new usuario();
$dados = $usuario->usuarioInfo($id);
}
?>
<?php if (@$retorno['sucesso'] == true): ?>
<p>Cadastro Atualizado com sucesso!</p>
 <?php else: ?>
<form class="pure-form pure-form-aligned" method="post">
<input type="hidden" name="idusuario" value="<?= $id ?>" />
<fieldset>
 <legend style="margin-left: 10%;"> <h2>Editar Aluno</h2> </legend>
<br/><br/>
<div class="pure-control-group">
<label for="nome">Nome</label>
<input id="nome" name="nome" type="text" placeholder="Primeiro Nome" value="<?= @$dados['nome'] ?>"> <?= @$retorno['nome'] ?>
<label for="sobrenome">Sobrenome</label>
<input id="sobrenome" name="sobrenome" type="text" placeholder="Sobrenome" value="<?= @$dados['sobrenome'] ?>"> <?= @$retorno['sobrenome'] ?>
</div>

<div class="pure-control-group">
<label for="telefone">Telefone</label>
<input id="telefone" name="telefone" type="text" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Somente Números" value="<?= @$dados['telefone'] ?>"> <?= @$retorno['telefone'] ?>
</div>

<div class="pure-control-group">
<label for="email">Email</label>
<input id="email" name="email" type="email" placeholder="email@fornecedor.com" value="<?= @$dados['email'] ?>"> <?= @$retorno['email'] ?>
</div>

<div class="pure-control-group">
<label for="senha">Senha</label>
<input id="senha" name="senha" type="password" placeholder="Senha"> <?= @$retorno['senha'] ?>
 </div>

<div class="pure-controls">
<button type="submit" class="pure-button pure-button-primary">Editar</button>
</div>
</fieldset>
</form>
<br/><br/>
 <?php endif; ?>     
</body>
</html>