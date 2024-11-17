<?php
session_start();
require_once("conexao.php");
require_once("class/db.class.php");
require_once("class/usuario.class.php");
require_once("class/valida.class.php");
$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);
?>
<body>

<?php require_once("header.php");?>


<h1>Cadastrar Notas</h1>
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
else if (!$empty_input) {
$query_usuario = "INSERT INTO usuario (email, curso, word, excel, access, PowerPoint, outlook, LínguaPortuguesa, RaciocínioLogico, etica , DireitoConstitucional, DireitoAdministrativo, nivel, mes) VALUES (:email, :curso, :word, :excel, :access, :PowerPoint, :outlook, :LínguaPortuguesa, :RaciocínioLogico, :etica, :DireitoConstitucional, :DireitoAdministrativo, :nivel, :mes) ";
$cad_usuario = $conn->prepare($query_usuario);
$cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
$cad_usuario->bindParam(':curso', $dados['curso'], PDO::PARAM_STR);
$cad_usuario->bindParam(':word', $dados['word'], PDO::PARAM_STR);
$cad_usuario->bindParam(':excel', $dados['excel'], PDO::PARAM_STR);
$cad_usuario->bindParam(':access', $dados['access'], PDO::PARAM_STR);
$cad_usuario->bindParam(':PowerPoint', $dados['PowerPoint'], PDO::PARAM_STR);
$cad_usuario->bindParam(':outlook', $dados['outlook'], PDO::PARAM_STR);
$cad_usuario->bindParam(':LínguaPortuguesa', $dados['LínguaPortuguesa'], PDO::PARAM_STR);
$cad_usuario->bindParam(':RaciocínioLogico', $dados['RaciocínioLogico'], PDO::PARAM_STR);
$cad_usuario->bindParam(':etica', $dados['etica'], PDO::PARAM_STR);
$cad_usuario->bindParam(':DireitoConstitucional', $dados['DireitoConstitucional'], PDO::PARAM_STR);
$cad_usuario->bindParam(':DireitoAdministrativo', $dados['DireitoAdministrativo'], PDO::PARAM_STR);
$cad_usuario->bindParam(':nivel', $dados['nivel'], PDO::PARAM_STR);
$cad_usuario->bindParam(':mes', $dados['mes'], PDO::PARAM_STR);
$cad_usuario->execute();
if ($cad_usuario->rowCount()) {
echo "<script language='javascript' type='text/javascript'>alert('Nota Do Aluno Adicionada Com Sucesso');window.location.href='../admin/lista_notas.php';</script>";
unset($dados);
} else {
echo "<script language='javascript' type='text/javascript'>alert('Erro Nota Não Cadastrada');window.location.href='../admin';</script>";
}
}
}
?>
<form name="cad-usuario" method="POST" action="">
<div class="pure-control-group">
<label for="curso">Curso Do Aluno</label>
<br/>
<input type="curso" name="curso" type="text" placeholder="Digite o Nome Do Curso" value="<?php
if (isset($dados['curso'])) {
echo $dados['curso'];
}
?>"> 
<br/>
<label for="word">Digite a Nota Do Curso De Word:</label>
<br/>
<input type="word" name="word" type="text" placeholder="Digite a Nota Do Curso De Word" value="<?php
if (isset($dados['word'])) {
echo $dados['word'];
}
?>"> 
</div>
<br/>
<div class="pure-control-group">
<label for="Excel">Digite a Nota Do Curso de Excel</label>
<br/>
<input type="excel" name="excel" type="text" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Somente Números" value="<?php
if (isset($dados['excel'])) {
echo $dados['excel'];
}
?>">

