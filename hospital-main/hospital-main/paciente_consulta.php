<?php

//Chamei meu crud de inserção, alterar, selecionar e excluir

include("paciente_consulta_conexao.php");

//1º: pego os valores via post

$vacinas_disponiveis = $_POST["vacinas_disponiveis"];
$marcacao_consultas = $_POST["marcacao_consultas"];
$especialista_dia = $_POST["especialista_dia"];
$atendimento_urgente = $_POST["atendimento_urgente"];

//2º: Valido se estão ok

if ($vacinas_disponiveis == "") {
    $erro = "Campo vacinas disponiveis vazio";
    header("Location:paciente_consulta_tela.php?erro=$erro");
}
if ($marcacao_consultas == "") {
    $erro = "Campo marcacao consultas vazio";
    header("Location:paciente_consulta_tela.php?erro=$erro");
}
if ($especialista_dia == "") {
    $erro = "Campo especialista dia vazio";
    header("Location:paciente_consulta_tela.php?erro=$erro");
}
if ($atendimento_urgente == "") {
    $erro = "Campo atendimento urgente vazio";
    header("Location:paciente_consulta_tela.php?erro=$erro");
}
//3º: realizo a ação no crud

inserirConsultaPaciente($vacinas_disponiveis, $marcacao_consultas, $especialista_dia, $atendimento_urgente);
