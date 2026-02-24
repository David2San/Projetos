<?php

//Chamei meu crud de inserção, alterar, selecionar e excluir

include("CRUDEspecialidade.php");

//1º: pego os valores via post

$cadastro_vacina_disponivel = $_POST["cadastro_vacina_disponivel"];
$cadastro_marcaçao_consulta = $_POST["cadastro_marcaçao_consulta"];
$cadastro_especialista_dia = $_POST["cadastro_especialista_dia"];
$suporte_online = $_POST["suporte_online"];
$cadastro_consulta = $_POST["cadastro_consulta"];
$cadastro_paciente = $_POST["cadastro_paciente"];
$cadastro_funcionario = $_POST["cadastro_funcionario"];
$cadastro_especialista = $_POST["cadastro_especialista"];

//2º: Valido se estão ok

if ($cadastro_vacina_disponivel == "") {
    $erro = "Campo cadastro_vacina_disponivel vazio";
    header("Location:especialidade_tela.php?erro=$erro");
}
if ($cadastro_marcaçao_consulta == "") {
    $erro = "Campo cadastro_marcaçao_consulta vazio";
    header("Location:especialidade_tela.php?erro=$erro");
}
if ($cadastro_especialista_dia == "") {
    $erro = "Campo cadastro_especialista_dia vazio";
    header("Location:especialidade_tela.php?erro=$erro");
}
if ($suporte_online == "") {
    $erro = "Campo suporte_online vazio";
    header("Location:especialidade_tela.php?erro=$erro");
}
if ($cadastro_consulta == "") {
    $erro = "Campo cadastro_consulta vazio";
    header("Location:especialidade_tela.php?erro=$erro");
}
if ($cadastro_paciente == "") {
    $erro = "Campo cadastro_paciente vazio";
    header("Location:especialidade_tela.php?erro=$erro");
}
if ($cadastro_funcionario == "") {
    $erro = "Campo cadastro_funcionario vazio";
    header("Location:especialidade_tela.php?erro=$erro");
}
if ($cadastro_especialista == "") {
    $erro = "Campo cadastro_especialista vazio";
    header("Location:especialidade_tela.php?erro=$erro");
}

//3º: realizo a ação no crud

inserirAdministradores($cadastro_vacina_disponivel, $cadastro_marcaçao_consulta, $cadastro_especialista_dia, $suporte_online, $cadastro_consulta, $cadastro_paciente, $cadastro_funcionario, $cadastro_especialista);
