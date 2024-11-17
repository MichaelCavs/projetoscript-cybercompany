<?php
require_once("./conexao.php");
require_once("header.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Atendimento Ao Cliente</title>
</head>
<body>
<h1>Atendimento Para Celular</h1>
<?php
//Receber os dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Verificar se o usuário clicou no botão
if (!empty($dados['CadUsuario'])) {
//var_dump($dados);

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
$query_usuario = "INSERT INTO celular (nome, email, marca, modelo, numero1, contato) VALUES (:nome, :email, :marca, :modelo, :numero1, :contato) ";
$cad_usuario = $conn->prepare($query_usuario);
$cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
$cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
$cad_usuario->bindParam(':marca', $dados['marca'], PDO::PARAM_STR);
$cad_usuario->bindParam(':modelo', $dados['modelo'], PDO::PARAM_STR);
$cad_usuario->bindParam(':numero1', $dados['numero1'], PDO::PARAM_STR);
$cad_usuario->bindParam(':contato', $dados['contato'], PDO::PARAM_STR);


$cad_usuario->execute();
if ($cad_usuario->rowCount()) {
echo "<script language='javascript' type='text/javascript'>alert('Atendimento Registrado Com Sucesso');window.location.href='https://api.whatsapp.com/send?phone=5513996989366';</script>";
unset($dados);
} else {
echo "<p style='color: #f00;'>Erro: Atendimento não Registrado , Houve Um Erro</p>";
}
}
}
?>
<form name="cad-usuario" method="POST" action="">
<label>Nome: </label>
<input type="text" name="nome" id="nome" placeholder="Nome completo" value="<?php
if (isset($dados['nome'])) {
echo $dados['nome'];
}
?>"><br><br>
<label>E-mail: </label>
<input type="email" name="email" id="email" placeholder="Seu melhor e-mail" value="<?php
if (isset($dados['email'])) {
echo $dados['email'];
}
?>"><br><br>
<label>Numero De contato: </label>
<input type="contato" name="contato" id="contato" placeholder="Seu Numero De Contato" value="<?php
if (isset($dados['contato'])) {
echo $dados['contato'];
}
?>"><br><br>
<br/>
<label for="estado">Selecione a Marca Do Aparelho: </label>
<select type="marca" name="marca" value="<?php
if (isset($dados['marca'])) {
echo $dados['marca'];
}
?>">
<option value=""> Selecione o Problema Do Aparelho: </option>
<option value="MOTOROLA "> MOTOROLA </option>
<option value="SAMSUNG "> SAMSUNG </option>
<option value="XIAOMI "> XIAOMI </option>
<option value="IPHONE"> IPHONE</option>
<option value="ZENFONE"> ZENFONE</option>
<option value="LG"> LG</option>
<option value="SONY"> SONY</option>
<option value="ONE PLUS"> ONE PLUS</option>
<option value="OPPO "> OPPO </option>
<option value="VIVO "> VIVO</option>
<option value="ZTE"> ZTE </option>
<option value="Nokia"> NOKIA</option>
<option value="Sony Ericson"> Sony Ericson </option>
</select> 
<br/>
<label for="estado">Selecione o Modelo Do Aparelho: </label>
<select type="modelo" name="modelo" value="<?php
if (isset($dados['modelo'])) {
echo $dados['modelo'];
}
?>">
<option value=""> Selecione o Modelo Do Aparelho: </option>
<option value="GALAXY A01 Core"> GALAXY A01 Core </option>
<option value="GALAXY S9 PLUS"> GALAXY S9 PLUS </option>
<option value="IPHONE 11"> IPHONE 11 </option>
<option value="IPHONE 11 PRO"> IPHONE 11 PRO </option>
<option value="GALAXY A10 S"> GALAXY A10 S </option>
<option value="IPHONE 4/4S"> IPHONE 4/4S </option>
<option value="GALAXY A2 Core 2019"> GALAXY A2 Core 2019  </option>
<option value="GALAXY A30 S"> GALAXY A30 S </option>
<option value="IPHONE XS"> IPHONE XS </option>
<option value="LENOVO VIBE C2"> LENOVO VIBE C2 </option>
<option value="GALAXY A6S"> GALAXY A6S </option>
<option value="GALAXY A8 PLUS"> GALAXY A8 PLUS </option>
<option value="XIAOMI REDMI 6"> XIAOMI REDMI 6</option>
<option value="XIAOMI REDMI 6A">  XIAOMI REDMI 6A   </option>
<option value="XIAOMI REDMI 7A">  XIAOMI REDMI 7A  </option>
<option value="XIAOMI REDMI NOTE 5">  XIAOMI REDMI NOTE 5  </option>
<option value="XIAOMI REDMI NOTE 8T">  XIAOMI REDMI NOTE 8T   </option>
<option value="XIAOMI REDMI NOTE 9 Pro">  XIAOMI REDMI NOTE 9 Pro   </option>
<option value="XIAOMI Mi NOTE 10 Pro">  XIAOMI Mi NOTE 10 Pro   </option>
<option value="MOTO E7 Plus">   MOTO E7 Plus  </option>
<option value="MOTO E6 PLAY">   MOTO E6 PLAY  </option>
<option value="XPERIA XZ2 COMPACT">  XPERIA XZ2 COMPACT   </option>
<option value="ZENFONE 2 LASER 6.0">   ZENFONE 2 LASER 6.0 </option>
<option value="MOTO G5S PLUS">   MOTO G5S PLUS  </option>
<option value="GALAXY S10 5G">  GALAXY S10 5G   </option>
<option value="MOTO G8 PLAY  ">  MOTO G8 PLAY     </option>
<option value="MOTO G8 POWER">   MOTO G8 POWER  </option>
<option value="ZENFONE MAX PRO ZB602KL">   ZENFONE MAX PRO ZB602KL  </option>
<option value="ZENFONE MAX SHOT ZB634KL">  ZENFONE MAX SHOT ZB634KL   </option>
<option value="MOTO ONE ACTION">   MOTO ONE ACTION  </option>
<option value="ZENFONE MAX SHOT ZB634KL">  ZENFONE MAX SHOT ZB634KL   </option>
<option value="MOTO ONE ACTION">   MOTO ONE ACTION  </option>
<option value="MOTO G8 PLUS">  MOTO G8 PLUS   </option>
<option value="ZENFONE LIVE L1 ZA550KL">  ZENFONE LIVE L1 ZA550KL   </option>
</select> 
<br/>
<label for="estado">Selecione Seu Problema No Aparelho: </label>
<select type="numero1" name="numero1" value="<?php
if (isset($dados['numero1'])) {
echo $dados['numero1'];
}
?>">
<option value=""> Selecione o Problema Do Aparelho: </option>
<option value="Travamento De Bios (Com Senha)"> Travamento De Bios (Com Senha)</option>
<option value="Aparelho com tela quebrada"> Aparelho com tela quebrada</option>
<option value="Inicia , Mas Não inicia a tela"> Inicia , Mas Não inicia a tela </option>
<option value="Problema No HD"> Problema No HD</option>
<option value="Problema Na Memoria Ram"> Problema Na Memoria Ram</option>
<option value="Problema Com a camera"> Problema Com a Camera</option>
<option value="Problema Na Entrada de Carregamento"> Problema Na Entrada de Carregamento</option>
<option value="Problema Na Entrada Usb"> Problema Na Entrada Usb</option>
<option value="Problema Na Carcassa"> Problema na Carcassa</option>
<option value="Problema No Auto falante"> Problema No Auto Falante</option>
<option value="Problema No Audio ou Drivers"> Problema No Audio ou Drivers</option>
<option value="Problema No Windows/ Mac / linux "> Problema No Windows/ Mac / linux</option>
<option value="Problema No Processador e Troca De Pasta Térmica"> Problema No Processador e Troca De Pasta Térmica</option>
</select> 
<br/>
<br/>
<input type="submit" value=" Finalizar   " placeholder =" Finalizar Cadastro  " name="CadUsuario">
</form>

<br/>
<br/>

<?php require_once("rodape.php");?>
</body>
</html>
