<?php
session_start();
require_once("conexao.php");
session_start();
require_once("class/db.class.php");
require_once("class/usuario.class.php");
require_once("class/valida.class.php");
$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);
?>
<body>

<?php require_once("header.php");?>


<h1>Cadastrar Professores</h1>
<?php
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
 //Verificar se o usuário clicou no botão
if (!empty($dados['CadUsuario'])) {
$empty_input = false;
$dados = array_map('trim', $dados);
if (in_array("", $dados)) {
$empty_input = true;
echo "<p style='color: #f00;'>Erro: Necessário preencher todos campos!</p>";
} elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
$empty_input = true;
echo "<p style='color: #f00;'>Erro: Necessário preencher com e-mail válido!</p>";
}

if (!$empty_input) {
$query_usuario = "INSERT INTO professores (nome, sobrenome, cidade, estado, cep, telefone, email, senha) VALUES (:nome, :sobrenome, :cidade, :estado, :cep, :telefone, :email, :senha) ";
$cad_usuario = $conn->prepare($query_usuario);
$cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
$cad_usuario->bindParam(':sobrenome', $dados['sobrenome'], PDO::PARAM_STR);
$cad_usuario->bindParam(':cidade', $dados['cidade'], PDO::PARAM_STR);
$cad_usuario->bindParam(':estado', $dados['estado'], PDO::PARAM_STR);
$cad_usuario->bindParam(':cep', $dados['cep'], PDO::PARAM_STR);
$cad_usuario->bindParam(':telefone', $dados['telefone'], PDO::PARAM_STR);
$cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
$cad_usuario->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
$cad_usuario->execute();
if ($cad_usuario->rowCount()) {
echo "<script language='javascript' type='text/javascript'>alert('Professor Cadastrado Com Sucesso');window.location.href='../admin/visualiza_professores.php';</script>";
unset($dados);
} else {
echo "<script language='javascript' type='text/javascript'>alert('Erro Professor Não Cadastrado');window.location.href='cadastra-professor.php';</script>";
}
}
}
?>
<form name="cad-usuario" method="POST" action="">
<div class="pure-control-group">
<label for="nome">Nome</label>

<input type="nome" name="nome" type="text" placeholder="Primeiro Nome" value="<?php
if (isset($dados['nome'])) {
echo $dados['nome'];
}
?>"> 
<br/>
<label for="sobrenome">Sobrenome</label>

<input type="sobrenome" name="sobrenome" type="text" placeholder="Digite Seu Sobrenome" value="<?php
if (isset($dados['sobrenome'])) {
echo $dados['sobrenome'];
}
?>"> 
</div>
<br/>
<div class="pure-control-group">
<label for="telefone">Telefone</label>

<input type="telefone" name="telefone" type="text" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Somente Números" value="<?php
if (isset($dados['telefone'])) {
echo $dados['telefone'];
}
?>">

</div>
<br/>
<div class="pure-control-group">
<label for="cidade">Cidade</label>

<input type="cidade" name="cidade" type="text" placeholder="Digite a sua Cidade" value="<?php
if (isset($dados['cidade'])) {
echo $dados['cidade'];
}
?>"> 
<br/>
<label for="estado">Estado</label>
<select type="estado" name="estado" value="<?php
if (isset($dados['estado'])) {
echo $dados['estado'];
}
?>">
<option value="">Selecione o Estado</option>
<option value="ac">Acre</option>
<option value="al">Alagoas</option>
<option value="am">Amazonas</option>
<option value="ap">Amapá</option>
<option value="ba">Bahia</option>
<option value="ce">Ceará</option>
<option value="df">Distrito Federal</option>
<option value="es">Espirito Santo</option>
<option value="go">Goiás</option>
<option value="ma">Maranhão</option>
<option value="mg">Minas Gerais</option>
<option value="ms">Mato Grosso do Sul</option>
<option value="mt">Mato Grosso</option>
<option value="pa">Pará</option>
<option value="pb">Paraíba</option>
<option value="pe">Pernambuco</option>
<option value="pi">Piauí</option>
<option value="pr">Paraná</option>
<option value="rj">Rio de Janeiro</option>
<option value="rn">Rio Grande do Norte</option>
<option value="ro">Rondônia</option>
<option value="rr">Roraima</option>
<option value="rs">Rio Grande do Sul</option>
<option value="sc">Santa Catarina</option>
<option value="se">Sergipe</option>
<option value="sp">São Paulo</option>
<option value="to">Tocantins</option>
</select> 
</div>
<br/>
<div class="pure-control-group">
<label for="cep">CEP</label>

<input type="cep" name="cep" type="text" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Somente Números" value="<?php
if (isset($dados['cep'])) {
echo $dados['cep'];
}
?>"> 
</div>
<br/>
<div class="pure-control-group">
<label for="email">Email</label>
<input type="email" name="email"  placeholder="contato@email.com.br" value="<?php
if (isset($dados['email'])) {
echo $dados['email'];
}
?>">
</div>
<br/>
<div class="pure-control-group">
<label for="senha">Senha</label>
<input type="senha" name="senha" type="password" placeholder="Digite sua Senha" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" value="<?php
if (isset($dados['senha'])) {
echo $dados['senha'];
}
?>"> 
</div>
<br/>
<input type="submit" value="Cadastrar" name="CadUsuario">
</form>
</body>

<?php require_once("rodape.php");?>