</div>
<br/>
<div class="pure-control-group">
<label for="access">Digite a Nota Do Curso De Access</label>
<br/>
<input type="access" name="access" type="text" placeholder="Digite a sua Cidade" value="<?php
if (isset($dados['access'])) {
echo $dados['access'];
}
?>"> 
<br/>
<div class="pure-control-group">
<label for="PowerPoint">Digite a Nota Do Curso De Power Point</label>
<br/>
<input type="PowerPoint" name="PowerPoint" type="text" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Somente Números" value="<?php
if (isset($dados['PowerPoint'])) {
echo $dados['PowerPoint'];
}
?>"> 
</div>
<br/>
<div class="pure-control-group">
<label for="outlook">Digite a nota do curso de OutLook</label>
<br/>
<input type="outlook" name="outlook"  placeholder="Digite a Nota De Outlook" value="<?php
if (isset($dados['outlook'])) {
echo $dados['outlook'];
}
?>">
</div>
<br/>
<div class="pure-control-group">
<label for="LínguaPortuguesa">Digite a nota do Curso da LínguaPortuguesa</label>
<br/>
<input type="LínguaPortuguesa" name="LínguaPortuguesa" type="text" placeholder="Digite a nota do curso de LínguaPortuguesa" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" value="<?php
if (isset($dados['LínguaPortuguesa'])) {
echo $dados['linguaPortuguesa'];
}
?>"> 
</div>
<br/>
<br/>
<div class="pure-control-group">
<label for="RaciocínioLogico">Digite a nota do Curso de RaciocínioLogico</label>
<br/>
<input type="RaciocínioLogico" name="RaciocínioLogico" type="text" placeholder="Digite a nota do curso de RaciocínioLogico " onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" value="<?php
if (isset($dados['RaciocínioLogico'])) {
echo $dados['RaciocínioLogico'];
}
?>"> 
</div>
<br/>
<div class="pure-control-group">
<label for="etica">Digite a nota do Curso de etica</label>
<br/>
<input type="etica" name="etica" type="text" placeholder="Digite a nota do curso de ética" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" value="<?php
if (isset($dados['etica'])) {
echo $dados['etica'];
}
?>"> 
</div>
<br/>
<div class="pure-control-group">
<label for="DireitoConstitucional">Digite a nota do Curso de DireitoConstitucional</label>
<br/>
<input type="DireitoConstitucional" name="DireitoConstitucional" type="text" placeholder="Digite a nota do curso de DireitoConstitucional" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" value="<?php
if (isset($dados['DireitoConstitucional'])) {
echo $dados['DireitoConstitucional'];
}
?>"> 
</div>
<br/>
<div class="pure-control-group">
<label for="DireitoAdministrativo">Digite a nota do Curso de DireitoAdministrativo</label>
<br/>
<input type="DireitoAdministrativo" name="DireitoAdministrativo" type="text" placeholder="Digite a nota do curso de DireitoAdministrativo" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" value="<?php
if (isset($dados['DireitoAdministrativo'])) {
echo $dados['DireitoAdministrativo'];
}
?>"> 
</div>
<br/>
<div class="pure-control-group">
<label for="Nivel">Digite o Nivel Do Curso Do Aluno:</label>
<br/>
<input type="nivel" name="nivel" type="text" placeholder="Digite o Nivel Do Curso Do Aluno" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" value="<?php
if (isset($dados['nivel'])) {
echo $dados['nivel'];
}
?>"> 
</div>
<br/>
<div class="pure-control-group">
<label for="mes">Digite o mês Que Ta Sendo Ofertado a Materia:</label>
<br/>
<input type="text" name="mes" type="text" placeholder="Digite o mês Da Matéria " onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" value="<?php
if (isset($dados['mes'])) {
echo $dados['mes'];
}
?>"> 
</div>
<div class="pure-control-group">
<label for="email">Digite o email Do Curso Do Aluno:</label>
<br/>
<input type="email" name="email" type="text" placeholder="Digite o email do aluno para inserir a nota" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" value="<?php
if (isset($dados['email'])) {
echo $dados['email'];
}
?>"> 
</div>
<br/>
<input type="submit" value="Cadastrar" name="CadUsuario">
</form>
</body>

<?php require_once("rodape.php");?>