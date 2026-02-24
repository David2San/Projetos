<?php
//Chamei meu crud de inserção, alterar, selecionar e excluir

include("funcionarios_especialistas_conexao.php");

//1º: pego os valores via post

$informacao_pessoal = $_POST["informacao_pessoal"];
$horario_consulta = $_POST["horario_consulta"];
$ponto_servico = $_POST["ponto_servico"];

//2º: Valido se estão ok

if ($informacao_pessoal == "") {
    $erro = "Campo informacao pessoal vazio";
    header("Location:funcionarios_especialistas_tela.php?erro=$erro");
}
if ($horario_consulta == "") {
    $erro = "Campo horario consulta vazio";
    header("Location:funcionarios_especialistas_tela.php?erro=$erro");
}
if ($ponto_servico == "") {
    $erro = "Campo ponto servico vazio";
    header("Location:funcionarios_especialistas_tela.php?erro=$erro");
}
//3º: realizo a ação no crud

inserirFuncionariosEspecialistas($informacao_pessoal, $horario_consulta, $ponto_servico);
