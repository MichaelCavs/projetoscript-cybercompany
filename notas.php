<?php
session_start();
require_once('class/valida.class.php'); 
require_once('conexao.php');
require_once('header.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastrar</title>		
	</head>
	<body>
		
		
		<h1>Cadastrar Nota De Aluno</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
<form method="POST" action="validou.php">
<div class="pure-control-group">
<label for="curso">Curso Do Aluno</label>
<br/>
<input type="curso" name="curso" type="text" placeholder="Digite o Nome Do Curso" value=""> 
<br/>
<label for="word">Digite a Nota Do Curso De Word:</label>
<br/>
<input type="word" name="word" type="text" placeholder="Digite a Nota Do Curso De Word" value=""> 
</div>
<br/>
<div class="pure-control-group">
<label for="Excel">Digite a Nota Do Curso de Excel</label>
<br/>
<input type="excel" name="excel" type="text" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Somente Números" value="">

</div>
<br/>
<div class="pure-control-group">
<label for="access">Digite a Nota Do Curso De Access</label>
<br/>
<input type="access" name="access" type="text" placeholder="Digite a sua Cidade" value="access"> 
<br/>
<div class="pure-control-group">
<label for="PowerPoint">Digite a Nota Do Curso De Power Point</label>
<br/>
<input type="PowerPoint" name="PowerPoint" type="text" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Somente Números" value=""> 
</div>
<br/>
<div class="pure-control-group">
<label for="outlook">Digite a nota do curso de OutLook</label>
<br/>
<input type="outlook" name="outlook"  placeholder="Digite a Nota De Outlook" value="outlook">
</div>
<br/>
<div class="pure-control-group">
<label for="LínguaPortuguesa">Digite a nota do Curso da LínguaPortuguesa</label>
<br/>
<input type="LínguaPortuguesa" name="LínguaPortuguesa" type="text" placeholder="Digite a nota do curso de LínguaPortuguesa" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" value=""> 
</div>
<br/>
<br/>
<div class="pure-control-group">
<label for="RaciocínioLogico">Digite a nota do Curso de RaciocínioLogico</label>
<br/>
<input type="RaciocínioLogico" name="RaciocínioLogico" type="text" placeholder="Digite a nota do curso de RaciocínioLogico " onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" value=""> 
</div>
<br/>
<div class="pure-control-group">
<label for="etica">Digite a nota do Curso de etica</label>
<br/>
<input type="etica" name="etica" type="text" placeholder="Digite a nota do curso de ética" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" value=""> 
</div>
<br/>
<div class="pure-control-group">
<label for="DireitoConstitucional">Digite a nota do Curso de DireitoConstitucional</label>
<br/>
<input type="DireitoConstitucional" name="DireitoConstitucional" type="text" placeholder="Digite a nota do curso de DireitoConstitucional" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" value=""> 
</div>
<br/>
<div class="pure-control-group">
<label for="DireitoAdministrativo">Digite a nota do Curso de DireitoAdministrativo</label>
<br/>
<input type="DireitoAdministrativo" name="DireitoAdministrativo" type="text" placeholder="Digite a nota do curso de DireitoAdministrativo" onkeyup="this.value = this.value.replace(/[^0-9]/g, '');" value=""> 
</div>
<br/>
<div class="pure-control-group">
<label for="Nivel">Digite o Nivel Do Curso Do Aluno:</label>
<br/>
<input type="nivel" name="nivel" type="text" placeholder="Digite o Nivel Do Curso Do Aluno" value=""> 
</div>
<br/>
<div class="pure-control-group">
<label for="mes">Digite o mês Que Ta Sendo Ofertado a Materia:</label>
<br/>
<input type="mes" name="mes" type="text" placeholder="Digite o mês Da Matéria" value=""> 
</div>
<br/>
<input type="submit" value="Cadastrar" name="CadUsuario">
</form>
<br/>
<?php require_once("rodape.php");?>
</body>
</html>