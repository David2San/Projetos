<?php

//Chamei meu crud de inserção, alterar, selecionar e excluir

include("funcionario_crud.php");

//1º: pego os valores via post

$nome = $_POST["nome"];
$nascimento = $_POST["nascimento"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$cpf = $_POST["cpf"];
$rg = $_POST["rg"];
$telefone = $_POST["telefone"];
$endereço = $_POST["endereço"];
$filiaçao = $_POST["filiaçao"];
$estado_civil = $_POST["estado civil"];
$especialidade = $_POST["especialidade"];
$comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$pass = array();
$combLen = strlen($comb) - 1;
for ($i = 0; $i < 6; $i++) {
    $n = rand(0, $combLen);
    $pass[] = $comb[$n];
}
$senha = (implode($pass));
echo (md5($senha));

//2º: Valido se estão ok

if ($nome == "") {
    $erro = "Campo nome vazio";
    header("Location:paciente_tela.php?erro=$erro");
}
if ($nascimento == "") {
    $erro = "Campo nascimento vazio";
    header("Location:paciente_tela.php?erro=$erro");
}
if ($email == "") {
    $erro = "Campo email vazio";
    header("Location:paciente_tela.php?erro=$erro");
}
if ($senha == "") {
    $erro = "Campo senha vazio";
    header("Location:paciente_tela.php?erro=$erro");
}
if ($cpf == "") {
    $erro = "Campo cpf vazio";
    header("Location:paciente_tela.php?erro=$erro");
}
if ($rg == "") {
    $erro = "Campo rg vazio";
    header("Location:paciente_tela.php?erro=$erro");
}
if ($telefone == "") {
    $erro = "Campo telefone vazio";
    header("Location:paciente_tela.php?erro=$erro");
}
if ($endereço == "") {
    $erro = "Campo endereço vazio";
    header("Location:paciente_tela.php?erro=$erro");
}
if ($filiaçao == "") {
    $erro = "Campo filiaçao vazio";
    header("Location:paciente_tela.php?erro=$erro");
}
if ($estado_civil == "") {
    $erro = "Campo estado civil vazio";
    header("Location:paciente_tela.php?erro=$erro");
}
if ($especialidade == "") {
    $erro = "Campo especialidade vazio";
    header("Location:paciente_tela.php?erro=$erro");
}

//3º: realizo a ação no crud

inserirFuncionario($nome, $nascimento, $email, $senha, $cpf, $rg, $telefone, $endereço, $filiaçao, $estado_civil, $especialidade);
